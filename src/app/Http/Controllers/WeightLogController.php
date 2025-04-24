<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class WeightLogController extends Controller
{
    // 一覧表示
    public function index()
    {
        $user = Auth::user();
        $weightLogs = WeightLog::where('user_id', $user->id)
            ->orderBy('date', 'desc')
            ->paginate(10);

        foreach ($weightLogs as $log) {
            $log->date_display = Carbon::parse($log->date)->format('Y年m月d日');
            $log->weight_display = number_format($log->weight, 1) . ' kg';
            $log->exercise_time_display = $log->exercise_time
                ? (floor($log->exercise_time / 60) ? floor($log->exercise_time / 60) . '時間' : '') .
                ($log->exercise_time % 60 ? $log->exercise_time % 60 . '分' : '')
                : '-';
        }

        return view('weight_logs.index', compact('weightLogs'));
    }

    // 登録フォーム表示
    public function create()
    {
        return view('weight_logs.create');
    }

    // 新規登録処理
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'weight' => 'required|numeric|between:0,999.9',
            'calories' => 'nullable|integer',
            'exercise_time' => 'nullable',
            'exercise_content' => 'nullable|string',
        ]);

        WeightLog::create([
            'user_id' => Auth::id(),
            'date' => $request->date,
            'weight' => $request->weight,
            'calories' => $request->calories,
            'exercise_time' => $request->exercise_time,
            'exercise_content' => $request->exercise_content,
        ]);

        return redirect('/weight_logs')->with('success', '体重記録を追加しました');
    }

    // 詳細表示
    public function show($id)
    {
        $log = WeightLog::findOrFail($id);
        $this->authorize('view', $log);

        return view('weight_logs.show', compact('log'));
    }

    // 編集フォーム表示
    public function edit($id)
    {
        $log = WeightLog::findOrFail($id);
        $this->authorize('update', $log);

        return view('weight_logs.edit', compact('log'));
    }

    // 更新処理
    public function update(Request $request, $id)
    {
        $log = WeightLog::findOrFail($id);
        $this->authorize('update', $log);

        $request->validate([
            'date' => 'required|date',
            'weight' => 'required|numeric|between:0,999.9',
            'calories' => 'nullable|integer',
            'exercise_time' => 'nullable',
            'exercise_content' => 'nullable|string',
        ]);

        $log->update($request->all());

        return redirect()->route('weight_logs.index')->with('success', '体重記録を更新しました');
    }

    // 削除処理
    public function destroy($id)
    {
        $log = WeightLog::findOrFail($id);
        $this->authorize('delete', $log);
        $log->delete();

        return redirect('/weight_logs')->with('success', '体重記録を削除しました');
    }
}
