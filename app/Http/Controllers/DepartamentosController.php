<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;

class DepartamentosController extends Controller
{
    public function actualizar(Request $request)
    {
        $nuevoTipoDepartamento = ucwords($request->nombre);
        $codigoDepartamento = $request->codigo_departamento;

        $departamento = Departamento::find($codigoDepartamento);
        $departamento->nombre = $nuevoTipoDepartamento;
        $departamento->condicion = "1";
        $departamento->save();
        return redirect('/listar_departamento')->with('success','¡El Departamento ha sido actualizado!');
    }

    public function eliminar(Request $request)
    {
        $codigoDepartamento = $request->codigo_departamento;
        $departamento = Departamento::find($codigoDepartamento);
        $departamento->condicion='0';
        $departamento->update();
        return redirect('/listar_departamento')->with('warning','¡El Departamento ha sido eliminado!');
    }

    public function agregar(Request $request)
    {
        $nuevoTipoDepartamento = ucwords($request->nombre);
        $codigoDepartamento = $request->codigo_departamento;

        if($sql=Departamento::where([['nombre', '=', $nuevoTipoDepartamento],['condicion', '=', '1']])->first()) {
            return redirect('/nuevo_departamento/')->with('success','¡El Departamento ingresado ya se encuentra registrado, favor intente con otro nombre!');
        } elseif ($sql=Departamento::where([['nombre', '=', $nuevoTipoDepartamento],['condicion', '=', '0']])->first()) {
            $codigoDepartamento = $sql->codigo_departamento;    
            $departamento = Departamento::find($codigoDepartamento);
            $departamento->condicion = "1";
            $departamento->save();
            return redirect('/listar_departamento')->with('success','¡El Departamento ha sido agregado!'); 
        } else {
            $departamento = new Departamento;
            $departamento->nombre = $nuevoTipoDepartamento;
            $departamento->condicion = "1";
            $departamento->save();
            return redirect('/listar_departamento')->with('success','¡El Departamento ha sido agregado!');
        }
    }
}
