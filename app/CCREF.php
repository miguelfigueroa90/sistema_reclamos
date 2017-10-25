<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CCREF extends Model
{
    protected $connection = 'pgsql_espejo';
    protected $table = 'ccref';
    protected $primaryKey = 'ccrnum';
    public $timestamps = FALSE;
}
