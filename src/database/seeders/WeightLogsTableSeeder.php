<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WeightLog;

class WeightLogsTableSeeder extends Seeder
{
    public function run()
    {
        // user_id: 1 に紐づく体重記録を35件作成
        WeightLog::factory()->count(35)->create([
            'user_id' => 1,  // 必要に応じて変更
        ]);
    }
}
