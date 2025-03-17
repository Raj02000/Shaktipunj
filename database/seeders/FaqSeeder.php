<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'question' => 'How does the tracking system work?',
                'answer' => "Our tracking system provides real-time updates on your package's location and status using unique tracking IDs.",
            ],
            [
                'question' => 'What kinds of packages can I track?',
                'answer' => 'You can track parcels, shipments, documents, and other goods shipped via our partnered carriers.',
            ],
            [
                'question' => 'Do I need to create an account to track packages?',
                'answer' => 'No, you can use the tracking ID to track packages directly. However, creating an account provides additional features like history, notifications, and saved guides.',
            ],
            [
                'question' => 'How do I get started with using guides?',
                'answer' => 'Log in to your account, select "Guides," and follow the step-by-step instructions for managing your packages.',
            ],
        ];

        foreach ($data as $faq) {
            \App\Models\Faq::updateOrCreate($faq);
        }
    }
}
