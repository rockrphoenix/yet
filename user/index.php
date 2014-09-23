<?php
require_once('../clases/class.logueo.php');
$valida= new Logueo();
$estatus = $valida->validaSesion();
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
    <script src="../js/jquery.validate.min.js" type="text/javascript"></script> <!-- form validation -->
    <script src="../js/tinynav.min.js" type="text/javascript"></script> <!-- tiny nav -->
    <script src="../js/jquery.ui.totop.min.js" type="text/javascript"></script> <!-- scroll to top -->
    <script src="../js/jquery-ui-1.8.21.custom.min.js" type="text/javascript"></script> <!-- tabs, toggles, accordion -->
    <script src="../js/jquery.tweet.js" type="text/javascript"></script> <!-- Twitter widget -->
    <script src="../js/jquery.touchSwipe.min.js" type="text/javascript"></script> <!-- touchSwipe -->
    <script src="../js/custom.js" type="text/javascript"></script> <!-- jQuery initialization -->
    <script src="../js/validaModPass2.js" type="text/javascript"></script> <!-- form validation -->
    
    
    <script src="../js/contrata.js" type="text/javascript"></script><!-- Muestra/oculta información en la contratación de paquetes -->
    <!-- end JS -->
	<title>Zona Clientes</title>
</head>

