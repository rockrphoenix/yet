<?php
require_once("../clases/clase.insertaColores.php");
require_once("../clases/clase.asesores.php");
require_once("../clases/clase.insertaOficina.php");
require_once("../clases/clase.insertaRedes.php");
require_once("../clases/class.upload.php");
require_once('../clases/class.modPass.php');
require_once('../clases/class.datosFact.php');
require_once('../clases/class.secciones.php');
require_once('../clases/clase.perfil.php');
require_once('../../clases/class.phpmailer.php');
require_once('../../clases/class.smtp.php');
require_once("../clases/class.insertaPropiedad.php");
require_once("../clases/clase.editaImagenes.php");
<<<<<<< HEAD
require_once("../clases/class.asociaciones.php");
require_once("../clases/class.testimoniales.php");
=======
>>>>>>> 1f22693d82efdd027128b4a534fecb9d8f3230a5
session_start();
	$action = $_POST['action'];
	switch($action){
		case 'colores':
			$insertaColores = new InsertaColores($_POST);
			$accion = $insertaColores->actualizaColores();
			echo ($accion != FALSE) ? 1 : 0 ;
		break;
		case 'asesores':
			$insertaAsesor = new Asesores($_POST);
			$resultado = $insertaAsesor->insertaAsesor();
			if (is_array($resultado)) {
				$id = $resultado[1];
				$di = md5("asesor");
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
			    $mail->AddAddress($_POST[email]);
			    $mail->IsHTML(true);
			    $mail->SMTPDebug = 0;
			    $mail->Subject = "Nuevo Asesor";
			    $mail->MsgHTML("Fuiste dado de alta como Asesor inmobiliario en el sistema Yet!<br>
			    	Tu password es: $resultado[2] <br>
			    	Si deseas activar tu cuenta da click en el siguiente enlace:<br><a href='http://pruebas.gruposyse.com/actions/activacion.php?di=".$di."&id=".$id."&mail=".$_POST[email]."'>http://pruebas.gruposyse.com/actions/activacion.php?di=".$di."&id=".$id."&mail=".$_POST[email]."</a><br>Si crees que esto es un error por favor ignora este mensaje");
				if(!$mail->Send()){
					echo 3;//no envie el mail
				} else if($resultado==4){
					echo 4;//demasiados asesores ingresados
				}else{
					echo 1;//todo bien se envio correcto
				}
			}else{
				echo $resultado;//errores 0 o 2 especificados en la clase
			}
		break;
		case 'modAsesores':
			$insertaAsesor = new Asesores($_POST);
			$resultado = $insertaAsesor->modificaAsesor();
			echo ($resultado!=false) ? 1 : 0 ;
		break;
		case 'oficina':
			$insertaOfi = new oficinas($_POST);
			$insercion=$insertaOfi->insertOffice();
			echo ($insercion != FALSE) ? 1 : 0;
			
			break;
		case 'modoficina':
			$modifica= new oficinas($_POST);
			$arrayMod=$modifica->modOffice();
			echo ($arrayMod != FALSE) ? 1 : 0;
			
			break;
		case 'ocuoficina':
			$ocultaOfice=new oficinas($_POST);
			$oculta=$ocultaOfice->ocultOffice();
			echo ($oculta != FALSE) ? 1 : 0;
			
				break;	
		case 'redSoc':
			$insertRedes= new insertaRedes($_POST);
			$actual=$insertRedes->insertarRedes();
<<<<<<< HEAD
			echo($actual != 0) ? 1:0;
=======
			echo($actual != FALSE) ? 1:0;
>>>>>>> 1f22693d82efdd027128b4a534fecb9d8f3230a5
				break;
		case 'logotipo':
			$handle = new Upload($_FILES['logotipo']);
			$dir_dest = '../../../clientes/'.$_POST['id'].'/logotipo';
			$dir_pics = '../../../clientes/'.$_POST['id'].'/logotipo'; 
			if ($handle->uploaded) {

		        // yes, the file is on the server
		        // below are some example settings which can be used if the uploaded file is an image.
		        $handle->file_overwrite 		 = true;
		        $handle->file_max_size 			 = '2000000'; // 2mb
		        $handle->file_new_name_body   	 = 'logo';
		        $handle->image_resize            = true;
		        $handle->image_ratio_y           = true;
		        $handle->image_x                 = 216;
		        $handle->image_convert 			 = 'jpg';

		        // now, we start the upload 'process'. That is, to copy the uploaded file
		        // from its temporary location to the wanted location
		        // It could be something like $handle->Process('/home/www/my_uploads/');
		        $handle->Process($dir_dest);

		        // we check if everything went OK
		        if ($handle->processed) {
		            // everything was fine !
		            echo '
		            <script type="text/javascript">
						function redireccionar(){
						  window.location="../logo.php?msj=1";
						} 
						setTimeout ("redireccionar()", 2000); //tiempo expresado en milisegundos
					</script>
					Logotipo guardado ... Por favor espere
		            ';
		        } else {
		            // one error occured
		           echo '
		            <script type="text/javascript">
						function redireccionar(){
						  window.location="../logo.php?msj=2";
						} 
						setTimeout ("redireccionar()", 2000); //tiempo expresado en milisegundos
					</script>
					Algo anda mal ... Por favor espere
		            ';
		        }

		        // we delete the temporary files
		        $handle-> Clean();

		    } else {
		        // if we're here, the upload file failed for some reasons
		        // i.e. the server didn't receive the file
		        header("Location: ../logo.php?msj=3");//No se procesó la imagen
		    }
			
		break;

		case 'imgPropiedad':
		$strSuccess == 0;
		$strError == 0;
<<<<<<< HEAD
		foreach ($_FILES as $valor) {
			$handle = new Upload($valor);
			$dir_dest = '../../../imagenes_cy/'.$_POST['usuario'].'/'.$_POST['propiedad'];
			$dir_pics = '../../../imagenes_cy/'.$_POST['usuario'].'/'.$_POST['propiedad'];
			if ($handle->uploaded) {
				// yes, the file is on the server
				// below are some example settings which can be used if the uploaded file is an image.
				$handle->auto_create_dir = true;
				$handle->file_max_size = '2000000'; // 2mb
				$handle->file_new_name_body = $_POST['usuario'].'_'.$_POST['propiedad'].'_'.uniqid();
				$handle->image_resize = true;
				$handle->image_ratio_y = false;
				$handle->image_x = 743;
				$handle->image_y = 449;
				$handle->image_convert = 'jpg';
				// now, we start the upload 'process'. That is, to copy the uploaded file
				// from its temporary location to the wanted location
				// It could be something like $handle->Process('/home/www/my_uploads/');
				$handle->Process($dir_dest);
				// we check if everything went OK
				if ($handle->processed) {
					// everything was fine !
					echo '{"jsonrpc" : "2.0", "result" : null, "id" : "id"}';
				} else {
					// one error occured
					echo '{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Falló la subida, inténto más tarde"}, "id" : "id"}';
				}
				// we delete the temporary files
				$handle-> Clean();
			} else {
				// if we're here, the upload file failed for some reasons
				// i.e. the server didn't receive the file
				//header("Location: ../sube.php?msj=3");//No se procesó la imagen
				echo 'error : ' . $handle->error;
			}
		}	
=======
		$_SESSION['idpropiedad'] = $_POST['idpropiedad'];
			foreach ($_FILES as $valor) {
				$handle = new Upload($valor);
				$dir_dest = '../../../imagenes_cy/'.$_POST['id'].'/'.$_POST['idpropiedad'];
				$dir_pics = '../../../imagenes_cy/'.$_POST['id'].'/'.$_POST['idpropiedad']; 
				if ($handle->uploaded) {

			        // yes, the file is on the server
			        // below are some example settings which can be used if the uploaded file is an image.
			        $handle->auto_create_dir 		 = true;
			        $handle->file_max_size 			 = '2000000'; // 2mb
			        $handle->file_new_name_body   	 = $_POST['id'].'_'.$_POST['idpropiedad'].'_'.uniqid();
			        $handle->image_resize            = true;
			        $handle->image_ratio_y           = false;
			        $handle->image_x                 = 743;
			        $handle->image_y                 = 449;
			        $handle->image_convert 			 = 'jpg';

			        // now, we start the upload 'process'. That is, to copy the uploaded file
			        // from its temporary location to the wanted location
			        // It could be something like $handle->Process('/home/www/my_uploads/');
			        $handle->Process($dir_dest);

			        // we check if everything went OK
			        if ($handle->processed) {
			            // everything was fine !
			            $strSuccess++;
			        } else {
			            // one error occured
			           $strError++;
			        }

			        // we delete the temporary files
			        $handle-> Clean();

			    } else {
			        // if we're here, the upload file failed for some reasons
			        // i.e. the server didn't receive the file
			        //header("Location: ../sube.php?msj=3");//No se procesó la imagen
			        echo 'error : ' . $handle->error;
			    }
			}

			echo "
			<script type=\"text/javascript\">
						function redireccionar(){
						  window.location=\"../imagenes.php?idpropiedad=$_POST[idpropiedad]&action=pred\";
						} 
						setTimeout (\"redireccionar()\", 2000); //tiempo expresado en milisegundos
					</script>
			Fue(ron) procesada(s) $strSuccess imagen(es)<br>
			Y hubo $strError error(es)<br>
			Por favor espere...";
			
			
			
>>>>>>> 1f22693d82efdd027128b4a534fecb9d8f3230a5
		break;

		case 'modPass':
			$cambia= new ModPass($_POST);
			$actualiza=$cambia->cambiaPass();	
        	echo($actualiza != FALSE) ? 1:0;
			break;

		case 'ocuAses':
            $oculta= new Asesores($_POST);
            $ocultado=$oculta->ocultAsesor();
            echo($ocultado == 1) ? 1:0;
                break;
			
		case 'modPassAsesor':
			$cambia= new ModPass($_POST);
			$actualiza=$cambia->cambiaPassAsesor();	
        	echo $actualiza;
			break;

		case 'modPassAsesor2':
			$cambia= new ModPass($_POST);
			$actualiza=$cambia->cambiaPassAsesor2();	
        	echo $actualiza;
			break;

		case 'actPerfil':
			$cambia= new Perfil($_POST);
			$actualiza=$cambia->actualizaPerfil();	
        	echo $actualiza;
			break;

		case 'actAsesor':
			$cambia= new Perfil($_POST);
			$actualiza=$cambia->actualizaAsesor();
        	echo $actualiza;
			break;

		case 'contactUser':
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
			    $mail->AddAddress('ventas@gruposyse.com');
			    $mail->IsHTML(true);
			    $mail->SMTPDebug = 0;
			    $mail->Subject = "Contacto";
			    $mail->MsgHTML('<!doctype html>
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
							Puedes responder a este mensaje al correo: '.$_POST[mail].'<br>
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
				</html>	');
				if(!$mail->Send()){
					echo 0;//no envie el mail
				} else {
					echo 1;//todo bien se envio correcto
				}
		break;	
			case 'propIn':
			$insertaProp= new AltaPropiedad($_POST);
            $result = $insertaProp->insertaPropiedad();
			echo($result != 0) ? $result: 0;
			break;

			case 'propUp':
			$insertaProp= new AltaPropiedad($_POST);
            $result = $insertaProp->actualizaPropiedad();
			echo($result != 0) ? $result: 0;
			break;


		case 'datosFact':
			$inserta= new datosFact($_POST);
			$insert=$inserta->insertaFact();
			echo($insert == 1) ? 1:0;
				break;	
		case 'eddatosFact':
			$act= new datosFact($_POST);
			$actualUbi=$act->actualizaUbic();
			$actualfact=$act->actualizaFact();
			echo($actualUbi == 1 && $actualfact == 1) ? 1:0;
				break;
		case 'secciones':
			$seccion= new Secciones($_POST);
			$insert=$seccion->insertarSecc();
			if ($insert != 3) {
				echo($insert == 1) ? 1:0;
			} else {
				echo 3;
			}
			break;
		case 'edsecciones':
			$update= new Secciones($_POST);
			$actual=$update->updateSecc();
			echo($actual == 1) ? 1:0;
			break;
		case 'ocuSecc':
			$oculta= new Secciones($_POST);
			$ocultado=$oculta->ocultSeccion();
			echo($ocultado == 1) ? 1:0;
			break;	

		case 'actualizaImagen':
			$imagen= new Editar($_POST);
			$img=$imagen->asignaPrincipal();
			if ($img!=false) {
				echo "
				<script type=\"text/javascript\">
						function redireccionar(){
						  window.location=\"../imagenes.php?msj=1&idpropiedad=$_POST[idpropiedad]&action=pred\";
						} 
						setTimeout (\"redireccionar()\", 2000); //tiempo expresado en milisegundos
					</script>
				Por favor espere...";
			}else{
				echo "<script type=\"text/javascript\">
						function redireccionar(){
						  window.location=\"../imagenes.php?msj=1&idpropiedad=$_POST[idpropiedad]&action=pred\";
						} 
						setTimeout (\"redireccionar()\", 2000); //tiempo expresado en milisegundos
					</script>
				Por favor espere...";
			}
			clearstatcache(); 
			break;

			case 'borraImagen':
				$oculta= new Editar($_POST);
				$ocultado=$oculta->borrarImagenes();
				echo "<script type=\"text/javascript\">
						function redireccionar(){
						  window.location=\"../borrarImagenes.php?msj=1&idpropiedad=$_POST[idpropiedad]&action=$ocultado\";
						} 
						setTimeout (\"redireccionar()\", 2000); //tiempo expresado en milisegundos
					</script>
				Por favor espere...";
			break;
			case 'ocuProp':
				$borra= new AltaPropiedad ($_POST);
				$borrado=$borra->ocultaProp();
				echo($borrado == 1) ? 1:0;
				break;
<<<<<<< HEAD
			case 'asociaciones1':
				$insertasoc= new Asociaciones($_POST);
				$insert=$insertasoc->InsertaAsoc1();	
				echo($insert == 1) ? 1:0;
				break;
			case 'asociaciones2':
				$insertasoc2= new Asociaciones($_POST);
				$insert2=$insertasoc2->InsertaAsoc2();	
				echo($insert2 == 1) ? 1:0;
				break;
			case 'edasociaciones2':
				$updateasoc= new Asociaciones($_POST);
				$updat=$updateasoc->updateAsoc();	
				echo($updat == 1) ? 1:0;
				break;	
			case 'ocuasoc':
				$updateasoc2= new Asociaciones($_POST);
				$updat2=$updateasoc2->ocAseoc();	
				echo($updat2 == 1) ? 1:0;
				break;	
			case 'testim':
				$insertTestim= new Testimoniales($_POST);
				$insertT=$insertTestim->insertaTestim();	
				echo($insertT == 1) ? 1:0;
				break;
			case 'edtestim':
				$updateTestim= new Testimoniales($_POST);
				$updateT=$updateTestim->updateTestim();	
				echo($updateT == 1) ? 1:0;
				break;	
			case 'ocutest':
				$ocuTestim= new Testimoniales($_POST);
				$ocult=$ocuTestim->octestim();	
				echo($ocult == 1) ? 1:0;
				break;				
		default: echo "estoy aqui";
=======
		default: echo 0;
>>>>>>> 1f22693d82efdd027128b4a534fecb9d8f3230a5
		break;
	}