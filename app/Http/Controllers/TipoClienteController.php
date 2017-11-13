<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoCliente;

class TipoClienteController extends Controller
{
    public function actualizar(Request $request)
    {
        $codigoTipoCliente = $request->codigo_tipo_cliente;
        $nuevoTipoCliente = strtoupper($request->nombre);

      
    if($sql=TipoCliente::where([['nombre', '=', $nuevoTipoCliente],['condicion', '=', '1']])->first())
       
    {
        return redirect('/actualizar_TipoCliente/'.$codigoTipoCliente)->with('status','¡El Tipo de Cliente ingresado ya se encuentra registrado, favor intente con otro nombre!');
    
    }elseif($sql=TipoCliente::where([['nombre', '=', $nuevoTipoCliente],['condicion', '=', '0']])->first()){
    
        $codigoTipoClienteSQL = $sql->codigo_tipo_cliente;
        $TipoCliente = TipoCliente::find($codigoTipoClienteSQL);
        $TipoCliente->condicion = "1";
        $TipoCliente->save();

        $codigoTipoClienteView = $request->codigo_tipo_cliente;
        $TipoClienteView = TipoCliente::find($codigoTipoClienteView);
        $TipoClienteView->condicion = "0";
        $TipoClienteView->save();

       return redirect('/listar_TipoCliente')->with('status','¡El Tipo de Cliente ha sido actualizado!');

    }else{   
        $TipoCliente = TipoCliente::find($codigoTipoCliente);
        $TipoCliente->nombre = $nuevoTipoCliente;
        $TipoCliente->save();
        return redirect('/listar_TipoCliente')->with('status','¡El Tipo de Cliente ha sido actualizado!');
    }
    
    }

    public function eliminar(Request $request)
    {
        $codigoTipoCliente = $request->codigo_tipo_cliente;
        $TipoCliente = TipoCliente::find($codigoTipoCliente);
        $TipoCliente->condicion = '0';
        $TipoCliente->update();
        return redirect('/listar_TipoCliente')->with('status','¡El Tipo de Cliente ha sido eliminado!');
    }

    public function agregar(Request $request)
    {
        $nuevoTipoCliente = strtoupper($request->nombre);
       
    if($sql=TipoCliente::where([['nombre', '=', $nuevoTipoCliente],['condicion', '=', '1']])->first())
       
    {
        return redirect('/nuevo_TipoCliente/')->with('status','¡El Tipo de Cliente ingresado ya se encuentra registrado, favor intente con otro nombre!');
    
    }elseif($sql=TipoCliente::where([['nombre', '=', $nuevoTipoCliente],['condicion', '=', '0']])->first()){
    
        $codigoTipoClienteSQL = $sql->codigo_tipo_cliente;
        $TipoCliente = TipoCliente::find($codigoTipoClienteSQL);
        $TipoCliente->condicion = "1";
        $TipoCliente->save();

       return redirect('/listar_TipoCliente')->with('status','¡El Tipo de Cliente ha sido agregado!'); 

    }else{   

        $TipoCliente = new TipoCliente;
        $TipoCliente->nombre = $nuevoTipoCliente;
        $TipoCliente->condicion = "1";
        $TipoCliente->save();
        return redirect('/listar_TipoCliente')->with('status','¡El Tipo de Cliente ha sido agregado!');
        }
    }
}
