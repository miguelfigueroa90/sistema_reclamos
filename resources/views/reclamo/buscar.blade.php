@extends('layouts.general')
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
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('#form-buscar').submit(function(e){
            e.preventDefault();

            var numero_reclamo = $('#numero_reclamo').val();

            if(numero_reclamo === '') {
                alert('Debe ingresar el numero de reclamo que desea consultar.');
            }

            var formulario =  $('#form-buscar');
            var ruta = formulario.attr('action');
            var datos = formulario.serialize();

            $('.overlay').show();

            $.post(ruta, datos, function(resultado){

            }).fail(function(){
                alert('Ha fallado la búsqueda del cliente.');
                $('.overlay').hide();
            });
        });
    });
</script>    
@endsection