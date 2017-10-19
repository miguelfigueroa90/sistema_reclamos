<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaccionReclamo extends Model
{
    protected $table = 'transaccion_reclamo';
    protected $primaryKey = 'codigo';
    protected $timestamps = false;

    public function reclamo()
    {
    	return $this->belongsTo('App\Reclamo', 'numero_reclamo');
    }
}
