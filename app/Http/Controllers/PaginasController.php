<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginasController extends Controller
{
  public function agregar(Request $request)
  {
    return view('perfiles/agregar');
  }
}
