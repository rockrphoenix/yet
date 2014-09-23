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
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script> <!-- Google maps -->
    <script src="../js/jquery.gmap.min.js" type="text/javascript"></script> <!-- gMap -->
    <script src="../js/validaContacto.js" type="text/javascript"></script> <!-- form validation -->
    <!-- end JS -->
    
	<title>Contacto</title>
</head>

<body>
<!-- begin container -->
<div id="wrap">
	<?php
    $seccion = "soporte";
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
            	<h1 id="page-title">Contacto</h1>	
            </header>
            <!-- end page header -->
        	
            <!-- begin main content -->
            
            <!-- begin google map --> 
            <section>
                <div id="map"
                    data-address="320 Lago Alberto, Col. Anahuac, México DF"
                    data-zoom="17"
                    style="width: 100%; height: 400px;">
                </div>
            </section>
            <!-- end google map -->
            
            <!-- begin main -->
            <section id="main" class="three-fourths">
            <!-- begin contact form -->
            <h2>Equipo de soporte de Yet! Inmobiliario</h2>
            <p>¿Tienes alguna duda o problema con el sistema? No te preocupes, en Yet! Inmobiliario estamos para servirte y con gusto te atenderemos. Sólo llena el formulario de abajo y en breve un ejecutivo se pondrá en contacto contigo para resolver tu problema.</p>
            <div class="notification-box notification-box-success" style="display: none;" id="respuestaAltaV">
                <p>Mensaje enviado con éxito, en breve nos pondremos en contacto.</p>
                <a href="#" class="notification-close notification-close-success">x</a>
            </div>
            
            <div class="notification-box notification-box-error " style="display: none;" id="respuestaAltaFalso">
                <p>El mensaje no envió por un error, intente de nuevo más tarde.</p>
                <a href="#" class="notification-close notification-close-error">x</a>
            </div>
            <form id="contactoUsuario" class="content-form" method="post" action="procesa/formularios.php">
                <p>
                    <label for="name">Nombre:<span class="note">*</span></label>
                    <input id="name" type="text" name="name" class="required">
                </p>
                <p>
                    <label for="tel">Teléfono:<span class="note">*</span></label>
                    <input id="tel" type="text" name="tel" class="required">
                </p>
                <p>
                    <label for="mail">Email:<span class="note">*</span></label>
                    <input id="mail" type="email" name="mail" class="required">
                </p>
                <p>
                    <label for="mensaje">Mensaje:<span class="note">*</span></label>
                    <textarea id="mensaje" cols="68" rows="8" name="mensaje" class="required"></textarea>
                </p>
                <p>
                	<br><input type="hidden" name="action" value="contactUser">
                    <input id="submit" class="button" type="submit" name="submit" value="Enviar mensaje">
                    <div id="alertaRegistro" style="display:none"></div>
                </p>
            </form>
            <p><span class="note">*</span> Campos Requeridos</p>
            <!-- end contact form -->
            </section>
            <!-- end main -->
            
            <!-- begin sidebar -->
            <aside id="sidebar" class="one-fourth column-last">
            	<div class="widget contact-info">
                    <h3>Información de contacto</h3>
                    <p class="address">Centro Comercial Parques Polanco<br>
                    Lago Alberto #320 piso 1, esq. Mariano Escobedo<br>
                    Col. Anáhuac, C.P. 11320 Del. Miguel Hidalgo <br>
                    Distrito Federal México</p>
                    <p class="phone"><strong>Tel:</strong> +50 29 64 81</p>
                    <p class="email"><strong>Email:</strong> <a href="mailto:ventas@yetinmobiliario.com">soporte@yetinmobiliario.com</a></p>
                    <p class="business-hours"><strong>Horario de atención:</strong><br>
                    Lunes a Viernes: 9:00-18:00<br>
                    </p>
                </div>
            </aside>
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