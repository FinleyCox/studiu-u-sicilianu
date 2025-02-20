<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\QuizController;

use App\Models\Word;

Route::get('/quiz', [QuizController::class, 'index']);
