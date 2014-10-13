<?php
require_once('../clases/class.logueo.php');

$valida= new Logueo();
$valida->validaSesion();

require_once("clases/clase.datos.php");
$data= new Datos($_SESSION);
$arrayData=$data->editSeccion();
$datos=$arrayData->fetch_array(MYSQL_ASSOC);

if (isset($datos)) { 
    $accion="edsecciones";
}else{
    $accion="secciones";
}

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
    <script src="../js/validaSecciones.js" type="text/javascript"></script> <!-- form validation -->
    
   
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
                <h1 id="page-title">Secciones</h1>
            </header>
            <!--<form class="content-form" id="red_soc" name="red_soc" method="post" action="procesa/formularios.php">-->
            <form class="content-form" id="secciones" name="secciones" method="post" action="procesa/formularios.php">
                    <div class="one-half">

                    <h2>Crear nueva sección</h2>
                     <p>Los campos marcados con <span class="note">*</span> són obligatorios</p>
                    
                    <p><label for="titulo">Título: <span class="note">*</span></label><input type="text" id="titulo" name="titulo" <?php echo "value='".$datos['titulo']."'"?>></p>
                    <p><label for="descripcion">Descripción: <span class="note">*</span></label><textarea name="descripcion" id="descripcion" cols="100" rows="100" ><?php echo $datos['descripcion'];?></textarea></p>
                    <input type="hidden" name="idcli" <?php echo 'value="'.$_SESSION['id'].'"'; ?>>
                    <input type="hidden" name="id" <?php echo 'value="'.$_GET['id'].'"'; ?>>
                    <input type="hidden" name="idseccion" <?php echo "value='".$datos['idseccion']."'"?>>
                    <br><input type="hidden" name="action" <?php echo "value='$accion'"; ?>>
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
                        <h2>¿Para qué incluir más secciones?</h2>
                        <p>Incluir más secciones ayuda a publicar información adicional referente a tu sitio. </p>
                        <p>Mientras más información tengan tus clientes de tu inmobiliaria y tus servicios, se sentirán con más confianza para comprarte alguna de tus propiedades.</p>
                        <h2>¿Qué secciones puedo incluir?</h2>
                        <p>Puedes incluir las secciones de tu preferencia o las que se ajusten a las necesidades de tu inmobiliaria. A continuación te daremos algunos ejemplos:</p>
                        <p>Mientras más información tengan tus clientes de tu inmobiliaria y tus servicios, se sentirán con más confianza para comprarte alguna de tus propiedades.</p>
                        <p>•    ¿Quiénes somos?: Puedes incluir una breve descripción de tu inmobiliaria, cuántos años llevan en el sector, en qué año se fundó, misión, visión, etc.</p>
                        <p>•   Aviso de privacidad de datos: En esta sección debe ir el  documento que informa de manera clara y precisa el uso y tratamiento de los datos personales.</p>
                        <p>•   Promociona tu inmueble con nosotros: En ésta sección puedes invitar a tus clientes a que suban sus propiedades en tu sitio y explicarles el proceso para anunciarse.</p>
                        <p>•   Preguntas frecuentes: Las preguntas frecuentes ayudan a tus clientes a resolver sus dudas por sí mismos, sin tener que invertir su tiempo en contactarte, ni el tuyo en tener que responderles. Les ayuda a tus clientes a tomar una decisión gracias a la información tan útil que les aportan.</p>
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