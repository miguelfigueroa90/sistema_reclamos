<section class="content-header">
    <h1>
        {!! $slot !!}
        @if(isset($numeracion))
             <small>{!! $numeracion !!}</small>
         @endif
    </h1>
</section>
