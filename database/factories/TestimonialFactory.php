<?php

namespace Database\Factories;

use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Testing\Fakes\Fake;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonial>
 */
class TestimonialFactory extends Factory
{
    // This is where we difine the connection to model
    protected $model = Testimonial::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> Fake()->name(),
            'comment' => Fake()->word(),
            'designation' => Fake()->companySuffix(),
            'image_path' => Fake()->imageUrl(),
        ];
    }
}
