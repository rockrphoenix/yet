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
        $codigo=mysql_query("SELECT idInmobiliaria, Nombre, RFC FROM tblInmobiliaria WHERE tblClientes_idClientes = '$_SESSION[id]'", $link) or die("Problemas buscando inmobiliarias".mysql_error());
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
            <?php
                if (isset($_REQUEST[msjer])) {
                   echo '
                        <div class="notification-box notification-box-error">
                            <p>Ha ocurrido el siguiente error<strong> '.$_REQUEST[msjer].'</strong>.</p>
                            <a href="#" class="notification-close notification-close-error">x</a>
                        </div>
                   ';
                }else if (isset($_REQUEST[msjok])) {
                    echo '
                        <div class="notification-box notification-box-success">
                            <p>Todo bien!<strong> '.$_REQUEST[msjok].'</strong>.</p>
                            <a href="#" class="notification-close notification-close-error">x</a>
                        </div>
                   ';
                }
            ?>
                <h2>Inmobiliaria</h2>
                <p>Necesitamos que nos proporciones algunos datos para poder configurar tu página.</p>
                <form class="content-form" name="wizard_a" id="wizard_a" method="post" action="../actions/insertaWizard.php">
                    <p>
                    <label for="usuario">Nombre de tu Inmobiliaria:<span class="note">*</span></label>
                    <input name="inmobiliaria" type="text" <?PHP 
                        if ($existe == TRUE) {
                            echo 'value="'.$row[Nombre].'"';
                        }
                    ?>>
                </p>
                 <p>
                    <label for="mail">RFC:<span class="note">*</span></label>
                    <input name="rfc" type="text"<?php
                        if ($existe == TRUE) {
                            echo 'value="'.$row[RFC].'"';
                        }
                    ?>>
                </p>
                 
                <p><?php
                    if ($existe == TRUE) {
                        echo '<input type="hidden" name="inmo" value="actualiza">';
                        echo '<input type="hidden" name="idInmo" value="'.$row[idInmobiliaria].'">';
                    }else{
                        echo '<input type="hidden" name="inmo" value="inserta">';
                    }
                ?>
                    <input class="button" value="Guardar" onclick="valida_wizard_a()" type="button">
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