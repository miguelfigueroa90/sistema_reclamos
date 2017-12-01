<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banco;
use App\Perfil;
use App\Estatus;
use App\Departamento;
use App\Dispositivo;
use App\Nacionalidad;
use App\Producto;
use App\Reclamo;
use App\TipoCliente;
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
      $this->datos = [
        'encabezado' => [
          'titulo' => 'Bandeja'
        ],
        'menu' => [
          'activo' => 'gestion',
          'opcion' => 'bandeja'
        ],
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
          'opcion' => 'gestion'
        ],
        'clases_adicionales_body' => '',
      ];

      $numero_reclamo = $request->q;

      $reclamo = Reclamo::where('numero_reclamo', '=', $numero_reclamo)->get();

      $this->datos['resultado'] = $reclamo;

      return view('reclamo/gestion_reclamo', ['datos' => $this->datos]);
    }

    public function listarReclamosAsignados(Request $request)
    {
        $this->datos = [
          'encabezado' => [
            'titulo' => 'Reclamos asignados'
          ],
          'menu' => [
            'activo' => 'gestion',
            'opcion' => 'reclamos_asignados'
          ],
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

    public function reporteReclamos()
    {
        $this->datos = [
          'encabezado' => [
              'titulo' => 'Reporte de reclamos',
          ],
          'menu' => [
            'activo' => 'reportes',
            'opcion' => 'reporte_reclamos'
          ],
          'clases_adicionales_body' => '',
        ];

        return view('reportes/reclamos', ['datos' => $this->datos]);
    }

    public function reporteAuditoria()
    {
        $this->datos = [
          'encabezado' => [
              'titulo' => 'Reporte de auditoria',
          ],
          'menu' => [
            'activo' => 'reportes',
            'opcion' => 'reporte_auditoria'
          ],
          'clases_adicionales_body' => '',
        ];

        return view('reportes/auditoria', ['datos' => $this->datos]);
    }
}
