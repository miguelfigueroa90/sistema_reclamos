@extends('layouts.general')
@section('title')
Bandeja
@endsection
@section('contenido')

<table class="table table-hover">
    <thead>
        <tr>
            <th>Número</th>
            <th>Fecha de registro</th>
            <th>Estado</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1234</td>
            <td>25/06/2017</td>
            <td>Registrado</td>
            <td>
                <button id="1" class="btn btn-info btn-asignar-reclamo">Asignar <i class="fa fa-plus"></i></button>
            </td>
        </tr>
        <tr>
            <td>1234</td>
            <td>25/07/2017</td>
            <td>Registrado</td>
            <td>
                <button id="2" class="btn btn-info btn-asignar-reclamo">Asignar <i class="fa fa-plus"></i></button>
            </td>
        </tr>
        <tr>
            <td>1234</td>
            <td>25/08/2017</td>
            <td>Registrado</td>
            <td>
                <button id="3" class="btn btn-info btn-asignar-reclamo">Asignar <i class="fa fa-plus"></i></button>
            </td>
        </tr>
        <tr>
            <td>1234</td>
            <td>25/09/2017</td>
            <td>Registrado</td>
            <td>
                <button id="4" class="btn btn-info btn-asignar-reclamo">Asignar <i class="fa fa-plus"></i></button>
            </td>
        </tr>
    </tbody>
</table>

@endsection