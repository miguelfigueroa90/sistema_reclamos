@extends('layouts.reportes')
@section('title')
  Reporte de usuarios
@endsection
@section('contenido')
<table class="table table-bordered">
  <thead>
    <tr>
      <th style="width: 40px">Cédula</th>
      <th>Usuario</th>
      <th style="width: 40px">Nombre</th>
    </tr>
  </thead>
  <tbody>
    @foreach($datos as $usuario)
      <tr>
        <td style="width: 10px" ><?= $usuario->cedula; ?></td>
        <td><?= $usuario->usuario; ?></td>
        <td><?= $usuario->nombre; ?></td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection