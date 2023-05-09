<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class VerProductos extends Component
{
    public function render()
    {

        $products= Product::paginate(15);
        

        return view('livewire.ver-productos',[
            'products'=>$products
        ]);
    }
}
