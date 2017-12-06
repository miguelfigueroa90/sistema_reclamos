@extends('layouts.reportes')
@section('title')
  Reporte de Auditoria - Usuarios
@endsection
@section('contenido')
<table class="table table-bordered">
  <thead>
    <tr>
      <th style="width: 40px">Evento</th>
      <th style="width: 40px">Modelo</th>
      <th style="width: 40px">Valor inicial</th>
      <th style="width: 40px">Valor final</th>
      <th style="width: 40px">Dirección IP</th>
      <th style="width: 40px">User agent</th>
      <th style="width: 40px">Fecha de creación</th>
      <th style="width: 40px">Fecha de modificación</th>
    </tr>
  </thead>
  <tbody>
    @foreach($datos as $auditoria)
      <tr>
        <td style="width: 10px" ><?= $auditoria->event; ?></td>
        <td style="width: 10px" ><?= $auditoria->auditable_type; ?></td>
        <td style="width: 10px" ><?= $auditoria->old_values; ?></td>
        <td style="width: 10px" ><?= $auditoria->new_values; ?></td>
        <td style="width: 10px" ><?= $auditoria->ip_address; ?></td>
        <td style="width: 10px" ><?= $auditoria->user_agent; ?></td>
        <td style="width: 10px" ><?= $auditoria->created_at; ?></td>
        <td style="width: 10px" ><?= $auditoria->updated_at; ?></td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection