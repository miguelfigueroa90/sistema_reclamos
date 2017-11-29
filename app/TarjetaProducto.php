<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class TarjetaProducto extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;

    protected $table = 'tarjeta_producto';
    protected $primaryKey = 'codigo';
    public $timestamps = false;

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'codigo',
        'codigo_producto',
        'codigo_tarjeta'
    ];
}
