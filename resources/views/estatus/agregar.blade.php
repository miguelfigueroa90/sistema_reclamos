@extends('layouts.default')
@section('content')
  {!! Form::open(['url' => 'nuevo_estatus', 'class' => 'form']) !!}
  <div class="form-group">
      {!! Form::label('tipo') !!}
      {!! Form::text('tipo', null, array('required', 'class'=>'form-control', )) !!}
  </div>
  <br>
  <div class="form-group">
      {!! Form::submit('agregar',
      array('class'=>'art-button')) !!}
  </div>
  {!! Form::close() !!}
@endsection
