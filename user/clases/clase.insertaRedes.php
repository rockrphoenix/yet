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
		foreach ($_POST as $value) {
			$value=$this->conexion->real_escape_string($value);
		}
	}
	public function insertarRedes(){
		$buscar=$this->conexion->query("SELECT idInmobiliaria FROM tblconfiguracion WHERE idInmobiliaria='$_POST[id]'")or die("no se encontraron datos");
		$result=$buscar->fetch_array(MYSQL_ASSOC);
		if (count($result)!= 0) {
			$actualizar=$this->conexion->query("UPDATE tblconfiguracion SET titulopagina='$_POST[titpag]', facebook='$_POST[face]', twitter='$_POST[twitter]', youtube='$_POST[youtube]',correocontacto = '$_POST[mail]', telprinc = '$_POST[tel]', telsec = '$_POST[tel2]' WHERE idInmobiliaria ='$_POST[id]'")or die("no se pudo actualizar configuracion");
			$retVal = ($this->conexion->affected_rows!=0) ? 1 : 0 ;
			return $retVal;
		}else{
			$insercion=$this->conexion->query("INSERT INTO tblconfiguracion (titulopagina,facebook,twitter,youtube,idInmobiliaria, correocontacto, telprinc, telsec) VALUES ('$_POST[titpag]','$_POST[face]','$_POST[twitter]','$_POST[youtube]',$_POST[id], $_POST[mail], $_POST[tel], $_POST[tel2])")or die("no se pudo ingresar a configuracion");
			$retVal = ($this->conexion->affected_rows!=0) ? 1 : 0 ;
			return $retVal;
		}
	}
	function __destruct(){
		$this->conexion->close();
	}
}

?>