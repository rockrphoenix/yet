<?php
require_once('../../clases/class.conexion.php');
class Asesores extends Conexion
{
	public function __construct(){
		$_POST;
		parent::__construct();
	}
	public function verificar(){
		if (count($_POST)!=0) {
			$verificar = $this->conexion->query("SELECT idasesor FROM tblasesores WHERE email = '$_POST[email]'")or die("Problemas al validar usuario");//selecciono de datos que sean igual al email que envio
			$resultado = $verificar->fetch_array(MYSQL_ASSOC);
			if (count($resultado)!=0) {//si encuentro algun datos retorno falso
				//echo "de verificar<br>";
				return false;
			}else{
				$tbldatos = $this->verificaTbldatos();
				$retVal = ($tbldatos != false) ? true : false ;
				return $retVal;
			}
		}else{
			return false;//si no me envian post también retorno falso
		}
		$this->conexion->close();
	}
	public function verificaTbldatos(){
		$verificar = $this->conexion->query("SELECT iddatos FROM tbldatos WHERE email = '$_POST[email]'")or die("Problemas al validar usuario");//selecciono de datos que sean igual al email que envio
		$resultado = $verificar->fetch_array(MYSQL_ASSOC);
		if (count($resultado)!=0) {//si encuentro algun datos retorno falso
			//echo "de verifica tbl<br>";
			return false;
		}else{
			return true;//si no encuentro retorno verdadero
		}
		$this->conexion->close();
	}
	public function generaPass(){
		//Se define una cadena de caractares. Te recomiendo que uses esta.
		$cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
		//Obtenemos la longitud de la cadena de caracteres
		$longitudCadena=strlen($cadena);
		//Se define la variable que va a contener la contraseña
		$pass = "";
		//Se define la longitud de la contraseña, en mi caso 10, pero puedes poner la longitud que quieras
		$longitudPass=6;
		//Creamos la contraseña
		for($i=1 ; $i<=$longitudPass ; $i++){
			//Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
			$pos=rand(0,$longitudCadena-1);
			//Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
			$pass .= substr($cadena,$pos,1);
		}
		return $pass;
	}
	public function insertaAsesor(){
		$num=$this->conexion->query("SELECT * FROM tblasesores WHERE idcliente='$_POST[id]'");
		$res=$num->num_rows;
		if ($res <=2) {
				if ($this->verificar()!=FALSE) {
				$randPass = $this->generaPass();
				$encPass = md5($randPass);
				$fecha = date(Y).'-'.date(m).'-'.date(d);
				$insertaAsesor = $this->conexion->query("INSERT INTO tblasesores (nombres, paterno, materno, email, Contra, tel, cel, estatus, idcliente) VALUES('$_POST[nombres]','$_POST[paterno]','$_POST[materno]','$_POST[email]','$encPass','$_POST[tel]','$_POST[cel]','0', '$_POST[id]')")or die("No puedo insertar en datos");
				if ($this->conexion->affected_rows!=0) {
					$aDatos = array(
					    1 => $this->conexion->insert_id,
					    2 => $randPass,
						);
						return $aDatos;//todo fue bien y retorno este array
					}else{
						return 0;//no inserte los datos
					}
				}else{
					return 2;//el mail del asesor ya esta registrado
				}
		}else{
			return 4;//no se pueden registrar mas asesores
		}
		
		$this->conexion->close();
	}
	public function modificaAsesor(){
		$actualiza = $this->conexion->query("UPDATE tblasesores SET nombres = '$_POST[nombres]', materno = '$_POST[materno]', paterno = '$_POST[paterno]', tel = '$_POST[tel]', cel = '$_POST[cel]' WHERE idcliente = '$_POST[id]' and idasesor = '$_POST[idAsesor]'")or die("No pude actualizar asesores");
		if ($this->conexion->affected_rows!=0) {
			return true;
		}else{
			//echo "de modifica asesor<br>";
			return false;
		}
		$this->conexion->close();
	}
	public function ocultAsesor(){
		$oculto=$this->conexion->query("UPDATE tblasesores SET estatus= 0 WHERE idasesor='$_POST[id_oculta]'") or die("no se pudo modificar el registro");
		$retVal = ($oculto != FALSE) ? 1 : 0 ;
		return $retVal;
		$this->conexion->close();
	}
}