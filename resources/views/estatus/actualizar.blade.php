@extends('layouts.general')
@section('title')
Actualizar Estatus
@endsection
@section('contenido')

                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
  {!! Form::open(['url' => 'actualizar_estatus/'.$datos['estatus']->codigo_estatus, 'class' => 'form', 'method' => 'put']) !!}
  <div class="form-group">
      {!! Form::label('tipo') !!}
      {!! Form::text('tipo', $datos['estatus']->tipo, array('required', 'class'=>'form-control', )) !!}
  </div>
  <br>
  <div class="form-group">
      {!! Form::submit('Actualizar', array('class'=>'art-button', 'class' => 'btn btn-primary')) !!}
  </div>
  {!! Form::close() !!}
@endsection
