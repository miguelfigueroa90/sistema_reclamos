<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioDepartamentoPerfil extends Model
{
    protected $table = 'usuario_departamento_perfil';
    protected $primaryKey = 'codigo';
     public $timestamps = false;
}
