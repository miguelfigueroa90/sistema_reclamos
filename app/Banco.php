<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Banco extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;

    protected $table = 'banco';
    protected $primaryKey = 'codigo_banco';
    public $timestamps = false;

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'codigo_banco',
        'nombre',
        'condicion'
    ];
}
