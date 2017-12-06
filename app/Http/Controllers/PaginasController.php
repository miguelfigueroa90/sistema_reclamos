<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banco;
use App\Cliente;
use App\CorreoCliente;
use App\CorreoElectronico;
use App\CuentaBancaria;
use App\CuentaBancariaCliente;
use App\Perfil;
use App\Estatus;
use App\EstatusReclamo;
use App\Departamento;
use App\Dispositivo;
use App\Nacionalidad;
use App\Producto;
use App\ProductoReclamo;
use App\Reclamo;
use App\ReclamoCliente;
use App\ReclamoUsuario;
use App\Tarjeta;
use App\TarjetaProducto;
use App\Telefono;
use App\TelefonoCliente;
use App\TipoCliente;
use App\Transaccion;
use App\TransaccionReclamo;
use App\Tmtrans;
use App\Usuario;
use App\UsuarioDepartamento;
use App\UsuarioPerfil;

class PaginasController extends Controller
{
    protected $datos;

    public function __construct()
    {
      $this->middleware('auth');
    }

    // Reclamos
    public function bandeja()
    {
      $reclamos = Reclamo::paginate(10);

      foreach ($reclamos as &$reclamo) {
        $numero_reclamo = $reclamo->numero_reclamo;
        $estatus_reclamo = EstatusReclamo::where('numero_reclamo', '=', $numero_reclamo)
          ->orderBy('codigo', 'desc')
          ->orderBy('fecha', 'desc')
          ->orderBy('codigo_estatus', 'desc')
          ->first();

        $estatus = Estatus::where('codigo_estatus', '=', $estatus_reclamo->codigo_estatus)->first();
        $reclamo->estatus = $estatus->tipo;
      }

      $this->datos = [
        'encabezado' => [
          'titulo' => 'Bandeja'
        ],
        'menu' => [
          'activo' => 'gestion',
          'opcion' => 'bandeja'
        ],
        'registros' => $reclamos,
        'clases_adicionales_body' => ''
      ];

      return view('reclamo/bandeja', ['datos' => $this->datos]);
    }

    public function gestionarReclamo(Request $request)
    {
      $this->datos = [
        'encabezado' => [
          'titulo' => 'Gestionar Reclamo'
        ],
        'menu' => [
          'activo' => 'gestion',
          'opcion' => 'reclamos_asignados'
        ],
        'clases_adicionales_body' => '',
      ];

      $numero_reclamo = $request->numero_reclamo;

      $reclamo = Reclamo::where('numero_reclamo', '=', $numero_reclamo)->first();
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
      $estatus_reclamo = EstatusReclamo::where('numero_reclamo', '=', $reclamo->numero_reclamo)
        ->orderBy('codigo', 'desc')
        ->orderBy('fecha', 'desc')
        ->orderBy('codigo_estatus', 'desc')
        ->first();
      $estatus = Estatus::where('codigo_estatus', '=', $estatus_reclamo->codigo_estatus)->first();

      $transacciones = Tmtrans::select(
          'tran_nr as secuencia',
          'source_node as nodo',
          'in_req as fecha_transaccion',
          'msg_type as codigo_iso',
          'time_local as hora',
          'rsp_code_req_rsp as codigo_respuesta',
          'amount_tran_requested as monto_transaccion')
      ->where('numero_tarjeta', '=', $tarjeta->numero_tarjeta)
      ->get();

      $transaccion_reclamo = TransaccionReclamo::where('numero_reclamo', '=', $reclamo->numero_reclamo)->first();

      if(!is_null($transaccion_reclamo)) {
        $transaccion = Transaccion::where('secuencia', '=', $transaccion_reclamo->secuencia)->first();
      } else {
        $transaccion = [];
      }

      $reclamo->cliente = $cliente;
      $reclamo->cliente->telefono = $telefono;
      $reclamo->cliente->correo_electronico = $correo_electronico;
      $reclamo->cliente->cuenta_bancaria = $cuenta_bancaria;
      $reclamo->producto = $producto;
      $reclamo->producto->tarjeta = $tarjeta;
      $reclamo->estatus = $estatus;
      $reclamo->transacciones = $transacciones;
      $reclamo->transaccion = $transaccion;

      $this->datos['reclamo'] = $reclamo;

      return view('reclamo/gestion_reclamo', ['datos' => $this->datos]);
    }

