<?php
	require_once("../../clases/class.conexion.php");
	/**
	* por marco izaguirre
	* para grupo syse
	*/
	class SubeLogotipo extends Conexion
	{
		public $ruta;
		function __construct()
		{
			$_POST;
			$this->ruta = '../../../clientes/'.$_POST['id'].'/logotipo';
			parent::__construct();
		}
		function verificaCarpeta(){//verifica que la carpeta del logotipo esté creada
			if (file_exists($this->ruta) == false) {
				return (mkdir($this->ruta)) ? true : false ;
			}else{
				return true;
			}
		}
		function validaExtension(){
			if ($_FILES[logotipo][type] =="image/jpeg"){
				$extension = ".jpg";
			}else if ($_FILES[logotipo][type] =="image/png") {
				$extension = ".png";
			}else if ($_FILES[logotipo][type] =="image/gif") {
				$extension = ".gif";
			}else{
				$extension = false;
			}
			return $extension;
		}
		function validaTamanio(){
			if ($_FILES[logotipo][size]>1000000) {
				return false;
			}else{
				return true;
			}
		}
		function subeImagen(){
			if ($this->validaTamanio()!=false) {
				if ($this->verificaCarpeta()!=false) {
					$ext = $this->validaExtension();
					if ($ext != false) {
						if(move_uploaded_file($_FILES['logotipo']['tmp_name'], $this->ruta."/logo".$ext)) { 
							return 1;//to ok fine fine fine very good very good very good veryveryveryvery guuuuuuuuuuuuud
						} else{
							return 0;//no pude copiar el archivo a la carpeta
						}
					}else{
						return 2;//no es la extensión correcta
					}
				}else{
					return 3;//hay problemas con la carpeta
				}
			}else{
				return 4;//exede el tamaño
			}
		}
	}
?>