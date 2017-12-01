<?php

namespace App\Http\Middleware;

use Closure;

class ConfiguracionDeVariables
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
        $usuario = \Auth::user();
        $cedula = $usuario->cedula;
        return $next($request);
    }
}
