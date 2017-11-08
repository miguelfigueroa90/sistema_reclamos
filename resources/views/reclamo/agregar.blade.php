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
        <div class="form-group box-body table-responsive no-padding" id="form_group_operaciones_tarjeta" style="display: none;">
            {!! Form::label('Transacciones') !!}
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
            {!! Form::hidden('nodo_transaccion', '', ['class' => 'campo-ajax', 'id' => 'nodo_transaccion_hidden']); !!}
            {!! Form::hidden('fecha_transaccion', '', ['class' => 'campo-ajax', 'id' => 'fecha_transaccion_hidden']); !!}
            {!! Form::hidden('codigo_iso_transaccion', '', ['class' => 'campo-ajax', 'id' => 'codigo_iso_transaccion_hidden']); !!}
            {!! Form::hidden('hora_transaccion', '', ['class' => 'campo-ajax', 'id' => 'hora_transaccion_hidden']); !!}
            {!! Form::hidden('codigo_transaccion', '', ['class' => 'campo-ajax', 'id' => 'codigo_transaccion_hidden']); !!}
            {!! Form::hidden('monto_transaccion', '', ['class' => 'campo-ajax', 'id' => 'monto_transaccion_hidden']); !!}
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
    function limpiarInputsHiddenTransacciones() {
        $('#nodo_transaccion_hidden').val('');
        $('#fecha_transaccion_hidden').val('');
        $('#codigo_iso_transaccion_hidden').val('');
        $('#hora_transaccion_hidden').val('');
        $('#codigo_transaccion_hidden').val('');
        $('#monto_transaccion_hidden').val('');
    }

    function limpiarTablaTransacciones() {
        var tabla = $('#tabla_transacciones');
        var tbody = tabla.find('tbody');
        var tbody_children_rows = tbody.children();
        tbody_children_rows.remove();
    }

    $(document).ready(function(){
        $('#tarjeta_cliente').change(function(){
            limpiarTablaTransacciones();
            limpiarInputsHiddenTransacciones();

            var valor = $(this).val();

            if(valor === 'otro') {
                $('#form_group_operaciones_tarjeta').hide();
                $('#form_group_nueva_tarjeta').show();
            } else {
                $('#form_group_nueva_tarjeta').hide();

                if(valor !== '') {
                    var formulario =  $('#form-reclamo');
                    var url = 'obtener_transacciones';
                    var datos = formulario.serialize();

                    $('.overlay').show();

                    $.post(url, datos, function(respuesta){
                        switch(respuesta.codigo_respuesta){
                            case '200':
                                $('#form_group_operaciones_tarjeta').show();

                                var tabla = $('#tabla_transacciones');
                                var tbody = tabla.find('tbody');

                                $.each(respuesta.transacciones, function(clave, transaccion){
                                    var row = '<tr>';
                                    row += '<td >'+transaccion.secuencia+'</td>';
                                    row += '<td class="nodo_transaccion" >'+transaccion.nodo+'</td>';
                                    row += '<td class="fecha_transaccion" >'+transaccion.fecha_transaccion+'</td>';
                                    row += '<td class="codigo_iso_transaccion" >'+transaccion.codigo_iso+'</td>';
                                    row += '<td class="hora_transaccion" >'+transaccion.hora+'</td>';
                                    row += '<td class="respuesta_transaccion" >'+transaccion.codigo_respuesta+'</td>';
                                    row += '<td class="monto_transaccion" >'+transaccion.monto_transaccion+'</td>';
                                    row += '<td><input class="radio_secuencia" type="radio" name="secuencia_transaccion" value="'+transaccion.secuencia+'"></td>';
                                    row += '</tr>';
                                    tbody.append(row);
                                });

                                $('.radio_secuencia').click(function(){
                                    var fila = $(this).parents('tr');
                                    var nodo_transaccion = fila.children('.nodo_transaccion').html();
                                    var fecha_transaccion = fila.children('.fecha_transaccion').html();
                                    var codigo_iso_transaccion = fila.children('.codigo_iso_transaccion').html();
                                    var hora_transaccion = fila.children('.hora_transaccion').html();
                                    var respuesta_transaccion = fila.children('.respuesta_transaccion').html();
                                    var monto_transaccion = fila.children('.monto_transaccion').html();

                                    $('#nodo_transaccion_hidden').val(nodo_transaccion);
                                    $('#fecha_transaccion_hidden').val(fecha_transaccion);
                                    $('#codigo_iso_transaccion_hidden').val(codigo_iso_transaccion);
                                    $('#hora_transaccion_hidden').val(hora_transaccion);
                                    $('#codigo_transaccion_hidden').val(respuesta_transaccion);
                                    $('#monto_transaccion_hidden').val(monto_transaccion);
                                });
                                break;

                            case '404':
                                alert(respuesta.mensaje);
                                break;

                            default:
                                alert('Ha ocurrido un error inesperado durante la consulta de las transacciones de la tarjeta seleccionada.');
                        }
                        $('.overlay').hide();
                    }).fail(function(){
                        alert('Ha fallado la consulta de las operaciones de la tarjeta seleccionada.');
                        $('.overlay').hide();
                    });
                } else {
                    $('#form_group_operaciones_tarjeta').hide();
                }
            }
        });

        $('#btn-buscar').click(function(e){
            e.preventDefault();

            limpiar_campos_ajax('form-reclamo');

            $('#form_group_operaciones_tarjeta').hide();

            var codigo_tipo_cliente = $('#codigo_tipo_cliente').val();
            var cedula_cliente = $('#cedula_cliente').val();

            if(codigo_tipo_cliente === '') {
                alert('debe seleccionar un tipo de cliente.');
                return false;
            } else {
                $('#codigo_tipo_cliente_hidden').val(codigo_tipo_cliente);
            }

            if(cedula_cliente === '') {
                alert('debe ingresar la cédula del cliente.');
                return false;
            } else {
                $('#cedula_cliente_hidden').val(cedula_cliente);
            }

            var formulario =  $('#form-buscar');
            var ruta = formulario.attr('action');
            var datos = formulario.serialize();

            $('.overlay').show();

            $.post(ruta, datos, function(resultado){

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
                        var mensaje = 'Ha ocurrido un error inesperado durante la búsqueda del cliente.';
                        alert(mensaje);
                }

                $('.overlay').hide();
            }).fail(function(){
                alert('Ha fallado la búsqueda del cliente.');
                $('.overlay').hide();
            });
        });

        $('#form-reclamo').submit(function(e){
            e.preventDefault();

            var cuenta_bancaria = $('#cuenta_cliente').val();

            if(cuenta_bancaria === '') {
                alert('Debe seleccionar la cuenta bancaria asociada al reclamo.');
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
                        var mensaje = 'Ha ocurrido un error inesperado mientras se intentó guardar el reclamo.';
                        alert(mensaje);
                }

                $('.overlay').hide();
            }).fail(function(){
                alert('Ha ocurrido un fallo mientras se intentó guardar el reclamo.');
                $('.overlay').hide();
            });
        });
    });
</script>
@endsection
