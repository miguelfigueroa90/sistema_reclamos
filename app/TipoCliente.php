<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCliente extends Model
{
    protected $table = 'nacionalidad';
    protected $primaryKey = 'codigo_nacionalidad';
    public $timestamps = FALSE;
}
