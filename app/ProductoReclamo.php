<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoReclamo extends Model
{
    protected $table = 'producto_reclamo';
    protected $primaryKey = 'codigo';
    public $timestamps = false;
}
