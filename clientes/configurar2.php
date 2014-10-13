<?php session_start(); ?>
<!DOCTYPE HTML>
<!--[if IE 8]> <html class="ie8 no-js"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <!-- begin meta -->
    <meta charset="utf-8">
    <meta name="description" content="Finesse is a responsive business and portfolio theme carefully handcrafted using the latest technologies. It features a clean design, as well as extended functionality that will come in very handy.">
    <meta name="author" content="Ixtendo">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- end meta -->
    
    <!-- begin CSS -->
    <link href="../style.css" type="text/css" rel="stylesheet" id="main-style">
    <!--[if IE]> <link href="css/ie.css" type="text/css" rel="stylesheet"> <![endif]-->
    <link href="../css/colors/orange.css" type="text/css" rel="stylesheet" id="color-style">
    <!-- end CSS -->
    
    <link href="../images/favicon.ico" type="image/x-icon" rel="shortcut icon">
    
    <!-- begin JS -->
    <script src="../js/jquery-1.7.2.min.js" type="text/javascript"></script> <!-- jQuery -->
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
    <script src="../js/validacion.js" type="text/javascript"></script> <!-- form validation -->
    <!-- end JS -->
	<title>Zona Clientes</title>
</head>

<body>
<!-- begin container -->
<div id="wrap">
	<?php 
        include('../includes/headerClientes.php');
        require_once('../actions/conexion.php');
        $codigo=mysql_query("SELECT Dominio, Nombre, Slogan, ColorA, ColorB, ColorC, Logotipo FROM tblWeb WHERE tblInmobiliaria_idInmobiliaria = '$_REQUEST[inm]'", $link) or die("Problemas buscando inmobiliarias".mysql_error());
        $row=mysql_fetch_array($codigo);
        if(mysql_num_rows($codigo) > 0){
            $existe = TRUE;
        }else{
            $existe = FALSE;
        }
    ?>
        
    <!-- begin content -->
        <section id="content" class="container clearfix">
        	<!-- begin page header -->
             <header id="page-header">
                <h1 id="page-title">Bienvenido <?php echo $_SESSION[usrname]; ?></h1>
            </header>
            <?php
                include('../includes/menuClientes.php');
            ?>
            <div class="two-thirds column-last">
                <h2>Configurar Página</h2>
                <p>Necesitamos que nos proporciones algunos datos para poder configurar tu página.</p>
                <h2>Paso 2 de 3</h2>
                <form class="content-form" name="wizard_b" id="wizard_b" method="post" action="../actions/insertaWizard.php">
                    <p>
                    <label for="usuario">Nombre comercial:<span class="note">*</span></label>
                    <input name="nombre" type="text">
                </p>
                 <p>
                    <label for="mail">Color Principal:<span class="note">*</span></label>
                    <input name="colora" type="text">
                </p>
                 <p>
                    <label for="mail">Color Secundario 1:<span class="note">*</span></label>
                    <input name="colorb" type="text">
                </p>
                 <p>
                    <label for="mail">Color Secundario 2:<span class="note">*</span></label>
                    <input name="colorc" type="text">
                </p>
                 <p>
                    <label for="mail">Logotipo:<span class="note">*</span></label>
                    <input name="logo" type="file">
                </p>                 
                <p>
                    <input type="hidden" name="inm" <?php echo 'value="'.$_REQUEST[inmo].'"'; ?>>
                    <input type="hidden" name="web" value="1">
                    <input class="button" value="Registrar" onclick="valida_wizard_b()" type="button">
                </p>
            </form>   
            </div>

            <!-- end sidebar -->
           
            <!-- end main content -->
        </section>
        <!-- end content -->             
    
	<!-- begin footer -->
	<?php include '../includes/footerClientes.php'; mysql_close($link); ?>
	<!-- end footer -->
</div>
<!-- end container -->

</body>
</html>