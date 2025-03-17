<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Organization::updateOrCreate([
            'name' => 'ShaktiPunj',
            'address' => 'Putalisdak-28, kathmandu',
            'phone' => '9851325781',
            'alt_phone' => '9851325781',
            'whatsapp_phone' => '9851325781',
            'email' => 'info@nepaladventureguide.com',
            'facebook' => '',
            'linkedIn' => '',
            'instagram' => '',
            'twitter' => '',
        ]);
    }
}
