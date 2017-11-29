<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Reclamo extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

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

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'numero_reclamo',
        'descripcion',
        'fecha_registro'
    ];
}
