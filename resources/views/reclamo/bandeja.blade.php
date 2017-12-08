@extends('layouts.general')
@section('title')
Bandeja
@endsection
@section('contenido')

<table class="table table-hover">
    <thead>
        <tr>
            <th>Código</th>
            <th>Fecha de registro</th>
            <th>Estado</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach($datos['registros'] as $reclamo)
            <tr>
                <td>{!! $reclamo->codigo_reclamo !!}</td>
                <td>{!! $reclamo->fecha_registro !!}</td>
                <td>{!! $reclamo->estatus !!}</td>
                <td>
                    <a href="{{ url('asignar_reclamo/'.$reclamo->numero_reclamo) }}" id="{!! $reclamo->numero_reclamo !!}" class="btn btn-info btn-asignar-reclamo @if($reclamo->estatus != 'Pendiente') deshabilitado @endif" @if($reclamo->estatus != 'Pendiente') disabled="disabled" @endif>Asignar <i class="fa fa-plus"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('.deshabilitado').click(function(){
            return false;
        });
    });
</script>
@endsection