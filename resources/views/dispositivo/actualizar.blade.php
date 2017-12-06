@extends('layouts.general')
@section('title')
Actualizar Dispositivo
@endsection
@section('contenido')
  {!! Form::open(['url' => 'actualizar_dispositivo/'.$datos['dispositivo']->codigo_dispositivo, 'class' => 'form', 'method' => 'put']) !!}
<div class="form-group">
      {!! Form::label('tipo') !!}
      {!! Form::text('tipo', $datos['dispositivo']->tipo, array('required', 'class'=>'form-control', )) !!}
  </div>
  <br>
  <div class="form-group">
      {!! Form::button('Actualizar<i class="fa fa-fw fa-save"></i>', array('class'=>'art-button', 'class' => 'btn btn-primary', 'type' => 'submit')) !!}
  </div>
  {!! Form::close() !!}
@endsection
