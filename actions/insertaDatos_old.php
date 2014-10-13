<?php

	if (isset($_REQUEST[email])) {
		require_once('conexion.php');
		require_once('../clases/class.phpmailer.php');
		require_once('../clases/class.smtp.php');
		$Fecha = date(Y).'-'.date(m).'-'.date(d);
		$idUsuario = uniqid();
		$FechaNacimiento = $_REQUEST[anio]."-".$_REQUEST[mes]."-".$_REQUEST[dia];
		$password = md5($_REQUEST[pass]);
		$nuevo_email=mysql_query("select Usuario from tblUsuarios where Usuario ='$_REQUEST[email]'");
		function generarCodigo($longitud) {
			$key = '';
			$pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
			$max = strlen($pattern)-1;
			for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
			return $key;
		}
 		$random = generarCodigo(10); // genera un código de 6 caracteres de longitud.
		if(mysql_num_rows($nuevo_email) == 0){
			mysql_query("INSERT INTO tblUsuarios(idUsuario, idTU, Usuario, Estatus, Fecha)
			VALUES ('$idUsuario', '0', '$_REQUEST[email]', '$random', '$Fecha')", $link) or die("Problemas insertando en usuarios ".mysql_error());
			mysql_query("INSERT INTO tblDatos(idUsuario, Nombres, Paterno, Materno, Tel, Cel, Email, Estatus, Contra, FechaNacimiento)
			VALUES ('$idUsuario', '$_REQUEST[nombres]', '$_REQUEST[paterno]', '$_REQUEST[materno]', 'Falta', 'NA', '$_REQUEST[email]', '0', '$password', '$FechaNacimiento')", $link) or die("Problemas insertando en datos ".mysql_error());
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
		    $mail->AddAddress($_REQUEST[email]);
		    $mail->IsHTML(true);
		    $mail->SMTPDebug = 0;
		    $mail->Subject = "Contacto";
		    $mail->MsgHTML("Da click o copia y pega el enlace de abajo para activar tu cuenta:<br>
		    				<a href='http://pruebas.gruposyse.com/actions/activacion.php?cod=".$random."&id=".$idUsuario."'>http://pruebas.gruposyse.com/actions/activacion.php?cod=".$random."&id=".$idUsuario."</a>");
			if(!$mail->Send()) {
				mysql_close($link);
				header('Location:../zona.php?msj=3');
			} else {
				mysql_close($link);
				header('Location:../zona.php?msj=1');	
			}
		}else{
			mysql_close($link);
			header('Location:../zona.php?msj=2');
		}	
		//mysql_query("INSERT INTO tblDatos (idUsuario, Nombres, Paterno, Materno, Tel, Cel, Email, Estatus, Contra, FechaNacimiento)
		//VALUES(); ");
		}else{
			mysql_close($link);
			header('Location:../index.php');
		}
		mysql_close($link);
?> 	 	