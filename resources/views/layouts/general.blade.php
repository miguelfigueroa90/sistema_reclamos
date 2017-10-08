<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sistema de Reclamo | BAV</title>
        <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">
        <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" media="screen">
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
        <link rel="stylesheet" href="css/AdminLTE.min.css" media="screen">
        <link rel="stylesheet" href="css/skins/skin-green-light.min.css" media="screen">
        <link rel="stylesheet" href="css/app.css" media="screen">
    </head>
    <body class="skin-green-light sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <a href="{!! url('/') !!}" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini">SR</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">SIGER</span>
                </a>
                <nav class="navbar navbar-static-top">
                    <a href="{!! url('/') !!}" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown notifications-menu">
                                <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="label label-warning">4</span>
                                </a>
                                <ul class="dropdown-menu">
                                  <li class="header">Tiene 4 notificaciones</li>
                                  <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                      <li>
                                        <a href="#">
                                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                      </li>
                                      <li>
                                        <a href="#">
                                          <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                                          page and may cause design problems
                                        </a>
                                      </li>
                                      <li>
                                        <a href="#">
                                          <i class="fa fa-users text-red"></i> 5 new members joined
                                        </a>
                                      </li>
                                      <li>
                                        <a href="#">
                                          <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                        </a>
                                      </li>
                                    </ul>
                                  </li>
                                  <li class="footer"><a href="#">Ver todo</a></li>
                                </ul>
                            </li>
                            <li class="dropdown user user-menu">
                                <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                                    <img src="img/user4-128x128.jpg" class="user-image" alt="User Image">
                                    <span class="hidden-xs">Geraldine Palacios</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                        <img class="img-circle" src="img/user4-128x128.jpg" class="user-image" alt="User Image">
                                        <p>
                                            Geraldine Palacios - Desarrollador web
                                            <small>Miembre desde Octubre. 2017</small>
                                        </p>
                                    </li>
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Perfil</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="#" class="btn btn-default btn-flat">Salir</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="main-sidebar">
                <section class="sidebar">
                    <!-- Login -->
                    <div class="col-md-12">
                        <div class="user-panel">
                            <div class="pull-left image">
                                <img src="img/avatar.png" class="img-circle" alt="User Image">
                            </div>
                            <div class="pull-left info">
                                <p>Login</p>
                            </div>
                        </div>
                        {!! Form::open(['url' => 'login', 'method' => 'get']) !!}
                            <div class="form-group has-feedback">
                                {!! Form::email('usuario', null, ['class' => 'form-control', 'placeholder' => 'usuario']) !!}
                            </div>
                            <div class="form-group has-feedback">
                                {!! Form::password('clave', ['class' => 'form-control', 'placeholder' => 'clave']) !!}
                            </div>
                            {!! Form::button('Entrar', ['class' => 'btn btn-success', 'name' => 'search', 'type' => 'submit']) !!}
                        {!! Form::close() !!}
                    </div><!-- End Login -->

                    <!-- Search -->
                    <div class="col-md-12">
                        {!! Form::open(['url' => '#', 'method' => 'get', 'class' => 'sidebar-form']) !!}
                            <div class="input-group">
                                {!! Form::text('q', null, ['class' => 'form-control', 'placeholder' => 'buscar...']) !!}
                                <span class="input-group-btn">
                                    {!! Form::button('<i class="fa fa-search"></i>', ['id' => 'search-btn', 'class' => 'btn btn-flat', 'name' => 'search', 'type' => 'submit']) !!}
                                </span>
                            </div>
                        {!! Form::close() !!}
                    </div>
                    <!-- End Search -->

                    <!-- Menu -->
                    <div class="col-md-12">
                        <ul class="sidebar-menu" data-widget="tree">
                            <li class="header">MENU</li>
                            <li class="active treeview">
                                <a href="{!! url('#') !!}">
                                    <i class="fa fa-wrench"></i>
                                    <span>Configuración</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li>
                                        <a href="{!! url('/') !!}">
                                            <i class="fa fa-circle-o"></i>
                                            Usuarios
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{!! url('/') !!}">
                                            <i class="fa fa-circle-o"></i>
                                            Perfiles
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{!! url('/') !!}">
                                            <i class="fa fa-circle-o"></i>
                                            Departamentos
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{!! url('/') !!}">
                                            <i class="fa fa-circle-o"></i>
                                            Estatus
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{!! url('/') !!}">
                                            <i class="fa fa-circle-o"></i>
                                            Nacionalidades
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- End Menu -->
                </section>
            </aside>
            <div class="content-wrapper">
                @yield('contenido')
            </div>
            <footer class="main-footer">

            </footer>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/adminlte.min.js"></script>
        <script src="js/app.js"></script>
    </body>
</html>
