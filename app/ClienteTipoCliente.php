<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteTipoCliente extends Model
{
    protected $table = 'cliente_nacionalidad';
    protected $primaryKey = 'codigo';
    public $timestamps = FALSE;
}
