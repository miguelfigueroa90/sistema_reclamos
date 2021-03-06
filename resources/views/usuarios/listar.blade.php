@extends('layouts.general')
@section('title')
Usuarios
@endsection
@section('contenido')
    <br>
    @if (empty($datos['registros']))
        <p align="center"> ¡No hay Usuarios Registrados!</p>
        <p align="center"><a href="/nuevo_usuario" class="btn btn-primary">Agregar un nuevo Usuario<i class="fa fa-fw fa-plus"></i></a></p>
    @else
        @if (session('status'))
            <div class="alert alert-success">
            {{ session('status') }}
            </div>
        @endif
        <p align="center"><a href="/nuevo_usuario" class="btn btn-primary">Agregar un nuevo usuario<i class="fa fa-fw fa-plus"></i></a></p>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Usuario</th>
                    <th>Estado</th>
                    <th>Perfil</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datos['registros'] as $usuario)
                    <tr>
                        <td>{{$usuario->nombre}}</td>
                        <td>{{$usuario->apellido}}</td>
                        <td>{{$usuario->usuario}}</td>
                        <td>
                            @if($usuario->bloqueado === false)
                            Activo
                            @else
                            Inactivo
                            @endif
                        </td>
                        <td>{{$usuario->perfil->nombre}}</td>
                        <td class="datos-en-linea">
                            <div class="margen-horizontal">
                                <!-- Editar usuario -->
                                {!! Form::open(['method' => 'GET', 'url' => 'actualizar_usuario/'.$usuario->cedula]) !!}

                                {!! Form::button('Actualizar<i class="fa fa-fw fa-refresh"></i>', array('type' => 'submit', 'class' => 'btn btn-primary')) !!}

                                {!! Form::close() !!}
                            </div>
                            <div class="margen-horizontal">
                                @if($usuario->bloqueado === false)
                                    <a href="{{ url('/bloquear_usuario/'.$usuario->cedula) }}" class="btn btn-warning">Bloquear<i class="fa fa-fw  fa-lock"></i></a>
                                @else
                                    <a href="{{ url('/desbloquear_usuario/'.$usuario->cedula) }}" class="btn btn-info">Desbloquear<i class="fa fa-fw  fa-unlock"></i></a>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @include ('usuarios.modal')
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
