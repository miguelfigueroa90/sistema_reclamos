@extends('layouts.general')
@section('contenido')
  {!! Form::open(['url' => 'actualizar_estatus/'.$datos['estatus']->codigo_estatus, 'class' => 'form', 'method' => 'put']) !!}
  <div class="form-group">
      {!! Form::label('tipo') !!}
      {!! Form::text('tipo', $datos['estatus']->tipo, array('required', 'class'=>'form-control', )) !!}
  </div>
  <br>
  <div class="form-group">
      {!! Form::submit('actualizar', array('class'=>'art-button', 'class' => 'btn btn-primary')) !!}
  </div>
  {!! Form::close() !!}
@endsection
