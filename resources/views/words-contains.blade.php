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
    $categoryId = $categoryId ?? (int) request('category');
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
    <h2 class="mb-4">{{ $categoryName }} の単語一覧</h2>
    <p class="text-muted">シチリア語：イタリア語読み（日本語訳）の順で表示しています。</p>

    <div class="row row-cols-1 row-cols-md-2 g-3">
        @forelse ($words as $word)
            <div class="col">
                <div class="card h-100 word-item">
                    <div class="card-body text-center">
                        <h5 class="card-title mb-2">{{ $word->sicilian }}</h5>
                        <p class="card-text mb-0">{{ $word->japanese }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col">
                <div class="alert alert-secondary text-center">このカテゴリーにはまだ単語が登録されていません。</div>
            </div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $words->links() }}
    </div>
</div>

<noscript>
    <div class="alert alert-info mt-4">JavaScriptを無効にしてもページ下部から全単語を閲覧できます。</div>
</noscript>
@endsection
