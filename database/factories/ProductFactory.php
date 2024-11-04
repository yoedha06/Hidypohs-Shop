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
    public function definition(): array
    {
        return [
            'product_name' => $this->faker->word(),
            'brand' => $this->faker->word(),
            'description' => $this->faker->sentence,
            'stock' => $this->faker->numberBetween(10, 100),
            'price' => $this->faker->numberBetween(100000, 1000000),
        ];
    }
}
