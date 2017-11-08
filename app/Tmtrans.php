<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tmtrans extends Model
{
    protected $connection = 'pgsql_espejo';
    protected $table = 'tm_trans';
    protected $primaryKey = 'tran_nr';
    public $timestamps = FALSE;
}
