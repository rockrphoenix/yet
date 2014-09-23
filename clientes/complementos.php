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
        var periodo = monto.substring(0, monto.indexOf('$')-1);
        alert(periodo);
        var valor = monto.substring(monto.indexOf('$')+1);
        var entero = parseInt(valor);
        var iva = valor * 0.16;
        var total = entero+iva;
        //alert(total);
        document.getElementById('muestra').innerHTML = 'El costo total del paquete más IVA es de $'+total;
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
        require_once('../actions/conexion.php');
        if(isset($_REQUEST[id])){
            $codigo=mysql_query("SELECT Paquete, Vigencia FROM tblPaquetes where tblClientes_idClientes = '$_SESSION[id]' and Estatus = '1'", $link)or die('Error buscando complementos'.mysql_error());
            if (mysql_num_rows($codigo)>0) {
                while ($cod = mysql_fetch_array($codigo)) {
                    $Vigencia = $cod[Vigencia];
                    
                    $Paquete = $cod[Paquete];
                }

                $Vigencia = substr($Vigencia, 0, strpos($Vigencia, ':')-3);
                $FechaActual = date("Y-m-d");

               function dias_transcurridos($fecha_i,$fecha_f)
                {
                    $dias   = (strtotime($fecha_i)-strtotime($fecha_f))/86400;
                    $dias   = abs($dias); $dias = floor($dias);
                    $meses = floor($dias/30.41);    
                    return $meses;
                }
                // Ejemplo de uso:
                $difMeses = dias_transcurridos($Vigencia,$FechaActual);
                // Salida : 17

                $paquete = mysql_query("SELECT * FROM catPaquetes where idPaquete = '$_REQUEST[id]'", $link) or die("Problemas seleccionando del catalogo de paquetes".mysql_error());
                $p = mysql_fetch_array($paquete);

                $costo = $p[CostoMen]*$difMeses;

                $paq = TRUE;
            }
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
            <div class="two-thirds column-last">
            <h2>Complementos</h2>
                <p>El costo de tu complemento es de $
                <?php
                echo $costo;
                ?>
                <a class="button green" href="complemento.php?id='.$row[idPaquete].'">Seleccionar</a>
                </p>
            </div>

            <!-- end sidebar -->
           
            <!-- end main content -->
        </section>
        <!-- end content -->             
    
	<!-- begin footer -->
	<?php include '../includes/footerClientes.php'; mysql_close($link); ?>
	<!-- end footer -->
</div>
<!-- end container -->

</body>
</html>