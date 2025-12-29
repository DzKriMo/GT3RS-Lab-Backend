<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Score;
use App\Models\User;

class LeaderboardController extends Controller
{
    public function global()
    {
        return response()->json(User::orderBy('xp', 'desc')->limit(10)->get());
    }

    public function game($type)
    {
        return response()->json(
            Score::with('user')
                ->where('game_type', $type)
                ->orderBy('score', $type === 'reaction' ? 'asc' : 'desc')
                ->limit(10)
                ->get()
        );
    }
}
