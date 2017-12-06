<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportesController extends Controller
{
    function GenerarReporteUsuarios(Request $request)
    {
    	// dd($request);
    	$estado = $request->estado;
    	$codigo_perfil = $request->perfil;
    	$codigo_departamento = $request->departamento;

    	$query = DB::table('usuario')
    		->leftjoin('usuario_perfil', 'usuario.cedula', '=', 'usuario_perfil.codigo_perfil')
    		->leftjoin('perfil', 'usuario_perfil.codigo_perfil', '=', 'perfil.codigo_perfil');

    	if($estado !== '') {
    		$query = $query->where('bloqueado', '=', $estado);
    	}

    	if(!empty($codigo_perfil)) {
    		$query = $query->where('usuario_perfil.codigo_perfil', '=', $codigo_perfil);
    	}

		$usuarios = $query->select('usuario.*', 'perfil.*')->get();

    	dd($usuarios);
    }
}
