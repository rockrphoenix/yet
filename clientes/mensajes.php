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
    <script type="text/javascript">
    function calcula(){
        var monto = document.getElementById('monto').value;
        var valor = monto.substring(monto.indexOf('$')+1, monto.indexOf('.00'));
        var entero = parseInt(valor);
        var iva = valor * 0.16;
        var total = entero+iva;
        //alert(total);
        document.getElementById('muestra').innerHTML = 'El costo total del paquete más IVA es de $'+total+'.00';
        document.getElementById('confirma')
        document.getElementById("confirma").style.display="inherit";
        document.getElementById("form_confirma").innerHTML='<input type="hidden" name="paq" value="'+document.getElementById('paq').value+'"><input type="hidden" name="periodo" value="'+entero+'"><input type="submit" class="button large" value="Confirmar compra">';
    }
    </script>
    <!-- end JS -->
	<title>Zona Clientes</title>
</head>

<body>
<!-- begin container -->
<div id="wrap">
	<?php 
        include('../includes/headerClientes.php');
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
            <?php
            if ($_REQUEST[monto]) {
                echo '
                    <div class="notification-box notification-box-success">
                    <p>El plan se regitró con éxito.</p>
                    <a href="#" class="notification-close notification-close-success">x</a>
            </div>
            <h2>Gracias por registrar un plan con nosotros</h2>
            <p>El siguiente paso es realizar el pago en Banamex con los siguiente datos:</p>
            <p><img src="../images/logo_banamex.jpg"></p>
            <p><strong>Número de Cuenta:</strong> 99999999999</p>
            <p><strong>A nombre:</strong>Yet! Inmobiliario</p>
            <p><strong>Monto:</strong> $'.$_REQUEST[monto].'.00</p>
            <p>Una vez hecho el depósito, la confirmación puede demorar como máximo 2 días hábiles.</p>
                ';
            }else{
                echo '
                    <div class="notification-box notification-box-error">
                    <p>Hubo un error, inténtelo de nuevo más tarde.</p>
                    <a href="#" class="notification-close notification-close-success">x</a>
            </div>';
            }
            ?>
            

            </div>

            <!-- end sidebar -->
           
            <!-- end main content -->
        </section>
        <!-- end content -->             
    
	<!-- begin footer -->
	<?php include '../includes/footerClientes.php' ?>
	<!-- end footer -->
</div>
<!-- end container -->

</body>
</html>