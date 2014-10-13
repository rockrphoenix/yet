<?php
	require_once("../../clases/class.conexion.php");
	class Exporta extends Conexion
	{	
		function __construct()
		{
			parent::__construct(); //hereda el método constructor con el atributo que contiene la conexión a la base de datos
			$_SESSION;//este array contiene datos de sesion necesesarios para las consultas
		}
		function propiedadExcel(){
				$consulta = $this->conexion->query("SELECT * FROM exporta_excel WHERE idcliente = '$_SESSION[id]'")or die("no consulté la propiedad para excel");
				while ($fila = $consulta->fetch_array(MYSQL_ASSOC)) {
					$arrayHeader = $fila;
					$str .= '<tr>';
						foreach ($fila as $key => $value) {
							if ($key == 'Destaque') {
								switch ($value) {
									case '1': $str .= '<td>Destacada</td>'; break;
									case '0': $str .= '<td>No</td>'; break;
								}
							}else if ($key == 'EstatusPropiedad') {
								switch ($value) {
									case '1': $str .= '<td>Oportunidad</td>'; break;
									case '2': $str .= '<td>Oferta</td>'; break;
									case '3': $str .= '<td>En proceso de venta</td>'; break;
									case '4': $str .= '<td>En proceso de renta</td>'; break;
									case '5': $str .= '<td>Vendida</td>'; break;
									case '6': $str .= '<td>Rentada</td>'; break;
									case '0': $str .= '<td>No aplica</td>'; break;
								}
							}elseif($key == 'publicacion'){
								switch ($value) {
									case '1': $str .= '<td>Publicada</td>'; break;
									case '0': $str .= '<td>Oculta</td>'; break;
								}
							}else{
								$str .= ($value!="" and $value!="null") ? '<td>'.$value.'</td>' : '<td>No Aplica</td>' ;
							}
						}
					$str .= '</tr>';
				}
				$strHeader = '<tr>';
				foreach ($arrayHeader as $key => $value) {
					$strHeader .= '<th>'.$key.'</th>';
				}
				$strHeader .= '</tr>';
				return $strHeader.$str;
		}
	}
?>