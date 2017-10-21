@extends('layouts.general')
@section('contenido')
    {!! Form::open(['action' => ['ClientesController@buscarCliente'], 'class' => 'form', 'id' => 'form-buscar']) !!}
    <div class="col-md-2 form-group">
        {!! Form::label('Tipo de cliente') !!}
        {!! Form::select('tipo_cliente', ['S' => 'Seleccione...', 'V' => 'V', 'E' => 'E', 'G' => 'G', 'J' => 'J', 'P' => 'P'], null, ['class' => 'form-control', 'id' => 'tipo_cliente']) !!}
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
        {!! Form::hidden('tipo_cliente', '', ['class' => 'ajax', 'id' => 'tipo_cliente_hidden']); !!}
        <div class="form-group">
            {!! Form::label('Nombre') !!}
            {!! Form::text('nombre_cliente', null, ['class' => 'form-control ajax', 'id' => 'nombre_cliente', 'readonly']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Apellido') !!}
            {!! Form::text('apellido_cliente', null, ['class' => 'form-control ajax', 'id' => 'apellido_cliente', 'readonly']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Teléfono') !!}
            {!! Form::text('telefono_cliente', null, ['class' => 'form-control ajax', 'id' => 'telefono_cliente', 'readonly']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Correo electronico') !!}
            {!! Form::text('correo_cliente', null, ['class' => 'form-control ajax', 'id' => 'correo_cliente', 'readonly']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Cuenta bancaria') !!}
            {!! Form::select('cuenta_cliente', ['S' => 'Seleccione...'], null, ['class' => 'form-control ajax', 'id' => 'cuenta_cliente']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('#btn-buscar').click(function(e){
            e.preventDefault();
            limpiar_formulario('form-reclamo');

            var tipo_cliente = $('#tipo_cliente').val();
            var cedula_cliente = $('#cedula_cliente').val();

            if(tipo_cliente === 'S') {
                alert('debe seleccionar un tipo de cliente');
                return false;
            } else {
                $('#tipo_cliente_hidden').val(tipo_cliente);
            }

            var formulario =  $('#form-buscar');
            var ruta = formulario.attr('action');
            var datos = formulario.serialize();

            $.post(ruta, datos, function(resultado){
                console.log(resultado);

                switch(resultado.respuesta) {
                    case '200':
                        $('#nombre_cliente').val(resultado.nombre);
                        $('#apellido_cliente').val(resultado.apellido);
                        $('#telefono_cliente').val(resultado.telefono);
                        $('#correo_cliente').val(resultado.correo);
                        break;

                    case '404':
                        var mensaje = resultado.mensaje;
                        alert(mensaje);
                        break;

                    default:
                        var mensaje = 'Ha ocurrido un error inesperado durante la búsqueda del cliente';
                        alert(mensaje);
                }
            });
        });
    });
</script>
@endsection
