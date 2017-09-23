<body>
    <div id="art-main">


        <div class="art-sheet clearfix">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-sidebar1">

                            <div class="art-block clearfix">
                                <div class="art-blockcontent">
                                    {!! Form::open(array('url' => 'login', 'class' => 'form')) !!}
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
                        <div class="art-layout-cell art-content"><article class="art-post art-article">


                                <div class="art-postcontent art-postcontent-0 clearfix">
                                    <div class="art-content-layout">
                                        <div class="art-content-layout-row">
                                            <div class="art-layout-cell layout-item-2" style="width: 100%" >
                                                <h3 style="border-bottom: 1px solid #D4DD83; padding-bottom: 5px">Sistema de Reclamos</h3><div class="clearfix">
                                                    <div class="image-caption-wrapper" style="width: 100%; float: center"><img src="images/logo_bav.JPG.png" style="width: 100%; max-width:600px" alt="an image" class="art-lightbox"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </article></div>

                    </div>
                </div>
            </div>

        </div>

    </div>


</body></html>
