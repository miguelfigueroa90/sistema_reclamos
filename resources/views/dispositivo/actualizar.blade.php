@extends('layouts.general')
@section('contenido')
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
  {!! Form::open(['url' => 'actualizar_dispositivo/'.$datos['dispositivo']->codigo_dispositivo, 'class' => 'form', 'method' => 'put']) !!}
<div class="form-group">
      {!! Form::label('tipo') !!}
      {!! Form::text('tipo', $datos['dispositivo']->tipo, array('required', 'class'=>'form-control', )) !!}
  </div>
  <br>
  <div class="form-group">
      {!! Form::submit('Actualizar', array('class'=>'art-button', 'class' => 'btn btn-primary')) !!}
  </div>
  {!! Form::close() !!}
@endsection
