<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['id', 'brand', 'model', 'year', 'color', 'used', 'price', 'fuel_type'];
}
