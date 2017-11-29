<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Estatus extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;

	protected $table = 'estatus';
	protected $primaryKey = 'codigo_estatus';
	public $timestamps = false;

	/**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'codigo_estatus',
        'tipo',
        'condicion'
    ];
}
