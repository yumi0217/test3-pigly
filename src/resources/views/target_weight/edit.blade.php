@extends('layouts.app')

@section('title', '目標体重の設定')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
    <div class="target-weight-container">
        <h2>目標体重の設定</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('target_weight.update') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="target_weight">目標体重（kg）</label>
                <input type="number" step="0.1" name="target_weight" id="target_weight"
                    value="{{ old('target_weight', $target?->target_weight) }}" required>
                @error('target_weight')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn">更新する</button>
        </form>

        <div class="back-link">
            <a href="{{ route('dashboard') }}">← 管理画面へ戻る</a>
        </div>
    </div>
@endsection