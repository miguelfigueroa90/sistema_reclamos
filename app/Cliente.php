<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'cedula';
    public $timestamps = false;

    public function TipoCliente()
    {
    	return $this->belongsToMany('App\ClienteTipoCliente', 'cliente_nacionalidad', 'cedula', 'codigo_nacionalidad');
    }

    public function Correo()
    {
    	return $this->belongsToMany('App\CorreoCliente', 'correo_cliente', 'cedula', 'codigo_correo_electronico');
    }

    public function Telefono()
    {
    	return $this->belongsToMany('App\TelefonoCliente', 'telefono_cliente', 'cedula', 'codigo_telefono');
    }
}
