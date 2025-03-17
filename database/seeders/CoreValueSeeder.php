<?php

namespace Database\Seeders;

use App\Enums\CoreValueType;
use App\Models\CoreValue;
use Illuminate\Database\Seeder;

class CoreValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coreValues = [
            [
                'type' => CoreValueType::OUR_MISSION,
                'image' => 'images/image-01.png',
                'title' => 'Our Mission',
                'description' => '<p>At Momentum Consultancy, our mission is to provide personalized and comprehensive guidance to students aspiring to study abroad. We strive to make the process straightforward and stress-free, helping students achieve their educational and career goals with confidence.</p><ul><li>Offering tailored counseling to match students with the best courses and universities.</li><li>Providing up-to-date information on admissions, tuition fees, and visa requirements.</li><li>Supporting standardized test preparation, such as IELTS and PTE.</li><li>Assisting with visa applications, career advice, and documentation.</li><li>Ensuring smooth pre-departure and post-arrival transitions for all students.</li></ul>',
            ],
            [
                'type' => CoreValueType::OUR_VISION,
                'image' => 'images/image-03.png',
                'title' => 'Our Vision',
                'description' => '<p>At Momentum Consultancy, our vision is to empower students by providing exceptional guidance and support for their educational journeys abroad. We aim to be the most trusted and reliable partner for Nepalese students, ensuring they have access to quality education and life-changing opportunities around the world. By prioritizing transparency, integrity, and personalized care, we strive to simplify the process of studying abroad, making it accessible to all who dream of expanding their horizons and achieving their full potential.</p><p>We are committed to fostering a global mindset among students, encouraging them to embrace new cultures and ideas. Our goal is to create a supportive environment where students feel confident in making informed decisions about their future, knowing they have a dedicated partner by their side. By continually expanding our network and resources, we ensure that every student has the best possible chance to succeed in their chosen path and thrive in an international setting.</p>',
            ],
            [
                'type' => CoreValueType::MESSAGE_FROM_DIRECTOR,
                'image' => 'images/image-02.png',
                'title' => 'Message from Director',
                'description' => '<p>Welcome to Momentum Consultancy, your trusted partner in pursuing your dreams of studying abroad. We are committed to providing honest and professional guidance, always prioritizing your academic and career goals.</p><p>Our experienced team offers personalized counseling to help you choose the right courses and universities, along with the latest information on admission requirements, tuition fees, and visa procedures.</p><p>We understand that the journey to studying abroad can be challenging, and we are here to make it easier for you. From preparing for standardized tests like IELTS and PTE to assisting with visa applications, career advice, and documentation, we support you every step of the way. Momentum Consultancy is dedicated to ensuring your international education experience is seamless and successful. Let us guide you toward achieving your academic ambitions.</p>',
            ],
        ];
        foreach ($coreValues as $coreValue) {
            CoreValue::updateOrCreate($coreValue);
        }
    }
}
