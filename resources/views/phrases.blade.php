@extends('app')

@section('content')

<link rel="stylesheet" href="/css/phrases.css">
<body data-userid="{{ Auth::id() ?? 0 }}">
<div class="phrases-content">
    <p>Learn common Sicilian phrases</p>
    
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
    <!-- AdSense広告エリア -->
    <div class="ad-container">
        <ins class="adsbygoogle"
            style="display:block"
            data-ad-client="ca-pub-5173189590303230"
            data-ad-slot="YOUR_AD_SLOT_ID"
            data-ad-format="auto"
            data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
</body>

<script src="/js/phrases.js"></script>
@endsection 