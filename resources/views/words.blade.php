@extends('app')

@section('title', '単語学習 - studiu u sicilianu')
@section('description', 'シチリア語の基本単語をカテゴリー別に学べます。人や物、前置詞、動詞や形容詞など、目的に合わせて語彙を強化しましょう。')
@section('keywords', 'シチリア語 単語, シチリア語 語彙, シチリア語 学習, Sicilian vocabulary')
@section('canonical', route('words'))

@push('structured-data')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'ItemList',
    'name' => 'Sicilian Vocabulary Categories',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => '人・物', 'url' => url('/words-contains?category=1')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => '前置詞', 'url' => url('/words-contains?category=2')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => '動詞・副詞・形容詞など', 'url' => url('/words-contains?category=3')],
        ['@type' => 'ListItem', 'position' => 4, 'name' => '方向', 'url' => url('/words-contains?category=4')],
        ['@type' => 'ListItem', 'position' => 5, 'name' => '時間帯', 'url' => url('/words-contains?category=5')],
        ['@type' => 'ListItem', 'position' => 6, 'name' => '数字', 'url' => url('/words-contains?category=6')],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@section('content')
<div class="words-content">
    <nav class="nav flex-column custom-nav">
        <div class="nav-link" onclick="goToWordsContains(1)">
            <i class="bi bi-book"> 人、物</i>
        </div>
        <div class="nav-link" onclick="goToWordsContains(2)">
            <i class="bi bi-question-circle"> 前置詞</i>
        </div>
        <div class="nav-link" onclick="goToWordsContains(3)">
            <i class="bi bi-book"> 動詞・副詞・形容詞など</i>
        </div>
        <div class="nav-link" onclick="goToWordsContains(4)">
            <i class="bi bi-pencil"> 方向</i>
        </div>
        <div class="nav-link" onclick="goToWordsContains(5)">
            <i class="bi bi-pencil-square"> 時間帯</i>
        </div>
        <div class="nav-link" onclick="goToWordsContains(6)">
            <i class="bi bi-pencil-square"> 数字</i>
        </div>
    </nav>
</div>

<script src="/js/words.js"></script>
@endsection
