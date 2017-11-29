<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class TransaccionCliente extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;

    protected $table = 'transaccion_cliente';
    protected $primaryKey = 'codigo';
    public $timestamps = false;

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'codigo',
        'numero_reclamo',
        'cedula'
    ];
}
