<?php 
require_once('../clases/class.logueo.php');

$valida= new Logueo();
$valida->validaSesion();

require_once("clases/clase.Datos.php");
$encontradas= new Datos($_POST);
$arrayasoc=$encontradas->editAsoc();
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
    <script src="../js/validaOficina.js" type="text/javascript"></script> <!-- form validation -->
    <!-- end JS -->
	<title>Zona Clientes</title>
</head>

<body>
<!-- begin container -->
<div id="wrap">
	<?php
        $seccion = "ocuasoc";
        include_once('../includes/headerClientes.php');
        //include_once('clases/clase.insertaAsesor.php');
        $asesor = "¿Está seguro de eliminar la asociación?";
    ?>
        
    <!-- begin content -->
        <section id="content" class="container clearfix">
        	<!-- begin page header -->
             <header id="page-header">
                <h1 id="page-title">Borrar Asociación</h1>
            </header>
            <form class="content-form" id="ocuficina" name="ocuficina" method="post" action="procesa/formularios.php">
            <div class="one-half">
            <?php echo "<h2>".$asesor."</h2>"; ?>
            <?php 
              $asoc=$arrayasoc->fetch_array(MYSQL_ASSOC); 
             ?>
             <h3>Si da clic en Guardar, la información de la oficina se borrará definitivamente del sistema.</h3>
            <p>
                <label for="nombre">Nombre de la asociación:</label>
                <input id="nombre" type="text" name="nombre" value='<?php echo $asoc['titulo']?>' readonly="readonly">
            </p>
            <p><input type="hidden" name="id_ocultaas" value='<?php echo $_GET['idas']?>' readonly="readonly"></p>
            
            <br><input type="hidden" name="action" value="ocuasoc">
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
                <h2></h2>
                <p></p>
                <h2></h2>
                <p></p>
                <p></p>
                <p></p>
                <p></p>
                
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