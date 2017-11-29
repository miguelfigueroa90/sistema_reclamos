<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Producto extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;

    protected $table = 'producto';
    protected $primaryKey = 'codigo_producto';
    public $timestamps = false;

    public function tarjeta()
    {
    	return $this->belongsToMany('App\TarjetaProducto', 'tarjeta_producto', 'codigo_producto', 'codigo_tarjeta');
    }

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'codigo_producto',
        'nombre',
        'tipo',
        'condicion'
    ];
}
