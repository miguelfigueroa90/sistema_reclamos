<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CorreoCliente extends Model
{
    protected $table = 'correo_cliente';
    protected $primaryKey = 'codigo';
    public $timestamps = false;
}
