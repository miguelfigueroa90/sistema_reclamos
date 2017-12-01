@extends('layouts.general')
@section('title')
Buscar Reclamo
@endsection
@section('contenido')
    {!! Form::open(['action' => ['ReclamosController@buscar'], 'class' => 'form', 'id' => 'form-buscar']) !!}
        <div class="form-group">
            {!! Form::label('Numero de reclamo') !!}
            {!! Form::text('numero_reclamo', null, ['class' => 'form-control campo_numerico campo-ajax', 'id' => 'numero_reclamo']) !!}
        </div>
        <div class="form-group">
            {!! Form::button('Buscar <i class="fa fa-search"></i>', array('class'=>'btn btn-info', 'id' => 'btn-buscar', 'type' => 'submit')) !!}
        </div>
    {!! Form::close() !!}

    <dl class="dl-horizontal hidden" id="list-reclamo">
        <dt>Número de reclamo</dt>
        <dd id="dd_numero_reclamo"></dd>
        <dt>Cedula del cliente</dt>
        <dd id="dd_cedula_cliente"></dd>
        <dt>Nombre del cliente</dt>
        <dd id="dd_nombre_cliente"></dd>
        <dt>Teléfono</dt>
        <dd id="dd_telefono_cliente"></dd>
        <dt>Correo</dt>
        <dd id="dd_correo_cliente"></dd>
        <dt>Cuenta bancaria</dt>
        <dd id="dd_cuenta_cliente"></dd>
        <dt>Producto</dt>
        <dd id="dd_producto_cliente"></dd>
        <dt>Número de tarjeta</dt>
        <dd id="dd_tarjeta_cliente"></dd>
        <dt>Estado actual</dt>
        <dd id="dd_estado_reclamo"></dd>
    </dl>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('#form-buscar').submit(function(e){
            e.preventDefault();

            $('#list-reclamo').addClass('hidden');

            var numero_reclamo = $('#numero_reclamo').val();

            if(numero_reclamo === '') {
                alert('Debe ingresar el numero de reclamo que desea consultar.');
            }

            var formulario =  $('#form-buscar');
            var ruta = formulario.attr('action');
            var datos = formulario.serialize();

            $('.overlay').show();

            $.post(ruta, datos, function(resultado){
                console.log(resultado);

                $('#dd_numero_reclamo').html(resultado.reclamo.datos.numero_reclamo);
                $('#dd_cedula_cliente').html(resultado.cliente.datos.cedula);
                $('#dd_nombre_cliente').html(resultado.cliente.datos.nombre);
                $('#dd_telefono_cliente').html(resultado.cliente.telefono.telefono);
                $('#dd_correo_cliente').html(resultado.cliente.correo_electronico.correo);
                $('#dd_cuenta_cliente').html(resultado.cliente.cuenta_bancaria.cuenta_bancaria);
                $('#dd_producto_cliente').html(resultado.reclamo.producto.nombre);
                $('#dd_tarjeta_cliente').html('');
                $('#dd_estado_reclamo').html(resultado.reclamo.estatus.tipo);

                $('#list-reclamo').removeClass('hidden');
                $('.overlay').hide();
            }).fail(function(){
                alert('Ha fallado la búsqueda del cliente.');
                $('.overlay').hide();
            });
        });
    });
</script>    
@endsection