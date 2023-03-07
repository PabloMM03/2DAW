<?php

namespace Database\Factories;

use App\Models\Alumno;
use App\Models\Modulo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Alumno::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'apellidos' => $this->faker->sentence(),
            'email' => $this->faker->unique()->text(),
            // 'id_modulo' => Modulo::all()->random()->id,
            

        ];
    }
}
