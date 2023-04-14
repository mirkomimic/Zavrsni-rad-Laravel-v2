<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'price' => fake()->randomFloat($nbMaxDecimals = 2, $min = 120, $max = 2500),
            'category' => fake()->randomElement(['Food', 'Drink']),
            'restaurant_id' => fake()->numberBetween($min = 1, $max = 10)
        ];
    }
}
