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
    <!-- end JS -->
	<title>Zona Clientes</title>
</head>

<body>
<!-- begin container -->
<div id="wrap">
	<?php 
        include('../includes/headerClientes.php');
        require_once('../actions/conexion.php');
        $codigo=mysql_query("SELECT DISTINCT catPaquetes.Paquete, catPaquetes.Descripcion, tblPaquetes.Fecha, tblPaquetes.Vigencia FROM catPaquetes, tblPaquetes  WHERE tblPaquetes.tblClientes_idClientes = '$_SESSION[id]' AND catPaquetes.idPaquete=tblPaquetes.Paquete AND tblPaquetes.Estatus = '1' ORDER BY tblPaquetes.Fecha");
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
                <h2>Mis planes</h2>
                <table class="gen-table">
                    <caption>
                    Table Caption
                    </caption>
                    <thead>
                        <tr>
                            <th>Plan</th>
                            <th>Descripción</th>
                            <th>Vigente hasta</th>
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
                        <?php
                            if (mysql_num_rows($codigo) > 0) {
                                while ($row=mysql_fetch_array($codigo)) {
                                    $row[Vigencia]=substr($row[Vigencia], 0, 10);
                                    echo '
                                        <td>'.$row[Paquete].'</td>
                                        <td>'.$row[Descripcion].'</td>
                                        <td>'.$row[Vigencia].'</td>
                                        <td><a class="button green" href="#" style="margin:0;">Detalle</a></td>
                                    ';
                                }
                            }else{
                                echo '<td colspan="4">No tienen ningún plan contratado.</td>';
                            }
                        ?>
                            
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