<?php 
session_start();
session_destroy();
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
    <link href="style.css" type="text/css" rel="stylesheet" id="main-style"/>
    <!--[if IE]> <link href="css/ie.css" type="text/css" rel="stylesheet"> <![endif]-->
    <link href="css/colors/orange.css" type="text/css" rel="stylesheet" id="color-style"/>
    <link href="css/calendario.css" type="text/css" rel="stylesheet" id="color-style"/>
    <!-- end CSS -->
    
    <link href="images/favicon.ico" type="image/x-icon" rel="shortcut icon"/>
    
    <!-- begin JS -->
    <script src="js/jquery-1.7.2.min.js" type="text/javascript"></script> <!-- jQuery -->
    <script src="js/ie.js" type="text/javascript"></script> <!-- IE detection -->
    <script src="js/jquery.easing.1.3.js" type="text/javascript"></script> <!-- jQuery easing -->
    <script src="js/modernizr.custom.js" type="text/javascript"></script> <!-- Modernizr -->
    <!--[if IE 8]><script src="../js/respond.min.js" type="text/javascript"></script><![endif]--> <!-- Respond -->
    <script src="js/jquery.polyglot.language.switcher.js" type="text/javascript"></script> <!-- language switcher -->
    <script src="js/ddlevelsmenu.js" type="text/javascript"></script> <!-- drop-down menu -->
    <script type="text/javascript"> <!-- drop-down menu -->
        ddlevelsmenu.setup("nav", "topbar");
    </script>
    <script src="js/tinynav.min.js" type="text/javascript"></script> <!-- tiny nav -->
    <script src="js/jquery.ui.totop.min.js" type="text/javascript"></script> <!-- scroll to top -->
    <script src="js/jquery-ui-1.8.21.custom.min.js" type="text/javascript"></script> <!-- tabs, toggles, accordion -->
    <script src="js/jquery.tweet.js" type="text/javascript"></script> <!-- Twitter widget -->
    <script src="js/jquery.touchSwipe.min.js" type="text/javascript"></script> <!-- touchSwipe -->
    <script src="js/custom.js" type="text/javascript"></script> <!-- jQuery initialization -->
    <script src="js/jquery.validate.min.js" type="text/javascript"></script> <!-- form validation -->
    <script src="js/validacion.js" type="text/javascript"></script> <!-- form validation -->
    <!-- end JS -->
	<title>Zona Clientes</title>
</head>

<body>
<!-- begin container -->
<div id="wrap">
	<?php 
        include('includes/header.php');
    ?>
        
    <!-- begin content -->
        <section id="content" class="container clearfix">
        	<!-- begin page header -->
             <header id="page-header">
                <h1 id="page-title">Entrar a Zona Clientes</h1>
            </header>
            <div class="tabs ui-tabs ui-widget ui-widget-content ui-corner-all">
                    <ul class="nav clearfix ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
                        <li class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active"><a href="#tab-1">Entrar</a></li>
                        <li class="ui-state-default ui-corner-top"><a href="#tab-2">Registrarme</a></li>
                    </ul>
                    <div id="tab-1" class="tab ui-tabs-panel ui-widget-content ui-corner-bottom">
                    <h2>Entrar al sistema Yet!</h2>
                    <p>Ingrese al sistema, si no puede recordar su contraseña de clic <a href="olvido.php">aquí.</a></p>
                    <form class="content-form" name="login" id="login" method="post" action="actions/procesa.php">
                <p>
                    <label for="name">Email:</label>
                    <input id="name" type="text" name="email"/>
                </p>
                <p>
                    <label for="url">Contraseña:</label>
                    <input id="url" type="password" name="psw" />
                </p>
                <p>
                    <input type="hidden" name="action" value="logueo">
                    <input class="button" type="submit" value="Ingresar" />
                </p>
                <div id="alertaLogin"style="display:none"></div>
            </form>
             <div class="notification-box notification-box-error" style="display:none" id="respuestaLogin">
                            <p id="msj_log">Usuario o password incorrecto, intentelo otra vez</p>
                            <a href="#" class="notification-close notification-close-error">x</a>
                        </div>
                    </div>
                    <!--http://localhost/yet/zona.php#tab-2-->
                    <div id="tab-2" class="tab ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide">
                        <h2>Registrar mis datos</h2>
                    <p>Todos los campos son obligatorios.</p>
                    <form class="content-form" name="registro" id="registro" method="post" action="actions/procesa.php" >
                    <input type="hidden" name="tipo" value="nvo">
                    <p>
                    <label for="nombre">Nombre:<span class="note">*</span></label>
                    <input type="text" name="nombre">              
                    <label for="paterno">Apellido Paterno:<span class="note">*</span></label>
                    <input type="text" name="paterno">
                </p>
                <p>
                    <label for="paterno">Apellido Materno:<span class="note">*</span></label>
                    <input type="text" name="materno">
                </p>
                 <p>
                    <label for="email">Email:<span class="note">*</span></label>
                    <input type="text" name="mail" id="mail"/>
                </p>
                 <p>
                    <label for="email">Confirmar email:<span class="note">*</span></label>
                    <input type="text" name="cemail"> 
                </p>
                 <p>
                    <label for="psw">Contraseña:<span class="note">*</span></label>
                    <input type="password" name="psw" id="psw"/>
                </p>
                 <p>
                    <label for="cspw">Confirmar contraseña:<span class="note">*</span></label>
                    <input type="password" name="cpsw"/>
                </p>
                 <p>
                    <label for="ingreso">Fecha de nacimiento:<span class="note">*</span></label>
                    <input type="text" name="ingreso" id="ingreso"/>
                <p>
                    <input type="hidden" name="action" value="insertaUsuario">
                    <input class="button" type="submit" value="Registrar"/>
                </p>
                <div id="alertaRegistro" style="display:none">
                </div>
            </form>
            <div class="notification-box notification-box-error" style="display:none" id="respuestaAltaFalso">
                            <p id="msj_err"></p>
                            <a href="#" class="notification-close notification-close-error">x</a>
                        </div>
                        <div class="notification-box notification-box-success" style="display:none" id="respuestaAltaV">
                            <p id="msj_suc"></p>
                            <a href="#" class="notification-close notification-close-error">x</a>
                        </div>
                    </div>
                </div>

            <!-- end sidebar -->
           
            <!-- end main content -->
        </section>
        <!-- end content -->             
    
	<!-- begin footer -->
	<?php include 'includes/footer.php' ?>
	<!-- end footer -->
</div>
<!-- end container -->

</body>
</html>