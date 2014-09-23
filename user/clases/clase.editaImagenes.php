<?php
	require_once("../../clases/class.conexion.php");
	/**
	* por marco izaguirre
	*/
	class Editar extends Conexion
	{
		public $ruta;
		public $semiruta;	
		function __construct()
		{
			$_POST;
			parent::__construct();
			$this->ruta = '../../../imagenes_cy/'.$_POST[id].'/'.$_POST[idpropiedad].'/principal.jpg';
			$this->semiruta = '../../../imagenes_cy/'.$_POST[id].'/'.$_POST[idpropiedad].'/';
		}
		function renombraPredeterminada(){
			if (file_exists($this->ruta)) {
				$retVal = (rename($this->ruta, $this->semiruta.uniqid().".jpg")) ? true : false ;
			} else {
				$retVal = true;
			}
			return $retVal;
		}
		function asignaPrincipal(){
			if ($this->renombraPredeterminada()!=false) {
				$retVal = (rename($this->semiruta.$_POST['edita_imagen'], $this->ruta)) ? true : false;
			} else {
				$retVal =  false;
			}
			return $retVal;	
		}
		function borrarImagenes(){
			$cont = 0;
			foreach ($_POST['edita_imagen'] as $value) {
				if(unlink($this->semiruta.$value)!=false){
					$cont++;
				}
			}
			return $cont;
		}
		// function buscaPredeterminada(){
		// 	$busca = $this->conexion->query("SELECT idimagen FROM tblimagenes WHERE principal = '1' and idpropiedad = '$_POST[idpropiedad]'")or die("no puedo buscar la predeterminada");
		// 	if ($busca->num_rows == 1) {
		// 		$aImg = $busca->fetch_array(MYSQL_ASSOC);
		// 		return $aImg[idimagen];
		// 	}else if($busca->num_rows => 2){
		// 		$cont = 1;
		// 		while($aImg = $busca->fetch_array(MYSQL_ASSOC)){
		// 			$arrayImg[$cont] = $aImg[idimagen]
		// 			$cont++;
		// 		}
		// 	} else {
		// 		echo "error de busqueda predeterminada";
		// 		return 0;
		// 	}
		// 	$this->conexion->close();
		// }
		// function quitaPredeterminada(){
		// 	$quita = $this->conexion->query("UPDATE tblimagenes SET principal = '0' WHERE idpropiedad = '$_POST[idpropiedad]'" )or die("no puedo quitar la imagen predeterminada");
		// 	echo $quita->affected_rows;
		// 	$retVal = ($quita->afected_rows != 0) ? true : false ;
		// 	return $retVal;
		// }
		// function buscaNuevaImagen(){
		// 	$busca = $this->conexion->query("SELECT idimagen FROM tblimagenes WHERE idpropiedad = '$_POST[idpropiedad]' and imagen like '%$_POST[edita_imagen]%'")or die("no puedo buscar el registro");
		// 	if ($busca->num_rows == 1) {
		// 		$aId = $busca->fetch_array(MYSQL_ASSOC);
		// 		return $aId[idimagen];
		// 	}else{
		// 		echo "error de busqueda nueva";
		// 		return 0;
		// 	}
		// }
		// function actualizaImagen(){
		// 	$this->quitaPredeterminada();
		// 	$id = $this->buscaNuevaImagen();
		// 	if ($id != false) {
		// 		$pred = $this->conexion->query("UPDATE tblimagenes SET principal = '1' WHERE idimagen = '2'" )or die("no puedo quitar la imagen predeterminada");
		// 		echo "Filas afectadas: ".var_dump($pred);
		// 		$retVal = ($pred->affected_rows == 1) ? 1 : 0 ;
		// 		//echo "UPDATE tblimagenes SET principal = '1' WHERE idimagen = '$id'";
		// 		return $retVal;
		// 		//print_r($pred);
		// 	}else{
		// 		echo "error de actualizacion predeterminada";
		// 		return 0;
		// 	}
			//$pred->free();	
		}
?>