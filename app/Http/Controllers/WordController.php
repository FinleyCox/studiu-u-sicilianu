<?php

namespace App\Http\Controllers;

use App\Models\Word;
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
     * Get words by category
     */
    public function getWordsByCategory(Request $request)
    {
        return $this->index($request);
    }
}
