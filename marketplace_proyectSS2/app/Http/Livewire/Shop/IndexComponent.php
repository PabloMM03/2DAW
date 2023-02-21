<?php

namespace App\Http\Livewire\Shop;

use App\Models\Product;
use Livewire\Component;

class IndexComponent extends Component
{
    public function render()
    {
        $products = Product::take(20)->latest('id')->paginate(9);
        return view('livewire.shop.index-component',compact('products'))->extends('layouts.app')->section('content');
    }

    public function add_to_cart(Product $product){
            // dd($product); -< comprobar

                // add the product to cart 
        \Cart::session(auth()->id())->add(array( //Obtenemos el usuario loguedado
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));

        //Mensaje de confirmacion
        $this->emit('message', 'El producto se ha añadido correctemente.');
        $this->emitTo('shop.cart-component', 'add_to_cart');
    }
}
