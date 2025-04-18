@extends('layouts.app')

@section('title', '目標体重の設定')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/goal_setting.css') }}">

    <div class="goal-setting-container">
        <h2>目標体重の変更</h2>

        <form action="{{ route('weight_logs.goal_setting.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="goal_weight">目標体重（kg）</label>
                <input type="number" step="0.1" name="goal_weight" id="goal_weight"
                    value="{{ old('goal_weight', $goal_weight ?? '') }}" required>
            </div>

            <button type="submit" class="submit-btn">更新する</button>
        </form>

        <div class="back-link">
            <a href="{{ route('weight_logs.index') }}">← 戻る</a>
        </div>
    </div>
@endsection