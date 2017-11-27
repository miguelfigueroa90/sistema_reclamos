<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\CorreoElectronico;
use App\CuentaBancaria;
use App\Producto;
use App\Reclamo;
use App\Tarjeta;
use App\Telefono;
use App\Tmtrans;
use App\Transaccion;
use Carbon\Carbon;

class ReclamosController extends Controller
{
    protected $dates = [
        'fecha_registro'
    ];

    public function agregar(Request $request)
    {
        $cedula = ltrim(trim($request->cedula_cliente), '0');

        $cliente = Cliente::where('cedula', '=', $cedula)
        ->first();

        $mensaje_crear_cliente = '';

        if(!$cliente) {
            $cliente = new Cliente;
        }

        $cliente->cedula = $cedula;
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

        $reclamo = new reclamo;
        $reclamo->descripcion = $request->descripcion_reclamo;
        $reclamo->fecha_registro = Carbon::now(); // Se obtiene la fecha actual.
        $reclamo_guardado = $reclamo->save();

        if($reclamo_guardado) {
            $reclamo->Cliente()->attach($cliente->cedula);

            $reclamo->Producto()->attach($request->producto_banco);

            if($request->tarjeta_cliente == 'otro') {
                $tarjeta_cliente = $request->otra_tarjeta;
            } else {
                $tarjeta_cliente = $request->tarjeta_cliente;
            }

            $tarjeta = Tarjeta::where('numero_tarjeta', '=', $tarjeta_cliente)->first();

            if(!$tarjeta){
                $tarjeta = new Tarjeta;
            }

            $tarjeta->numero_tarjeta = $tarjeta_cliente;
            $tarjeta->save();

            $tarjeta->producto()->attach($request->producto_banco);
        }  else {
            $mensaje_reclamo = 'Ha ocurrido un error intentando guardar el reclamo.';
        }

        if($cliente_guardado && $reclamo_guardado) {
            $respuesta = [
                'codigo_respuesta' => '200',
                'mensaje_respuesta' => 'Los datos fueron guardados correctamente.'
            ];
        } else {
            $respuesta = [
                'codigo_respuesta' => '500',
                'mensaje_respuesta' => 'El reclamo no pudo ser guardado debido a un error inesperado.'
            ];
        }

        if($request->ajax()) {
            return response()->json($respuesta);
        }
    }

    public function obtenerTransacciones(Request $request)
    {
        $tarjeta_cliente = $request->tarjeta_cliente;

        if($tarjeta_cliente == 'otro') {
            $tarjeta_cliente = $request->otra_tarjeta;
        }

        $transacciones = Tmtrans::select(
            'tran_nr as secuencia',
            'source_node as nodo',
            'in_req as fecha_transaccion',
            'msg_type as codigo_iso',
            'time_local as hora',
            'rsp_code_req_rsp as codigo_respuesta',
            'amount_tran_requested as monto_transaccion')
        ->where('numero_tarjeta', '=', $tarjeta_cliente)
        ->get();

        if($transacciones->count() > 0) {
            $respuesta = [
                'codigo_respuesta' => '200',
                'transacciones' => $transacciones,
            ];
        } else {
            $respuesta = [
                'codigo_respuesta' => '404',
                'mensaje' => 'La tarjeta seleccionada no tiene transacciones asociadas.'
            ];
        }

        if($request->ajax()) {
            return response()->json($respuesta);
        }
    }

    function buscar(Request $request)
    {
        dd($request);
    }
}
