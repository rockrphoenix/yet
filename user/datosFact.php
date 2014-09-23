<?php 
require_once('../clases/class.logueo.php');

$valida= new Logueo();
$valida->validaSesion();


require_once("clases/clase.datos.php");
$encontradas= new Datos($_SESSION);
$arrayDatos=$encontradas->mostrarDatosFact();
$idUbi=$encontradas->datosUbicacion();

if ($arrayDatos == false) {
    $accion="datosFact";
}else{
    $accion="eddatosFact";
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
    <script src="../js/validaDatosFact.js" type="text/javascript"></script> <!-- form validation -->
    <!-- end JS -->
	<title>Zona Clientes</title>
</head>

<body>
<!-- begin container -->
<div id="wrap">

	<?php
        $seccion = "datosfact";
        include_once('../includes/headerClientes.php');
        
    ?>
        
    <!-- begin content -->
        <section id="content" class="container clearfix">
        	<!-- begin page header -->
             <header id="page-header">
                <h1 id="page-title">Datos de facturación</h1>
            </header>
            <form class="content-form" <?php echo "id='$accion'"; ?> <?php echo "name='$accion'"; ?> method="post" action="procesa/formularios.php">
            <div class="one-half">
            <?php echo "<h2>".$asesor."</h2>"; ?>
             <p>Los campos marcados con <span class="note">*</span> són obligatorios</p>
            <p>
                <label for="nombreRs">Nombre o razón social:<span class="note">*</span></label>
                <input id="nombreRs" type="text" name="nombreRs" <?php echo "value='$arrayDatos[nombrers]'"?>>
            </p>
             <p>
                <label for="rfc">RFC:<span class="note">*</span></label>
                <input id="rfc" type="text" name="rfc" <?php echo "value='$arrayDatos[rfc]'"?>>
            </p>
            <p><label>Dirección: </label></p>
            <p><label for="cp">C.P.: <span class="note">*</span></label><input type="text" name="cp" <?php echo "value='$arrayDatos[CP]'"?>></p>
            <p><label for="calle">Calle: <span class="note">*</span></label><input type="text" name="calle" <?php echo " value='$arrayDatos[Calle]'"?>></p>
            <p><label for="numero">Número: <span class="note">*</span></label><input type="text" name="numero" <?php echo "value='$arrayDatos[NumeroExterior]'"?>></p>
            <p><label for="no_interior">Número interior: </label><input type="text" name="no_interior" <?php echo "value='$arrayDatos[NumeroInterior]'"?>></p>  
            <p><label for="colonia">Colonia: <span class="note">*</span></label><input type="text" name="colonia"<?php echo " value='$arrayDatos[Colonia]'"?>></p>
            <p><label for="delegación">Delegación/municpio: <span class="note">*</span></label><input type="text" name="delegacion" <?php echo "value='$arrayDatos[Municipio]'"?>></p>
            <p><label for="estado">Estado: <span class="note">*</span></label><input type="text" name="estado" <?php echo "value='$arrayDatos[Estado]'"?>></p>
            <p><label for="ciudad">Ciudad: <span class="note">*</span></label><input type="text" name="ciudad" <?php echo "value='$arrayDatos[Ciudad]'"?>></p>
            <p><label>Contacto: </label></p>
            <p><label for="telefono">Teléfono: <span class="note">*</span></label><input type="text" name="telefono" <?php echo "value='$arrayDatos[tel]'"?>></p>
            <p><label for="mail">e-mail: <span class="note">*</span></label><input type="email" name="mail" <?php echo "value='$arrayDatos[email]'"?>></p>

            <p><input type="hidden" name="idcli" <?php echo 'value="'.$_SESSION[id].'"'; ?>></p>
            <p><input type="hidden" name="idubi" <?php echo 'value="'.$idUbi['idubicacion'].'"'; ?>></p>
           
            <br><input type='hidden' name='action' <?php echo "value='$accion'"; ?>>
            <p><input class='button' type='submit' value='Guardar'></p>
           

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
                <h2>¿Para qué proporcionar mis datos fiscales?</h2>
                <p>En caso en el que requieras facturar, te pedimos llenar el formulario de la izquierda, esto con el fin de    enviarte tu factura a tu correo electrónico. La información solicitada en el formulario es la que pide el SAT para expedir las facturas.</p> 
                <p>Si es que no lo  requieres, puedes omitir esta sección, ya que llenarla es opcional.</p>
                <h2>¿Es seguro proporcionar mis datos fiscales?</h2>
                <p>No te preocupes, tus datos fiscales serán tratados como información confidencial y serán utilizados únicamente para expedir tu(s) factura(s).</p>
                
                
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