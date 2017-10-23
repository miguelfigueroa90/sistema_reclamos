<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TarjetaProducto extends Model
{
    protected $table = 'tarjeta_producto';
    protected $primaryKey = 'codigo';
     public $timestamps = false;
}
