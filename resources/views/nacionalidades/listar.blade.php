@extends('layouts.general')
@section('contenido')
<table>
  <tr>
    <td>nombre</td>
    <td>acciones</td>
  </tr>
  @foreach($nacionalidades as $nacionalidad)
    <tr>
      <td>{{$nacionalidad->nombre}}</td>
      <td>
      <!-- Editar Departamento -->
      {!! Form::open(['method' => 'GET', 'url' => 'nacionalidad/'.$nacionalidad->codigo_nacionalidad]) !!}

        {!! Form::button('Actualizar', array('type' => 'submit')) !!}

      {!! Form::close() !!}

      <!-- Eliminar Departamento -->
      {!! Form::open(['method' => 'DELETE', 'url' => 'nacionalidad/'.$nacionalidad->codigo_nacionalidad, 'onsubmit' => 'return ConfirmDelete()']) !!}

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
