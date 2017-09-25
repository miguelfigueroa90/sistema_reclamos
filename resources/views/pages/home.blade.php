@extends('layouts.default')
@section('content')
<div class="art-layout-cell art-sidebar1">
    <div class="art-block clearfix">
        <div class="art-blockcontent">
            {!! Form::open(['url' => 'login', 'class' => 'form']) !!}
            <div class="form-group">
                {!! Form::label('usuario') !!}
                {!! Form::text('usuario', null, array('required', 'class'=>'form-control', )) !!}
            </div>
            <div class="form-group">
                {!! Form::label('clave') !!}
                {!! Form::password('clave', null, array('required', 'class'=>'form-control', )) !!}
            </div>
            <br>
            <div class="form-group">
                {!! Form::submit('ingresar', 
                array('class'=>'art-button')) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<div class="art-layout-cell art-content">
    <article class="art-post art-article">
        <div class="art-postcontent art-postcontent-0 clearfix">
            <div class="art-content-layout">
                <div class="art-content-layout-row">
                    <div class="art-layout-cell layout-item-2" style="" >
                        <h3 style="">Sistema de Reclamos</h3><div class="clearfix">
                            <div class="image-caption-wrapper" style="">
                                <img src="images/logo_bav.JPG.png" style="" alt="an image" class="art-lightbox">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
</div>
@endsection