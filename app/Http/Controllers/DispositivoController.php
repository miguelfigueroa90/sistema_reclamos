<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dispositivo;

class DispositivoController extends Controller
{
    public function actualizar(Request $request)
    {
    
       $nuevoTipoDispositivo = ucwords($request->tipo);
       $codigoDispositivo = $request->codigo_dispositivo;
     
    if($sql=Dispositivo::where([['tipo', '=', $nuevoTipoDispositivo],['condicion', '=', '1']])->first())
       
    {
        return redirect('/actualizar_dispositivo/'.$codigoDispositivo)->with('danger','¡El Dispositivo ingresado ya se encuentra registrado, favor intente con otro nombre!');
    
    }elseif ($sql=Dispositivo::where([['tipo', '=', $nuevoTipoDispositivo],['condicion', '=', '0']])->first()) {
   
        $codigoDispositivoSQL = $sql->codigo_dispositivo;
        $dispositivo = Dispositivo::find($codigoDispositivoSQL);
        $dispositivo->condicion = "1";
        $dispositivo->save();

        $codigoDispositivoView = $request->codigo_dispositivo;
        $dispositivoView = Dispositivo::find($codigoDispositivoView);
        $dispositivoView->condicion = "0";
        $dispositivoView->save();

        return redirect('/listar_dispositivo')->with('success','¡El Dispositivo ha sido actualizado!'); 

    }else{   

        $dispositivo = Dispositivo::find($codigoDispositivo);
        $dispositivo->tipo = $nuevoTipoDispositivo;
        $dispositivo->condicion = "1";
        $dispositivo->save();
        return redirect('/listar_dispositivo')->with('success','¡El Dispositivo ha sido actualizado!');
    }
    
    }

    public function eliminar(Request $request)
    {
        $codigoDispositivo = $request->codigo_dispositivo;
        $dispositivo = Dispositivo::find($codigoDispositivo);
        $dispositivo->condicion='0';
        $dispositivo->update();
        return redirect('/listar_dispositivo')->with('success','¡El Dispositivo ha sido eliminado!');
    }

    public function agregar(Request $request)
    {
        $nuevoTipoDispositivo = ucwords($request->tipo);
        $codigoDispositivo = $request->codigo_dispositivo;

    if($sql=Dispositivo::where([['tipo', '=', $nuevoTipoDispositivo],['condicion', '=', '1']])->first())
       
    {
        return redirect('/nuevo_dispositivo/')->with('success','¡El Dispositivo ingresado ya se encuentra registrado, favor intente con otro nombre!');
 
    }elseif ($sql=Dispositivo::where([['tipo', '=', $nuevoTipoDispositivo],['condicion', '=', '0']])->first()) {
       
        $codigoDispositivo = $sql->codigo_dispositivo;    
        $dispositivo = Dispositivo::find($codigoDispositivo);
        $dispositivo->condicion = "1";
        $dispositivo->save();
        return redirect('/listar_dispositivo')->with('success','¡El Dispositivo ha sido agregado!'); 

    }else{   

        $dispositivo = new Dispositivo;
        $dispositivo->tipo = $nuevoTipoDispositivo;
        $dispositivo->condicion = "1";
        $dispositivo->save();
        return redirect('/listar_dispositivo')->with('success','¡El Dispositivo ha sido agregado!');
        }
    }
}
