@extends('layouts.app')

@section('title', '体重記録の詳細')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">

    <div class="show-container">
        <h2>体重記録の詳細</h2>

        <div class="record-detail">
            <p><strong>日付：</strong>{{ $weightLog->recorded_at }}</p>
            <p><strong>体重：</strong>{{ $weightLog->weight }} kg</p>
            <p><strong>運動時間：</strong>{{ $weightLog->exercise_time }} 分</p>
            <p><strong>メモ：</strong>{{ $weightLog->memo ?? 'なし' }}</p>
        </div>

        <div class="actions">
            <a href="{{ route('weight_logs.index') }}" class="back-btn">← 一覧に戻る</a>
            <a href="{{ route('weight_logs.edit', $weightLog->id) }}" class="edit-btn">✏ 編集する</a>
        </div>
    </div>
@endsection