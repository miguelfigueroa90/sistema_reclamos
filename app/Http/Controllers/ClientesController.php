<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CUMST;
use App\TipoCliente;

class ClientesController extends Controller
{
    public function buscarCliente(Request $request)
    {
      $tipo_cliente = TipoCliente::find($request->codigo_tipo_cliente);

      $cedula = $tipo_cliente->nombre . $request->cedula_cliente;

      $cliente = CUMST::where('cusidn', 'like', $cedula . '%')
        ->first([
        	'cusfna as nombre', 
        	'cusln1 as apellido', 
        	'cusph1 as telefono', 
        	'cusiad as correo'
        ]);

      if($request->ajax() && !is_null($cliente)) {
        return response()->json([
          'respuesta' => '200',
          'nombre' => trim($cliente->nombre),
          'apellido' => trim($cliente->apellido),
          'telefono' => trim($cliente->telefono),
          'correo' => trim($cliente->correo)
        ]);
      } else {
        return response()->json([
          'respuesta' => '404',
          'mensaje' => 'El usuario ingresado no ha sido encontrado, por favor verifique'
        ]);
      }
    }
}
