<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
                'name' =>$this->faker->sentence(2),
                'descripcion' => $this->faker->sentence(20),
                'price' => $this->faker->numberBetween(100, 2000),
            ];
    
    }
}
