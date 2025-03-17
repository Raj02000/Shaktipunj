<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'Student screening',
                'short_description' => 'Matching you with the best educational opportunities through assessment.',
                'image' => '',
                'description' => '',
                'icon' => 'fas fa-user-check',
            ],
            [
                'title' => 'Application assistance',
                'short_description' => 'Streamlining your application process with expert guidance and support.',
                'image' => '',
                'description' => '',
                'icon' => 'fas fa-file-upload',
            ],
            [
                'title' => 'Document Guidance',
                'short_description' => 'Providing expert help to ensure your documents are accurate and complete.',
                'image' => '',
                'description' => '',
                'icon' => 'fas fa-book-open',
            ],
            [
                'title' => 'Student screening',
                'short_description' => 'Matching you with the best educational opportunities through assessment.',
                'image' => '',
                'description' => '',
                'icon' => 'fas fa-user-check',
            ],
            [
                'title' => 'Interview assistance',
                'short_description' => 'Offering expert support to help you prepare and succeed in your interviews.',
                'image' => '',
                'description' => '',
                'icon' => 'fas fa-user-tie',
            ],
            [
                'title' => 'Scholarship assistance',
                'short_description' => 'Helping you find and secure the right scholarships to fund your eduction.',
                'image' => '',
                'description' => '',
                'icon' => 'fas fa-hand-holding-usd',
            ],
            [
                'title' => 'Student Visa Declaration Form',
                'short_description' => 'Essential information and declarations for your student visa application.',
                'image' => '',
                'description' => '',
                'icon' => 'fas fa-file-signature',
            ],

        ];

        foreach ($data as $item) {
            \App\Models\Service::updateOrCreate(['title' => $item['title']], $item);
        }
    }
}
