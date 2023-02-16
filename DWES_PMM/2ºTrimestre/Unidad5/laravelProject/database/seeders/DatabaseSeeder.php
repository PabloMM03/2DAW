<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;
use App\Models\Curso;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

//Sirve para utilizar todo lo que hayamos escrito en CursoSeeder
    //    $this->call(CursoSeeder::class);

    //Datos aleatorios
       User::factory(10)->create();
       Curso::factory(50)->create();
    }
}
