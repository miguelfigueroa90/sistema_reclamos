<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil;

class PerfilesController extends Controller
{
    public function actualizar(Request $request)
    {
      $codigoPerfil = $request->codigo_perfil;
      $nuevoNombrePerfil = $request->nombre;
      $perfil = Perfil::find($codigoPerfil);
      $perfil->nombre = $nuevoNombrePerfil;
      $perfil->save();
      return redirect()->back()->with('success', 'El perfil ha sido actualizado');
    }

    public function eliminar(Request $request)
    {
      $codigoPerfil = $request->codigo_perfil;
      $perfil = Perfil::find($codigoPerfil);
      $perfil->delete();
      return redirect()->back()->with('danger', 'El perfil ha sido eliminado');
    }

    public function agregar(Request $request)
    {
      $perfil = new Perfil;
      $perfil->nombre = $request->nombre;
      $perfil->save();
      return redirect()->back()->with('success', 'El perfil ha sido agregado');
    }
}
