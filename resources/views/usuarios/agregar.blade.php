@extends('layouts.general')
@section('contenido')
  {!! Form::open(['url' => 'buscar_usuario', 'class' => 'form']) !!}
  <div class="form-group">
      {!! Form::label('usuario') !!}
      {!! Form::text('usuario', null, array('required', 'class'=>'form-control', )) !!}
  </div>
  <br>
  <div class="form-group">
      {!! Form::submit('Buscar', array('class' => 'btn btn-primary')) !!}
  </div>
  {!! Form::close() !!}
@endsection
