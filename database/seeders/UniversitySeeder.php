<?php

namespace Database\Seeders;

use App\Models\University;
use Illuminate\Database\Seeder;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'ABC University',
                'link' => '#',
                'image' => 'images/brand-1.png',
                'country_id' => 1,
            ],
            [
                'name' => 'XYZ University',
                'link' => '#',
                'image' => 'images/brand-2.png',
                'country_id' => 2,
            ],
            [
                'name' => 'PQR University',
                'link' => '#',
                'image' => 'images/brand-3.png',
                'country_id' => 3,
            ],
            [
                'name' => 'STU University',
                'link' => '#',
                'image' => 'images/brand-4.png',
                'country_id' => 4,
            ],
            [
                'name' => 'VWX University',
                'link' => '#',
                'image' => 'images/brand-5.png',
                'country_id' => 5,
            ],
            [
                'name' => 'DEF University',
                'link' => '#',
                'image' => 'images/brand-6.png',
                'country_id' => 6,
            ],
            [
                'name' => 'GHI University',
                'link' => '#',
                'image' => 'images/brand-7.png',
                'country_id' => 7,
            ],
            [
                'name' => 'JKL University',
                'link' => '#',
                'image' => 'images/brand-2.png',
                'country_id' => 8,
            ],
            [
                'name' => 'MNO University',
                'link' => '#',
                'image' => 'images/brand-7.png',
                'country_id' => 1,
            ],
            [
                'name' => 'QRS University',
                'link' => '#',
                'image' => 'images/brand-3.png',
                'country_id' => 1,
            ],
            [
                'name' => 'TUV University',
                'link' => '#',
                'image' => 'images/brand-6.png',
                'country_id' => 2,
            ],
            [
                'name' => 'WXY University',
                'link' => '#',
                'image' => 'images/brand-5.png',
                'country_id' => 3,
            ],
            [
                'name' => 'ZAB University',
                'link' => '#',
                'image' => 'images/brand-4.png',
                'country_id' => 4,
            ],
        ];

        foreach ($data as $value) {
            University::updateOrCreate(['name' => $value['name']], $value);
        }
    }
}
