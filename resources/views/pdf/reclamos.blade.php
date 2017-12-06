@extends('layouts.reportes')
@section('title')
  Reporte de Reclamos
@endsection
@section('contenido')
<table class="table table-bordered">
  <thead>
    <tr>
      <th style="width: 40px">Código</th>
      <th>Fecha de registro</th>
      <th style="width: 40px">Estado</th>
      <th>Descripción</th>
    </tr>
  </thead>
  <tbody>
    @foreach($datos as $reclamo)
      <tr>
        <td style="width: 10px" ><?= $reclamo->codigo_reclamo; ?></td>
        <td><?= $reclamo->fecha_registro; ?></td>
        <td style="width: 10px" ><?= $reclamo->estado; ?></td>
        <td><?= $reclamo->descripcion; ?></td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection