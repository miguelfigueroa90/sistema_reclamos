@extends('layouts.general')
@section('contenido')
  {!! Form::open(['url' => 'actualizar_perfil/'.$datos['perfil']->codigo_perfil, 'class' => 'form', 'method' => 'put']) !!}
  <div class="form-group">
      {!! Form::label('nombre') !!}
      {!! Form::text('nombre', $datos['perfil']->nombre, array('required', 'class'=>'form-control', )) !!}
  </div>
  <br>
  <div class="form-group">
      {!! Form::submit('agregar', array('class'=>'art-button', 'class' => 'btn btn-primary')) !!}
  </div>
  {!! Form::close() !!}
@endsection
