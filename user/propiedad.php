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
    <!-- end meta -->
    
    <!-- begin CSS -->
    <link href="../style.css" type="text/css" rel="stylesheet" id="main-style"/>
    <link href="../css/estilo.css" type="text/css" rel="stylesheet"/>
    <!--[if IE]> <link href="css/ie.css" type="text/css" rel="stylesheet"> <![endif]-->
    <link href="../css/colors/orange.css" type="text/css" rel="stylesheet" id="color-style"/>
    <!--<link rel="stylesheet" href="../css/jq.ui.css"  id="theme">-->
    <link rel="stylesheet" href="../js/jquery.fileupload-ui.css">
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
    <script src="../js/tinynav.min.js" type="text/javascript"></script> <!-- tiny nav -->
    <script src="../js/jquery.ui.totop.min.js" type="text/javascript"></script> <!-- scroll to top -->
    <script src="../js/jquery-ui-1.8.21.custom.min.js" type="text/javascript"></script> <!-- tabs, toggles, accordion -->
    <script src="../js/jquery.tweet.js" type="text/javascript"></script> <!-- Twitter widget -->
    <script src="../js/jquery.touchSwipe.min.js" type="text/javascript"></script> <!-- touchSwipe -->
    <script src="../js/custom.js" type="text/javascript"></script> <!-- jQuery initialization -->
    <script src="../js/jquery.validate.min.js" type="text/javascript"></script> <!-- form validation -->
    <script src="../js/jquery.fileupload.js"></script>
    <script src="../js/jquery.fileupload-ui.js"></script>
    <script src="../js/prop.js" type="text/javascript"></script>
    <!-- end JS -->
	<title>Zona Clientes</title>
</head>

<body>
<!-- begin container -->
<div id="wrap">
	<?php
        if ($estatus == 2) {
            include_once('../includes/headerClientes.php');
        }else if($estatus == 1 || $estatus == 9){
            include_once('../includes/headerPaquete.php');
        }else if($estatus == 3 || $estatus == 4){
            include_once('../includes/headerAsesores.php');
        }
        $user = $_SESSION['usuario'];
<<<<<<< HEAD
=======

