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
    @foreach ($categories as $category)
        <section class="category-card card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <div>
                        <h3 class="mb-1">{{ $loop->iteration }}. {{ $category['title'] }}</h3>
                        <p class="text-muted mb-3">{{ $category['description'] }}</p>
                    </div>
                    <a class="btn btn-outline-primary" href="{{ route('words-contains', ['category' => $category['id']]) }}">
                        詳細を見る（全{{ $category['total'] }}語）
                    </a>
                </div>
                @if ($category['samples']->isNotEmpty())
                    <ul class="list-group list-group-flush">
                        @foreach ($category['samples'] as $word)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="fw-bold">{{ $word->sicilian }}</span>
                                <span class="text-muted">{{ $word->japanese }}</span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted mb-0">このカテゴリーの単語はまだ登録されていません。</p>
                @endif
            </div>
        </section>
    @endforeach

    <noscript>
        <div class="alert alert-info">JavaScriptを無効にしている場合でも上記リストから各カテゴリーの単語を閲覧できます。</div>
    </noscript>
</div>
@endsection
