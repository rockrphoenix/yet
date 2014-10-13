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
        $codigo=mysql_query("SELECT DISTINCT tblClientes.Clientes, tblClientes.Email, tblDatos.Nombres, tblDatos.ApellidoPaterno, tblDatos.ApellidoMaterno, tblDatos.Edad, tblDatos.Tel, tblDatos.Cel, tblUbicacion.Calle, tblUbicacion.Num, tblUbicacion.Ext, tblUbicacion.Colonia, tblUbicacion.Municipio, tblUbicacion.Ciudad, tblUbicacion.Estado, tblUbicacion.Cp FROM tblClientes, tblDatos, tblUbicacion WHERE tblClientes.idClientes = '$_SESSION[id]' AND tblClientes.tblDatos_idDatos=tblDatos.idDatos AND tblClientes.tblUbicacion_idUbicacion = tblUbicacion.IdUbicacion");
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
            
                        <h2>Reportar Error</h2>
                        <p>Respuesta al siguiente día hábil.</p>
                    <form class="content-form" name="actualiza" id="actualiza" method="post" action="../actions/actualizaPerfil.php">
                    <p>
                    <label for="usuario">Título:<span class="note">*</span></label>
                    <input name="usuario" type="text">
                </p>
                 <p>
                    <label for="mail">Problema:<span class="note">*</span></label>
                    <textarea name="problema"></textarea>
                </p>
                <p>
                    <input class="button" value="Registrar" onclick="valida_actualizacion()" type="button">
                </p>
            </form>

                <table class="gen-table">
                    <caption>
                    <a href="fomularioDominio.php">Capturar nueva Web</a>
                    </caption>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Detalle</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td colspan="4">Table Footer</td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                        <td colspan="4">No hay ninguna web activa</td>                            
                        </tr>
                    </tbody>
                </table>    

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