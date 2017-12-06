@extends('layouts.general')
@section('title')
Actualizar Producto
@endsection
@section('contenido')
  {!! Form::open(['url' => 'actualizar_productos/'.$datos['producto']->codigo_producto, 'class' => 'form', 'method' => 'put']) !!}
<div class="form-group">
      {!! Form::label('nombre') !!}
      {!! Form::text('nombre', $datos['producto']->nombre, array('required', 'class'=>'form-control', )) !!}

      {!! Form::label('tipo') !!}
      {!! Form::text('tipo', $datos['producto']->tipo, array('required', 'class'=>'form-control', )) !!}
  </div>
  <br>
  <div class="form-group">
      {!! Form::button('Actualizar<i class="fa fa-fw fa-save"></i>', array('class'=>'art-button', 'class' => 'btn btn-primary', 'type' => 'submit')) !!}
  </div>
  {!! Form::close() !!}
@endsection
