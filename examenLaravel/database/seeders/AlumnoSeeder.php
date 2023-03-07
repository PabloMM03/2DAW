<?php

namespace Database\Seeders;

use App\Models\Alumno;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $alumnos =  Alumno::factory(3)->create();

        foreach($alumnos as $alumno){
            $alumno->modulos()->attach([
                rand(1, 2)
            ]);
        }
    }
}
