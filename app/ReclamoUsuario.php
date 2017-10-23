<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReclamoUsuario extends Model
{
    protected $table = 'reclamo_usuario';
    protected $primaryKey = 'codigo';
     public $timestamps = false;

    public function reclamo()
    {
    	return $this->belongsTo('App\Reclamo', 'numero_reclamo');
    }
}
