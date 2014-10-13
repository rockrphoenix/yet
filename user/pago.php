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
    <link href="../css/estilo_m.css" type="text/css" rel="stylesheet" id="main-style"/>
    <!--[if IE]> <link href="css/ie.css" type="text/css" rel="stylesheet"> <![endif]-->
    <link href="../css/colors/orange.css" type="text/css" rel="stylesheet" id="color-style"/>
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
    
    
    <script src="../js/imprime.js" type="text/javascript"></script><!-- Muestra/oculta información en la contratación de paquetes -->
    <!-- end JS -->
	<title>Zona Clientes</title>
</head>

<body>
<!-- begin container -->
<div id="wrap">
	<?php
        include_once('../includes/headerPaquete.php');
        require_once('clases/clase.pago.php');
        $paquete = new Pago($_GET[id], $_GET[periodo]);
        $datosPaquete = $paquete->operaciones();
        $user = "usuario";
        $registro = $paquete->registraPaquete();
    ?>
        
    <!-- begin content -->
        <section id="content" class="container clearfix">
        <?php if ($registro!=false){ ?>
        	<!-- begin page header -->
             <header id="page-header">
                <h1 id="page-title">Bienvenido <?php echo $user ?></h1>
            </header>

            <div class="one-third">
               <img src="images/success_baby.jpg" style="width:100%">
            </div>
            <div class="two-thirds column-last" id="imprime">
            <h2 class="encabezado">¡Gracias por contratar un paquete!</h2>
            <p>Ahora es necesario que realice el pago correspondiente a los siguientes datos:</p>
            <img src="images/banco_santander.jpg" width="200">
            <h4>Banco Santander</h4>
            <h5>Nombre: <b>GRUPO VYOSSE S.A. DE C.V.</b></h5>
            <h5>Número de Cuenta: <b>65-50443326-0</b></h5>
            <h5>CLABE: <b>014180655044332600</b></h5>
            <h5>Cantidad: <b>$<?php echo round($datosPaquete[neto]); ?></b></h5>
            <button class="button red" onclick="imprimir()">Imprimir</button>
            <p>Una vez confirmado el pago podrá utilizar el sistema, vuelva pronto.</p>
            
            </div>
            </div>
        <?php }else{ ?>
            <div class="notification-box notification-box-error">
                <p>No puede registrarse el paquete, por favor contacte a su agente Yet.</p>
                <a href="#" class="notification-close notification-close-error">x</a>
            </div>
        <?php } ?>
        </section>
        <!-- end content -->             
	<!-- begin footer -->
	<?php include '../includes/footer.php' ?>
	<!-- end footer -->
</div>
<!-- end container -->
</body>
</html>