<?php

namespace App\Http\Livewire\Administrativo\MeruAdministrativo\Configuracion\Control;

use Livewire\Component;
use App\Models\User;
use App\Traits\WithSorting;
use Livewire\WithPagination;

class UserRolIndexComponent extends Component
{   use WithPagination, WithSorting;

    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $paginate = '10';


 public function mount()
    {
        $this->sort = 'name';
        $this->direction = 'asc';
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedPaginate()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.administrativo.meru-administrativo.configuracion.control.user-rol-index-component',[
            'headers' => [
                ['name' => 'ID', 'align' => 'center', 'sort' => 'id'],
                ['name' => 'Nombre', 'align' => 'center', 'sort' => 'nombre'],
                ['name' => 'Cédula', 'align' => 'center', 'sort' => 'estado'],
                ['name' => 'usuario', 'align' => 'center', 'sort' => 'estado'],
                'Acción'
            ],
            'user' => User::query()
                          ->where('id', 'LIKE', '%'.$this->search.'%')
                          ->orWhere('nombre','LIKE','%'.($this->search).'%')
                          ->orWhere('cedula','LIKE','%'.($this->search).'%')
                          ->orWhere('usuario','LIKE','%'.($this->search).'%')
                          ->paginate($this->paginate)
      ]);
    }
}
