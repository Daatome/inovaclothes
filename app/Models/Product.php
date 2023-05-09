<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable=['nombre','precio'];

    public function product_image()
    {
        return $this->hasMany(product_image::class);
    }

    public function size()
    {
        return $this->hasMany(Size::class);
    }

    public function merch()
    {   
        return $this->hasMany(Merch::class);
    }
}
