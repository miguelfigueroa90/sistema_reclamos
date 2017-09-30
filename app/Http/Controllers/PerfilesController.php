<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil;

class PerfilesController extends Controller
{
    public function agregar(Request $request)
    {
      $perfil = new Perfil;
      $perfil->nombre = $request->nombre;
      $perfil->save();
      return redirect()->back()->with('El perfil ha sido agregado');
    }
}
