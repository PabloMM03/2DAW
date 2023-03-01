<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class Navigation extends Component
{
    //Crear Nav personalizado
    public function render()
    {
        $productos = Product::all();
        return view('livewire.navigation', compact('productos'));
    }
}
