<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WeightLogsTableSeeder extends Seeder
{
    public function index()
    {
        $user = Auth::user();
        $weightLogs = WeightLog::where('user_id', $user->id)
            ->orderBy('date', 'desc')
            ->paginate(10);

        foreach ($weightLogs as $log) {
            // 運動時間（例: 128 → 2時間8分）
            if ($log->exercise_time) {
                $hours = floor($log->exercise_time / 60);
                $minutes = $log->exercise_time % 60;
                $log->exercise_time_display = ($hours ? $hours . '時間' : '') . ($minutes ? $minutes . '分' : '');
            } else {
                $log->exercise_time_display = '-';
            }

            // 体重を1桁小数で表示（例: 55.0）
            $log->weight_display = number_format($log->weight, 1);

            // 日付を「Y年m月d日」形式に整形
            $log->date_display = \Carbon\Carbon::parse($log->date)->format('Y年m月d日');
        }

        return view('weight_logs.index', compact('weightLogs'));
    }

}