@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/auth/register_step1.css') }}">
@endsection

@section('content')
    <div class="auth-container">
        <h1 class="logo">PiGly</h1>
        <h2 class="title">新規会員登録</h2>
        <div class="step">STEP1 アカウント情報の登録</div>

        <form method="POST" action="{{ route('register.step1.post') }}">
            @csrf

            <label for="name">名前</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
            @error('name')
                <p class="error">{{ $message }}</p>
            @enderror

            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <p class="error">{{ $message }}</p>
            @enderror

            <label for="password">パスワード</label>
            <input type="password" name="password" required>
            <input type="password" name="password_confirmation" required>
            @error('password')
                <p class="error">{{ $message }}</p>
            @enderror

            <button type="submit">次に進む</button>

            <div class="link">
                <a href="{{ route('login') }}">ログインはこちら</a>
            </div>
        </form>
    </div>
@endsection