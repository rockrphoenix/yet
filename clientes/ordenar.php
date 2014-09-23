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
    
    var formatoCosto = function (costo){
        var largo = costo.length;
        if (largo === 4) {
            first = costo.substring(0,1);
            second = costo.substring(2);
            costo = first+","+second;
        }
    };
    function calcula(){
        var costoMensual = 458.33;
        var periodo = document.getElementById('periodo').value;
        var total = document.getElementById('total').innerHTML;
        if (periodo === 'anual') {
            var preTotal =  costoMensual * 12;
            var iva = preTotal*0.16;
            var totalNeto = preTotal + iva;
            totalNeto = Math.round(totalNeto);
            document.getElementById('total').innerHTML = formatoCosto(Math.round(preTotal));
            document.getElementById('iva').innerHTML = Math.round(iva);
            document.getElementById('neto').innerHTML = totalNeto;
            var periodo = document.getElementById('periodo').value;
            document.getElementById('periodo2').value = periodo;
            document.getElementById('monto').value = totalNeto;
        }else if(periodo === 'semestral'){
            var semestralM = (costoMensual) + (costoMensual*0.16);
            var preTotal = semestralM*6;
            var iva = preTotal*0.16;
            var totalNeto = preTotal + iva;
            totalNeto = Math.round(totalNeto);
            document.getElementById('total').innerHTML = Math.round(preTotal);
            document.getElementById('iva').innerHTML = Math.round(iva);
            document.getElementById('neto').innerHTML = totalNeto;
            var periodo = document.getElementById('periodo').value;
            document.getElementById('periodo2').value = periodo;
            document.getElementById('monto').value = totalNeto;
        }else if(periodo === 'trimestral'){
            var semestralM = (costoMensual) + (costoMensual*0.31);
            var preTotal = semestralM*3;
            var iva = preTotal*0.16;
            var totalNeto = preTotal + iva;
            totalNeto = Math.round(totalNeto);
            document.getElementById('total').innerHTML = Math.round(preTotal);
            document.getElementById('iva').innerHTML = Math.round(iva);
            document.getElementById('neto').innerHTML = totalNeto;
            var periodo = document.getElementById('periodo').value;
            document.getElementById('periodo2').value = periodo;
            document.getElementById('monto').value = totalNeto;
        };
        
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
        require_once('../actions/conexion.php');
        if(isset($_REQUEST[paquete])){
            $codigo=mysql_query("SELECT idPaquete, Paquete, Descripcion, CostoMen FROM catPaquetes where idPaquete = '$_REQUEST[paquete]'");
            $cod = mysql_fetch_array($codigo);
            $paq = TRUE;
        }else{
            $paq = FALSE;
        }
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
            <div class="one-half">
            <h2>Paquete <?php echo $cod[Paquete]; ?></h2>
            <p><?php echo $cod[Descripcion]; ?></p>
            <p>

            <form class="content-form" name="cuenta" id="cuenta" method="post" action="actions/compra.php">
                    <input name="tipo" value="nvo" type="hidden">
                    <p>
                    <label for="nombre">Periodo:<span class="note">*</span></label>
                    <select name="periodo" onChange="calcula()" id="periodo">
                    <option value="null">Selecciona periodo</option>
                    <option value="anual">Anual</option>
                    <option value="semestral">Semestral</option>
                    <option value="trimestral">Trimestral</option>
                    </select>
                </p>
            </form>
                
                

            </div>
            <div class="one-fourth column-last">
            <div class="edo-cuenta">
            <h2>Resumen</h2>
            <p>Total: <h3>$<strong id="total">0</strong></h3></p>
            <p>IVA: <h3>$<strong id="iva">0</strong></h3></p>
            <p>Total Neto: <h3>$<strong id="neto">0</strong></h3></p>
            <form method="get" action="../actions/confirmaPedido.php">
            <input type="hidden" name="paquete" id="paquete" <?php echo 'value="'.$cod[idPaquete].'"'; ?>>
            <input type="hidden" name="monto" id="monto" value="">
            <input type="hidden" name="periodo2" id="periodo2" value="">
            <input type="submit" class="button green" value="Confirmar Compra">
            </form>
            </div>
            </div>

            <!-- end sidebar -->
           
            <!-- end main content -->
        </section>
        <!-- end content -->             
    
	<!-- begin footer -->
	<?php 
        include '../includes/footerClientes.php'; mysql_close($link);
    ?>
	<!-- end footer -->
</div>
<!-- end container -->

</body>
</html>