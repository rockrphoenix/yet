<?php
	require_once("../clases/class.conexion.php");
	/**
	* por marco izaguirre marco.izag@gmail.com
	*para grupo syse
	*/
	class Listados extends Conexion
	{		
		protected $idcliente;
		function __construct()
		{
			$_POST;
			$_SESSION;	
			parent::__construct();
			$this->idcliente=$_SESSION['id'];
		}
		function oficinas(){
			$ofi = $this->conexion->query("SELECT * FROM tbloficina WHERE id_cliente = '$this->idcliente' AND status ='1'")or die("No puedo conectarme a oficinas");
			return $ofi;
			$this->conexion->close();
			$ofi->free();
		}

		function asesores(){
			$ases=$this->conexion->query("SELECT * FROM tblasesores WHERE idcliente='$this->idcliente'AND estatus ='1'")or die("No puedo conectarme a asesores");
			return $ases;
			$this->conexion->close();
			$ases->free();
		}

		function redes(){
			$red=$this->conexion->query("SELECT facebook, twitter, conf.idInmobiliaria, email FROM tblconfiguracion AS conf INNER JOIN tblinmobiliaria AS inmo ON conf.idInmobiliaria=inmo.idInmobiliaria AND idCliente='$this->idcliente'AND Estatus='1'")or die("no se realizo la consulta");
			return $red;
			$this->conexion->close();
			$red->free();
		}
		function seccion(){
			$secc=$this->conexion->query("SELECT * FROM tblseccion WHERE idcliente='$this->idcliente'AND estatus ='1'")or die("No puedo conectarme a asesores");
			return $secc;
			$this->conexion->close();
			$secc->free();
		}
		function datosFacturacion(){
			$datos=$this->conexion->query("SELECT ubi.idubicacion as idubicacion, Estado, Ciudad, Municipio, Colonia, Calle, NumeroExterior, NumeroInterior,CP, nombrers, rfc, tel, email FROM tblubicacion as ubi INNER JOIN tbldatosfact as datosf on datosf.idubicacion=ubi.idubicacion AND idcliente='$this->idcliente'")or die("no se obtuveiron datos");
			return $datos;
			$this->conexion->close();
			$datos->free();
		}

		function Propiedades(){
			//$prop=$this->conexion->query("SELECT prop.idCaracteristicas as idCaracteristicas, LigaYouTube, Descripcion, Fecha, FechaMod, PrecioVenta, PrecioRenta, ComisionVenta,ComisionREnta, Comentarios, EstatusVenta, M2terreno, M2Construccion, M2Jardin, Mfondo, Mfrente, NumeroCuartos, NumeroBanios, NumeroMediosBanios, NumeroCocheras, NumeroCocherasDescubiertas, NumeroCocherasVisitas, NumeroLineasTelefonicas, EdadInmueble, EstadoConservacion, CuartoServicio, NivelesConstruidos, NivelUbicacion, TipoDpto, ubicacioncuartoServicio, NumeroPrivados, idClasificacionEdificio, nunidades, nnounidades, idTipoObra, idTipoTerreno, NumeroFrentes, FormaTerreno, UsoSuelo, ConcentracionIndustrial, Ferrocarril, TransporteMultimodal, M2Oficina, m2bodega, AreaManiobras, TipoTecho, ViasComunicacionAutopista, Puerto, Andenes, CargaPisoToneladas, Hectareas, SistemaRiego, AbiertoVisitantes, RioCercano, SuperficiePastizal, OrigenAgua, TipoCultivos, TipoGanado, TipoRancho, VistaPanoramica, LagunaCercana, Establo, SuperficieAgricola, SuperficieHabitable, NumeroPozos, NumeroArbolesFrutales, NumeroCasas,bdescripcion,descripcionr FROM tblpropiedad as prop INNER JOIN tblcaracteristicas as caract on prop.idCaracteristicas=caract.idCaracteristicas AND idcliente='$this->idcliente'")or die("no se obtuveiron datos");
			$prop=$this->conexion->query("SELECT prop.LigaYouTube, prop.idTipo, prop.idPropiedad,prop.titulo,ub.estado,ub.municipio,ub.colonia,prop.PrecioVenta,prop.PrecioRenta,prop.idPersonalizado,prop.publicacion FROM tblpropiedad as prop inner join tblubicacion as ub on ub.IdUbicacion=prop.idUbicacion AND idcliente=$_SESSION[id] AND Estatus='1'");
			return $prop;
			$this->conexion->close();
			$prop->free();
			
		}

	}
?>