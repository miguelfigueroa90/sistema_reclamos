<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoReclamo extends Model
{
    protected $table = 'producto_reclamo';
    protected $primaryKey = 'codigo';
    protected $timestamps = false;

    public function reclamo()
    {
    	return $this->belongsTo('App\Reclamo', 'numero_reclamo');
    }
}
