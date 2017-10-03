@extends('layouts.default')
@section('content')
  {!! Form::open(['url' => 'actualizar_estatus/'.$estatus->codigo_estatus, 'class' => 'form', 'method' => 'put']) !!}
  <div class="form-group">
      {!! Form::label('tipo') !!}
      {!! Form::text('tipo', $estatus->tipo, array('required', 'class'=>'form-control', )) !!}
  </div>
  <br>
  <div class="form-group">
      {!! Form::submit('actualizar',
      array('class'=>'art-button')) !!}
  </div>
  {!! Form::close() !!}
@endsection
