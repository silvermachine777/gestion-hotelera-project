<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    public $fillable = [
        'fecha_ingreso',
        'fecha_salida',
        'cantidad_personas',
        'categoria_id',
        'habitacion_id',
    ];  

    public function getCategory(){
        return $this->belongsTo(Categoria::class);
    }

    public function getRoom(){
        return $this->belongsTo(Habitacion::class);
    }

}
