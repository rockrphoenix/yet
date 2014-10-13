<?php 
require_once("../clases/class.conexion.php");

/**
* 
*/
class muestraOficina extends Conexion
{
	
	function __construct()
	{
		$_SESSION;
		$_GET;
		parent::__construct();
	}

	public function mostrarOficina(){
		$busca=$this->conexion->query("SELECT * FROM tbloficina WHERE idcliente = '$_SESSION[id]' and status = 1 ORDER BY idoficina")or die("no se encontraron datos");
		return $busca;
	}

	public function paraEditar(){
		$busca=$this->conexion->query("SELECT * FROM tbloficina WHERE idoficina= $_GET[id] && status = 1 ORDER BY idoficina")or die("no se encontraron datos");
		return $busca;
	}
}


 ?>