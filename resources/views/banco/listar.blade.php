@extends('layouts.general')
@section('title')
Bancos
@endsection
@section('contenido')

            @if ($datos['registros']->isEmpty())
                <p align="center"> ¡No hay Bancos Registrados!</p>
                <p align="center"><a href="/nuevo_banco" class="btn btn-primary">Agregar un nuevo Banco<i class="fa fa-fw fa-plus"></i></a></p>
            @else

<table class="table table-hover">
    <thead>
        <tr>
            <th>Código Banco</th>
            <th>Nombre Banco</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($datos['registros'] as $banco)
            <tr>
                <td>{{$banco->codigo_banco}}</td>
                <td>{{$banco->nombre}}</td>
                <td class="datos-en-linea">
                    <div class="margen-horizontal">
                        <!-- Editar Banco -->
                        {!! Form::open(['method' => 'GET', 'url' => 'actualizar_banco/'.$banco->codigo_banco]) !!}

                        {!! Form::button('Actualizar<i class="fa fa-fw fa-refresh"></i>', array('type' => 'submit', 'class' => 'btn btn-primary')) !!}

                        {!! Form::close() !!}
                    </div>

                    <div class="margen-horizontal">
 			<!-- Eliminar Banco -->
                <a href="" data-target="#modal-delete-{{$banco->codigo_banco}}" data-toggle="modal" class="btn btn-danger">Eliminar<i class="fa fa-fw fa-trash"></i></a>
                    </div>
                </td>
            </tr>
	@include ('banco.modal')
        @endforeach
<p></p>
        <p align="center"><a href="/nuevo_banco" class="btn btn-primary">Agregar un nuevo Banco<i class="fa fa-fw fa-plus"></i></a></p>
    </tbody>
</table>
@endif
@endsection
