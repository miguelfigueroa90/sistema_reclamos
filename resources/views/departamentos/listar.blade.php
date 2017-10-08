@extends('layouts.general')
@section('contenido')
<table>
  <tr>
    <td>nombre</td>
    <td>acciones</td>
  </tr>
  @foreach($departamentos as $departamento)
    <tr>
      <td>{{$departamento->nombre}}</td>
      <td>
      <!-- Editar Departamento -->
      {!! Form::open(['method' => 'GET', 'url' => 'departamento/'.$departamento->codigo_departamento]) !!}

        {!! Form::button('Actualizar', array('type' => 'submit')) !!}

      {!! Form::close() !!}

      <!-- Eliminar Departamento -->
      {!! Form::open(['method' => 'DELETE', 'url' => 'departamento/'.$departamento->codigo_departamento, 'onsubmit' => 'return ConfirmDelete()']) !!}

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
