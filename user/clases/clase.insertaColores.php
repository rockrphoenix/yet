<?php
	require_once("../../clases/class.conexion.php");
	class InsertaColores extends Conexion
	{
		function __construct(){
			$_POST;
			$_SESSION;
			parent::__construct();
		}
		public function validacion(){//comprueba que los variables pasadas no vengan vacias
			if ($_POST['colora'] == "" || $_POST['colorb'] == "") {
				return FALSE;
			}else{
				return TRUE;
			}
		}
		public function actualizaColores(){//método que actualiza o inserta los colores en la base
			if ($this->validacion()) {
				$buscar = $this->conexion->query("SELECT idConfiguracion FROM tblconfiguracion WHERE idInmobiliaria = '$_POST[id]'")or die("No puedo buscar la tabla");
				$resultado = $buscar->fetch_array(MYSQL_ASSOC);
				if (count($resultado)!=0) {//si encuentra el registro entonces lo actualizo
					$actualizar = $this->conexion->query("UPDATE tblconfiguracion SET ColorFondo = '$_POST[colora]', ColorPrincipal = '$_POST[colorb]' WHERE idInmobiliaria = '$_POST[id]'")or die("No puedo actualizar colores");
					$retVal = ($actualizar) ? $resultado[idConfiguracion] : FALSE ;
					return $retVal;
				} else {//si no encuentro registro entonces lo creo
					$insertar = $this->conexion->query("INSERT INTO tblconfiguracion (ColorFondo, ColorPrincipal, ColorTexto, Logotipo, Titulo, Descripcion, RutaCOntenido, idInmobiliaria) VALUES ('$_POST[colora]','$_POST[colorb]', '#000', '0','0','0','0','$_POST[id]')")or die("No puedo insertar colores");
					$retVal = ($insertar) ? $this->conexion->insert_id : FALSE ;
					return $retVal;
				}
			}										
		}
	}