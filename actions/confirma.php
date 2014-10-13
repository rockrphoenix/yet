<?php
session_start();
require_once('conexion.php');
$Fecha = date(Y).'-'.date(m).'-'.date(d);
$paquete = mysql_query("INSERT INTO tblPaquetes(tblClientes_idClientes, Paquete, Periodo, Fecha, Estatus)
			VALUES ('$_SESSION[id]', '$_REQUEST[paq]', '$_REQUEST[periodo]', '$Fecha', '0')", $link) or die("Problemas insertando en paquetes ".mysql_error());
$_SESSION[monto] = $_REQUEST[periodo]*0.16 + $_REQUEST[periodo];
mysql_close($link);
header("Location: ../clientes/mensajes.php");
?>