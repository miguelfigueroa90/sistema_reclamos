<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\usuario;
use App\usuarioDepartamento;
use App\usuarioPerfil;

class UsuariosController extends Controller
{
    function procesarUsuario(Request $request)
    {
    	if($request->ajax()) {
    		$correo = $request->usuario . '@bav.gob.ve';
	    	$usuario = User::where('correo', '=', $correo)->first();

	        if(!is_null($usuario)) {
	        	return response()->json([
					'codigo_respuesta' => '200',
					'usuario' => $request->usuario,
					'cedula' => $usuario->cedula,
					'nombre' => $usuario->nombre,
					'apellido' => $usuario->apellido
		        ]);
	        } else {
	        	return response()->json([
	        		'codigo_respuesta' => '404',
        			'mensaje' => 'El usuario no ha sido encontrado'
	        	]);
	        }
    	} else {
    		$usuario = Usuario::where('cedula', '=', $request->cedula)->first();

    		if(is_null($usuario)) {
    			$usuario = new Usuario;
	    		$usuario->cedula = $request->cedula;
	    		$usuario->usuario = $request->usuario;
	    		$usuario->nombre = $request->nombre;
	    		$usuario->apellido = $request->apellido;
	    		$usuario->bloqueado = $request->estado;
	    		$usuario->save();

	    		$usuario->Perfil()->attach($request->codigo_perfil);
	    		$usuario->Departamento()->attach($request->codigo_departamento);

		        return redirect('/usuarios')->with('success','El usuario ha sido registrado en el sistema');
    		} else {
		        return redirect('/usuarios')->with('danger','El usuario ya ha sido registrado previamente');
    		}
    	}
    }

    function actualizar(Request $request) {
    	$usuario_departamento = UsuarioDepartamento::where('cedula', '=', $request->cedula)->first();

    	if(is_null($usuario_departamento)) {
    		$usuario_departamento = new UsuarioDepartamento;
    		$usuario_departamento->cedula = $request->cedula;
    	}

		$usuario_departamento->codigo_departamento = $request->codigo_departamento;
		$usuario_departamento->save();

		$usuario_perfil = UsuarioPerfil::where('cedula', '=', $request->cedula)->first();

		if(is_null($usuario_perfil)) {
    		$usuario_perfil = new UsuarioPerfil;
    		$usuario_perfil->cedula = $request->cedula;
    	}

		$usuario_perfil->codigo_perfil = $request->codigo_perfil;
		$usuario_perfil->save();

		$usuario = Usuario::find($request->cedula);
		$usuario->bloqueado = $request->estado;
		$usuario->save();

		return redirect('/usuarios')->with('success','El usuario ha sido actualizado');
    }

    function bloquear(Request $request)
    {
    	$cedula = $request->cedula;
        $usuario = Usuario::find($cedula);
        $usuario->bloqueado = '1';
        $usuario->update();
        return redirect('/usuarios')->with('warning','¡El Usuario ha sido bloqueado!');
    }

    function desbloquear(Request $request)
    {
    	$cedula = $request->cedula;
        $usuario = Usuario::find($cedula);
        $usuario->bloqueado = '0';
        $usuario->update();
        return redirect('/usuarios')->with('success','¡El Usuario ha sido desbloqueado!');
    }
}
