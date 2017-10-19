<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nacionalidad extends Model
{
  protected $table = 'nacionalidad';
  protected $primaryKey = 'codigo_nacionalidad';
  protected $timestamps = false;
}
