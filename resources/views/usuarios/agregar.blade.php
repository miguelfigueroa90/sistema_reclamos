@extends('layouts.general')
@section('title')
Agregar Usuario
@endsection
@section('contenido')
  {!! Form::open(['url' => 'usuario', 'class' => 'form', 'id' => 'form-buscar']) !!}
  {!! Form::hidden('buscar', 1, ['id' => 'buscar']) !!}
  {!! Form::hidden('guardar', 0, ['id' => 'guardar']) !!}
  <div class="form-group">
      {!! Form::label('Usuario') !!}
      {!! Form::text('usuario', null, array('required', 'class'=>'form-control')) !!}
  </div>
  <div class="form-group hidden form-ajax">
      {!! Form::label('Cédula') !!}
      {!! Form::text('cedula', null, array('readonly' => 'readonly', 'class' => 'form-control', 'id' => 'campo_cedula')) !!}
  </div>
  <div class="form-group hidden form-ajax">
      {!! Form::label('Nombre') !!}
      {!! Form::text('nombre', null, array('readonly' => 'readonly', 'class' => 'form-control', 'id' => 'campo_nombre')) !!}
  </div>
  <div class="form-group hidden form-ajax">
      {!! Form::label('Apellido') !!}
      {!! Form::text('apellido', null, array('readonly' => 'readonly', 'class' => 'form-control', 'id' => 'campo_apellido')) !!}
  </div>
  <div class="form-group hidden form-ajax">
      {!! Form::label('Perfil') !!}
      <select name="perfil" id="perfil" class="form-control">
          <option value="">Seleccione...</option>
          @foreach($datos['perfiles'] as $perfil)
              <option value="{!! $perfil->codigo_perfil !!}">{!! $perfil->nombre !!}</option>
          @endforeach
      </select>
  </div>
  <div class="form-group hidden form-ajax">
      {!! Form::label('Departamento') !!}
      <select name="Departamento" id="Departamento" class="form-control">
          <option value="">Seleccione...</option>
          @foreach($datos['departamentos'] as $departamento)
              <option value="{!! $departamento->codigo_departamento !!}">{!! $departamento->nombre !!}</option>
          @endforeach
      </select>
  </div>
  <div class="form-group hidden form-ajax">
      {!! Form::label('Estado') !!}
      <select name="Estado" id="Estado" class="form-control">
          <option value="">Seleccione...</option>
          <option value="1">activo</option>
          <option value="0">Inactivo</option>
      </select>
  </div>
  <div class="form-group">
      {!! Form::button('Buscar<i class="fa fa-fw fa-search"></i>', array('id' => 'btn-buscar', 'class' => 'btn btn-primary', 'type' => 'button')) !!}
      {!! Form::button('Registrar<i class="fa fa-fw fa-save"></i>', array('id' => 'btn-guardar', 'class' => 'btn btn-success hidden form-ajax', 'type' => 'button')) !!}
      {!! Form::button('Limpiar<i class="fa fa-fw fa-trash"></i>', array('id' => 'btn-limpiar', 'class' => 'btn btn-warning hidden form-ajax', 'type' => 'reset')) !!}
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

    $('#btn-guardar').click(function(){
      var formulario =  $('#form-buscar');
      var ruta = formulario.attr('action');
      var datos = formulario.serialize();

      $('.overlay').show();

      $.post(ruta, datos, function(resultado){
        alert(resultado.mensaje);

        $('.overlay').hide();
      });
    });

    $('#btn-buscar').click(function(){
      var formulario =  $('#form-buscar');
      var ruta = formulario.attr('action');
      var datos = formulario.serialize();

      $('.overlay').show();

      $.post(ruta, datos, function(resultado){
        switch(resultado.codigo_respuesta) {
          case '200':
            $('#campo_cedula').val(resultado.cedula);
            $('#campo_nombre').val(resultado.nombre);
            $('#campo_apellido').val(resultado.apellido);
            $('.form-ajax').removeClass('hidden');
            $('#btn-buscar').hide();
            $('#buscar').val(0);
            $('#guardar').val(1);
            break;

          case '404':
            var campos_ajax = formulario.find('form-ajax');

            if(!campos_ajax.hasClass('hidden')) {
              $('.form-ajax').addClass('hidden');
            }

            $('#buscar').val(1);
            $('#guardar').val(0);

            alert(resultado.mensaje);
            break;
        }

        $('.overlay').hide();
      });
    });
  });
</script>
@endsection