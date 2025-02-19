<?php
use App\Models\Word;
use Illuminate\Http\Request;

Route::get('/words/random', function() {
    return response()->json([
        'word' => Word::inRandomOrder()->first()
    ]);
});
