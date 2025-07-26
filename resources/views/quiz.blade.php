@extends('app')

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