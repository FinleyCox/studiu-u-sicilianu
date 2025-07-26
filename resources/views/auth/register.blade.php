@extends('app')

@section('content')
<div class="register-form">
    <h2>Register</h2>
    
    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <form method="POST" action="{{ route('register.post') }}">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">ユーザー名</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" required>
            @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="email" class="form-label">メールアドレス</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="password" class="form-label">パスワード</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">登録</button>
    </form>
    
    <div class="mt-3">
        既にアカウントをお持ちの方 <a href="/login">ログイン</a>
    </div>
</div>
@endsection 