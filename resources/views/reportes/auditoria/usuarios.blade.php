@extends('layouts.general')
@section('title')
	Reporte de auditoria - Usuarios
@endsection
@section('contenido')
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Usuario</th>
                <th>Estado</th>
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
                    <td class="datos-en-linea">
                        <div class="margen-horizontal">
                            <a href="{{ url('/generar_reporte_auditoria_usuarios/'.$usuario->cedula) }}" class="btn btn-info">Auditar</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
