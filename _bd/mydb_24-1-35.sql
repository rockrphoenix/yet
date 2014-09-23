-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-07-2014 a las 20:34:38
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catcolonia`
--

CREATE TABLE IF NOT EXISTS `catcolonia` (
  `idColonia` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `idCatMunicipio` int(11) DEFAULT NULL,
  PRIMARY KEY (`idColonia`),
  KEY `fk_CatColonia_catMunicipios1_idx` (`idCatMunicipio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `catcolonia`
--

INSERT INTO `catcolonia` (`idColonia`, `Nombre`, `Descripcion`, `idCatMunicipio`) VALUES
(1, 'Martín Carrea', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catcp`
--

CREATE TABLE IF NOT EXISTS `catcp` (
  `CP` varchar(5) NOT NULL,
  `idColonia` int(11) NOT NULL,
  PRIMARY KEY (`CP`),
  KEY `fk_catCp_CatColonia1_idx` (`idColonia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `catcp`
--

INSERT INTO `catcp` (`CP`, `idColonia`) VALUES
('07070', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catestados`
--

CREATE TABLE IF NOT EXISTS `catestados` (
  `idCatEstado` int(11) NOT NULL AUTO_INCREMENT,
  `Estado` varchar(45) NOT NULL,
  `idCatPais` int(11) NOT NULL,
  PRIMARY KEY (`idCatEstado`),
  KEY `fk_catEstados_CatPaises1_idx` (`idCatPais`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `catestados`
--

INSERT INTO `catestados` (`idCatEstado`, `Estado`, `idCatPais`) VALUES
(1, 'Distrito Federal', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catmunicipios`
--

CREATE TABLE IF NOT EXISTS `catmunicipios` (
  `idCatMunicipio` int(11) NOT NULL AUTO_INCREMENT,
  `Municipio` varchar(255) NOT NULL,
  `idCatEstado` int(11) NOT NULL,
  PRIMARY KEY (`idCatMunicipio`),
  KEY `fk_catMunicipios_catEstados1_idx` (`idCatEstado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `catmunicipios`
--

INSERT INTO `catmunicipios` (`idCatMunicipio`, `Municipio`, `idCatEstado`) VALUES
(1, 'GAM', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catpaises`
--

CREATE TABLE IF NOT EXISTS `catpaises` (
  `idCatPais` int(11) NOT NULL AUTO_INCREMENT,
  `Pais` varchar(45) NOT NULL,
  PRIMARY KEY (`idCatPais`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `catpaises`
--

INSERT INTO `catpaises` (`idCatPais`, `Pais`) VALUES
(1, 'México');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cattipo`
--

CREATE TABLE IF NOT EXISTS `cattipo` (
  `idCatTipo` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(45) NOT NULL,
  `Descripcion` varchar(45) NOT NULL,
  `Observaciones` varchar(45) DEFAULT NULL,
  `Fecha` date NOT NULL,
  `FechaMod` date DEFAULT NULL,
  `Estatus` varchar(45) NOT NULL,
  PRIMARY KEY (`idCatTipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `cattipo`
--

INSERT INTO `cattipo` (`idCatTipo`, `Tipo`, `Descripcion`, `Observaciones`, `Fecha`, `FechaMod`, `Estatus`) VALUES
(1, 'Casa', 'Particular', NULL, '2014-07-21', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblarea`
--

CREATE TABLE IF NOT EXISTS `tblarea` (
  `idarea` int(11) NOT NULL AUTO_INCREMENT,
  `JuegosInfantiles` varchar(45) DEFAULT NULL,
  `CanchaTenis` varchar(45) DEFAULT NULL,
  `AlbercaTechada` varchar(45) DEFAULT NULL,
  `AlbercaDescubierta` varchar(45) DEFAULT NULL,
  `Gym` varchar(45) DEFAULT NULL,
  `Boliche` varchar(45) DEFAULT NULL,
  `RecepcionComun` varchar(45) DEFAULT NULL,
  `CanchaPaddle` varchar(45) DEFAULT NULL,
  `CasaClub` varchar(45) DEFAULT NULL,
  `UsosMultiples` varchar(45) DEFAULT NULL,
  `SalaCine` varchar(45) DEFAULT NULL,
  `Otros` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idarea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcaracteristicas`
--

CREATE TABLE IF NOT EXISTS `tblcaracteristicas` (
  `idCaracteristicas` int(11) NOT NULL AUTO_INCREMENT,
  `M2terreno` int(11) DEFAULT NULL,
  `M2Construccion` int(11) DEFAULT NULL,
  `M2Jardin` int(11) DEFAULT NULL,
  `Mfondo` int(11) DEFAULT NULL,
  `Mfrente` int(11) DEFAULT NULL,
  `NumeroCuartos` int(11) DEFAULT NULL,
  `NumeroBanios` int(11) DEFAULT NULL,
  `Numero MediosBanios` int(11) DEFAULT NULL,
  `NumeroCocheras` int(11) DEFAULT NULL,
  `NumeroCocherasDescubiertas` int(11) DEFAULT NULL,
  `NumeroCocherasVisitas` int(11) DEFAULT NULL,
  `NumeroLineasTelefonicas` int(11) DEFAULT NULL,
  `EdadInmueble` int(11) DEFAULT NULL,
  `EstadoConservacion` varchar(45) DEFAULT NULL,
  `CuartoServicio` varchar(45) DEFAULT NULL,
  `NivelesConstruidos` varchar(45) DEFAULT NULL,
  `NivelUbicacion` varchar(45) DEFAULT NULL,
  `TipoDpto` varchar(45) DEFAULT NULL,
  `ubicacioncuartoServicio` varchar(45) DEFAULT NULL,
  `NumeroPrivados` varchar(45) DEFAULT NULL,
  `idClasificacionEdificio` int(11) DEFAULT NULL,
  `idTipoObra` int(11) DEFAULT NULL,
  `idTipoTerreno` int(11) DEFAULT NULL,
  `NumeroFrentes` int(11) DEFAULT NULL,
  `FormaTerreno` varchar(45) DEFAULT NULL,
  `UsoSuelo` varchar(45) DEFAULT NULL,
  `Concentracion-Industrial` varchar(45) DEFAULT NULL,
  `Ferrocarril` varchar(45) DEFAULT NULL,
  `TransporteMultimodal` varchar(45) DEFAULT NULL,
  `M2Oficina` varchar(45) DEFAULT NULL,
  `AreaManiobras` varchar(45) DEFAULT NULL,
  `TipoTecho` varchar(45) DEFAULT NULL,
  `ViasComunicacionAutopista` varchar(45) DEFAULT NULL,
  `Puerto` varchar(45) DEFAULT NULL,
  `Andenes` varchar(45) DEFAULT NULL,
  `AuraLibre` varchar(45) DEFAULT NULL,
  `CargaPisoToneladas` varchar(45) DEFAULT NULL,
  `Hectareas` int(11) DEFAULT NULL,
  `SistemaRiego` varchar(45) DEFAULT NULL,
  `AbiertoVisitantes` varchar(45) DEFAULT NULL,
  `RioCercano` varchar(45) DEFAULT NULL,
  `SuperficiePastizal` varchar(45) DEFAULT NULL,
  `OrigenAgua` varchar(45) DEFAULT NULL,
  `TipoCultivos` varchar(45) DEFAULT NULL,
  `TipoGanado` varchar(45) DEFAULT NULL,
  `TipoRancho` varchar(45) DEFAULT NULL,
  `VistaPanoramica` varchar(45) DEFAULT NULL,
  `LagunaCercana` varchar(45) DEFAULT NULL,
  `Establo` varchar(45) DEFAULT NULL,
  `SuperficieAgricola` varchar(45) DEFAULT NULL,
  `SuperficieHabitable` varchar(45) DEFAULT NULL,
  `NumeroPozos` varchar(45) DEFAULT NULL,
  `NumeroArbolesFrutales` varchar(45) DEFAULT NULL,
  `NumeroCasas` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCaracteristicas`),
  KEY `fk_tblCaracteristicas_tblTipoTerreno1_idx` (`idTipoTerreno`),
  KEY `fk_tblCaracteristicas_tblTipoObra1_idx` (`idTipoObra`),
  KEY `fk_tblCaracteristicas_tblClasificacionEdificio1_idx` (`idClasificacionEdificio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblclasificacionedificio`
--

CREATE TABLE IF NOT EXISTS `tblclasificacionedificio` (
  `idClasificacionEdificio` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`idClasificacionEdificio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblconfiguracion`
--

CREATE TABLE IF NOT EXISTS `tblconfiguracion` (
  `IdConfiguracion` int(11) NOT NULL AUTO_INCREMENT,
  `ColorFondo` varchar(10) NOT NULL,
  `ColorPrincipal` varchar(10) NOT NULL,
  `ColorTexto` varchar(10) NOT NULL,
  `Logotipo` varchar(45) NOT NULL,
  `Titulo` varchar(128) NOT NULL,
  `Descripcion` varchar(500) NOT NULL,
  `SeccionA` varchar(45) DEFAULT NULL,
  `SeccionB` varchar(45) DEFAULT NULL,
  `SeccionC` varchar(45) DEFAULT NULL,
  `Template` varchar(45) DEFAULT NULL,
  `RutaContenido` varchar(255) NOT NULL,
  `idInmobiliaria` int(11) NOT NULL,
  PRIMARY KEY (`IdConfiguracion`),
  KEY `fk_tblConfiguracion_tblInmobiliaria1_idx` (`idInmobiliaria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldatos`
--

CREATE TABLE IF NOT EXISTS `tbldatos` (
  `iddatos` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(45) NOT NULL,
  `Nombres` varchar(45) NOT NULL,
  `Paterno` varchar(45) NOT NULL,
  `Materno` varchar(45) NOT NULL,
  `Tel` varchar(45) NOT NULL,
  `Cel` varchar(45) DEFAULT NULL,
  `Email` varchar(45) NOT NULL,
  `Status` varchar(45) NOT NULL,
  `Contra` varchar(45) DEFAULT NULL,
  `FechaNacimiento` date NOT NULL,
  `idUbicacion` int(11) DEFAULT NULL,
  `idPaquete` int(11) DEFAULT NULL,
  `Fecha` date NOT NULL,
  `FechaMod` date DEFAULT NULL,
  `idTipoUsuario` int(11) NOT NULL,
  PRIMARY KEY (`iddatos`),
  KEY `fk_tbDatos_tblPaquetes_idx` (`idPaquete`),
  KEY `fk_tbDatos_tblUbicacion1_idx` (`idUbicacion`),
  KEY `fk_tbDatos_tblTipoUsuario1_idx` (`idTipoUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `tbldatos`
--

INSERT INTO `tbldatos` (`iddatos`, `Usuario`, `Nombres`, `Paterno`, `Materno`, `Tel`, `Cel`, `Email`, `Status`, `Contra`, `FechaNacimiento`, `idUbicacion`, `idPaquete`, `Fecha`, `FechaMod`, `idTipoUsuario`) VALUES
(1, 'Marco', 'Marco Antonio', 'Izaguirre', 'Sierra', '55772189', '0445521482424', 'marco.izag@gmail.com', '1', '123456', '1982-05-13', 1, 1, '0000-00-00', '2014-07-21', 1),
(30, 'mizaguirre@gruposyse.com', 'MArco', 'Zarazua', '', '', NULL, 'mizaguirre@gruposyse.com', '1', 'd41d8cd98f00b204e9800998ecf8427e', '2014-07-27', 47, NULL, '2014-07-24', NULL, 35),
(31, 'marco__@hhxh.com', 'MArco', 'Zarazua', '', '', NULL, 'marco__@hhxh.com', '0', 'd41d8cd98f00b204e9800998ecf8427e', '2014-07-27', 48, NULL, '2014-07-24', NULL, 36),
(32, 'marco__@hhxhs.com', 'MArco', 'Zarazua', '', '', NULL, 'marco__@hhxhs.com', '0', 'd41d8cd98f00b204e9800998ecf8427e', '2014-07-27', 49, NULL, '2014-07-24', NULL, 37),
(33, 'marco_iz@yahoo.com.mx', 'MArco', 'Zarazua', '', '', NULL, 'marco_iz@yahoo.com.mx', '1', 'c33367701511b4f6020ec61ded352059', '2014-07-27', 50, NULL, '2014-07-24', NULL, 38);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldocumentacion`
--

CREATE TABLE IF NOT EXISTS `tbldocumentacion` (
  `idDocumentacion` int(11) NOT NULL AUTO_INCREMENT,
  `Escritura` varchar(45) DEFAULT NULL,
  `FechaEscrituracion` date DEFAULT NULL,
  `Notario` varchar(45) DEFAULT NULL,
  `Licenciado` varchar(45) DEFAULT NULL,
  `Comprador` varchar(45) DEFAULT NULL,
  `Identificacion` varchar(45) DEFAULT NULL,
  `NumeroRPP` varchar(45) DEFAULT NULL,
  `FechaRPP` date DEFAULT NULL,
  `ClaveCatastral` varchar(45) DEFAULT NULL,
  `ValorCatastral` int(11) DEFAULT NULL,
  `ComproCasaConstruida` varchar(45) DEFAULT NULL,
  `AvisoTerminacionObra` varchar(45) DEFAULT NULL,
  `CreditoHipotecario` varchar(45) DEFAULT NULL,
  `Vigente` varchar(45) DEFAULT NULL,
  `Emisor` varchar(45) DEFAULT NULL,
  `Monto` int(11) DEFAULT NULL,
  `Mensualidad` int(11) DEFAULT NULL,
  `Estatus` varchar(45) DEFAULT NULL,
  `Herencia` varchar(45) DEFAULT NULL,
  `Propietarios` varchar(45) DEFAULT NULL,
  `RegimenConyugal` varchar(45) DEFAULT NULL,
  `Observaciones` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idDocumentacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblinmobiliaria`
--

CREATE TABLE IF NOT EXISTS `tblinmobiliaria` (
  `idInmobiliaria` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) NOT NULL,
  `Nombre` varchar(200) NOT NULL,
  `RFC` varchar(13) DEFAULT NULL,
  `email` varchar(55) NOT NULL,
  `Fecha` date NOT NULL,
  `FechaMod` date DEFAULT NULL,
  `Estatus` varchar(45) NOT NULL,
  PRIMARY KEY (`idInmobiliaria`),
  KEY `fk_tblInmobiliaria_tbDatos1_idx` (`idCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblotros`
--

CREATE TABLE IF NOT EXISTS `tblotros` (
  `idOtros` int(11) NOT NULL AUTO_INCREMENT,
  `CasaCondominio` varchar(45) DEFAULT NULL,
  `EdoConservacion` varchar(45) DEFAULT NULL,
  `Estilo` varchar(45) DEFAULT NULL,
  `Manttenimiento` varchar(45) DEFAULT NULL,
  `M2Terraza` varchar(45) DEFAULT NULL,
  `AireAcondicionado` varchar(45) DEFAULT NULL,
  `Calefaccion` varchar(45) DEFAULT NULL,
  `Cisterna` varchar(45) DEFAULT NULL,
  `Parrilla` varchar(45) DEFAULT NULL,
  `GasEstacionario` varchar(45) DEFAULT NULL,
  `CuartoLavado` varchar(45) DEFAULT NULL,
  `NumeroBodegas` varchar(45) DEFAULT NULL,
  `Vigilancia` varchar(45) DEFAULT NULL,
  `Alarmas` varchar(45) DEFAULT NULL,
  `Accesos` varchar(45) DEFAULT NULL,
  `ZonaArbolada` varchar(45) DEFAULT NULL,
  `ParqueCercanol` varchar(45) DEFAULT NULL,
  `EscuelaCercana` varchar(45) DEFAULT NULL,
  `CocinaIntegral` varchar(45) DEFAULT NULL,
  `Desayunador` varchar(45) DEFAULT NULL,
  `Antecomedor` varchar(45) DEFAULT NULL,
  `Despensa` varchar(45) DEFAULT NULL,
  `Chimenea` varchar(45) DEFAULT NULL,
  `Estudio` varchar(45) DEFAULT NULL,
  `Despacho` varchar(45) DEFAULT NULL,
  `SalaTv` varchar(45) DEFAULT NULL,
  `NumeroVestidores` varchar(45) DEFAULT NULL,
  `Jacuzzi` varchar(45) DEFAULT NULL,
  `Vapor` varchar(45) DEFAULT NULL,
  `Internet` varchar(45) DEFAULT NULL,
  `TvDigital` varchar(45) DEFAULT NULL,
  `SalaJuegos` varchar(45) DEFAULT NULL,
  `SalaFiestas` varchar(45) DEFAULT NULL,
  `Amueblado` varchar(45) DEFAULT NULL,
  `VistaPanoramica` varchar(45) DEFAULT NULL,
  `ComerciosCercanos` varchar(45) DEFAULT NULL,
  `HospitalCercano` varchar(45) DEFAULT NULL,
  `DepartamentosPorPiso` varchar(45) DEFAULT NULL,
  `NivelesEdificio` varchar(45) DEFAULT NULL,
  `ExteriorInterior` varchar(45) DEFAULT NULL,
  `NoElevadores` varchar(45) DEFAULT NULL,
  `RedIncndios` varchar(45) DEFAULT NULL,
  `FamilyRoom` varchar(45) DEFAULT NULL,
  `ViasRapidas` varchar(45) DEFAULT NULL,
  `ElevadorCarga` varchar(45) DEFAULT NULL,
  `NumeroLocales` varchar(45) DEFAULT NULL,
  `Extinguidores` varchar(45) DEFAULT NULL,
  `SalidaEmergencia` varchar(45) DEFAULT NULL,
  `PlantaLuz` varchar(45) DEFAULT NULL,
  `CorrienteTrifasica` varchar(45) DEFAULT NULL,
  `Conmutador` varchar(45) DEFAULT NULL,
  `Acabados` varchar(45) DEFAULT NULL,
  `FibraOptica` varchar(45) DEFAULT NULL,
  `CircuitoCerrado` varchar(45) DEFAULT NULL,
  `ExclusivoCorporativo` varchar(45) DEFAULT NULL,
  `EspacioComedor` varchar(45) DEFAULT NULL,
  `Cafeteria` varchar(45) DEFAULT NULL,
  `InstalacionElectrica` varchar(45) DEFAULT NULL,
  `UbicacionPlaza` varchar(45) DEFAULT NULL,
  `Plafones` varchar(45) DEFAULT NULL,
  `Canceleria` varchar(45) DEFAULT NULL,
  `GasNatural` varchar(45) DEFAULT NULL,
  `Bascula` varchar(45) DEFAULT NULL,
  `AguaPotable` varchar(45) DEFAULT NULL,
  `Ilumincion` varchar(45) DEFAULT NULL,
  `Ventilacion` varchar(45) DEFAULT NULL,
  `BaniosOficina` varchar(45) DEFAULT NULL,
  `AccesoTrailer` varchar(45) DEFAULT NULL,
  `Electricidad` varchar(45) DEFAULT NULL,
  `AguaTratada` varchar(45) DEFAULT NULL,
  `PorcentajeIluminacion` varchar(45) DEFAULT NULL,
  `BaniosTrabajadores` varchar(45) DEFAULT NULL,
  `AreaLibre` varchar(45) DEFAULT NULL,
  `MaterialConstruccion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idOtros`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpaquetes`
--

CREATE TABLE IF NOT EXISTS `tblpaquetes` (
  `idPaquete` int(11) NOT NULL AUTO_INCREMENT,
  `Paquete` varchar(45) NOT NULL,
  `Descripcion` varchar(45) NOT NULL,
  `Costo` varchar(45) NOT NULL,
  `Fecha` date NOT NULL,
  `FechaMod` date DEFAULT NULL,
  `Estatus` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPaquete`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tblpaquetes`
--

INSERT INTO `tblpaquetes` (`idPaquete`, `Paquete`, `Descripcion`, `Costo`, `Fecha`, `FechaMod`, `Estatus`) VALUES
(1, 'Inicial', 'Es el paquete de lanzamiento de Yet', '220', '2014-07-21', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpropiedad`
--

CREATE TABLE IF NOT EXISTS `tblpropiedad` (
  `idPropiedad` int(11) NOT NULL AUTO_INCREMENT,
  `idPersonalizado` varchar(45) NOT NULL,
  `idPropietario` int(11) NOT NULL,
  `idAsesor` int(11) DEFAULT NULL,
  `idTipo` int(11) NOT NULL,
  `LigaYouTube` varchar(255) DEFAULT NULL,
  `CarpetaImagenes` varchar(255) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Fecha` date NOT NULL,
  `FechaMod` date DEFAULT NULL,
  `idUbicacion` int(11) NOT NULL,
  `PrecioVenta` int(11) DEFAULT NULL,
  `PrecioRenta` int(11) DEFAULT NULL,
  `ComisionVenta` int(11) DEFAULT NULL,
  `ComisionREnta` int(11) DEFAULT NULL,
  `idCaracteristicas` int(11) DEFAULT NULL,
  `idDocumentacion` int(11) DEFAULT NULL,
  `idOtros` int(11) DEFAULT NULL,
  `idArea` int(11) DEFAULT NULL,
  `Comentarios` varchar(255) DEFAULT NULL,
  `VistasPagina` int(11) DEFAULT NULL,
  `Destaque` tinyint(1) DEFAULT NULL,
  `Exclusiva` tinyint(1) DEFAULT NULL,
  `EstatusVenta` varchar(45) DEFAULT NULL,
  `idVendida` int(11) DEFAULT NULL,
  `Estatus` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPropiedad`),
  KEY `fk_tblPropiedad_catTipo1_idx` (`idTipo`),
  KEY `fk_tblPropiedad_tbDatos1_idx` (`idAsesor`),
  KEY `fk_tblPropiedad_tbDatos2_idx` (`idPropietario`),
  KEY `fk_tblPropiedad_tblVendida1_idx` (`idVendida`),
  KEY `fk_tblPropiedad_tblCaracteristicas1_idx` (`idCaracteristicas`),
  KEY `fk_tblPropiedad_tblOtros1_idx` (`idOtros`),
  KEY `fk_tblPropiedad_tblDocumentacion1_idx` (`idDocumentacion`),
  KEY `fk_tblPropiedad_tblArea1_idx` (`idArea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltipoestatus`
--

CREATE TABLE IF NOT EXISTS `tbltipoestatus` (
  `idTipoEstatus` int(2) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`idTipoEstatus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltipoobra`
--

CREATE TABLE IF NOT EXISTS `tbltipoobra` (
  `idTipoObra` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `Descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`idTipoObra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltipoterreno`
--

CREATE TABLE IF NOT EXISTS `tbltipoterreno` (
  `idTipoTerreno` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`idTipoTerreno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltipousuario`
--

CREATE TABLE IF NOT EXISTS `tbltipousuario` (
  `idTipoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(45) NOT NULL,
  `PeriodoInicial` date DEFAULT NULL,
  `PeriodoFinal` date DEFAULT NULL,
  PRIMARY KEY (`idTipoUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Volcado de datos para la tabla `tbltipousuario`
--

INSERT INTO `tbltipousuario` (`idTipoUsuario`, `Usuario`, `PeriodoInicial`, `PeriodoFinal`) VALUES
(1, 'ClienteYet', '2014-07-01', '2015-07-01'),
(2, '$this->arrayDatos[Tipo]', NULL, NULL),
(3, '1', NULL, NULL),
(4, '1', NULL, NULL),
(5, '1', NULL, NULL),
(6, '1', NULL, NULL),
(7, '1', NULL, NULL),
(8, '1', NULL, NULL),
(9, '1', NULL, NULL),
(10, '1', NULL, NULL),
(11, '1', NULL, NULL),
(12, '1', NULL, NULL),
(13, '1', NULL, NULL),
(14, '1', NULL, NULL),
(15, '1', NULL, NULL),
(16, '1', NULL, NULL),
(17, '1', NULL, NULL),
(18, '1', NULL, NULL),
(19, '1', NULL, NULL),
(20, '1', NULL, NULL),
(21, '1', NULL, NULL),
(22, '1', NULL, NULL),
(23, '1', NULL, NULL),
(24, '1', NULL, NULL),
(25, '1', NULL, NULL),
(26, '1', NULL, NULL),
(27, '1', NULL, NULL),
(28, '1', NULL, NULL),
(29, '1', NULL, NULL),
(30, '1', NULL, NULL),
(31, '1', NULL, NULL),
(32, '1', NULL, NULL),
(33, '1', NULL, NULL),
(34, '1', NULL, NULL),
(35, '1', NULL, NULL),
(36, '1', NULL, NULL),
(37, '1', NULL, NULL),
(38, '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltransacciones`
--

CREATE TABLE IF NOT EXISTS `tbltransacciones` (
  `idtransaccion` int(11) NOT NULL AUTO_INCREMENT,
  `Transaccion` varchar(45) NOT NULL,
  `Monto` int(11) NOT NULL,
  `Descripcion` varchar(45) DEFAULT NULL,
  `Fecha` date NOT NULL,
  `FechaMod` date DEFAULT NULL,
  `idClientte` int(11) NOT NULL,
  `idTrans` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtransaccion`),
  KEY `fk_tblTransacciones_tbDatos1_idx` (`idClientte`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblubicacion`
--

CREATE TABLE IF NOT EXISTS `tblubicacion` (
  `IdUbicacion` int(11) NOT NULL AUTO_INCREMENT,
  `idPais` int(11) DEFAULT NULL,
  `idEstado` int(11) DEFAULT NULL,
  `Ciudad` varchar(100) DEFAULT NULL,
  `idMunicipio` int(11) DEFAULT NULL,
  `Colonia` varchar(100) DEFAULT NULL,
  `Calle` varchar(100) DEFAULT NULL,
  `NumeroExterior` varchar(45) DEFAULT NULL,
  `NumeroInterior` int(11) DEFAULT NULL,
  `Entre` varchar(100) DEFAULT NULL,
  `Longitud` varchar(45) DEFAULT NULL,
  `Latitud` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(45) DEFAULT NULL,
  `CP` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`IdUbicacion`),
  KEY `CP_idx` (`CP`),
  KEY `idCatPais_idx` (`idPais`),
  KEY `idCatEstado_idx` (`idEstado`),
  KEY `idCatMunicipio_idx` (`idMunicipio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- Volcado de datos para la tabla `tblubicacion`
--

INSERT INTO `tblubicacion` (`IdUbicacion`, `idPais`, `idEstado`, `Ciudad`, `idMunicipio`, `Colonia`, `Calle`, `NumeroExterior`, `NumeroInterior`, `Entre`, `Longitud`, `Latitud`, `Descripcion`, `CP`) VALUES
(1, 1, 1, 'Distrito Federal', 1, 'Martín Carrera', 'Nicolás Bravo', '137b', 2, NULL, '19.4900259', '-99.1114743', NULL, '07070'),
(5, 1, 1, '$this->arrayDatos[Ciudad]', 1, '$this->arrayDatos[Colonia]', '$this->arrayDatos[Calle]', '$this->arrayDatos[NumeroExterior]', 0, '$this->arrayDatos[Entre]', '$this->arrayDatos[Longitud]', '$this->arrayDatos[Latitud]', '$this->arrayDatos[Descripcion]', '07070'),
(6, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblvendida`
--

CREATE TABLE IF NOT EXISTS `tblvendida` (
  `idVendida` int(11) NOT NULL AUTO_INCREMENT,
  `Vendida` varchar(45) DEFAULT NULL,
  `Observaciones` varchar(45) DEFAULT NULL,
  `PrecioFinal` int(11) DEFAULT NULL,
  `ComisionFinal` varchar(45) DEFAULT NULL,
  `FechaVEnta` date DEFAULT NULL,
  PRIMARY KEY (`idVendida`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `catcolonia`
--
ALTER TABLE `catcolonia`
  ADD CONSTRAINT `fk_CatColonia_catMunicipios1` FOREIGN KEY (`idCatMunicipio`) REFERENCES `catmunicipios` (`idCatMunicipio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `catcp`
--
ALTER TABLE `catcp`
  ADD CONSTRAINT `fk_catCp_CatColonia1` FOREIGN KEY (`idColonia`) REFERENCES `catcolonia` (`idColonia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `catestados`
--
ALTER TABLE `catestados`
  ADD CONSTRAINT `fk_catEstados_CatPaises1` FOREIGN KEY (`idCatPais`) REFERENCES `catpaises` (`idCatPais`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `catmunicipios`
--
ALTER TABLE `catmunicipios`
  ADD CONSTRAINT `fk_catMunicipios_catEstados1` FOREIGN KEY (`idCatEstado`) REFERENCES `catestados` (`idCatEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblcaracteristicas`
--
ALTER TABLE `tblcaracteristicas`
  ADD CONSTRAINT `fk_tblCaracteristicas_tblClasificacionEdificio1` FOREIGN KEY (`idClasificacionEdificio`) REFERENCES `tblclasificacionedificio` (`idClasificacionEdificio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblCaracteristicas_tblTipoObra1` FOREIGN KEY (`idTipoObra`) REFERENCES `tbltipoobra` (`idTipoObra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblCaracteristicas_tblTipoTerreno1` FOREIGN KEY (`idTipoTerreno`) REFERENCES `tbltipoterreno` (`idTipoTerreno`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblconfiguracion`
--
ALTER TABLE `tblconfiguracion`
  ADD CONSTRAINT `fk_tblConfiguracion_tblInmobiliaria1` FOREIGN KEY (`idInmobiliaria`) REFERENCES `tblinmobiliaria` (`idInmobiliaria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbldatos`
--
ALTER TABLE `tbldatos`
  ADD CONSTRAINT `fk_tbDatos_tblPaquetes` FOREIGN KEY (`idPaquete`) REFERENCES `tblpaquetes` (`idPaquete`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbDatos_tblTipoUsuario1` FOREIGN KEY (`idTipoUsuario`) REFERENCES `tbltipousuario` (`idTipoUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbDatos_tblUbicacion1` FOREIGN KEY (`idUbicacion`) REFERENCES `tblubicacion` (`IdUbicacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblinmobiliaria`
--
ALTER TABLE `tblinmobiliaria`
  ADD CONSTRAINT `fk_tblInmobiliaria_tbDatos1` FOREIGN KEY (`idCliente`) REFERENCES `tbldatos` (`iddatos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblpropiedad`
--
ALTER TABLE `tblpropiedad`
  ADD CONSTRAINT `fk_tblPropiedad_catTipo1` FOREIGN KEY (`idTipo`) REFERENCES `cattipo` (`idCatTipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblPropiedad_tbDatos1` FOREIGN KEY (`idAsesor`) REFERENCES `tbldatos` (`iddatos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblPropiedad_tbDatos2` FOREIGN KEY (`idPropietario`) REFERENCES `tbldatos` (`iddatos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblPropiedad_tblArea1` FOREIGN KEY (`idArea`) REFERENCES `tblarea` (`idarea`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblPropiedad_tblCaracteristicas1` FOREIGN KEY (`idCaracteristicas`) REFERENCES `tblcaracteristicas` (`idCaracteristicas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblPropiedad_tblDocumentacion1` FOREIGN KEY (`idDocumentacion`) REFERENCES `tbldocumentacion` (`idDocumentacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblPropiedad_tblOtros1` FOREIGN KEY (`idOtros`) REFERENCES `tblotros` (`idOtros`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblPropiedad_tblVendida1` FOREIGN KEY (`idVendida`) REFERENCES `tblvendida` (`idVendida`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbltransacciones`
--
ALTER TABLE `tbltransacciones`
  ADD CONSTRAINT `fk_tblTransacciones_tbDatos1` FOREIGN KEY (`idClientte`) REFERENCES `tbldatos` (`iddatos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblubicacion`
--
ALTER TABLE `tblubicacion`
  ADD CONSTRAINT `CP` FOREIGN KEY (`CP`) REFERENCES `catcp` (`CP`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idCatEstado` FOREIGN KEY (`idEstado`) REFERENCES `catestados` (`idCatEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idCatMunicipio` FOREIGN KEY (`idMunicipio`) REFERENCES `catmunicipios` (`idCatMunicipio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idCatPais` FOREIGN KEY (`idPais`) REFERENCES `catpaises` (`idCatPais`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
