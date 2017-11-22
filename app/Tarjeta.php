<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    protected $table = 'tarjeta';
    protected $primaryKey = 'codigo_tarjeta';
    public $timestamps = false;

    public function producto()
    {
        return $this->belongsToMany('App\TarjetaProducto', 'tarjeta_producto', 'codigo_tarjeta', 'codigo_producto');
    }
}
