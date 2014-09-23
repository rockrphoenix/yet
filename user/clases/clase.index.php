<?php
	require_once("../clases/class.conexion.php");
	class Index extends Conexion
	{
		protected $conexion;		
		function __construct()
		{
			$_SESSION;
			parent::__construct();
		}
		function asignar(){
			$resultO = $this->conexion->query("SELECT Status FROM tbldatos WHERE iddatos = '$_SESSION[id]'")or die("No puedo asignar");
			$resultArray = $resultO->fetch_array(MYSQL_ASSOC);
			return $resultArray[Status];
		}
		function asignaAsesor(){
			$resultO = $this->conexion->query("SELECT estatus FROM tblasesores WHERE idasesor = '$_SESSION[idasesor]'")or die ("No puedo asignar a asesor");
			$resultArray = $resultO->fetch_array(MYSQL_ASSOC);
			//echo $resultArray[estatus];
			$retVal = ($resultArray[estatus]==1) ? 3 : 4 ;
			//echo $retVal;
			return $retVal;
		}
		function cuentaPropiedades(){
			$Propiedades = $this->conexion->query("SELECT count(*) as conteo FROM tblpropiedad WHERE idcliente = '$_SESSION[id]' and Estatus = '1'")or die("no encuentro datos del index");
			$prop = $Propiedades->fetch_array(MYSQL_ASSOC);
			return $prop['conteo'];
			$this->conexion->close();
			$prop->free();
		}
		function cuentaOficinas(){
			$Propiedades = $this->conexion->query("SELECT count(*) as conteo FROM tbloficina WHERE idcliente = '$_SESSION[id]' and status='1'")or die("no encuentro datos del index");
			$prop = $Propiedades->fetch_array(MYSQL_ASSOC);
			return $prop['conteo'];
			$this->conexion->close();
			$prop->free();
		}
		function cuentaAsesores(){
			$Propiedades = $this->conexion->query("SELECT count(*) as conteo FROM tblasesores WHERE idcliente = '$_SESSION[id]' and estatus ='2'")or die("no encuentro datos del index");
			$prop = $Propiedades->fetch_array(MYSQL_ASSOC);
			return $prop['conteo'];
			$this->conexion->close();
			$prop->free();
		}
		function cuentaSecciones(){
			$Propiedades = $this->conexion->query("SELECT count(*) as conteo FROM tblsecciones WHERE idcliente = '$_SESSION[id]' and ")or die("no encuentro datos del index");
			$prop = $Propiedades->fetch_array(MYSQL_ASSOC);
			return $prop['conteo'];
			$this->conexion->close();
			$prop->free();
		}
	}
?>