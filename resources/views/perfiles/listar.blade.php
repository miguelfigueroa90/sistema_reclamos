@extends('layouts.general')
@section('contenido')
<table>
  <tr>
    <td>nombre</td>
    <td>acciones</td>
  </tr>
  @foreach($perfiles as $perfil)
    <tr>
      <td>{{$perfil->nombre}}</td>
      <td>
      <!-- Editar Perfil -->
      {!! Form::open(['method' => 'GET', 'url' => 'perfil/'.$perfil->codigo_perfil]) !!}

        {!! Form::button('Actualizar', array('type' => 'submit')) !!}

      {!! Form::close() !!}

      <!-- Eliminar Perfil -->
      {!! Form::open(['method' => 'DELETE', 'url' => 'perfil/'.$perfil->codigo_perfil, 'onsubmit' => 'return ConfirmDelete()']) !!}

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
