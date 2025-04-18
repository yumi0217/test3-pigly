@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
@endsection

@section('content')
    <div class="auth-container">
        <h1 class="logo">PiGly</h1>
        <h2 class="title">ログイン</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <p class="error">{{ $message }}</p>
            @enderror

            <label for="password">パスワード</label>
            <input type="password" id="password" name="password">
            @error('password')
                <p class="error">{{ $message }}</p>
            @enderror

            <button type="submit">ログイン</button>

            <div class="link">
                <a href="{{ route('register.step1') }}">アカウント作成はこちら</a>
            </div>
        </form>
    </div>
@endsection