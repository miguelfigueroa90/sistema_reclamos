@extends('layouts.general')
@section('title')
Agregar Banco
@endsection
@section('contenido')
  {!! Form::open(['url' => 'nuevo_banco', 'class' => 'form']) !!}
  <div class="form-group">
      {!! Form::label('Codigo de Banco') !!}
      {!! Form::text('codigo_banco', null, array('required', 'class'=>'form-control', )) !!}
      {!! Form::label('Nombre del Banco') !!}
      {!! Form::text('nombre', null, array('required', 'class'=>'form-control', )) !!}
  </div>
  <br>
  <div class="form-group">
      {!! Form::button('Agregar<i class="fa fa-fw fa-save"></i>', array('class'=>'art-button', 'class' => 'btn btn-primary', 'type' => 'submit')) !!}
  </div>
  {!! Form::close() !!}
@endsection

