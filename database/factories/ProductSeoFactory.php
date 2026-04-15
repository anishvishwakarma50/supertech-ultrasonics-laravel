<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductSeo>
 */
class ProductSeoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'meta_title' => $this->faker->sentence(5),
            'meta_description' => $this->faker->text(160),
            'og_title' => $this->faker->sentence(3),
            'og_description' => $this->faker->text(160),
            'og_image' => null,
        ];
    }
}
