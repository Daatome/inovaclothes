<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CrearProducto extends Component
{

    
    public function crearProducto(){
        dd('creando');
    }

    public function render()
    {
        return view('livewire.crear-producto');
    }
}
