<?php 
require_once('../clases/class.logueo.php');

$valida= new Logueo();
$valida->validaSesion();

require_once("clases/clase.datos.php");
$encontradas= new Datos($_POST);
$arrayAses=$encontradas->ocAsesor();

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
   <script src="../js/validaAsesores.js" type="text/javascript"></script><!-- form validation -->
    <!-- end JS -->
	<title>Zona Clientes</title>
</head>

<body>
<!-- begin container -->
<div id="wrap">
	<?php
        $seccion = "ocuAsesor";
        include_once('../includes/headerClientes.php');
        //include_once('clases/clase.insertaAsesor.php');
        $asesor = "Eliminar Asesor";
    ?>
        
    <!-- begin content -->
        <section id="content" class="container clearfix">
        	<!-- begin page header -->
             <header id="page-header">
                <h1 id="page-title">Eliminar Asesor</h1>
            </header>
            <form class="content-form" id="ocuAses" name="ocuAses" method="post" action="procesa/formularios.php">
            <div class="one-half">
            <?php 
            $ases=$arrayAses->fetch_array(MYSQL_ASSOC);
           
             ?>
             <h3>Si da clic en Guardar, la información del asesor se borrará definitivamente del sistema.</h3>
            <p>
                <label for="nombres">Nombre del asesor:</label>
                <input id="nombres" type="text" name="nombres" <?php echo "value='$ases[nombres]'"?> readonly="readonly">
            </p>
            <p><input type="hidden" name="id_oculta" <?php echo "value='$_GET[id]'"?>></p>
            
            <br><input type="hidden" name="action" value="ocuAses">
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
                <h2>¿Para que registrar un asesor inmobiliario?</h2>
                <p>Dentro del sistema un asesor inmobiliario puede ayudar a subir y administrar propiedades así como también prospectar compradores.</p>
                <h2>¿Como registro un asesor inmobiliario?</h2>
                <p>Para hacer el registro de un nuevo asesor, sólo realicé los siguientes pasos:</p>
                <p>1.- Capture los datos del asesor.</p>
                <p>2.- Una vez que se guarden los datos, el sistema envía un email de confirmación a la cuenta de correo que fue registrada.</p>
                <p>3.-  El asesor debe entrar a su cuenta de correo y dar clic en la liga para confirmar su registro.</p>
                <p>4.- Terminado esto, el asesor podrá iniciar sesión en el sistema y subir propiedades</p>
                <h2 style="font-size:2em ">Nota importante.</h2>
                <p>Los asesores inmobiliarios tienen menos privilegios que el cliente administrador y hay un número límite de asesores que el sistema permite cargar, esto depende del paquete que usted adquirió.</p>
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