<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Reclamo;
// use App\TipoCliente;
use Carbon\Carbon;

class ReclamosController extends Controller
{
    protected $dates = [
        'fecha_registro'
    ];

    public function agregar(Request $request)
    {
        $cliente = Cliente::where('cedula', '=', $request->cedula_cliente)
        ->first();

        $mensaje_crear_cliente = '';

        if(!$cliente) {
            $cliente = new Cliente;
        }

        $cliente->cedula = $request->cedula_cliente;
        $cliente->nombre = $request->nombre_cliente;
        $cliente->apellido = $request->apellido_cliente;
        $cliente_guardado = $cliente->save();

        if(!$cliente_guardado) {
            $mensaje_crear_cliente = 'Ha ocurrido un error intentando guardar el cliente.';
        } else {
            $tipo_cliente = $cliente->TipoCliente();
            dd($tipo_cliente);

            if(!$cliente_guardado) {
                $mensaje_crear_cliente = 'Ha ocurrido un error intentando guardar los datos del cliente.';
            } else {
                $mensaje_crear_cliente = 'El cliente ha sido guardado en el sistema.';
            }
        }

        // $reclamo = new reclamo;
        // $reclamo->descripcion = $request->descripcion_reclamo;
        // $reclamo->fecha_registro = Carbon::now(); // Se obtiene la fecha actual.
        // $reclamo_guardado = $reclamo->save();

        if($request->ajax() && $cliente_guardado && $reclamo_guardado) {
            return response()->json([
              'respuesta' => '200',
              'mensaje_crear_cliente' => $mensaje_crear_cliente,
              // 'mensaje_reclamo' => 'El reclamo ha sido creado.'
            ]);
        } else {
            return response()->json([
              'respuesta' => '404',
              'mensaje_crear_cliente' => $mensaje_crear_cliente,
              // 'mensaje_reclamo' => 'El reclamo no ha podido ser creado.'
            ]);
        }
    }
}
