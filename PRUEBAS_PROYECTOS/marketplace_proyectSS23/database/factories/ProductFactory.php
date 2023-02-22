<?php

namespace Database\Factories;

use App\Models\Product;
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

    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence(2),
            'description' => $this->faker->sentence(20),
            'price' => $this->faker->numberBetween(100, 2000),
            'slug' => $this->faker->sentence(10),
            // 'category' => $this->faker->randomElement(['Electronica', 'Informatica', 'Cocina', 'Jardineria', 'Deportes']),

        

        ];
    }
}
