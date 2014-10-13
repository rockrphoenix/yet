<?php
	include_once("../../clases/class.conexion.php");
	class Combo extends Conexion
	{
		function __construct()
		{
			parent::__construct();
		}
		public function muestraAsesor(){
			$colonia = $this->conexion->query("SELECT iddatos,Nombres,Paterno FROM tbldatos d inner join tbltipousuario t on t.idTipoUsuario=d.idTipoUsuario WHERE t.Usuario=2")or die("Morí en el intento");
			return $colonia;
		}
        
        
        
	}
?>