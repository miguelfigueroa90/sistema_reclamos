<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class CorreoElectronico extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;

    protected $table = 'correo_electronico';
    protected $primaryKey = 'codigo_correo_electronico';
    public $timestamps = false;

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'codigo_correo_electronico',
        'correo'
    ];
}
