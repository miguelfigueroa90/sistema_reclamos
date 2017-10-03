<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nacionalidad;

class NacionalidadesController extends Controller
{
  public function actualizar(Request $request)
  {
    $codigoNacionalidad = $request->codigo_nacionalidad;
    $nuevoNombreNacionalidad = $request->nombre;
    $nacionalidad = Nacionalidad::find($codigoNacionalidad);
    $nacionalidad->nombre = $nuevoNombreNacionalidad;
    $nacionalidad->save();
    return redirect()->back()->with('El nacionalidad ha sido actualizado');
  }

  public function eliminar(Request $request)
  {
    $codigoNacionalidad = $request->codigo_nacionalidad;
    $nacionalidad = Nacionalidad::find($codigoNacionalidad);
    $nacionalidad->delete();
    return redirect()->back()->with('El nacionalidad ha sido eliminado');
  }

  public function agregar(Request $request)
  {
    $nacionalidad = new Nacionalidad;
    $nacionalidad->nombre = $request->nombre;
    $nacionalidad->save();
    return redirect()->back()->with('El nacionalidad ha sido agregado');
  }
}
