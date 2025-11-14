{{-- USER MENU VIEW --}}
{{-- 
@extends('app')

@section('content')
<link href="/css/user-menu.css" rel="stylesheet">

<div class="user-menu-content">
    <h2>User Menu</h2>
    
    @auth
    <div class="user-info card mb-4">
        <div class="card-body">
            <h5 class="card-title">ユーザー情報</h5>
            <p class="card-text">
                <strong>ユーザー名:</strong> {{ Auth::user()->name }}<br>
                <strong>メールアドレス:</strong> {{ Auth::user()->email }}<br>
                <strong>登録日:</strong> {{ Auth::user()->created_at->format('Y年m月d日') }}
            </p>
        </div>
    </div>
    
    <div class="user-actions">
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="bi bi-graph-up text-success" style="font-size: 2rem;"></i>
                        <h5 class="card-title mt-2">学習統計</h5>
                        <p class="card-text">学習の進捗を確認</p>
                        <button class="btn btn-outline-success" disabled>準備中</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="account-actions mt-4">
        <div class="card border-warning">
            <div class="card-header bg-warning text-dark">
                <h5 class="mb-0">⚠️ 危険な操作</h5>
            </div>
            <div class="card-body">
                <p class="card-text">アカウントを削除すると、すべてのデータが失われます。この操作は取り消せません。</p>
                <button class="btn btn-danger" onclick="confirmDeleteAccount()">アカウントを削除</button>
            </div>
        </div>
    </div>
    
    <div class="logout-section mt-4">
        <form method="POST" action="/logout" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-outline-secondary">
                <i class="bi bi-box-arrow-right"></i> ログアウト
            </button>
        </form>
    </div>
    
    @else
    <div class="alert alert-info">
        <h4>ログインが必要です</h4>
        <p>このページを利用するには、ログインが必要です。</p>
        <a href="/login" class="btn btn-primary">ログイン</a>
        <a href="/register" class="btn btn-outline-primary">新規登録</a>
    </div>
    @endauth
</div>

<script>
function confirmDeleteAccount() {
    if (confirm('本当にアカウントを削除しますか？この操作は取り消せません。')) {
        if (confirm('最後の確認です。アカウントを削除しますか？')) {
            // アカウント削除の処理
            fetch('/delete-account', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('アカウントが削除されました。');
                    window.location.href = '/';
                } else {
                    alert('エラーが発生しました: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('エラーが発生しました。');
            });
        }
    }
}
</script>

@endsection 
--}}
