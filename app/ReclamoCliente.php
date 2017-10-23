<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReclamoCliente extends Model
{
    protected $table = 'transaccion_cliente';
    protected $primeryKey = 'codigo';
    public $timestamps = FALSE;

    public function cliente()
    {
    	return $this->hasMany('App\Cliente');
    }

    public function reclamo()
    {
    	return $this->hasMany('App\Reclamo');
    }
}
