<?php 
require_once('../clases/class.logueo.php');

$valida= new Logueo();
$valida->validaSesion();
require_once("clases/class.muestraOficina.php");
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
    <link href="../css/calendario.css" type="text/css" rel="stylesheet" id="color-style"/>
    <!-- end CSS -->
    
    <link href="../images/favicon.ico" type="image/x-icon" rel="shortcut icon"/>
    
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
    <script src="../js/jquery.validate.min.js" type="text/javascript"></script> <!-- form validation -->
    <script src="../js/validacion.js" type="text/javascript"></script> <!-- form validation -->
    
    <!-- end JS -->
	<title>Zona Clientes</title>
</head>
    <body>
    <!-- begin container -->
    <div id="wrap">
        <?php
            $seccion = "oficinas";
            require_once('../includes/headerClientes.php');
        ?>
            
        <!-- begin content -->
            <section id="content" class="container clearfix">
                <!-- begin page header -->
                 <header id="page-header">
                    <h1 id="page-title">Listado de oficinas</h1>
                </header>
                <div id="list_ofice">
                    <table class="gen-table">
                    <caption>
                        Oficinas
                    </caption>
                    <thead>
                        <tr>
                            <th>No. de oficina</th>
                            <th>Nombre</th>
<<<<<<< HEAD
                            <th>Descripción</th>
=======
                            <th>Calle</th>
                            <th>Numero</th>
>>>>>>> 1f22693d82efdd027128b4a534fecb9d8f3230a5
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td colspan="5"></td>
                        </tr>
                    </tfoot>
                    <tbody>
                <?php 
                $encontradas= new muestraOficina($_POST);
                $arrayOficinas=$encontradas->mostrarOficina();
                while ($oficinas=$arrayOficinas->fetch_array(MYSQL_ASSOC)) {
                 $oficina .="<tr>
                            <td>".$oficinas['idoficina']."</td>
                            <td>".$oficinas['nombre']."</td>
<<<<<<< HEAD
                            <td>".$oficinas['descripcion']."</td>
                            <td><div>
                                    <div style='width:50%; display:inline-block'><a href='oficinas.php?id=".$oficinas['idoficina']."'>Editar</a></div><div style='width:50%; display:inline-block'><a href='ocultaOficina.php?id=".$oficinas['idoficina']."'>Borrar</a></div>
=======
                            <td>".$oficinas['calle']."</td>
                            <td>".$oficinas['numero']."</td>
                            <td><div>
                                    <div style='width:33%; display:inline-block'><a href='#''>Ver</a></div><div style='width:33%; display:inline-block'><a href='oficinas.php?id=".$oficinas['idoficina']."'>Editar</a></div><div style='width:33%; display:inline-block'><a href='ocultaOficina.php?id=".$oficinas['idoficina']."'>Borrar</a></div>
>>>>>>> 1f22693d82efdd027128b4a534fecb9d8f3230a5
                            </div></td>
                        </tr>";
                 }
                 echo $oficina;
                 ?>
                   
                       
                    </tbody>
                </table>
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