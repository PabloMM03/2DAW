<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{

    //Ver publicaciones de los articulos mas a fondo
    public function show(Product $product){

        return view('publicaciones.show', compact('product'));
    }

    //filtrar por categoria los productos
    public function category(Category $category){
        // return  $category;

        //Requisitos para filtar
    $products = Product::where('category_id', $category->id)
                        ->where('status', 2)
                        ->latest('id')
                        ->paginate(6);

        return view('publicaciones.category', compact('products','category'));
    }


}
