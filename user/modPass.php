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
    <script src="../js/colorpicker.js" type="text/javascript"></script><!--  Color Picker -->
    <script src="../js/eye.js" type="text/javascript"></script><!--  Color Picker -->
    <script src="../js/layout.js?ver=1.0.2" type="text/javascript"></script><!--  Color Picker -->
    <script src="../js/jquery.validate.min.js" type="text/javascript"></script> <!-- form validation -->
    <script src="../js/validaModPass.js" type="text/javascript"></script> <!-- form validation -->
    <!-- end JS -->
    <title>Zona Clientes</title>
</head>
<body>
<!-- begin container -->
<div id="wrap">
    <?php
    $seccion = "perfil";
        if ($estatus == 2) {
            include_once('../includes/headerClientes.php');
        }else if($estatus == 1 || $estatus == 9){
            include_once('../includes/headerPaquete.php');
        }else if($estatus == 3 || $estatus == 4){
            include_once('../includes/headerAsesores.php');
        }
        $user = $_SESSION['usuario'];
        if (isset($_SESSION[idasesor])) {
            $id = $_SESSION[idasesor];
            $action = "modPassAsesor2";
        }else{
            $id = $_SESSION[id];
            $action = "modPass";
        }
    ?>
        
    <!-- begin content -->
        <section id="content" class="container clearfix">
            <!-- begin page header -->
             <header id="page-header">
                <h1 id="page-title">Modificar contraseña</h1>
            </header>
                <form class="content-form" id="modPass" name="modPass" method="post" action="procesa/formularios.php">
                    <div class="one-half">
                    <h2>Ingresar contraseña</h2>
                    <input type="hidden" name="id" <?php echo 'value="'.$id.'"'; ?>>
                    <p>
                        <label for="psw">Contraseña actual:<span class="note">*</span></label>
                        <input type="password" name="psw" id="psw"/>
                    </p>
                    <p>
                        <label for="pswn">Nueva contraseña:<span class="note">*</span></label>
                        <input type="password" name="pswn" id="pswn"/>
                    </p>
                    <p>
                        <label for="cspwn">Confirmar nueva contraseña:<span class="note">*</span></label>
                        <input type="password" name="cpswn" id="cpswn"/>
                    </p>
                    
                    <input type="hidden" name="action" <?php echo 'value="'.$action.'"'; ?>>
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
                        <h2>¿Cómo modifico mi contraseña?</h2>
                        <p>Por motivos de seguridad  te recomendamos que cambies regularmente tu contraseña.</p>
                        <p>Para modificarla, sólo ingresa tu contraseña actual, en el campo de abajo ingresa la nueva contraseña y escríbela de nuevo en el último campo. Ahora sólo da clic en el botón “Guardar” y ¡listo!</p>
                        <h2>¿Cómo puedo crear una contraseña segura?</h2>
                        <p>Para crear una contraseña segura, te recomendamos tomar en cuenta los siguientes parámetros al momento de crear una nueva:</p>
                        <p>Una contraseña segura:</p>
                        <ul class="circle">
                            <li>Tiene ocho caracteres como mínimo.</li>
                            <li>No contiene el nombre de usuario, el nombre real o el nombre de la empresa.</li>
                            <li>No contiene fechas importantes como aniversarios, cumpleaños, etc.</li>
                            <li>No contiene una palabra completa.</li>
                            <li>Es significativamente diferente de otras contraseñas anteriores.</li>
                            <li>Está compuesta por caracteres de cada una de las siguientes cuatro categorías: letras mayúsculas, letras minúsculas, números, caracteres especiales ej.  ! @ # $ % ^ & *</li>
                            <li>Debe contener las características anteriores pero debe ser fácil de recordar para el usuario.</li>
                        </ul>
                    </div>
                </form>
            
        </section>
        <!-- end content -->             
    <!-- begin footer -->
    <?php include '../includes/footerClientes.php' ?>
    <!-- end footer -->
</div>
<!-- end container -->
</body>
</html>




