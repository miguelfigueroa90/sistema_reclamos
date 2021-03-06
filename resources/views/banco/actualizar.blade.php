@extends('layouts.general')
@section('title')
Actualizar Banco
@endsection
@section('contenido')
  {!! Form::open(['url' => 'actualizar_banco/'.$datos['banco']->codigo_banco, 'class' => 'form', 'method' => 'put']) !!}
  <div class="form-group">
      {!! Form::label('Codigo de Banco') !!}
      {!! Form::text('codigo_banco', $datos['banco']->codigo_banco, array('required', 'class'=>'form-control', 'readonly'=>'true')) !!}
      {!! Form::label('Nombre del Banco') !!}
      {!! Form::text('nombre', $datos['banco']->nombre, array('required', 'class'=>'form-control', )) !!}
  </div>
  <br>
  <div class="form-group">
      {!! Form::button('Actualizar<i class="fa fa-fw fa-save"></i>', array('class'=>'art-button', 'class' => 'btn btn-primary', 'type' => 'submit')) !!}
  </div>
  {!! Form::close() !!}
@endsection
