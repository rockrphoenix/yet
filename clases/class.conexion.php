<?php
	class Conexion
	{
		protected $conexion;
		function __construct()
		{
			//$this->conexion = new mysqli("db539063414.db.1and1.com","dbo539063414", "Palabra!1", "db539063414")or die("No puedo conectarme");
<<<<<<< HEAD
			$this->conexion = new mysqli("localhost","root", "", "mydb2")or die("No puedo conectarme");
=======
			$this->conexion = new mysqli("localhost","root", "", "mydb_respaldo")or die("No puedo conectarme");
>>>>>>> 1f22693d82efdd027128b4a534fecb9d8f3230a5
		}
	}
?>