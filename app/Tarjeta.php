<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    protected $table = 'tarjeta';
    protected $primaryKey = 'codigo_tarjeta';
    public $timestamps = false;
}
