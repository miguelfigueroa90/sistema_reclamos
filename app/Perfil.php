<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = 'perfil';
    protected $primaryKey = 'codigo_perfil';
    public $timestamps = false;
}
