<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WordController;
use App\Http\Controllers\PhraseController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\AuthController;
use App\Models\Word;
use App\Models\Phrase;

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
    $categoryMeta = [
        1 => ['title' => '人・物', 'description' => '身の回りにあるものや人を表す単語で、自己紹介や日常会話の土台になります。'],
        2 => ['title' => '前置詞', 'description' => '「〜と」「〜から」といった位置・関係を示す前置詞で、文の意味を正しく伝えます。'],
        3 => ['title' => '動詞・副詞・形容詞など', 'description' => '動作や状態、様子を表現できる動詞・副詞・形容詞のセットです。'],
        4 => ['title' => '方向', 'description' => '道案内や移動の際に役立つ方向を示す表現です。'],
        5 => ['title' => '時間帯', 'description' => '予定や習慣を伝える際に欠かせない時間帯の単語です。'],
        6 => ['title' => '数字', 'description' => '買い物や日時を伝えるときに必要な数字表現です。'],
    ];

    $categories = collect($categoryMeta)->map(function ($meta, $categoryId) {
        $baseQuery = Word::where('category', $categoryId);
        $samples = (clone $baseQuery)->orderBy('id')->limit(5)->get();
        $total = (clone $baseQuery)->count();

        return [
            'id' => $categoryId,
            'title' => $meta['title'],
            'description' => $meta['description'],
            'samples' => $samples,
            'total' => $total,
        ];
    })->values();

    return view('words', [
        'categories' => $categories,
    ]);
})->name('words');

Route::get('/words-contains', function(Request $request) {
    $categoryId = (int) $request->input('category', 1);
    $words = Word::where('category', $categoryId)->orderBy('id')->paginate(24)->withQueryString();

    return view('words-contains', [
        'categoryId' => $categoryId,
        'words' => $words,
    ]);
})->name('words-contains');

Route::get('/phrases', function() {
    $phrases = Phrase::orderBy('id')->paginate(12);
    return view('phrases', [
        'phrases' => $phrases,
    ]);
})->name('phrases');

Route::get('/quiz', function() {
    return view('quiz');
})->name('quiz');

Route::get('/conjugation', function() {
    return view('conjugation');
})->name('conjugation');

// Protected routes (authentication required)
// Route::middleware('auth')->group(function() {
// Route::get('/user-menu', function() {
//     return view('user-menu');
// })->name('user-menu');
// });

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

Route::get('/sitemap.xml', function () {
    $lastmod = now()->toDateString();
    $pages = [
        ['loc' => route('home'), 'changefreq' => 'weekly', 'priority' => '1.0'],
        ['loc' => route('words'), 'changefreq' => 'weekly', 'priority' => '0.9'],
        ['loc' => route('phrases'), 'changefreq' => 'weekly', 'priority' => '0.85'],
        ['loc' => route('quiz'), 'changefreq' => 'weekly', 'priority' => '0.8'],
        ['loc' => route('conjugation'), 'changefreq' => 'monthly', 'priority' => '0.7'],
        ['loc' => route('about'), 'changefreq' => 'monthly', 'priority' => '0.5'],
        ['loc' => route('contact'), 'changefreq' => 'monthly', 'priority' => '0.5'],
        ['loc' => route('privacy-policy'), 'changefreq' => 'yearly', 'priority' => '0.3'],
        ['loc' => route('terms-of-service'), 'changefreq' => 'yearly', 'priority' => '0.3'],
        ['loc' => route('sitemap'), 'changefreq' => 'monthly', 'priority' => '0.4'],
    ];
    $categoryPages = collect([1, 2, 3, 4, 5, 6])->map(fn ($category) => [
        'loc' => route('words-contains', ['category' => $category]),
        'changefreq' => 'weekly',
        'priority' => '0.75',
    ])->all();

    return response()
        ->view('sitemap-xml', [
            'pages' => array_merge($pages, $categoryPages),
            'lastmod' => $lastmod,
        ])
        ->header('Content-Type', 'application/xml');
});
