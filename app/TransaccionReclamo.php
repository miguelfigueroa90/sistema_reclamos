<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaccionReclamo extends Model
{
    protected $table = 'transaccion_reclamo';
    protected $primaryKey = 'codigo';
    public $timestamps = false;
}
