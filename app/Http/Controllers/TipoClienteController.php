<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoCliente;

class TipoClienteController extends Controller
{
    public function actualizar(Request $request)
    {
        $TipoCliente = TipoCliente::find($request->codigo_tipo_cliente);
        $TipoCliente->nombre = $request->nombre;
        $TipoCliente->save();

        return redirect('/listar_TipoCliente')->with('success','¡El Tipo de Cliente ha sido actualizado!');
    }

    public function eliminar(Request $request)
    {
        $tipos_clientes_bloqueados = [1];
        $codigoTipoCliente = $request->codigo_tipo_cliente;

        if(in_array($codigoTipoCliente, $tipos_clientes_bloqueados)) {
            return redirect('/listar_TipoCliente')->with('danger','¡Este tipo de cliente no puede ser eliminado porque se encuentra bloqueado!');
        }

        $TipoCliente = TipoCliente::find($codigoTipoCliente);
        $TipoCliente->condicion = '0';
        $TipoCliente->update();
        return redirect('/listar_TipoCliente')->with('danger','¡El Tipo de Cliente ha sido eliminado!');
    }

    public function agregar(Request $request)
    {
        $nuevoTipoCliente = ucwords($request->nombre);
       
    if($sql=TipoCliente::where([['nombre', '=', $nuevoTipoCliente],['condicion', '=', '1']])->first())
       
    {
        return redirect('/nuevo_TipoCliente/')->with('success','¡El Tipo de Cliente ingresado ya se encuentra registrado, favor intente con otro nombre!');
    
    }elseif($sql=TipoCliente::where([['nombre', '=', $nuevoTipoCliente],['condicion', '=', '0']])->first()){
    
        $codigoTipoClienteSQL = $sql->codigo_tipo_cliente;
        $TipoCliente = TipoCliente::find($codigoTipoClienteSQL);
        $TipoCliente->condicion = "1";
        $TipoCliente->save();

       return redirect('/listar_TipoCliente')->with('success','¡El Tipo de Cliente ha sido agregado!'); 

    }else{   

        $TipoCliente = new TipoCliente;
        $TipoCliente->nombre = $nuevoTipoCliente;
        $TipoCliente->condicion = "1";
        $TipoCliente->save();
        return redirect('/listar_TipoCliente')->with('success','¡El Tipo de Cliente ha sido agregado!');
        }
    }
}
