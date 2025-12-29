<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $parts = [
            [
                'name' => 'Weissach Package',
                'description' => 'Carbon fiber roof, anti-roll bars, and coupling rods for maximum weight reduction.',
                'category' => 'Aero',
                'downforce_impact' => 50,
                'weight_reduction' => 22, // kg
                'price' => 33520
            ],
            [
                'name' => 'Swan Neck Rear Wing',
                'description' => 'Active aerodynamics providing massive downforce in corners.',
                'category' => 'Aero',
                'downforce_impact' => 400, // kg at 285 km/h
                'top_speed_impact' => -10,
                'price' => 15000
            ],
            [
                'name' => 'Michelin Cup 2 R',
                'description' => 'Ultra-high performance track tires for maximum mechanical grip.',
                'category' => 'Tires',
                'acceleration_impact' => 0.2, // s improvement 0-100
                'price' => 2500
            ],
            [
                'name' => 'PDK 7-Speed Transmission',
                'description' => 'Lightning-fast gear changes optimized for track performance.',
                'category' => 'Transmission',
                'acceleration_impact' => 0.5,
                'price' => 0 // Standard, but can be configured
            ],
            [
                'name' => 'Magnesium Wheels',
                'description' => 'Ultra-lightweight wheels reducing unsprung mass.',
                'category' => 'Wheels',
                'weight_reduction' => 8,
                'acceleration_impact' => 0.1,
                'price' => 12000
            ]
        ];

        foreach ($parts as $part) {
            \App\Models\Part::create($part);
        }
    }
}
