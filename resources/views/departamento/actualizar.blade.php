@extends('layouts.general')
@section('title')
Actualizar Departamento
@endsection
@section('contenido')
  {!! Form::open(['url' => 'actualizar_departamento/'.$datos['departamento']->codigo_departamento, 'class' => 'form', 'method' => 'put']) !!}
<div class="form-group">
      {!! Form::label('nombre') !!}
      {!! Form::text('nombre', $datos['departamento']->nombre, array('required', 'class'=>'form-control', )) !!}
  </div>
  <br>
  <div class="form-group">
      {!! Form::submit('Actualizar', array('class'=>'art-button', 'class' => 'btn btn-primary')) !!}
  </div>
  {!! Form::close() !!}
@endsection
