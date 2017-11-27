@extends('layouts.general')
@section('title')
Tipos de Cliente
@endsection
@section('contenido')

            @if ($datos['registros']->isEmpty())
                <p align="center"> ¡No hay Tipos de Clientes Registrados!</p>
                <p align="center"><a href="/nuevo_TipoCliente" class="btn btn-primary">Agregar un nuevo Tipo de Cliente</a></p>
            @else

<table class="table table-hover">

                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($datos['registros'] as $TipoCliente)
        <tr>
            <td>{{$TipoCliente->nombre}}</td>
            <td class="datos-en-linea">
                <div class="margen-horizontal">
                    <!-- Editar Tipo de Cliente -->
                    {!! Form::open(['method' => 'GET', 'url' => 'actualizar_TipoCliente/'.$TipoCliente->codigo_tipo_cliente]) !!}

                    {!! Form::button('Actualizar', array('type' => 'submit', 'class' => 'btn btn-primary')) !!}

                    {!! Form::close() !!}
                </div>

                <div class="margen-horizontal">
                    <!-- Eliminar Tipo de Cliente -->
                <a href="" data-target="#modal-delete-{{$TipoCliente->codigo_tipo_cliente}}" data-toggle="modal" class="btn btn-danger">Eliminar</a>
                </div>
            </td>
        </tr>
        @include ('TipoCliente.modal')
        @endforeach

<p></p>
        <p align="center"><a href="/nuevo_TipoCliente" class="btn btn-primary">Agregar un nuevo Tipo de Cliente</a></p>
    </tbody>
</table>
@endif
@endsection
