<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reclamo extends Model
{
    protected $table = 'reclamo';
    protected $primaryKey = 'numero_reclamo';
     public $timestamps = false;

    public function transaccionReclamo()
    {
    	return $this->hasMany('App\TransaccionReclamo', 'numero_reclamo');
    }

    public function reclamoUsuario()
    {
    	return $this->hasMany('App\ReclamoUsuario', 'numero_reclamo');
    }

    public function mensajeReclamo()
    {
    	return $this->hasMany('App\MensajeReclamo', 'numero_reclamo');
    }

    public function estatusReclamo()
    {
    	return $this->hasMany('App\EstatusReclamo', 'numero_reclamo');
    }

    public function productoReclamo()
    {
    	return $this->hasMany('App\ProductoReclamo', 'numero_reclamo');
    }

    public function cliente()
    {
        return $this->belongsToMany('App\ReclamoCliente', 'reclamo_cliente', 'numero_reclamo', 'cedula');
    }
}
