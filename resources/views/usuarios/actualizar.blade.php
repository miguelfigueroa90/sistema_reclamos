@extends('layouts.general')
@section('title')
Actualizar Usuario
@endsection
@section('contenido')
  {!! Form::open(['url' => 'actualizar_usuario/'.$datos['usuario']->cedula, 'method' => 'put', 'class' => 'form', 'id' => 'form-actualizar']) !!}
  <div class="form-group">
      {!! Form::label('Usuario') !!}
      {!! Form::text('usuario', $datos['usuario']->usuario, array('readonly' => 'readonly', 'class'=>'form-control')) !!}
  </div>
  <div class="form-group form-ajax">
      {!! Form::label('Cédula') !!}
      {!! Form::text('cedula', $datos['usuario']->cedula, array('readonly' => 'readonly', 'class' => 'form-control', 'id' => 'campo_cedula')) !!}
  </div>
  <div class="form-group form-ajax">
      {!! Form::label('Nombre') !!}
      {!! Form::text('nombre', $datos['usuario']->nombre, array('readonly' => 'readonly', 'class' => 'form-control', 'id' => 'campo_nombre')) !!}
  </div>
  <div class="form-group form-ajax">
      {!! Form::label('Apellido') !!}
      {!! Form::text('apellido', $datos['usuario']->apellido, array('readonly' => 'readonly', 'class' => 'form-control', 'id' => 'campo_apellido')) !!}
  </div>
  <div class="form-group form-ajax">
      {!! Form::label('Perfil') !!}
      <select name="codigo_perfil" id="perfil" class="form-control">
          <option value="">Seleccione...</option>
          @foreach($datos['perfiles'] as $perfil)
            <option value="{!! $perfil->codigo_perfil !!}" @if(!empty($datos['asociaciones']['perfil']) && $perfil->codigo_perfil == $datos['asociaciones']['perfil']->codigo_perfil) selected="selected" @endif>{!! $perfil->nombre !!}</option>
          @endforeach
      </select>
  </div>
  <div class="form-group form-ajax">
      {!! Form::label('Departamento') !!}
      <select name="codigo_departamento" id="Departamento" class="form-control">
          <option value="">Seleccione...</option>
          @foreach($datos['departamentos'] as $departamento)
            <option value="{!! $departamento->codigo_departamento !!}" @if(!empty($datos['asociaciones']['departamento']) && $departamento->codigo_departamento == $datos['asociaciones']['departamento']->codigo_departamento) selected="selected" @endif>{!! $departamento->nombre !!}</option>
          @endforeach
      </select>
  </div>
  <div class="form-group form-ajax">
      {!! Form::label('Estado') !!}
      <select name="estado" id="estado" class="form-control">
          <option value="">Seleccione...</option>
          <option value="0" @if($datos['usuario']->bloqueado == false) selected="selected" @endif>activo</option>
          <option value="1" @if($datos['usuario']->bloqueado == true) selected="selected" @endif>Inactivo</option>
      </select>
  </div>
  <div class="form-group">
      {!! Form::button('Actualizar<i class="fa fa-fw fa-save"></i>', array('id' => 'btn-actualizar', 'class' => 'btn btn-success', 'type' => 'submit')) !!}
  </div>
  {!! Form::close() !!}
@endsection

@section('scripts')
<script>
  $(document).ready(function(){
    $('#buscar').val(1);
    $('#guardar').val(0);

    $('#btn-limpiar').click(function(){
      $('.form-ajax').addClass('hidden');
      $('#btn-buscar').show();
      $('#buscar').val(1);
      $('#guardar').val(0);
    });
  });
</script>
@endsection