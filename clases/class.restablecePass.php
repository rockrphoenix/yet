<?php
	class restablecePass
	{
		public $conexion;
		
		function __construct()
		{
			$_POST;
			$this->conexion = new mysqli("db539063414.db.1and1.com","dbo539063414", "Palabra!1", "db539063414")or die("No puedo conectarme");
			//$this->conexion = new mysqli("localhost","root", "", "mydb")or die("No puedo conectarme");
		}	
		public function buscarMail(){
			$resultado=$this->conexion->query("SELECT iddatos,Email FROM tbldatos WHERE Email='$_POST[mail]'")or die("problemas al conectar");
			$reg=$resultado->fetch_array(MYSQL_ASSOC);
			if (!$reg) {
				return false;
			}else{
				return $reg;
			}
		}

		public function confirmaCambio(){
			$actualiza=$this->conexion->query("UPDATE tbldatos SET resetPass=1 WHERE Email='$_POST[mail]'");
			if ($actualiza) {
				return true;
<<<<<<< HEAD
=======

>>>>>>> 1f22693d82efdd027128b4a534fecb9d8f3230a5
			}else{
				return false;
			}
		}
	}	
	
?>