<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    public function colection(){

    	return $this->hasMany(Colection::class);

}
public function ventas(){

    	return $this->hasMany(Venta::class);

}
}
