<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil;
use App\Departamento;
use App\Nacionalidad;
use App\Estatus;
use App\Banco;

class PaginasController extends Controller
{
    protected $datos;

    // Bancos
    public function actualizarBanco(Request $request)
    {
        $datos = [
          'encabezado' => [
              'titulo' => 'Actualizar Banco',
          ],
          'clases_adicionales_body' => '',
        ];

        $this->establecerDatosBasicos($datos);

        $banco = Estatus::find($request->codigo_banco);

        $this->datos['banco'] = $banco;

        return view('banco/actualizar', ['datos' => $this->datos]);
    }

    public function listarBancos()
    {
        $datos = [
          'encabezado' => [
              'titulo' => 'Bancos',
          ],
          'clases_adicionales_body' => 'table-responsive no-padding',
        ];

        $this->establecerDatosBasicos($datos);

        $bancos = Banco::paginate(10);

        $this->datos['registros'] = $bancos;

        return view('bancos/listar', ['datos' => $this->datos]);
    }

    public function agregarBanco()
    {
        $datos = [
          'encabezado' => [
              'titulo' => 'Agregar Banco',
          ],
          'clases_adicionales_body' => '',
        ];

        $this->establecerDatosBasicos($datos);

        return view('banco/agregar', ['datos' => $this->datos]);
    }

    // Estatus
    public function actualizarEstatus(Request $request)
    {
        $datos = [
          'encabezado' => [
              'titulo' => 'Actualizar Estatus',
          ],
          'clases_adicionales_body' => '',
        ];

        $this->establecerDatosBasicos($datos);

        $estatus = Estatus::find($request->codigo_estatus);

        $this->datos['estatus'] = $estatus;

        return view('estatus/actualizar', ['datos' => $this->datos]);
    }

    public function listarEstatus()
    {
        $datos = [
          'encabezado' => [
              'titulo' => 'Estatus',
          ],
          'clases_adicionales_body' => 'table-responsive no-padding',
        ];

        $this->establecerDatosBasicos($datos);

        $lista_estatus = Estatus::paginate(10);

        $this->datos['registros'] = $lista_estatus;

        return view('estatus/listar', ['datos' => $this->datos]);
    }

    public function agregarEstatus()
    {
        $datos = [
          'encabezado' => [
              'titulo' => 'Agregar Estatus',
          ],
          'clases_adicionales_body' => '',
        ];

        $this->establecerDatosBasicos($datos);

        return view('estatus/agregar', ['datos' => $this->datos]);
    }

    // Nacionalidades
    public function actualizarNacionalidad(Request $request)
    {
        $datos = [
          'encabezado' => [
              'titulo' => 'Actualizar Nacionalidad',
          ],
          'clases_adicionales_body' => '',
        ];

        $this->establecerDatosBasicos($datos);

        $nacionalidad = Nacionalidad::find($request->codigo_nacionalidad);

        $this->datos['nacionalidad'] = $nacionalidad;

        return view('nacionalidades/actualizar', ['datos' => $this->datos]);
    }

    public function listarNacionalidades()
    {
        $datos = [
          'encabezado' => [
              'titulo' => 'Nacionalidades',
          ],
          'clases_adicionales_body' => 'table-responsive no-padding',
        ];

        $this->establecerDatosBasicos($datos);

        $nacionalidades = Nacionalidad::paginate(10);

        $this->datos['registros'] = $nacionalidades;

        return view('nacionalidades/listar', ['datos' => $this->datos]);
    }

    public function agregarNacionalidad()
    {
        $datos = [
          'encabezado' => [
              'titulo' => 'Agregar Nacionalidad',
          ],
          'clases_adicionales_body' => '',
        ];

        $this->establecerDatosBasicos($datos);

        return view('nacionalidades/agregar', ['datos' => $this->datos]);
    }

    // Departamentos
    public function actualizarDepartamento(Request $request)
    {
        $datos = [
          'encabezado' => [
              'titulo' => 'Actualizar Departamento',
          ],
          'clases_adicionales_body' => '',
        ];

        $this->establecerDatosBasicos($datos);

        $departamento = Departamento::find($request->codigo_departamento);

        $this->datos['departamento'] = $departamento;

        return view('departamentos/actualizar', ['datos' => $this->datos]);
    }

    public function listarDepartamentos()
    {
        $datos = [
          'encabezado' => [
              'titulo' => 'Departamentos',
          ],
          'clases_adicionales_body' => 'table-responsive no-padding',
        ];

        $this->establecerDatosBasicos($datos);

        $departamentos = Departamento::paginate(10);

        $this->datos['registros'] = $departamentos;

        return view('departamentos/listar', ['datos' => $this->datos]);
    }

    public function agregarDepartamento()
    {
        $datos = [
          'encabezado' => [
              'titulo' => 'Agregar Departamento',
          ],
          'clases_adicionales_body' => '',
        ];

        $this->establecerDatosBasicos($datos);

        return view('departamentos/agregar', ['datos' => $this->datos]);
    }

    // Perfiles
    public function actualizarPerfil(Request $request)
    {
        $datos = [
          'encabezado' => [
              'titulo' => 'Actualizar Perfil',
          ],
          'clases_adicionales_body' => '',
        ];

        $this->establecerDatosBasicos($datos);

        $perfil = Perfil::find($request->codigo_perfil);

        $this->datos['perfil'] = $perfil;

        return view('perfiles/actualizar', ['datos' => $this->datos]);
    }

    public function listarPerfiles()
    {
        $datos = [
          'encabezado' => [
              'titulo' => 'Perfiles',
          ],
          'clases_adicionales_body' => 'table-responsive no-padding',
        ];

        $this->establecerDatosBasicos($datos);

        $perfiles = Perfil::paginate(10);

        $this->datos['registros'] = $perfiles;

        return view('perfiles/listar', ['datos' => $this->datos]);
    }

    public function agregarPerfil()
    {
        $datos = [
          'encabezado' => [
              'titulo' => 'Agregar Perfil',
          ],
          'clases_adicionales_body' => '',
        ];

        $this->establecerDatosBasicos($datos);

        return view('perfiles/agregar', ['datos' => $this->datos]);
    }

    private function establecerDatosBasicos($datos)
    {
        $this->datos = $datos;
    }

    // Inicio
    public function index()
    {
        $datos = [
          'encabezado' => [
              'titulo' => 'Inicio',
          ],
          'clases_adicionales_body' => '',
        ];

        $this->establecerDatosBasicos($datos);

        return view('inicio', ['datos' => $this->datos]);
    }
}
