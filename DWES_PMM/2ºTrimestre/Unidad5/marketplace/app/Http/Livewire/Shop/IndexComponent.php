<?php

namespace App\Http\Livewire\Shop;

use App\Models\Product;
use Livewire\Component;

class IndexComponent extends Component
{
    public function render()
    {
        $products = Product::all();
        return view('livewire.shop.index-component', compact('products'));
    }
}
