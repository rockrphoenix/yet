<?php
    session_start();
	require_once("../../clases/class.conexion.php");
	class ImgPrin extends Conexion
	{
		function __construct()
		{
			parent::__construct();
		}
        public function insertaUrl($url,$propiedad){
			$insercion = $this->conexion->query("INSERT INTO tblimagenes(imagen,principal,idpropiedad) VALUES ('$url','0','$propiedad')")or die("no puedo inbsertar en tipo de usuario");
			if ($insercion != false) {
					return true;
				}else{
					return false;
				}
        }
        
        public function principal($url){
            $propiedad=$_SESSION['idPropiedad'];
			$reset = $this->conexion->query("update tblimagenes SET principal=0 where idPropiedad=".$_SESSION['idPropiedad']."")or die("no puedo actualizar img principal");
			$insercion = $this->conexion->query("update tblimagenes SET principal=1 where imagen='$url' and idPropiedad=".$_SESSION['idPropiedad']."")or die("no puedo actualizar img principal");
			if ($insercion != false) {
					return true;
				}else{
					return false;
				}
        }
	}
?>