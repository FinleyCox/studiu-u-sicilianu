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
<div class="home-content content-wide">
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
                        <p class="card-text">まずは単語とフレーズから始めましょう！</p>
                        <a href="/words" class="btn btn-primary">単語を学ぶ</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-2-circle-fill text-success" style="font-size: 3rem;"></i>
                        <h4 class="mt-3">実践練習</h4>
                        <p class="card-text">単語クイズに挑戦！定着度を高めていきましょう</p>
                        <a href="/quiz" class="btn btn-success">クイズに挑戦</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-3-circle-fill text-warning" style="font-size: 3rem;"></i>
                        <h4 class="mt-3">応用学習</h4>
                        <p class="card-text">動詞の活用を学んで少しずつ自分で文章を組み立てられるようにしていきましょう</p>
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
                <h4>歴史と文化</h4>
                <p>シチリア語はイタリアのシチリア島で話されているロマンス語の一つです。周辺地域の言語と部分的に似通っており複数の文化的背景を感じることができます</p>
            </div>
            <div class="col-md-6">
                <h4>聞いたことがあるかも・・・？</h4>
                <p>カンノーリ、アランチーニ、カッサータなど、日本でも聞くことがあるシチリアの美味しい料理。その背景にある言語を学んでみませんか？</p>
            </div>
        </div>
    </div>
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
