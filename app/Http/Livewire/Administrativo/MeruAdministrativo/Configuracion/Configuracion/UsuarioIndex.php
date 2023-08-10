<?php

namespace App\Http\Livewire\Administrativo\MeruAdministrativo\Configuracion\Configuracion;

use Livewire\Component;
use App\Traits\WithSorting;
use Livewire\WithPagination;
use App\Models\User;

class UsuarioIndex extends Component
{
    use WithPagination, WithSorting;

    protected $paginationTheme = 'bootstrap';
    public $search             = '';
    public $paginate           = '';
    
    public function mount()
    {
        $this->sort      = 'nombre';
        $this->direction = 'cedula';
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedPaginate()
    {
        $this->resetPage();
    }

    public function order()
    {

    }

    public function render()
    {
        //dd(User::all());
        return view('livewire.administrativo.meru-administrativo.configuracion.configuracion.usuario-index', [
            'headers' => [
                ['name' => 'ID', 'align' => 'center', 'sort' => 'id', 'width' => '6%'],
                ['name' => 'Cedula', 'align' => 'center', 'sort' => 'cedula', 'width' => '12%'],
                ['name' => 'Nombre', 'align' => 'center', 'sort' => 'nombre', 'width' => '40%'],
                ['name' => 'Usuario', 'align' => 'center', 'sort' => 'usuario', 'width' => '24%'],
                // ['name' => 'Nomenclatura', 'align' => 'center', 'sort' => 'nomenclatura', 'width' => '10%'],
                ['name' => 'Año Fiscal', 'align' => 'center', 'sort' => 'usuario', 'width' => '12%'], 
                ['name' => 'Activar/Inactivar', 'align' => 'center', 'sort' => 'usuario', 'width' => '12%'], 
            ],
            'usuarios' => User::all()
                // ->where('usuario', 'ilike', '%'.$this->search.'%')
                // ->orWhere('nombre', 'ilike', $this->search.'%')
                // ->orWhere('cedula', 'ilike', '%'.$this->search.'%')
                // ->orWhere('id', 'ilike', '%'.$this->search.'%')
                // ->orderBy($this->sort)
                // ->orderBy($this->sort, $this->direction)
                // ->paginate($this->paginate)  
        ]);
    }
}
