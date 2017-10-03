<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estatus;

class EstatusController extends Controller
{
  public function actualizar(Request $request)
  {
    $codigoEstatus = $request->codigo_estatus;
    $nuevoTipoEstatus = $request->tipo;
    $estatus = Estatus::find($codigoEstatus);
    $estatus->tipo = $nuevoTipoEstatus;
    $estatus->save();
    return redirect()->back()->with('El estatus ha sido actualizado');
  }

  public function eliminar(Request $request)
  {
    $codigoEstatus = $request->codigo_estatus;
    $estatus = Estatus::find($codigoEstatus);
    $estatus->delete();
    return redirect()->back()->with('El estatus ha sido eliminado');
  }

  public function agregar(Request $request)
  {
    $estatus = new Estatus;
    $estatus->tipo = $request->tipo;
    $estatus->save();
    return redirect()->back()->with('El estatus ha sido agregado');
  }
}
