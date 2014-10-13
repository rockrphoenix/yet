<?php
require_once('../clases/class.logueo.php');

$valida= new Logueo();
$valida->validaSesion();

require_once("clases/clase.datos.php");
$data= new Datos($_SESSION);
$arrayData=$data->editAsoc();
$datos=$arrayData->fetch_array(MYSQL_ASSOC);

if (isset($datos)) { 
    $accion="edasociaciones1";
}else{
    $accion="asociaciones1";
}
if (isset($datos)) { 
    $accion="edasociaciones2";
}else{
    $accion="asociaciones2";
}

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
    <script src="../js/colorpicker.js" type="text/javascript"></script><!--  Color Picker -->
    <script src="../js/eye.js" type="text/javascript"></script><!--  Color Picker -->
    <script src="../js/layout.js?ver=1.0.2" type="text/javascript"></script><!--  Color Picker -->
    <script src="../js/jquery.validate.min.js" type="text/javascript"></script> <!-- form validation -->
    <script src="../js/validaAsoc.js" type="text/javascript"></script> <!-- form validation -->
    
   
    <!-- end JS -->
	<title>Zona Clientes</title>
</head>
<body>
<!-- begin container -->
<div id="wrap">
    <?php
        $seccion = "pagina"; 
        require_once('../includes/headerClientes.php');   


    ?>
        
    <!-- begin content -->
        <section id="content" class="container clearfix">
            <!-- begin page header -->
             <header id="page-header">
                <h1 id="page-title">Asociaciones</h1>
            </header>
            <!--<form class="content-form" id="red_soc" name="red_soc" method="post" action="procesa/formularios.php">-->
            <form class="content-form" id="asoci1" name="asoci1" method="post" action="procesa/formularios.php">
                    <div class="one-half">

                    <h2>Agregar nueva asociación</h2>
                    <h3>Puede seleccionar alguna de las asociaciones abajo mencionadas</h3>
                    <table class="gen-table">
                        <thead><tr><th>Título</th><th>Url</th><th>Imagen</th><th>Selección</th></tr></thead>
                        <tfoot></tfoot>
                        <tbody>
                            <tr><td>AMPI - Asociación Mexicana de Profesionales Inmobiliarios</td><td>http://www.ampi.org/</td><td><a href="http://www.ampi.org/" target="_blank"><img src="images/asociaciones/ampi.jpg" alt="AMPI" style="height:50px; width:50px;"></a></td><td><input type="checkbox" name="ampi" value="1" ></td></tr>
                            <tr><td>Consejo Nacional de Normalización y Certificación de Competencias Laborales</td><td>http://www.conocer.gob.mx/</td><td><a href="http://www.conocer.gob.mx/" target="_blank"><img src="images/asociaciones/conocer.jpg" alt="CONOCER" style="height:50px; width:50px;"></a></td><td><input type="checkbox" name="conocer" value="1" ></td></tr>
                            <tr><td>Confederación Patronal de la República Mexicana</td><td>http://www.coparmexdf.org.mx/</td><td><a href="http://www.coparmexdf.org.mx/" target="_blank"><img src="images/asociaciones/coparmex.png" alt="COPARMEX" style="height:50px; width:50px;"></a></td><td><input type="checkbox" name="coparmex" value="1" ></td></tr>
                            <tr><td>National Association of Realtors</td><td>http://www.realtor.org/</td><td><a href="http://www.realtor.org/" target="_blank"><img src="images/asociaciones/realtor.png" alt="NAR" style="height:50px; width:50px;"></a></td><td><input type="checkbox" name="nar" value="1" ></td></tr>
                        </tbody>

                    </table><br>

                    <input type="hidden" name="idcli" <?php echo 'value="'.$_SESSION['id'].'"'; ?>>
                    <input type="hidden" name="id" <?php echo 'value="'.$_GET['id'].'"'; ?>>
                    <input type="hidden" name="idasoc" <?php echo "value='".$datos['idasoc']."'"?>>
                    <br><input type="hidden" name="action" <?php echo "value='$accion'"; ?>>
                    <p><input class="button" type="submit" value="Guardar"></p>

                    <div id="alertaRegistro" style="display:none"></div>
                    <div class="notification-box notification-box-error" style="display:none" id="respuestaAltaFalso">
                                    <p id="msj_err"></p>
                                    <a href="#" class="notification-close notification-close-error">x</a>
                                </div>
                                <div class="notification-box notification-box-success" style="display:none" id="respuestaAltaV">
                                    <p id="msj_suc"></p>
                                    <a href="#" class="notification-close notification-close-error">x</a>
                                </div>
                    </div>

                    <div class="one-half column-last">
                       <h2>¿Para qué agregar asociaciones a mi inmobiliaria?</h2>
                        <p>Si eres miembro de alguna asociación o cuentas con alguna certificación, puedes agregarla en tu página. Esto dará mayor reconocimiento y prestigio a tu inmobiliaria, y más seguridad y confianza a tus clientes.</p>
                        
                        <h2>¿Cómo configuro esto en mi página?</h2>
                        <p>Sólo necesitas seleccionar la institución del listado de la izquierda y dar clic en Guardar.</p>
                        <p>Si no se encuentra en el listado, captura la información en el formulario de abajo. Escribe el nombre, pega la Url desde tu navegador de internet y sube la imagen de la asociación. Por último da clic en Guardar</p>
                        
                    </div>
            </form>

            <form class="content-form" id="asoci2" name="asoci2" method="post" action="procesa/formularios.php">
                    <div class="one-half">

                    

                    <h3>o bíen si no existe su asociación en el listado anterior, puede capturar una nueva en el siguiente formulario</h3>
                    <p><label for="titulo">Título: </label><input type="text" id="titulo" name="titulo" <?php echo "value='".$datos['titulo']."'"?>></p>

                    <p><label for="url">Url: </label><input type="text" id="url" name="url" <?php echo "value='".$datos['url']."'"?>></p>

                    <p><label for="imagen">Imagen: </label><input type="file" id="imgasoc" name="imgasoc"></p>
                    
                    <input type="hidden" name="idcli2" <?php echo 'value="'.$_SESSION['id'].'"'; ?>>
                    <input type="hidden" name="idas1" <?php echo 'value="'.$_GET['idas'].'"'; ?>>
                    <input type="hidden" name="idas2" <?php echo "value='".$datos['idasoc']."'"?>>
                    <br><input type="hidden" name="action" <?php echo "value='$accion'"; ?>>
                    <p><input class="button" type="submit" value="Guardar"></p>

                    <div id="alertaRegistro2" style="display:none"></div>
                    <div class="notification-box notification-box-error" style="display:none" id="respuestaAltaFalso2">
                                    <p id="msj_err2"></p>
                                    <a href="#" class="notification-close notification-close-error">x</a>
                                </div>
                                <div class="notification-box notification-box-success" style="display:none" id="respuestaAltaV2">
                                    <p id="msj_suc2"></p>
                                    <a href="#" class="notification-close notification-close-error">x</a>
                                </div>
                    </div>

                    <div class="one-half column-last">
                        
                    </div>
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