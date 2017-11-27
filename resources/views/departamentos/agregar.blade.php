@extends('layouts.general')
@section('title')
Agregar Departamento
@endsection
@section('contenido')
  {!! Form::open(['url' => 'departamento', 'class' => 'form']) !!}
  <div class="form-group">
      {!! Form::label('nombre') !!}
      {!! Form::text('nombre', null, array('required', 'class'=>'form-control', )) !!}
  </div>
  <br>
  <div class="form-group">
      {!! Form::submit('agregar', array('class'=>'art-button', 'class' => 'btn btn-primary')) !!}
  </div>
  {!! Form::close() !!}
@endsection
