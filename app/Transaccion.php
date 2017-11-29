<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Transaccion extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;

    protected $table = 'transaccion';
	protected $primaryKey = 'codigo_transaccion';
	public $timestamps = false;

	public function dispositivo()
	{
		return $this->belngsToMany('App\DispositivoTransaccion', 'dispositivo_transaccion', 'codigo_transaccion', 'codigo_dispositivo');
	}

	public function banco()
	{
		return $this->belongsToMany('App\TransaccionBanco', 'transaccion_banco', 'codigo_transaccion', 'codigo_banco');
	}

	/**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'secuencia',
        'nodo',
        'fecha_transaccion',
        'codigo_iso',
        'hora',
        'codigo_respuesta',
        'monto_transaccion'
    ];
}
