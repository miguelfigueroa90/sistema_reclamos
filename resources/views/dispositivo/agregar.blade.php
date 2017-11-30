@extends('layouts.general')
@section('title')
Agregar dispositivo
@endsection
@section('contenido')
  {!! Form::open(['url' => 'nuevo_dispositivo', 'class' => 'form']) !!}
  <div class="form-group">
      {!! Form::label('tipo') !!}
      {!! Form::text('tipo', null, array('required', 'class'=>'form-control', )) !!}
  </div>
  <br>
  <div class="form-group">
      {!! Form::submit('Agregar', array('class'=>'art-button', 'class' => 'btn btn-primary')) !!}
  </div>
  {!! Form::close() !!}
@endsection
