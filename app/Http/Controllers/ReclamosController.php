<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reclamo;
use Carbon\Carbon;

class ReclamosController extends Controller
{
    protected $dates = [
        'fecha_registro'
    ];

    public function agregar(Request $request)
    {
        $reclamo = new reclamo;
        $reclamo->descripcion = $request->descripcion;
        $reclamo->fecha_registro = Carbon::now();
        $reclamo->save();
        return redirect()->back()->with('El reclamo ha sido agregado');
    }
}
