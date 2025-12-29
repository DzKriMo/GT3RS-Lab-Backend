<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Build;
use Illuminate\Support\Facades\Auth;

class BuildController extends Controller
{
    public function index()
    {
        return response()->json(Build::with('user')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'part_ids' => 'required|array',
            'total_downforce' => 'required|numeric',
            'total_top_speed' => 'required|numeric',
            'lap_time' => 'required|string'
        ]);

        $build = Build::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'part_ids' => $request->part_ids,
            'total_downforce' => $request->total_downforce,
            'total_top_speed' => $request->total_top_speed,
            'lap_time' => $request->lap_time
        ]);

        if (Auth::check()) {
            $user = Auth::user();
            $user->xp += 200; // XP for saving a build
            $user->save();
        }

        return response()->json($build);
    }
}
