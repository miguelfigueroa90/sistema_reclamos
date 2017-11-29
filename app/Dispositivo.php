<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Dispositivo extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;

    protected $table = 'dispositivo';
    protected $primaryKey = 'codigo_dispositivo';
    public $timestamps = false;

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'codigo_dispositivo',
        'tipo',
        'condicion'
    ];
}
