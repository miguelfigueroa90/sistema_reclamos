<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class TelefonoCliente extends Model
class Banco extends Model
{
	use \OwenIt\Auditing\Auditable;

    protected $table = 'telefono_cliente';
    protected $primaryKey = 'codigo';
    public $timestamps = false;

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'codigo',
        'cedula',
        'codigo_telefono'
    ];
}
