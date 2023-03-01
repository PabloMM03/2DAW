<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;


use Illuminate\Support\Facades\Storage;

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

            // Storage::makeDirectory('productos');
            Storage::deleteDirectory('public/products');
            Storage::makeDirectory('public/products');

            //Llamadas a los seeders

            $this->call(RoleSeeder::class);
            $this->call(UserSeeder::class);
           
            // $this->call(PostSeeder::class);
            Category::factory(4)->create();
            Tag::factory(8)->create();
            $this->call(ProductSeeder::class);
    }
}
