<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login | SIGER</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/css/AdminLTE.min.css">

  <link rel="stylesheet" href="/css/app.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style>
    body {
      height: 0%;
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="/img/logo.png" alt="">
    <br>
    <b>SIGER</b>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Ingrese sus credenciales para iniciar sesion</p>

    {!! Form::open(['url' => 'login', 'id' => 'form-login']) !!}
      <div class="form-group has-feedback">
        {!! Form::text('usuario', null, ['id' => 'campo_usuario', 'class' => 'form-control', 'placeholder' => 'Usuario']) !!}
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        {!! Form::text('clave', null, ['id' => 'campo_clave', 'class' => 'form-control', 'placeholder' => 'Clave']) !!}
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <span class="texto-rojo hidden" id="alerta">Debe ingresar sus credenciales para poder continuar.</span>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          {!! Form::button('Entrar', array('class' => 'btn btn-primary btn-block btn-flat', 'type' => 'submit')) !!}
        </div>
        <!-- /.col -->
      </div>
    {!! Form::close() !!}

  </div>
  <!-- /.login-box-body -->
  @if (session('message'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{ \Session::get('message') }}
    </div>
  @endif
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function(){
    $('#form-login').submit(function(e){
      var campo_usuario = $('#campo_usuario').val();
      var campo_clave = $('#campo_clave').val();

      if(campo_usuario === '' || campo_clave === '') {
        e.preventDefault();
        $('#alerta').removeClass('hidden');
      } else {
        $('#alerta').addClass('hidden');
      }
    });
  });
</script>
</body>
</html>
