<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaccionBanco extends Model
{
    protected $table = 'transaccion_banco';
    protected $primaryKey = 'codigo';
    public $timestamps = false;
}
