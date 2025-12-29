<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SoundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sounds = [
            ['model' => '911 GT3 RS', 'generation' => '992', 'type' => 'idle', 'file_url' => '/sounds/992_gt3rs_idle.mp3'],
            ['model' => '911 GT3 RS', 'generation' => '992', 'type' => 'rev', 'file_url' => '/sounds/992_gt3rs_rev.mp3'],
            ['model' => '911 GT3 RS', 'generation' => '992', 'type' => 'flyby', 'file_url' => '/sounds/992_gt3rs_flyby.mp3'],
            ['model' => '911 GT3 RS', 'generation' => '991.2', 'type' => 'idle', 'file_url' => '/sounds/991_2_gt3rs_idle.mp3'],
            ['model' => '911 GT3 RS', 'generation' => '991.2', 'type' => 'rev', 'file_url' => '/sounds/991_2_gt3rs_rev.mp3'],
            ['model' => '911 GT2 RS', 'generation' => '991', 'type' => 'rev', 'file_url' => '/sounds/991_gt2rs_rev.mp3'],
        ];

        foreach ($sounds as $sound) {
            \App\Models\Sound::create($sound);
        }
    }
}
