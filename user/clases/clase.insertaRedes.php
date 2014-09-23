<?php 
/**
* 
*/
require_once('../../clases/class.conexion.php');
class insertaRedes extends Conexion
{	
	function __construct()
	{
		$_POST;
		$_SESSION;
		parent::__construct();
	}
	public function insertarRedes(){
		$id=$this->conexion->real_escape_string($_POST['id']);
		$face=$this->conexion->real_escape_string($_POST['face']);
		$twit=$this->conexion->real_escape_string($_POST['twitter']);
		
		$buscar=$this->conexion->query("SELECT idInmobiliaria FROM tblconfiguracion WHERE idInmobiliaria='$id'")or die("no se encontraron datos");
		$result=$buscar->fetch_array(MYSQL_ASSOC);
		if (count($result)!= 0) {
			$actualizar=$this->conexion->query("UPDATE tblconfiguracion SET facebook='$face', twitter='$twit' WHERE idInmobiliaria ='$id'")or die("no se pudo actualizar configuracion");
			return $actualizar;
		}else{
			$insercion=$this->conexion->query("INSERT INTO tblconfiguracion (facebook,twitter,idInmobiliaria) VALUES ('$face','$twit',$id)")or die("no se pudo ingresar a configuracion");
			return $insercion;
		}	
		$this->conexion->close();
	}
	
}

?>