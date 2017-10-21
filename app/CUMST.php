<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CUMST extends Model
{
    protected $connection = 'pgsql_espejo';
    protected $table = 'cumst';
    protected $primaryKey = 'cuscun';
    public $timestamps = FALSE;
}
