<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;

class DepartamentosController extends Controller
{
  public function actualizar(Request $request)
  {
    $codigoDepartamento = $request->codigo_departamento;
    $nuevoNombreDepartamento = $request->nombre;
    $departamento = Departamento::find($codigoDepartamento);
    $departamento->nombre = $nuevoNombreDepartamento;
    $departamento->save();
    return redirect()->back()->with('El departamento ha sido actualizado');
  }

  public function eliminar(Request $request)
  {
    $codigoDepartamento = $request->codigo_departamento;
    $departamento = Departamento::find($codigoDepartamento);
    $departamento->delete();
    return redirect()->back()->with('El departamento ha sido eliminado');
  }

  public function agregar(Request $request)
  {
    $departamento = new Departamento;
    $departamento->nombre = $request->nombre;
    $departamento->save();
    return redirect()->back()->with('El departamento ha sido agregado');
  }
}
