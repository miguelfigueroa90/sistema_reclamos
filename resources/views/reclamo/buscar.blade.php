@extends('layouts.general')
@section('title')
Buscar Reclamo
@endsection
@section('contenido')
    {!! Form::open(['action' => ['ReclamosController@buscar'], 'class' => 'form', 'id' => 'form-buscar']) !!}
        <div class="form-group">
            {!! Form::label('Código del reclamo') !!}
            {!! Form::text('codigo_reclamo', null, ['class' => 'form-control campo_numerico campo-ajax', 'id' => 'codigo_reclamo']) !!}
        </div>
        <div class="form-group">
            {!! Form::button('Buscar <i class="fa fa-search"></i>', array('class'=>'btn btn-info', 'id' => 'btn-buscar', 'type' => 'button')) !!}
        </div>
    {!! Form::close() !!}

    <dl class="dl-horizontal hidden" id="list-reclamo">
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
        <dt>Descripción</dt>
        <dd id="dd_reclamo_descripcion"></dd>
    </dl>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        function buscar_reclamo(e) {
            e.preventDefault();

            $('#list-reclamo').addClass('hidden');

            var codigo_reclamo = $('#codigo_reclamo').val();

            if(codigo_reclamo === '') {
                alert('Debe ingresar el numero de reclamo que desea consultar.');
            }

            var formulario =  $('#form-buscar');
            var ruta = formulario.attr('action');
            var datos = formulario.serialize();

            $('.overlay').show();

            $.post(ruta, datos, function(resultado){
                console.log(resultado);

                $('#dd_cedula_cliente').html(resultado.cliente.datos.cedula);
                $('#dd_nombre_cliente').html(resultado.cliente.datos.nombre + " " + resultado.cliente.datos.apellido);
                $('#dd_telefono_cliente').html(resultado.cliente.telefono.telefono);
                $('#dd_correo_cliente').html(resultado.cliente.correo_electronico.correo);
                $('#dd_cuenta_cliente').html(resultado.cliente.cuenta_bancaria.cuenta_bancaria);
                $('#dd_producto_cliente').html(resultado.reclamo.producto.nombre);
                $('#dd_tarjeta_cliente').html(resultado.reclamo.tarjeta.numero_tarjeta);
                $('#dd_estado_reclamo').html(resultado.reclamo.estatus.tipo);
                $('#dd_reclamo_descripcion').html(resultado.reclamo.datos.descripcion);

                $('#list-reclamo').removeClass('hidden');
                $('.overlay').hide();
            }).fail(function(){
                alert('Ha fallado la búsqueda del cliente.');
                $('.overlay').hide();
            });
        }

        $('#form-buscar').submit(function(e){
            buscar_reclamo(e);
        });

        $('#btn-buscar').click(function(e){
            buscar_reclamo(e);
        });
    });
</script>    
@endsection