<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil;
use App\Departamento;
use App\Nacionalidad;
use App\Estatus;

class PaginasController extends Controller
{
  // Estatus
  public function actualizarEstatus(Request $request)
  {
    $estatus = Estatus::find($request->codigo_estatus);
    return view('estatus/actualizar', ['estatus' => $estatus]);
  }

  public function listarEstatus()
  {
    $lista_estatus = Estatus::all();
    return view('estatus/listar', ['lista_estatus' => $lista_estatus]);
  }

  public function agregarEstatus()
  {
    return view('estatus/agregar');
  }

  // Nacionalidades
  public function actualizarNacionalidad(Request $request)
  {
    $nacionalidad = Nacionalidad::find($request->codigo_nacionalidad);
    return view('nacionalidades/actualizar', ['nacionalidad' => $nacionalidad]);
  }

  public function listarNacionalidades()
  {
    $nacionalidades = Nacionalidad::all();
    return view('nacionalidades/listar', ['nacionalidades' => $nacionalidades]);
  }

  public function agregarNacionalidad()
  {
    return view('nacionalidades/agregar');
  }

  // Departamentos
  public function actualizarDepartamento(Request $request)
  {
    $departamento = Departamento::find($request->codigo_departamento);
    return view('departamentos/actualizar', ['departamento' => $departamento]);
  }

  public function listarDepartamentos()
  {
    $departamentos = Departamento::all();
    return view('departamentos/listar', ['departamentos' => $departamentos]);
  }

  public function agregarDepartamento()
  {
    return view('departamentos/agregar');
  }

  // Perfiles
  public function actualizarPerfil(Request $request)
  {
    $perfil = Perfil::find($request->codigo_perfil);
    return view('perfiles/actualizar', ['perfil' => $perfil]);
  }

  public function listarPerfiles()
  {
    $perfiles = Perfil::all();
    return view('perfiles/listar', ['perfiles' => $perfiles]);
  }

  public function agregarPerfil()
  {
    return view('perfiles/agregar');
  }
}
