<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Tarjeta extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;

    protected $table = 'tarjeta';
    protected $primaryKey = 'codigo_tarjeta';
    public $timestamps = false;

    public function producto()
    {
        return $this->belongsToMany('App\TarjetaProducto', 'tarjeta_producto', 'codigo_tarjeta', 'codigo_producto');
    }

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'codigo_tarjeta',
        'numero_tarjeta'
    ];
}
