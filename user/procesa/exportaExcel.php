<?php
	require_once('../../clases/class.logueo.php');
	require_once("../clases/clase.exporta.php");
	$valida= new Logueo();
	$estatus = $valida->validaSesion();
	$tabla = new Exporta($_SESSION);
	$filas = $tabla->propiedadExcel();
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="ejemplo1.xls"');
	header('Cache-Control: max-age=0');
?>
	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<meta charset="utf-8">
	</head>
		<body>
	
	
<?php
	echo '<table>
			<tr>
				<td>Propiedades de: '.$_SESSION[nombres].' '.$_SESSION[paterno].'
			</tr>';
	echo '<table>';
	echo $filas;
	echo '</table>';
?>
	</body>
</html>