    public function listarReclamosAsignados(Request $request)
    {
      $usuario = \Auth::user();
      $cedula = $usuario->cedula;
      $reclamos_usuario = ReclamoUsuario::where('cedula', '=', $cedula)->paginate(10);

      foreach ($reclamos_usuario as &$reclamo_usuario) {
        $reclamo = Reclamo::where('numero_reclamo', '=', $reclamo_usuario->numero_reclamo)->first();
        $reclamo_usuario->reclamo = $reclamo;

        $estatus_reclamo = EstatusReclamo::where('numero_reclamo', '=', $reclamo_usuario->numero_reclamo)
          ->orderBy('codigo', 'desc')
          ->orderBy('fecha', 'desc')
          ->orderBy('codigo_estatus', 'desc')
          ->first();

        $estatus = Estatus::where('codigo_estatus', '=', $estatus_reclamo->codigo_estatus)->first();
        $reclamo_usuario->estatus = $estatus;
      }

        $this->datos = [
          'encabezado' => [
            'titulo' => 'Reclamos asignados'
          ],
          'menu' => [
            'activo' => 'gestion',
            'opcion' => 'reclamos_asignados'
          ],
          'registros' => $reclamos_usuario,
          'clases_adicionales_body' => '',
        ];

        return view('reclamo/reclamos_asignados', ['datos' => $this->datos]);
    }

    public function buscarReclamos(Request $request)
    {
        $this->datos = [
          'encabezado' => [
            'titulo' => 'Buscar Reclamo'
          ],
          'menu' => [
            'activo' => 'reclamos',
            'opcion' => 'buscar_reclamo'
          ],
          'clases_adicionales_body' => '',
        ];

        return view('reclamo/buscar', ['datos' => $this->datos]);
    }

    public function agregarReclamo()
    {
        $tipos_cliente = TipoCliente::all();
        $productos_banco = Producto::all();

        $this->datos = [
          'encabezado' => [
              'titulo' => 'Agregar Reclamo',
          ],
          'menu' => [
            'activo' => 'reclamos',
            'opcion' => 'agregar_reclamo'
          ],
          'tipos_cliente' => $tipos_cliente,
          'productos_banco' => $productos_banco,
          'clases_adicionales_body' => '',
        ];

        return view('reclamo/agregar', ['datos' => $this->datos]);
    }

    // Usuarios
    public function listarUsuarios()
    {
        $this->datos = [
          'encabezado' => [
              'titulo' => 'Usuarios',
          ],
          'menu' => [
            'activo' => 'usuarios',
            'opcion' => 'usuarios'
          ],
          'clases_adicionales_body' => 'table-responsive no-padding',
        ];

        $lista_usuarios = Usuario::paginate(10);

        foreach ($lista_usuarios as &$usuario) {
          $cedula = $usuario->cedula;
          $usuario_perfil = UsuarioPerfil::where('cedula', '=', $cedula)->first();
          $codigo_perfil = $usuario_perfil->codigo_perfil;
          $usuario->perfil = Perfil::where('codigo_perfil', '=', $codigo_perfil)->first();
        }

        $this->datos['registros'] = $lista_usuarios;

        return view('usuarios/listar', ['datos' => $this->datos]);
    }

    public function agregarUsuario()
    {
        $perfiles = Perfil::all();

        $departamentos = Departamento::all();

        $this->datos = [
          'encabezado' => [
              'titulo' => 'Agregar Usuario',
          ],
          'menu' => [
            'activo' => 'usuarios',
            'opcion' => 'usuarios'
          ],
          'clases_adicionales_body' => '',
          'perfiles' => $perfiles,
          'departamentos' => $departamentos
        ];

        return view('usuarios/agregar', ['datos' => $this->datos]);
    }

