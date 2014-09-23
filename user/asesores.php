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
    <!-- end JS -->
	<title>Zona Clientes</title>
</head>

<body>
<!-- begin container -->
<div id="wrap">
	<?php
        $seccion = "asesores";//para css de clase
        require_once('../includes/headerClientes.php');
        //include_once('clases/clase.insertaAsesor.php');
        if (isset($_GET[id])) {
            require_once('clases/clase.datos.php');
            $datos =  new Datos($_SESSION);
            $aDatos = $datos->datosAsesor($_GET['id']);
            $asesor = $aDatos['nombres'];
            $mod = true;
        }else{
             $asesor = "Nuevo Asesor";
        }
    ?>
        
    <!-- begin content -->
        <section id="content" class="container clearfix">
        	<!-- begin page header -->
             <header id="page-header">
                <h1 id="page-title">Registrar Asesor Inmobiliario</h1>
            </header>
            <form class="content-form" <?php  echo ($mod == true) ? 'id="modAsesores"' : 'id="asesores"' ; ?> method="post" action="procesa/formularios.php">
            <div class="one-half">
            <?php echo "<h2>$asesor</h2>"; ?>
            <p>
                <label for="name">Nombre:</label>
                <input id="nombres" type="text" name="nombres" <?php  echo ($mod == true) ? 'value="'.$aDatos[nombres].'"' : 'placeholder="Nombre"' ; ?>/>
            </p>
            <p>
                <label for="name">Apellido Paterno:</label>
                <input id="paterno" type="text" name="paterno" <?php  echo ($mod == true) ? 'value="'.$aDatos[paterno].'"' : 'placeholder="Apellido Paterno"' ; ?>/>
            </p>
            <p>
                <label for="name">Apellido Materno:</label>
                <input id="materno" type="text" name="materno" <?php  echo ($mod == true) ? 'value="'.$aDatos[materno].'"' : 'placeholder="Apellido Materno"' ; ?>/>
            </p>
           
            
            <?php if ($mod != true) { ?>
            <p>
                <label for="name">Email:</label>
                <input id="email" type="text" name="email" placeholder="Email"/>
            </p>
            <p>
                <label for="name">Confirmar Email:</label>
                <input id="cemail" type="text" name="cemail" placeholder="Email"/>
            </p>
             <?php } ?>
             <p>
                <label for="tel">Teléfono:</label>
                <input id="tel" type="text" name="tel" <?php  echo ($mod == true) ? 'value="'.$aDatos[tel].'"' : 'placeholder="Teléfono"' ; ?>/>
            </p>
            <p>
                <label for="cel">Celular:</label>
                <input id="cel" type="text" name="cel" <?php  echo ($mod == true) ? 'value="'.$aDatos[cel].'"' : 'placeholder="Celular"' ; ?>/>
            </p>
            <br><input type="hidden" name="action" <?php  echo ($mod == true) ? 'value="modAsesores"' : 'value="asesores"' ; ?>/>
            <input type="hidden" name="id" <?php echo 'value="'.$_SESSION[id].'"'; ?>>
            <?php if ($mod == true) { 
                    echo '<input type="hidden" name="idAsesor" value="'.$_GET[id].'">';
             } ?>
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
                <h2>¿Para que registrar un asesor inmobiliario?</h2>
                <p>Dentro del sistema un asesor inmobiliario puede ayudar a subir y administrar propiedades así como también prospectar compradores.</p>
                <h2>¿Como registro un asesor inmobiliario?</h2>
                <p>Para hacer el registro de un nuevo asesor, sólo realicé los siguientes pasos:</p>
                <p>1.- Capture los datos del asesor.</p>
                <p>2.- Una vez que se guarden los datos, el sistema envía un email de confirmación a la cuenta de correo que fue registrada.</p>
                <p>3.-  El asesor debe entrar a su cuenta de correo y dar clic en la liga para confirmar su registro.</p>
                <p>4.- Terminado esto, el asesor podrá iniciar sesión en el sistema y subir propiedades</p>
                <h2 style="font-size:2em ">Nota importante.</h2>
                <p>Los asesores inmobiliarios tienen menos privilegios que el cliente administrador y hay un número límite de asesores que el sistema permite cargar, esto depende del paquete que usted adquirió.</p>
            </div> 
            </form>
            
        </section>
        <!-- end content -->             
	<!-- begin footer -->
	<?php include '../includes/footerClientes.php'; ?>
	<!-- end footer -->
</div>
<!-- end container -->
</body>
</html>