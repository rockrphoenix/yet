<?php 
/**
* 
*/
require_once("../../clases/class.conexion.php");
class ocultaOficina extends Conexion
{
	
	function __construct()
	{
		$_POST;
		$_SESSION;
		parent::__construct();
	}

	public function ocultOffice(){

		$id=$this->conexion->real_escape_string($_POST['id']);
		$oculto=$this->conexion->query("UPDATE tbloficina SET status= 0 WHERE idoficina='$id'") or die("no se pudo modificar el registro");
		$this->conexion->close();
	}
}
?>