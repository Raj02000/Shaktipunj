<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HomeBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'image' => 'images/slider/slide-1.jpg',
                'sub_title' => 'Welcome to ShaktiPunj',
                'title' => 'Kathmandu Cultural Tour',
                'description' => 'Explore many Temples, Stupas, and World Heritage Sites.',
            ],
            [
                'image' => 'images/slider/slide-2.jpg',
                'sub_title' => 'We have 20+ years experience in',
                'title' => 'A trip of a lifetime',
                'description' => 'A trip of a lifetime.',
            ],

        ];

        foreach ($data as $item) {
            \App\Models\HomeBanner::updateOrCreate(['title' => $item['title']], $item);
        }
    }
}
