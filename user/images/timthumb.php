<?php
$file = $_GET["file"];
$width = $_GET["width"];

// Ponemos el . antes del nombre del archivo porque estamos considerando que la ruta está a partir del archivo thumb.php
$file_info = getimagesize($file);
//echo "hola";
//echo $file_info;
// Obtenemos la relación de aspecto
$ratio = $file_info[0] / $file_info[1];

// Calculamos las nuevas dimensiones
$newwidth = $width;
$newheight = round($newwidth / $ratio);

// Sacamos la extensión del archivo
$ext = explode(".", $file);
$ext = strtolower($ext[count($ext) - 1]);
if ($ext == "jpeg") $ext = "jpg";

// Dependiendo de la extensión llamamos a distintas funciones
switch ($ext) {
        case "jpg":
                $img = imagecreatefromjpeg($file);
        break;
        case "png":
                $img = imagecreatefrompng($file);
        break;
        case "gif":
                $img = imagecreatefromgif($file);
        break;
}
// Creamos la miniatura
$thumb = imagecreatetruecolor($newwidth, $newheight);
// La redimensionamos
imagecopyresampled($thumb, $img, 0, 0, 0, 0, $newwidth, $newheight, $file_info[0], $file_info[1]);
// La mostramos como jpg
header("Content-type: image/jpeg");
imagejpeg($thumb, null, 80);
?>