@extends('layouts.general')
@section('title')
Perfiles
@endsection
@section('contenido')
    @if ($datos['registros']->isEmpty())
        <p align="center"> ¡No hay Perfiles Registrados!</p>
        <p align="center"><a href="/nuevo_perfil" class="btn btn-primary">Agregar un nuevo Perfil</a></p>
    @else
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datos['registros'] as $perfil)
                <tr>
                    <td>{{$perfil->nombre}}</td>
                    <td class="datos-en-linea">
                        <div class="margen-horizontal">
                            <!-- Editar Perfil -->
                            {!! Form::open(['method' => 'GET', 'url' => 'actualizar_perfil/'.$perfil->codigo_perfil]) !!}

                            {!! Form::button('Actualizar', array('type' => 'submit', 'class' => 'btn btn-primary')) !!}

                            {!! Form::close() !!}
                        </div>

                        <div class="margen-horizontal">
                         <!-- Eliminar Perfil -->
                             <a href="" data-target="#modal-delete-{{$perfil->codigo_perfil}}" data-toggle="modal" class="btn btn-danger">Eliminar</a>
                        </div>
                    </td>
                </tr>
                @include ('Perfiles.modal')
            @endforeach
        <p></p>
        <p align="center"><a href="/nuevo_perfil" class="btn btn-primary">Agregar un nuevo Perfil</a></p>
        </tbody>
    </table>
@endif
@endsection
