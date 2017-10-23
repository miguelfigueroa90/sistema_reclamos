<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banco;
use App\Perfil;
use App\Estatus;
use App\Departamento;
use App\Nacionalidad;
use App\TipoCliente;

class PaginasController extends Controller
{
    protected $datos;

    // Reclamos
    public function agregarReclamo()
    {
        $tipos_cliente = TipoCliente::all();

        $this->datos = [
          'encabezado' => [
              'titulo' => 'Agregar Reclamo',
          ],
          'tipos_cliente' => $tipos_cliente,
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

        $banco = Estatus::find($request->codigo_banco);

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

        $bancos = Banco::paginate(10);

        $this->datos['registros'] = $bancos;

        return view('bancos/listar', ['datos' => $this->datos]);
    }

    public function agregarBanco()
    {
        $this->datos = [
          'encabezado' => [
              'titulo' => 'Agregar Banco',
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
          'clases_adicionales_body' => 'table-responsive no-padding',
        ];

        $lista_estatus = Estatus::paginate(10);

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
    public function actualizarNacionalidad(Request $request)
    {
        $this->datos = [
          'encabezado' => [
              'titulo' => 'Actualizar Nacionalidad',
          ],
          'clases_adicionales_body' => '',
        ];

        $nacionalidad = Nacionalidad::find($request->codigo_nacionalidad);

        $this->datos['nacionalidad'] = $nacionalidad;

        return view('nacionalidades/actualizar', ['datos' => $this->datos]);
    }

    public function listarNacionalidades()
    {
        $this->datos = [
          'encabezado' => [
              'titulo' => 'Nacionalidades',
          ],
          'clases_adicionales_body' => 'table-responsive no-padding',
        ];

        $nacionalidades = Nacionalidad::paginate(10);

        $this->datos['registros'] = $nacionalidades;

        return view('nacionalidades/listar', ['datos' => $this->datos]);
    }

    public function agregarNacionalidad()
    {
        $this->datos = [
          'encabezado' => [
              'titulo' => 'Agregar Nacionalidad',
          ],
          'clases_adicionales_body' => '',
        ];

        return view('nacionalidades/agregar', ['datos' => $this->datos]);
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

        return view('departamentos/actualizar', ['datos' => $this->datos]);
    }

    public function listarDepartamentos()
    {
        $this->datos = [
          'encabezado' => [
              'titulo' => 'Departamentos',
          ],
          'clases_adicionales_body' => 'table-responsive no-padding',
        ];

        $departamentos = Departamento::paginate(10);

        $this->datos['registros'] = $departamentos;

        return view('departamentos/listar', ['datos' => $this->datos]);
    }

    public function agregarDepartamento()
    {
        $this->datos = [
          'encabezado' => [
              'titulo' => 'Agregar Departamento',
          ],
          'clases_adicionales_body' => '',
        ];

        return view('departamentos/agregar', ['datos' => $this->datos]);
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
}
