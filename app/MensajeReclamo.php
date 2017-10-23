<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MensajeReclamo extends Model
{
    protected $table = 'mensaje_reclamo';
    protected $primaryKey = 'codigo';
     public $timestamps = false;

    public function reclamo()
    {
    	return $this->belongsTo('App\Reclamo', 'numero_reclamo');
    }
}
