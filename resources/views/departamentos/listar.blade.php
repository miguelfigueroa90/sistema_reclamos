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
        @foreach($datos['registros'] as $departamento)
          <tr>
            <td>{{$departamento->nombre}}</td>
            <td class="datos-en-linea">
                <div class="margen-horizontal">
                <!-- Editar Departamento -->
                {!! Form::open(['method' => 'GET', 'url' => 'departamento/'.$departamento->codigo_departamento]) !!}

                  {!! Form::button('Actualizar', array('type' => 'submit', 'class' => 'btn btn-primary')) !!}

                {!! Form::close() !!}
                </div>

                <div class="margen-horizontal">
                    <!-- Eliminar Departamento -->
                    {!! Form::open(['method' => 'DELETE', 'url' => 'departamento/'.$departamento->codigo_departamento, 'onsubmit' => 'return ConfirmDelete()']) !!}

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
