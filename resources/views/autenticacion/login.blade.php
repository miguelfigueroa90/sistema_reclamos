{!! Form::open(array('url' => 'login', 'class' => 'form')) !!}
<div class="form-group">
	{!! Form::label('usuario') !!}
    {!! Form::text('usuario', null, array('required', 'class'=>'form-control', )) !!}
</div>
<div class="form-group">
	{!! Form::label('clave') !!}
    {!! Form::text('clave', null, array('required', 'class'=>'form-control', )) !!}
</div>
<div class="form-group">
    {!! Form::submit('ingresar', 
      array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}