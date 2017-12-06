<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil;

class PerfilesController extends Controller
{
    public function actualizar(Request $request)
    {
        $nuevoPerfil = ucwords($request->nombre);
        $codigoPerfil = $request->codigo_perfil;

        $perfil = Perfil::find($codigoPerfil);
        $perfil->nombre = $nuevoPerfil;
        $perfil->condicion = "1";
        $perfil->save();
        return redirect('perfiles')->with('success','¡El Perfil ha sido actualizado!');
    }

    public function eliminar(Request $request)
    {
        $perfiles_bloqueados = [1,2,3,4,5,6];
        $codigoPerfil = $request->codigo_perfil;

        if(in_array($codigoPerfil, $perfiles_bloqueados)) {
            return redirect('perfiles')->with('danger','¡Este perfil no puede ser eliminado porque se encuentra bloqueado!');
        }

        $perfil = Perfil::find($codigoPerfil);
        $perfil->condicion='0';
        $perfil->update();
        return redirect('perfiles')->with('warning','¡El Perfil ha sido eliminado!');
    }

    public function agregar(Request $request)
    {
        $nuevoPerfil = ucwords($request->nombre);
        $codigoPerfil = $request->codigo_perfil;

        if($sql=Perfil::where([['nombre', '=', $nuevoPerfil],['condicion', '=', '1']])->first()) {
            return redirect('/nuevo_perfil/')->with('danger','¡El Perfil ingresado ya se encuentra registrado, favor intente con otro nombre!');
        } elseif ($sql=Perfil::where([['nombre', '=', $nuevoPerfil],['condicion', '=', '0']])->first()) {
            $codigoPerfil = $sql->codigo_perfil;    
            $perfil = Perfil::find($codigoPerfil);
            $perfil->condicion = "1";
            $perfil->save();
            return redirect('perfiles')->with('success','¡El Perfil ha sido agregado!'); 
        } else {
            $perfil = new Perfil;
            $perfil->nombre = $nuevoPerfil;
            $perfil->condicion = "1";
            $perfil->save();
            return redirect('perfiles')->with('success','¡El Perfil ha sido agregado!');
        }
    }
}
