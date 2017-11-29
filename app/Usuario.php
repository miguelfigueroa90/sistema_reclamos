<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Usuario extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;

    protected $table = 'usuario';
    protected $primaryKey = 'cedula';

    public $timestamps = false;

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'cedula',
        'usuario',
        'nombre',
        'apellido',
        'bloqueado'
    ];
}
