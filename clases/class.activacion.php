<?php
	require_once("class.conexion.php");
	/**
	* por Marco Antonio Izaguirre para grupo SySE
	*/
	class Activacion extends Conexion
	{
		function __construct()
		{
			$_GET;
			parent::__construct();
		}
		public function verificar(){
			$verifica = $this->conexion->query("SELECT iddatos FROM tbldatos WHERE iddatos = '$_GET[id]' AND Status = 0")or die("No puedo buscar el usuario activado");
			$verificaArray = $verifica->fetch_array(MYSQL_ASSOC);
			$retVal = (count($verificaArray)>0) ? true : false ;
			return $retVal;
			$this->conexion->close();
		}
		public function activar(){
			$var = $this->verificar();
			if ($var != false) {
				$id = $_GET[id];
				$di = $_GET[di];
				$activa = $this->conexion->query("UPDATE tbldatos SET Status = '1' WHERE iddatos = '$id'")or die("No puedo activar");
				$retVal = ($activa != false) ? true : false ;
				return 1;//retorna 1 si activó al cliente
			}else{
				return 0;
			}
			$this->conexion->close();
		}
		public function verificaAsesor(){
			$verifica = $this->conexion->query("SELECT idasesor FROM tblasesores WHERE idasesor = '$_GET[id]' AND estatus = 0")or die("No puedo buscar el usuario activado asesor");
			$verificaArray = $verifica->fetch_array(MYSQL_ASSOC);
			$retVal = (count($verificaArray)!=0) ? $verificaArray[idasesor] : false ;
			return $retVal;
			$this->conexion->close();
		}
		public function activaAsesor(){
			$var = $this->verificaAsesor();
			if ($var != false) {
				$id = $_GET['id'];
				$di = $_GET['di'];
				$activa = $this->conexion->query("UPDATE tblasesores SET estatus = '1' where idasesor = '$_GET[id]'")or die("No puedo activar asesor");
				$retVal = ($this->conexion->affected_rows != 0) ? 1 : 0 ;
				$this->conexion->close();
				return $retVal;
			}else{
				return false;
			}
		}
	}
?>