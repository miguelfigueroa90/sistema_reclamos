@extends('layouts.general')
@section('title')
Usuarios
@endsection
@section('contenido')
    <br>
    @if (empty($datos['registros']))
        <p align="center"> ¡No hay Usuarios Registrados!</p>
        <p align="center"><a href="/nuevo_usuario" class="btn btn-primary">Agregar un nuevo Usuario</a></p>
    @else
        @if (session('status'))
            <div class="alert alert-success">
            {{ session('status') }}
            </div>
        @endif
        <p align="center"><a href="/nuevo_usuario" class="btn btn-primary">Agregar un nuevo usuario</a></p>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datos['registros'] as $usuario)
                    <tr>
                        <td>{{$usuario->nombre}}</td>
                        <td>{{$usuario->usuario}}</td>
                        <td>{{$usuario->estado}}</td>
                        <td class="datos-en-linea">
                            <div class="margen-horizontal">
                                <a href="" data-target="#modal-delete-{{$usuario->cedula}}" data-toggle="modal" class="btn btn-danger">Eliminar</a>
                            </div>
                        </td>
                    </tr>
                    @include ('usuarios.modal')
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
