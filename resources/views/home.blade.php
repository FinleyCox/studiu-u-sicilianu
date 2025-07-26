@extends('app')

@section('content')
<link href="/css/home.css" rel="stylesheet">
<div class="home-content">
    <nav class="nav flex-column custom-nav">
        <a class="nav-link" href="/quiz">
            <i class="bi bi-question-circle"></i>
            <span>単語クイズ</span>
        </a>
        <a class="nav-link" href="/conjugation">
            <i class="bi bi-book"></i>
            <span>動詞の活用</span>
        </a>
        <a class="nav-link" href="/words">
            <i class="bi bi-pencil"></i>
            <span>単語</span>
        </a>
        @auth
        <a class="nav-link" href="/favourites">
            <i class="bi bi-heart"></i>
            <span>お気に入り</span>
        </a>
        @endauth
    </nav>
</div>

@endsection 