@extends('app')

@php
    $categoryNames = [
        1 => '人・物',
        2 => '前置詞',
        3 => '動詞・副詞・形容詞など',
        4 => '方向',
        5 => '時間帯',
        6 => '数字',
    ];
    $categoryId = (int) request('category');
    $categoryName = $categoryNames[$categoryId] ?? 'シチリア語単語';
@endphp

@section('title', $categoryName . 'のシチリア語単語 - studiu u sicilianu')
@section('description', $categoryName . 'カテゴリーに属するシチリア語の語彙をまとめました。意味と使い方を確認しながら効率的に学習できます。')
@section('keywords', $categoryName . ' シチリア語, Sicilian vocabulary ' . $categoryName)
@section('canonical', request()->fullUrl())

@push('structured-data')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        [
            '@type' => 'ListItem',
            'position' => 1,
            'name' => '単語学習',
            'item' => route('words'),
        ],
        [
            '@type' => 'ListItem',
            'position' => 2,
            'name' => $categoryName,
            'item' => request()->fullUrl(),
        ],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@section('content')
<link rel="stylesheet" href="/css/words.css">
<div class="words-contains-content">
    <h2>Words Category : {{ $categoryName }}</h2>
    
    <div class="word-list" id="wordList" data-category="{{ request('category') }}">
        <!-- Words will be loaded here -->
    </div>
</div>

<script src="/js/words-contains.js"></script>
@endsection
