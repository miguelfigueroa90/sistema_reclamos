<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'Cliente';
    protected $primaryKey = 'cedula';
    protected $timestamps = false;
}
