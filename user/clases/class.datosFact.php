<?php 
require_once("../../clases/class.conexion.php");
/**
* 
*/
class datosFact extends Conexion
{
	protected $idCli;
	protected $nombreRs;
	protected $rfc;
	protected $calle;
	protected $cp;
	protected $numero;
	protected $noInt;
	protected $colonia;
	protected $delegacion;
	protected $estado;
	protected $ciudad;
   	protected $telefono;
   	protected $mail;
	
	function __construct()
	{
		$_POST;
		parent::__construct();
		$this->idCli=$this->conexion->real_escape_string($_POST['idcli']);
		$this->nombreRs=$this->conexion->real_escape_string($_POST['nombreRs']);
		$this->rfc=$this->conexion->real_escape_string($_POST['rfc']);
		$this->cp=$this->conexion->real_escape_string($_POST['cp']);
		$this->calle=$this->conexion->real_escape_string($_POST['calle']);
		$this->numero=$this->conexion->real_escape_string($_POST['numero']);
		$this->noInt=$this->conexion->real_escape_string($_POST['no_interior']);
		$this->colonia=$this->conexion->real_escape_string($_POST['colonia']);
		$this->delegacion=$this->conexion->real_escape_string($_POST['delegacion']);
		$this->estado=$this->conexion->real_escape_string($_POST['estado']);
		$this->ciudad=$this->conexion->real_escape_string($_POST['ciudad']);
		$this->telefono=$this->conexion->real_escape_string($_POST['telefono']);
		$this->mail=$this->conexion->real_escape_string($_POST['mail']);	
		$this->idUbi=$this->conexion->real_escape_string($_POST['idubi']);
			
	}

	public function insertUbicacion(){
		$insert=$this->conexion->query("INSERT INTO tblubicacion (Pais,Estado,Ciudad,Municipio,Colonia,Calle,NumeroExterior,NumeroInterior,CP) VALUES('1','$this->estado','$this->ciudad','$this->delegacion','$this->colonia','$this->calle','$this->numero','$this->noInt','$this->cp')")or die("no se insertaron datos");
		if ($insert != FALSE) {
			return $this->conexion->insert_id;
			}else{
				return FALSE;
			}
	}
	public function insertaFact(){
		$idUb=$this->insertUbicacion();		
			$ins=$this->conexion->query("INSERT INTO tbldatosfact (nombrers,rfc,tel,email,idcliente,idubicacion) 
				VALUES ('$this->nombreRs','$this->rfc','$this->telefono','$this->mail','$this->idCli','$idUb')")or die("no se pudo insertar en tblfact");
			if ($ins != FALSE) {
				return 1;
			}else{
				return 0;
			}	
	}

	public function actualizaUbic(){
		$actualUbi=$this->conexion->query("UPDATE tblUbicacion SET Estado='$this->estado',Ciudad='$this->ciudad',Municipio='$this->delegacion',Colonia='$this->colonia',Calle='$this->calle',NumeroExterior='$this->numero',NumeroInterior='$this->noInt',CP='$this->cp' WHERE idUbicacion='$this->idUbi'")or die("no se pudo actualizar");
		if ($actualUbi != FALSE) {
				return 1;
			}else{
				return 0;
			}
	}
	public function actualizaFact(){
		$actualFact=$this->conexion->query("UPDATE tbldatosfact SET nombrers='$this->nombreRs',rfc='$this->rfc',tel='$this->telefono',email='$this->mail'WHERE idUbicacion='$this->idUbi'AND idcliente='$this->idCli'")or die("no se pudo actualizar");
		if ($actualFact != FALSE) {
				return 1;
			}else{
				return 0;
			}
	}
}
?>