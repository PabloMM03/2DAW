<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        //Genera un nuevo nombre con formato slug
        $name = $this->faker->unique()->word(30);

        return [
            'name' => $this->faker->word(30),
            // 'name' => $this->faker->randomElement(['Electronica', 'Informatica', 'Cocina', 'Jardineria', 'Deportes']),
            'slug' => Str::slug($name),  
        ];
    }
}
