@extends('layouts.general')
@section('title')
Dispositivos
@endsection
@section('contenido')

            @if ($datos['registros']->isEmpty())
                <p align="center"> ¡No hay Dispositivos Registrados!</p>
                <p align="center"><a href="/nuevo_dispositivo" class="btn btn-primary">Agregar un nuevo Dispositivo<i class="fa fa-fw fa-plus"></i></a></p>
            @else

<table class="table table-hover">
    <thead>
        <tr>
            <th>Tipo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($datos['registros'] as $dispositivo)
            <tr>
                <td>{{$dispositivo->tipo}}</td>
                <td class="datos-en-linea">
                    <div class="margen-horizontal">
                        <!-- Editar dispositivo -->
                        {!! Form::open(['method' => 'GET', 'url' => 'actualizar_dispositivo/'.$dispositivo->codigo_dispositivo]) !!}

                        {!! Form::button('Actualizar<i class="fa fa-fw fa-refresh"></i>', array('type' => 'submit', 'class' => 'btn btn-primary')) !!}

                        {!! Form::close() !!}
                    </div>

                    <div class="margen-horizontal">
                     <!-- Eliminar dispositivo -->
                         <a href="" data-target="#modal-delete-{{$dispositivo->codigo_dispositivo}}" data-toggle="modal" class="btn btn-danger">Eliminar<i class="fa fa-fw fa-trash"></i></a>
                    </div>
                </td>
            </tr>
            @include ('dispositivo.modal')
        @endforeach
<p></p>
        <p align="center"><a href="/nuevo_dispositivo" class="btn btn-primary">Agregar un nuevo dispositivo<i class="fa fa-fw fa-plus"></i></a></p>
    </tbody>
</table>
@endif
@endsection
