<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class ProductoReclamo extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;

    protected $table = 'producto_reclamo';
    protected $primaryKey = 'codigo';
    public $timestamps = false;

    public function reclamo()
    {
    	return $this->belongsTo('App\Reclamo', 'numero_reclamo');
    }

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'codigo',
        'numero_reclamo',
        'codigo_producto'
    ];
}
