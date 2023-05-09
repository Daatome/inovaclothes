<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class VerProductos extends Component
{

    public $listeners=['eliminarProducto'];

    public function eliminarProducto(Product $product){
        //delete images
        $imagenes= $product->product_image->all();
        foreach($imagenes as  $imagen){

            $res=Storage::delete('public/product_images/'.$imagen->imagen);
            
        }
        
        //deleted from DB
        $product->delete();
        //creating message
    }
    public function render()
    {

        $products= Product::paginate(15);
        

        return view('livewire.ver-productos',[
            'products'=>$products
        ]);
    }
}
