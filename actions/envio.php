<?php	
// El mensaje
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
		    $mail->AddAddress('ventas@gruposyse.com');
		    $mail->AddAddress($_REQUEST[email]);
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
							El usuario <b>'.$_REQUEST[name].'</b> ha dejado un mensaje:<br>
							'.$_REQUEST[message].'<br>
							Puedes responder a este mensaje al correo: '.$_REQUEST[email].'<br>
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
				echo $_REQUEST[name].'<br>';
				echo $_REQUEST[message].'<br>';
				echo $_REQUEST[email].'<br>';
			}else{
				echo 1;
			}
?>