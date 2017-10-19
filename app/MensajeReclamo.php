<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MensajeReclamo extends Model
{
    protected $table = 'mensaje_reclamo';
    protected $primaryKey = 'codigo';
    public $timestamps = false;
}
