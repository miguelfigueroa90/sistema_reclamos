<div class="pad margin no-print">
    <div class="alert alert-{!! $nivel !!} alert-dismissible" style="margin-bottom: 0!important;">
        {!! Form::button('×', ['class' => 'close', 'data-dismiss' => 'alert', 'aria-hidden' => 'true']) !!}
        <h4><i class="icon fa fa-{!! $simbolo !!}"></i> {!! $titulo !!}</h4>
        {!! $slot !!}
    </div>
</div>
