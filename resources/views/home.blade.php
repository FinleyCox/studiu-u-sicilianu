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



@endsection
