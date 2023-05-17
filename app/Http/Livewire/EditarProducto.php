<?php

namespace App\Http\Livewire;

use App\Models\Size;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditarProducto extends Component
{
    use WithFileUploads;

    //product sent from the view who invoke this
    public $product;

    //variables for the mount
    public $product_images;
    public $sizes;

    //variables for the form
    public $product_image;
    public $product_name;
    public $precio;
    public $merch;
    public $xs;
    public $s;
    public $m;
    public $l;
    public $xl;
   




    public function mount($product)
    {
        $this->product_images=$this->product->product_image;
        $this->product_name= $this->product->nombre;
        $this->precio=$this->product->precio;
        $this->merch=$this->product->merch;
        
        $this->xs=$this->merch[0]->cantidad;
        $this->s=$this->merch[1]->cantidad;
        $this->m=$this->merch[2]->cantidad;
        $this->l=$this->merch[3]->cantidad;
        $this->xl=$this->merch[4]->cantidad;
        
    }
    
    public function render()
    {
        return view('livewire.editar-producto');
    }

    public function editarProducto()
    {

    }
}
