@extends('layouts.general')
@section('contenido')
@if(!empty($datos['registros']))
<table class="table table-hover">
    <thead>
        <tr>
            <th>Número</th>
            <th>Fecha de registro</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach($datos['registros'] as $reclamo)
        <tr>
            <td>{{$reclamo->numero_reclamo}}</td>
            <td>{{$reclamo->fecha_registro}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection