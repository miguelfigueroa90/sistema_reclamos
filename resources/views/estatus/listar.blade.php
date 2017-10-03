@extends('layouts.default')
@section('content')
<table>
  <tr>
    <td>tipo</td>
    <td>acciones</td>
  </tr>
  @foreach($lista_estatus as $estatus)
    <tr>
      <td>{{$estatus->tipo}}</td>
      <td>
      <!-- Editar Departamento -->
      {!! Form::open(['method' => 'GET', 'url' => 'actualizar_estatus/'.$estatus->codigo_estatus]) !!}

        {!! Form::button('Actualizar', array('type' => 'submit')) !!}

      {!! Form::close() !!}

      <!-- Eliminar Departamento -->
      {!! Form::open(['method' => 'DELETE', 'url' => 'eliminar_estatus/'.$estatus->codigo_estatus, 'onsubmit' => 'return ConfirmDelete()']) !!}

        {!! Form::button('Eliminar', array('type' => 'submit')) !!}

      {!! Form::close() !!}
      </td>
    </tr>
  @endforeach
</table>
<script>
  function ConfirmDelete()
  {
    var x = confirm("está seguro de quere eliminar el registro?");
    if (x)
      return true;
    else
      return false;
  }
</script>
@endsection
