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
	<link href="style.css" type="text/css" rel="stylesheet">
	<!--[if IE]> <link href="css/ie.css" type="text/css" rel="stylesheet"> <![endif]-->
	<link href="css/colors/orange.css" type="text/css" rel="stylesheet">
    <!-- end CSS -->
	
	<link href="images/favicon.ico" type="image/x-icon" rel="shortcut icon">
	
	<!-- begin JS -->
    <script src="js/jquery-1.7.2.min.js" type="text/javascript"></script> <!-- jQuery -->
    <script src="js/ie.js" type="text/javascript"></script> <!-- IE detection -->
    <script src="js/jquery.easing.1.3.js" type="text/javascript"></script> <!-- jQuery easing -->
	<script src="js/modernizr.custom.js" type="text/javascript"></script> <!-- Modernizr -->
    <!--[if IE 8]><script src="js/respond.min.js" type="text/javascript"></script><![endif]--> <!-- Respond -->
	<!-- begin language switcher -->
	<script src="js/jquery.polyglot.language.switcher.js" type="text/javascript"></script> 
    <!-- end language switcher -->
    <script src="js/ddlevelsmenu.js" type="text/javascript"></script> <!-- drop-down menu -->
    <script type="text/javascript"> <!-- drop-down menu -->
        ddlevelsmenu.setup("nav", "topbar");
    </script>
    <script src="js/tinynav.min.js" type="text/javascript"></script> <!-- tiny nav -->
    <script src="js/jquery.ui.totop.min.js" type="text/javascript"></script> <!-- scroll to top -->
    <script src="js/jquery.validate.min.js" type="text/javascript"></script> <!-- form validation -->
	<script src="js/jquery.tweet.js" type="text/javascript"></script> <!-- Twitter widget -->
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script> <!-- Google maps -->
    <script src="js/jquery.gmap.min.js" type="text/javascript"></script> <!-- gMap -->
	<script src="js/jquery.touchSwipe.min.js" type="text/javascript"></script> <!-- touchSwipe -->
    <script src="js/custom.js" type="text/javascript"></script> <!-- jQuery initialization -->
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
    
	<title>Yet Inmobiliario, tu ventaja competitiva</title>
</head>

<body>
<!-- begin container -->
<div id="wrap">
	<?php include('includes/header.php'); ?>
        
    <!-- begin content -->
        <section id="content" class="container clearfix">
        	<!-- begin page header -->
            <header id="page-header">
            	<h1 id="page-title">Contacto</h1>	
            </header>
            <!-- end page header -->
        	
            <!-- begin main content -->
            
            <!-- begin google map --> 
            <section>
                <div id="map"
                    data-address="320 Lago Alberto, Col. Anahuac, México DF"
                    data-zoom="17"
                    style="width: 100%; height: 400px;">
                </div>
            </section>
            <!-- end google map -->
            
            <!-- begin main -->
            <section id="main" class="three-fourths">
            <!-- begin contact form -->
            <h2>Contáctanos</h2>
            <p>Ponte en contacto con nosotros, déjanos tus datos.</p>
            <div class="notification-box notification-box-success" style="display: none;">
                <p>Mensaje enviado con éxito, en breve nos pondremos en contacto.</p>
                <a href="#" class="notification-close notification-close-success">x</a>
            </div>
            
            <div class="notification-box notification-box-error " style="display: none;">
                <p>El mensaje no envió por un error, intente de nuevo más tarde.</p>
                <a href="#" class="notification-close notification-close-error">x</a>
            </div>
            <form id="contact-form" class="content-form" method="post" action="actions/envio.php">
                <p>
                    <label for="name">Nombre:<span class="note">*</span></label>
                    <input id="name" type="text" name="name" class="required">
                </p>
                <p>
                    <label for="email">Email:<span class="note">*</span></label>
                    <input id="email" type="email" name="email" class="required">
                </p>
                <p>
                    <label for="message">Mensaje:<span class="note">*</span></label>
                    <textarea id="message" cols="68" rows="8" name="message" class="required"></textarea>
                </p>
                <p>
                    <input id="submit" class="button" type="submit" name="submit" value="Enviar mensaje">
                </p>
            </form>
            <p><span class="note">*</span> Campos Requeridos</p>
            <!-- end contact form -->
            </section>
            <!-- end main -->
            
            <!-- begin sidebar -->
            <aside id="sidebar" class="one-fourth column-last">
            	<div class="widget contact-info">
                    <h3>Información de contacto</h3>
                    <p class="address">Centro Comercial Parques Polanco<br>
                    Lago Alberto #320 piso 1, esq. Mariano Escobedo<br>
                    Col. Anáhuac, C.P. 11320 Del. Miguel Hidalgo <br>
                    Distrito Federal México</p>
                    <p class="phone"><strong>Tel:</strong> +50 29 64 81</p>
                    <p class="email"><strong>Email:</strong> <a href="mailto:ventas@yetinmobiliario.com">ventas@yetinmobiliario.com</a></p>
                    <p class="business-hours"><strong>Horario de atención:</strong><br>
                    Lunes a Viernes: 9:00-18:00<br>
                    </p>
                </div>
            </aside>
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