<?php 
require_once("../../clases/class.conexion.php");

/**
* 
*/
class Asociaciones extends Conexion
{
	
	function __construct()
	{
		$_SESSION;
		$_GET;
		$_POST;

		parent::__construct();
	}

	function InsertaAsoc1(){
		$titulo1="AMPI - Asociación Mexicana de Profesionales Inmobiliarios";
		$titulo2="Consejo Nacional de Normalización y Certificación de Competencias Laborales";
		$titulo3="Confederación Patronal de la República Mexicana";
		$titulo4="National Association of Realtors";
		$url1="http://www.ampi.org/";
		$url2="http://www.conocer.gob.mx/";
		$url3="http://www.coparmexdf.org.mx/";
		$url4="http://www.realtor.org/";
		$idcli=$_POST[idcli];
		
		if (isset($_POST[ampi])) {
			$insert=$this->conexion->query("INSERT INTO tblasociaciones (titulo,url,estatus,idcli)VALUES('$titulo1','$url1','1','$idcli')")or die("no puedo insertar en asociaciones1");
			}
		if (isset($_POST[conocer])) {
			$insert=$this->conexion->query("INSERT INTO tblasociaciones (titulo,url,estatus,idcli)VALUES('$titulo2','$url2','1','$idcli')")or die("no puedo insertar en asociaciones1");
			}
		if (isset($_POST[coparmex])) {
			$insert=$this->conexion->query("INSERT INTO tblasociaciones (titulo,url,estatus,idcli)VALUES('$titulo3','$url3','1','$idcli')")or die("no puedo insertar en asociaciones1");
			}
		if (isset($_POST[nar])) {
			$insert=$this->conexion->query("INSERT INTO tblasociaciones (titulo,url,estatus,idcli)VALUES('$titulo4','$url4','1','$idcli')")or die("no puedo insertar en asociaciones1");
			}			
			if (isset($insert)) {
				return 1;
			}else{
				return 0;
			}

	}
	function InsertaAsoc2(){
		$idcli=$_POST[idcli2];
		$titulo=$_POST[titulo];
		$url=$_POST[url];
		
		$insert=$this->conexion->query("INSERT INTO tblasociaciones (titulo,url,estatus,idcli)VALUES('$titulo','$url','1','$idcli')")or die("no puedo insertar en asociaciones2");
		if ($insert != false) {
			return 1;
		}else{
			return 0;
		}
	}	

	function updateAsoc(){


		$update=$this->conexion->query("UPDATE tblasociaciones SET titulo='$_POST[titulo]', url='$_POST[url]' WHERE idasoc='$_POST[idas2]' AND idcli='$_POST[idcli2]'")or die("no se pudo actulizar la asociación");
		//print_r($update);
		if ($update != FALSE) {
				return 1;
			}else{
				return 0;
			}
	}

	function ocAseoc(){
		$update=$this->conexion->query("UPDATE tblasociaciones SET estatus='0' WHERE idasoc='$_POST[id_ocultaas]' ")or die("no se pudo eliminar la asociación");
		//print_r($update);
		if ($update != FALSE) {
				return 1;
			}else{
				return 0;
			}
	}
}



 ?>