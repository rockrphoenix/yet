<?php
    session_start();
	class Restablece
	{
		public $conexion;		
		function __construct()
		{
			$_GET;
            $_POST;
            $this->conexion = new mysqli("db539063414.db.1and1.com","dbo539063414", "Palabra!1", "db539063414")or die("No puedo conectarme");
			//$this->conexion = new mysqli("localhost","root", "", "mydb")or die("No puedo conectarme");
		}
		public function validaCambio(){
           $resultado=$this->conexion->query("SELECT iddatos FROM tbldatos WHERE iddatos='$_GET[id]' AND resetPAss = 1")or die("problemas al conectar");
            $reg=$resultado->fetch_array(MYSQL_ASSOC);
           if (count($reg)>0) {
               return true;
           }else{
            return false;
           }
        }
        public function cambiaPass(){
            $resultado2=$this->conexion->query("UPDATE tbldatos SET Contra='$_POST[confnewpass]' WHERE iddatos='$_POST[id]'");
            if ($resultado2) {
                return true;
            }else{
                return false;
            }
        }
	}
?>