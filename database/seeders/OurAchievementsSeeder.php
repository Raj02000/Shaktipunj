<?php

namespace Database\Seeders;

use App\Models\OurAchievements;
use Illuminate\Database\Seeder;

class OurAchievementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OurAchievements::updateOrCreate([
            'title' => 'Happy Student',
            'value' => 340,
            'postfix' => '+',
        ]);
        OurAchievements::updateOrCreate([
            'title' => 'University Partners',
            'value' => 150,
        ]);
        OurAchievements::updateOrCreate([
            'title' => 'Countries',
            'value' => 40,
            'postfix' => '+',
        ]);
        OurAchievements::updateOrCreate([
            'title' => 'Immigrations',
            'value' => 99,
            'postfix' => '%',
        ]);
    }
}
