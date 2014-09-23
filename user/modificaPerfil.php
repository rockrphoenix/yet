<?php
require_once('../clases/class.logueo.php');
$valida= new Logueo();
$estatus = $valida->validaSesion();
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
    <link href="../css/calendario.css" type="text/css" rel="stylesheet" id="color-style"/>
    <!-- end CSS -->
    
    <link href="../images/favicon.ico" type="image/x-icon" rel="shortcut icon"/>
    
    <!-- begin JS -->
    <script src="../js/jquery-1.7.2.min.js" type="text/javascript"></script> <!-- jQuery -->
    <script src="../js/jquery.ui.totop.min.js" type="text/javascript"></script> <!-- scroll to top -->
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
    <script src="../js/jquery.validate.min.js" type="text/javascript"></script> <!-- form validation -->
    <script src="../js/validacion.js" type="text/javascript"></script> <!-- form validation -->
    <script src="../js/validaModperf.js" type="text/javascript"></script> <!-- form validation -->
    <!-- end JS -->
	<title>Zona Clientes</title>
</head>
<body>
<!-- begin container -->
<div id="wrap">
    <?php
        require_once("clases/clase.datos.php");
        $datos = new Datos($_SESSION);
        if (isset($_SESSION[idasesor])) {
            //echo "asesor";
            $aDatos = $datos->datosAsesor();
            $action = "actAsesor";
            $id = $_SESSION[idasesor];
        }else{
            //echo "cliente";
            $aDatos = $datos->datosPerfil();
            $action = "actPerfil";
            $id = $_SESSION[id];
        }
        $seccion = "perfil"; 
        if ($estatus == 2) {
            include_once('../includes/headerClientes.php');
        }else if($estatus == 1 || $estatus == 9){
            include_once('../includes/headerPaquete.php');
        }else if($estatus == 3 || $estatus == 4){
            include_once('../includes/headerAsesores.php');
        }
        $user = $_SESSION['usuario'];
    ?>
        
    <!-- begin content -->
        <section id="content" class="container clearfix">
            <!-- begin page header -->
             <header id="page-header">
                <h1 id="page-title">Modificar perfil</h1>
            </header>
            <!--<form class="content-form" id="mod_perf" name="mod_perf" method="post" action="procesa/formularios.php">-->
                
            <div class="one-half">
            <h2>Formulario de Datos</h2>
            <p><input type="email" name="mail" disabled <?php echo 'value="'.$aDatos[email].'"'; ?>></p>
            <form class="content-form" id="mod_perf" name="mod_perf" method="post" action="procesa/formularios.php">
            <p><label for="nombre">Nombre: <span class="note">*</span></label><input type="text" name="nombre" <?php echo 'value="'.$aDatos[nombres].'"'; ?>></p>
            <p><label for="paterno">Apellido paterno: <span class="note">*</span></label><input type="text" name="paterno" <?php echo 'value="'.$aDatos[paterno].'"'; ?>></p>
            <p><label for="materno">Apellido materno: <span class="note">*</span></label><input type="text" name="materno" <?php echo 'value="'.$aDatos[materno].'"'; ?>></p>
            <p><label for="telefono">Teléfono: <span class="note">*</span></label><input type="text" name="telefono" <?php echo 'value="'.$aDatos[tel].'"'; ?>></p>
            <p><label for="celular">Celular: <span class="note">*</span></label><input type="text" name="celular" <?php echo 'value="'.$aDatos[cel].'"'; ?>></p>
            <input type="hidden" name="id" <?php echo 'value="'.$id.'"'; ?>>
            <input type="hidden" name="action" <?php echo 'value="'.$action.'"'; ?>>
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
                <h2>¿Cómo cambio los datos de mi perfil?</h2>
                <p>Sólo llene los cambios con la información solicitada y de clic en Guardar.</p>
                <p>Puede cambiar estos datos cuando usted desee.</p>
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