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
    <script src="../js/jquery.validate.min.js" type="text/javascript"></script> <!-- form validation -->
    <script src="../js/validaAsesores.js" type="text/javascript"></script> <!-- form validation -->
    <script src="../js/colorpicker.js" type="text/javascript"></script><!--  Color Picker -->
    <script src="../js/eye.js" type="text/javascript"></script><!--  Color Picker -->
    <script src="../js/layout.js?ver=1.0.2" type="text/javascript"></script><!--  Color Picker -->
    <!-- end JS -->
	<title>Zona Clientes</title>
</head>

<body>
<!-- begin container -->
<div id="wrap">
	<?php
        $seccion = "estado";
        include_once('../includes/headerClientes.php');
        //include_once('clases/clase.insertaAsesor.php');
        $asesor = "Reportar problemas";
    ?>
        
    <!-- begin content -->
        <section id="content" class="container clearfix">
        	<!-- begin page header -->
             <header id="page-header">
                <h1 id="page-title">Soporte</h1>
            </header>
            <table class="gen-table pricing-table responsive">
                    <thead>
                        <tr>
                            <th class="empty-left-top" style="width:50%;">&nbsp;</th>
                            <th class="featured">
                                <span class="title">Inicial</span>
                            </th>
                        </tr>
                    </thead>
                <tfoot>
                    <tr>
                        <td class="empty-left-bottom">&nbsp;</td>
                        <form method="post" action="ordenar.php">
                        <input type="hidden" name="paquete" value="P4qu3t301">
                        <td><input type="submit" value="Ordenar" class="button"></td>
                        </form>
                    </tr>
                </tfoot>
                <tbody>
                        <tr>
                            <th>Número de administradores</th>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>Número de asesores inmobiliarios</th>
                            <td>3</td>
                        </tr>
                        <tr class="odd">
                            <th>Cuentas de correo electrónico</th>
                            <td>5</td>
                        </tr>

                        <tr>
                            <th>Secciones en página web</th>
                            <td>4</td>
                        </tr>
                        <tr>
                            <th>Publicación de propiedades</th>
                            <td>ilimitada</td>
                        </tr>
                        
                        <tr class="odd">
                            <th>Dominio (.com o .com.mx) </th>
                            <td>&nbsp; Incluido</span></td>
                        </tr>
                        <tr class="odd">
                            <th>Publicación automática en portales aliados</th>
                            <td><span class="check">&nbsp;</span></td>
                        </tr>
                        <tr class="row-last">
                            <th>Pago Trimestral</th>
                            <td>$1,800 más iva</td>
                        </tr>
                         <tr class="row-last">
                            <th>Pago Semestral</th>
                            <td>$3,100 más iva</td>
                        </tr>
                        <tr class="row-last">
                            <th>Pago Anual</th>
                            <td>$5,500 más iva</td>
                        </tr>
                    </tbody>
                </table>
            
        </section>
        <!-- end content -->             
	<!-- begin footer -->
	<?php include '../includes/footerClientes.php' ?>
	<!-- end footer -->
</div>
<!-- end container -->
</body>
</html>