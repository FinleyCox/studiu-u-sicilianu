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

    public function addFavourite(Request $request)
    {
        // postされたデータを取得
        $wordId = $request->input('wordId');
        $userId = $request->input('userId');
        // \Log::info('userID:  ' . $userId);
        try {
            // お気に入りテーブルへ追加
            $favourite = Favourite::create([
                'user_id' => $userId,
                'word_id' => $wordId
            ]);
            $response = [
                'success' => true,
                'word_id' => $wordId,
                'message' => 'お気に入りに追加されました'
            ];
        } catch (\Exception $e) {
            \Log::error($e);
            $response = [
                'success' => false,
                'message' => 'お気に入り追加に失敗しました'
            ];
        }
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
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
