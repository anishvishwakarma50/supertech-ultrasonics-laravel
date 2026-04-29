<?php

namespace Database\Seeders;

use App\Models\Industry;
use App\Models\Inquiry;
use App\Models\Lead;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SiteContent;
use App\Models\Slider;
use App\Models\Specification;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // this will create the user for testing
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'Panipuri#2026'
        ]);
        
        // Slider Seeding
        Slider::factory(3)->create();

        // Industry Seeding
        Industry::factory(5)->create();

        // Site content factory
        SiteContent::factory()->create();

        // Testimonial Factory
        Testimonial::factory(5)->create();

        // Product, Product_Image, Specification, Inquiry and Lead Factory
        Inquiry::factory(3)
        ->for(Lead::factory())
        ->for(Product::factory()
                ->has(ProductImage::factory()
                ->count(5)
                ->Sequence(fn(Sequence $sequence) => ['position' => $sequence->index % 5 + 1])
                , 'images')
                ->for(Specification::factory())
        )->create();
    }
}
