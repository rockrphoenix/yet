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
<<<<<<< HEAD
    <script src="js/valida_recuperacion.js" type="text/javascript"></script>--><!-- form recuperacion de contraseña-->
=======
    <!--<script src="js/valida_recuperacion.js" type="text/javascript"></script>--><!-- form recuperacion de contraseña-->
>>>>>>> 1f22693d82efdd027128b4a534fecb9d8f3230a5
 <script type="text/javascript">

window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=

d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.

_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');

$.src='//v2.zopim.com/?2NpTDdxt9PlBso0yuLgHlRpi3b5HK4Y6';z.t=+new Date;$.

type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');

</script>
<script>

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

 

  ga('create', 'UA-54256293-1', 'auto');

  ga('send', 'pageview');

 

</script>
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
                        <li class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active"><a href="#tab-1">Recuperar contraseña (paso2)</a></li>
                    </ul>
                <div id="tab-1" class="tab ui-tabs-panel ui-widget-content ui-corner-bottom">
                        <h2>Recuperar contraseña</h2>
                        <p>Ingrese los datos solicitados para continuar con el proceso</p>
                        <form class="content-form" name="recuperar2" id="recuperar2" method="post" action="actions/procesa.php">
                            <p>
                                <label for="mail">Ingrese su correo:</label>
                                <input id="mail" type="text" name="mail" value=""/>
                            </p>
                            <p>
                                <label for="newpass">Ingrese nueva contraseña:</label>
                                <input id="newpass" type="password" name="newpass" value=""/>
                            </p>
                            <p>
                                <label for="confnewpass">Confirme nueva contraseña:</label>
                                <input id="confnewpass" type="password" name="confnewpass" value=""/>
                            </p>
                            <p>
                                <input type="hidden" name="action" value="Recuperar"/>
                                <?php 
                                echo "<input type='hidden' name='id' value='".$_GET["id"]."' />";
                                 ?>

                                <input class="button" type="submit" value="Recuperar"/>
                            </p>
                            <div id="alertaLogin"style="display:none"></div>
                        </form>
                        <div class="notification-box notification-box-error" style="display:none" id="respuestaLogin">
                            <p id="msj_log"></p>
                            <a href="#" class="notification-close notification-close-error">x</a>
                        </div>
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