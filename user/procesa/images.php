<?php
	require_once("../clases/clase.imgPrinc.php");
    $img= new ImgPrin();
    $principal=$img->principal($_POST['img']);
    if($principal==1){
        echo 1; 
    }
    
    
    
?>