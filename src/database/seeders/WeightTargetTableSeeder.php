<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WeightTargetTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('weight_target')->insert([
            'user_id' => 1,
            'target_weight' => 55.5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}