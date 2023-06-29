<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->randomElement(['shirt', 'touser', 'jacket']),
            'type' => fake()->randomElement(['shirt', 'touser', 'jacket']),
            'sex' => fake()->randomElement(['Male', 'Female']),
            'size' => fake()->randomElement(['S', 'M', 'L', 'XL']),
            'price' => fake()->randomFloat(2, 10, 100),
            'color' => fake()->safeColorName(),
            'description' => fake()->text(250),

        ];
    }
}
