<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class ReclamoCliente extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;

    protected $table = 'reclamo_cliente';
    protected $primeryKey = 'codigo';
    public $timestamps = FALSE;

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
