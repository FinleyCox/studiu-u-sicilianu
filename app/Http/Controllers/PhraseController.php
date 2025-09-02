<?php

namespace App\Http\Controllers;

use App\Models\Phrase;
use App\Models\Favourite;
use Illuminate\Http\Request;

class PhraseController extends Controller
{
    /**
     * Get phrases with pagination
     */
    public function getPhrases(Request $request)
    {
        $userId = $request->input('userId', 0);
        
        // 10件ずつページネーション
        $phrases = Phrase::paginate(10);
        
        // お気に入りに追加
        foreach($phrases->items() as $phrase) {
            if($userId > 0) {
                $phrase->is_favourite = Favourite::where('user_id', $userId)
                    ->where('phrase_id', $phrase->id)
                    ->exists();
            } else {
                $phrase->is_favourite = false;
            }
        }
        
        return response()->json($phrases);
    }

    /**
     * Add/remove phrase from favourites
     */
    public function addFavourite(Request $request)
    {
        $phraseId = $request->input('phrase_id');
        $userId = auth()->id();
        
        // セッション認証の確認
        if (!$userId) {
            $userId = session('user_id');
        }
        
        if(!$userId) {
            return response()->json([
                'success' => false,
                'message' => 'ログインが必要です'
            ], 401);
        }
        
        try {
            // 既にお気に入りに追加されているかチェック
            $existing = Favourite::where('user_id', $userId)
                ->where('phrase_id', $phraseId)
                ->first();
            
            if($existing) {
                // 既に存在する場合は削除（トグル機能）
                $existing->delete();
                $response = [
                    'success' => true,
                    'phrase_id' => $phraseId,
                    'message' => 'お気に入りから削除されました',
                    'is_favourite' => false
                ];
            } else {
                // お気に入りテーブルへ追加
                $favourite = Favourite::create([
                    'user_id' => $userId,
                    'phrase_id' => $phraseId
                ]);
                $response = [
                    'success' => true,
                    'phrase_id' => $phraseId,
                    'message' => 'お気に入りに登録されました',
                    'is_favourite' => true
                ];
            }
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' => 'お気に入り登録に失敗しました: ' . $e->getMessage()
            ];
        }
        
        return response()->json($response);
    }
}
