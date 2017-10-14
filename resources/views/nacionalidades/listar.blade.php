@extends('layouts.general')
@section('contenido')
@if(!empty($datos['registros']))
<table class="table table-hover">
    <thead>
        <tr>
            <th>nombre</th>
            <th>acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($datos['registros'] as $nacionalidad)
          <tr>
            <td>{{$nacionalidad->nombre}}</td>
            <td class="datos-en-linea">
                <div class="margen-horizontal">
                    <!-- Editar Departamento -->
                    {!! Form::open(['method' => 'GET', 'url' => 'nacionalidad/'.$nacionalidad->codigo_nacionalidad]) !!}

                      {!! Form::button('Actualizar', array('type' => 'submit', 'class' => 'btn btn-primary')) !!}

                    {!! Form::close() !!}
                </div>

                <div class="margen-horizontal">
                    <!-- Eliminar Departamento -->
                    {!! Form::open(['method' => 'DELETE', 'url' => 'nacionalidad/'.$nacionalidad->codigo_nacionalidad, 'onsubmit' => 'return ConfirmDelete()']) !!}

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
