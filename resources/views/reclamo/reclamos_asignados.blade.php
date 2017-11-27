@extends('layouts.general')
@section('title')
Reclamos asignados
@endsection
@section('contenido')
<table class="table table-hover">
    <thead>
        <tr>
            <th>Número</th>
            <th>Fecha de registro</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1234</td>
            <td>25/06/2017</td>
            <td>
                <a href="gestionar_reclamo?q=1" class="btn btn-info btn-modificar-reclamo">Modificar <i class="fa fa-edit"></i></a>
            </td>
        </tr>
        <tr>
            <td>1234</td>
            <td>25/07/2017</td>
            <td>
                <a href="gestionar_reclamo?q=2" class="btn btn-info btn-modificar-reclamo">Modificar <i class="fa fa-edit"></i></a>
            </td>
        </tr>
        <tr>
            <td>1234</td>
            <td>25/08/2017</td>
            <td>
                <a href="gestionar_reclamo?q=3" class="btn btn-info btn-modificar-reclamo">Modificar <i class="fa fa-edit"></i></a>
            </td>
        </tr>
        <tr>
            <td>1234</td>
            <td>25/09/2017</td>
            <td>
                <a href="gestionar_reclamo?q=4" class="btn btn-info btn-modificar-reclamo">Modificar <i class="fa fa-edit"></i></a>
            </td>
        </tr>
    </tbody>
</table>
@endsection