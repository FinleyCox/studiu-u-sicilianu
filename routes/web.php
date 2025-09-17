<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WordController;
use App\Http\Controllers\PhraseController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\AuthController;

// Home page
Route::get('/', function() {
    return view('home');
})->name('home');
// Route::get('/', function () {
//     return 'Laravel is alive!';
// });

// Auth routes
// Route::get('/login', function() {
//     return view('auth.login');
// })->name('login');

// Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Route::get('/register', function() {
//     return view('auth.register');
// })->name('register');

// Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Route::get('/forgot-password', function() {
//     return view('auth.forgot-password');
// })->name('forgot-password');

// Public routes (no authentication required)
Route::get('/words', function() {
    return view('words');
})->name('words');

Route::get('/words-contains', function() {
    return view('words-contains');
})->name('words-contains');

Route::get('/phrases', function() {
    return view('phrases');
})->name('phrases');

Route::get('/quiz', function() {
    return view('quiz');
})->name('quiz');

Route::get('/conjugation', function() {
    return view('conjugation');
})->name('conjugation');

// Protected routes (authentication required)
// Route::middleware('auth')->group(function() {
//     Route::get('/favourites', function() {
//     return view('favourites');
// })->name('favourites');

// Route::get('/user-menu', function() {
//     return view('user-menu');
// })->name('user-menu');
// });

// お気に入り機能（認証ミドルウェアを個別に適用） 
// Route::post('/favourites', [App\Http\Controllers\WordController::class, 'addFavourite'])->middleware('auth');
// Route::post('/delete-account', [App\Http\Controllers\AuthController::class, 'deleteAccount'])->middleware('auth');

// Logout
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Static pages
Route::get('/about', function() {
    return view('about');
})->name('about');

Route::get('/contact', function() {
    return view('contact');
})->name('contact');

Route::get('/privacy-policy', function() {
    return view('privacy-policy');
})->name('privacy-policy');

Route::get('/terms-of-service', function() {
    return view('terms-of-service');
})->name('terms-of-service');

Route::get('/sitemap', function() {
    return view('sitemap');
})->name('sitemap');
