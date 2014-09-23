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
    <link rel="stylesheet" href="../css/colorpicker.css" type="text/css" /><!--COlor oicker -->
    <link rel="stylesheet" media="screen" type="text/css" href="../css/layout.css" /><!--color picker-->
    <!-- end CSS -->
    
    <link href="../images/favicon.ico" type="image/x-icon" rel="shortcut icon"/>
    
    <!-- begin JS -->
    <script src="../js/jquery-1.7.2.min.js" type="text/javascript"></script> <!-- jQuery -->
    <script src="../js/ie.js" type="text/javascript"></script> <!-- IE detection -->
    <script src="../js/modernizr.custom.js" type="text/javascript"></script> <!-- Modernizr -->
    <!--[if IE 8]><script src="../js/respond.min.js" type="text/javascript"></script><![endif]--> <!-- Respond -->
    <script src="../js/ddlevelsmenu.js" type="text/javascript"></script> <!-- drop-down menu -->
    <script type="text/javascript"> 
        ddlevelsmenu.setup("nav", "topbar");
    </script><!-- drop-down menu -->
    <script src="../js/jquery.ui.totop.min.js" type="text/javascript"></script> <!-- scroll to top -->
    <script src="../js/custom.js" type="text/javascript"></script> <!-- jQuery initialization -->
    <script src="../js/colorpicker.js" type="text/javascript"></script><!--  Color Picker -->
    <script src="../js/eye.js" type="text/javascript"></script><!--  Color Picker -->
    <script src="../js/layout.js?ver=1.0.2" type="text/javascript"></script><!--  Color Picker -->
    <script src="../js/jquery.validate.min.js" type="text/javascript"></script> <!-- form validation -->
    <script src="../js/validaRedes.js" type="text/javascript"></script> <!-- form validation -->
    <!-- end JS -->
	<title>Zona Clientes</title>
</head>
<body>
<!-- begin container -->
<div id="wrap">
    <?php
        $seccion = "pagina"; 
        require_once('../includes/headerClientes.php');   
        require_once('clases/clase.muestraRedes.php');
        $redes= new muestraRedes($_SESSION);
        $arrayRedes=$redes->buscaRedes() 
    ?>
        
    <!-- begin content -->
        <section id="content" class="container clearfix">
            <!-- begin page header -->
             <header id="page-header">
                <h1 id="page-title">Redes sociales</h1>
            </header>
            <!--<form class="content-form" id="red_soc" name="red_soc" method="post" action="procesa/formularios.php">-->
            <form class="content-form" id="redSoc" name="redSoc" method="post" action="procesa/formularios.php">
                    <div class="one-half">

                    <h2>Formulario de datos</h2>
                     <p>Los campos marcados con <span class="note">*</span> són obligatorios</p>
                    
                    <p><label for="face">Facebook: </label><input type="url" id="face" name="face" <?php echo "value='$arrayRedes[facebook]'" ?>></p>
                    <p><label for="twitter">Twitter: </label><input type="url" id="twitter" name="twitter"  <?php echo "value='$arrayRedes[twitter]'" ?>></p>

                    <input type="hidden" name="id" <?php echo 'value="'.$_SESSION[inmobiliaria].'"'; ?>>
                    <br><input type="hidden" name="action" value="redSoc">
                    <p><input class="button" type="submit" value="Guardar"></p>

                    <div id="alertaRegistro" style="display:none"></div>
                    <div class="notification-box notification-box-error" style="display:none" id="respuestaAltaFalso">
                                    <p id="msj_err"></p>
                                    <a href="#" class="notification-close notification-close-error">x</a>
                                </div>
                                <div class="notification-box notification-box-success" style="display:none" id="respuestaAltaV">
                                    <p id="msj_suc"></p>
                                    <a href="#" class="notification-close notification-close-error">x</a>
                                </div>
                    </div>

                    <div class="one-half column-last">
                        <h2>¿Cómo configuro las redes sociales en mi página?</h2>
                        <p>Sólo necesita copiar el link desde su navegador y pegarlo en el campo de Facebook o Twitter. Por último, dar clic en Guardar.</p>
                        <p>Esto se verá reflejado en su página en los iconos de Facebook y Twitter respectivamente, cuando sus clientes den clic en los iconos, los llevará a sus redes sociales.</p>
                    </div>
            </form>
            
        </section>
        <!-- end content -->             
    <!-- begin footer -->
    <?php include '../includes/footerClientes.php' ?>
    <!-- end footer -->
</div>
<!-- end container -->
</body>
</html>