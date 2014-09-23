<?php
require_once('../../clases/class.conexion.php');
	/**
	* 
	*/
	class Perfil extends Conexion
	{
		public $fechaNac;
		public $nac;	
		function __construct()
		{
			$_POST;
			parent::__construct();
			foreach ($_POST as $valor) {
				$valor = $this->conexion->real_escape_string($valor);
			}unset($valor);			
			$this->fechaNac = explode("/", $_POST[Fecha]);
			$this->nac = "$fechaNac[2]-$fechaNac[0]-$fechaNac[1]";
		}
		function actualizaPerfil(){
			$actualiza = $this->conexion->query("UPDATE tbldatos SET Nombres = '$_POST[nombre]', Paterno = '$_POST[paterno]', Materno = '$_POST[materno]', Tel = '$_POST[telefono]', Cel = '$_POST[celular]' WHERE iddatos = '$_POST[id]'")or die("No puedo actualizar el perfil");
			$retVal = ($this->conexion->affected_rows != 0) ? 1 : 0 ;
			return $retVal;
			$this->conexion->close();
			$this->actualiza->free();
		}

		function actualizaAsesor(){
			$actualiza = $this->conexion->query("UPDATE tblasesores SET nombres = '$_POST[nombre]', paterno = '$_POST[paterno]', materno = '$_POST[materno]', tel = '$_POST[telefono]', cel = '$_POST[celular]' WHERE idasesor = '$_POST[id]'")or die("No puedo actualizar el perfil");
			$retVal = ($this->conexion->affected_rows != 0) ? 1 : 0 ;
			return $retVal;
			$this->conexion->close();
			$this->actualiza->free();
		}
	}
?>