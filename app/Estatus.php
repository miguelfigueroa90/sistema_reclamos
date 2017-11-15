<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estatus extends Model
{
	protected $table = 'estatus';
	protected $primaryKey = 'codigo_estatus';
	public $timestamps = false;
}
