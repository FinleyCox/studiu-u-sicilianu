@extends('app')

@section('content')
<div class="favourites-content">
    <h2>Favourites</h2>
    <p>保存した単語とフレーズ</p>
    
    <!-- メッセージ表示エリア -->
    <div id="messageArea" class="alert" style="display: none;"></div>
    
    <div class="favourites-list" id="favouritesList" data-userid="{{ Auth::id() }}">
        <!-- お気に入りコンテンツがここに読み込まれます -->
        <div class="text-center">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">読み込み中...</span>
            </div>
        </div>
    </div>
</div>

<script src="/js/favourites.js"></script>
@endsection 