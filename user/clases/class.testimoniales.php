<?php 
require_once("../../clases/class.conexion.php");

/**
* 
*/
class Testimoniales extends Conexion
{
	
	function __construct()
	{
		$_SESSION;
		$_GET;
		$_POST;

		parent::__construct();
	}

	function insertaTestim(){
		
		$idcli=$_POST[idcli];
		$descripcion=$_POST[descli];
		$comentario=$_POST[comentario];
		$insert=$this->conexion->query("INSERT INTO tbltestimoniales (descripcion,comentario,estatus,idcli)VALUES('$descripcion','$comentario','1','$idcli')")or die("no puedo insertar en testimoniales cliente");			
			if (isset($insert)) {
				return 1;
			}else{
				return 0;
			}

	}
	

	function updateTestim(){


		$update=$this->conexion->query("UPDATE tbltestimoniales SET descripcion='$_POST[descli]', comentario='$comentario=$_POST[comentario]' WHERE idtest='$_POST[idcomen1]' AND idcli='$_POST[idcli]'")or die("no se pudo actulizar el testimonial");
		//print_r($update);
		if ($update != FALSE) {
				return 1;
			}else{
				return 0;
			}
	}

	function octestim(){
		$update=$this->conexion->query("UPDATE tbltestimoniales SET estatus='0' WHERE idtest='$_POST[id_ocultests]' ")or die("no se pudo eliminar el testimonial");
		//print_r($update);
		if ($update != FALSE) {
				return 1;
			}else{
				return 0;
			}
	}
}



 ?>