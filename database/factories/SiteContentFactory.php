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
            'company_history' => Fake()->sentence(),
            'what_we_do' => Fake()->sentence()
        ];
    }
}
