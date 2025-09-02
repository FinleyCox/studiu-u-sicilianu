@extends('app')

@section('content')
<link rel="stylesheet" href="/css/words.css">
<div class="words-contains-content">
    <h2>Words Category : @php
        $categoryNames = [
            1 => '人・物',
            2 => '前置詞',
            3 => '動詞・副詞・形容詞など',
            4 => '方向',
            5 => '時間帯',
            6 => '数字'
        ];
        echo $categoryNames[request('category')] ?? 'Unknown';
    @endphp</h2>
    
    <!-- メッセージ表示エリア -->
    <div id="messageArea" class="alert" style="display: none;"></div>
    
    <div class="word-list" id="wordList" data-category="{{ request('category') }}" data-userid="{{ Auth::id() ?? 0 }}">
        <!-- Words will be loaded here -->
    </div>
</div>

<script src="/js/words-contains.js"></script>
@endsection 