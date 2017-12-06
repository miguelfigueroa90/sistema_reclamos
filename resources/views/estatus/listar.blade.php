@extends('layouts.general')
@section('title')
Estatus
@endsection
@section('contenido')

            @if ($datos['registros']->isEmpty())
                <p align="center"> ¡No hay Estatus Registrados!</p>
                <p align="center"><a href="/nuevo_estatus" class="btn btn-primary">Agregar un nuevo Estatus<i class="fa fa-fw fa-plus"></i></a></p>
            @else

<table class="table table-hover">
    <thead>
        <tr>
            <th>Tipo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($datos['registros'] as $estatus)
        <tr>
            <td>{{$estatus->tipo}}</td>
            <td class="datos-en-linea">
                <div class="margen-horizontal">
                    <!-- Editar Estatus -->
                    {!! Form::open(['method' => 'GET', 'url' => 'actualizar_estatus/'.$estatus->codigo_estatus]) !!}

                    {!! Form::button('Actualizar<i class="fa fa-fw fa-refresh"></i>', array('type' => 'submit', 'class' => 'btn btn-primary')) !!}

                    {!! Form::close() !!}
                </div>

                <div class="margen-horizontal">
                    <!-- Eliminar Estatus -->
                <a href="" data-target="#modal-delete-{{$estatus->codigo_estatus}}" data-toggle="modal" class="btn btn-danger">Eliminar<i class="fa fa-fw fa-trash"></i></a>
                </div>
            </td>
        </tr>
        @include ('estatus.modal')
        @endforeach

<p></p>
        <p align="center"><a href="/nuevo_estatus" class="btn btn-primary">Agregar un nuevo Estatus<i class="fa fa-fw fa-plus"></i></a></p>
    </tbody>
</table>
@endif
@endsection
