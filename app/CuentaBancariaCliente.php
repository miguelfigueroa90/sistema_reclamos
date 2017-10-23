<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuentaBancariaCliente extends Model
{
    protected $table = 'cuenta_bancaria_cliente';
    protected $primaryKey = 'codigo';
     public $timestamps = false;
}
