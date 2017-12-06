<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\CorreoCliente;
use App\CorreoElectronico;
use App\CuentaBancaria;
use App\CuentaBancariaCliente;
use App\Estatus;
use App\EstatusReclamo;
use App\Mensaje;
use App\MensajeReclamo;
use App\Producto;
use App\ProductoReclamo;
use App\Reclamo;
use App\ReclamoCliente;
use App\ReclamoUsuario;
use App\SMS;
use App\Tarjeta;
use App\TarjetaProducto;
use App\Telefono;
use App\TelefonoCliente;
use App\Tmtrans;
use App\Transaccion;
use App\TransaccionReclamo;
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
            $numero_reclamo = str_pad($reclamo->numero_reclamo, 3, '0', STR_PAD_LEFT);
            $fecha_reclamo = $reclamo->fecha_registro;
            $reclamo->codigo_reclamo = $fecha_reclamo->format('Ymd') . $numero_reclamo;
            $reclamo->save();

            $reclamo->Cliente()->attach($cliente->cedula);

            $reclamo->Estatus()->attach(1, ['fecha' => $reclamo->fecha_registro]);

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

            $descripcion_mensaje = "BAV informa registro del caso No. ";
            $descripcion_mensaje .= "$reclamo->numero_reclamo el dia ";
            $descripcion_mensaje .= $reclamo->fecha_registro->format('d/m/Y') . " asociado a la tarjeta No. **";
            $descripcion_mensaje .= substr($tarjeta->numero_tarjeta, -4, 4) . ". Para mas informacion llame al: 0500-4567889";

            $mensaje = new Mensaje;
            $mensaje->tipo = 'SMS';
            $mensaje->descripcion = $descripcion_mensaje;
            $mensaje->save();

            $mensaje_reclamo = new MensajeReclamo;
            $mensaje_reclamo->numero_reclamo = $reclamo->numero_reclamo;
            $mensaje_reclamo->codigo_mensaje = $mensaje->codigo_mensaje;
            $mensaje_reclamo->save();

            $sms = new SMS;
            $sms->mensaje = $mensaje->descripcion;
            $sms->telefono = $telefono->telefono;
            $sms->fecha = $reclamo->fecha_registro;
            $sms->save();
        }  else {
            $respuesta = [
                'codigo_respuesta' => '500',
                'mensaje_respuesta' => 'Ha ocurrido un error intentando guardar el reclamo.'
            ];
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
        $numero_reclamo = $request->numero_reclamo;
        $reclamo = Reclamo::find($numero_reclamo);
        $reclamo_cliente = ReclamoCliente::where('numero_reclamo', '=', $numero_reclamo)->first();
        $cliente = Cliente::find($reclamo_cliente->cedula)->first();
        $telefono_cliente = TelefonoCliente::where('cedula', '=', $cliente->cedula)->first();
        $telefono = Telefono::find($telefono_cliente->codigo_telefono)->first();
        $correo_cliente = CorreoCliente::where('cedula', '=', $cliente->cedula)->first();
        $correo_electronico = CorreoElectronico::find($correo_cliente->codigo_correo_electronico)->first();
        $cuenta_bancaria_cliente = CuentaBancariaCliente::where('cedula', '=', $cliente->cedula)->first();
        $cuenta_bancaria = CuentaBancaria::find($cuenta_bancaria_cliente->codigo_cuenta_bancaria)->first();
        $producto_reclamo = ProductoReclamo::where('numero_reclamo', '=', $reclamo->numero_reclamo)->first();
        $producto = Producto::find($producto_reclamo->codigo_producto)->first();
        $tarjeta_producto = TarjetaProducto::where('codigo_producto', '=', $producto->codigo_producto)->first();
        $tarjeta = Tarjeta::find($tarjeta_producto->codigo_tarjeta)->first();
        $estatus_reclamo = EstatusReclamo::where('numero_reclamo', '=', $reclamo->numero_reclamo)->first();
        $estatus = Estatus::find($estatus_reclamo->codigo_estatus)->first();

        $datos = [
            'reclamo' => [
                'datos' => $reclamo,
                'producto' => $producto,
                'estatus' => $estatus,
                'tarjeta' => $tarjeta,
            ],
            'cliente' => [
                'datos' => $cliente,
                'telefono' => $telefono,
                'correo_electronico' => $correo_electronico,
                'cuenta_bancaria' => $cuenta_bancaria,
            ],
        ];

        return response()->json($datos);
    }

    function asignarReclamo(Request $request)
    {
        $usuario = \Auth::user();
        $cedula_usuario = $usuario->cedula;
        $reclamo_usuario = ReclamoUsuario::where('cedula', '=', $cedula_usuario)->first();

        if(is_null($reclamo_usuario)) {
            $reclamo_usuario = new ReclamoUsuario;
            $reclamo_usuario->cedula = $cedula_usuario;
            $reclamo_usuario->numero_reclamo = $request->numero_reclamo;
            $reclamo_usuario_guardado = $reclamo_usuario->save();

            if($reclamo_usuario_guardado) {
                $estatus_reclamo = new EstatusReclamo;
                $estatus_reclamo->numero_reclamo = $request->numero_reclamo;
                $estatus_reclamo->codigo_estatus = 2;
                $estatus_reclamo->fecha = Carbon::now();
                $estatus_reclamo_guardado = $estatus_reclamo->save();

                if($estatus_reclamo_guardado) {
                    return redirect('/bandeja')->with('success', '¡El reclamo ha sido asignado exitosamente!');
                }
            }
        }

        return redirect('/bandeja')->with('warning', '¡El reclamo no ha podido ser asignado!');
    }

    function gestionarEstatusReclamo(Request $request)
    {
        $numero_reclamo = $request->numero_reclamo;
        $codigo_estatus = $request->estatus;

        $estatus_reclamo = new EstatusReclamo;
        $estatus_reclamo->numero_reclamo = $numero_reclamo;
        $estatus_reclamo->codigo_estatus = $codigo_estatus;
        $estatus_reclamo->fecha = Carbon::now();
        $estatus_reclamo_guardado = $estatus_reclamo->save();

        $respuesta = [];

        if($estatus_reclamo_guardado) {
            $respuesta['codigo'] = 200;
            $respuesta['mensaje'] = 'El estatus del reclamo ha sido actualizado';
        } else {
            $respuesta['codigo'] = 500;
            $respuesta['mensaje'] = 'El estatus del reclamo no pudo ser actualizado';
        }

        return response()->json($respuesta);
    }

    function gestionarTransaccionReclamo(Request $request)
    {
        $numero_reclamo = $request->numero_reclamo;

        $transaccion = new Transaccion;
        $transaccion->secuencia = $request->secuencia;
        $transaccion->nodo = $request->nodo;
        $transaccion->fecha_transaccion = $request->fecha_transaccion;
        $transaccion->codigo_iso = $request->codigo_iso;
        $transaccion->hora = $request->hora;
        $transaccion->codigo_respuesta = $request->codigo_respuesta;
        $transaccion->monto_transaccion = $request->monto_transaccion;
        $transaccion->save();

        $transaccion_reclamo = new TransaccionReclamo;
        $transaccion_reclamo->numero_reclamo = $numero_reclamo;
        $transaccion_reclamo->secuencia = $request->secuencia;
        $transaccion_reclamo_guardada = $transaccion_reclamo->save();

        $respuesta = [];

        if($transaccion_reclamo_guardada) {
            $respuesta['codigo'] = 200;
            $respuesta['mensaje'] = 'La transaccion ha sido asociada al reclamo';
        } else {
            $respuesta['codigo'] = 500;
            $respuesta['mensaje'] = 'La transaccion no ha podido ser asociada al reclamo';
        }

        return response()->json($respuesta);
    }

    function gestionarBancoTransaccion(Request $request)
    {
        dd($request);
    }

    function gestionarDispositivoTransaccion(Request $request)
    {
        dd($request);
    }
}
