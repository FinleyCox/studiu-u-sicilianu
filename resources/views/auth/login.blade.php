@extends('app')

@section('content')
<div class="login-form">
    <h2>Login</h2>
    
    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <form method="POST" action="{{ route('login.post') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">メールアドレス</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
            <div class="invalid-feedback">メールアドレスまたはパスワードが正しくありません</div>
        @enderror
        </div>
        
        <div class="mb-3">
            <label for="password" class="form-label">パスワード</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <label class="form-check-label" for="remember">Remember me</label>
        </div>
        
        <button type="submit" class="btn btn-primary">ログイン</button>
    </form>
    
    <div class="mt-3">
        <a href="/forgot-password">パスワードを忘れた方</a>
    </div>
    
    <div class="mt-3">
        アカウントをお持ちでない方 <a href="/register">新規登録</a>
    </div>
</div>
@endsection 