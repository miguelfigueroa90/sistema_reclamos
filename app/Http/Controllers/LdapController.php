<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Adldap\AdldapInterface;
use Adldap\Laravel\Facades\Adldap;

class LdapController extends Controller
{
    /**
     * @var Adldap
     */
    protected $adldap;
    
    /**
     * Constructor.
     *
     * @param AdldapInterface $adldap
     */
    public function __construct(AdldapInterface $adldap)
    {
        $this->adldap = $adldap;
    }

    /**
     * [autenticar description]
     * 
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function autenticar(Request $request)
    {
        if($request->method() == 'POST') {
            if (Adldap::auth()->attempt($request->get('usuario'), $request->get('clave'))) {
                    return redirect('/');
                } else {
                    return redirect('/')->with('error','Credenciales incorrectas, por favor verfique.');
                }
        } else {
            return view('inicio');
        }
    }
}
