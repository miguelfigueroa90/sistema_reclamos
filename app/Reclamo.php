<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reclamo extends Model
{
    protected $table = 'reclamo';
    protected $primaryKey = 'numero_reclamo';
    public $timestamps = false;

    public function cliente()
    {
        return $this->belongsToMany('App\ReclamoCliente', 'reclamo_cliente', 'numero_reclamo', 'cedula');
    }

    public function producto()
    {
        return $this->belongsToMany('App\ProductoReclamo', 'producto_reclamo', 'numero_reclamo', 'codigo_producto');
    }

    public function transaccion()
    {
        return $this->belongsToMany('App\TransaccionReclamo', 'transaccion_reclamo', 'numero_reclamo', 'secuencia');
    }

    public function estatus()
    {
        return $this->belongsToMany('App\EstatusReclamo', 'estatus_reclamo', 'codigo_reclamo', 'codigo_estatus');
    }
}
