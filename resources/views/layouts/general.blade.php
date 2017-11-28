<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('title') | SIGER</title>
        <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">
        <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css" media="screen">
        <link rel="stylesheet" href="/css/bootstrap.min.css" media="screen">
        <link rel="stylesheet" href="/css/AdminLTE.min.css" media="screen">
        <link rel="stylesheet" href="/css/skins/skin-green-light.min.css" media="screen">
        <link rel="stylesheet" href="/css/app.css" media="screen">
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
                      <!-- User Account: style can be found in dropdown.less -->
                      <li class="dropdown messages-menu">
                        <a href="/salir">Salir</a>
                      </li>
                    </ul>
                  </div>
                </nav><!-- End .navbar .navbar-static-top -->
            </header>
            <aside class="main-sidebar">
                <section class="sidebar">
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">MENU</li>
                        <li class="treeview <?= ($datos['menu']['activo'] == 'usuarios') ? 'active' : '' ?>">
                            <a href="{!! url('#') !!}">
                                <i class="fa fa-users"></i>
                                <span>Usuarios</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="{!! url('/usuarios') !!}">
                                        <i class="fa fa-circle-o <?= ($datos['menu']['opcion'] == 'usuarios') ? 'text-green' : '' ?>"></i>
                                        Usuarios
                                    </a>
                                </li>
                            
                                <li>
                                    <a href="{!! url('/perfiles') !!}">
                                        <i class="fa fa-circle-o <?= ($datos['menu']['opcion'] == 'perfiles') ? 'text-green' : '' ?>"></i>
                                        Perfiles
                                    </a>
                                </li>
                         
                                <li>
                                    <a href="{!! url('/listar_departamento') !!}">
                                        <i class="fa fa-circle-o <?= ($datos['menu']['opcion'] == 'departamentos') ? 'text-green' : '' ?>"></i>
                                        Departamentos
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="treeview <?= ($datos['menu']['activo'] == 'configuracion') ? 'active' : '' ?>">
                            <a href="{!! url('#') !!}">
                                <i class="fa fa-wrench"></i>
                                <span>Configuración</span>
                                <span class="pull-right-container">
                                   <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="{!! url('/listar_estatus') !!}">
                                        <i class="fa fa-circle-o <?= ($datos['menu']['opcion'] == 'estatus') ? 'text-green' : '' ?>"></i>
                                        Estatus
                                    </a>
                                </li>
                                <li>
                                    <a href="{!! url('/listar_TipoCliente') !!}">
                                        <i class="fa fa-circle-o <?= ($datos['menu']['opcion'] == 'tipo_clientes') ? 'text-green' : '' ?>"></i>
                                        Tipos de Clientes
                                    </a>
                                </li>
                                <li>
                                    <a href="{!! url('/listar_productos') !!}">
                                        <i class="fa fa-circle-o <?= ($datos['menu']['opcion'] == 'productos') ? 'text-green' : '' ?>"></i>
                                        Productos
                                    </a>
                                </li>
                                <li>
                                    <a href="{!! url('/listar_bancos') !!}">
                                        <i class="fa fa-circle-o <?= ($datos['menu']['opcion'] == 'bancos') ? 'text-green' : '' ?>"></i>
                                        Bancos
                                    </a>
                                </li>
                                <li>
                                    <a href="{!! url('/listar_dispositivo') !!}">
                                        <i class="fa fa-circle-o <?= ($datos['menu']['opcion'] == 'dispositivos') ? 'text-green' : '' ?>"></i>
                                        Dispositivos
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="treeview <?= ($datos['menu']['activo'] == 'reportes') ? 'active' : '' ?>">
                            <a href="{!! url('#') !!}">
                                <i class="fa fa-table"></i>
                                <span>Reportes</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                                <ul class="treeview-menu">
                                    <li>
                                        <a href="{!! url('/reporte_reclamos') !!}">
                                            <i class="fa fa-circle-o <?= ($datos['menu']['opcion'] == 'reporte_reclamos') ? 'text-green' : '' ?>"></i>
                                            Reclamos
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{!! url('/reporte_auditoria') !!}">
                                            <i class="fa fa-circle-o <?= ($datos['menu']['opcion'] == 'reporte_auditoria') ? 'text-green' : '' ?>"></i>
                                            Auditoria
                                        </a>
                                    </li>
                                </ul>
                            </a>
                        </li>
                        <li class="treeview <?= ($datos['menu']['activo'] == 'reclamos') ? 'active' : '' ?>">
                            <a href="{!! url('#') !!}">
                                <i class="fa fa-phone-square"></i>
                                <span>Reclamos</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                                <ul class="treeview-menu">
                                    <li>
                                        <a href="{!! url('/reclamo') !!}">
                                            <i class="fa fa-circle-o <?= ($datos['menu']['opcion'] == 'agregar_reclamo') ? 'text-green' : '' ?>"></i>
                                            Nuevo
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{!! url('/buscar_reclamo') !!}">
                                            <i class="fa fa-circle-o <?= ($datos['menu']['opcion'] == 'buscar_reclamo') ? 'text-green' : '' ?>"></i>
                                            Buscar
                                        </a>
                                    </li>
                                </ul>
                            </a>
                        </li>
                        <li class="treeview <?= ($datos['menu']['activo'] == 'gestion') ? 'active' : '' ?>">
                            <a href="{!! url('#') !!}">
                                <i class="fa fa-check-square"></i>
                                <span>Gestión</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                                <ul class="treeview-menu">
                                    <li>
                                        <a href="{!! url('/bandeja') !!}">
                                            <i class="fa fa-circle-o <?= ($datos['menu']['opcion'] == 'bandeja') ? 'text-green' : '' ?>"></i>
                                            Bandeja
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{!! url('/reclamos_asignados') !!}">
                                            <i class="fa fa-circle-o <?= ($datos['menu']['opcion'] == 'reclamos_asignados') ? 'text-green' : '' ?>"></i>
                                            Reclamos asignados
                                        </a>
                                    </li>
                                </ul>
                            </a>
                        </li>
                    </ul>
                </section>
            </aside>
            <div class="content-wrapper">
                @component('componentes/encabezado')
                    @if(isset($datos['numeracion']))
                        @slot('numeracion')
                            {!! $datos['encabezado']['numeracion'] !!}
                        @endslot
                    @endif

                    {!! $datos['encabezado']['titulo'] !!}
                @endcomponent

                @if(isset($datos['alerta']))
                    @component('componentes/alerta')
                        @slot('nivel')
                        {!! $datos['alerta']['nivel'] !!}
                        @endslot

                        @slot('titulo')
                        {!! $datos['alerta']['titulo'] !!}
                        @endslot

                        @slot('simbolo')
                        {!! $datos['alerta']['simbolo'] !!}
                        @endslot

                        {!! $datos['alerta']['mensaje'] !!}
                    @endcomponent
                @endif

                @if(isset($datos['anuncio']))
                    @component('componentes/anuncio')
                        @slot('nivel')
                        {!! $datos['anuncio']['nivel'] !!}
                        @endslot

                        @slot('titulo')
                        {!! $datos['anuncio']['titulo'] !!}
                        @endslot

                        @slot('simbolo')
                        {!! $datos['anuncio']['simbolo'] !!}
                        @endslot

                        {!! $datos['anuncio']['mensaje'] !!}
                    @endcomponent
                @endif

                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-success">
                                <div class="box-body {!! $datos['clases_adicionales_body'] !!}">
                                    @yield('contenido')
                                </div>
                                <div class="overlay" style="display: none;">
                                    <i class="fa fa-refresh fa-spin"></i>
                                </div>
                                <div class="box-footer">
                                    @if(isset($datos['registros']) && $datos['registros'] instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                        {!! $datos['registros']->links() !!}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <footer class="main-footer">
                <p>
                    Copyleft <i class="fa fa-copyright fa-flip-horizontal"></i> 2017 Banco Agrícola de Venezuela RIF: G-20005795-5
                </p>
            </footer>
        </div>
        <script src="/js/jquery.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/adminlte.min.js"></script>
        <script src="/js/app.js"></script>
        @yield('scripts')
    </body>
</html>