>>>>>>> 1f22693d82efdd027128b4a534fecb9d8f3230a5
    ?>
        
    <!-- begin content -->
        <section id="content" class="container clearfix">
        	<!-- begin page header -->
             <header id="page-header">
                <h1 id="page-title">Registro de propiedad</h1>
            </header>
            <?php 
                if (isset($_GET['idpropiedad'])) { 
                require_once("clases/clase.datos.php");
                $consulta = new Datos($_SESSION);
                $datos = $consulta->datosPropiedadIndividual($_GET['idpropiedad']);
            ?>
            <div class="one-third">
                <div class="notification-box notification-box-info">
                    <p><a <?php echo 'href="sube.php?idProp='.$_GET['idpropiedad'].'"'; ?>>Subir más imágenes a esta propiedad</a>.</p>
                </div>
            </div>
             <div class="one-third">
                <div class="notification-box notification-box-info">
                    <p><a <?php echo 'href="imagenes.php?idpropiedad='.$_GET['idpropiedad'].'"'; ?>>Elegir imagen predeterminada.</a></p>
                </div>
            </div>
            <div class="one-third column-last">
                <div class="notification-box notification-box-warning">
                    <p><a <?php echo 'href="borrarImagenes.php?idpropiedad='.$_GET['idpropiedad'].'"'; ?>>Borrar imágenes.</a></p>                       
                </div>
            </div>
            <?php } ?>

            <div class="tabs ui-tabs ui-widget ui-widget-content ui-corner-all" id="all">
                    <ul class="nav clearfix ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
                        <li class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active"><a href="#tab-1">Registre los datos de su propiedad</a></li>
                        <li class="ui-state-default ui-corner-top"><a href="#tab-2">Ubicación del inmueble</a></li>
                        <li class="ui-state-default ui-corner-top"><a href="#tab-3">Datos del inmueble</a></li>
                        <li class="ui-state-default ui-corner-top"><a href="#tab-4">Características del inmueble</a></li>
                        <li class="ui-state-default ui-corner-top"><a href="#tab-6">Guardar</a></li>
                        <li class="ui-state-default ui-corner-top" id="fotos"><a href="#tab-5">Fotos</a></li>
                    </ul>
                    <form class="content-form" name="formprop" id="formprop" method="post" action="procesa/formularios.php">
                        <div id="tab-1" class="tab ui-tabs-panel ui-widget-content ui-corner-bottom">
                            <div id="dgrales">
                                <h2>Datos generales</h2>
                                <p>Registre los datos de su propiedad.</p>
                                <p>Los campos marcados con <span class="note">*</span> són obligatorios</p>

                                <div class="one-half">
                                    <label for="tinmueble">Tipo de inmueble:<span class="note">*</span></label>
                                            <select name="tipoInmueble" id="tipoInmueble">
                                            <?php
                                                if ($datos['idTipo']!="") {
                                                    echo '<option value="'.$datos['idTipo'].'">'.$datos['idTipo'].'</option>';
                                                } else {
                                            ?>
                                                <option value="">Seleccione...</option>
                                                <option value="Casa">Casa</option>
                                                <option value="Condominio">Casa condominio</option>
                                                <option value="Departamento">Departamentos</option>
                                                <option value="Edificio">Edificios</option>
                                                <option value="Local">Local comercial</option>
                                                <option value="Oficina">Oficina</option>
                                                <option value="Terreno">Terrenos</option>
                                                <option value="Bodega">Bodegas</option>
                                                <option value="Rancho">Ranchos</option>
                                                <?php } ?>
                                            </select>
                                </div>
                                <div class="one-half column-last">
                                    <label for="tanuncio">Tipo de anuncio:<span class="note">*</span></label>
                                        <select name="destaque" id="destaque">
                                            <option value="0" <?php echo ($datos['Destaque'] == '0') ? 'selected="selected"' : "" ; ?>>Normal</option>
                                            <option value="1" <?php echo ($datos['Destaque'] == '1') ? 'selected="selected"' : "" ; ?>>Destacado</option>
                                         </select>
                                </div>
                                <div class="one-half">
                                    <label for="cpersonalizada">Número de propiedad personalizada:</label>
                                    <input type="text" name="cpersonalizada" <?php echo ($datos['idPersonalizado'] != "") ? 'value="'.$datos['idPersonalizado'].'"' : "" ; ?>/>
                                </div>
                                <div class="one-half column-last">
                                    <label for="publicacion">Publicaci&oacute;n:<span class="note">*</span></label>
                                        <select name="publicar" id="publicar">
                                            <option value="1" <?php echo ($datos['publicacion'] == '1') ? 'selected="selected"' : "" ; ?>>Publicar</option>
                                            <option value="0" <?php echo ($datos['publicacion'] == '0') ? 'selected="selected"' : "" ; ?>>No publicar</option>
                                         </select>
                                </div>
                                <p>&nbsp;</p>
                            </div>
                        </div>
                        <div id="tab-2" class="tab ui-tabs-panel ui-widget-content ui-corner-bottom">
                            <div id="ubicacion">
                                <h2>Datos de ubicaci&oacute;n</h2>
                                <table style="width: 100%;">
                                    <tr>
                                        <td>
                                            <label for="cp">C&oacute;digo postal:<span class="note">*</span></label>
                                            <input type="text" name="cp" id="cp" <?php echo ($datos['CP'] != '') ? 'value="'.$datos['CP'].'"' : "" ; ?>>
                                        </td>
                                        <td>
                                            <label for="colonia">Colonia:<span class="note">*</span></label>
                                            <input type="text" name="colonia" id="colonia" <?php echo ($datos['Colonia'] != '') ? 'value="'.$datos['Colonia'].'"' : "" ; ?>> 
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="estado">Estado:<span class="note">*</span></label>
                                            <input type="text" name="estado" id="estado" <?php echo ($datos['Estado'] != '') ? 'value="'.$datos['Estado'].'"' : "" ; ?>> 
                                        </td>
                                        <td>
                                            <label for="municipio">Delegaci&oacute;n / Municipio:<span class="note">*</span></label>
                                            <input type="text" name="municipio" id="municipio" <?php echo ($datos['Municipio'] != '') ? 'value="'.$datos['Municipio'].'"' : "" ; ?>> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="ciudad">Ciudad:</label>
                                            <input type="text" name="ciudad" id="ciudad" <?php echo ($datos['Ciudad'] != '') ? 'value="'.$datos['Ciudad'].'"' : "" ; ?>>  
                                        </td>
                                        <td>
                                            <label for="calle">Calle:<span class="note">*</span></label>
                                            <input type="text" name="calle" <?php echo ($datos['Calle'] != '') ? 'value="'.$datos['Calle'].'"' : "" ; ?>> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="numero">N&uacute;mero exterior:<span class="note">*</span></label>
                                            <input type="text" name="numero" <?php echo ($datos['NumeroExterior'] != '') ? 'value="'.$datos['NumeroExterior'].'"' : "" ; ?>> 
                                        </td>
                                    <td>
                                            <label for="ninterior">N&uacute;mero interior:</label>
                                            <input type="text" name="ninterior" <?php echo ($datos['NumeroInterior'] != '') ? 'value="'.$datos['NumeroInterior'].'"' : "" ; ?>> 
                                    </td></tr>
                                </table>
                            </div>
                        </div>
                        <div id="tab-3" class="tab ui-tabs-panel ui-widget-content ui-corner-bottom">
                            <div id="datosInmueble">
                                <h2>Datos del inmueble</h2>
                                <p>
                                    <label for="tanuncio">T&iacute;tulo del anuncio:<span class="note">*</span></label>
                                    <input type="text" name="tanuncio" <?php echo ($datos['titulo'] != '') ? 'value="'.$datos['titulo'].'"' : "" ; ?>> 
                                </p>
                                <p>
                                    <label for="estatus">Descripción de la propiedad:<span class="note">*</span></label>
                                    <textarea name="descripcion"><?php echo ($datos['Descripcion'] != '') ? $datos['Descripcion'] : "" ; ?></textarea>
                                </p>
                                
                                <div class="one-fourth">
                                    <label for="m2t">Metros cuadrados de terreno:<span class="note">*</span></label>
                                    <input type="text" name="m2t" <?php echo ($datos['M2terreno'] != '') ? 'value="'.$datos['M2terreno'].'"' : "" ; ?>> 
                                </div>
                                <div class="one-fourth">
                                    <label for="m2c">Metros cuadrados de construcci&oacute;n:<span class="note">*</span></label>
                                    <input type="text" name="m2c" <?php echo ($datos['M2Construccion'] != '') ? 'value="'.$datos['M2Construccion'].'"' : "" ; ?>> 
                                </div>
                                <div class="one-fourth">
                                   

                                        <p>
                                        <label for="estatus">Estatus de propiedad:<span class="note">*</span></label>
                                            <select name="estatusPropiedad">
                                                <option value="">--Seleccione--</option>
                                                <option value="1"<?php echo ($datos['EstatusPropiedad'] == '1') ? 'selected="selected"' : "" ; ?>>Oportunidad</option>
                                                <option value="2"<?php echo ($datos['EstatusPropiedad'] == '2') ? 'selected="selected"' : "" ; ?>>Oferta</option>
                                                <option value="3"<?php echo ($datos['EstatusPropiedad'] == '3') ? 'selected="selected"' : "" ; ?>>En proceso de venta</option>
                                                <option value="4"<?php echo ($datos['EstatusPropiedad'] == '4') ? 'selected="selected"' : "" ; ?>>En proceso de renta</option>
                                                <option value="5"<?php echo ($datos['EstatusPropiedad'] == '5') ? 'selected="selected"' : "" ; ?>>Vendida</option>
                                                <option value="6"<?php echo ($datos['EstatusPropiedad'] == '6') ? 'selected="selected"' : "" ; ?>>Rentada</option>
                                            </select>
                                    </p>
                                </div>
                                <div class="one-fourth column-last">
                                     <label for="tipoop">Tipo de operaci&oacute;n:<span class="note">*</span></label>
                                            <select name="tipoOperacion" id="tipoOperacion">
                                                <option value="">--Seleccione--</option>
                                                <option value="Venta"<?php echo ($datos['EstatusVenta'] == 'Venta') ? 'selected="selected"' : "" ; ?>>Venta</option>
                                                <option value="Renta"<?php echo ($datos['EstatusVenta'] == 'Renta') ? 'selected="selected"' : "" ; ?>>Renta</option>
                                                <option value="Venta-Renta"<?php echo ($datos['EstatusVenta'] == 'Venta-Renta') ? 'selected="selected"' : "" ; ?>>Venta y renta</option>
                                                <option value="Traspaso"<?php echo ($datos['EstatusVenta'] == 'Traspaso') ? 'selected="selected"' : "" ; ?>>Traspaso</option>
                                            </select>
                                </div>
                                    <table style="width: 100%;">
                                    </tr>
                                    <tr><td>
                                         <p class="venta">
                                            <label for="pventa">Precio de venta:<span class="note">*</span></label>
                                            <input type="text" name="pventa" <?php echo ($datos['PrecioVenta'] != '') ? 'value="'.$datos['PrecioVenta'].'"' : "" ; ?>> 
                                        </p>
                                    </td>
                                    <td>
                                         <p class="venta">
                                            <label for="cventa">Comisi&oacute;n de venta:<span class="note">*</span></label>
                                            <input type="text" name="cventa" <?php echo ($datos['ComisionVenta'] != '') ? 'value="'.$datos['ComisionVenta'].'"' : "" ; ?>>
                                        </p>
                                    </td></tr>
                                    <tr><td>
                                         <p class="renta">
                                            <label for="prenta">Precio de renta:<span class="note">*</span></label>
                                            <input type="text" name="prenta" <?php echo ($datos['PrecioRenta'] != '') ? 'value="'.$datos['PrecioRenta'].'"' : "" ; ?>>
                                        </p>
                                    </td>
                                    <td>
                                         <p class="renta">
                                            <label for="crenta">Comisi&oacute;n de renta:<span class="note">*</span></label>
                                            <input type="text" name="crenta" <?php echo ($datos['ComisionREnta'] != '') ? 'value="'.$datos['ComisionREnta'].'"' : "" ; ?>>
                                        </p>
                                    </td></tr>
                                    </table>
                            </div>
                        </div>
                        <div id="tab-4" class="tab ui-tabs-panel ui-widget-content ui-corner-bottom">
                            <h2>Caracter&iacute;sticas del inmueble</h2>
                            <div id="casa">
                                <h2>Casa</h2>
                                <table style="width: 100%;">
                                    <tr><td>
                                    <p>
                                        <label for="norecamaras">N&uacute;mero de recamaras:<span class="note">*</span></label>
                                        <input type="text" name="nrecamaras" <?php echo ($datos['NumeroCuartos'] != '') ? 'value="'.$datos['NumeroCuartos'].'"' : "" ; ?>>
                                    </p>
                                     
                                    </td>
                                    <td>

                                    <p>
                                        <label for="ncocherasdesc">N&uacute;mero de cocheras:<span class="note">*</span></label>
                                        <input type="text" name="ncocherasdesc" <?php echo ($datos['NumeroCocheras'] != '') ? 'value="'.$datos['NumeroCocheras'].'"' : "" ; ?>>
                                    </p>
                                     
                                    </td>
                                    </tr>
                                    <tr><td>
                                     <p>
                                     <label for="nbanos">Numero de ba&ntilde;os:<span class="note">*</span></label>
                                        <input type="text" name="nbanos" <?php echo ($datos['NumeroBanios'] != '') ? 'value="'.$datos['NumeroBanios'].'"' : "" ; ?>>
                                    </p>
                                    </td>
                                    <td>
                                    	<p>
                                     <label for="nomedbanos">N&uacute;mero de medios ba&ntilde;os:<span class="note">*</span></label>
                                        <input type="text" name="nmedbanos" <?php echo ($datos['NumeroMediosBanios'] != '') ? 'value="'.$datos['NumeroMediosBanios'].'"' : "" ; ?>>
                                        </p>
                                    </td></tr>
                                    <tr><td>
                                     <p>
                                        <label for="niconstrudos">Niveles construidos:<span class="note">*</span></label>
                                        <input type="text" name="nconstruidos" <?php echo ($datos['NivelesConstruidos'] != '') ? 'value="'.$datos['NivelesConstruidos'].'"' : "" ; ?>>
                                    </p>
                                    </td>
                                    <td>
                                     <p>
                                     <p>
                                        <label for="m2j">Metros cuadrados de jard&iacute;n:<span class="note">*</span></label>
                                        <input type="text" name="m2j" <?php echo ($datos['M2Jardin'] != '') ? 'value="'.$datos['M2Jardin'].'"' : "" ; ?>>
                                    </p>
                                    </td></tr>
                                    <tr><td>
                                     <p>
                                        <label for="cservicio">Cuarto de servicio:<span class="note">*</span></label>
    							        <select name="cservicio">
    							        	<option value="">--Seleccione--</option>
    							        	<option value="1" <?php echo ($datos['CuartoServicio'] == '1') ? 'selected="selected"' : "" ; ?>>Si</option>
    							        	<option value="2" <?php echo ($datos['CuartoServicio'] == '2') ? 'selected="selected"' : "" ; ?>>No</option>
    						        	</select>
                                    </p>
                                    </td>
                                    <td>
                                    </td></tr>
                                    </table>
                            </div>
                            <div id="departamento">
                                <h2>Departamento</h2>
                                <table style="width: 100%;">
                                    <tr>
                                    	<td>
		                                     <p>
		                                        <label for="tdepartamento">Tipo de departamento:<span class="note">*</span></label>
		                                        <select name="tdepto" id="tdepto">
		                                            <option value="">--Seleccione--</option>
		                                            <option value="Interior"<?php echo ($datos['TipoDpto'] == 'Interior') ? 'selected="selected"' : "" ; ?>>Interior</option>
		                                            <option value="Exterior"<?php echo ($datos['TipoDpto'] == 'Exterior') ? 'selected="selected"' : "" ; ?>>Exterior</option>
		                                            <option value="Planta-baja"<?php echo ($datos['TipoDpto'] == 'Planta-baja') ? 'selected="selected"' : "" ; ?>>Planta baja</option>
		                                            <option value="Penthouse"<?php echo ($datos['TipoDpto'] == 'Penthouse') ? 'selected="selected"' : "" ; ?>>Penthouse</option>
		                                        </select>
		                                    </p>
                                    	</td>
                                    	<td>
	                                    	<p>
		                                        <label for="pubicacion">Piso de ubicaci&oacute;n:<span class="note">*</span></label>
		                                        <input type="text" name="pubicacion" <?php echo ($datos['NivelUbicacion'] != '') ? 'value="'.$datos['NivelUbicacion'].'"' : "" ; ?>>
		                                    </p>
                                    	</td>
                                    </tr>
                                    <tr>
                                    	<td>
                                     		<p>
		                                        <label for="nbanosd">Numero de ba&ntilde;os:<span class="note">*</span></label>
		                                        <input type="text" name="nbanosd" <?php echo ($datos['NumeroBanios'] != '') ? 'value="'.$datos['NumeroBanios'].'"' : "" ; ?>>
		                                    </p>
                                    	</td>
                                    	<td>
                                     <p>
                                        <label for="nomedbanos">Número de medios baños:<span class="note">*</span></label>
                                        <input type="text" name="nmedbanos" <?php echo ($datos['NumeroMediosBanios'] != '') ? 'value="'.$datos['NumeroMediosBanios'].'"' : "" ; ?>>
                                    </p>
                                    </td>
                                    	
                                    </tr>
                                    <tr><td>
                                     <p>
                                        <label for="nrecamarasd">N&uacute;mero de recamaras:<span class="note">*</span></label>
                                        <input type="text" name="nrecamarasd" <?php echo ($datos['NumeroCuartos'] != '') ? 'value="'.$datos['NumeroCuartos'].'"' : "" ; ?>>
                                    </p>
                                    </td>
                                    <td>
                                     <p>
                                        <label for="ncocherasdescd">N&uacute;mero de cocheras:<span class="note">*</span></label>
                                        <input type="text" name="ncocherasdescd"<?php echo ($datos['NumeroCocheras'] != '') ? 'value="'.$datos['NumeroCocheras'].'"' : "" ; ?>>
                                    </p>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>
                                     <p>
                                        <label for="nconstrudosd">Niveles construidos:<span class="note">*</span></label>
                                        <input type="text" name="nconstruidosd" <?php echo ($datos['NivelesConstruidos'] != '') ? 'value="'.$datos['NivelesConstruidos'].'"' : "" ; ?>>
                                    </p>
                                    </td>
                                    <td>
		                                     <p>
		                                        <label for="m2j">Metros cuadrados de jard&iacute;n:<span class="note">*</span></label>
		                                        <input type="text" name="m2jd" <?php echo ($datos['M2Jardin'] != '') ? 'value="'.$datos['M2Jardin'].'"' : "" ; ?>>
		                                    </p>
                                    	</td>
                                    </tr>
                                     
                                    <tr><td>
                                     <p>
                                        <label for="cserviciod">Cuarto de servicio:<span class="note">*</span></label>
    							        <select name="cserviciod">
    							        	<option value="">--Seleccione--</option>
    							        	<option value="1" <?php echo ($datos['CuartoServicio'] == '1') ? 'selected="selected"' : "" ; ?>>Si</option>
                                            <option value="2" <?php echo ($datos['CuartoServicio'] == '2') ? 'selected="selected"' : "" ; ?>>No</option>
    						        	</select>
                                    </p>
                                    </td>
                                    <td>
                                    </td></tr>
                                    </table>
                            </div>
                            <div id="edificio">
                                <h2>Edificio</h2>
                                <table style="width: 100%;">
                                    <tr><td>
                                     <p>
