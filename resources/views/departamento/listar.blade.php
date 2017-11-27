@extends('layouts.general')
@section('title')
Departamentos
@endsection
@section('contenido')

            @if ($datos['registros']->isEmpty())
                <p align="center"> ¡No hay Departamentos Registrados!</p>
                <p align="center"><a href="/nuevo_departamento" class="btn btn-primary">Agregar un nuevo departamento</a></p>
            @else

<table class="table table-hover">

                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
    <thead>
        <tr>
            <th>Tipo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($datos['registros'] as $departamento)
            <tr>
                <td>{{$departamento->nombre}}</td>
                <td class="datos-en-linea">
                    <div class="margen-horizontal">
                        <!-- Editar departamento -->
                        {!! Form::open(['method' => 'GET', 'url' => 'actualizar_departamento/'.$departamento->codigo_departamento]) !!}

                        {!! Form::button('Actualizar', array('type' => 'submit', 'class' => 'btn btn-primary')) !!}

                        {!! Form::close() !!}
                    </div>

                    <div class="margen-horizontal">
                     <!-- Eliminar departamento -->
                         <a href="" data-target="#modal-delete-{{$departamento->codigo_departamento}}" data-toggle="modal" class="btn btn-danger">Eliminar</a>
                    </div>
                </td>
            </tr>
            @include ('departamento.modal')
        @endforeach
<p></p>
        <p align="center"><a href="/nuevo_departamento" class="btn btn-primary">Agregar un nuevo departamento</a></p>
    </tbody>
</table>
@endif
@endsection
