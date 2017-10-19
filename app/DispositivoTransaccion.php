<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DispositivoTransaccion extends Model
{
    protected $table = 'dispositivo_transaccion';
    protected $primaryKey = 'codigo';
    protected $timestamps = false;
}
