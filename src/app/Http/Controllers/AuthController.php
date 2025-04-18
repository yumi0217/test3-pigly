<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterStep1Request;
use App\Http\Requests\RegisterStep2Request;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\WeightTarget;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // 会員登録 STEP1 - 表示
    public function showRegisterStep1()
    {
        return view('auth.register_step1');
    }

    // 会員登録 STEP1 - 処理
    public function postRegisterStep1(RegisterStep1Request $request)
    {
        // セッションに一時保存（STEP2で使う）
        session([
            'register.name' => $request->name,
            'register.email' => $request->email,
            'register.password' => Hash::make($request->password),
        ]);
        return redirect()->route('register.step2');
    }

    // 会員登録 STEP2 - 表示
    public function showRegisterStep2()
    {
        if (!session()->has('register.name')) {
            return redirect()->route('register.step1'); // STEP1経由でなければ戻す
        }
        return view('auth.register_step2');
    }

    // 会員登録 STEP2 - 処理
    public function postRegisterStep2(RegisterStep2Request $request)
    {
        $user = User::create([
            'name' => session('register.name'),
            'email' => session('register.email'),
            'password' => session('register.password'),
        ]);

        // 目標体重登録
        WeightTarget::create([
            'user_id' => $user->id,
            'initial_weight' => $request->initial_weight,
            'target_weight' => $request->target_weight,
        ]);

        // ログイン状態にする
        Auth::login($user);

        // セッション削除
        session()->forget('register');

        return redirect()->route('dashboard');
    }

    // ログイン画面
    public function showLogin()
    {
        return view('auth.login');
    }
}
