<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Cliente extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'cliente';
    protected $primaryKey = 'cedula';
    public $timestamps = false;

    public function reclamo()
    {
        return $this->belongsToMany('App\ReclamoCliente', 'reclamo_cliente', 'cedula', 'numero_reclamo');
    }

    public function TipoCliente()
    {
    	return $this->belongsToMany('App\ClienteTipoCliente', 'cliente_tipo_cliente', 'cedula', 'codigo_tipo_cliente');
    }

    public function Correo()
    {
    	return $this->belongsToMany('App\CorreoCliente', 'correo_cliente', 'cedula', 'codigo_correo_electronico');
    }

    public function Telefono()
    {
    	return $this->belongsToMany('App\TelefonoCliente', 'telefono_cliente', 'cedula', 'codigo_telefono');
    }

    public function CuentaBancaria()
    {
    	return $this->belongsToMany('App\CuentaBancariaCliente', 'cuenta_bancaria_cliente', 'cedula', 'codigo_cuenta_bancaria');
    }

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'cedula',
        'nombre',
        'apellido'
    ];
}
