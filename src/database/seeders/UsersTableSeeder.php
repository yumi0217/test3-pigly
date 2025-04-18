<?php

namespace Database\Seeders;

use App\Models\WeightLog; // ← 追加
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'テストユーザー',
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // 作成したユーザーを取得
        $user = User::where('email', 'test@example.com')->first();

        // weight_logs を30件作成して紐づけ
        WeightLog::factory()->count(30)->create([
            'user_id' => $user->id,
        ]);
    }
}