<?php 
/**
* 
*/
require_once("../../clases/class.conexion.php");
class oficinas extends Conexion
{
	protected $idCliente;
	protected $idOculta;
	protected $idModif;
	protected $nombre;
	protected $calle;
	protected $numero;
	protected $noInt;
	protected $colonia;
	protected $delegacion;
	protected $estado;
	protected $ciudad;
   	protected $telefono;
	
	function __construct()
	{
		$_POST;		
		parent::__construct();
		
		$this->idCliente=$this->conexion->real_escape_string($_POST['id']);
		$this->idOculta=$this->conexion->real_escape_string($_POST['id_oculta']);
		$this->idModif=$this->conexion->real_escape_string($_POST['id_mod']);
		$this->nombre=$this->conexion->real_escape_string($_POST['nombre']);
		$this->descripcion=$this->conexion->real_escape_string($_POST['descripcion']);
		$this->numero=$this->conexion->real_escape_string($_POST['numero']);
		$this->noInt=$this->conexion->real_escape_string($_POST['no_interior']);
		$this->colonia=$this->conexion->real_escape_string($_POST['colonia']);
		$this->delegacion=$this->conexion->real_escape_string($_POST['delegacion']);
		$this->estado=$this->conexion->real_escape_string($_POST['estado']);
		$this->ciudad=$this->conexion->real_escape_string($_POST['ciudad']);
		$this->telefono=$this->conexion->real_escape_string($_POST['telefono']);	
	}

	public function insertOffice(){
		// echo "<br>id: ".$this->idCliente;
		// echo "<br>id_mod: ".$this->idModif;
		// echo "<br>nombre: ".$this->nombre;
		// echo "<br>calle: ".$this->calle;
		// echo "<br>num: ".$this->numero;
		// echo "<br>int: ".$this->noInt;
		// echo "<br>col: ".$this->colonia;
		// echo "<br>del: ".$this->delegacion;
		// echo "<br>est: ".$this->estado;
		// echo "<br>ciu: ".$this->ciudad;
		// echo "<br>tel: ".$this->telefono;
		$insercion=$this->conexion->query("INSERT INTO tbloficina (nombre,descripcion,status,idcliente) VALUES ('$this->nombre','$this->descripcion','1','$this->idCliente')")or die("no se pudo ingresar a oficinas");
		$retVal = ($insercion != FALSE) ? 1 : 0 ;
		return $retVal;
		$this->conexion->close();
	}

	public function modOffice(){
		$modifica=$this->conexion->query("UPDATE tbloficina SET nombre='$this->nombre', descripcion='$_POST[descripcion]' WHERE idoficina='$this->idModif'") or die("no se pudo modificar el registro");
		$retVal = ($modifica != FALSE) ? 1 : 0 ;
		return $retVal;
		$this->conexion->close();
	}

	public function ocultOffice(){

		$oculto=$this->conexion->query("UPDATE tbloficina SET status= 0 WHERE idoficina='$this->idOculta'") or die("no se pudo modificar el registro");
		$retVal = ($oculto != FALSE) ? 1 : 0 ;
		return $retVal;
		$this->conexion->close();
	}
}
?>


