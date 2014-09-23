<?php
	require_once("../../clases/class.conexion.php");
	class Col extends Conexion
	{
		function __construct()
		{
			$_GET;
			parent::__construct();
		}
		public function encuentraColonia(){
			$colonia = $this->conexion->query("SELECT * FROM tblcatcodigos WHERE d_asenta like '%$_GET[term]%' limit 7")or die("Morí en el intento");
            //echo "SELECT * FROM tblcatalogocp WHERE colonia like '%$_GET[term]%'";
            //print_r($colonia->fetch_assoc());
			return $colonia;
		}
        
        
        
	}
?>