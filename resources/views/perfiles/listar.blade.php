@extends('layouts.general')
@section('contenido')
@if(!empty($datos['registros']))
<table class="table table-hover">
    <thead>
        <tr>
            <th>Nombre</th>
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
                        {!! Form::open(['method' => 'GET', 'url' => 'perfil/'.$perfil->codigo_perfil]) !!}

                        {!! Form::button('Actualizar', array('type' => 'submit', 'class' => 'btn btn-primary')) !!}

                        {!! Form::close() !!}
                    </div>

                    <div class="margen-horizontal">
                        <!-- Eliminar Perfil -->
                        {!! Form::open(['method' => 'DELETE', 'url' => 'perfil/'.$perfil->codigo_perfil, 'onsubmit' => 'return ConfirmDelete()']) !!}

                        {!! Form::button('Eliminar', array('type' => 'submit', 'class' => 'btn btn-danger')) !!}

                        {!! Form::close() !!}
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection
