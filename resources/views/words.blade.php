@extends('app')

@section('content')
<body data-userid="{{ Auth::id() ?? 0 }}">
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
</body>

<script src="/js/words.js"></script>
@endsection 