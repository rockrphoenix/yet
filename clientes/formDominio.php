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
        $codigo=mysql_query("SELECT Dominio, tblWeb_idWeb FROM tblDominios WHERE tblClientes_idClientes = '$_SESSION[id]'", $link) or die("Problemas buscando dominios".mysql_error());
        $row=mysql_fetch_array($codigo);
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
                 <h2>Mis dominios</h2>
                    <form class="content-form" name="actualiza" id="actualiza" method="post" action="../actions/actualizaPerfil.php">

                    <p>
                <label for="usuario">Tipo de dominio:<span class="note">*</span></label>
                <select name="tipo">
                    <option value="Propio">Propio (previamente registrado por mi)</option>
                    <option value="Nuevo">Nuevo</option>
                </select> 
                </p>
                    <p>
                    <label for="usuario">Dominio:<span class="note">*</span></label>
                    <input name="usuario" type="text" <?php if (mysql_num_rows($codigo) > 0) {
                       echo 'value="'.$row[Clientes].'"';
                    } ?>>
                </p>
                 <p>
                 <label for="usuario">Relacionar Web:<span class="note">*</span></label>
                    <select name="web">
                                    <option value="no" selected="">No asociar</option>
                                    <?php 
                                    $webs = mysql_query("SELECT idWeb, Nombre FROM tblWeb WHERE tblClientes_idClientes = '$_SESSION[id]'", $link) or die("Error buscando Webs".mysql_error());
                                    if (mysql_num_rows($webs) > 0) {
                                        while ($web=mysql_fetch_array($webs)) {
                                            echo ' <option value="'.$web[idWeb].'">'.$web[Nombre].'</option>';
                                        }
                                    }else{
                                        echo '<option value="no">No hay webs para asociar</option>';
                                    }
                                    ?>
                                </select>
                </p>
                <p>
                    <input class="button" value="Registrar" onclick="valida_actualizacion()" type="button">
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