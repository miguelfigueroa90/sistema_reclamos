@extends('layouts.general')
@section('title')
	Reporte de usuarios
@endsection
@section('contenido')
    {!! Form::open(['url' => 'generar_reporte_usuarios', 'method' => 'post', 'class' => 'form', 'id' => 'form-reporte-usuarios']) !!}
		<div class="col-md-4 form-group">
    		{!! Form::label('Estado') !!}
    		{!! Form::select('estado', ['' => 'Seleccione...', 0 => 'Activo', 1 => 'Inactivo'], null, ['class' => 'form-control']) !!}
    	</div>
    	<div class="col-md-4 form-group">
    		{!! Form::label('Perfil') !!}
    		{!! Form::select('perfil', $datos['perfiles'], null, ['class' => 'form-control']) !!}
    	</div>
    	<div class="col-md-4 form-group">
    		{!! Form::label('Departamento') !!}
    		{!! Form::select('departamento', $datos['departamentos'], null, ['class' => 'form-control']) !!}
    	</div>
		<div class="col-md-12">
    		{!! Form::button('Generar', ['class'=>'btn btn-info', 'id' => 'btn-buscar', 'type' => 'submit']) !!}
    	</div>
    {!! Form::close() !!}
@endsection
