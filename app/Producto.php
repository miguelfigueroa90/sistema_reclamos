<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';
    protected $primaryKey = 'codigo_producto';
    public $timestamps = false;

    public function tarjeta()
    {
    	return $this->belongsToMany('App\TarjetaProducto', 'tarjeta_producto', 'codigo_producto', 'codigo_tarjeta');
    }
}
