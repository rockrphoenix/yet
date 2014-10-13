<?php
require_once('../clases/class.logueo.php');
require_once("clases/clase.datos.php");
$valida= new Logueo();
$estatus = $valida->validaSesion();
<<<<<<< HEAD
=======
$datos = new Datos($_SESSION);
$stringDatos = $datos->datosPropiedad();
>>>>>>> 1f22693d82efdd027128b4a534fecb9d8f3230a5
?>
<!DOCTYPE HTML>
<!--[if IE 8]> <html class="ie8 no-js"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <!-- begin meta -->
    <meta charset="utf-8">
<<<<<<< HEAD
=======
    <meta name="description" content="Finesse is a responsive business and portfolio theme carefully handcrafted using the latest technologies. It features a clean design, as well as extended functionality that will come in very handy.">
    <meta name="keywords" content="Finesse, responsive business portfolio theme, HTML5, CSS3, clean design">
    <meta name="author" content="Ixtendo">
>>>>>>> 1f22693d82efdd027128b4a534fecb9d8f3230a5
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- end meta -->
    
    <!-- begin CSS -->
    <link href="../style.css" type="text/css" rel="stylesheet" id="main-style"/>
    <!--[if IE]> <link href="css/ie.css" type="text/css" rel="stylesheet"> <![endif]-->
    <link href="../css/colors/orange.css" type="text/css" rel="stylesheet" id="color-style"/>
    <link href="../css/calendario.css" type="text/css" rel="stylesheet" id="color-style"/>
    <link href="../css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" id="color-style"/>
    <link href="../css/jquery.dataTables_themeroller.css" type="text/css" rel="stylesheet" id="color-style"/>
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
    <script src="../js/jquery.dataTables.min.js" type="text/javascript"></script> <!-- form validation -->
    <script src="../js/listProp.js" type="text/javascript"></script> <!-- form validation -->
    <!-- end JS -->
	<title>Zona Clientes</title>
</head>
    <body>
    <!-- begin container -->
    <div id="wrap">
    <?php
    $seccion = "prop";
        if ($estatus == 2) {
            include_once('../includes/headerClientes.php');
        }else if($estatus == 1 || $estatus == 9){
            include_once('../includes/headerPaquete.php');
        }else if($estatus == 3 || $estatus == 4){
            include_once('../includes/headerAsesores.php');
        }
        $user = $_SESSION['usuario'];
    ?>
            
        <!-- begin content -->
            <section id="content" class="container clearfix">
                <!-- begin page header -->
                 <header id="page-header">
                    <h1 id="page-title">Listado de propiedades</h1>
                </header>
<<<<<<< HEAD
                <div class="one-fourth" style="float:right">
                    <p style="float:right"><a href="procesa/exportaExcel.php" title="Exportar mis propiedades a Excel"><img src="../images/excel_icon.png" style="float:right"></a></p>
                </div>
=======
>>>>>>> 1f22693d82efdd027128b4a534fecb9d8f3230a5
                <div id="list_prop">
                   <table id="prop">
                    <caption>
                   Propiedades
                    </caption>
                    <thead>
                        <tr>
<<<<<<< HEAD
                            <th>Imagen</th>
=======
>>>>>>> 1f22693d82efdd027128b4a534fecb9d8f3230a5
                            <th>T&iacute;tulo</th>
                            <th>Operaci&oacute;n</th>
                            <th>Tipo</th>
                            <th>Estado</th>
                            <th>Municipio / Delegaci&oacute;n</th>
                            <th>Colonia</th>
                            <th>Precio</th>
                            <th>Clave de uso Interno</th>
<<<<<<< HEAD
                            <th>Activa</th>
=======
>>>>>>> 1f22693d82efdd027128b4a534fecb9d8f3230a5
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            include 'clases/class.listar.php'; 
                            $grid= new Listados();
                            $listado= $grid->Propiedades();
                            while($propiedad=$listado->fetch_array()){
                                echo "<tr>";
<<<<<<< HEAD
                                echo '<td><img src="http://imagenes.yetinmobiliario.com/'.$_SESSION[id].'/'.$propiedad[idPropiedad].'/principal.jpg?'.time().'" width="100"></td>';
=======
>>>>>>> 1f22693d82efdd027128b4a534fecb9d8f3230a5
                                echo "<td>".$propiedad['titulo']."</td>";
                                echo "<td>".$propiedad['idTipo']."</td>";
                                echo "<td>".$propiedad['LigaYouTube']."</td>";
                                echo "<td>".$propiedad['estado']."</td>";
                                echo "<td>".$propiedad['municipio']."</td>";
                                echo "<td>".$propiedad['colonia']."</td>";
<<<<<<< HEAD
                                echo ($propiedad['PrecioVenta'] == '0') ? "<td>$".number_format($propiedad['PrecioRenta'])."</td>" : "<td>$".number_format($propiedad['PrecioVenta'])."</td>" ;
                                echo "<td>".$propiedad['idPersonalizado']."</td>";
                                echo ($propiedad['publicacion'] == '1') ? '<td><img src="../images/activa.png"></td>' : '<td><img src="../images/oculta.png"></td>';
=======
                                echo "<td>".$propiedad['PrecioVenta']."</td>";
                                echo "<td>".$propiedad['idPersonalizado']."</td>";
>>>>>>> 1f22693d82efdd027128b4a534fecb9d8f3230a5
                                echo '<td><a href="propiedad.php?idpropiedad='.$propiedad['idPropiedad'].'">Editar</a> | <a href="borraPropiedad.php?idpropiedad='.$propiedad['idPropiedad'].'">Borrar</a></td>';
                                echo "</tr>";
                            }
                        
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