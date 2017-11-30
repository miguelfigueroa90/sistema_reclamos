@extends('layouts.general')
@section('title')
Actualizar tipo de Cliente
@endsection
@section('contenido')
  {!! Form::open(['url' => 'actualizar_TipoCliente/'.$datos['TipoCliente']->codigo_tipo_cliente, 'class' => 'form', 'method' => 'put']) !!}
  <div class="form-group">
      {!! Form::label('nombre') !!}
      {!! Form::text('nombre', $datos['TipoCliente']->nombre, array('required', 'class'=>'form-control', )) !!}
  </div>
  <br>
  <div class="form-group">
      {!! Form::submit('Actualizar', array('class'=>'art-button', 'class' => 'btn btn-primary')) !!}
  </div>
  {!! Form::close() !!}
@endsection
