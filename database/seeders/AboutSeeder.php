<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::updateOrCreate([
            'image' => 'images/image-03.png',
            'content' => "<p style=\"margin-left:0px;\">Welcome to ShaktiPunj Pvt. Ltd., your trusted travel agency in Nepal, where every journey is an opportunity to explore the uncharted beauty and cultural heritage of this magnificent land. As one of the leading travel and trekking companies in Nepal, we specialize in curating unforgettable experiences that cater to both seasoned adventurers and first-time travelers.<\/p><p style=\"margin-left:0px;\">At ShaktiPunj, our mission is to showcase the breathtaking landscapes and rich cultural history of Nepal in the most immersive and responsible way possible. Whether you\u2019re trekking through the iconic trails of the Himalayas, hiking to hidden valleys, climbing majestic peaks, or exploring ancient cultural sites, our expert team of professional guides is committed to ensuring your safety, comfort, and satisfaction.<\/p><p style=\"margin-left:0px;\">We pride ourselves on our dedication to safety, sustainability, and ethical tourism. Our experienced guides are not just skilled in navigating the diverse terrains of Nepal, but they are also passionate about preserving the natural beauty and cultural integrity of the regions we explore. We believe that every traveler has a role in protecting the environment and respecting local traditions, and we are here to help you do just that.<\/p><p style=\"margin-left:0px;\">From adrenaline-pumping adventures to serene cultural excursions, ShaktiPunj Pvt. Ltd. offers a wide range of services designed to meet your travel aspirations. Whether you\u2019re looking to conquer high-altitude treks, embark on a spiritual journey, or simply soak in the natural beauty of Nepal, we have something special for you.<\/p><p style=\"margin-left:0px;\">Discover the wonders of Nepal with a travel agency that understands your passion for adventure and your respect for nature. Let ShaktiPunj Pvt. Ltd. is your companion in creating memories that will last a lifetime.<\/p>",
        ]);
    }
}