    public function actualizarUsuario(Request $request)
    {
        $usuario = Usuario::find($request->cedula);
        $usuario_departamento = UsuarioDepartamento::where('cedula', '=', $request->cedula)->first();
        $usuario_perfil = UsuarioPerfil::where('cedula', '=', $request->cedula)->first();
        $perfiles = Perfil::all();
        $departamentos = Departamento::all();

        $this->datos = [
          'encabezado' => [
              'titulo' => 'Actualizar Usuario',
          ],
          'menu' => [
            'activo' => 'usuarios',
            'opcion' => 'usuarios'
          ],
          'clases_adicionales_body' => '',
          'usuario' => $usuario,
          'asociaciones' => [
            'departamento' => $usuario_departamento,
            'perfil' => $usuario_perfil
          ],
          'perfiles' => $perfiles,
          'departamentos' => $departamentos,
        ];

        return view('usuarios/actualizar', ['datos' => $this->datos]);
    }

    // Bancos
    public function actualizarBanco(Request $request)
    {
        $this->datos = [
          'encabezado' => [
              'titulo' => 'Actualizar Banco',
          ],
          'menu' => [
            'activo' => 'configuracion',
            'opcion' => 'bancos'
          ],
          'clases_adicionales_body' => '',
        ];

        $banco = Banco::find($request->codigo_banco);

        $this->datos['banco'] = $banco;

        return view('banco/actualizar', ['datos' => $this->datos]);
    }

    public function listarBancos()
    {
        $this->datos = [
          'encabezado' => [
              'titulo' => 'Bancos',
          ],
          'menu' => [
            'activo' => 'configuracion',
            'opcion' => 'bancos'
          ],
          'clases_adicionales_body' => 'table-responsive no-padding',
        ];

        $lista_bancos = Banco::where('condicion','=', 1)->paginate(10);

        $this->datos['registros'] = $lista_bancos;

        return view('banco/listar', ['datos' => $this->datos]);
    }

    public function agregarBanco()
    {
        $this->datos = [
          'encabezado' => [
              'titulo' => 'Agregar Bancos',
          ],
          'menu' => [
            'activo' => 'configuracion',
            'opcion' => 'agregar_banco'
          ],
          'clases_adicionales_body' => '',
        ];

        return view('banco/agregar', ['datos' => $this->datos]);
    }

    // Estatus
    public function actualizarEstatus(Request $request)
    {
        $this->datos = [
          'encabezado' => [
              'titulo' => 'Actualizar Estatus',
          ],
          'menu' => [
            'activo' => 'configuracion',
            'opcion' => 'estatus'
          ],
          'clases_adicionales_body' => '',
        ];

        $estatus = Estatus::find($request->codigo_estatus);

        $this->datos['estatus'] = $estatus;

        return view('estatus/actualizar', ['datos' => $this->datos]);
    }

    public function listarEstatus()
    {
        $this->datos = [
          'encabezado' => [
              'titulo' => 'Estatus',
          ],
          'menu' => [
            'activo' => 'configuracion',
            'opcion' => 'estatus'
          ],
          'clases_adicionales_body' => 'table-responsive no-padding'/*,
          'alerta' => [
            'nivel' => 'info',
            'titulo' => 'Mensaje',
            'simbolo' => 'info',
            'mensaje' => 'mensaje de prueba'
          ]*/
        ];

        $lista_estatus = Estatus::where('condicion','=', 1)->paginate(10);

        $this->datos['registros'] = $lista_estatus;

        return view('estatus/listar', ['datos' => $this->datos]);
    }

    public function agregarEstatus()
    {
        $this->datos = [
          'encabezado' => [
              'titulo' => 'Agregar Estatus',
          ],
          'menu' => [
            'activo' => 'configuracion',
            'opcion' => 'estatus'
          ],
          'clases_adicionales_body' => '',
        ];

        return view('estatus/agregar', ['datos' => $this->datos]);
    }

    // Nacionalidades
    public function actualizarTipoCliente(Request $request)
    {
        $this->datos = [
          'encabezado' => [
              'titulo' => 'Actualizar Tipos de Clientes',
          ],
          'menu' => [
            'activo' => 'configuracion',
            'opcion' => 'tipo_clientes'
          ],
          'clases_adicionales_body' => '',
        ];

        $TipoCliente = TipoCliente::find($request->codigo_tipo_cliente);

        $this->datos['TipoCliente'] = $TipoCliente;

        return view('TipoCliente/actualizar', ['datos' => $this->datos]);
    }

