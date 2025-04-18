<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WeightLogController;
use App\Http\Controllers\TargetWeightController;
use App\Http\Controllers\DashboardController;

// 認証関連
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 会員登録（2ステップ）
Route::get('/register/step1', [RegisterController::class, 'showStep1'])->name('register.step1');
Route::post('/register/step1', [RegisterController::class, 'submitStep1'])->name('register.step1.post');

Route::get('/register/step2', [RegisterController::class, 'showStep2'])->name('register.step2');
Route::post('/register/step2', [RegisterController::class, 'submitStep2'])->name('register.step2.post');

// 管理画面（ログイン後） ※ログイン済ユーザーのみアクセス可
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ダッシュボード（トップページ）
    Route::get('/weight_logs', [WeightLogController::class, 'index'])->name('weight_logs.index');

    // 体重登録
    Route::get('/weight_logs/create', [WeightLogController::class, 'create'])->name('weight_logs.create');
    Route::post('/weight_logs/create', [WeightLogController::class, 'store']);

    // 体重検索
    Route::get('/weight_logs/search', [WeightLogController::class, 'search'])->name('weight_logs.search');

    // 体重詳細
    Route::get('/weight_logs/{id}', [WeightLogController::class, 'show'])->name('weight_logs.show');

    // 体重更新
    Route::post('/weight_logs/{id}/update', [WeightLogController::class, 'update'])->name('weight_logs.update');
    // 体重更新
    Route::get('/weight_logs/{id}/edit', [WeightLogController::class, 'edit'])->name('weight_logs.edit'); // ←★この行を追加！
    Route::post('/weight_logs/{id}/update', [WeightLogController::class, 'update'])->name('weight_logs.update');


    // 体重削除
    Route::post('/weight_logs/{id}/delete', [WeightLogController::class, 'destroy'])->name('weight_logs.delete');

    // 目標体重設定
    Route::get('/weight_logs/goal_setting', [TargetWeightController::class, 'show'])->name('weight_logs.goal_setting');
    Route::post('/weight_logs/goal_setting', [TargetWeightController::class, 'update']);

    Route::get('/target_weight/edit', [TargetWeightController::class, 'edit'])->name('target_weight.edit');
    Route::post('/target_weight/update', [TargetWeightController::class, 'update'])->name('target_weight.update');
});
