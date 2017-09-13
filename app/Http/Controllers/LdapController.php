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
     * Displays the all LDAP users.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = $this->adldap->search()->users()->get();

        dd($users);
        
        return view('users.index', compact('users'));
    }

    /**
     * [autenticar description]
     * 
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function autenticar(Request $request)
    {
        switch ($request->method()) {
            case 'POST':
                if (Adldap::auth()->attempt($request->get('usuario'), $request->get('clave'))) {
                    dd('usuario autenticado');
                } else {
                    dd('usuario no autenticado');
                }
                break;
            
            case 'GET':
                return view('autenticacion/login');
        }
    }
}
