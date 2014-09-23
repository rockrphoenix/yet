<?php
	session_start();
	require_once('conexion.php');
	$Fecha = date(Y).'-'.date(m).'-'.date(d);
	mysql_query("INSERT INTO tblDominios (tblClientes_idClientes, Dominio, Fecha, Estatus) VALUES ('$_SESSION[id]', '$_REQUEST[dominio]', '$Fecha', '0')")or die("Problemas insertando en dominios".mysql_error());
	header("Location: ../clientes/dominios.php?msjok=Dominio_capturado");
	mysql_close($link);
?>