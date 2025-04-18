@extends('layouts.app')

@section('title', '体重記録の登録')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">

    <div class="create-container">
        <h2>体重を記録する</h2>

        <form action="{{ route('weight_logs.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="recorded_at">日付</label>
                <input type="date" name="recorded_at" id="recorded_at" value="{{ old('recorded_at') }}" required>
            </div>

            <div class="form-group">
                <label for="weight">体重（kg）</label>
                <input type="number" step="0.1" name="weight" id="weight" value="{{ old('weight') }}" required>
            </div>

            <div class="form-group">
                <label for="exercise_time">運動時間（分）</label>
                <input type="number" name="exercise_time" id="exercise_time" value="{{ old('exercise_time') }}">
            </div>

            <div class="form-group">
                <label for="memo">メモ</label>
                <textarea name="memo" id="memo" rows="4">{{ old('memo') }}</textarea>
            </div>

            <div class="form-buttons">
                <button type="submit" class="submit-btn">記録する</button>
                <a href="{{ route('weight_logs.index') }}" class="cancel-btn">キャンセル</a>
            </div>
        </form>
    </div>
@endsection