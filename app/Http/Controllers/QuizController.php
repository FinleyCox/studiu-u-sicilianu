<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // japanese:ランダムに4件取得 sicilian:ランダムに1件取得
        $sicilian_word = Word::inRandomOrder()->first();
        $correct_japanese = $sicilian_word->japanese;
        $options = Word::where('japanese', '!=', $correct_japanese)
                        ->inRandomOrder()
                        ->limit(3)
                        ->pluck('japanese')
                        ->toArray();
        $options[] = $correct_japanese;
        shuffle($options);

        return response()->json([
            'sicilian' => $sicilian_word->sicilian, // 問題用
            'options' => $options,
            'answer' => $correct_japanese
        ]);
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
