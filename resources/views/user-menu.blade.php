@extends('app')

@section('content')
<link href="/css/user-menu.css" rel="stylesheet">

<div class="user-menu-content">
    <h2>User Menu</h2>
    
    @auth
    <div class="user-info card mb-4">
        <div class="card-body">
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
                        <i class="bi bi-heart text-danger mb-3" style="font-size: 2rem;"></i>
                        <h5 class="card-title">お気に入り</h5>
                        <p class="card-text">保存した単語とフレーズを確認</p>
                        <a href="/favourites" class="btn btn-primary">お気に入り一覧</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="bi bi-gear text-secondary mb-3" style="font-size: 2rem;"></i>
                        <h5 class="card-title">設定</h5>
                        <p class="card-text">アカウント設定を変更</p>
                        <button class="btn btn-secondary" disabled>設定（準備中）</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="danger-zone mt-4">
            <div class="card border-danger">
                <div class="card-header bg-danger text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-exclamation-triangle"></i> 危険な操作
                    </h5>
                </div>
                <div class="card-body">
                    <h6 class="card-title text-danger">アカウント削除</h6>
                    <p class="card-text">
                        アカウントを削除すると、すべてのデータ（お気に入り、学習履歴など）が完全に削除され、復元できません。
                        この操作は取り消すことができません。
                    </p>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                        <i class="bi bi-trash"></i> アカウントを削除
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- 退会確認モーダル -->
    <div class="modal" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteAccountModalLabel">
                        <i class="bi bi-exclamation-triangle"></i> アカウント削除の確認
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-danger"><strong>警告:</strong> この操作は取り消すことができません。</p>
                    <p>以下のデータがすべて削除されます：</p>
                    <ul>
                        <li>お気に入りに登録した単語・フレーズ</li>
                        <li>学習履歴</li>
                        <li>アカウント情報</li>
                    </ul>
                    <p>本当にアカウントを削除しますか？</p>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="confirmDelete">
                        <label class="form-check-label" for="confirmDelete">
                            上記の内容を理解し、アカウントの削除に同意します
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn" disabled>
                        <i class="bi bi-trash"></i> アカウントを削除
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    @else
    <div class="alert alert-warning">
        <i class="bi bi-exclamation-triangle"></i>
        ログインが必要です。
        <a href="/login" class="alert-link">ログイン</a>してください。
    </div>
    @endauth
</div>

@endsection 