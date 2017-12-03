@extends('layouts.general')
@section('title')
Gestión del Reclamo
@endsection
@section('contenido')
<div class="row">
	<div class="col-md-6">
		<h1>Datos del Reclamo</h1>
		<dl class="dl-horizontal">
		    <dt>Número de reclamo</dt>
		    <dd>{!! $datos['reclamo']->numero_reclamo !!}</dd>
		    <dt>Cedula del cliente</dt>
		    <dd>{!! $datos['reclamo']->cliente->cedula !!}</dd>
		    <dt>Nombre del cliente</dt>
		    <dd>{!! $datos['reclamo']->cliente->nombre . ' ' . $datos['reclamo']->cliente->apellido !!}</dd>
		    <dt>Teléfono</dt>
		    <dd>{!! $datos['reclamo']->cliente->telefono->telefono !!}</dd>
		    <dt>Correo</dt>
		    <dd>{!! $datos['reclamo']->cliente->correo_electronico->correo !!}</dd>
		    <dt>Cuenta bancaria</dt>
		    <dd>{!! $datos['reclamo']->cliente->cuenta_bancaria->cuenta_bancaria !!}</dd>
		    <dt>Producto</dt>
		    <dd>{!! $datos['reclamo']->producto->nombre !!}</dd>
		    <dt>Número de tarjeta</dt>
		    <dd>{!! $datos['reclamo']->producto->tarjeta->numero_tarjeta !!}</dd>
		    <dt>Estado actual</dt>
		    <dd>{!! $datos['reclamo']->estatus->tipo !!}</dd>
		    <dt>Descripcion</dt>
		    <dd>{!! $datos['reclamo']->descripcion !!}</dd>
		</dl>
	</div>
	<div class="col-md-6">
		@if(!empty($datos['reclamo']->transaccion))
			<h1>Datos de la transacción</h1>
			<dl class="dl-horizontal">
			    <dt>Secuencia</dt>
			    <dd>{!! $datos['reclamo']->transaccion->secuencia !!}</dd>
			    <dt>Fecha de transaccion</dt>
			    <dd>{!! $datos['reclamo']->transaccion->fecha_transaccion !!}</dd>
			    <dt>Código ISO</dt>
			    <dd>{!! $datos['reclamo']->transaccion->codigo_iso !!}</dd>
			    <dt>Hora</dt>
			    <dd>{!! $datos['reclamo']->transaccion->hora !!}</dd>
			    <dt>Código respuesta</dt>
			    <dd>{!! $datos['reclamo']->transaccion->codigo_respuesta !!}</dd>
			    <dt>Monto transaccion</dt>
			    <dd>Bs. F. {!! $datos['reclamo']->transaccion->monto_transaccion !!}</dd>
			</dl>
		@endif
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-12">
				<button id="btn-estatus" class="btn btn-info btn-lg">Estatus <i class="fa fa-refresh"></i></button>
				<button id="btn-transacciones" class="btn btn-info btn-lg">Transacciones <i class="fa fa-credit-card"></i></button>
			</div>
		</div>
		<br>
		<div class="container-fluid">
			<div class="row">
			<div id="estatus" class="hidden">
				<div class="form-group">
					<h3>Estatus</h3>
					{!! Form::open(['action' => ['ReclamosController@gestionarEstatusReclamo'], 'class' => 'form', 'id' => 'form-estatus']) !!}
					{!! Form::hidden('numero_reclamo', $datos['reclamo']->numero_reclamo, ['class' => 'campo-ajax', 'id' => 'campo_numero_reclamo']) !!}
					<select name="estatus" id="select-estatus" class="form-control">
						<option value="">Seleccione...</option>
						<option value="4">Procedente</option>
						<option value="5">No procedente</option>
						<option value="6">En Trámites</option>
						<option value="7">Devoluciones</option>
						<option value="8">Anulado</option>
					</select>
					<br>
					<button class="btn btn-success" id="btn-guardar-estatus">Guardar</button>
					{!! Form::close() !!}
				</div>
			</div>
			<div id="transacciones" class="hidden">
				<h3>Transacciones</h3>
				{!! Form::open(['action' => ['ReclamosController@gestionarTransaccionReclamo'], 'class' => 'form', 'id' => 'form-transaccion']) !!}
				{!! Form::hidden('numero_reclamo', $datos['reclamo']->numero_reclamo, ['class' => 'campo-ajax', 'id' => 'campo_numero_reclamo_transaccion']) !!}
				{!! Form::hidden('secuencia', null, ['class' => 'campo-ajax', 'id' => 'secuencia']) !!}
				{!! Form::hidden('nodo', null, ['class' => 'campo-ajax', 'id' => 'nodo']) !!}
				{!! Form::hidden('fecha_transaccion', null, ['class' => 'campo-ajax', 'id' => 'fecha_transaccion']) !!}
				{!! Form::hidden('codigo_iso', null, ['class' => 'campo-ajax', 'id' => 'codigo_iso']) !!}
				{!! Form::hidden('hora', null, ['class' => 'campo-ajax', 'id' => 'hora']) !!}
				{!! Form::hidden('codigo_respuesta', null, ['class' => 'campo-ajax', 'id' => 'codigo_respuesta']) !!}
				{!! Form::hidden('monto_transaccion', null, ['class' => 'campo-ajax', 'id' => 'monto_transaccion']) !!}
				<table id="tabla_transacciones" class="table table-bordered table-striped table-hover">
	                <thead>
	                    <tr>
	                        <th>Secuencia</th>
	                        <th>Nodo</th>
	                        <th>Fecha transacción</th>
	                        <th>Código ISO</th>
	                        <th>Hora</th>
	                        <th>Código respuesta</th>
	                        <th>Monto transacción</th>
	                        <th>Selección</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	@foreach($datos['reclamo']->transacciones as $transaccion)
	                		<tr>
	                			<td>{!! $transaccion->secuencia !!}</td>
	                			<td>{!! $transaccion->nodo !!}</td>
	                			<td>{!! $transaccion->fecha_transaccion !!}</td>
	                			<td>{!! $transaccion->codigo_iso !!}</td>
	                			<td>{!! $transaccion->hora !!}</td>
	                			<td>{!! $transaccion->codigo_respuesta !!}</td>
	                			<td>{!! $transaccion->monto_transaccion !!}</td>
	                			<td>
	                				<input type="radio" name="transaccion" value="{!! $transaccion->secuencia !!}" class="radio_transaccion">
	                			</td>
	                		</tr>
	                	@endforeach
	                </tbody>
	            </table>
	            <button class="btn btn-success" id="btn-guardar-transaccion">Guardar</button>
	            {!! Form::close() !!}
			</div>
		</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script>
	$(document).ready(function(){
		$('#secuencia').val('');
			$('#nodo').val('');
			$('#fecha_transaccion').val('');
			$('#codigo_iso').val('');
			$('#hoea').val('');
			$('#codigo_respuesta').val('');
			$('#monto_transaccion').val('');

		$('#btn-estatus').click(function(){
			$('#estatus').removeClass('hidden');
		});

		$('#btn-transacciones').click(function(){
			$('#transacciones').removeClass('hidden');
		});

		$('#btn-guardar-estatus').click(function(e){
			e.preventDefault();
			var opcion_seleccionada = $('#select-estatus').val();
			if(opcion_seleccionada === '') {
				alert('Debe seleccionar un estatus');
			} else {
				var formulario =  $('#form-estatus');
	            var ruta = formulario.attr('action');
	            var datos = formulario.serialize();

				$('.overlay').show();

				$.post(ruta, datos, function(respuesta){
					alert(respuesta.mensaje);

					$('.overlay').hide();
				}).fail(function(){
	                alert('Ha ocurrido un fallo mientras se intentó asociar el estatus.');
	                $('.overlay').hide();
	            });
			}
		});

		$('.radio_transaccion').click(function(){
			var valor = $(this).val();
			var fila = $(this).parent().parent();

			$('#secuencia').val(valor);
			$('#nodo').val(fila.children('td').eq(1).html());
			$('#fecha_transaccion').val(fila.children('td').eq(2).html());
			$('#codigo_iso').val(fila.children('td').eq(3).html());
			$('#hora').val(fila.children('td').eq(4).html());
			$('#codigo_respuesta').val(fila.children('td').eq(5).html());
			$('#monto_transaccion').val(fila.children('td').eq(6).html());
		});

		$('#btn-guardar-transaccion').click(function(e){
			e.preventDefault();
			var opcion_seleccionada = $('#transaccion_seleccionada').val();
			if(opcion_seleccionada === '') {
				alert('Debe seleccionar una transaccion');
			} else {
				var formulario =  $('#form-transaccion');
	            var ruta = formulario.attr('action');
	            var datos = formulario.serialize();

				$('.overlay').show();

				$.post(ruta, datos, function(respuesta){
					alert(respuesta.mensaje);

					$('.overlay').hide();
				}).fail(function(){
	                alert('Ha ocurrido un fallo mientras se intentó asociar el estatus.');
	                $('.overlay').hide();
	            });
			}
		});
	});
</script>
@endsection