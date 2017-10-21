<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ACMST extends Model
{
    protected $connection = 'pgsql_espejo';
    protected $table = 'acmst';
    protected $primaryKey = 'cuscun';
    public $timestamps = FALSE;
}
