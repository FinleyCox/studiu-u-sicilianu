@extends('app')

@section('title', 'フレーズ学習 - studiu u sicilianu')
@section('description', '日常会話で使えるシチリア語フレーズをカテゴリー別に学習できます。音やニュアンスをイメージしながら繰り返し練習しましょう。')
@section('keywords', 'シチリア語 フレーズ, Sicilian phrases, シチリア語 会話, シチリア語 表現')
@section('canonical', route('phrases'))

@push('structured-data')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Course',
    'name' => 'Sicilian Phrase Collection',
    'description' => '日常会話で使うシチリア語フレーズを学べる無料教材',
    'provider' => [
        '@type' => 'Organization',
        'name' => 'studiu u sicilianu',
        'url' => url('/'),
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@section('content')
<link rel="stylesheet" href="/css/phrases.css">
<div class="phrases-content">
    <div class="phrase-list">
        @forelse ($phrases as $phrase)
            <article class="phrase-item card mb-3">
                <div class="card-body text-center">
                    <h5 class="card-title mb-2">{{ $phrase->sicilian }}</h5>
                    <p class="card-text mb-0">{{ $phrase->japanese }}</p>
                </div>
            </article>
        @empty
            <p class="text-center text-muted my-5">フレーズがまだ登録されていません。</p>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $phrases->links() }}
    </div>
</div>

<noscript>
    <div class="alert alert-info mt-4">指定ページのフレーズは上記リストからそのまま閲覧できます。</div>
</noscript>
@endsection
