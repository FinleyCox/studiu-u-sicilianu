<?php

namespace App\Http\Controllers;

use App\Models\Word;
use App\Models\Favourite;
use Illuminate\Http\Request;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // wordテーブルから全て持ってくる
        $categoryNum = $request->input('category');
        $words = Word::where('category', $categoryNum)->get();
        // foreach($words as $word) {
        //     \Log::info($word);
        // }
        return response()->json($words);
    }

    /**
     * Get words by category with favourite status
     */
    public function getWordsByCategory(Request $request)
    {
        $categoryNum = $request->input('category');
        $userId = $request->input('userId', 0);
        
        $words = Word::where('category', $categoryNum)->get();
        
        // Add favourite status for each word
        foreach($words as $word) {
            if($userId > 0) {
                $word->is_favourite = Favourite::where('user_id', $userId)
                    ->where('word_id', $word->id)
                    ->exists();
            } else {
                $word->is_favourite = false;
            }
        }
        
        return response()->json($words);
    }

    public function addFavourite(Request $request)
    {
        // // デバッグ情報をログに記録
        // \Log::info('addFavourite called', [
        //     'request_data' => $request->all(),
        //     'user_id' => auth()->id(),
        //     'authenticated' => auth()->check()
        // ]);
        
        // postされたデータを取得
        $wordId = $request->input('word_id') ?? $request->input('wordId');
        $userId = auth()->id();
        
        // セッション認証の確認
        if (!$userId) {
            $userId = session('user_id');
        }
        
        \Log::info('Processing favourite', [
            'word_id' => $wordId,
            'user_id' => $userId
        ]);
        
        if(!$userId) {
            \Log::warning('User not authenticated');
            return response()->json([
                'success' => false,
                'message' => 'ログインが必要です'
            ], 401);
        }
        
        try {
            // 既にお気に入りに追加されているかチェック
            $existing = Favourite::where('user_id', $userId)
                ->where('word_id', $wordId)
                ->first();
            
            \Log::info('Existing favourite check', [
                'exists' => $existing ? true : false
            ]);
            
            if($existing) {
                // 既に存在する場合は削除（トグル機能）
                $existing->delete();
                \Log::info('Favourite deleted', ['word_id' => $wordId]);
                $response = [
                    'success' => true,
                    'word_id' => $wordId,
                    'message' => 'お気に入りから削除されました',
                    'is_favourite' => false
                ];
            } else {
                // お気に入りテーブルへ追加
                $favourite = Favourite::create([
                    'user_id' => $userId,
                    'word_id' => $wordId
                ]);
                \Log::info('Favourite created', [
                    'favourite_id' => $favourite->id,
                    'word_id' => $wordId,
                    'user_id' => $userId
                ]);
                $response = [
                    'success' => true,
                    'word_id' => $wordId,
                    'message' => 'お気に入りに登録されました',
                    'is_favourite' => true
                ];
            }
        } catch (\Exception $e) {
            \Log::error('Favourite operation failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            $response = [
                'success' => false,
                'message' => 'お気に入り登録に失敗しました: ' . $e->getMessage()
            ];
        }
        
        \Log::info('Returning response', $response);
        // 結果を返す
        return response()->json($response);
    }
    // お気に入り済みかどうかを確認
    public function isFavourite(Request $request)
    {
        // ポストされた単語idとユーザーidを取得
        $wordId = $request->input('wordId');
        $userId = $request->input('userId');
        // お気に入りテーブルからユーザーidと単語idを持ってくる。存在しているかどうか
        $isFavourite = Favourite::where('user_id', $userId)->where('word_id', $wordId)->exists();
        // あればお気に入り済みと判断する
        if($isFavourite) {
            $response = [
                'success' => true,
                'message' => 'お気に入り済'
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'お気に入り済みではありません'
            ];
        }
        return response()->json($response);
    }
    // お気に入り削除
    public function deleteFavourite(Request $request)
    {
        $wordId = $request->input('wordId');
        $userId = $request->input('userId');
        try{
            $favourite = Favourite::where('user_id', $userId)->where('word_id', $wordId)->first();
            if($favourite) {
                $favourite->delete();
                $response = [
                    'success' => true,
                    'message' => 'お気に入りから削除されました'
                ];
            } else {
                $response = [   
                    'success' => false,
                    'message' => 'お気に入り削除に失敗しました'
                ];
            }
        } catch (\Exception $e) {
            \Log::error($e);
            $response = [
                'success' => false,
                'message' => $e->getMessage(),
            ];  
        }
        return response()->json($response);
    }
    // お気に入り取得
    public function getFavourites(Request $request)
    {
        try {
            $userId = $request->input('userId');
            
            if (!$userId) {
                return response()->json([
                    'success' => false,
                    'message' => 'ユーザーIDが必要です'
                ], 400);
            }
            
            $favourites = Favourite::where('user_id', $userId)->get();
            $words = Word::whereIn('id', $favourites->pluck('word_id'))->get();
            
            $response = [
                'success' => true,
                'favourites' => $words
            ];
            
            return response()->json($response);
        } catch (\Exception $e) {
            \Log::error('getFavourites error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'お気に入り取得に失敗しました: ' . $e->getMessage()
            ], 500);
        }
    }
}