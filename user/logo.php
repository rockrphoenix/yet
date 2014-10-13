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
    <!--<script src="../js/uploadLogo.js" type="text/javascript"></script>
     <script src="../js/jquery.validate.min.js" type="text/javascript"></script> <!-- form validation -->
    
    
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
    ?>
        
    <!-- begin content -->
        <section id="content" class="container clearfix">
        	<!-- begin page header -->
             <header id="page-header">
                <h1 id="page-title">Logotipo</h1>
            </header>
            <form class="content-form" id="form-logotipo" method="post" action="procesa/formularios.php" enctype="multipart/form-data">
            <div class="one-half">
            <?php
                if (file_exists('../../clientes/'.$_SESSION[id].'/logotipo/logo.jpg')) {
                    echo '<img src="http://clientes.yetinmobiliario.com/'.$_SESSION[id].'/logotipo/logo.jpg?'.time().'">';
                }else{
                    echo "No se ha subido logotipo";
                }
            ?>
            <h2>Logotipo Actual</h2>
            <h4>Selecciona archivo</h4>
            <input type="hidden" name="idinmobiliaria" <?php echo 'value="'.$_SESSION[inmobiliaria].'"'; ?>>
            <input type="hidden" name="id" <?php echo 'value="'.$_SESSION[id].'"'; ?>>
            <input name="logotipo" type="file" id="archivoLogo"/>
            <br><input type="hidden" name="action" value="logotipo">
            
            <p><input class="button" type="submit" value="Subir"></p>
            <?php 
                if ($_GET['msj']=="1") {
            ?>                
            <div class="notification-box notification-box-success" id="respuestaAltaV">
                    <p id="msj_suc">Logotipo guardado</p>
                    <a href="#" class="notification-close notification-close-error">x</a>
                </div>
            <?php
                }else if($_GET['msj'=="2"] or $_GET['msj']=="3"){
            ?>
            <div class="notification-box notification-box-error" id="respuestaAltaFalso">
                <p id="msj_err">Error! es probable que el archivo no sea compatible</p>
                <a href="#" class="notification-close notification-close-error">x</a>
            </div>
            <?php } ?>
            </div>
            </form>
            <div class="one-half column-last">
                <h2>¿Cómo puedo subir mi logotipo?</h2>
                <p>Es muy importante que suba su logotipo, ya que se visualizará en la parte superior izquierda de su página.</p>
                <img src="images/colores/logo.jpg" style="width:100%;margin-bottom:10px;">
                <p>Para subirlo, sólo necesita:.</p>
                <p><ol>
                    <li>Dar clic en el botón “Seleccionar imagen”.</li>
                    <li>Elegir la imagen desde su equipo. Las imágenes deberán ser en formato jpg o png y para óptimos resultados deben ser de una resolución de 216 x 45px.</li>
                    <li>Dar clic en subir.</li>
                </ol></p>
                <p>¡Listo! Sus clientes ya podrán identificar su inmobiliaria.</p>
            </div>
            
            
        </section>
        <!-- end content -->             
	<!-- begin footer -->
	<?php include '../includes/footerClientes.php' ?>
	<!-- end footer -->
</div>
<!-- end container -->
</body>
</html>