<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Perfil extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;

    protected $table = 'perfil';
    protected $primaryKey = 'codigo_perfil';
    public $timestamps = false;

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'codigo_perfil',
        'nombre'
    ];
}