<body>
<!-- begin container -->
<div id="wrap">
	<?php
        include_once("clases/clase.index.php");
        $seccion = "home";
        $muestra = new index($_SESSION);
        if ($estatus == 2) {
            include_once('../includes/headerClientes.php');
        }else if($estatus == 1 || $estatus == 9){
            include_once('../includes/headerPaquete.php');
        }else if($estatus == 3 || $estatus == 4){
            include_once('../includes/headerAsesores.php');
        }
        $user = $_SESSION['nombres'];
    ?>
        
    <!-- begin content -->
    <?php  if ($estatus == 1) { ?>
        <section id="content" class="container clearfix">
        	<!-- begin page header -->
             <header id="page-header">
                <h1 id="page-title">Bienvenido <?php echo $user ?></h1>
            </header>

            <div class="one-third">
               <img src="images/man_laptop.jpg" style="width:100%">
            </div>
            <div class="two-thirds column-last">
            <h2 class="encabezado">CONTRATA UN PAQUETE</h2>
            <p>Gracias por completar el registro, el siguiente paso para ocupar los beneficios del sistema es que usted contrate un paquete.</p>
            <h4>Por favor elija un paquete:</h4>
            <a class="button red" id="paquete">Paquete Básico</a>
            <table class="gen-table" id="tabla_basico">
                    <thead>
                        <tr>
                            <th>Trimestral</th>
                            <th>Semestral</th>
                            <th>Anual</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>$1,800</td>
                            <td>$3,100</td>
                            <td>$5,500</td>
                        </tr>
                        <tr>
                            <td> <a class="button red" id="tri">Contratar</a></td>
                            <td> <a class="button red" id="sem">Contratar</a></td>
                            <td> <a class="button red" id="anu">Contratar</a></td>
                        </tr>
                    </tbody>
                </table>
                <div id="total_basico_tri">
                    <h4>Total: $1,800</h4>
                    <h5>IVA: $288</h5>
                    <h4>Total Neto: $2,088</h4><a class="button red" <?php echo 'href="pago.php?id=1&periodo=t&iduser='.$_SESSION[id].'"'; ?>>Confirmar Compra</a>
                </div>
                <div id="total_basico_sem">
                    <h4>Total: $3,100</h4>
                    <h5>IVA: $496</h5>
                    <h4>Total Neto: $3,596</h4><a class="button red" <?php echo 'href="pago.php?id=1&periodo=s&iduser='.$_SESSION[id].'"'; ?>>Confirmar Compra</a>
                </div>
                <div id="total_basico_anu">
                    <h4>Total: $5,500</h4>
                    <h5>IVA: $880</h5>
                    <h4>Total Neto: $6,380</h4><a class="button red" <?php echo 'href="pago.php?id=1&periodo=a&iduser='.$_SESSION[id].'"'; ?>>Confirmar Compra</a>
                </div>
            </div>
            </div>
        </section>
        <?php }else if($estatus == 2){ ?>
        <section id="content" class="container clearfix">
            <!-- begin page header -->
             <header id="page-header">
                <h1 id="page-title">Hola de nuevo! <?php echo $user; ?></h1>
            </header>

            <div class="one-thirds">
                <table class="gen-table">
                    <thead>Resumen</thead>
                    <tfoot>
                        <tr>
                            <td colspan="4"></td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr><td>Propiedades activas</td><td><?php echo $muestra->cuentaPropiedades(); ?></td><td><div><a href="listProp.php"><img src="images/iconos/ok.png" style="display:inline" alt="Ver"><img src="images/iconos/edit.png" style="display:inline" alt="Ver"><img src="images/iconos/cancel.png" style="display:inline" alt="Ver"></a></div></td></tr>
                        <tr><td>Oficinas</td><td><?php echo $muestra->cuentaOficinas(); ?></td><td><div><a href="listOfice.php"><img src="images/iconos/ok.png" style="display:inline" alt="Ver"><img src="images/iconos/edit.png" style="display:inline" alt="Ver"><img src="images/iconos/cancel.png" style="display:inline" alt="Ver"></a></div></td></tr>
                        <tr><td>Asesores activos</td><td><?php echo $muestra->cuentaAsesores(); ?></td><td><div><a href="listAsesores.php"><img src="images/iconos/ok.png" style="display:inline" alt="Ver"><img src="images/iconos/edit.png" style="display:inline" alt="Ver"><img src="images/iconos/cancel.png" style="display:inline" alt="Ver"></a></div></td></tr>
                        <tr><td>Redes Sociales</td><td>2</div></td><td><div><a href="redesSoc.php"><img src="images/iconos/ok.png" style="display:inline" alt="Ver"><img src="images/iconos/edit.png" style="display:inline" alt="Ver"><img src="images/iconos/cancel.png" style="display:inline" alt="Ver"></a></div></td></tr>
                        <tr><td>Secciones</td><td>2</td><td><div><a href="listSecc.php"><img src="images/iconos/ok.png" style="display:inline" alt="Ver"><img src="images/iconos/edit.png" style="display:inline" alt="Ver"><img src="images/iconos/cancel.png" style="display:inline" alt="Ver"></a></div></td></tr>
                    </tbody>
                </table>

            </div>
        </section>
        <?php }else if($estatus == 9){ ?>
            <section id="content" class="container clearfix">
            <!-- begin page header -->
             <header id="page-header">
                <h1 id="page-title">Bienvenido <?php echo $user ?></h1>
            </header>

            <div class="one-third">
               <img src="images/man_laptop.jpg" style="width:100%">
            </div>
            <div class="two-thirds column-last">
            <h2 class="encabezado">Gracias!</h2>
            <p>Estamos confirmando tu pago, por favor sea paciente.</p>
        </section>
        <?php }else if($estatus == 3){ ?>
            <section id="content" class="container clearfix">
            <!-- begin page header -->
             <header id="page-header">
                <h1 id="page-title">Por favor modifica tu Contraseña</h1>
            </header>
                <form class="content-form" id="modPassAsesor" method="post" action="procesa/formularios.php">
                    <div class="one-half">
                    <h2>Ingrese su password</h2>
                    <input type="hidden" name="id" <?php echo 'value="'.$_SESSION[idasesor].'"'; ?>>
                    <p>
                        <label for="pswn">Ingrese nuevo password:<span class="note">*</span></label>
                        <input type="password" name="pswn" id="pswn"/>
                    </p>
                    <p>
                        <label for="cspwn">Confirmar nuevo password:<span class="note">*</span></label>
                        <input type="password" name="cpswn" id="cpswn"/>
                    </p>
                    
                    <input type="hidden" name="action" value="modPassAsesor" >
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
                        <h2>¿Como configuro los colores de mi página?</h2>
                        <p>Debes de elegir dos colores principales, estos colores aparecen en tu página de manera automática una vez que los guardas, el Color A es el color principal mientras que Color B aperece en menor medida.</p>
                        <p>Puedes ingresar el color de manera hexadecimal o en RGB o simplemente elegir el que más te guste al dar click en alguno de los campos del formulario.</p>
                    </div>
                </form>
            
        </section>
        <?php }else if($estatus == 4){ ?>
        <section id="content" class="container clearfix">
            <!-- begin page header -->
             <header id="page-header">
                <h1 id="page-title">Hola de nuevo! <?php echo $user; ?></h1>
            </header>

            <div class="one-thirds">
                <table class="gen-table">
                    <thead>Bienvenido</thead>
                    <tfoot>
                        <tr>
                            <td colspan="4">Ver más</td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr><td>Propiedades activas</td><td><?php echo $muestra->cuentaPropiedades(); ?></td><td><div><a href="listProp.php"><img src="images/iconos/ok.png" style="display:inline" alt="Ver"><img src="images/iconos/edit.png" style="display:inline" alt="Ver"><img src="images/iconos/cancel.png" style="display:inline" alt="Ver"></a></div></td></tr>
                    </tbody>
                </table>

            </div>
        </section>
        <?php } ?>
        <!-- end content -->             
	<!-- begin footer -->
	<?php include '../includes/footerClientes.php' ?>
	<!-- end footer -->
</div>
<!-- end container -->
</body>
</html>