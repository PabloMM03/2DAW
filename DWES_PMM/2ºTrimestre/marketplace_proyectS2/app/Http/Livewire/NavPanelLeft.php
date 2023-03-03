<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class NavPanelLeft extends Component
{
    public function render()
    {
        $categories = Category::all();
        return view('livewire.nav-panel-left', compact('categories'));
    }
}
