<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditarProducto extends Component
{

    public $product;

    public $product_image;

    public function mount($product)
    {
        $product_images=$this->product->product_image;
        $sizes=$this->product->size;
        //crear variables para cada cantidad de tallas
    }
    
    public function render()
    {
        return view('livewire.editar-producto');
    }
}
