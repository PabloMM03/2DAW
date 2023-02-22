<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function show(Product $product){

        return view('publicaciones.show', compact('product'))->extends('layouts.app')->section('content');
    }

}
