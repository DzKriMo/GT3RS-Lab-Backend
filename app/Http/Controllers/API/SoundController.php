<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Sound;

class SoundController extends Controller
{
    public function index()
    {
        return response()->json(Sound::all());
    }

    public function random()
    {
        return response()->json(Sound::inRandomOrder()->first());
    }
}
