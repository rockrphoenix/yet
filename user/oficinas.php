<?php 
require_once('../clases/class.logueo.php');

$valida= new Logueo();
$valida->validaSesion();

if (isset($_GET['id'])) {
    $id=$_GET['id'];
    require_once("clases/class.muestraOficina.php");
    $encontradas= new muestraOficina($_POST);
    $arrayOficinas=$encontradas->paraEditar();
    $oficinas=$arrayOficinas->fetch_array(MYSQL_ASSOC);
    $accion="modoficina";
}else{
    $accion="oficina";
}
?>
<!DOCTYPE HTML>
<!--[if IE 8]> <html class="ie8 no-js"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <!-- begin meta -->
    <meta charset="utf-8">
    <meta name="author" content="Marco Izaguirre">
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
    <script src="../js/validaOficina.js" type="text/javascript"></script> <!-- form validation -->
    <!-- end JS -->
	<title>Zona Clientes</title>
</head>

<body>
<!-- begin container -->
<div id="wrap">

	<?php
        $seccion = "oficinas";
        include_once('../includes/headerClientes.php');
        //include_once('clases/clase.insertaAsesor.php');
        $asesor = $oficinas['nombre'];
    ?>
        
    <!-- begin content -->
        <section id="content" class="container clearfix">
        	<!-- begin page header -->
             <header id="page-header">
                <h1 id="page-title">Oficinas</h1>
            </header>
            <form class="content-form" id="oficina" name="oficina" method="post" action="procesa/formularios.php">
            <div class="one-half">
            <?php echo "<h2>".$asesor."</h2>"; ?>
            
            <p>
                <label for="nombre">Nombre de la oficina:</label>
                <input id="nombre" type="text" name="nombre" value='<?php echo $oficinas['nombre']?>'>
            </p>
            <p><label>Dirección: </label></p>
            <p><label for="calle">Calle: <span class="note">*</span></label><input type="text" name="calle" value='<?php echo $oficinas['calle']?>'></p>
            <p><label for="numero">Número: <span class="note">*</span></label><input type="text" name="numero" value='<?php echo $oficinas['numero']?>'></p>
            <p><label for="no_interior">Número interior: </label><input type="text" name="no_interior" value='<?php echo $oficinas['no_int']?>'></p>  
            <p><label for="colonia">Colonia: <span class="note">*</span></label><input type="text" name="colonia" value='<?php echo $oficinas['colonia']?>'></p>
            <p><label for="delegación">Delegación/municpio: <span class="note">*</span></label><input type="text" name="delegacion" value='<?php echo $oficinas['delegacion']?>'></p>
            <p><label for="estado">Estado: <span class="note">*</span></label><input type="text" name="estado" value='<?php echo $oficinas['estado']?>'></p>
            <p><label for="ciudad">Ciudad: <span class="note">*</span></label><input type="text" name="ciudad" value='<?php echo $oficinas['ciudad']?>'></p>
            <p><label for="telefono">Teléfono: <span class="note">*</span></label><input type="text" name="telefono" value='<?php echo $oficinas['telefono']?>'></p>
            <input type="hidden" name="id_mod" <?php echo 'value="'.$_GET['id'].'"' ?>>
            <input type="hidden" name="id" <?php echo 'value="'.$_SESSION['id'].'"' ?>>
            <br><input type="hidden" name="action" <?php echo "value='$accion'" ?>>
            <p><input class="button" type="submit" value="Guardar"></p>

            <div class="notification-box notification-box-error" style="display:none" id="respuestaAltaFalso">
                            <p id="msj_err"></p>
                            <a href="#" class="notification-close notification-close-error">x</a>
                        </div>
                        <div class="notification-box notification-box-success" style="display:none" id="respuestaAltaV">
                            <p id="msj_suc"></p>
                            <a href="#" class="notification-close notification-close-error">x</a>
                        </div>
            </div>
             </form>

            <div class="one-half column-last">
                <h2>¿Para qué registrar una oficina?</h2>
                <p>Esto facilita el contacto con tus clientes de las diferentes localidades. Si a un cliente le interesa alguna de tus propiedades, al tener más oficinas registradas, le permitirá saber qué oficina es la más cercana o  podrá elegir a cual contactar</p>
                <h2>¿Cómo registro una oficina?</h2>
                <p>Para hacer el registro de una oficina, sólo realicé los siguientes pasos:</p>
                <p>1.- Capture los datos solicitados de la oficina.</p>
                <p>2.- Una vez que se capturen los datos, dar clic en el botón Guardar.</p>
                <p>3.-  ¡Listo! La información de sus oficinas se reflejará en su página y podrá editarla desde el submenú Lista de oficinas.</p>
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