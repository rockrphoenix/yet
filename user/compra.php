<?php
require_once('../clases/class.logueo.php');
$valida= new Logueo();
$valida->validaSesion();
?>
<!DOCTYPE HTML>
<!--[if IE 8]> <html class="ie8 no-js"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <!-- begin meta -->
    <meta charset="utf-8">
    <meta name="description" content="Finesse is a responsive business and portfolio theme carefully handcrafted using the latest technologies. It features a clean design, as well as extended functionality that will come in very handy.">
    <meta name="keywords" content="Finesse, responsive business portfolio theme, HTML5, CSS3, clean design">
    <meta name="author" content="Ixtendo">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- end meta -->
    
    <!-- begin CSS -->
    <link href="../style.css" type="text/css" rel="stylesheet" id="main-style"/>
    <!--[if IE]> <link href="css/ie.css" type="text/css" rel="stylesheet"> <![endif]-->
    <link href="../css/colors/orange.css" type="text/css" rel="stylesheet" id="color-style"/>
    <!-- end CSS -->
    
    <link href="../images/favicon.ico" type="image/x-icon" rel="shortcut icon"/>
    
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
    <script src="..(js/custom.js" type="text/javascript"></script> <!-- jQuery initialization -->
    <script src="../js/jquery.validate.min.js" type="text/javascript"></script> <!-- form validation -->
    <script src="../js/prop.js" type="text/javascript"></script> <!-- form validation -->
    <!-- end JS -->
	<title>Zona Clientes</title>
</head>

<body>
<!-- begin container -->
<div id="wrap">
	<?php
        include_once("clases/clase.index.php");
            include_once('../includes/headerPaquete.php');
        $user = "usuario";
    ?>
        
    <!-- begin content -->
        <section id="content" class="container clearfix">
            <!-- begin page header -->
             <header id="page-header">
                <h1 id="page-title">Gracias por adquirir uno de nuestros paquetes <?php echo $user ?></h1>
            </header>
                <h2>
                    Por favor elige las características
                </h2>
                <table class="gen-table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Costo</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td colspan="4">Ver más</td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td><img src="images/SAM_0341.jpg" height="50"></td>
                            <td>Propiedad de Pruebas</td>
                            <td>Esta propiedad tiene un ...</td>
                            <td><img src="images/iconos/ok.png" style="display:inline" alt="Ver"><img src="images/iconos/edit.png" style="display:inline" alt="Ver"><img src="images/iconos/cancel.png" style="display:inline" alt="Ver"></td>
                        </tr>
                    </tbody>
                </table>
        </section>
        <!-- end content -->             
	<!-- begin footer -->
	<?php include '../includes/footer.php' ?>
	<!-- end footer -->
</div>
<!-- end container -->
</body>
</html>