<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReclamoUsuario extends Model
{
    protected $table = 'reclamo_usuario';
    protected $primaryKey = 'codigo';
    protected $timestamps = false;
}
