<?php
	if($_REQUEST[nombre] == ''){
		header("Location: ../zona.php?msjer=Algo_raro_esta_sucediendo,_por_favor_reporte_este_error&#tab-2");
	}else if($_REQUEST[paterno] == ''){
		header("Location: ../zona.php?msjer=Algo_raro_esta_sucediendo,_por_favor_reporte_este_error&#tab-2");
	}else if(!filter_var($_REQUEST[mail], FILTER_VALIDATE_EMAIL)){
		header("Location: ../zona.php?msjer=Algo_raro_esta_sucediendo,_por_favor_reporte_este_error&#tab-2");
	}else if($_REQUEST[mail] != $_REQUEST[cemail]){
		header("Location: ../zona.php?msjer=Algo_raro_esta_sucediendo,_por_favor_reporte_este_error&#tab-2");
	}else if($_REQUEST[psw] == '' || strlen($_REQUEST[psw])<=5){
		header("Location: ../zona.php?msjer=Algo_raro_esta_sucediendo,_por_favor_reporte_este_error&#tab-2");
	}else if($_REQUEST[psw] != $_REQUEST[cpsw]){
		header("Location: ../zona.php?msjer=Algo_raro_esta_sucediendo,_por_favor_reporte_este_error&#tab-2");
	}else if($_REQUEST[anio] == 'Año' || $_REQUEST[mes] == 'Mes' || $_REQUEST[dia] == 'Día'){
		header("Location: ../zona.php?msjer=Algo_raro_esta_sucediendo,_por_favor_reporte_este_error&#tab-2");
	}
	require_once('conexion.php');
	require_once('../clases/class.phpmailer.php');
	require_once('../clases/class.smtp.php');
	$Fecha = date(Y).'-'.date(m).'-'.date(d);
	$idUsuario = uniqid();
	$idDatos = uniqid();
	$idUbicacion = uniqid();
	$FechaNacimiento = $_REQUEST[anio]."-".$_REQUEST[mes]."-".$_REQUEST[dia];
	$password = md5($_REQUEST[psw]);
	$nuevo_email=mysql_query("select * from tblClientes where Email ='$_REQUEST[mail]'");
	$cliente = $_REQUEST[nombre]."_".$_REQUEST[paterno];
	function generarCodigo($longitud) {
		$key = '';
		$pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
		$max = strlen($pattern)-1;
		for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
		return $key;
	}
	$random = generarCodigo(10); // genera un código de 6 caracteres de longitud.
		if(mysql_num_rows($nuevo_email) == 0){
			mysql_query("INSERT INTO tblClientes(idClientes, Clientes, Email, Psw, Fecha, Estatus, tblDatos_idDatos, tblUbicacion_idUbicacion)
			VALUES ('$idUsuario', '$cliente', '$_REQUEST[mail]', '$password', '$Fecha', '$random', '$idDatos', '$idUbicacion')", $link) or die("Problemas insertando en usuarios ".mysql_error());
			mysql_query("INSERT INTO tblDatos(idDatos, Nombres, ApellidoPaterno, Edad)
			VALUES ('$idDatos', '$_REQUEST[nombre]', '$_REQUEST[paterno]', '$FechaNacimiento')", $link) or die("Problemas insertando en Datos ".mysql_error());
			mysql_query("INSERT INTO tblUbicacion(idUbicacion)
			VALUES ('$idUbicacion')", $link) or die("Problemas insertando en usuarios ".mysql_error());
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
		    $mail->AddAddress($_REQUEST[mail]);
		    $mail->IsHTML(true);
		    $mail->SMTPDebug = 0;
		    $mail->Subject = "Contacto";
		    $mail->MsgHTML("Da click o copia y pega el enlace de abajo para activar tu cuenta:<br>
		    				<a href='http://pruebas.gruposyse.com/actions/activacion.php?cod=".$random."&id=".$idUsuario."'>http://pruebas.gruposyse.com/actions/activacion.php?cod=".$random."&id=".$idUsuario."</a>");
			if(!$mail->Send()) {
				mysql_close($link);
				header('Location: ../zona.php?msjer=El_Correo_NO_pudo_enviarse_intente_en_otro_momento&#tab-2');
			} else {
				mysql_close($link);
				header('Location: ../zona.php?msjok=El_correo_fue_enviado,_revise_su_bandeja_de_SPAM&#tab-2');
			}
		}else{
			mysql_close($link);
			header('Location: ../zona.php?msjer=El_Correo_ya_esta_registrado_utilice_otro&#tab-2');
		}