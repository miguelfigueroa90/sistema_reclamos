<?php

namespace App\Http\Middleware;

use Closure;
use App\UsuarioPerfil;

class GestionDeUsuarios
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // return $next($request);
        $perfiles_autorizados = [1];

        $usuario = \Auth::user();

        $cedula = $usuario->cedula;

        $usuario_perfil = UsuarioPerfil::where('cedula', '=', $cedula)->first();
        
        if(in_array($usuario_perfil->codigo_perfil, $perfiles_autorizados)) {
            return $next($request);
        } else {
            return redirect('/')->with('danger', '¡No tiene privilegios suficientes para ingresar a este módulo!');
        }
    }
}
