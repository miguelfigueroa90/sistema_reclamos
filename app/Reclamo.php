<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reclamo extends Model
{
    protected $table = 'reclamo';
    protected $primaryKey = 'numero_reclamo';
    protected $timestamps = false;
}
