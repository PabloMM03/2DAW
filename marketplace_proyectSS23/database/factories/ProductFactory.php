<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
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
        //genera un nombre nuevo y lo almacena en slug con -
        $name = $this->faker->unique()->sentence();

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->text(250),
            'price' => $this->faker->numberBetween(100, 10000),
            'status' => $this->faker->randomElement([1, 2]),
            // 'cover_img' => 'products/' . $this->faker->image('public/storage/productos', 640, 480, null, false),
            
            //Obtener id categorias y user random y escoge entre los ids
            'category_id' => Category::all()->random()->id,
            'user_id' => User::all()->random()->id,
            
            // 'category' => $this->faker->randomElement(['Electronica', 'Informatica', 'Cocina', 'Jardineria', 'Deportes']),

        

        ];
    }
}
