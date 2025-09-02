<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// 使用コントローラー
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\WordController;
use App\Http\Controllers\PhraseController;

Route::post('/login', [LoginController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [LoginController::class, 'logout']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/quiz', [QuizController::class, 'index']);
Route::get('/words', [WordController::class, 'getWordsByCategory']);
Route::get('/words-contains', [WordController::class, 'index']);
Route::get('/phrases', [PhraseController::class, 'getPhrases']);
Route::post('/resetpassword', [LoginController::class, 'resetPassword']);

// お気に入り関連
Route::post('/favourites', [WordController::class, 'addFavourite']);
Route::post('/phrases/favourites', [PhraseController::class, 'addFavourite']);
Route::post('/words-contains/add-favourite', [WordController::class, 'addFavourite']);
Route::post('/words-contains/is-favourite', [WordController::class, 'isFavourite']);
Route::post('/words-contains/delete-favourite', [WordController::class, 'deleteFavourite']);
Route::post('/delete-favourite', [WordController::class, 'deleteFavourite']);
Route::get('/get-favourites', [WordController::class, 'getFavourites']);

