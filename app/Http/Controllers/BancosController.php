<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banco;

class BancosController extends Controller
{
    public function actualizar(Request $request)
    {
        $codigoBanco = $request->codigo_banco;
        $nuevoNombreBanco = strtoupper($request->nombre);

        $banco = Banco::where([['codigo_banco', '=', $codigoBanco]])->first();
        $banco->nombre = $nuevoNombreBanco;
        $banco->save();

        return redirect('/listar_bancos')->with('status','¡El banco ha sido actualizado!');
    
    }

    public function eliminar(Request $request)
    {
        $codigoBanco = $request->codigo_banco;
        $banco = Banco::find($codigoBanco);
        $banco->condicion='0';
        $banco->update();
        return redirect('/listar_bancos')->with('status','¡El banco ha sido eliminado!');
    }

    public function agregar(Request $request)
    {
        $codigoBanco = $request->codigo_banco;
        $nuevoNombreBanco = strtoupper($request->nombre);
     
    if($sql=Banco::where([['codigo_banco', '=', $codigoBanco],['condicion', '=', '1']])->first())
       
    {
      return redirect('/nuevo_banco/')->with('status','¡El banco ingresado ya se encuentra registrado, favor intente con otro código!');
    
    }elseif($sql=Banco::where([['codigo_banco', '=', $codigoBanco],['condicion', '=', '0']])->first()){

        $codigoBancoSQL = $sql->codigo_banco;
        $banco = Banco::find($codigoBancoSQL);
        $banco->nombre = $nuevoNombreBanco;
        $banco->condicion = "1";
        $banco->save();
        return redirect('/listar_bancos')->with('status','¡El banco ha sido agregado!'); 

    }else{   

        $banco = new Banco;
        $banco->codigo_banco = $codigoBanco;
        $banco->nombre = $nuevoNombreBanco;
        $banco->condicion='1';
        $banco->save();
        return redirect('/listar_bancos')->with('status','¡El banco ha sido agregado!');
        }
    }
}
