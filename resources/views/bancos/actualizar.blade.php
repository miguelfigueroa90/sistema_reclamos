@extends('layouts.general')
@section('title')
Actualizar Banco
@endsection
@section('contenido')
  {!! Form::open(['url' => 'banco/'.$datos['banco']->codigo_banco, 'class' => 'form', 'method' => 'put']) !!}
  <div class="form-group">
      {!! Form::label('nombre') !!}
      {!! Form::text('nombre', $datos['banco']->nombre, array('required', 'class'=>'form-control', )) !!}
  </div>
  <br>
  <div class="form-group">
      {!! Form::submit('agregar', array('class'=>'art-button', 'class' => 'btn btn-primary')) !!}
  </div>
  {!! Form::close() !!}
@endsection
