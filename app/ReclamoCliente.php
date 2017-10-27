<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReclamoCliente extends Model
{
    protected $table = 'reclamo_cliente';
    protected $primeryKey = 'codigo';
    public $timestamps = FALSE;
}
