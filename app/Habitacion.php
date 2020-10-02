<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    public $fillable = [
        'descripcion',
        'numero_habitacion',
        'piso',
        'categoria_id',
    ];

    public function categorias(){
        return $this->belongsTo(Categoria::class);
    }
}
