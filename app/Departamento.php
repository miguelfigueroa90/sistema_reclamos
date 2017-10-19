<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
  protected $table = 'departamento';
  protected $primaryKey = 'codigo_departamento';
  protected $timestamps = false;
}
