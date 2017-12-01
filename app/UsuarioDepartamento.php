<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class UsuarioDepartamento extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;
    
    protected $table = 'usuario_departamento';
    protected $primaryKey = 'codigo';
    public $timestamps = false;

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'codigo',
        'cedula',
        'codigo_departamento',
    ];
}
