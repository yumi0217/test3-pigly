<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\WeightLog;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $weightLogs = WeightLog::where('user_id', $user->id)
            ->orderBy('date', 'desc')
            ->paginate(10);

        return view('weight_logs.index', compact('weightLogs'));
    }
}
