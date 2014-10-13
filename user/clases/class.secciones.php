<?php 
require_once("../../clases/class.conexion.php");
/**
* 
*/
class Secciones extends Conexion
{
	protected $titulo;
	protected $descipcion;
	protected $idcli;
	protected $idseccion;

	function __construct()
	{
		$_POST;
		
		parent::__construct();
		$this->idcli=$this->conexion->real_escape_string($_POST['idcli']);
		$this->titulo=$this->conexion->real_escape_string($_POST['titulo']);
		$this->descripcion=$this->conexion->real_escape_string($_POST['descripcion']);
		$this->idseccion=$this->conexion->real_escape_string($_POST['idseccion']);
		$this->ocultIdSecc=$this->conexion->real_escape_string($_POST['id_oculta']);

	}

	public function insertarSecc(){
		$numero=$this->conexion->query("SELECT * FROM tblseccion WHERE idcliente='$this->idcli' AND estatus ='1'");
		$resultado=$numero->num_rows;
		if ($resultado <= 1) {
			$insert=$this->conexion->query("INSERT INTO tblseccion (titulo,descripcion,idcliente,estatus)VALUES('$this->titulo','$this->descripcion','$this->idcli','1')")or die("no puedo insertar en secciones");
			if ($insert != FALSE ) {
			  	return 1;
			}else{
				return 0;
			}
		}else{
			return 3;
		}

		
	}

	public function updateSecc(){
		$update=$this->conexion->query("UPDATE tblseccion SET titulo='$this->titulo', descripcion='$this->descripcion' WHERE idseccion='$this->idseccion' AND idcliente='$this->idcli'")or die("no se pudo actualizar las secciones");
		if ($update != FALSE) {
				return 1;
			}else{
				return 0;
			}
	}

	function ocultSeccion(){
		    $oculto=$this->conexion->query("UPDATE tblseccion SET estatus= 0 WHERE idseccion='$this->ocultIdSecc'") or die("no se pudo modificar el registro");
		    $this->conexion->close();
		    if ($oculto != FALSE) {
				return 1;
			}else{
				return 0;
			}
		}
}
 ?>