<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaccionCliente extends Model
{
    protected $table = 'transaccion_cliente';
    protected $primaryKey = 'codigo';
    protected $timestamps = false;
}
