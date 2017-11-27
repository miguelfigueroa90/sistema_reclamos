@extends('layouts.general')
@section('contenido')
<div class="row">
	<div class="col-md-6">
		<dl class="dl-horizontal">
		    <dt>Número de reclamo</dt>
		    <dd>12345</dd>
		    <dt>Cedula del cliente</dt>
		    <dd>v12392341</dd>
		    <dt>Nombre del cliente</dt>
		    <dd>Karlha Rengifo</dd>
		    <dt>Teléfono</dt>
		    <dd>04148782093</dd>
		    <dt>Correo</dt>
		    <dd>krengifo@gmail.com</dd>
		    <dt>Cuenta bancaria</dt>
		    <dd>01011342342342348789</dd>
		    <dt>Producto</dt>
		    <dd>Tarjeta de débito</dd>
		    <dt>Número de tarjeta</dt>
		    <dd>9812378912738</dd>
		    <dt>Estado actual</dt>
		    <dd>En proceso</dd>
		</dl>
	</div>
	<div class="col-md-6">
		<dl class="dl-horizontal">
		    <dt>Secuencia</dt>
		    <dd>12345</dd>
		    <dt>Fecha de transaccion</dt>
		    <dd>16/11/2017</dd>
		    <dt>Código ISO</dt>
		    <dd>187318937</dd>
		    <dt>Hora</dt>
		    <dd>8:35 pm</dd>
		    <dt>Código respuesta</dt>
		    <dd>21</dd>
		    <dt>Monto transaccion</dt>
		    <dd>Bs. 15000,00</dd>
		</dl>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-12">
				<button id="1" class="btn btn-info btn-lg btn-asignar-reclamo">Cambiar status <i class="fa fa-refresh"></i></button>
				<button id="1" class="btn btn-info btn-lg btn-asignar-reclamo">Transacciones <i class="fa fa-credit-card"></i></button>
			</div>
		</div>
		<br>
		<div class="container-fluid">
			<div class="row">
			<div id="status">
				<div class="form-group">
					<select name="estatus" class="form-control">
						<option value="">Seleccione...</option>
						<option value="1">Procedente</option>
						<option value="2">No procedente</option>
						<option value="3">En Trámites</option>
						<option value="4">Devoluciones</option>
						<option value="5">Anulado</option>
					</select>
				</div>
			</div>
			<div id="transacciones">
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
	                <tbody></tbody>
	            </table>
			</div>
		</div>
		</div>
	</div>
</div>
@endsection