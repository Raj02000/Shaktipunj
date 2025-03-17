<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Nepal', 'description' => '', 'image' => ''],
            ['name' => 'Tibet', 'description' => '', 'image' => ''],
            ['name' => 'Bhutan', 'description' => '', 'image' => ''],
        ];

        foreach ($data as $item) {
            \App\Models\Destination::updateOrCreate(['name' => $item['name']], $item);
        }
    }
}