    public function listarTipoCliente()
    {
        $this->datos = [
          'encabezado' => [
              'titulo' => 'Tipos de Clientes',
          ],
          'menu' => [
            'activo' => 'configuracion',
            'opcion' => 'tipo_clientes'
          ],
          'clases_adicionales_body' => 'table-responsive no-padding',
        ];

        $TipoCliente = TipoCliente::where('condicion','=', 1)->paginate(10);

        $this->datos['registros'] = $TipoCliente;

        return view('TipoCliente/listar', ['datos' => $this->datos]);
    }

    public function agregarTipoCliente()
    {
        $this->datos = [
          'encabezado' => [
              'titulo' => 'Agregar Tipos de Clientes',
          ],
          'menu' => [
            'activo' => 'configuracion',
            'opcion' => 'tipo_clientes'
          ],
          'clases_adicionales_body' => '',
        ];

        return view('TipoCliente/agregar', ['datos' => $this->datos]);
    }

    // Departamentos
    public function actualizarDepartamento(Request $request)
    {
        $this->datos = [
          'encabezado' => [
              'titulo' => 'Actualizar Departamento',
          ],
          'menu' => [
            'activo' => 'usuarios',
            'opcion' => 'departamentos'
          ],
          'clases_adicionales_body' => '',
        ];

        $departamento = Departamento::find($request->codigo_departamento);

        $this->datos['departamento'] = $departamento;

        return view('departamento/actualizar', ['datos' => $this->datos]);
    }

    public function listarDepartamentos()
    {
        $this->datos = [
          'encabezado' => [
              'titulo' => 'Departamentos',
          ],
          'menu' => [
            'activo' => 'usuarios',
            'opcion' => 'departamentos'
          ],
          'clases_adicionales_body' => 'table-responsive no-padding',
        ];

        $departamentos = Departamento::where('condicion', '=', 1)->paginate(10);

        $this->datos['registros'] = $departamentos;

        return view('departamento/listar', ['datos' => $this->datos]);
    }

    public function agregarDepartamento()
    {
        $this->datos = [
          'encabezado' => [
              'titulo' => 'Agregar Departamento',
          ],
          'menu' => [
            'activo' => 'usuarios',
            'opcion' => 'departamentos'
          ],
          'clases_adicionales_body' => '',
        ];

        return view('departamento/agregar', ['datos' => $this->datos]);
    }

    // Perfiles
    public function actualizarPerfil(Request $request)
    {
        $this->datos = [
          'encabezado' => [
              'titulo' => 'Actualizar Perfil',
          ],
          'menu' => [
            'activo' => 'usuarios',
            'opcion' => 'perfiles'
          ],
          'clases_adicionales_body' => '',
        ];

        $perfil = Perfil::find($request->codigo_perfil);

        $this->datos['perfil'] = $perfil;

        return view('perfiles/actualizar', ['datos' => $this->datos]);
    }

    public function listarPerfiles()
    {
        $this->datos = [
          'encabezado' => [
              'titulo' => 'Perfiles',
          ],
          'menu' => [
            'activo' => 'usuarios',
            'opcion' => 'perfiles'
          ],
          'clases_adicionales_body' => 'table-responsive no-padding',
        ];

        $perfiles = Perfil::where('condicion', '=', '1')->paginate(10);

        $this->datos['registros'] = $perfiles;

        return view('perfiles/listar', ['datos' => $this->datos]);
    }

    public function agregarPerfil()
    {
        $this->datos = [
          'encabezado' => [
              'titulo' => 'Agregar Perfil',
          ],
          'menu' => [
            'activo' => 'usuarios',
            'opcion' => 'perfiles'
          ],
          'clases_adicionales_body' => '',
        ];

        return view('perfiles/agregar', ['datos' => $this->datos]);
    }

    // Inicio
    public function index()
    {
        $this->datos = [
          'encabezado' => [
              'titulo' => 'Inicio',
          ],
          'menu' => [
            'activo' => '',
            'opcion' => ''
          ],
          'clases_adicionales_body' => '',
        ];

        return view('inicio', ['datos' => $this->datos]);
    }

    // Producto
    public function actualizarProducto(Request $request)
    {
        $this->datos = [
          'encabezado' => [
              'titulo' => 'Actualizar Producto',
          ],
          'menu' => [
            'activo' => 'configuracion',
            'opcion' => 'productos'
          ],
          'clases_adicionales_body' => '',
        ];

        $producto = Producto::find($request->codigo_producto);

        $this->datos['producto'] = $producto;

        return view('productos/actualizar', ['datos' => $this->datos]);
    }

