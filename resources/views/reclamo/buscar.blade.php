@extends('layouts.general')
@section('contenido')
    {!! Form::open(['action' => ['ReclamosController@buscar'], 'class' => 'form', 'id' => 'form-buscar']) !!}
        <div class="form-group">
            {!! Form::label('Numero de reclamo') !!}
            {!! Form::text('numero_reclamo', null, ['class' => 'form-control campo_numerico campo-ajax', 'id' => 'numero_reclamo']) !!}
        </div>
        <div class="form-group">
            {!! Form::button('Buscar <i class="fa fa-search"></i>', array('class'=>'btn btn-info', 'id' => 'btn-buscar', 'type' => 'submit')) !!}
        </div>
    {!! Form::close() !!}
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('#form-buscar').submit(function(e){
            e.preventDefault();

            var numero_reclamo = $('#numero_reclamo').val();

            if(numero_reclamo === '') {
                alert('Debe ingresar el numero de reclamo que desea consultar.');
            }
        });
    });
</script>    
@endsection