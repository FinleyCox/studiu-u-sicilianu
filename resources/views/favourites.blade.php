{{-- FAVOURITES VIEW --}}
{{-- 
@extends('app')

@section('content')
<div class="favourites-content">
    <h2>Favourites</h2>
    <p>保存した単語とフレーズ</p>
    
    <!-- メッセージ表示エリア -->
    <div id="messageArea" class="alert" style="display: none;"></div>
    
    <div class="favourites-list" id="favouritesList" data-userid="{{ Auth::id() ?? 0 }}">
        <!-- お気に入りがここに読み込まれます -->
    </div>
    
    <!-- ページネーション -->
    <div id="pagination" class="d-flex justify-content-center mt-4">
        <!-- ページネーションがここに読み込まれます -->
    </div>
</div>

<script src="/js/favourites.js"></script>
@endsection 
--}}