<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstatusReclamo extends Model
{
    protected $table = 'estatus_reclamo';
    protected $primaryKey = 'codigo';
    protected $timestamps = false;
}
