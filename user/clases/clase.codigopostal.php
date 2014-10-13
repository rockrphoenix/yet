<?php
	require_once("../../clases/class.conexion.php");
	class CP extends Conexion
	{
		function __construct()
		{
			$_GET;
			parent::__construct();
		}
		public function encuentraCodigo(){
			$busca = $this->conexion->query("SELECT * FROM tblcatcodigos WHERE d_codigo = '$_GET[term]'")or die("Morí en el intento");
			return $busca;
		}
	}
?>