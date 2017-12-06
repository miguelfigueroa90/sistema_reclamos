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
      {!! Form::button('Actualizar<i class="fa fa-fw fa-save"></i>', array('class'=>'art-button', 'class' => 'btn btn-primary', 'type' => 'submit')) !!}
  </div>
  {!! Form::close() !!}
@endsection
