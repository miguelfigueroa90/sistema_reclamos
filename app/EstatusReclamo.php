<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstatusReclamo extends Model
{
    protected $table = 'estatus_reclamo';
    protected $primaryKey = 'codigo';
     public $timestamps = false;

    public function reclamo()
    {
    	return $this->belongsTo('App\Reclamo', 'numero_reclamo');
    }
}
