<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SMS extends Model
{
    protected $connection = 'pgsql_espejo';
    protected $table = 'sms';
    protected $primaryKey = 'codigo';
    public $timestamps = FALSE;
}
