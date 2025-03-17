<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::updateOrCreate([
            'name' => 'Best Seller',
            'slug' => 'best-seller',
            'is_editable' => 0,
        ]);

        Category::updateOrCreate([
            'name' => 'Trending Packages',
            'slug' => 'trending-packages',
            'is_editable' => 0,
        ]);
    }
}
