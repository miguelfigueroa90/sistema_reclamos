<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class TipoCliente extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
    protected $table = 'tipo_cliente';
    protected $primaryKey = 'codigo_tipo_cliente';
    public $timestamps = FALSE;

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'codigo_tipo_cliente',
        'nombre',
        'condicion'
    ];
}
