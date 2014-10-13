<?php
	require_once("../clases/class.conexion.php");
	/**
	* 
	*/
	class Datos extends Conexion
	{
		
		function __construct()
		{
			parent::__construct();
			$_SESSION;
			$_GET;
		}
		function datosPerfil(){
			$datos = $this->conexion->query("SELECT Nombres as nombres, Paterno as paterno, Materno as materno, Tel as tel, Cel as cel, Email as email FROM tbldatos WHERE iddatos = '$_SESSION[id]'")or die("No encuentro el usuario");
			$aDatos = $datos->fetch_array(MYSQL_ASSOC);
			return $aDatos;			
		}
		function datosAsesor(){
<<<<<<< HEAD
			$datos = $this->conexion->query("SELECT nombres, paterno, materno, tel, cel, email FROM tblasesores WHERE idasesor='$_SESSION[idasesor]'")or die("No encuentro el asesor");
			$aDatos = $datos->fetch_array(MYSQL_ASSOC);
			return $aDatos;
=======
			$datos = $this->conexion->query("SELECT nombres, paterno, materno, tel, cel, email FROM tblasesores WHERE idcliente='$_SESSION[id]'")or die("No encuentro el asesor");
			$aDatos = $datos->fetch_array(MYSQL_ASSOC);
			$retVal = (count($aDatos)==0) ? 1 : $aDatos;
			return $retVal;
>>>>>>> 1f22693d82efdd027128b4a534fecb9d8f3230a5
		}
		function datosSecciones(){
			$sec = $this->conexion->query("SELECT idseccion, titulo FROM tblsecciones WHERE idcliente = '$_SESSION[id]'")or die("No busqué las secciones");
			$reg = $datos->num_rows;
			if ($reg == 0) {
				$str = '<tr><td>Sección 1</td><td>1</td><td><div><img src="images/iconos/ok.png" style="display:inline" alt="Ver"><img src="images/iconos/edit.png" style="display:inline" alt="Ver"><img src="images/iconos/cancel.png" style="display:inline" alt="Ver"></div></td></tr>
				<tr><td>Sección 2</td><td>1</td><td><div><img src="images/iconos/ok.png" style="display:inline" alt="Ver"><img src="images/iconos/edit.png" style="display:inline" alt="Ver"><img src="images/iconos/cancel.png" style="display:inline" alt="Ver"></div></td></tr>';
			}else if($reg == 1){
				$aDatos = $datos->fetch_array(MYSQL_ASSOC);
				$str = '<tr><td>'.$aDatos[titulo].'</td><td>1</td><td><div><img src="images/iconos/ok.png" style="display:inline" alt="Ver"><img src="images/iconos/edit.png" style="display:inline" alt="Ver"><img src="images/iconos/cancel.png" style="display:inline" alt="Ver"></div></td></tr>
				<tr><td>sección 2</td><td>1</td><td><div><img src="images/iconos/ok.png" style="display:inline" alt="Ver"><img src="images/iconos/edit.png" style="display:inline" alt="Ver"><img src="images/iconos/cancel.png" style="display:inline" alt="Ver"></div></td></tr>';
			}else{
				while($aDatos = $datos->fetch_array(MYSQL_ASSOC)){
					$str .= '<tr><td>'.$aDatos[titulo].'</td><td>1</td><td><div><img src="images/iconos/ok.png" style="display:inline" alt="Ver"><img src="images/iconos/edit.png" style="display:inline" alt="Ver"><img src="images/iconos/cancel.png" style="display:inline" alt="Ver"></div></td></tr>';	
				}
			}
			return $str;
		}
		function datosPropiedad(){
			$prop = $this->conexion->query("SELECT idpropiedad, titulo, Descripcion FROM tblpropiedad WHERE idcliente='$_SESSION[id]' AND Estatus ='1'")or die("no busqué en propiedades");
			$reg = $prop->num_rows;
			if ($reg == 0) {
				$str = '
					<tr>
                        <td colspan="4">No hay ninguna propiedad capturada hasta el momento<br><a href="propiedad.php">Capturar nueva propiedad</a></td>
                    </tr>
				';
			}else{
				while ($propiedades = $prop->fetch_array(MYSQL_ASSOC)) {
					$str .= '
						<tr>
                            <td><img src="#"></td>
                            <td>'.$propiedad[idpropiedad].'</td>
                            <td>'.$propiedad[Descripcion].'</td>
                            <td><div>
                                    <div style="width:30%; display:inline-block"><a href="#">Ver</a></div><div style="width:35%; display:inline-block"><a href="propiedad.php?id='.$propiedad[idpropiedad].'">Editar</a></div><div style="width:35%; display:inline-block"><a href="borraPropiedad.php?id='.$propiedad[idpropiedad].'">Borrar</a></div>
                            </div></td>
                        </tr>
					';
				}
			}
			return $str;
		}
		function datosPropiedadIndividual($idpropiedad){
			$consulta = $this->conexion->query("SELECT * FROM consultapropiedad2 WHERE idPropiedad = '$idpropiedad'")or die("no consulté la propiedad");
			$datos = $consulta->fetch_array(MYSQL_ASSOC);
			return $datos;
		}
		function mostrarDatosFact(){
			$busca=$this->conexion->query("SELECT ubi.idubicacion as idubicacion, Estado, Ciudad, Municipio, Colonia, Calle, NumeroExterior, NumeroInterior,CP, nombrers, rfc, tel, email FROM tblubicacion as ubi INNER JOIN tbldatosfact as datosf on datosf.idubicacion=ubi.idubicacion AND idcliente='$_SESSION[id]'")or die("no se obtuveiron datos");
			if ($busca->num_rows == 0) {
				return false;
			} else {
				$res=$busca->fetch_array(MYSQL_ASSOC);
				return $res;
			}
		}
		function buscarFacturacion(){
			$busca = $this->conexion->query("SELECT idfact FROM tbldatosfact WHERE idcliente = '$_SESSION[id]'")or die("no busqué datos facturación");
			if ($busca->num_rows == 0) {
				return false;
			} else {
				return true;
			}
		}
<<<<<<< HEAD
=======
		function muestraFacturacion(){

		}

>>>>>>> 1f22693d82efdd027128b4a534fecb9d8f3230a5
		function datosUbicacion(){
			$datos = $this->conexion->query("SELECT ubi.idubicacion as idubicacion FROM tblubicacion as ubi INNER JOIN tbldatosfact as datosf on datosf.idubicacion=ubi.idubicacion AND idcliente='$_SESSION[id]'")or die("No encuentro la ubicación");
			$aDatos = $datos->fetch_array(MYSQL_ASSOC);
			$retVal = (count($aDatos)==0) ? 1 : $aDatos;
			return $retVal;
		}

		function datosSeccion(){
			$dseccion=$this->conexion->query("SELECT * FROM tblseccion WHERE idcliente='$_SESSION[id]' AND estatus='1' ")or die("no se encontraron datos");
			if ($dseccion->num_rows == 0) {
				$str = '<tr>
							<td colspan="3">
								No hay ninguna sección capturada<br><a href="secciones.php">Captura Sección</a>
							</td>
						</tr>
				';
			}else{
				while ($sec = $dseccion->fetch_array(MYSQL_ASSOC)) {
					$str .= '
					<tr>
                        <td>'.$sec['titulo'].'</td>
                        <td>'.nl2br($sec['descripcion']).'</td>
                        <td>
                        	<div>
                                <div style="width:33%; display:inline-block"><a href="secciones.php?id='.$sec['idseccion'].'">Editar</a></div><div style="width:33%; display:inline-block"><a href="ocultaSeccion.php?id='.$sec['idseccion'].'">Borrar</a></div>
                            </div>
                        </td>
                    </tr>
					';
				}
			}
			return $str;
		}

		function editSeccion(){
			$dseccion=$this->conexion->query("SELECT * FROM tblseccion WHERE idseccion='$_GET[id]' AND estatus='1' ")or die("no se encontraron datos");
				return $dseccion;
		}
		function listaAsesores(){
<<<<<<< HEAD
			$asesores = $this->conexion->query("SELECT idasesor, nombres, email FROM tblasesores WHERE idcliente = '$_SESSION[id]' and estatus = '2'")or die("No puedo listar asesores");
=======
			$asesores = $this->conexion->query("SELECT idasesor, nombres, email FROM tblasesores WHERE idcliente = '$_SESSION[id]' and estatus = '1' || estatus = '2'")or die("No puedo listar asesores");
>>>>>>> 1f22693d82efdd027128b4a534fecb9d8f3230a5
			if ($asesores->num_rows == 0) {
				$str = '
					<tr>
						<td colspan="4">
<<<<<<< HEAD
							No se han capturado asesores hasta el momento<br><a href="asesores.php">Capturar Nuevo Asesor</a>
=======
							No se han capturado asesores ahsta el momento<br><a href="asesores.php">Capturar Nuevo Asesor</a>
>>>>>>> 1f22693d82efdd027128b4a534fecb9d8f3230a5
						</td>
					</tr>
				';
			} else {
				$cont = 1;
				while ($ase = $asesores->fetch_array(MYSQL_ASSOC)) {
					$str .= '
					<tr>
                        <td>00'.$cont.'</td>
                        <td>'.$ase[nombres].'</td>
                        <td>'.$ase[email].'</td>
                        <td>
                            <div>
                                <div style="width:100%; display:inline-block"><a href="borraAsesor.php?id='.$ase[idasesor].'">Borrar</a></div>
                            </div>
                        </td>
                    </tr>
				';
				$cont++;
				}	
			}
		return $str;
		}
		function ocAsesor(){

            $datos = $this->conexion->query("SELECT nombres, paterno, materno, tel, cel, email FROM tblasesores WHERE idasesor='$_GET[id]'")or die("No encuentro el asesor");
            return $datos;
        } 

        function propiedadPOc(){
<<<<<<< HEAD
			$prop = $this->conexion->query("SELECT idpropiedad, titulo, Descripcion FROM tblpropiedad WHERE idpropiedad='$_GET[idpropiedad]'")or die("no busqué en propiedades");
			return $prop;
		}
		function muestraAsoc(){
			$sesion=$_SESSION[id];
			
			$muestra=$this->conexion->query("SELECT * FROM tblasociaciones WHERE idcli='$sesion' AND estatus ='1' ")or die("no se encontraron asociaciones");
			//print_r($muestra) ;
				if ($muestra!= false) {
					return $muestra;
				}else{
					return false;
				}
		}
		function editAsoc(){
				$sesion=$_SESSION[id];
				$muestra2=$this->conexion->query("SELECT * FROM tblasociaciones WHERE idcli='$sesion' AND estatus ='1' AND idasoc='$_GET[idas]'")or die("no se editaron asociaciones");
				
				return $muestra2;
		}
		function muestraTestim(){
			$sesion=$_SESSION[id];
			
			$muestraT=$this->conexion->query("SELECT * FROM tbltestimoniales WHERE idcli='$sesion' AND estatus ='1' ")or die("no se encontraron testimoniales");
			//print_r($muestra) ;
				if ($muestraT!= false) {
					return $muestraT;
				}else{
					return false;
				}
		}
		function editTestim(){
			$sesion=$_SESSION[id];
			
			$editT=$this->conexion->query("SELECT * FROM tbltestimoniales WHERE idcli='$sesion' AND estatus ='1' AND idtest='$_GET[idcomen]'")or die("no se editaron testimoniales");
			//print_r($muestra) ;
				if ($editT!= false) {
					return $editT;
				}else{
					return false;
				}
		}
=======
		$prop = $this->conexion->query("SELECT idpropiedad, titulo, Descripcion FROM tblpropiedad WHERE idcliente='$_SESSION[id]'")or die("no busqué en propiedades");
		return $prop;
		}
		

>>>>>>> 1f22693d82efdd027128b4a534fecb9d8f3230a5
	}
?>