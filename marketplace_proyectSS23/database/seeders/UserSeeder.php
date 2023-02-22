<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Generar mis credenciales
        User::create([
            'name' =>'Pablo Millán Montero',
            'email' =>'pablo.millan@gmail.com',
            'password' => bcrypt("123456789"),

        ]);

        //generar 10 usuarios random
        User::factory(10)->create();
    }
}
