<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Porsche Fan',
            'email' => 'porsche@fan.com',
            'password' => bcrypt('password'),
            'xp' => 1000,
            'rank' => 'GT3 Enjoyer'
        ]);

        $this->call([
            SoundSeeder::class,
            PartSeeder::class,
        ]);
    }
}
