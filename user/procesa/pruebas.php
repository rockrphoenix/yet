<?php
$ruta = "../../../imagenes_cy/24/22/renombrar.txt";
$semiruta = "../../../imagenes_cy/24/22/";
if (file_exists($ruta)) {
	rename($ruta, $semiruta.uniqid()."jpg");
} else {
	echo "no encontre el archivo";
}
?>