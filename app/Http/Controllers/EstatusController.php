<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estatus;

class EstatusController extends Controller
{
    public function actualizar(Request $request)
    {
        $codigoEstatus = $request->codigo_estatus;
        $nuevoTipoEstatus = strtoupper($request->tipo);

      
    if($sql=Estatus::where([['tipo', '=', $nuevoTipoEstatus],['condicion', '=', '1']])->first())
       
    {
        return redirect('/actualizar_estatus/'.$codigoEstatus)->with('status','¡El estatus ingresado ya se encuentra registrado, favor intente con otro nombre!');
    
    }elseif($sql=Estatus::where([['tipo', '=', $nuevoTipoEstatus],['condicion', '=', '0']])->first()){
    
        $codigoEstatusSQL = $sql->codigo_estatus;
        $estatus = Estatus::find($codigoEstatusSQL);
        $estatus->condicion = "1";
        $estatus->save();

        $codigoEstatusView = $request->codigo_estatus;
        $estatusView = Estatus::find($codigoEstatusView);
        $estatusView->condicion = "0";
        $estatusView->save();

       return redirect('/listar_estatus')->with('status','¡El estatus ha sido actualizado!');

    }else{   
        $estatus = Estatus::find($codigoEstatus);
        $estatus->tipo = $nuevoTipoEstatus;
        $estatus->save();
        return redirect('/listar_estatus')->with('status','¡El estatus ha sido actualizado!');
    }
    
    }

    public function eliminar(Request $request)
    {
        $codigoEstatus = $request->codigo_estatus;
        $estatus = Estatus::find($codigoEstatus);
        $estatus->condicion='0';
        $estatus->update();
        return redirect('/listar_estatus')->with('status','¡El Estatus ha sido eliminado!');
    }

    public function agregar(Request $request)
    {
        $nuevoTipoEstatus = strtoupper($request->tipo);
       
    if($sql=Estatus::where([['tipo', '=', $nuevoTipoEstatus],['condicion', '=', '1']])->first())
       
    {
        return redirect('/nuevo_estatus/')->with('status','¡El estatus ingresado ya se encuentra registrado, favor intente con otro nombre!');
    
    }elseif($sql=Estatus::where([['tipo', '=', $nuevoTipoEstatus],['condicion', '=', '0']])->first()){
    
        $codigoEstatusSQL = $sql->codigo_estatus;
        $estatus = Estatus::find($codigoEstatusSQL);
        $estatus->condicion = "1";
        $estatus->save();

       return redirect('/listar_estatus')->with('status','¡El estatus ha sido agregado!'); 

    }else{   

        $estatus = new Estatus;
        $estatus->tipo = $nuevoTipoEstatus;
        $estatus->condicion = "1";
        $estatus->save();
        return redirect('/listar_estatus')->with('status','¡El Estatus ha sido agregado!');
        }
    }
}
