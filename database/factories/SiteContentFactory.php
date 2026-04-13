<?php

namespace Database\Factories;

use App\Models\SiteContent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SiteContent>
 */
class SiteContentFactory extends Factory
{
    protected $model = SiteContent::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_history' => 'Our company has been serving customers for over 25 years with excellence and innovation in ultrasonic cleaning solutions.',
            'what_we_do' => 'We manufacture high-quality ultrasonic cleaning machines designed for industrial and commercial applications.',
            'about_company' => 'Super Tech Ultrasonic is a leading manufacturer of advanced ultrasonic cleaning equipment with a commitment to quality and customer satisfaction.',
            'contact_details' => '+92-300-1234567',
            'contact_number_2' => '+92-42-12345678',
            'email' => 'info@supertechultrasonic.com',
            'address' => '123 Industrial Avenue, Technology Park, Lahore, Pakistan',
            'linkedin_url' => 'https://linkedin.com/company/supertech-ultrasonic',
            'youtube_url' => 'https://youtube.com/@supertechultrasonic',
            'instagram_url' => 'https://instagram.com/supertechultrasonic',
            'logo' => null
        ];
    }
}
