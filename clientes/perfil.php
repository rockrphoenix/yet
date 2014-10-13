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
    <script src="../js/validacion.js" type="text/javascript"></script> <!-- form validation -->
    <!-- end JS -->
	<title>Zona Clientes</title>
</head>

<body>
<!-- begin container -->
<div id="wrap">
	<?php 
        include('../includes/headerClientes.php');
        require_once('../actions/conexion.php');
        $codigo=mysql_query("SELECT DISTINCT tblClientes.Clientes, tblClientes.Email, tblDatos.Nombres, tblDatos.ApellidoPaterno, tblDatos.ApellidoMaterno, tblDatos.Edad, tblDatos.Tel, tblDatos.Cel, tblUbicacion.Calle, tblUbicacion.Num, tblUbicacion.Ext, tblUbicacion.Colonia, tblUbicacion.Municipio, tblUbicacion.Ciudad, tblUbicacion.Estado, tblUbicacion.Cp FROM tblClientes, tblDatos, tblUbicacion WHERE tblClientes.idClientes = '$_SESSION[id]' AND tblClientes.tblDatos_idDatos=tblDatos.idDatos AND tblClientes.tblUbicacion_idUbicacion = tblUbicacion.IdUbicacion");
        $row=mysql_fetch_array($codigo);
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
            
                        <h2>Modificar datos de usuario</h2>
                        <p>Todos los campos son obligatorios</p>
                    <form class="content-form" name="actualiza" id="actualiza" method="post" action="../actions/actualizaPerfil.php">
                    <p>
                    <label for="usuario">Usuario:<span class="note">*</span></label>
                    <input name="usuario" type="text" <?php if (mysql_num_rows($codigo) > 0) {
                       echo 'value="'.$row[Clientes].'"';
                    } ?>>
                </p>
                 <p>
                    <label for="mail">Email:<span class="note">*</span></label>
                    <input name="mail" type="text" <?php if (mysql_num_rows($codigo) > 0) {
                       echo 'value="'.$row[Email].'"';
                    } ?>>
                </p>
                 <p>
                    <label for="nombre">Nombre(s):<span class="note">*</span></label>
                    <input name="nombre" type="text" <?php if (mysql_num_rows($codigo) > 0) {
                       echo 'value="'.$row[Nombres].'"';
                    } ?>>
                </p>
                 <p>
                    <label for="paterno">Apellido Paterno:<span class="note">*</span></label>
                    <input name="paterno" type="text" <?php if (mysql_num_rows($codigo) > 0) {
                       echo 'value="'.$row[ApellidoPaterno].'"';
                    } ?>>
                </p>
                 <p>
                    <label for="materno">Apellido Materno:<span class="note">*</span></label>
                    <input name="materno" type="text" <?php if (mysql_num_rows($codigo) > 0) {
                       echo 'value="'.$row[ApellidoMaterno].'"';
                    } ?>>
                </p>
                <p>
                    <label for="fecha">Fecha de nacimiento:<span class="note">*</span></label>
                    <select name="anio" name="anio">
                                    <?php
                                        $anioactual = date(Y) - 17;
                                        $arrayEdad = explode("-", $row[Edad]);
                                        echo $arrayEdad[0].'hola';
                                        for ($i=0; $i < 47; $i++) { 
                                            $anioactual = $anioactual - 1;
                                            if ($arrayEdad[0] == $anioactual) {
                                                echo "<option value='".$anioactual."'selected>".$anioactual."</option>";
                                            }
                                            else{
                                                echo "<option value='".$anioactual."'>".$anioactual."</option>";
                                            }
                                        }
                                        
                                    ?>
                                </select>
                                <select name="mes" name="mes">
                                    <?php
                                        echo '<option value="'.$arrayEdad[1].'" selected>'.$arrayEdad[1].'</option>';
                                    ?>
                                    <option value="1">enero</option>
                                    <option value="2">febrero</option>
                                    <option value="3">marzo</option>
                                    <option value="4">abril</option>
                                    <option value="5">mayo</option>
                                    <option value="6">junio</option>
                                    <option value="7">julio</option>
                                    <option value="8">agosto</option>
                                    <option value="9">septiembre</option>
                                    <option value="10">octubre</option>
                                    <option value="11">nomviembre</option>
                                    <option value="12">diciembre</option>
                                </select>
                                <select name="dia" name="dia">
                                    <?php
                                        for ($i=1; $i < 32; $i++) {
                                        if ($arrayEdad[2] == $i) {
                                             echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                         } 
                                            echo '<option value="'.$i.'">'.$i.'</option>';
                                        }
                                    ?>
                                </select>
                </p>
                <p>
                    <label for="tel">Teléfono:<span class="note">*</span></label>
                    <input name="tel" type="text" <?php if (mysql_num_rows($codigo) > 0) {
                       echo 'value="'.$row[Tel].'"';
                    } ?>>
                </p>
                <p>
                    <label for="cel">Celular:<span class="note">*</span></label>
                    <input name="cel" type="text" <?php if (mysql_num_rows($codigo) > 0) {
                       echo 'value="'.$row[Cel].'"';
                    } ?>>
                </p>
                <p>
                    <label for="calle">Calle:<span class="note">*</span></label>
                    <input name="calle" type="text" <?php if (mysql_num_rows($codigo) > 0) {
                       echo 'value="'.$row[Calle].'"';
                    } ?>>
                </p>
                <p>
                    <label for="exterior">Número Exterior:<span class="note">*</span></label>
                    <input name="exterior" type="text" <?php if (mysql_num_rows($codigo) > 0) {
                       echo 'value="'.$row[Num].'"';
                    } ?>>
                </p>
                <p>
                    <label for="interior">Número Interior:</label>
                    <input name="interior" type="text" <?php if (mysql_num_rows($codigo) > 0) {
                       echo 'value="'.$row[Ext].'"';
                    } ?>>
                </p>
                <p>
                    <label for="colonia">Colonia:<span class="note">*</span></label>
                    <input name="colonia" type="text" <?php if (mysql_num_rows($codigo) > 0) {
                       echo 'value="'.$row[Colonia].'"';
                    } ?>>
                </p>
                <p>
                    <label for="del">Municipio/Delegacion:<span class="note">*</span></label>
                    <input name="del" type="text" <?php if (mysql_num_rows($codigo) > 0) {
                       echo 'value="'.$row[Municipio].'"';
                    } ?>>
                </p>
                <p>
                    <label for="ciudad">Ciudad:<span class="note">*</span></label>
                    <input name="ciudad" type="text" <?php if (mysql_num_rows($codigo) > 0) {
                       echo 'value="'.$row[Ciudad].'"';
                    } ?>>
                </p>
                <p>
                    <label for="estado">Estado:<span class="note">*</span></label>
                    <input name="estado" type="text" <?php if (mysql_num_rows($codigo) > 0) {
                       echo 'value="'.$row[Estado].'"';
                    } ?>>
                </p>
                <p>
                    <label for="cp">CP:<span class="note">*</span></label>
                    <input name="cp" type="text" <?php if (mysql_num_rows($codigo) > 0) {
                       echo 'value="'.$row[Cp].'"';
                    } ?>>
                </p>
                <p>
                    <input class="button" value="Registrar" onclick="valida_actualizacion()" type="button">
                </p>
            </form>
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