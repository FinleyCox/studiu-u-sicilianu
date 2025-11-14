@extends('app')

@section('title', 'シチリア語クイズ - studiu u sicilianu')
@section('description', 'ランダムに出題されるシチリア語単語クイズで理解度をチェック。出題数を選んで語彙力を強化しましょう。')
@section('keywords', 'シチリア語 クイズ, Sicilian quiz, シチリア語 テスト, シチリア語 単語テスト')
@section('canonical', route('quiz'))

@push('structured-data')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Quiz',
    'name' => 'Sicilian Word Quiz',
    'about' => 'シチリア語の語彙を確認できるインタラクティブクイズ',
    'educationalLevel' => 'Beginner',
    'provider' => [
        '@type' => 'Organization',
        'name' => 'studiu u sicilianu',
        'url' => url('/'),
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@section('content')
<link href="/css/quiz.css" rel="stylesheet">
<div class="quiz-container" id="quiz">
    <div class="quiz-header">
        <h2>word quiz</h2>
        <div class="options">
            <select id="questionTimes" class="form-select form-select-lg mb-3 select" aria-label=".form-select-lg">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
            </select>
            <div class="question-counter">
                出題数: <span id="questionCount">0</span> / <span id="questionTimesDisplay">5</span>
            </div>
        </div>
    </div>
    
    <div id="question-container">
        <p class="question" id="question">
            <!-- Question will be loaded here -->
        </p>
        <div class="options" id="options">
            <!-- Options will be loaded here -->
        </div>
    </div>
</div>

<div id="result-container" style="display: none;">
    <h2>終了</h2>
    <p id="result-text">
        結果<br>
        正解：<span id="correct">0</span>
        不正解：<span id="incorrect">0</span>
    </p>
    <p>間違えた言葉</p>
    <ul id="incorrect-words">
        <!-- Incorrect words will be listed here -->
    </ul>
    <button type="button" onclick="tryAgain()" class="btn btn-primary">もう一度挑戦する</button>
</div>

</div>

<script src="/js/quiz.js"></script>
@endsection 
