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

    <div class="col-md-12">
        {!! Form::open(['url' => 'reclamo', 'method' => 'post', 'class' => 'form', 'id' => 'form-reclamo']) !!}
        {!! Form::hidden('codigo_tipo_cliente', '', ['class' => 'ajax', 'id' => 'codigo_tipo_cliente_hidden']); !!}
        {!! Form::hidden('cedula_cliente', '', ['class' => 'ajax', 'id' => 'cedula_cliente_hidden']); !!}
        <div class="form-group">
            {!! Form::label('Nombre') !!}
            {!! Form::text('nombre_cliente', null, ['class' => 'form-control campo-ajax', 'id' => 'nombre_cliente', 'readonly']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Apellido') !!}
            {!! Form::text('apellido_cliente', null, ['class' => 'form-control campo-ajax', 'id' => 'apellido_cliente', 'readonly']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Teléfono') !!}
            {!! Form::text('telefono_cliente', null, ['class' => 'form-control campo-ajax', 'id' => 'telefono_cliente', 'readonly']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Correo electronico') !!}
            {!! Form::text('correo_cliente', null, ['class' => 'form-control campo-ajax', 'id' => 'correo_cliente', 'readonly']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Cuenta bancaria') !!}
            {!! Form::select('cuenta_cliente', ['' => 'Seleccione...'], null, ['class' => 'form-control campo-ajax', 'id' => 'cuenta_cliente']) !!}
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

                switch(resultado.respuesta) {
                    case '200':
                        $('#nombre_cliente').val(resultado.nombre);
                        $('#apellido_cliente').val(resultado.apellido);
                        $('#telefono_cliente').val(resultado.telefono);
                        $('#correo_cliente').val(resultado.correo);

                        $.each(resultado.cuentas, function (i, item) {
                            $('#cuenta_cliente').append($('<option>', { 
                                value: item,
                                text : item
                            }));
                        });
                        break;

                    case '404':
                        var mensaje = resultado.mensaje;
                        alert(mensaje);
                        break;

                    default:
                        var mensaje = 'Ha ocurrido un error inesperado durante la búsqueda del cliente';
                        alert(mensaje);
                }

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

                switch(resultado.respuesta) {
                    case '200':
                        alert(resultado.mensaje_crear_cliente);
                        alert(resultado.mensaje_reclamo);
                        break;

                    case '404':
                        alert(resultado.mensaje_crear_cliente);
                        alert(resultado.mensaje_reclamo);
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
    });
</script>
@endsection
