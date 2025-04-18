<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterStep1Request;
use App\Http\Requests\RegisterStep2Request;
use App\Models\User;
use App\Models\WeightTarget;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // STEP1: ユーザー基本情報の登録画面表示
    public function showStep1()
    {
        return view('auth.register_step1');
    }

    // ✅ STEP1: ユーザー基本情報登録処理（ルート名に合わせてメソッド名を修正）
    public function submitStep1(RegisterStep1Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('register.step2');
    }

    // STEP2: 目標体重登録画面表示
    public function showStep2()
    {
        return view('auth.register_step2');
    }

    // ✅ STEP2: 目標体重登録処理（ルート名に合わせてメソッド名を修正）
    public function submitStep2(RegisterStep2Request $request)
    {
        WeightTarget::create([
            'user_id' => Auth::id(),
            'target_weight' => $request->target_weight,
        ]);

        return redirect()->route('dashboard');
    }
}