    public function listarProducto()
    {
        $this->datos = [
          'encabezado' => [
              'titulo' => 'Productos',
          ],
          'menu' => [
            'activo' => 'configuracion',
            'opcion' => 'productos'
          ],
          'clases_adicionales_body' => 'table-responsive no-padding',
        ];

        $lista_producto = Producto::where('condicion','=', 1)->paginate(10);

        $this->datos['registros'] = $lista_producto;

        return view('productos/listar', ['datos' => $this->datos]);
    }

    public function agregarProducto()
    {
        $this->datos = [
          'encabezado' => [
              'titulo' => 'Agregar Productos',
          ],
          'menu' => [
            'activo' => 'configuracion',
            'opcion' => 'productos'
          ],
          'clases_adicionales_body' => '',
        ];

        return view('productos/agregar', ['datos' => $this->datos]);
    }

        /////////////////////// Dispositivo /////////////////
    public function actualizarDispositivo(Request $request)
    {
        $this->datos = [
          'encabezado' => [
              'titulo' => 'Actualizar Dispositivo',
          ],
          'menu' => [
            'activo' => 'configuracion',
            'opcion' => 'dispositivos'
          ],
          'clases_adicionales_body' => '',
        ];

        $dispositivo = Dispositivo::find($request->codigo_dispositivo);

        $this->datos['dispositivo'] = $dispositivo;

        return view('dispositivo/actualizar', ['datos' => $this->datos]);
    }

    public function listarDispositivo()
    {
        $this->datos = [
          'encabezado' => [
              'titulo' => 'Dispositivos',
          ],
          'menu' => [
            'activo' => 'configuracion',
            'opcion' => 'dispositivos'
          ],
          'clases_adicionales_body' => 'table-responsive no-padding',
        ];

        $lista_dispositivo = Dispositivo::where('condicion','=', 1)->paginate(10);

        $this->datos['registros'] = $lista_dispositivo;

        return view('dispositivo/listar', ['datos' => $this->datos]);
    }

    public function agregarDispositivo()
    {
        $this->datos = [
          'encabezado' => [
              'titulo' => 'Agregar Dispositivo',
          ],
          'menu' => [
            'activo' => 'configuracion',
            'opcion' => 'dispositivos'
          ],
          'clases_adicionales_body' => '',
        ];

        return view('dispositivo/agregar', ['datos' => $this->datos]);
    }

    public function reporteUsuarios()
    {
        $perfiles = Perfil::pluck('nombre', 'codigo_perfil');
        $perfiles = $perfiles->prepend('Seleccione...');

        $departamentos = Departamento::pluck('nombre', 'codigo_departamento');
        $departamentos = $departamentos->prepend('Seleccione...');

        $this->datos = [
          'encabezado' => [
              'titulo' => 'Reporte de usuarios',
          ],
          'menu' => [
            'activo' => 'reportes',
            'opcion' => 'reporte_usuarios'
          ],
          'perfiles' => $perfiles,
          'departamentos' => $departamentos,
          'clases_adicionales_body' => '',
        ];

        return view('reportes/usuarios', ['datos' => $this->datos]);
    }

    public function reporteReclamos()
    {
        $estatus = Estatus::pluck('tipo', 'codigo_estatus');
        $estatus = $estatus->prepend('Seleccione...');

        $this->datos = [
          'encabezado' => [
              'titulo' => 'Reporte de reclamos',
          ],
          'menu' => [
            'activo' => 'reportes',
            'opcion' => 'reporte_reclamos'
          ],
          'estatus' => $estatus,
          'clases_adicionales_body' => '',
        ];

        return view('reportes/reclamos', ['datos' => $this->datos]);
    }

    public function reporteAuditoriaUsuarios()
    {
        $usuarios = Usuario::paginate(10);

        $this->datos = [
          'encabezado' => [
              'titulo' => 'Reporte de auditoria',
          ],
          'menu' => [
            'activo' => 'reportes',
            'opcion' => 'reporte_auditoria_usuarios'
          ],
          'registros' => $usuarios,
          'clases_adicionales_body' => '',
        ];

        return view('reportes/auditoria/usuarios', ['datos' => $this->datos]);
    }
}
