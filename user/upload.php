<?php
require_once('../clases/class.logueo.php');
$valida= new Logueo();
$valida->validaSesion();

$nombre_archivo = $_FILES["file"]["name"]; 
$tipo_archivo = $_FILES["file"]["type"]; 
$tamano_archivo = $_FILES["file"]["size"];

 
if (!((strpos($tipo_archivo, "png") || strpos($tipo_archivo, "jpeg")) && (    $tamano_archivo < 3000000))) 
{  
    echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos gif o jpg<br><li>se permiten archivos de 300 Kb máximo.</td></tr></table>"; 
     
}else{
        //directorio de almacén de imágenes
        $uploaddir = "../../images_cy/$_SESSION[id]/";
        $uploaddirMin = "../../images_cy/$_SESSION[id]/min/";//carga de imagen miniatura
 

		$tmp_name = $_FILES['file']['tmp_name'];
        $random_digit=rand(0000,9999);
        if(strpos($tipo_archivo, "jpeg")){
            $tipo_imagen="jpg";
        }else{
            $tipo_imagen="png";
        }
        //nombre del fichero sin espacios en blanco
        //$nombre_fichero_sin_espacios=str_replace(" ","",$_FILES['file']['name']);
        $nombre_fichero_sin_espacios=$_SESSION['id'].'_'.$_SESSION['idPropiedad'].'_'.$random_digit.'.'.$tipo_imagen;
        //ruta completa del fichero
		$uploadfile = $uploaddir . $nombre_fichero_sin_espacios;
        $uploadfileMin = $uploaddirMin . $nombre_fichero_sin_espacios;//ruta del fichero miniatura
        //nombre del fichero
		$file_name=$_FILES['file']['name'];
        //compruebo si existe el directorio y si no existe lo creo
        if(!is_dir($uploaddir)){ 
            @mkdir($uploaddir, 0700); 
        }
        //compruebo si existe el fichero y si existe le pongo _copia_ en el nombre
		if (file_exists($uploadfile)){ 
   			$uploadfile = $uploaddir ."_copia_". $nombre_fichero_sin_espacios;
			$file_name="_copia_" .$nombre_fichero_sin_espacios;
		}
        if(move_uploaded_file($tmp_name,$uploadfile)){
            echo '{"name":"'.$uploadfile.'", "shortname": "'.$nombre_fichero_sin_espacios.'","dir": "'.$uploaddir.'"}';					
        }
        if(copy($uploadfile, $uploadfileMin)){
                             
        } 
        require_once('imagen.php');
        $newimg=resizeImagen($uploaddir.'/', $nombre_fichero_sin_espacios, 449, 743,$nombre_fichero_sin_espacios,$tipo_imagen);
        $newMin=resizeImagen($uploaddirMin.'/', $nombre_fichero_sin_espacios, 449, 743,$nombre_fichero_sin_espacios,$tipo_imagen);
        //INSERTA RUTAS DE IMAGEN EN LA BASE DE DATOS
    	require_once("clases/clase.img.php");
        $img= new Img();
        $imgPropiedad= $img->insertaUrl($uploadfile,$_SESSION['idPropiedad']);
        if($imgPropiedad==true){
            //echo 1;
        }else{
            //echo 0;
        }
        
} 
?>

