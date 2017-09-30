<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil;

class PaginasController extends Controller
{
  public function actualizarPerfil(Request $request)
  {
    $perfil = Perfil::find($request->codigo_perfil);
    return view('perfiles/actualizar', ['perfil' => $perfil]);
  }

  public function agregarPerfil()
  {
    return view('perfiles/agregar');
  }

  public function listarPerfiles()
  {
    $perfiles = Perfil::all();
    return view('perfiles/listar', ['perfiles' => $perfiles]);
  }
}
