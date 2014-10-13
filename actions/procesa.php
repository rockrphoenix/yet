<?php
require_once('../clases/class.logueo.php');
require_once('../clases/class.alta.php');
require_once('../clases/class.changepass.php');
require_once("../clases/class.Restablece.php");
<<<<<<< HEAD
require_once('../clases/class.restablecePass.php');
=======
>>>>>>> 1f22693d82efdd027128b4a534fecb9d8f3230a5
require_once('../clases/class.phpmailer.php');
require_once('../clases/class.smtp.php');
	$action = $_POST['action'];
	switch ($action) {
		case 'insertaUsuario':
			$inserta = new AltaUsuario($_POST);
			$exito = $inserta->insertaDatos();
			if ($exito == 2) {
				echo 2;
			}else if($exito == 0){
				echo 0;
			}else{
				$id = $exito;
				$di = md5($id);
				$random = uniqid("act_");
				$mail = new PHPMailer();
			    $mail->IsSMTP();
			    $mail->SMTPAuth = true;
			    $mail->SMTPSecure = "tsl";
			    $mail->Host = "smtp.1and1.com";
			    $mail->Port = 25;
			    $mail->Username = "setup@yetinmobiliario.com";
			    $mail->Password = "4lt4Yet!";
			    $mail->From = "setup@yetinmobiliario.com";
			    $mail->FromName = "Yet Inmobiliario";
			    $mail->AddAddress($_POST[mail]);
			    $mail->IsHTML(true);
			    $mail->SMTPDebug = 0;
			    $mail->Subject = "Contacto";
			    $mail->MsgHTML("Gracias por registrarte en Yet! Inmobiliario<br>Para continuar con el proceso de registro, por favor da clic o copia y pega el enlace de abajo para activar tu cuenta:<br><a href='http://pruebas.gruposyse.com/actions/activacion.php?di=".$di."&id=".$id."'>http://pruebas.gruposyse.com/actions/activacion.php?di=".$di."&id=".$id."</a>");
				if(!$mail->Send()){
					echo 3;
				} else {
					echo 1;
				}
			}
			break;

		case 'logueo':
			$loguear = new Logueo($_POST);
			$resultado = $loguear->buscarUsuario();
			echo $resultado;
			break;
		case 'recuperarcontrasena':
			$buscaEmail = new restablecePass($_POST);
			$encontrado = $buscaEmail -> buscarMail();
			if ($encontrado != false) {
				$buscaEmail-> confirmaCambio();
				$mail = new PHPMailer();
			    $mail->IsSMTP();
			    $mail->SMTPAuth = true;
			    $mail->SMTPSecure = "tsl";
			    $mail->Host = "smtp.1and1.com";
			    $mail->Port = 25;
			    $mail->Username = "setup@yetinmobiliario.com";
			    $mail->Password = "4lt4Yet!";
			    $mail->From = "setup@yetinmobiliario.com";
			    $mail->FromName = "Yet Inmobiliario";
			    $mail->AddAddress($_POST[mail]);
			    $mail->IsHTML(true);
			    $mail->SMTPDebug = 0;
			    $mail->Subject = "Contacto";
			    $mail->MsgHTML("Ud ha solicitado reestablecer la contraseña<br> Para reestablecer su contraseña de click en el siguiente link<br> <a href='http://pruebas.gruposyse.com/recupera.php?id=".$encontrado[iddatos]."'>http://pruebas.gruposyse.com/recupera.php?Email=".$encontrado[iddatos]."</a>");
				if(!$mail->Send()){
					echo 3;
				} else {
					echo 1;
				}
			}else{
				echo 0;
			}
			break;
		case 'Recuperar':
			$cambiaPass=new changePass($_POST);
			$passCambiado= $cambiaPass->change();
			if (!$passCambiado) {
				echo 0;
			}else{
				echo 1;
			}
			break;
		case 'contactUser':
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
		    $mail->AddAddress('soporte@yetinmobiliario.com');
		    $mail->AddAddress($_POST[mail]);
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
							El usuario <b>'.$_POST[name].'</b> ha dejado un mensaje:<br>
							'.$_POST[mensaje].'<br>
							Puedes responder a este mensaje al correo: '.$_REQUEST[mail].'<br>
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
				/*echo "no envie el correo<br>";
				echo $_REQUEST[name].'<br>';
				echo $_REQUEST[mensaje].'<br>';
				echo $_REQUEST[mail].'<br>';*/
				echo 0;
			}else{
				echo 1;
			}	 
			break;
		case 'demo':
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
		    $mail->AddAddress('ventas@yetinmobiliario.com');
		    $mail->AddAddress($_POST[mail]);
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
							La persona <b>'.$_POST[name].'</b> ha solicitado un demo:<br>
							
							Puedes responder a este mensaje al correo: '.$_POST[mail].'<br>
							o comunicandote al teléfono: '.$_POST[tel].'<br>
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
				/*echo "no envie el correo<br>";
				echo $_REQUEST[name].'<br>';
				echo $_REQUEST[mensaje].'<br>';
				echo $_REQUEST[mail].'<br>';*/
				echo 0;
			}else{
				echo 1;
			}
			break;	
		default:
			# code...
			break;
	}
?>