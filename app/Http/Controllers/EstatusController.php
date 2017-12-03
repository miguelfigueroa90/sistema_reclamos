<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estatus;

class EstatusController extends Controller
{
    public function actualizar(Request $request)
    {
        $estatus = Estatus::find($request->codigo_estatus);
        $estatus->nombre = $request->nombre;
        $estatus->save();

        return redirect('/listar_estatus')->with('success','¡El estatus ha sido actualizado!');
    
    }

    public function eliminar(Request $request)
    {
        $estatus_bloqueados = [1, 2, 3,4,5,6,7,8];

        $codigoEstatus = $request->codigo_estatus;

        if(in_array($codigoEstatus, $estatus_bloqueados)) {
            return redirect('/listar_estatus')->with('danger','¡Este estatus no puede ser eliminado porque se encuentra bloqueado!');
        }

        $estatus = Estatus::find($codigoEstatus);
        $estatus->condicion='0';
        $estatus->update();
        return redirect('/listar_estatus')->with('success','¡El Estatus ha sido eliminado!');
    }

    public function agregar(Request $request)
    {
        $nuevoTipoEstatus = ucwords($request->tipo);
       
    if($sql=Estatus::where([['tipo', '=', $nuevoTipoEstatus],['condicion', '=', '1']])->first())
       
    {
        return redirect('/nuevo_estatus/')->with('success','¡El estatus ingresado ya se encuentra registrado, favor intente con otro nombre!');
    
    }elseif($sql=Estatus::where([['tipo', '=', $nuevoTipoEstatus],['condicion', '=', '0']])->first()){
    
        $codigoEstatusSQL = $sql->codigo_estatus;
        $estatus = Estatus::find($codigoEstatusSQL);
        $estatus->condicion = "1";
        $estatus->save();

       return redirect('/listar_estatus')->with('success','¡El estatus ha sido agregado!'); 

    }else{   

        $estatus = new Estatus;
        $estatus->tipo = $nuevoTipoEstatus;
        $estatus->condicion = "1";
        $estatus->save();
        return redirect('/listar_estatus')->with('success','¡El Estatus ha sido agregado!');
        }
    }
}
