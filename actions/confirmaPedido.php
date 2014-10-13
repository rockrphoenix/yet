<?php
session_start();
require_once('conexion.php');
$Fecha = date(Y).'-'.date(m).'-'.date(d);
$Trans = uniqid("trans".$Fecha."_");
mysql_query("INSERT INTO tblPaquetes (tblClientes_idClientes,  Paquete , Periodo , Administradores, Correos, Asesores, Secciones, Fecha, Vigencia, Estatus, tblTransacciones_idTrans) VALUES ('$_SESSION[id]', '$_REQUEST[paquete]', '$_REQUEST[periodo]', '1', '5', '3', '3', '$Fecha', '$Fecha', '0', '$Trans')")or die("Error insertando en paquetes".mysql_error());
mysql_query("INSERT INTO tblTransacciones (Transaccion, Monto, Descripcion, Fecha, tblClientes_idClientes, idTrans) VALUES ('Pago paquetes', '$_REQUEST[monto]', 'Paquete básico', '$Fecha', '$_SESSION[id]', '$Trans' )")or die("Error insertando en transacciones".mysql_error());
$usuario = mysql_query("SELECT tblClientes.Email, tblDatos.Nombres, tblDatos.ApellidoPaterno FROM tblClientes INNER JOIN tblDatos ON tblDatos.idDatos = tblClientes.tblDatos_idDatos WHERE idClientes = '$_SESSION[id]'")or die("Error buscando al usuario".mysql_error());
$usr = mysql_fetch_array($usuario);
require_once('../clases/class.phpmailer.php');
require_once('../clases/class.smtp.php');
$mail = new PHPMailer();
		    $mail->IsSMTP();
		    $mail->SMTPAuth = true;
		    $mail->SMTPSecure = "tsl";
		    $mail->Host = "smtp.1and1.com";
		    $mail->Port = 25;
		    $mail->Username = "webmaster@gruposyse.mx";
		    $mail->Password = "!GrupoSySE";
		    $mail->From = "webmaster@gruposyse.mx";
		    $mail->FromName = "webmaster@gruposyse.mx";
		    $mail->AddAddress('marco.izag@gmail.com');
		    $mail->IsHTML(true);
		    $mail->SMTPDebug = 0;
		    $mail->Subject = "Mensaje de Yet! Inmobiliario";
		    $mail->MsgHTML('
		    	<!doctype html>
				<html>
				<head>
					<meta charset="utf-8">
					<style type="text/css">
					table {
						width: 800px;
						margin: 0 auto 0 auto;
					}
					tr:last-child{
						background-color: #CE7034;
						color: #fff;
					}
					td{
						padding: 20px;
					}
					</style>
				</head>
				<body>
				<table>
					<tr>
						<td>
							<img src="http://pruebas.gruposyse.com/mail/imagenes/logo01.jpg">
						</td>
					</tr>
					<tr>
						<td>
							<h3>Correo enviado desde yetinmobiliario.com</h3>
							El usuario <b>'.$usr[Nombres].' '.$usr[ApellidoPaterno].'</b> con correo registrado como: '.$usr[Email].'<br>
							Ha registrado un paquete, el id de a transacción es <b><i>'.$Trans.'</i></b>.
						</td>
					</tr>
					<tr>
						<td align="right">
							<img src="http://pruebas.gruposyse.com/mail/imagenes/watermark_logo.jpg">
						</td>
					</tr>
					<tr>
						<td>
							<img src="http://pruebas.gruposyse.com/mail/imagenes/bottom.jpg">
						</td>
					</tr>
				</table>
					
				</body>
				</html>		    	
		    ');
			if(!$mail->Send()) {
				echo "no envie el correo<br>";
			}
			header("Location: ../clientes/mensajes.php?monto=$_REQUEST[monto]");
mysql_close($link);
?>