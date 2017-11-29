<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Telefono extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;

    protected $table = 'telefono';
    protected $primaryKey = 'codigo_telefono';
    public $timestamps = FALSE;

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'codigo_telefono',
        'telefono'
    ];
}
