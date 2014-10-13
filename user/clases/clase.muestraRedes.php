<?php 
/**
* 
*/
require_once('../clases/class.conexion.php');
class muestraRedes extends Conexion
{	
	function __construct()
	{
		$_SESSION;
		parent::__construct();
	}
	public function buscaRedes(){
		$buscar = $this->conexion->query("SELECT * FROM tblconfiguracion WHERE idInmobiliaria='$_SESSION[inmobiliaria]'")or die("no se pudieron obtener los datos");
		$resultado = $buscar->fetch_array(MYSQL_ASSOC);
		return $resultado;
		$this->conexion->close();
	}
	
}

?>