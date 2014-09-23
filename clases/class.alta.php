<?php
	require_once("class.conexion.php");
	class AltaUsuario extends Conexion
	{
		public $conexion;
		public $arrayDatos;
		function __construct()
		{
			$this->arrayDatos = $_POST;
			parent::__construct();
		}
		public function verificar(){
			if (count($this->arrayDatos)!=0) {
				$verificar = $this->conexion->query("SELECT iddatos FROM tbldatos WHERE Email = '$_POST[mail]'")or die("Problemas al validar usuario");
				$resultado = $verificar->fetch_array(MYSQL_ASSOC);
				if (count($resultado)!=0) {
					return false;
				}else{
					return true;
				}
			}else{
				return false;
			}
		}
		public function insertarUbicacion(){
			$insertaUbicacion = $this->conexion->query("INSERT INTO tblubicacion (Pais) VALUES ('1')")or die("Error insertando en ubicacion");
			if ($insertaUbicacion) {
				return $this->conexion->insert_id;
			}else{
				return false;
			}
		}
		public function insertaTipo(){
			$insertaTipo = $this->conexion->query("INSERT INTO tbltipousuario (Usuario) VALUES ('1')")or die("No puedo insertar en Tipo de usuario");
			if ($insertaTipo) {
				return $this->conexion->insert_id;
			}else{
				return false;
			}
		}
		public function insertaDatos(){
			if ($this->verificar()!=false) {
				$psw = md5($_POST[psw]);
				$fecha = date(Y).'-'.date(m).'-'.date(d);
				$fechaNac = explode("/", $_POST[ingreso]);
				$nac = "$fechaNac[2]-$fechaNac[0]-$fechaNac[1]";
				$idUbicacion = $this->insertarUbicacion();
				$idTipoUsuario = $this->insertaTipo();
				if ($idUbicacion != false && $idTipoUsuario != false) {
					$insertaDatos = $this->conexion->query("INSERT INTO tbldatos (Usuario, Nombres, Paterno, Materno, Email, Status, Contra, FechaNacimiento, idUbicacion, Fecha, idTipoUsuario)
					VALUES ('$_POST[mail]','$_POST[nombre]','$_POST[paterno]','$_POST[materno]','$_POST[mail]','0','$psw','$nac','$idUbicacion','$fecha','$idTipoUsuario')")or die("No puedo insertar en Datos");	
					if ($insertaDatos!=false) {
						$idUsuario = $this->conexion->insert_id;
						$inmo = $this->insertaInmobiliaria($idUsuario);
						if ($inmo != false) {
							return $idUsuario;
						}else{
							return false;
						}
					}else{
						return 0;
					}
				}else{
					return 0;
				}
			}else{
				return 2;
			}
		}
		public function insertaInmobiliaria($id){
			$fecha = date(Y).'-'.date(m).'-'.date(d);
			$insertaInmo = $this->conexion->query("INSERT INTO tblinmobiliaria (idCliente, Nombre, Email, Fecha, Estatus) VALUES ('$id', '0', '$_POST[mail]', '$fecha', '1')")or die("No puedo insertar en inmobiliaria");
			if ($insertaInmo != FALSE) {
				return 1;
			}else{
				return FALSE;
			}
		}
	}	
?>