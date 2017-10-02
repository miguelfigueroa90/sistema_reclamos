<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil;
use App\Departamento;

class PaginasController extends Controller
{
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
