@extends('app')

@section('title', 'フレーズ学習 - studiu u sicilianu')
@section('description', '日常会話で使えるシチリア語フレーズをカテゴリー別に学習できます。音やニュアンスをイメージしながら繰り返し練習しましょう。')
@section('keywords', 'シチリア語 フレーズ, Sicilian phrases, シチリア語 会話, シチリア語 表現')
@section('canonical', route('phrases'))
@section('body_attributes')
data-userid="{{ Auth::id() ?? 0 }}"
@endsection

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
    <!-- メッセージ表示エリア -->
    <div id="messageArea" class="alert" style="display: none;"></div>

    <div class="phrase-list" id="phraseList" data-userid="{{ Auth::id() ?? 0 }}">
        <!-- フレーズがここに読み込まれます -->
    </div>

    <!-- ページネーション -->
    <div id="pagination" class="d-flex justify-content-center mt-4">
        <!-- ページネーションがここに読み込まれます -->
    </div>
</div>

<script src="/js/phrases.js"></script>
@endsection
