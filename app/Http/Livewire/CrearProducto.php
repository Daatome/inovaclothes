<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\product_image;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearProducto extends Component
{
    use WithFileUploads;

    public $product_name;
    public $product_price;
    public $product_image;

    public $rules=[
        'product_name'=>'required|string',
        'product_price'=>'required|numeric',
        'product_image'=>'required|image|max:1024'
    ];
    
    public function crearProducto(){

        $this->validate();

        //saving the image
        $this->product_image=$this->product_image->store('public/product_images');
        $this->product_image=str_replace('public/product_images/','', $this->product_image);

        //create the product
        $producto=Product::create([
            'nombre'=> $this->product_name,
            'precio'=> $this->product_price
        ]);
        $producto->product_image()->create([
            'imagen'=>$this->product_image
        ]);
        
        
        
        //message of success
        session()->flash('mensaje','Producto Creado ');

        redirect()->route('dashboard');

    }

    public function render()
    {
        return view('livewire.crear-producto');
    }
}
