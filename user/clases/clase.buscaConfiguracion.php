<?php
	require_once("../clases/class.conexion.php");
	class BuscaConfiguracion extends Conexion
	{
		function __construct(){
			$_SESSION;
			parent::__construct();
		}
		public function buscarColores(){
			$buscar = $this->conexion->query("SELECT ColorFondo, ColorPrincipal FROM tblconfiguracion WHERE idInmobiliaria = '$_SESSION[inmobiliaria]'")or die("No busque los colores en configuración");
			if ($buscar->num_rows != 0) {
				$resultado = $buscar->fetch_array(MYSQL_ASSOC);
				return $resultado;
			}else{
				$resultado = array("ColorFondo"=>"19B8DF","ColorPrincipal"=>"F6700E");
				return $resultado;
			}
		}
	}