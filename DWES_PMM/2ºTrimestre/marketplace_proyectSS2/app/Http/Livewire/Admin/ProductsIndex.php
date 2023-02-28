<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class ProductsIndex extends Component
{
    //Hacer paginacion 
    
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;

    //Resetear pagina para buscar productos 
    
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        //obtener listado de productos segun cuenta
        $products = Product::where('user_id', auth()->user()->id)
                            ->where('name', 'LIKE','%'.$this->search . '%')
                            ->latest('id')
                            ->paginate();
        return view('livewire.admin.products-index', compact('products'));
    }
}
