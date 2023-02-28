<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = "bootstrap";


    //Resetear pagina para buscar usuarios 
    
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        //Buscar usuarios y mostrarlos
        $users = User::where('name', 'LIKE' ,'%'.$this->search.'%')
                      ->orWhere('email', 'LIKE', '%'.$this->search.'%')
                      ->paginate();
        return view('livewire.admin.users-index', compact('users'));
    }
}
