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
    <script src="js/jquery-ui-1.8.21.custom.min.js" type="text/javascript"></script> <!-- tabs, toggles, accordion -->
	<script src="js/jquery.tweet.js" type="text/javascript"></script> <!-- Twitter widget -->
	<script src="js/jquery.touchSwipe.min.js" type="text/javascript"></script> <!-- touchSwipe -->
    <script src="js/custom.js" type="text/javascript"></script> <!-- jQuery initialization -->
    <!-- end JS -->
   <script language="javascript">
    $(document).ready(function() {
    
    var loading;
    var results;
    var form;
    
    form = document.getElementById('form');
    loading = document.getElementById('loading');
    results = document.getElementById('results');
    
    $('#Submit').click( function() {
        
        if($('#Search').val() == "")
        {alert('Ingrese un dominio');return false;}
        
        results.style.display = 'none';
        $('#results').html('');
        loading.style.display = 'inline';
        
        $.post('actions/process.php?domain=' + escape($('#Search').val()),{
        }, function(response){
            
            results.style.display = 'block';
            $('#results').html(unescape(response)); 
            loading.style.display = 'none';
        });
        
        return false;
    });
    
});
</script>
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
            <h1 id="page-title">¿Cómo funciona?</h1>
        </header>
        <!-- end page header -->

        <!-- begin main content -->
    <h2>Con Yet! Inmobiliario puedes crear tu propia página web de forma profesional, es muy fácil y rápido:</h2>
 <div class="three-fourths">
         <section>
            
            <div class="infobox">
                <div class="infobox-inner">
                    
                    <div class="with-button">
                        <h2>Paso 1</h2>
                        <p><a href="registro.php">Regístrate</a> en nuestro sitio web llenando un pequeño formulario y confirma tu correo electrónico.</p>
                    </div>
                </div>
            </div>
        </section>
        <section>
            
            <div class="infobox">
                <div class="infobox-inner">
                    
                    <div class="with-button">
                        <h2>Paso 2</h2>
                        <p>Adquiere nuestro paquete que incluye el alojamiento de tu sitio web y un panel de control con herramientas 
                        para tu inmobiliaria y elige un dominio.</p>
                        <p>¿Está mi dominio disponible?</p>
                        <p>Ingrese sólo el nombre del dominio (*sin prefijo .com, .org, etc)</p>
                        <form method="post" action="./" id="form"> 
                            <input type="text" autocomplete="off" id="Search" name="domain"> 
                            <input type="submit" id="Submit" value="Comprobar" class="boton">
                        </form>
                        <div id="loading">Enviando datos...</div>        
                        <div id="results"></div> 
                    </div>
                </div>
            </div>
        </section>

        <section>
            
            <div class="infobox">
                <div class="infobox-inner">
                    
                    <div class="with-button">
                        <h2>Paso 3</h2>
                        <p>Sube los datos de tu inmobiliaria, sube tu logotipo, elige tus colores y tu sitio web esta casi listo.</p>
                    </div>
                </div>
            </div>
        </section>

        <section>
            
            <div class="infobox">
                <div class="infobox-inner">
                    
                    <div class="with-button">
                        <h2>Paso 4</h2>
                        <p>Comienza a subir tus propiedades por medio tu panel control y tu sitio web estará completo</p>
                    </div>
                </div>
            </div>
        </section>

        </div>
        
        <!-- end main content -->
    </section>
    <!-- end content -->

    <?php include('includes/footer.php'); ?>
</div>
<!-- end container -->

</body>
</html>