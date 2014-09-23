<?php
	/**
	* marco izaguirre para grupo syse
	*/
	class Imagenes
	{
		
		function __construct()
		{
			$_GET;
			$_SESSION;
		}
		function muestraImagenes(){
			$dir = "../../imagenes_cy/$_SESSION[id]/$_GET[idpropiedad]";
			if ($gestor = opendir($dir)) {
				$cont = 1;
			    while (false !== ($entrada = readdir($gestor))) {
			        if ($entrada != "." && $entrada != "..") {
			        	if ($entrada == "principal.jpg") {
			        		$str.= '<option data-img-src="images/timthumb.php?file=../'.$dir.'/'.$entrada.'&width=200" value="'.$entrada.'" selected="selected">Option</option>';
			        	}else{
			        		$str.= '<option data-img-src="images/timthumb.php?file=../'.$dir.'/'.$entrada.'&width=200" value="'.$entrada.'">Option</option>';
			        	}
			            $cont++;
			        }
			    }
			    closedir($gestor);
			}
			return $str;
		}
	}
?>