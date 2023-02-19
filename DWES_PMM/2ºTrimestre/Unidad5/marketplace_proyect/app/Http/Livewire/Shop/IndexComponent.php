<?php

namespace App\Http\Livewire\Shop;

use App\Models\Product;
use Livewire\Component;

class IndexComponent extends Component
{
    public function render()
    {
        $products = Product::take(20)->get();
        return view('livewire.shop.index-component',compact('products'));
    }

    public function add_to_cart(Product $product){

    }
}
