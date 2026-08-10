<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WordController;
use App\Http\Controllers\PhraseController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Models\Word;
use App\Models\Phrase;

// Home page
// Landing Page
Route::get('/', function() {
    $posts = \App\Models\Post::all();
    return view('landing', [
        'posts' => $posts
    ]);
})->name('landing');

// Tech Blog Routes
Route::get('/blog', function() {
    $posts = \App\Models\Post::all();
    return view('blog.index', [
        'posts' => $posts
    ]);
})->name('blog.index');

Route::get('/blog/{slug}', function($slug) {
    return view('blog.show', [
        'post' => \App\Models\Post::findOrFail($slug)
    ]);
})->name('blog.show');

// Admin Routes (Basic Auth)
Route::middleware('auth.basic')->prefix('admin')->group(function () {
    Route::get('/blog/create', [App\Http\Controllers\PostController::class, 'create'])->name('admin.blog.create');
    Route::post('/blog', [App\Http\Controllers\PostController::class, 'store'])->name('admin.blog.store');
});

// Hockey Blog Routes (personal blog, separate from Tech Blog)
Route::get('/hockey', [ArticleController::class, 'index'])->name('hockey.index');
Route::get('/hockey/{article}', [ArticleController::class, 'show'])->name('hockey.show');
Route::post('/hockey/{article}/comments', [CommentController::class, 'store'])
    ->middleware('throttle:hockey-comments')
    ->name('hockey.comments.store');

// Hockey Blog Admin Login (session auth, must stay outside the auth/admin middleware below)
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Hockey Blog Admin Routes (session auth + is_admin flag)
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/hockey/create', [ArticleController::class, 'create'])->name('admin.hockey.create');
    Route::post('/hockey', [ArticleController::class, 'store'])->name('admin.hockey.store');
    Route::get('/hockey/{article}/edit', [ArticleController::class, 'edit'])->name('admin.hockey.edit');
    Route::put('/hockey/{article}', [ArticleController::class, 'update'])->name('admin.hockey.update');
    Route::delete('/hockey/comments/{comment}', [CommentController::class, 'destroy'])->name('admin.hockey.comments.destroy');
});

// Main Application Routes
Route::prefix('studiusicilianu')->group(function() {

    // Home page
    Route::get('/', function() {
        return view('home');
    })->name('home');

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

});
