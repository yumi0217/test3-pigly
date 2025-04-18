@extends('layouts.app')

@section('title', '管理画面')

@php
    $css = 'weight_logs/index.css';
@endphp

@section('content')
    <div class="container">
        <h1>{{ Auth::user()->name }}さんの管理画面</h1>

        <div class="nav-links">
            <a href="{{ route('weight_logs.index') }}">体重記録</a>
            <a href="{{ route('weight_logs.create') }}">体重登録</a>
            <a href="{{ route('weight_logs.search') }}">体重検索</a>
            <a href="{{ route('target_weight.edit') }}">目標体重の変更</a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="logout-btn">ログアウト</button>
            </form>
        </div>

        <table class="record-table">
            <thead>
                <tr>
                    <th>日付</th>
                    <th>体重</th>
                    <th>運動時間</th>
                    <th>運動内容</th>
                    <th>編集</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($weightLogs as $log)
                    <tr>
                        <td>{{ $log->date_display }}</td>
                        <td>{{ $log->weight_display }}</td>
                        <td>{{ $log->exercise_time_display }}</td>
                        <td>{{ $log->exercise_content }}</td>
                        <td>
                            <a href="{{ route('weight_logs.edit', $log->id) }}" class="edit-btn" aria-label="編集">✏</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pagination">
            {{ $weightLogs->links() }}
        </div>
    </div>
@endsection