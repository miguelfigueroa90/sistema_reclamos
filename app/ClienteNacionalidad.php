<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteNacionalidad extends Model
{
    protected $table = 'cliente_nacionalidad';
    protected $primaryKey = 'codigo';
    public $timestamps = false;
}
