@extends('layouts.general')
@section('contenido')

                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
  {!! Form::open(['url' => 'actualizar_productos/'.$datos['producto']->codigo_producto, 'class' => 'form', 'method' => 'put']) !!}
<div class="form-group">
      {!! Form::label('nombre') !!}
      {!! Form::text('nombre', $datos['producto']->nombre, array('required', 'class'=>'form-control', )) !!}

      {!! Form::label('tipo') !!}
      {!! Form::text('tipo', $datos['producto']->tipo, array('required', 'class'=>'form-control', )) !!}
  </div>
  <br>
  <div class="form-group">
      {!! Form::submit('Actualizar', array('class'=>'art-button', 'class' => 'btn btn-primary')) !!}
  </div>
  {!! Form::close() !!}
@endsection
