<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioEspejo extends Model
{
    protected $connection = 'pgsql_espejo';
    protected $table = 'usuarios';
    protected $primaryKey = 'id';

    public $timestamps = false;
}
