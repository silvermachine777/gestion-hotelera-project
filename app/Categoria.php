<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public $fillable = [
        'nombre',
        'precio',
    ];

    public function habitaciones(){
        return $this->hasMany(Habitacion::class);
    }
}
