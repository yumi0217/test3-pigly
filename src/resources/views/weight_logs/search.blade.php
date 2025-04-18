@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">

    <div class="container">
        <h1>検索結果</h1>

        @if ($weightLogs->isEmpty())
            <p class="no-results">該当する記録が見つかりませんでした。</p>
        @else
            <table class="record-table">
                <thead>
                    <tr>
                        <th>日付</th>
                        <th>体重(kg)</th>
                        <th>食事量(kcal)</th>
                        <th>運動時間</th>
                        <th>運動内容</th>
                        <th>編集</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($weightLogs as $log)
                        <tr>
                            <td>{{ $log->date }}</td>
                            <td>{{ $log->weight }}</td>
                            <td>{{ $log->calories ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::createFromFormat('H:i:s', $log->exercise_time)->format('H:i') }}</td>
                            <td>{{ $log->exercise_content ?? '-' }}</td>
                            <td><a href="{{ route('weight_logs.edit', $log->id) }}" class="edit-btn">✏</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pagination">
                {{ $weightLogs->links('vendor.pagination.default') }}
            </div>
        @endif
    </div>
@endsection