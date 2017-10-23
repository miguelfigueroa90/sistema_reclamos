<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TelefonoCliente extends Model
{
    protected $table = 'telefono_cliente';
    protected $primaryKey = 'codigo';
     public $timestamps = false;
}
