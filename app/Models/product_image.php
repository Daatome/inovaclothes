<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_image extends Model
{
    protected $table='products_images';
    
    use HasFactory;


    protected $fillable=[
        'product_id',
        'imagen'
    ];

}
