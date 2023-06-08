<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'need' => fake()->unique()->text(),
            'type' => fake()->boolean(),
            'for' => fake()->text(),
            'price' => fake()->numberBetween(0, 2_000_000)

        ];
    }
}
