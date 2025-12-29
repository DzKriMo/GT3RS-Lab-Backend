<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Score;
use App\Models\Sound;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function getSoundGame()
    {
        $correct = Sound::inRandomOrder()->first();
        $options = Sound::where('id', '!=', $correct->id)->inRandomOrder()->limit(3)->get()->push($correct)->shuffle();
        
        return response()->json([
            'correct_sound' => $correct,
            'options' => $options
        ]);
    }

    public function submitScore(Request $request)
    {
        $request->validate([
            'game_type' => 'required|string',
            'score' => 'required|integer',
            'metadata' => 'nullable|array'
        ]);

        $score = Score::create([
            'user_id' => Auth::id(),
            'game_type' => $request->game_type,
            'score' => $request->score,
            'metadata' => $request->metadata
        ]);

        // Award XP
        if (Auth::check()) {
            $user = Auth::user();
            $xpGained = $this->calculateXP($request->game_type, $request->score);
            $user->xp += $xpGained;
            $user->rank = $this->calculateRank($user->xp);
            $user->save();
        }

        return response()->json(['score' => $score, 'user' => Auth::user()]);
    }

    private function calculateXP($gameType, $score)
    {
        if ($gameType === 'sound-guess') return 100;
        if ($gameType === 'reaction') return max(0, 500 - $score); // Faster reaction = more XP
        return 50;
    }

    private function calculateRank($xp)
    {
        if ($xp > 10000) return 'Weissach Psychopath';
        if ($xp > 5000) return 'RS Addict';
        if ($xp > 2000) return 'GT3 Enjoyer';
        return 'Carrera Casual';
    }
}
