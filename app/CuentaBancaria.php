<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuentaBancaria extends Model
{
    protected $table = 'cuenta_bancaria';
    protected $primaryKey = 'codigo_cuenta_bancaria';
    public $timestamps = false;
}
