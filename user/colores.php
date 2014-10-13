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
    <script src="../js/jquery.validate.min.js" type="text/javascript"></script> <!-- form validation -->
    <script src="../js/validaColores.js" type="text/javascript"></script> <!-- form validation -->
    <script src="../js/colorpicker.js" type="text/javascript"></script><!--  Color Picker -->
    <script src="../js/eye.js" type="text/javascript"></script><!--  Color Picker -->
    <script src="../js/layout.js?ver=1.0.2" type="text/javascript"></script><!--  Color Picker -->
    <!-- end JS -->
	<title>Zona Clientes</title>
</head>

<body>
<!-- begin container -->
<div id="wrap">
	<?php
        $seccion = "pagina"; 
        include_once('../includes/headerClientes.php');
        include_once('clases/clase.buscaConfiguracion.php');
        $colores = new BuscaConfiguracion();
        $arrayColores = $colores->buscarColores();
    ?>
        
    <!-- begin content -->
        <section id="content" class="container clearfix">
        	<!-- begin page header -->
             <header id="page-header">
                <h1 id="page-title">Configuración de colores</h1>
            </header>
            <form class="content-form" id="colores" name="colores" method="post" action="procesa/formularios.php">
            <div class="one-half">
            <h2>Elija los colores de su página.</h2>
            <h4>Color A</h4>
            <p><input type="text" maxlength="6" size="6" id="colorpickerField1" <?php echo "value='$arrayColores[ColorFondo]'"; ?> name="colora" /></p>
            <h4>Color B</h4>
            <p><input type="text" maxlength="6" size="6" id="colorpickerField2" <?php echo "value='$arrayColores[ColorPrincipal]'"; ?> name="colorb"/></p>
            <input type="hidden" name="id" <?php echo 'value="'.$_SESSION[inmobiliaria].'"'; ?>>
            <br><input type="hidden" name="action" value="colores">
            <p><input class="button" type="submit" value="Guardar"></p>
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
                <h2>¿Como configuro los colores de mi página?</h2>
                <p>Debes de elegir dos colores principales, estos colores aparecen en tu página de manera automática una vez que los guardas, el Color A es el color principal mientras que Color B aperece en menor medida.</p>
                <img src="images/colores/color_a.jpg" style="width:100%;margin-bottom:10px;">
                <img src="images/colores/color_b.jpg" style="width:100%;margin-bottom:10px;">
                <p>Puedes ingresar el color de manera hexadecimal o en RGB o simplemente elegir el que más te guste al dar click en alguno de los campos del formulario.</p>
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