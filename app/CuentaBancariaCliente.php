<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class CuentaBancariaCliente extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;

    protected $table = 'cuenta_bancaria_cliente';
    protected $primaryKey = 'codigo';
    public $timestamps = false;

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'codigo',
        'codigo_cuenta_bancaria',
        'cedula'
    ];
}
