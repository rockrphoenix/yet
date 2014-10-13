<?php
require_once('../clases/class.logueo.php');
require_once('clases/clase.imagenes.php');
$valida= new Logueo();
<<<<<<< HEAD
$estatus = $valida->validaSesion();
=======
$valida->validaSesion();
>>>>>>> 1f22693d82efdd027128b4a534fecb9d8f3230a5
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
    <link rel="stylesheet" media="screen" type="text/css" href="../css/image-picker.css" />
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
    <script src="../js/image-picker.js" type="text/javascript"></script> <!-- para selección de imágenes -->
    <script src="../js/image-picker.min.js" type="text/javascript"></script> <!-- form validation -->
    <script type="text/javascript">
        $(document).ready(function(){
            $("select").imagepicker();
        });
    </script>
    <!-- end JS -->
	<title>Zona Clientes</title>
</head>

<body>
<!-- begin container -->
<div id="wrap">
	<?php
<<<<<<< HEAD
        $seccion = "propiedad"; 
        if ($estatus == 2) {
            include_once('../includes/headerClientes.php');
        }else if($estatus == 1 || $estatus == 9){
            include_once('../includes/headerPaquete.php');
        }else if($estatus == 3 || $estatus == 4){
            include_once('../includes/headerAsesores.php');
        }
=======
        $seccion = "pagina"; 
        include_once('../includes/headerClientes.php');
>>>>>>> 1f22693d82efdd027128b4a534fecb9d8f3230a5
        $imagenes = new Imagenes($_GET);
        $str = $imagenes->muestraImagenes();
    ?>
        
    <!-- begin content -->
        <section id="content" class="container clearfix">
        	<!-- begin page header -->
             <header id="page-header">
                <h1 id="page-title">Imagen predeterminada</h1>
            </header>
            <p>Por favor elije una imagen predeterminada y después presiona en guardar.</p>
            <?php if ($_GET[msj] == 1) { ?>

                <div class="notification-box notification-box-success">
                    <p>Imagen predeterminada asignada.</p>
                    <a href="#" class="notification-close notification-close-success">x</a>
                </div>
                    
            <?php } else if($_GET[msj] == 2){ ?>

                <div class="notification-box notification-box-error">
                    <p>Ocurrió un error, inténtelo más tarde.</p>
                    <a href="#" class="notification-close notification-close-error">x</a>
                </div>

            <?php } ?>
            
            <form method="post" action="procesa/formularios.php">
            <select class="image-picker show-html" name="edita_imagen">
              <?php echo $str ?>
            </select>
            <input type="hidden" name="action" value="actualizaImagen">
            <input type="hidden" name="idpropiedad" <?php echo 'value="'.$_GET['idpropiedad'].'"'; ?>>
            <input type="hidden" name="id" <?php echo 'value="'.$_SESSION['id'].'"'; ?>>
            <input type="submit" value="Guardar">
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