@extends('layouts.general')
@section('contenido')
    <section class="content-header">
        <h1>Inicio <small>#007612</small></h1>
        <ol class="breadcrumb">
            <li>
                <a href="#"><i class="fa fa-dashboard"></i> Inicio</a>
            </li>
            <li>
                <a href="#">Login</a>
            </li>
        </ol>
    </section>

    <div class="pad margin no-print">
        <div class="alert alert-info alert-dismissible" style="margin-bottom: 0!important;">
            {!! Form::button('×', ['class' => 'close', 'data-dismiss' => 'alert', 'aria-hidden' => 'true']) !!}
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            El Departamento ha sido creado correctamente!
        </div>
    </div>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-body text-center">
                        <img src="img/bav/logo.png" alt="Banco Agrícolaa de Venezuela">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
