<?php  
	require_once('../clases/class.phpmailer.php');
	require_once('../clases/class.smtp.php');
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
    $mail->AddAddress("marco.izag@gmail.com");
    $mail->IsHTML(true);
    $mail->SMTPDebug = 2;
    $mail->Subject = "Contacto";
    $mail->MsgHTML("CONTENIDO EMAIL");
	if(!$mail->Send()) {
	  echo 'Message was not sent.';
	  echo 'Mailer error: ' . $mail->ErrorInfo;
	} else {
	  echo 'Message has been sent.';
	}
?>  