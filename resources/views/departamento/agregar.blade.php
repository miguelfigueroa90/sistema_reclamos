@extends('layouts.general')
@section('title')
Agregar Departamento
@endsection
@section('contenido')
  {!! Form::open(['url' => 'nuevo_departamento', 'class' => 'form']) !!}
  <div class="form-group">
      {!! Form::label('nombre') !!}
      {!! Form::text('nombre', null, array('required', 'class'=>'form-control', )) !!}
  </div>
  <br>
  <div class="form-group">
      {!! Form::button('Agregar<i class="fa fa-fw fa-save"></i>', array('class'=>'art-button', 'class' => 'btn btn-primary', 'type' => 'submit')) !!}
  </div>
  {!! Form::close() !!}
@endsection
