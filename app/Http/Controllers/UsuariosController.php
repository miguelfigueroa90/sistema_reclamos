<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\usuario;

class UsuariosController extends Controller
{
    function procesarUsuario(Request $request)
    {
    	if($request->buscar) {
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
	    		$usuario->bloqueado = false;
	    		$usuario->save();

	    		return response()->json([
					'codigo_respuesta' => '200',
					'mensaje' => 'El usuario ha sido registrado en el sistema.',
		        ]);
    		} else {
    			return response()->json([
					'codigo_respuesta' => '404',
					'mensaje' => 'El usuario ya ha sido registrado previamente.',
		        ]);
    		}
    	}
    }
}
