<?php
if (isset($_REQUEST[email]) and isset($_REQUEST[psw])){
	require_once('conexion.php');
	$pass = md5($_REQUEST[psw]);
	$codigo=mysql_query("select Clientes from tblClientes where Email = '$_REQUEST[email]' and Psw ='$pass'");
	$datos = mysql_fetch_array($codigo);
	if(mysql_num_rows($codigo) == 1){
		$cu = mysql_query("SELECT idClientes, Clientes, Estatus FROM tblClientes WHERE Email = '$_REQUEST[email]'");
		$row = mysql_fetch_array($cu);
		if (strlen($row[Estatus])<3){
			session_start();
			$_SESSION[usrname] = $row[Clientes];
			$_SESSION[id] = $row[idClientes];
			$_SESSION[estatus] = $row[Estatus];
			$Paquetes = mysql_query("SELECT * FROM tblPaquetes WHERE tblClientes_idClientes = '$_SESSION[id]'", $link) or die('Problemas buscando paquetes'.mysql_error());
			if (mysql_num_rows($Paquetes)>0) {
				$paq = mysql_fetch_array($Paquetes);
				$_SESSION[paquete] = $paq[Paquete];
			}else{
				$_SESSION[paquete] = "none";
			}
			mysql_close($link);
			header("Location: ../clientes");
		}else{
			mysql_close($link);
			header("Location: ../zona.php?msjer=Necesita_confirmar_su_correo_electrónico");
		}
	}
	else{
		mysql_close($link);
		header("Location: ../zona.php?msjer=Usuario_o_contraseña_no_válidos");
		//echo $_REQUEST[email].$pass;
	}
}else{
	mysql_close($link);
	header("Location: ../index.php");
}
?>