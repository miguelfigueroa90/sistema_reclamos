<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sistema de Reclamo | BAV</title>
        <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">
        <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <link rel="stylesheet" href="css/style.css" media="screen">
        <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
        <link rel="stylesheet" href="css/style.responsive.css" media="all">
        <script src="js/jquery.js"></script>
        <script src="js/script.js"></script>
        <script src="js/script.responsive.js"></script>
    </head>
    <body>
        <header id="art-main">
            <div class="art-header">
                <div class="art-shapes">
                </div>
            </div>
        </header>

        <div id="art-main">
            <div class="art-sheet clearfix">
                <div class="art-layout-wrapper">
                    <div class="art-content-layout">
                        <div class="art-content-layout-row">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="row art-footer">
            <p>
                <a href="http://172.18.52.110/IB/Login.aspx">Banco Agrícola de Venezuela RIF:20005795-5</a> 
            </p>
            <p>&copy; Copyleft © 2017. All Rights Reserved.</p>
        </footer>
    </body>
</html>