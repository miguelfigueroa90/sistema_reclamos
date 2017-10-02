@extends('layouts.default')
@section('content')
  {!! Form::open(['url' => 'departamento/'.$departamento->codigo_departamento, 'class' => 'form', 'method' => 'put']) !!}
  <div class="form-group">
      {!! Form::label('nombre') !!}
      {!! Form::text('nombre', $departamento->nombre, array('required', 'class'=>'form-control', )) !!}
  </div>
  <br>
  <div class="form-group">
      {!! Form::submit('agregar',
      array('class'=>'art-button')) !!}
  </div>
  {!! Form::close() !!}
@endsection
