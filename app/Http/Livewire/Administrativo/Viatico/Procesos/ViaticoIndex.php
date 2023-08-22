<?php

namespace App\Http\Livewire\Viatico\Procesos;

use Livewire\Component;

class ViaticoIndex extends Component
{



    public function render()
    {
        // return view('livewire.viatico.procesos.viatico-index');

        return view('livewire.viatico.procesos.viatico-index', [
            'headers' => [
                ['name' => 'ID', 'align' => 'center', 'sort' => 'id', 'width' => '6%'],
                ['name' => 'Cedula', 'align' => 'center', 'sort' => 'cedula', 'width' => '12%'],
                ['name' => 'Nombre', 'align' => 'center', 'sort' => 'nombre', 'width' => '40%'],
                ['name' => 'Usuario', 'align' => 'center', 'sort' => 'usuario', 'width' => '24%'],
                // ['name' => 'Nomenclatura', 'align' => 'center', 'sort' => 'nomenclatura', 'width' => '10%'],
                ['name' => 'Año Fiscal', 'align' => 'center', 'sort' => 'usuario', 'width' => '12%'],
                ['name' => 'Activar/Inactivar', 'align' => 'center', 'sort' => 'usuario', 'width' => '12%'],
            ],
            // 'usuarios' => User::all()
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



