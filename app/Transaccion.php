<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
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
}
