@extends('layouts.general')
@section('title')
Agregar Estatus
@endsection
@section('contenido')
  {!! Form::open(['url' => 'nuevo_estatus', 'class' => 'form']) !!}
  <div class="form-group">
      {!! Form::label('tipo') !!}
      {!! Form::text('tipo', null, array('required', 'class'=>'form-control', )) !!}
  </div>
  <br>
  <div class="form-group">
      {!! Form::button('Agregar<i class="fa fa-fw fa-save"></i>', array('class'=>'art-button', 'class' => 'btn btn-primary', 'type' => 'submit')) !!}
  </div>
  {!! Form::close() !!}
@endsection
