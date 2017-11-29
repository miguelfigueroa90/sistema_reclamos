<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Mensaje extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;

    protected $table = 'mensaje';
    protected $primaryKey = 'codigo_mensaje';
    public $timestamps = false;

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'codigo_mensaje',
        'tipo',
        'descripcion'
    ];
}
