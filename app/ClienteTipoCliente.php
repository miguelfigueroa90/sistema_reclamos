<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class ClienteTipoCliente extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;

    protected $table = 'cliente_tipo_cliente';
    protected $primaryKey = 'codigo';
    public $timestamps = FALSE;

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'codigo',
        'cedula',
        'codigo_tipo_cliente'
    ];
}
