@extends('layouts.general')
@section('contenido')
    {!! Form::open(['url' => 'reclamo', 'class' => 'form']) !!}
    <div class="form-group">
        {!! Form::label('descripción') !!}
        {!! Form::textarea('descripcion', null, array('required', 'class'=>'form-control', )) !!}
    </div>
    <br>
    <div class="form-group">
        {!! Form::submit('agregar', array('class'=>'art-button', 'class' => 'btn btn-primary')) !!}
    </div>
    {!! Form::close() !!}
@endsection
