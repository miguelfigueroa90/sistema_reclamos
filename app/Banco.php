<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    protected $table = 'banco';
    protected $primaryKey = 'codigo_banco';
    protected $timestamps = false;
}
