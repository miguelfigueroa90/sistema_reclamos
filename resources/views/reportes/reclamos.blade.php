@extends('layouts.general')
@section('title')
	Reporte de reclamos
@endsection
@section('contenido')
    {!! Form::open(['url' => 'generar_reporte_reclamos', 'method' => 'post', 'class' => 'form', 'id' => 'form-reporte-reclamos']) !!}
    	<div class="col-md-4 form-group">
    		{!! Form::label('Estado') !!}
    		{!! Form::select('estado', $datos['estatus'], null, ['class' => 'form-control']) !!}
    	</div>
    	<div class="col-md-4 form-group">
    		{!! Form::label('Fecha desde') !!}
    		<div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
			  {!! Form::text('fecha_desde', null, ['class' => 'form-control pull-right datepicker']) !!}
            </div>
    	</div>
    	<div class="col-md-4 form-group">
    		{!! Form::label('Fecha hasta') !!}
    		<div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
			  {!! Form::text('fecha_hasta', null, ['class' => 'form-control pull-right datepicker']) !!}
            </div>
    	</div>
    	<div class="col-md-12">
    		{!! Form::button('Generar', ['class'=>'btn btn-info', 'id' => 'btn-generar', 'type' => 'submit']) !!}
    	</div>
    {!! Form::close() !!}
@endsection
@section('scripts')
	<script>
		$('.datepicker').datepicker(function(){
	      autoclose: true;
	    });
	</script>
@endsection
