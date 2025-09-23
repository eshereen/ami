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
            'name' => $this->faker->words(3, true),
            'model_name' => $this->faker->bothify('GS #### ?##'),
            'slug' => $this->faker->slug(),
            'subcategory_id' => \App\Models\Subcategory::factory(),
            'image' => 'imgs/products/sample.jpg',
            'description' => $this->faker->paragraph(),
            'fuel_type' => $this->faker->randomElement(['Diesel', 'Gas', 'Hybrid']),
            'frequency' => $this->faker->randomElement(['50Hz', '60Hz', '50/60Hz']),
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
