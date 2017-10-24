<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\CorreoElectronico;
use App\CuentaBancaria;
use App\Reclamo;
use App\Telefono;
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

        $cliente->cedula = trim($request->cedula_cliente);
        $cliente->nombre = trim($request->nombre_cliente);
        $cliente->apellido = trim($request->apellido_cliente);
        $cliente_guardado = $cliente->save();

        if($cliente_guardado) {
            $correo_electronico = CorreoElectronico::where('correo', '=', $request->correo_cliente)->first();

            if(!$correo_electronico){
                $correo_electronico = new CorreoElectronico;
            }

            $correo_electronico->correo = trim($request->correo_cliente);
            $correo_electronico->save();

            $telefono = Telefono::where('telefono', '=', $request->telefono_cliente)->first();

            if(!$telefono) {
                $telefono = new Telefono;
            }

            $telefono->telefono = $request->telefono_cliente;
            $telefono->save();

            $cuenta_bancaria = CuentaBancaria::where('cuenta_bancaria', '=', $request->cuenta_cliente)->first();

            if(!$cuenta_bancaria) {
                $cuenta_bancaria = new CuentaBancaria;
            }

            $cuenta_bancaria->cuenta_bancaria = $request->cuenta_cliente;
            $cuenta_bancaria->save();

            $cliente->TipoCliente()->attach($request->codigo_tipo_cliente);
            $cliente->Correo()->attach($correo_electronico->codigo_correo_electronico);
            $cliente->Telefono()->attach($telefono->codigo_telefono);
            $cliente->CuentaBancaria()->attach($cuenta_bancaria->codigo_cuenta_bancaria);

            $mensaje_crear_cliente = 'El cliente ha sido guardado en el sistema.';
        } else {
            $mensaje_crear_cliente = 'Ha ocurrido un error intentando guardar el cliente.';
        }

        // $reclamo = new reclamo;
        // $reclamo->descripcion = $request->descripcion_reclamo;
        // $reclamo->fecha_registro = Carbon::now(); // Se obtiene la fecha actual.
        // $reclamo_guardado = $reclamo->save();

        if($request->ajax() && $cliente_guardado) {
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
