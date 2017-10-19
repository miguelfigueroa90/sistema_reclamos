<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CorreoElectronico extends Model
{
    protected $table = 'correo_electronico';
    protected $primaryKey = 'codigo_correo_electronico';
    protected $timestamps = false;
}
