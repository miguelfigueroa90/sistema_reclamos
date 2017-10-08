@extends('layouts.general')
@section('contenido')
  {!! Form::open(['url' => 'perfil/'.$perfil->codigo_perfil, 'class' => 'form', 'method' => 'put']) !!}
  <div class="form-group">
      {!! Form::label('nombre') !!}
      {!! Form::text('nombre', $perfil->nombre, array('required', 'class'=>'form-control', )) !!}
  </div>
  <br>
  <div class="form-group">
      {!! Form::submit('agregar',
      array('class'=>'art-button')) !!}
  </div>
  {!! Form::close() !!}
@endsection
