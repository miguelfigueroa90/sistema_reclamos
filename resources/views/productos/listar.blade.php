@extends('layouts.general')
@section('contenido')

            @if ($datos['registros']->isEmpty())
                <p align="center"> ¡No hay Productos Registrados!</p>
                <p align="center"><a href="/nuevo_producto" class="btn btn-primary">Agregar un nuevo Producto</a></p>
            @else

<table class="table table-hover">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($datos['registros'] as $producto)
            <tr>
                <td>{{$producto->nombre}}</td>
                <td>{{$producto->tipo}}</td>
                <td class="datos-en-linea">
                    <div class="margen-horizontal">
                        <!-- Editar Producto -->
                        {!! Form::open(['method' => 'GET', 'url' => 'actualizar_productos/'.$producto->codigo_producto]) !!}

                        {!! Form::button('Actualizar', array('type' => 'submit', 'class' => 'btn btn-primary')) !!}

                        {!! Form::close() !!}
                    </div>

                    <div class="margen-horizontal">
                     <!-- Eliminar Producto -->
                         <a href="" data-target="#modal-delete-{{$producto->codigo_producto}}" data-toggle="modal" class="btn btn-danger">Eliminar</a>
                    </div>
                </td>
            </tr>
            @include ('productos.modal')
        @endforeach
<p></p>
        <p align="center"><a href="/nuevo_producto" class="btn btn-primary">Agregar un nuevo Producto</a></p>
    </tbody>
</table>
@endif
@endsection
