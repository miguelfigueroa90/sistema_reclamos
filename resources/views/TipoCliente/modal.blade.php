<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$TipoCliente->codigo_tipo_cliente}}">
	{!!Form::Open(array('url'=>'/eliminar_TipoCliente/'.$TipoCliente->codigo_tipo_cliente,'method'=>'delete'))!!}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
				</button>
				<h4 class="modal-title">Eliminar Tipo de Cliente</h4>
			</div>
			<div class="modal-body">
				<p>Confirme si desea Eliminar el tipo de cliente seleccionado</p>				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
	{!!Form::Close()!!} 
</div>