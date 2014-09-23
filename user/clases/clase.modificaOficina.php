<?php 
/**
* 
*/
require_once("../../clases/class.conexion.php");
class modificaOficina extends Conexion
{
	
	function __construct()
	{
		$_POST;
		$_SESSION;
		parent::__construct();
	}

	public function modOffice(){

		$id=$this->conexion->real_escape_string($_POST['id']);
		$nombre=$this->conexion->real_escape_string($_POST['nombre']);
		$calle=$this->conexion->real_escape_string($_POST['calle']);
		$numero=$this->conexion->real_escape_string($_POST['numero']);
		$noInt=$this->conexion->real_escape_string($_POST['no_interior']);
		$colonia=$this->conexion->real_escape_string($_POST['colonia']);
		$delegacion=$this->conexion->real_escape_string($_POST['delegacion']);
		$estado=$this->conexion->real_escape_string($_POST['estado']);
		$ciudad=$this->conexion->real_escape_string($_POST['ciudad']);
		$telefono=$this->conexion->real_escape_string($_POST['telefono']);

		$insercion=$this->conexion->query("UPDATE tbloficina SET nombre='$nombre',calle='$calle',numero='$numero',no_int='$noInt',colonia='$colonia',delegacion='$delegacion',estado='$estado',ciudad='$ciudad',telefono='$telefono' WHERE idoficina='$id'") or die("no se pudo modificar el registro");
		$this->conexion->close();
	}
}
?>