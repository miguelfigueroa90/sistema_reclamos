<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'cedula';
    public $timestamps = false;

    public function TipoCliente()
    {
    	return $this->belongsToMany('App\ClienteTipoCliente', 'cliente_nacionalidad', 'cedula', 'codigo_nacionalidad');
    }
}
