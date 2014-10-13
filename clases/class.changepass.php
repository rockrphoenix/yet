<?php
/**
 * @author arturo zarazúa
 * @copyright 2014
 */
class changePass{
		public $conexion;
		public $arrayDatos;
    function __construct(){
			$this->arrayDatos = $_POST;
<<<<<<< HEAD
			//$this->conexion = new mysqli("localhost","root", "", "mydb")or die("No puedo conectarme");
            $this->conexion = new mysqli("db539063414.db.1and1.com","dbo539063414", "Palabra!1", "db539063414")or die("No puedo conectarme");
=======
			$this->conexion = new mysqli("localhost","root", "", "mydb")or die("No puedo conectarme");
            //$this->conexion = new mysqli("db539063414.db.1and1.com","dbo539063414", "Palabra!1", "db539063414")or die("No puedo conectarme");
>>>>>>> 1f22693d82efdd027128b4a534fecb9d8f3230a5
    }
    public function change(){
		if (count($this->arrayDatos)!=0) {
            $contra= md5($_POST['newpass']);
            $user= $_POST['id'];
            $email= $_POST['mail'];
            $update= $this->conexion->query("UPDATE tbldatos SET Contra='$contra' WHERE iddatos='$user' AND Email='$email'")or die("no hay datos");
            if($this->conexion->affected_rows!=0){
                return true;
            }else{
                return false;
            }
        }else{
			return false;
		}
    }
}

?>