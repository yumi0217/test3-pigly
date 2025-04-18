@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/auth/register_step2.css') }}">
@endsection

@section('content')
    <div class="auth-container">
        <h1 class="logo">PiGly</h1>
        <h2 class="title">新規会員登録</h2>
        <div class="step">STEP2 体重データの入力</div>

        <form method="POST" action="{{ route('register.step2.post') }}">
            @csrf

            <label for="current_weight">現在の体重 (Kg)</label>
            <input type="text" id="current_weight" name="current_weight" value="{{ old('current_weight') }}">
            @error('current_weight')
                <p class="error">{{ $message }}</p>
            @enderror

            <label for="target_weight">目標体重 (Kg)</label>
            <input type="text" id="target_weight" name="target_weight" value="{{ old('target_weight') }}">
            @error('target_weight')
                <p class="error">{{ $message }}</p>
            @enderror

            <button type="submit">アカウント作成</button>
        </form>
    </div>
@endsection