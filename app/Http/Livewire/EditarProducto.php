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
   
    protected $rules=[
        "xs" => 'required|integer|min:0',
        "s" => 'required|integer|min:0',
        "m" => 'required|integer|min:0',
        "l" => 'required|integer|min:0',
        "xl" => 'required|integer|min:0',
    ];



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

    public function addImage(){
        //Este codigo sirve para validar un solo campo que no necesariamente debe estar en las rules
        $this->validate([
            'product_image'=>'required|image|max:1024'
        ]);
        //saving the image
        $this->product_image=$this->product_image->store('public/product_images');
        $this->product_image=str_replace('public/product_images/','', $this->product_image);
        $this->product->product_image()->create([
            'imagen'=>$this->product_image
        ]);
        session()->flash('mensaje','Producto Creado ');

        redirect()->route('editProduct',$this->product->id);
    }
    
    public function render()
    {
        return view('livewire.editar-producto');
    }

    public function editarProducto()
    {

    }
}
