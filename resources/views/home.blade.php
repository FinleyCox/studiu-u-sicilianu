@extends('app')

@section('title', 'ホーム - studiu u sicilianu')
@section('description', 'studiu u sicilianuのホームページです。シチリア語学習のための単語クイズ、動詞の活用、単語学習、お気に入り機能などにアクセスできます。')
@section('keywords', 'シチリア語 学習, Sicilian language, シチリア語 クイズ, シチリア語 フレーズ, シチリア語 動詞活用')
@section('canonical', route('home'))

@push('structured-data')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'EducationalOrganization',
    'name' => 'studiu u sicilianu',
    'url' => url('/'),
    'description' => 'シチリア語の単語・フレーズ・動詞活用・クイズを学べる日本語向け学習サイト',
    'sameAs' => [
        'https://github.com/FinleyCox',
        'https://qiita.com/_anonymous_dog_',
    ],
    'contactPoint' => [
        '@type' => 'ContactPoint',
        'contactType' => 'support',
        'email' => 'inter0370@gmail.com',
        'availableLanguage' => ['ja', 'it'],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@section('content')
<link href="/css/home.css" rel="stylesheet">
<div class="home-content">
    <!-- 学習メニュー -->
    <div class="learning-menu mb-5">
        <h2 class="text-center mb-4">学習メニュー</h2>
        <nav class="nav flex-column custom-nav">
            <a class="nav-link" href="/quiz">
                <i class="bi bi-question-circle"></i>
                <div class="nav-content">
                    <span class="nav-title">単語クイズ</span>
                    <small class="nav-description">学習した単語をクイズ形式で復習</small>
                </div>
            </a>
            <a class="nav-link" href="/words">
                <i class="bi bi-book"></i>
                <div class="nav-content">
                    <span class="nav-title">単語学習</span>
                    <small class="nav-description">日常で使われるシチリア語の単語</small>
                </div>
            </a>
            <a class="nav-link" href="/phrases">
                <i class="bi bi-chat-quote"></i>
                <div class="nav-content">
                    <span class="nav-title">フレーズ学習</span>
                    <small class="nav-description">実用的なシチリア語のフレーズ</small>
                </div>
            </a>
            <a class="nav-link" href="/conjugation">
                <i class="bi bi-arrow-repeat"></i>
                <div class="nav-content">
                    <span class="nav-title">動詞の活用</span>
                    <small class="nav-description">シチリア語の動詞活用を学習</small>
                </div>
            </a>
            {{-- Favourites --}}
            {{-- @auth
            <a class="nav-link" href="/favourites">
                <i class="bi bi-heart"></i>
                <div class="nav-content">
                    <span class="nav-title">お気に入り</span>
                    <small class="nav-description">保存した単語・フレーズを復習</small>
                </div>
            </a>
            @endauth --}}
        </nav>
    </div>

    <!-- 学習の進め方 -->
    <div class="learning-guide mb-5">
        <h2 class="text-center mb-4">学習の進め方</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-1-circle-fill text-primary" style="font-size: 3rem;"></i>
                        <h4 class="mt-3">基礎学習</h4>
                        <p class="card-text">まずは単語とフレーズから始めましょう。日常でよく使われる基本的な表現を覚えます。</p>
                        <a href="/words" class="btn btn-primary">単語を学ぶ</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-2-circle-fill text-success" style="font-size: 3rem;"></i>
                        <h4 class="mt-3">実践練習</h4>
                        <p class="card-text">クイズで理解度を確認し、学習した内容を定着させましょう。</p>
                        <a href="/quiz" class="btn btn-success">クイズに挑戦</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-3-circle-fill text-warning" style="font-size: 3rem;"></i>
                        <h4 class="mt-3">応用学習</h4>
                        <p class="card-text">動詞の活用を学び、より複雑な表現を身につけましょう。</p>
                        <a href="/conjugation" class="btn btn-warning">活用を学ぶ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- シチリア語について -->
    <div class="about-sicilian mb-5">
        <h2 class="text-center mb-4">シチリア語について</h2>
        <div class="row">
            <div class="col-md-6">
                <h4>🌍 歴史と文化</h4>
                <p>シチリア語は、シチリア島で話されているロマンス語の一つです。アラビア語、ギリシャ語、フランス語などの影響を受け、豊かな文化的背景を持っています。</p>
            </div>
            <div class="col-md-6">
                <h4>🍰 身近なシチリア</h4>
                <p>カンノーリ、アランチーニ、カッサータなど、日本でも親しまれているシチリアの美味しい料理。その背景にある言語を学んでみませんか？</p>
            </div>
        </div>
    </div>

    {{-- 新規ユーザー向け --}}
    {{-- @guest
    <div class="new-user-section text-center mb-5">
        <div class="card bg-light">
            <div class="card-body">
                <h3>新規ユーザーの方へ</h3>
                <p class="mb-4">アカウントを作成すると、お気に入り機能を使って学習を効率化できます。</p>
                <div class="d-flex gap-3 justify-content-center">
                    <a href="/register" class="btn btn-primary">新規登録</a>
                    <a href="/login" class="btn btn-outline-primary">ログイン</a>
                </div>
            </div>
        </div>
    </div>
    @endguest --}}
</div>

<style>
.welcome-section {
    padding: 2rem 0;
}

.nav-content {
    text-align: left;
    margin-left: 1rem;
}

.nav-title {
    display: block;
    font-weight: bold;
    margin-bottom: 0.25rem;
}

.nav-description {
    color: #6c757d;
    font-size: 0.875rem;
}

.learning-guide .card {
    transition: transform 0.2s;
}

.learning-guide .card:hover {
    transform: translateY(-5px);
}

.about-sicilian {
    background-color: #f8f9fa;
    padding: 2rem;
    border-radius: 0.5rem;
}

.new-user-section .card {
    border: none;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}
</style>

@endsection 
