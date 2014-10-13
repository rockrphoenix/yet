<?php
require_once('../clases/class.logueo.php');

$valida= new Logueo();
$valida->validaSesion();

require_once("clases/clase.datos.php");
$data= new Datos($_SESSION);
$arrayData=$data->editTestim();
$datos=$arrayData->fetch_array(MYSQL_ASSOC);

if (isset($datos)) { 
    $accion="edtestim";
}else{
    $accion="testim";
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
    <script src="../js/validatestim.js" type="text/javascript"></script> <!-- form validation -->
    
   
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
                <h1 id="page-title">Testimoniales</h1>
            </header>
            <!--<form class="content-form" id="red_soc" name="red_soc" method="post" action="procesa/formularios.php">-->
            

            <form class="content-form" id="testimoniales" name="testimoniales" method="post" action="procesa/formularios.php">
                    <div class="one-half">
                    <h2>Agregar nuevo testimonial</h2>
                    
                    <p><label for="descli">Descripción del cliente</label><textarea name="descli" id="descli" cols="30" rows="10" placeholder="Ingrese datos del cliente"><?php echo $datos['descripcion']?></textarea></p>
                    
                    <p><label for="comentario">Comentario</label><textarea name="comentario" id="comentario" cols="30" rows="10" placeholder="Ingrese algún comentario"><?php echo $datos['comentario']?></textarea></p>
                    <p><label for="imagtest">Imagen </label><input type="file" id="imagtest" name="imagtest"></p>
                    
                    <input type="hidden" name="idcli" <?php echo 'value="'.$_SESSION['id'].'"'; ?>>
                    <input type="hidden" name="idcomen1" <?php echo 'value="'.$_GET['idcomen'].'"'; ?>>
                    <input type="hidden" name="idcomen2" <?php echo "value='".$datos['idtest']."'"?>>
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
                        <h2>¿Para qué incluir testimoniales?</h2>
                        <p>Incluir testimonios de clientes satisfechos le puede ayudar a promover su inmobiliaria en internet.</p>
                        <p>Los testimonios son una prueba valiosa para los clientes potenciales de que sus servicios efectivamente cumplen lo prometido. Los testimonios de clientes satisfechos dan exactamente la misma confianza al cliente potencial que aquella dada por terceras personas que nos recomienda y manda clientes referidos. </p>
                        <p>Recuerde, la clave de los testimonios radica en la credibilidad.</p>
                        <h2>¿Cómo agrego un testimonio?</h2>
                        <p>Pida a sus clientes que le envíen un comentario de lo que les pareció sus servicios o de cómo fue su experiencia con usted. Esta información agréguela en el campo Comentario del formulario de la izquierda.</p>
                        <p>La información de cliente debe ingresarla en el campo Descripción del cliente del formulario. Deberá incluir el nombre real del cliente y  su lugar de residencia. Si su cliente así lo desea, también puede incluir su dirección, teléfono, dirección de correo electrónico, ocupación y una imagen o fotografía.</p>
                        <p>Por último, de clic en Guardar.</p>
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