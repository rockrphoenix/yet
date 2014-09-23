<?php
	session_start();
	require_once('conexion.php');
	$FechaNacimiento = $_REQUEST[anio]."-".$_REQUEST[mes]."-".$_REQUEST[dia];
	if ($_REQUEST[interior]!="") {
		$interior = $_REQUEST[interior];
	}else{
		$interior = "NA";
	}
	mysql_query("UPDATE tblClientes INNER JOIN tblDatos ON tblClientes.tblDatos_idDatos = tblDatos.idDatos INNER JOIN tblUbicacion ON tblClientes.tblUbicacion_idUbicacion = tblUbicacion.idUbicacion SET tblClientes.Clientes='$_REQUEST[usuario]', tblClientes.Email='$_REQUEST[mail]', tblDatos.Nombres='$_REQUEST[nombre]', tblDatos.ApellidoPaterno = '$_REQUEST[paterno]', tblDatos.ApellidoMaterno = '$_REQUEST[materno]', tblDatos.Edad = '$FechaNacimiento', tblDatos.Tel = '$_REQUEST[tel]', tblDatos.Cel = '$_REQUEST[cel]', tblUbicacion.Calle = '$_REQUEST[calle]', tblUbicacion.Num = '$_REQUEST[exterior]', tblUbicacion.Ext = '$interior', tblUbicacion.Colonia = '$_REQUEST[colonia]', tblUbicacion.Municipio = '$_REQUEST[del]', tblUbicacion.Ciudad = '$_REQUEST[ciudad]', tblUbicacion.Estado = '$_REQUEST[estado]', tblUbicacion.Cp = '$_REQUEST[cp]' WHERE tblClientes.idClientes = '$_SESSION[id]'", $link) or die("Problemas insertando en usuarios ".mysql_error());
	mysql_close($link);
	header("Location: ../clientes/perfil.php?msjok=Datos_actualizados_correctamente");
	//UPDATE tblClientes INNER JOIN tblDatos ON tblClientes.tblDatos_idDatos = tblDatos.idDatos INNER JOIN tblUbicacion ON tblClientes.tblUbicacion_idUbicacion = tblUbicacion.idUbicacion SET tblClientes.Clientes='$_REQUEST[usuario]', tblClientes.Email='$_REQUEST[mail]', tblDatos.Nombres='$_REQUEST[nombre]', tblDatos.ApellidoPaterno = '$_REQUEST[paterno]', tblDatos.ApellidoMaterno = '$_REQUEST[materno]', tblDatos.Edad = '$FechaNacimiento', tblDatos.Tel = '$_REQUEST[tel]', tblDatos.Cel = '$_REQUEST[cel]', tblUbicacion.Calle = '$_REQUEST[calle]', tblUbicacion.Num = '$_REQUEST[ext]', tblUbicacion.Ext = '$interior', tblUbicacion.Colonia = '$_REQUEST[colonia]', tblUbicacion.Municipio = '$_REQUEST[del]', tblUbicacion.Ciudad = '$_REQUEST[ciudad]', tblUbicacion.Estado = '$_REQUEST[estado]', tblUbicacion.Cp = '$_REQUEST[cp]' WHERE tblClientes.idClientes = '$_SESSION[id]'
?>