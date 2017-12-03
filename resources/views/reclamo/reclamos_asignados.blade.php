@extends('layouts.general')
@section('title')
Reclamos asignados
@endsection
@section('contenido')
<table class="table table-hover">
    <thead>
        <tr>
            <th>Número</th>
            <th>Fecha de registro</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach($datos['registros'] as $reclamo)
            <tr>
                <td>{!! $reclamo->numero_reclamo !!}</td>
                <td>{!! $reclamo->reclamo->fecha_registro !!}</td>
                <td>{!! $reclamo->estatus->tipo !!}</td>
                <td>
                    <a href="{{ url('gestionar_reclamo/'.$reclamo->numero_reclamo) }}" id="{!! $reclamo->numero_reclamo !!}" class="btn btn-info btn-modificar-reclamo">Modificar <i class="fa fa-plus"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection