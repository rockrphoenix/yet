<?php
	session_start();
	require_once('conexion.php');
	//echo $_REQUEST[inmobiliaria]."<br>".$_REQUEST[rfc]."<br>".$_SESSION[id]."<br>".$_REQUEST[inmo];
	if ($_REQUEST[inmo]=='inserta'){
		$idInmobiliaria = uniqid();
		//$validacion = mysql_query("SELECT * FROM tblInmobiliaria WHERE tblClientes_idClientes = '$_SESSION[id]'", $link) or die("Error buscando inmobiliarias".mysql_error());
		mysql_query("INSERT INTO tblInmobiliaria (idInmobiliaria, Nombre, RFC, tblubicacion_idUbicacion, tblClientes_idClientes) VALUES ('$idInmobiliaria', '$_REQUEST[inmobiliaria]', '$_REQUEST[rfc]', 'NA', '$_SESSION[id]')", $link)or die('Problemas insertando en inmobiliarias'.mysql_error());
		mysql_close($link);
		header("Location: ../clientes/configura.php?msjok=Los datos se insertaron correctamente");
	}
	else if ($_REQUEST[inmo]=='actualiza') {
		mysql_query("UPDATE tblInmobiliaria SET Nombre = '$_REQUEST[inmobiliaria]', RFC = '$_REQUEST[rfc]' WHERE tblClientes_idClientes = '$_SESSION[id]'", $link) or die('Error actualizando en inmobiliarias'.mysql_error());
		mysql_close($link);
		header("Location: ../clientes/configura.php?msjok=Los datos se actualizaron correctamente");
	}else{
		mysql_close($link);
		header("Location: ../index.php");
		//echo $_REQUEST[inmo];
	}
	mysql_close($link);
?>