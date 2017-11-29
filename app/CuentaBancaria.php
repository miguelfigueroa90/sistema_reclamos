<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class CuentaBancaria extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;

    protected $table = 'cuenta_bancaria';
    protected $primaryKey = 'codigo_cuenta_bancaria';
    public $timestamps = false;

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'codigo_cuenta_bancaria',
        'cuenta_bancaria'
    ];
}
