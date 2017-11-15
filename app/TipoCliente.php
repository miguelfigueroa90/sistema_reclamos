<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCliente extends Model
{
    protected $table = 'tipo_cliente';
    protected $primaryKey = 'codigo_tipo_cliente';
    public $timestamps = FALSE;
}
