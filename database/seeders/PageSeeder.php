<?php

namespace Database\Seeders;

use App\Enums\PageModelEnum;
use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::updateOrCreate([
            'slug' => 'our-teams',
        ], [
            'title' => 'Our Teams',
            'slug' => 'our-teams',
            'model' => PageModelEnum::COMPANY_INFO,
        ]);
    }
}
