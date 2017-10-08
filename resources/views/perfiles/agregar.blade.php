@extends('layouts.general')
@section('contenido')
  {!! Form::open(['url' => 'perfil', 'class' => 'form']) !!}
  <div class="form-group">
      {!! Form::label('nombre') !!}
      {!! Form::text('nombre', null, array('required', 'class'=>'form-control', )) !!}
  </div>
  <br>
  <div class="form-group">
      {!! Form::submit('agregar',
      array('class'=>'art-button')) !!}
  </div>
  {!! Form::close() !!}
@endsection
