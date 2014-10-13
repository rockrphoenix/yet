<?php
	require_once("../clases/class.conexion.php");
	class Paquetes extends Conexion
	{
		function __construct()
		{
			parent::__construct();
		}
		public function obtenPaquete(){
			$paquete = $this->conexion->query("SELECT Paquete, Descripcion, Costo FROM tblpaquetes WHERE Estatus = '1'")or die("Problemas buscando paquetes, inténtelo más tarde.");
			$arrayPaquetes = $paquete->fetch_array(MYSQL_ASSOC);
			return $arrayPaquetes;
		}
	}
?>