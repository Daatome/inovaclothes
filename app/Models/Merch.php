<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merch extends Model
{
    protected $table='merch';

    use HasFactory;


    public $fillable=['size_id','cantidad'];
}
