<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dispositivo extends Model
{
    protected $table = 'dispositivo';
    protected $primaryKey = 'codigo_dispositivo';
    protected $timestamps = false;
}
