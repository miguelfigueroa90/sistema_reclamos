@extends('layouts.general')
@section('title')
Agregar Banco
@endsection
@section('contenido')

                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
  {!! Form::open(['url' => 'nuevo_banco', 'class' => 'form']) !!}
  <div class="form-group">
      {!! Form::label('Codigo de Banco') !!}
      {!! Form::text('codigo_banco', null, array('required', 'class'=>'form-control', )) !!}
      {!! Form::label('Nombre del Banco') !!}
      {!! Form::text('nombre', null, array('required', 'class'=>'form-control', )) !!}
  </div>
  <br>
  <div class="form-group">
      {!! Form::submit('Agregar', array('class'=>'art-button', 'class' => 'btn btn-primary')) !!}
  </div>
  {!! Form::close() !!}
@endsection

