<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'image' => 'images/review-author-1.jpg',
                'name' => 'John Doe',
                'qualification' => 'Founder & CEO',
                'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempus, sapien id volutpat dictum, nunc lectus bibendum purus, in consectetur arcu velit vel nunc.',
            ],
            [
                'image' => 'images/review-author-2.jpg',
                'name' => 'Jane Doe',
                'qualification' => 'Project Manager',
                'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempus, sapien id volutpat dictum, nunc lectus bibendum purus, in consectetur arcu velit vel nunc.',
            ],
            [
                'image' => 'images/review-author-3.jpg',
                'name' => 'Mark Smith',
                'qualification' => 'Marketing Specialist',
                'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempus, sapien id volutpat dictum, nunc lectus bibendum purus, in consectetur arcu velit vel nunc.',
            ],
            [
                'image' => 'images/review-author-4.jpg',
                'name' => 'Sarah Wilson',
                'qualification' => 'Product Manager',
                'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempus, sapien id volutpat dictum, nunc lectus bibendum purus, in consectetur arcu velit vel nunc.',
            ],
            [
                'image' => 'images/review-author-5.jpg',
                'name' => 'James Wilson',
                'qualification' => 'Software Engineer',
                'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempus, sapien id volutpat dictum, nunc lectus bibendum purus, in consectetur arcu velit vel nunc.',
            ],
        ];

        foreach ($data as $item) {
            \App\Models\Testimonial::updateOrCreate($item);
        }
    }
}
