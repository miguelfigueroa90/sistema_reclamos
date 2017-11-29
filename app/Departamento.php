<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Departamento extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;

	protected $table = 'departamento';
	protected $primaryKey = 'codigo_departamento';
	public $timestamps = false;

	/**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'codigo_departamento',
        'nombre',
        'condicion'
    ];
}
