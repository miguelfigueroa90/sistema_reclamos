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

class PaginasController extends Controller
{
    protected $datos;

    // Reclamos
    public function listarReclamos(Request $request)
    {
        $this->datos = [
          'encabezado' => [
            'titulo' => 'Buscar Reclamo'
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
          'tipos_cliente' => $tipos_cliente,
          'productos_banco' => $productos_banco,
          'clases_adicionales_body' => '',
        ];

        return view('reclamo/agregar', ['datos' => $this->datos]);
    }

    // Bancos
    public function actualizarBanco(Request $request)
    {
        $this->datos = [
          'encabezado' => [
              'titulo' => 'Actualizar Banco',
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
          'clases_adicionales_body' => 'table-responsive no-padding',
        ];

        $perfiles = Perfil::paginate(10);

        $this->datos['registros'] = $perfiles;

        return view('perfiles/listar', ['datos' => $this->datos]);
    }

    public function agregarPerfil()
    {
        $this->datos = [
          'encabezado' => [
              'titulo' => 'Agregar Perfil',
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
          'clases_adicionales_body' => '',
        ];

        return view('dispositivo/agregar', ['datos' => $this->datos]);
    }
}
