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
    <script src="../js/jquery.validate.min.js" type="text/javascript"></script> <!-- form validation -->
    <script src="../js/validaDatosInmo.js" type="text/javascript"></script> <!-- form validation -->
    <!-- end JS -->
	<title>Zona Clientes</title>
</head>

<body>
<!-- begin container -->
<div id="wrap">
	<?php
        $seccion = "pagina"; 
        require_once('../includes/headerClientes.php');
    ?>
        
    <!-- begin content -->
        <section id="content" class="container clearfix">
        	<!-- begin page header -->
             <header id="page-header">
                <h1 id="page-title">Información de la inmobiliaria</h1>
            </header>
            <!--<form class="content-form" id="datos_inmo" name="datos_inmo" method="post" action="procesa/formularios.php">-->
                <form class="content-form" id="datos_inmo" name="datos_inmo" method="post" action="#">
            <div class="one-half">
            <h2>Formulario de datos</h2>
            <p>Los campos marcados con <span class="note">*</span> són obligatorios</p>
            <p><label for="nombre">Nombre de la inmobiliaria: <span class="note">*</span></label><br><input type="text" name="nombre" ></p>
            <p><label>Dirección: </label></p>
            <p><label for="calle">Calle: <span class="note">*</span></label><input type="text" name="calle"></p>
            <p><label for="numero">Número: <span class="note">*</span></label><input type="text" name="numero"></p>
            <p><label for="no_interior">Número interior: </label><input type="text" name="no_interior"></p>  
            <p><label for="colonia">Colonia: <span class="note">*</span></label><input type="text" name="colonia"></p>
            <p><label for="delegación">Delegación/municpio: </label><input type="text" name="delegacion"></p>
            <p><label for="estado">Estado: <span class="note">*</span></label><input type="text" name="estado"></p>
            <p><label for="ciudad">Ciudad: <span class="note">*</span></label><input type="text" name="ciudad"></p>
            <p><label for="descripcion">Descripción: <span class="note">*</span></label><textarea name="descripcion"></textarea></p>
            <p><label for="telefono">Teléfono: <span class="note">*</span></label><input type="text" name="telefono"></p>
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
                <h2>¿Por qué es importante dar esta información?</h2>
                <p>Una vez que haya llenado el formulario con los datos de su inmobiliaria,  se registrarán también sus datos en el sitio de Yet! Esto facilitará poder publicar sus propiedades en otros sitios y que tenga más posibilidades de tener una venta exitosa.</p>
                
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