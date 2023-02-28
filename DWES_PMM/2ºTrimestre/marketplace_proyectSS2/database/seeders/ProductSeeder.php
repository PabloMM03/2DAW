<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::factory(20)->create();

        //Asginar una imagen cada vez que se cree un producto
        foreach($products as $product){
            Image::factory(1)->create([

                'imagen_id' => $product->id,
                'imagen_type' => Product::class,
            ]);

            $product->tags()->attach([
                rand(1, 4),  //Asigna etiquetas random
                rand(5, 8)
            ]);
        }
    }
}
