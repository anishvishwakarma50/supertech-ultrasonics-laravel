<?php

namespace Database\Seeders;

use App\Models\PageSeo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create SEO entries for each page
        $pages = [
            [
                'page_name' => 'home',
                'meta_title' => 'Super Tech Ultrasonic - Ultrasonic Cleaning Machines',
                'meta_description' => 'Leading manufacturer and supplier of ultrasonic cleaning machines. 25 years of experience providing premium quality industrial cleaning solutions.',
                'og_title' => 'Super Tech Ultrasonic - Cleaning Solutions',
                'og_description' => 'Discover our range of professional ultrasonic cleaning machines for industrial applications.',
                'og_image' => null,
            ],
            [
                'page_name' => 'about',
                'meta_title' => 'About Super Tech Ultrasonic - Our Story',
                'meta_description' => 'Learn about Super Tech Ultrasonic\'s journey, expertise, and commitment to providing quality ultrasonic cleaning machines.',
                'og_title' => 'About Us - Super Tech Ultrasonic',
                'og_description' => 'Discover our company\'s mission, values, and expertise in ultrasonic cleaning technology.',
                'og_image' => null,
            ],
            [
                'page_name' => 'products',
                'meta_title' => 'Products - Ultrasonic Cleaning Machines',
                'meta_description' => 'Browse our complete range of ultrasonic cleaning machines. High-quality industrial cleaning solutions for various applications.',
                'og_title' => 'Our Products - Ultrasonic Cleaning Machines',
                'og_description' => 'Explore our wide range of professional ultrasonic cleaning machines and find the perfect solution for your needs.',
                'og_image' => null,
            ],
        ];

        foreach ($pages as $page) {
            PageSeo::updateOrCreate(
                ['page_name' => $page['page_name']],
                $page
            );
        }
    }
}
