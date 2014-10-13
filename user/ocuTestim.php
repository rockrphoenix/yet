<?php 
require_once('../clases/class.logueo.php');

$valida= new Logueo();
$valida->validaSesion();

require_once("clases/clase.Datos.php");
$data= new Datos($_POST);
$arrayData=$data->editTestim();
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
        $seccion = "ocutest";
        include_once('../includes/headerClientes.php');
        //include_once('clases/clase.insertaAsesor.php');
        $asesor = "¿Está seguro de eliminar el testimonial?";
    ?>
        
    <!-- begin content -->
        <section id="content" class="container clearfix">
            <!-- begin page header -->
             <header id="page-header">
                <h1 id="page-title">Borrar testimonial</h1>
            </header>
            <form class="content-form" id="ocuficina" name="ocuficina" method="post" action="procesa/formularios.php">
            <div class="one-half">
            <?php echo "<h2>".$asesor."</h2>"; ?>
            <?php 
              $test=$arrayData->fetch_array(MYSQL_ASSOC); 
             ?>
             <h3>Si da clic en Guardar, la información del testimonial se borrará definitivamente del sistema.</h3>
           <p><label for="comentario">Comentario</label><textarea name="comentario" id="comentario" cols="30" rows="10" placeholder="Ingrese algún comentario"><?php echo $test['comentario']?></textarea></p>

            <p><input type="hidden" name="id_ocultests" value='<?php echo $_GET['idcomen']?>' readonly="readonly"></p>
            
            <br><input type="hidden" name="action" value="ocutest">
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