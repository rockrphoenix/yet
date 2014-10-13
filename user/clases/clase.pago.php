<?php
	require_once("../clases/class.conexion.php");
	class Pago extends Conexion
	{
		function __construct(){
			$_GET;
			$_SESSION;
			parent::__construct();
		}
		public function buscaPaquete(){
			$resultado = $this->conexion->query("SELECT * FROM catpaquetes WHERE idpaquete = '$_GET[id]'")or die("No busqué en paquetes");
			$resultArray = $resultado->fetch_array(MYSQL_ASSOC);
			if (count($resultArray)>0) {
				return $resultArray;
			}else{
				return false;
			}
			$this->conexion->close();
		}
		public function valida(){
			$val = $this->conexion->query("SELECT id FROM tblpaquete WHERE idpaquete = '$_GET[id]' AND iddatos = '$_SESSION[id]'")or die ("No puedo validar los paquetes");
			$validacion = $val->fetch_array(MYSQL_ASSOC);
			$retVal = (count($validacion)==0) ? true : false ;
			return $retVal;
			$this->conexion->close();
		}
		public function operaciones(){
			$datos = $this->buscaPaquete();
			if ($datos != false) {
				switch ($_GET[periodo]) {
					case 't':
						$periodo = 3;
						$porcentaje = 0;
						break;
					case 's':
						$periodo = 6;
						$porcentaje = 0.139;
						break;
					case 'a':
						$periodo = 12;
						$porcentaje = 0.2361;
						break;
					default:
						$periodo = 1;
						$porcentaje = 0;
						break;
				}
				$multiplo = $datos[Costo]*$periodo;
				$descuento = $multiplo*$porcentaje;
				$total = $multiplo-$descuento;
				$iva = $total*0.16;
				$neto = $total+$iva;
				$elementos = array("total" => $total,"neto" => $neto);
				return $elementos;
			}else{
				return false;
			}
			$this->conexion->close();
		}
		public function registraPaquete(){
			$datos = $this->buscaPaquete();
			$val = $this->valida();
			if ($val == true) {
				if ($datos != false) {
					$fecha = date(Y).'-'.date(m).'-'.date(d);
					$inserta = $this->conexion->query("INSERT INTO tblpaquete (paquete, fechaInicio, vencimiento, status, idpaquete, iddatos) VALUES ('$datos[Paquete]','$fecha','$fecha','0',$datos[idPaquete],'$_SESSION[id]')")or die("No puedo registrar el paquete");
					if ($inserta != false) {
						$cliente = $this->actualizaCliente();
						$retVal = ($cliente!=false) ? true : false ;
						return $retVal;
					}else{
						return false;
					}
				}
			}else{
				return false;
			}
			$this->conexion->close();
		}
		public function actualizaCliente(){
			$inserta = $this->conexion->query("UPDATE tbldatos SET Status = '9' WHERE iddatos = '$_SESSION[id]'")or die("No puedo actualizar el cliente");
			$retVal = ($inserta != false) ? true : false ;
			return $retVal;
			$this->conexion->close();
		}
	}
?>