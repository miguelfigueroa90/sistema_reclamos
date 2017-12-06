<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Usuario;

class ReportesController extends Controller
{
    function crearReporte($datos, $nombre_vista)
    {
        $date = date('Y-m-d');
        $view =  \View::make('pdf/' . $nombre_vista, compact('datos', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf;
    }

    function generarReporteUsuarios(Request $request)
    {
    	$estado = $request->estado;
    	$codigo_perfil = $request->perfil;
    	$codigo_departamento = $request->departamento;

    	$query = DB::table('usuario')
    		->join('usuario_perfil', 'usuario.cedula', '=', 'usuario_perfil.cedula')
            ->join('perfil', 'usuario_perfil.codigo_perfil', '=', 'perfil.codigo_perfil')
            ->join('usuario_departamento', 'usuario.cedula', '=', 'usuario_departamento.cedula')
    		->join('departamento', 'usuario_departamento.codigo_departamento', '=', 'departamento.codigo_departamento');

    	if(!is_null($estado)) {
    		$query = $query->where('bloqueado', '=', $estado);
    	}

        if(!empty($codigo_perfil)) {
            $query = $query->where('usuario_perfil.codigo_perfil', $codigo_perfil);
        }

    	if(!empty($codigo_departamento)) {
    		$query = $query->where('usuario_departamento.codigo_departamento', $codigo_departamento);
    	}

		$usuarios = $query
            ->select('usuario.*', 'perfil.nombre as nombre_perfil', 'departamento.nombre as nombre_departamento')
            ->get();

        if($usuarios->count() <= 0) {
            return redirect('/reporte_usuarios')->with('danger', 'Los parámetros seleccionados no ha devuelto ningún resultado!');
        }

        $pdf = $this->crearReporte($usuarios, 'usuarios');

        return $pdf->stream('reporte_usuarios.pdf');
    }

    function generarReporteReclamos(Request $request)
    {
        $codigo_estatus = $request->estado;
        $fecha_desde = $request->fecha_desde;
        $fecha_hasta = $request->fecha_hasta;

        $query = DB::table('reclamo')
            ->join('estatus_reclamo', 'reclamo.numero_reclamo', '=', 'estatus_reclamo.numero_reclamo')
            ->join('estatus', 'estatus_reclamo.codigo_estatus', '=', 'estatus.codigo_estatus');

        if(!empty($codigo_estatus)) {
            $query = $query->where('estatus_reclamo.codigo_estatus', $codigo_estatus);
        }

        if(!is_null($fecha_desde)) {
            $fecha_desde = Carbon::createFromFormat('d/m/Y', $request->fecha_desde)->toDateString();
            $query = $query->where('fecha_registro', '>=', $fecha_desde);
        }

        if(!is_null($fecha_hasta)) {
            $fecha_hasta = Carbon::createFromFormat('d/m/Y', $request->fecha_hasta)->toDateString();
            $query = $query->where('fecha_registro', '<=', $fecha_hasta);
        }

        $reclamos = $query
            ->select('reclamo.*', 'estatus.tipo as estado')
            ->get();

        if($reclamos->count() <= 0) {
            return redirect('/reporte_reclamos')->with('danger', 'Los parámetros seleccionados no ha devuelto ningún resultado!');
        }

        $pdf = $this->crearReporte($reclamos, 'reclamos');

        return $pdf->stream('reporte_reclamos.pdf');
    }

    function generarReporteAuditoriaUsuarios(Request $request)
    {
        // dd($request);
        $cedula = $request->cedula;
        $usuario = Usuario::where('cedula', $cedula)->first();
        $auditorias = $usuario->audits()
            ->get();
        // foreach ($auditorias as &$auditoria) {
        //     $auditoria->valores = $auditoria->getModified();
        // }
        dd($auditorias);

    }
}
