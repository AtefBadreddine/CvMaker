<?php

namespace App\Http\Controllers;

use App\Models\CV;
use App\Models\User;
use App\Models\Visit;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {
        $counts = [
            'users' => User::where('id', '<>', auth()->id())->count(),
            'rmcvs' => CV::where('user_id', '=', auth()->id())->count(),
            'userscvs' => CV::where('user_id', '<>', auth()->id())->count(),
            'visits' => Visit::count()
        ];
        return view('dashboard.index', compact('counts'));
    }
}
