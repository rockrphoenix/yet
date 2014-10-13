<?php
	session_start();
	require_once('conexion.php');
	$pass = md5($_REQUEST[old_psw]);
	$newPass = md5($_REQUEST[new_psw]);
	$codigo=mysql_query("SELECT Clientes FROM tblClientes WHERE idClientes = '$_SESSION[id]' and Psw ='$pass'", $link) or die("Problemas buscando contraseña ".mysql_error());;
	$datos = mysql_fetch_array($codigo);
	if(mysql_num_rows($codigo) == 1){
		mysql_query("UPDATE tblClientes SET Psw = '$newPass' WHERE idClientes = '$_SESSION[id]'", $link) or die("Problemas actualizando contraseña ".mysql_error());
		mysql_close($link);
		header("Location: ../clientes/contra.php?msjok=Password_actualizado");
	}else{
		mysql_close($link);
		header("Location: ../clientes/contra.php?msjer=No_se_ha_actualizado_el_password");
	}
?>