<<<<<<< HEAD
                                        <label for="nunidades">No. de unidades habitacionales.<span class="note">*</span></label>
=======
                                        <label for="nunidades">No. de unidades habitacionales:<span class="note">*</span></label>
>>>>>>> 1f22693d82efdd027128b4a534fecb9d8f3230a5
                                        <input type="text" name="nunidades" <?php echo ($datos['nunidades'] != '') ? 'value="'.$datos['nunidades'].'"' : "" ; ?>>
                                    </p>
                                    </td>
                                    <td>
                                     <p>
                                        <label for="nnounidades">No. de unidades no habitacionales::<span class="note">*</span></label>
                                        <input type="text" name="nnounidades" <?php echo ($datos['nnounidades'] != '') ? 'value="'.$datos['nnounidades'].'"' : "" ; ?>>
                                    </p>
                                    </td></tr>
                                    <tr><td>
                                     <p>
                                        <label for="ncocherasdesced">N&uacute;mero de cocheras descubiertas:<span class="note">*</span></label>
                                        <input type="text" name="ncocherasdesced" <?php echo ($datos['NumeroCocherasDescubiertas'] != '') ? 'value="'.$datos['NumeroCocherasDescubiertas'].'"' : "" ; ?>>
                                    </p>
                                    </td>
                                    <td>
                                     <p>
                                        <label for="ncocherascubed">N&uacute;mero de cocheras cubiertas:<span class="note">*</span></label>
                                        <input type="text" name="ncocherascubed" <?php echo ($datos['NumeroCocheras'] != '') ? 'value="'.$datos['NumeroCocheras'].'"' : "" ; ?>>
                                    </p>
                                    </td></tr>
                                    <tr><td>
                                     <p>
                                        <label for="ncocherasvisitased">N&uacute;mero de cocheras para visitas:<span class="note">*</span></label>
                                        <input type="text" name="ncocherasvisitased" <?php echo ($datos['NumeroCocherasVisitas'] != '') ? 'value="'.$datos['NumeroCocherasVisitas'].'"' : "" ; ?>>
                                    </p>
                                    </td>
                                    <td>
                                     <p>
                                        <label for="niveldificio">Niveles del edificio:<span class="note">*</span></label>
                                        <input type="text" name="niveledificio" <?php echo ($datos['NivelesConstruidos'] != '') ? 'value="'.$datos['NivelesConstruidos'].'"' : "" ; ?>>
                                    </p>
                                    </td></tr>
                                    <tr><td>
                                     <p>
                                        <label for="cedificio">Clasificaci&oacute;n del edificio:<span class="note">*</span></label>
                                        <select name="cedificio" id="cedificio">
                                            <option value="">--Seleccione--</option>
                                            <option value="1" <?php echo ($datos['idClasificacionEdificio'] == '1') ? 'selected="selected"' : "" ; ?>>Edificio inteligente</option>
                                            <option value="2" <?php echo ($datos['idClasificacionEdificio'] == '2') ? 'selected="selected"' : "" ; ?>>A</option>
                                            <option value="3" <?php echo ($datos['idClasificacionEdificio'] == '3') ? 'selected="selected"' : "" ; ?>>AA</option>
                                            <option value="4" <?php echo ($datos['idClasificacionEdificio'] == '4') ? 'selected="selected"' : "" ; ?>>AAA</option>
                                        </select>
                                    </p>
                                    </td>
                                    <td>
                                     <p>
                                        <label for="edoconservacioned">Estado de conservaci&oacute;n:<span class="note">*</span></label>
                                        <select name="edoconservacioned">
                                            <option value="">--Seleccione--</option>
                                            <option value="Excelente" <?php echo ($datos['EstadoConservacion'] == 'Excelente') ? 'selected="selected"' : "" ; ?>>Excelente</option>
                                            <option value="Bueno" <?php echo ($datos['EstadoConservacion'] == 'Bueno') ? 'selected="selected"' : "" ; ?>>Bueno</option>
                                            <option value="Regular" <?php echo ($datos['EstadoConservacion'] == 'Regular') ? 'selected="selected"' : "" ; ?>>Regular</option>
                                        </select>
                                    </p>
                                    </td></tr>
                                    </table>
                            </div>
                            <div id="local">
                                <h2>Local comercial</h2>
                                <table style="width: 100%;">
                                    <tr><td>
                                     <p>
                                        <label for="mfrenteloc">Metros de frente:<span class="note">*</span></label>
                                        <input type="text" name="mfrenteloc" <?php echo ($datos['Mfrente'] != '') ? 'value="'.$datos['Mfrente'].'"' : "" ; ?>>
                                    </p>
                                    </td>
                                    <td>
                                     <p>
                                        <label for="mfondoloc">Metros de fondo:<span class="note">*</span></label>
                                        <input type="text" name="mfondoloc" <?php echo ($datos['Mfondo'] != '') ? 'value="'.$datos['Mfondo'].'"' : "" ; ?>>
                                    </p>
                                    </td></tr>
                                    <tr>
                                    <td>
                                     <p>
                                        <label for="nbanosloc">N&uacute;mero de ba&ntilde;os:<span class="note">*</span></label>
                                        <input type="text" name="nbanosloc" <?php echo ($datos['NumeroBanios'] != '') ? 'value="'.$datos['NumeroBanios'].'"' : "" ; ?>>
                                    </p>
                                    </td>
                                    <td>
                                     <p>
                                        <label for="nestacionamientoloc">No. de estacionamientos:<span class="note">*</span></label>
                                        <input type="text" name="nestacionamientoloc" <?php echo ($datos['NivelesConstruidos'] != '') ? 'value="'.$datos['NivelesConstruidos'].'"' : "" ; ?>>
                                    </p>
                                    </td></tr>
                                    <tr><td>
                                     <p>
                                        <label for="pisosnivelesloc">Pisos o niveles:<span class="note">*</span></label>
                                        <input type="text" name="pisosnivelesloc" <?php echo ($datos['NivelesConstruidos'] != '') ? 'value="'.$datos['NivelesConstruidos'].'"' : "" ; ?>>
                                    </p>
                                    </td>
                                    <td>
                                     <p>
                                        <label for="nubicacionloc">Nivel de ubicaci&oacute;n:<span class="note">*</span></label>
                                        <input type="text" name="nubicacionloc" <?php echo ($datos['NivelesConstruidos'] != '') ? 'value="'.$datos['NivelesConstruidos'].'"' : "" ; ?>>
                                    </p>
                                    </td></tr>
                                    <tr>
                                    <td>
                                     <p>
                                        <label for="edoconservacionloc">Estado de conservaci&oacute;n:<span class="note">*</span></label>
                                        <select name="edoconservacionloc">
                                            <option value="">--Seleccione--</option>
                                            <option value="Excelente" <?php echo ($datos['EstadoConservacion'] == 'Excelente') ? 'selected="selected"' : "" ; ?>>Excelente</option>
                                            <option value="Bueno" <?php echo ($datos['EstadoConservacion'] == 'Bueno') ? 'selected="selected"' : "" ; ?>>Bueno</option>
                                            <option value="Regular" <?php echo ($datos['EstadoConservacion'] == 'Regular') ? 'selected="selected"' : "" ; ?>>Regular</option>
                                        </select>
                                    </p>
                                    </td></tr>
                                </table>
                            </div>
                            <div id="oficina">
                                <h2>Oficina</h2>
                                <table style="width: 100%;">
                                    <tr><td>
                                     <p>
                                        <label for="nprivadosof">No. de privados:<span class="note">*</span></label>
                                        <input type="text" name="nprivadosof" <?php echo ($datos['NumeroPrivados'] != '') ? 'value="'.$datos['NumeroPrivados'].'"' : "" ; ?>>
                                    </p>
                                    </td>
                                    <td>
                                     <p>
                                        <label for="nbanosof">No. de ba&ntilde;os:<span class="note">*</span></label>
                                        <input type="text" name="nbanosof" <?php echo ($datos['NumeroBanios'] != '') ? 'value="'.$datos['NumeroBanios'].'"' : "" ; ?>>
                                    </p>
                                    </td></tr>
                                    <tr><td>
                                     <p>
                                        <label for="ncocherasdescof">N&uacute;mero de cocheras descubiertas:<span class="note">*</span></label>
                                        <input type="text" name="ncocherasdescof" <?php echo ($datos['NumeroCocherasDescubiertas'] != '') ? 'value="'.$datos['NumeroCocherasDescubiertas'].'"' : "" ; ?>>
                                    </p>
                                    </td>
                                    <td>
                                     <p>
                                        <label for="ncocherascubof">N&uacute;mero de cocheras cubiertas:<span class="note">*</span></label>
                                        <input type="text" name="ncocherascubof" <?php echo ($datos['NumeroCocheras'] != '') ? 'value="'.$datos['NumeroCocheras'].'"' : "" ; ?>>
                                    </p>
                                    </td></tr>
                                    <tr><td>
                                     <p>
                                        <label for="ncocherasvisitasof">N&uacute;mero de cocheras para visitas:<span class="note">*</span></label>
                                        <input type="text" name="ncocherasvisitasof" <?php echo ($datos['NumeroCocherasVisitas'] != '') ? 'value="'.$datos['NumeroCocherasVisitas'].'"' : "" ; ?>>
                                    </p>
                                    </td>
                                    <td>
                                     <p>
                                        <label for="nconstruidosof">Niveles construidos:<span class="note">*</span></label>
                                        <input type="text" name="nconstruidosof" <?php echo ($datos['NivelesConstruidos'] != '') ? 'value="'.$datos['NivelesConstruidos'].'"' : "" ; ?>>
                                    </p>
                                    </td></tr>
                                    <tr><td>
                                     <p>
                                        <label for="ubicacionof">Ubicaci&oacute;n de la oficina:<span class="note">*</span></label>
                                        <input type="text" name="ubicacionof" <?php echo ($datos['NivelUbicacion'] != '') ? 'value="'.$datos['NivelUbicacion'].'"' : "" ; ?>>
                                    </p>
                                    </td>
                                    <td>
                                     <p>
                                        <label for="edoconservacionof">Estado de conservaci&oacute;n:<span class="note">*</span></label>
                                        <select name="edoconservacionof">
                                            <option value="">--Seleccione--</option>
                                            <option value="Excelente" <?php echo ($datos['EstadoConservacion'] == 'Excelente') ? 'selected="selected"' : "" ; ?>>Excelente</option>
                                            <option value="Bueno" <?php echo ($datos['EstadoConservacion'] == 'Bueno') ? 'selected="selected"' : "" ; ?>>Bueno</option>
                                            <option value="Regular" <?php echo ($datos['EstadoConservacion'] == 'Regular') ? 'selected="selected"' : "" ; ?>>Regular</option>
                                        </select>
                                    </p>
                                    </td></tr>
                                </table>
                            </div>
                            <div id="terreno">
                                <h2>Terrenos</h2>
                                <table style="width: 100%;">
                                    <tr><td>
                                     <p>
                                        <label for="mfrentet">Mtros de frente:<span class="note">*</span></label>
                                        <input type="text" name="mfrentet" <?php echo ($datos['Mfrente'] != '') ? 'value="'.$datos['Mfrente'].'"' : "" ; ?>>
                                    </p>
                                    </td>
                                    <td>
                                     <p>
                                        <label for="mfondot">Metros de fondo:<span class="note">*</span></label>
                                        <input type="text" name="mfondot" <?php echo ($datos['Mfondo'] != '') ? 'value="'.$datos['Mfondo'].'"' : "" ; ?>>
                                    </p>
                                    </td></tr>
                                    <tr><td>
                                     <p>
                                        <label for="tipoterreno">Tipo de terreno:<span class="note">*</span></label>
                                        <select name="tipoterreno" id="tipoterreno">
                                            <option value="">--Seleccione--</option>
                                            <option value="1" <?php echo ($datos['idTipoTerreno'] == '1') ? 'selected="selected"' : "" ; ?>>Ascendente</option>
                                            <option value="2" <?php echo ($datos['idTipoTerreno'] == '2') ? 'selected="selected"' : "" ; ?>>Descendente</option>
                                            <option value="3" <?php echo ($datos['idTipoTerreno'] == '3') ? 'selected="selected"' : "" ; ?>>Plano</option>
                                        </select>
                                    </p>
                                    </td>
                                    <td>
                                     <p>
                                        <label for="fterreno">Forma de terreno:<span class="note">*</span></label>
                                        <input type="text" name="fterreno" <?php echo ($datos['FormaTerreno'] != '') ? 'value="'.$datos['FormaTerreno'].'"' : "" ; ?>>
                                    </p>
                                    </td></tr>
                                    <tr><td>
                                     <p>
                                        <label for="usosuelo">Uso de suelo:<span class="note">*</span></label>
                                        <select id="usosuelo" name="usosuelo">
                                            <option value="">--Seleccione--</option>
                                            <option value="Habitacional" <?php echo ($datos['UsoSuelo'] == 'Habitacional') ? 'selected="selected"' : "" ; ?>>Habitacional</option>
                                            <option value="Industrial" <?php echo ($datos['UsoSuelo'] == 'Industrial') ? 'selected="selected"' : "" ; ?>>Industrial</option>
                                            <option value="Comercial" <?php echo ($datos['UsoSuelo'] == 'Comercial') ? 'selected="selected"' : "" ; ?>>Comercial</option>
                                        </select>
                                    </p>
                                    </td>
                                    <td>
                                    </td></tr>
                                    </table>
                            </div>
                            <div id="bodegas">
                                <h2>Bodegas</h2>
                                <table style="width: 100%;">
                                    <tr><td>
                                     <p>
                                        <label for="mfrenteb">Metros de frente:<span class="note">*</span></label>
                                        <input type="text" name="mfrenteb" <?php echo ($datos['Mfrente'] != '') ? 'value="'.$datos['Mfondo'].'"' : "" ; ?>>
                                    </p>
                                    </td>
                                    <td>
                                     <p>
                                        <label for="mfondob">Metros de fondo:<span class="note">*</span></label>
                                        <input type="text" name="mfondob" <?php echo ($datos['Mfondo'] != '') ? 'value="'.$datos['Mfondo'].'"' : "" ; ?>>
                                    </p>
                                    </td></tr>
                                    <tr><td>
                                     <p>
                                        <label for="cindustrial">Concentraci&oacute;n industrial:<span class="note">*</span></label>
                                        <select name="cindustrial">
                                            <option value="">--Seleccione--</option>
                                            <option value="Si" <?php echo ($datos['ConcentracionIndustrial'] == 'Si') ? 'selected="selected"' : "" ; ?>>Si</option>
                                            <option value="No" <?php echo ($datos['ConcentracionIndustrial'] == 'No') ? 'selected="selected"' : "" ; ?>>No</option>
                                        </select>
                                    </p>
                                    </td>
                                    <td>
                                     <p>
                                        <label for="ferrocarril">Ferrocarril:<span class="note">*</span></label>
                                        <select name="ferrocarril">
                                            <option value="">--Seleccione--</option>
                                            <option value="Si" <?php echo ($datos['Ferrocarril'] == 'Si') ? 'selected="selected"' : "" ; ?>>Si</option>
                                            <option value="No" <?php echo ($datos['Ferrocarril'] == 'No') ? 'selected="selected"' : "" ; ?>>No</option>
                                        </select>
                                    </p>
                                    </td></tr>
                                    <tr><td>
                                     <p>
                                        <label for="tmultimodal">Transporte multimodal:<span class="note">*</span></label>
                                        <select name="tmultimodal">
                                            <option value="">--Seleccione--</option>
                                            <option value="Si" <?php echo ($datos['TransporteMultimodal'] == 'Si') ? 'selected="selected"' : "" ; ?>>Si</option>
                                            <option value="No" <?php echo ($datos['TransporteMultimodal'] == 'No') ? 'selected="selected"' : "" ; ?>>No</option>
                                        </select>
                                    </p>
                                    </td>
                                    <td>
                                     <p>
                                        <label for="m2bodega">Metros cuadrados bodega:<span class="note">*</span></label>
                                        <input type="text" name="m2bodega" <?php echo ($datos['m2bodega'] != '') ? 'value="'.$datos['Mfondo'].'"' : "" ; ?>>
                                    </p>
                                    </td></tr>
                                    <tr><td>
                                     <p>
                                        <label for="m2oficinab">Metros cuadrados de oficina:<span class="note">*</span></label>
                                        <input type="text" name="m2oficinab" <?php echo ($datos['M2Oficina'] != '') ? 'value="'.$datos['Mfondo'].'"' : "" ; ?>>
                                    </p>
                                    </td>
                                    <td>
                                     <p>
                                        <label for="andenes">Andenes:<span class="note">*</span></label>
                                        <select name="andenes">
                                            <option value="">--Seleccione--</option>
                                            <option value="Si" <?php echo ($datos['Andenes'] == 'Si') ? 'selected="selected"' : "" ; ?>>Si</option>
                                            <option value="No" <?php echo ($datos['Andenes'] == 'No') ? 'selected="selected"' : "" ; ?>>No</option>
                                        </select>
                                    </p>
                                    </td></tr>
                                    <tr><td>
                                     <p>
                                        <label for="amaniobras">&Aacute;rea de maniobras:<span class="note">*</span></label>
                                        <select name="amaniobras">
                                            <option value="">--Seleccione--</option>
                                            <option value="Si" <?php echo ($datos['AreaManiobras'] == 'Si') ? 'selected="selected"' : "" ; ?>>Si</option>
                                            <option value="No" <?php echo ($datos['AreaManiobras'] == 'No') ? 'selected="selected"' : "" ; ?>>No</option>
                                        </select>
                                    </p>
                                    </td>
                                    <td>
                                     <p>
                                        <label for="altura">Altura libre del inmueble (metros):<span class="note">*</span></label>
                                        <input type="text" name="altura" <?php echo ($datos['AlturaLibre'] != '') ? 'value="'.$datos['Mfondo'].'"' : "" ; ?>>
                                    </p>
                                    </td></tr>
                                    <tr><td>
                                     <p>
                                        <label for="techo">Tipo de techo:<span class="note">*</span></label>
                                        <select id="techo" name="techo">
                                            <option value="">--Seleccione--</option>
                                            <option value="Lamina" <?php echo ($datos['TipoTecho'] == 'Lamina') ? 'selected="selected"' : "" ; ?>>Lamina</option>
                                            <option value="Concreto" <?php echo ($datos['TipoTecho'] == 'Concreto') ? 'selected="selected"' : "" ; ?>>Concreto</option>
                                            <option value="Asbesto" <?php echo ($datos['TipoTecho'] == 'Asbesto') ? 'selected="selected"' : "" ; ?>>Asbesto</option>
                                            <option value="Estructura-metalica" <?php echo ($datos['TipoTecho'] == 'Estructura-metalica') ? 'selected="selected"' : "" ; ?>>Estructura met&aacute;lica</option>
                                        </select>
                                    </p>
                                    </td>
                                    <td>
                                     <p>
                                        <label for="toneladas">Carga soportada en toneladas:<span class="note">*</span></label>
                                        <input type="text" name="toneladas" <?php echo ($datos['Mfondo'] != '') ? 'value="'.$datos['Mfondo'].'"' : "" ; ?>>
                                    </p>
                                    </td></tr>
                                    </table>
                            </div>
                            <div id="ranchos">
                                <h2>Ranchos</h2>
                                <table style="width: 100%;">
                                    <tr><td>
                                     <p>
                                        <label for="hectareas">Hect&aacute;reas:<span class="note">*</span></label>
                                        <input type="text" name="hectareas" <?php echo ($datos['Hectareas'] != '') ? 'value="'.$datos['Hectareas'].'"' : "" ; ?>>
                                    </p>
                                    </td>
                                    <td>
                                     <p>
                                        <label for="tiporancho">Tipo de rancho:<span class="note">*</span></label>
                                        <select id="rancho" name="rancho">
                                            <option value="">--Seleccione--</option>
                                            <option value="Recreacional" <?php echo ($datos['TipoRancho'] == 'Recreacional') ? 'selected="selected"' : "" ; ?>>Recreacional</option>
                                            <option value="Ganadero" <?php echo ($datos['TipoRancho'] == 'Ganadero') ? 'selected="selected"' : "" ; ?>>Ganadero</option>
                                            <option value="Agricola" <?php echo ($datos['TipoRancho'] == 'Agricola') ? 'selected="selected"' : "" ; ?>>Agr&iacute;cola</option>
                                        </select>
                                    </p>
                                    </td></tr>
                                    <tr><td>
                                     <p>
                                        <label for="sriego">Sistema de riego:<span class="note">*</span></label>
                                        <select name="sriego">
                                            <option value="">--Seleccione--</option>
                                            <option value="Si" <?php echo ($datos['SistemaRiego'] == 'Si') ? 'selected="selected"' : "" ; ?>>Si</option>
                                            <option value="No" <?php echo ($datos['SistemaRiego'] == 'No') ? 'selected="selected"' : "" ; ?>>No</option>
                                        </select>
                                    </p>
                                    </td>
                                    <td>
                                     <p>
                                        <label for="vpanoramica">Vista panor&aacute;mica:<span class="note">*</span></label>
                                        <select name="vpanoramica">
                                            <option value="">--Seleccione--</option>
                                            <option value="Si" <?php echo ($datos['VistaPanoramica'] == 'Si') ? 'selected="selected"' : "" ; ?>>Si</option>
                                            <option value="No" <?php echo ($datos['VistaPanoramica'] == 'No') ? 'selected="selected"' : "" ; ?>>No</option>
                                        </select>
                                    </p>
                                    </td></tr>
                                    <tr><td>
                                     <p>
                                        <label for="avisitantes">Abierto a visitantes:<span class="note">*</span></label>
                                        <select name="avisitantes">
                                            <option value="">--Seleccione--</option>
                                            <option value="Si" <?php echo ($datos['AbiertoVisitantes'] == 'Si') ? 'selected="selected"' : "" ; ?>>Si</option>
                                            <option value="No" <?php echo ($datos['AbiertoVisitantes'] == 'No') ? 'selected="selected"' : "" ; ?>>No</option>
                                        </select>
                                    </p>
                                    </td>
                                    <td>
                                     <p>
                                        <label for="lago">Lago / Laguna cerca:<span class="note">*</span></label>
                                        <select name="lago">
                                            <option value="">--Seleccione--</option>
                                            <option value="Si" <?php echo ($datos['LagunaCercana'] == 'Si') ? 'selected="selected"' : "" ; ?>>Si</option>
                                            <option value="No" <?php echo ($datos['LagunaCercana'] == 'No') ? 'selected="selected"' : "" ; ?>>No</option>
                                        </select>
                                    </p>
                                    </td></tr>
                                    <tr><td>
                                     <p>
                                        <label for="rio">R&iacute;o cercano:<span class="note">*</span></label>
                                        <select name="rio">
                                            <option value="">--Seleccione--</option>
                                            <option value="Si" <?php echo ($datos['LagunaCercana'] == 'Si') ? 'selected="selected"' : "" ; ?>>Si</option>
                                            <option value="No" <?php echo ($datos['LagunaCercana'] == 'No') ? 'selected="selected"' : "" ; ?>>No</option>
                                        </select>
                                    </p>
                                    </td>
                                    <td>
                                     <p>
                                        <label for="establo">Establo o caballerisa:<span class="note">*</span></label>
                                        <select name="establo">
                                            <option value="">--Seleccione--</option>
                                            <option value="Si" <?php echo ($datos['RioCercano'] == 'Si') ? 'selected="selected"' : "" ; ?>>Si</option>
                                            <option value="No" <?php echo ($datos['RioCercano'] == 'No') ? 'selected="selected"' : "" ; ?>>No</option>
                                        </select>
                                    </p>
                                    </td></tr>
                                    <tr><td>
                                     <p>
                                        <label for="m2jr">Metros cuadrados de jard&iacute;n:<span class="note">*</span></label>
                                        <input type="text" name="m2jr" <?php echo ($datos['M2Jardin'] != '') ? 'value="'.$datos['M2Jardin'].'"' : "" ; ?>>
                                    </p>
                                    </td>
                                    <td>
                                     <p>
                                        <label for="sagicola">Superficie agr&iacute;cola:<span class="note">*</span></label>
                                        <input type="text" name="sagicola" <?php echo ($datos['SuperficieAgricola'] != '') ? 'value="'.$datos['SuperficieAgricola'].'"' : "" ; ?>>
                                        <select name="m2ag">
                                            <option value="2" <?php echo ($datos['TipoTecho'] == 'Lamina') ? 'selected="selected"' : "" ; ?>>Hect&aacute;reas</option>
                                        </select>
                                    </p>
                                    </td></tr>
                                    <tr><td>
                                     <p>
                                        <label for="spastizal">Superficie de pastizal:<span class="note">*</span></label>
                                        <input type="text" name="spastizal" <?php echo ($datos['SuperficiePastizal'] != '') ? 'value="'.$datos['SuperficiePastizal'].'"' : "" ; ?>>
                                        <select name="m2pa">
                                            <option value="2" <?php echo ($datos['TipoTecho'] == 'Lamina') ? 'selected="selected"' : "" ; ?>>Hect&aacute;reas</option>
                                        </select>
                                    </p>
                                    </td>
                                    <td>
                                     <p>
                                        <label for="shabitable">Superficie habitable:<span class="note">*</span></label>
                                        <input type="text" name="shabitable" <?php echo ($datos['SuperficieHabitable'] != '') ? 'value="'.$datos['SuperficieHabitable'].'"' : "" ; ?>>
                                        <select name="m2hab">
                                            <option value="2" <?php echo ($datos['TipoTecho'] == 'Lamina') ? 'selected="selected"' : "" ; ?>>Hect&aacute;reas</option>
                                        </select>
                                    </p>
                                    </td></tr>
                                    <tr><td>
                                     <p>
                                        <label for="npozos">No. de pozos:<span class="note">*</span></label>
                                        <input type="text" name="npozos" <?php echo ($datos['NumeroPozos'] != '') ? 'value="'.$datos['NumeroPozos'].'"' : "" ; ?>>
                                    </p>
                                    </td>
                                    <td>
                                     <p>
                                        <label for="ncasas">N&uacute;mero de casas:<span class="note">*</span></label>
                                        <input type="text" name="ncasas" <?php echo ($datos['NumeroCasas'] != '') ? 'value="'.$datos['NumeroCasas'].'"' : "" ; ?>>
                                    </p>
                                    </td></tr>
                                </table>
                            </div>
                        </div>
                        <div id="tab-6" class="tab ui-tabs-panel ui-widget-content ui-corner-bottom">
                            <div id="propietario">
                                <h2>Guardar</h2>
                                     <p>
                                        <label for="datosprop">Registra propiedad:<span class="note">*</span></label>
                                        <!-- <select name="datosprop" id="datosprop">
                                            <option value="">--Seleccione--</option>
                                            <option value="1">Si</option>
                                            <option value="2">No</option>
                                        </select> -->
                                    </p>
                                <table style="width: 100%;" id="propietariodatos">
                                    <tr><td>
                                     <p>
                                        <label for="nombreprop">Nombre:<span class="nom">*</span></label>
                                        <input type="text" name="nombreprop"/>
                                    </p>
                                    </td>
                                    <td>
                                     <p>
                                        <label for="apellidosprop">Apellidos:<span class="note">*</span></label>
                                        <input type="text" name="apellidosprop"/>
                                    </p>
                                    </td></tr>
                                    <tr><td>
                                     <p>
                                        <label for="cel">Celular:<span class="note">*</span></label>
                                        <input type="text" name="cel"/>
                                    </p>
                                    </td>
                                    <td>
                                     <p>
                                        <label for="teloficina">tel&eacute;fono:<span class="note">*</span></label>
                                        <input type="text" name="teloficina"/>
                                    </p>
                                    </td></tr>
                                    <tr><td>
                                     <p>
                                        <label for="mail">Email:<span class="note">*</span></label>
                                        <input type="text" name="mail"/>
                                    </p>
                                    </td>
                                    <td>
                                    </td></tr>
                                </table>
                                 <div class="errores"><span></span></div>
                            <p>
                                <?php $retVal = (isset($_GET[idpropiedad])) ? 'value="propUp"' : 'value="propIn"' ; ?>
                                <input type="hidden" name="action" <?php echo $retVal ?> />
                                <?php echo (isset($_GET[idpropiedad])) ? '<input type="hidden" name="idpropiedad" value="'.$_GET[idpropiedad].'">' : "" ; ?>
                                <input class="button" type="submit" value="Registrar"/>
                                <div id="cargando"></div>
                            </p>
                        </div>
                    </form>
                        <div style="display:none" id="next">
                            <a class="button" id="carga" href="subir.php">Subir imágenes</a>
                        </div>
                        </div>
                    <div id="fotovideo">
                        <h2>Fotos y/o videos</h2>
                            <table id="files" align="center">
                                <tr valign="baseline">
                                    <td colspan="2">
                                    </td>
                                </tr>
                            </table>
                            <form id="file_upload" action="upload.php" method="POST" enctype="multipart/form-data">
                            <input type="file" name="file" multiple/>
                            <button>Upload</button>
                            <div align="center">
                                <img src="images/upload.png" alt="Subir imagen"/> Subir imagenes de propiedad
                            </form>
                            <button id="fin">Finalizar</button>                            
                    		</div>
                            </div>
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