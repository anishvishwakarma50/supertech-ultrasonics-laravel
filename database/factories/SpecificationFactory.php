<?php

namespace Database\Factories;

use App\Models\Specification;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Specification>
 */
class SpecificationFactory extends Factory
{
    protected $model = Specification::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'usage' => Fake()->word(),
            'material' => Fake()->word(),
            'weight' => Fake()->randomFloat(2, 200, 5000),
            'voltage' => Fake()->randomFloat(2, 240, 1000),
            'color' => Fake()->word(),
            'frequency' => Fake()->word(),
            'temperature' => Fake()->randomFloat(1, 50, 200)
        ];
    }
}
