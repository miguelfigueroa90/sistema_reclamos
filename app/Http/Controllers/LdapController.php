<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\User;
use Auth;
// use Adldap\AdldapInterface;
// use Adldap\Laravel\Facades\Adldap;

class LdapController extends Controller
{
    /**
     * @var Adldap
     */
    // protected $adldap;
    
    /**
     * Constructor.
     *
     * @param AdldapInterface $adldap
     */
    // public function __construct(AdldapInterface $adldap)
    // {
    //     $this->adldap = $adldap;
    // }

    /**
     * [autenticar description]
     * 
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function autenticar(Request $request)
    {
        $usuario = Usuario::where('usuario', '=', $request->usuario)
            ->where('bloqueado', '=', false)
            ->first();

        if(!is_null($usuario)) {
            // if($request->method() == 'POST') {
            //     if (Adldap::auth()->attempt($request->get('usuario'), $request->get('clave'))) {
            //             return redirect('/');
            //         } else {
            //             return redirect('/')->with('error','Credenciales incorrectas, por favor verfique.');
            //         }
            // } else {
            //     return redirect('/');
            // }

            $usuario_autenticado = User::where('usuario', $request->usuario)
                ->where('clave', md5($request->clave))
                ->first();
            
            if(!is_null($usuario_autenticado)) {
                Auth::login($usuario_autenticado);
                return redirect('/');
            }
        }

        return redirect('/login')->with('message', 'Credenciales incorrectas, por favor verfique.');
    }

    public function salir()
    {
        Auth::logout();
        return redirect('/login');
    }
}
