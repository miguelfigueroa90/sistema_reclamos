@extends('layouts.general')
@section('contenido')
    {!! Form::open(['action' => ['ClientesController@buscarCliente'], 'class' => 'form', 'id' => 'form-buscar']) !!}
    <div class="col-md-2 form-group">
        {!! Form::label('Tipo de cliente') !!}
        <select name="codigo_tipo_cliente" id="codigo_tipo_cliente" class="form-control">
            <option value="">Seleccione...</option>
            @foreach($datos['tipos_cliente'] as $codigo_tipo_cliente)
                <option value="{!! $codigo_tipo_cliente->codigo_nacionalidad !!}">{!! $codigo_tipo_cliente->nombre !!}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-8 form-group">
        {!! Form::label('Cédula') !!}
        {!! Form::text('cedula_cliente', null, ['class' => 'form-control campo_numerico', 'id' => 'cedula_cliente']) !!}
    </div>
    <div class="col-md-2 form-group">
        {!! Form::submit('Buscar', array('class'=>'btn btn-info btn-lg', 'id' => 'btn-buscar')) !!}
    </div>
    {!! Form::close() !!}

    {!! Form::open(['url' => 'reclamo', 'method' => 'post', 'class' => 'form', 'id' => 'form-reclamo']) !!}
    {!! Form::hidden('codigo_tipo_cliente', '', ['class' => 'campo-ajax', 'id' => 'codigo_tipo_cliente_hidden']); !!}
    {!! Form::hidden('cedula_cliente', '', ['class' => 'campo-ajax', 'id' => 'cedula_cliente_hidden']); !!}
    {!! Form::hidden('nombre_cliente', null, ['class' => 'form-control campo-ajax', 'id' => 'nombre_cliente']) !!}
    {!! Form::hidden('apellido_cliente', null, ['class' => 'form-control campo-ajax', 'id' => 'apellido_cliente']) !!}
    <div class="form-group col-md-4">
        {!! Form::label('Apellidos y nombres') !!}
        {!! Form::text('apellido_nombre_cliente', null, ['class' => 'form-control campo-ajax', 'id' => 'apellido_nombre_cliente', 'readonly']) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('Teléfono') !!}
        {!! Form::text('telefono_cliente', null, ['class' => 'form-control campo-ajax', 'id' => 'telefono_cliente', 'readonly']) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('Correo electronico') !!}
        {!! Form::text('correo_cliente', null, ['class' => 'form-control campo-ajax', 'id' => 'correo_cliente', 'readonly']) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('Cuenta bancaria') !!}
        {!! Form::select('cuenta_cliente', ['' => 'Seleccione...'], null, ['class' => 'form-control campo-ajax', 'id' => 'cuenta_cliente']) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('Producto') !!}
        <select name="producto_banco" id="producto_banco" class="form-control">
            <option value="">Seleccione...</option>
            @foreach($datos['productos_banco'] as $producto)
                <option value="{!! $producto->codigo_producto !!}">{!! $producto->nombre !!}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('Tarjeta') !!}
        {!! Form::select('tarjeta_cliente', ['' => 'Seleccione...'], null, ['class' => 'form-control campo-ajax', 'id' => 'tarjeta_cliente']) !!}
    </div>
    <div class="col-md-12">
        <div class="form-group" id="form_group_nueva_tarjeta" style="display: none;">
            {!! Form::label('Nueva tarjeta') !!}
            {!! Form::text('nueva_tarjeta', null, ['class' => 'form-control', 'id' => 'correo_cliente', 'nueva_tarjeta']) !!}
        </div>
        <div class="form-group" id="form_group_operaciones_tarjeta" style="display: none;">
            {!! Form::label('Transacciones') !!}
        </div>
        <div class="form-group">
            {!! Form::label('Descripción') !!}
            {!! Form::textarea('descripcion_reclamo', null, ['class' => 'form-control', 'id' => 'descripcion_reclamo', 'required' => 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::reset('Limpiar', array('class'=>'btn btn-warning', 'id' => 'btn-limpiar')) !!}
            {!! Form::submit('Crear', array('class'=>'btn btn-primary', 'id' => 'btn-crear')) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('#tarjeta_cliente').change(function(){
            var valor = $(this).val();

            if(valor === 'otro') {
                $('#form_group_operaciones_tarjeta').hide();
                $('#form_group_nueva_tarjeta').show();
            } else {
                $('#form_group_nueva_tarjeta').hide();

                // if(valor !== '') {
                //     var formulario =  $('#form-reclamo');
                //     var url = 'obtener_transacciones';
                //     var datos = formulario.serialize();

                //     $('.overlay').show();

                //     $.post(url, datos, function(respuesta){
                //         console.log(respuesta);
                //         $('.overlay').hide();
                //     }).fail(function(){
                //         alert('Error inesperado');
                //         $('.overlay').hide();
                //     });
                // } else {
                //     $('#form_group_operaciones_tarjeta').hide();
                // }
            }
        });

        $('#btn-buscar').click(function(e){
            e.preventDefault();

            limpiar_campos_ajax('form-reclamo');

            var codigo_tipo_cliente = $('#codigo_tipo_cliente').val();
            var cedula_cliente = $('#cedula_cliente').val();

            if(codigo_tipo_cliente === '') {
                alert('debe seleccionar un tipo de cliente');
                return false;
            } else {
                $('#codigo_tipo_cliente_hidden').val(codigo_tipo_cliente);
            }

            if(cedula_cliente === '') {
                alert('debe ingresar la cédula del cliente');
                return false;
            } else {
                $('#cedula_cliente_hidden').val(cedula_cliente);
            }

            var formulario =  $('#form-buscar');
            var ruta = formulario.attr('action');
            var datos = formulario.serialize();

            $('.overlay').show();

            $.post(ruta, datos, function(resultado){
                // console.log(resultado);

                switch(resultado.codigo_respuesta) {
                    case '200':
                        $('#nombre_cliente').val(resultado.nombre);
                        $('#apellido_cliente').val(resultado.apellido);
                        $('#apellido_nombre_cliente').val(resultado.apellido + ' ' + resultado.nombre);
                        $('#telefono_cliente').val(resultado.telefono);
                        $('#correo_cliente').val(resultado.correo);

                        $.each(resultado.cuentas, function (i, item) {
                            $('#cuenta_cliente').append($('<option>', { 
                                value: item.cuenta,
                                text : item.cuenta + ' - ' + item.estado_cuenta
                            }));
                        });

                        $.each(resultado.tarjetas, function (i, item) {
                            $('#tarjeta_cliente').append($('<option>', {
                                value: item,
                                text : item
                            }));
                        });
                        $('#tarjeta_cliente').append($('<option>', {
                            value: 'otro',
                            text : 'Otro...'
                        }));
                        break;

                    case '404':
                        var mensaje = resultado.mensaje_respuesta;
                        alert(mensaje);
                        break;

                    default:
                        var mensaje = 'Ha ocurrido un error inesperado durante la búsqueda del cliente';
                        alert(mensaje);
                }

                $('.overlay').hide();
            }).fail(function(){
                alert('Error inesperado');
                $('.overlay').hide();
            });
        });

        $('#form-reclamo').submit(function(e){
            e.preventDefault();

            var cuenta_bancaria = $('#cuenta_cliente').val();

            if(cuenta_bancaria === '') {
                alert('Debe seleccionar la cuenta bancaria asociada al reclamo');
                return false;
            }

            var formulario =  $('#form-reclamo');
            var ruta = formulario.attr('action');
            var datos = formulario.serialize();

            $('.overlay').show();

            $.post(ruta, datos, function(resultado){

                switch(resultado.codigo_respuesta) {
                    case '200':
                        alert(resultado.mensaje_respuesta);
                        break;

                    case '500':
                        alert(resultado.mensaje_respuesta);
                        break;

                    default:
                        var mensaje = 'Ha ocurrido un error inesperado mientras se intentó guardar el reclamo';
                        alert(mensaje);
                }

                $('.overlay').hide();
            }).fail(function(){
                alert('Error inesperado');
                $('.overlay').hide();
            });
        });
    });
</script>
@endsection
