<?php session_start(); ?>
<!DOCTYPE HTML>
<!--[if IE 8]> <html class="ie8 no-js"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <!-- begin meta -->
    <meta charset="utf-8">
    <meta name="description" content="Finesse is a responsive business and portfolio theme carefully handcrafted using the latest technologies. It features a clean design, as well as extended functionality that will come in very handy.">
    <meta name="author" content="Ixtendo">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- end meta -->
    
    <!-- begin CSS -->
    <link href="../style.css" type="text/css" rel="stylesheet" id="main-style">
    <!--[if IE]> <link href="css/ie.css" type="text/css" rel="stylesheet"> <![endif]-->
    <link href="../css/colors/orange.css" type="text/css" rel="stylesheet" id="color-style">
    <!-- end CSS -->
    
    <link href="../images/favicon.ico" type="image/x-icon" rel="shortcut icon">
    
    <!-- begin JS -->
    <script src="../js/jquery-1.7.2.min.js" type="text/javascript"></script> <!-- jQuery -->
    <script src="../js/ie.js" type="text/javascript"></script> <!-- IE detection -->
    <script src="../js/jquery.easing.1.3.js" type="text/javascript"></script> <!-- jQuery easing -->
    <script src="../js/modernizr.custom.js" type="text/javascript"></script> <!-- Modernizr -->
    <!--[if IE 8]><script src="../js/respond.min.js" type="text/javascript"></script><![endif]--> <!-- Respond -->
    <script src="../js/jquery.polyglot.language.switcher.js" type="text/javascript"></script> <!-- language switcher -->
    <script src="../js/ddlevelsmenu.js" type="text/javascript"></script> <!-- drop-down menu -->
    <script type="text/javascript"> <!-- drop-down menu -->
        ddlevelsmenu.setup("nav", "topbar");
    </script>
    <script src="../js/tinynav.min.js" type="text/javascript"></script> <!-- tiny nav -->
    <script src="../js/jquery.ui.totop.min.js" type="text/javascript"></script> <!-- scroll to top -->
    <script src="../js/jquery-ui-1.8.21.custom.min.js" type="text/javascript"></script> <!-- tabs, toggles, accordion -->
    <script src="../js/jquery.tweet.js" type="text/javascript"></script> <!-- Twitter widget -->
    <script src="../js/jquery.touchSwipe.min.js" type="text/javascript"></script> <!-- touchSwipe -->
    <script src="../js/custom.js" type="text/javascript"></script> <!-- jQuery initialization -->
    <!-- end JS -->
	<title>Zona Clientes</title>
</head>

<body>
<!-- begin container -->
<div id="wrap">
	<?php 
        include('../includes/headerClientes.php');
    ?>
        
    <!-- begin content -->
        <section id="content" class="container clearfix">
        	<!-- begin page header -->
             <header id="page-header">
                <h1 id="page-title">Bienvenido <?php echo $_SESSION[usrname]; ?></h1>
            </header>
            <?php
                include('../includes/menuClientes.php');
            ?>
            <div class="two-thirds column-last">
            <h2>Adquirir Plan</h2>

            <div class="tabs ui-tabs ui-widget ui-widget-content ui-corner-all">
                    <ul class="nav clearfix ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
                        <li class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active"><a href="#tab-1">Plus</a></li>
                    </ul>
                    <div id="tab-1" class="tab ui-tabs-panel ui-widget-content ui-corner-bottom">
                        <table class="gen-table pricing-table responsive">
                    <thead>
                        <tr>
                            <th class="empty-left-top" style="width:50%;">&nbsp;</th>
                            <th class="featured">
                                <span class="title">Inicial</span>
                            </th>
                        </tr>
                    </thead>
                <tfoot>
                    <tr>
                        <td class="empty-left-bottom">&nbsp;</td>
                        <form method="post" action="ordenar.php">
                        <input type="hidden" name="paquete" value="P4qu3t301">
                        <td><input type="submit" value="Ordenar" class="button"></td>
                        </form>
                    </tr>
                </tfoot>
                <tbody>
                        <tr>
                            <th>Número de administradores</th>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>Número de asesores inmobiliarios</th>
                            <td>3</td>
                        </tr>
                        <tr class="odd">
                            <th>Cuentas de correo electrónico</th>
                            <td>5</td>
                        </tr>

                        <tr>
                            <th>Secciones en página web</th>
                            <td>4</td>
                        </tr>
                        <tr>
                            <th>Publicación de propiedades</th>
                            <td>ilimitada</td>
                        </tr>
                        
                        <tr class="odd">
                            <th>Dominio (.com o .com.mx) </th>
                            <td>&nbsp; Incluido</span></td>
                        </tr>
                        <tr class="odd">
                            <th>Publicación automática en portales aliados</th>
                            <td><span class="check">&nbsp;</span></td>
                        </tr>
                        <tr class="row-last">
                            <th>Pago Trimestral</th>
                            <td>$1,800 más iva</td>
                        </tr>
                         <tr class="row-last">
                            <th>Pago Semestral</th>
                            <td>$3,100 más iva</td>
                        </tr>
                        <tr class="row-last">
                            <th>Pago Anual</th>
                            <td>$5,500 más iva</td>
                        </tr>
                    </tbody>
                </table>
                    </div>
                </div>
            
            

            </div>

            <!-- end sidebar -->
           
            <!-- end main content -->
        </section>
        <!-- end content -->             
    
	<!-- begin footer -->
	<?php include '../includes/footerClientes.php' ?>
	<!-- end footer -->
</div>
<!-- end container -->

</body>
</html>