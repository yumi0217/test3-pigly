<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightTarget;
use Illuminate\Support\Facades\Auth;

class TargetWeightController extends Controller
{
    public function edit()
    {
        $target = WeightTarget::where('user_id', Auth::id())->firstOrFail();
        return view('target_weight.edit', compact('target'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'target_weight' => 'required|numeric|between:0,999.9',
        ]);

        $target = WeightTarget::where('user_id', Auth::id())->firstOrFail();
        $target->update(['target_weight' => $request->target_weight]);

        return redirect()->route('dashboard')->with('success', '目標体重を更新しました');
    }
}
