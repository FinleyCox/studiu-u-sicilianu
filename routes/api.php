<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuizController;

use App\Models\Word;

Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/quiz', [QuizController::class, 'index']);

