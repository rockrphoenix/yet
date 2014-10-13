SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`tblPaquetes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tblPaquetes` (
  `idPaquete` INT NOT NULL AUTO_INCREMENT,
  `Paquete` VARCHAR(45) NOT NULL,
  `Descripcion` VARCHAR(45) NOT NULL,
  `Costo` VARCHAR(45) NOT NULL,
  `Fecha` DATE NOT NULL,
  `FechaMod` DATE NULL,
  `Estatus` VARCHAR(45) NULL,
  PRIMARY KEY (`idPaquete`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`CatPaises`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`CatPaises` (
  `idCatPais` INT NOT NULL AUTO_INCREMENT,
  `Pais` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCatPais`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`catEstados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`catEstados` (
  `idCatEstado` INT NOT NULL AUTO_INCREMENT,
  `Estado` VARCHAR(45) NOT NULL,
  `idCatPais` INT NULL,
  PRIMARY KEY (`idCatEstado`),
  CONSTRAINT `fk_catEstados_CatPaises1`
    FOREIGN KEY (`idCatPais`)
    REFERENCES `mydb`.`CatPaises` (`idCatPais`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_catEstados_CatPaises1_idx` ON `mydb`.`catEstados` (`idCatPais` ASC);


-- -----------------------------------------------------
-- Table `mydb`.`catMunicipios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`catMunicipios` (
  `idCatMunicipio` INT NOT NULL AUTO_INCREMENT,
  `Municipio` VARCHAR(255) NOT NULL,
  `idCatEstado` INT NOT NULL,
  PRIMARY KEY (`idCatMunicipio`),
  CONSTRAINT `fk_catMunicipios_catEstados`
    FOREIGN KEY (`idCatEstado`)
    REFERENCES `mydb`.`catEstados` (`idCatEstado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_catMunicipios_catEstados` ON `mydb`.`catMunicipios` (`idCatEstado` ASC);


-- -----------------------------------------------------
-- Table `mydb`.`CatColonia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`CatColonia` (
  `idColonia` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(255) NOT NULL,
  `Descripcion` VARCHAR(255) NOT NULL,
  `idCatMunicipio` INT NULL,
  PRIMARY KEY (`idColonia`),
  CONSTRAINT `fk_CatColonia_catMunicipios`
    FOREIGN KEY (`idCatMunicipio`)
    REFERENCES `mydb`.`catMunicipios` (`idCatMunicipio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_CatColonia_catMunicipios1_idx` ON `mydb`.`CatColonia` (`idCatMunicipio` ASC);


-- -----------------------------------------------------
-- Table `mydb`.`catCp`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`catCp` (
  `CP` VARCHAR(5) NOT NULL,
  `idColonia` INT NOT NULL,
  PRIMARY KEY (`CP`),
  CONSTRAINT `fk_catCp_CatColonia1`
    FOREIGN KEY (`idColonia`)
    REFERENCES `mydb`.`CatColonia` (`idColonia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_catCp_CatColonia1_idx` ON `mydb`.`catCp` (`idColonia` ASC);


-- -----------------------------------------------------
-- Table `mydb`.`tblUbicacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tblUbicacion` (
  `IdUbicacion` INT NOT NULL AUTO_INCREMENT,
  `idPais` INT NOT NULL,
  `idEstado` INT NULL,
  `Ciudad` VARCHAR(100) NULL,
  `idMunicipio` INT NULL,
  `Colonia` VARCHAR(100) NULL,
  `Calle` VARCHAR(100) NULL,
  `NumeroExterior` VARCHAR(45) NULL,
  `NumeroInterior` INT NULL,
  `Entre` VARCHAR(100) NULL,
  `Longitud` VARCHAR(45) NULL,
  `Latidud` VARCHAR(45) NULL,
  `Descripcion` VARCHAR(45) NULL,
  `CP` VARCHAR(5) NULL,
  PRIMARY KEY (`IdUbicacion`),
  CONSTRAINT `idCatPais`
    FOREIGN KEY (`idPais`)
    REFERENCES `mydb`.`CatPaises` (`idCatPais`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idCatEstado`
    FOREIGN KEY (`idEstado`)
    REFERENCES `mydb`.`catEstados` (`idCatEstado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idCatMunicipio`
    FOREIGN KEY (`idMunicipio`)
    REFERENCES `mydb`.`catMunicipios` (`idCatMunicipio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `CP`
    FOREIGN KEY (`CP`)
    REFERENCES `mydb`.`catCp` (`CP`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `CP_idx` ON `mydb`.`tblUbicacion` (`CP` ASC);

CREATE INDEX `idCatPais_idx` ON `mydb`.`tblUbicacion` (`idPais` ASC);

CREATE INDEX `idCatEstado_idx` ON `mydb`.`tblUbicacion` (`idEstado` ASC);

CREATE INDEX `idCatMunicipio_idx` ON `mydb`.`tblUbicacion` (`idMunicipio` ASC);


-- -----------------------------------------------------
-- Table `mydb`.`tblTipoUsuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tblTipoUsuario` (
  `idTipoUsuario` INT NOT NULL AUTO_INCREMENT,
  `Usuario` VARCHAR(45) NOT NULL,
  `PeriodoInicial` DATE NULL,
  `PeriodoFinal` DATE NULL,
  PRIMARY KEY (`idTipoUsuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tblDatos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tblDatos` (
  `iddatos` INT NOT NULL AUTO_INCREMENT,
  `Usuario` VARCHAR(45) NOT NULL,
  `Nombres` VARCHAR(45) NOT NULL,
  `Paterno` VARCHAR(45) NOT NULL,
  `Materno` VARCHAR(45) NOT NULL,
  `Tel` VARCHAR(45) NOT NULL,
  `Cel` VARCHAR(45) NULL,
  `Email` VARCHAR(45) NOT NULL,
  `Status` VARCHAR(45) NOT NULL,
  `Contra` VARCHAR(255) NOT NULL,
  `FechaNacimiento` DATE NOT NULL,
  `idUbicacion` INT NULL,
  `idPaquete` INT NULL,
  `FechaMod` DATE NULL,
  `idTipoUsuario` INT NOT NULL,
  `fecha` INT NOT NULL,
  PRIMARY KEY (`iddatos`),
  CONSTRAINT `fk_tbDatos_tblPaquetes`
    FOREIGN KEY (`idPaquete`)
    REFERENCES `mydb`.`tblPaquetes` (`idPaquete`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbDatos_tblUbicacion1`
    FOREIGN KEY (`idUbicacion`)
    REFERENCES `mydb`.`tblUbicacion` (`IdUbicacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbDatos_tblTipoUsuario1`
    FOREIGN KEY (`idTipoUsuario`)
    REFERENCES `mydb`.`tblTipoUsuario` (`idTipoUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_tbDatos_tblPaquetes_idx` ON `mydb`.`tblDatos` (`idPaquete` ASC);

CREATE INDEX `fk_tbDatos_tblUbicacion1_idx` ON `mydb`.`tblDatos` (`idUbicacion` ASC);

CREATE INDEX `fk_tbDatos_tblTipoUsuario1_idx` ON `mydb`.`tblDatos` (`idTipoUsuario` ASC);


-- -----------------------------------------------------
-- Table `mydb`.`tblInmobiliaria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tblInmobiliaria` (
  `idInmobiliaria` INT NOT NULL AUTO_INCREMENT,
  `idCliente` INT NOT NULL,
  `Nombre` VARCHAR(200) NOT NULL,
  `RFC` VARCHAR(13) NULL,
  `email` VARCHAR(55) NOT NULL,
  `Fecha` DATE NOT NULL,
  `FechaMod` DATE NULL,
  `Estatus` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idInmobiliaria`),
  CONSTRAINT `fk_tblInmobiliaria_tbDatos1`
    FOREIGN KEY (`idCliente`)
    REFERENCES `mydb`.`tblDatos` (`iddatos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_tblInmobiliaria_tbDatos1_idx` ON `mydb`.`tblInmobiliaria` (`idCliente` ASC);


-- -----------------------------------------------------
-- Table `mydb`.`tblConfiguracion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tblConfiguracion` (
  `IdConfiguracion` INT NOT NULL AUTO_INCREMENT,
  `ColorFondo` VARCHAR(10) NOT NULL,
  `ColorPrincipal` VARCHAR(10) NOT NULL,
  `ColorTexto` VARCHAR(10) NOT NULL,
  `Logotipo` VARCHAR(45) NOT NULL,
  `Titulo` VARCHAR(128) NOT NULL,
  `Descripcion` VARCHAR(500) NOT NULL,
  `SeccionA` VARCHAR(45) NULL,
  `SeccionB` VARCHAR(45) NULL,
  `SeccionC` VARCHAR(45) NULL,
  `Template` VARCHAR(45) NULL,
  `RutaContenido` VARCHAR(255) NOT NULL,
  `idInmobiliaria` INT NOT NULL,
  PRIMARY KEY (`IdConfiguracion`),
  CONSTRAINT `fk_tblConfiguracion_tblInmobiliaria1`
    FOREIGN KEY (`idInmobiliaria`)
    REFERENCES `mydb`.`tblInmobiliaria` (`idInmobiliaria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_tblConfiguracion_tblInmobiliaria1_idx` ON `mydb`.`tblConfiguracion` (`idInmobiliaria` ASC);


-- -----------------------------------------------------
-- Table `mydb`.`catTipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`catTipo` (
  `idCatTipo` INT NOT NULL AUTO_INCREMENT,
  `Tipo` VARCHAR(45) NOT NULL,
  `Descripcion` VARCHAR(45) NOT NULL,
  `Observaciones` VARCHAR(45) NULL,
  `Fecha` DATE NOT NULL,
  `FechaMod` DATE NULL,
  `Estatus` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCatTipo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tblTransacciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tblTransacciones` (
  `idtransaccion` INT NOT NULL AUTO_INCREMENT,
  `Transaccion` VARCHAR(45) NOT NULL,
  `Monto` INT NOT NULL,
  `Descripcion` VARCHAR(45) NULL,
  `Fecha` DATE NOT NULL,
  `FechaMod` DATE NULL,
  `idClientte` INT NOT NULL,
  `idTrans` VARCHAR(45) NULL,
  PRIMARY KEY (`idtransaccion`),
  CONSTRAINT `fk_tblTransacciones_tbDatos1`
    FOREIGN KEY (`idClientte`)
    REFERENCES `mydb`.`tblDatos` (`iddatos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_tblTransacciones_tbDatos1_idx` ON `mydb`.`tblTransacciones` (`idClientte` ASC);


-- -----------------------------------------------------
-- Table `mydb`.`tblVendida`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tblVendida` (
  `idVendida` INT NOT NULL AUTO_INCREMENT,
  `Vendida` VARCHAR(45) NULL,
  `Observaciones` VARCHAR(45) NULL,
  `PrecioFinal` INT NULL,
  `ComisionFinal` VARCHAR(45) NULL,
  `FechaVEnta` DATE NULL,
  PRIMARY KEY (`idVendida`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tblTipoTerreno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tblTipoTerreno` (
  `idTipoTerreno` INT NOT NULL,
  `Nombre` VARCHAR(255) NOT NULL,
  `Descripcion` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idTipoTerreno`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tblTipoObra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tblTipoObra` (
  `idTipoObra` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NOT NULL,
  `Descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTipoObra`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tblClasificacionEdificio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tblClasificacionEdificio` (
  `idClasificacionEdificio` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(255) NOT NULL,
  `Descripcion` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idClasificacionEdificio`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tblCaracteristicas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tblCaracteristicas` (
  `idCaracteristicas` INT NOT NULL AUTO_INCREMENT,
  `M2terreno` INT NULL,
  `M2Construccion` INT NULL,
  `M2Jardin` INT NULL,
  `Mfondo` INT NULL,
  `Mfrente` INT NULL,
  `NumeroCuartos` INT NULL,
  `NumeroBanios` INT NULL,
  `Numero MediosBanios` INT NULL,
  `NumeroCocheras` INT NULL,
  `NumeroCocherasDescubiertas` INT NULL,
  `NumeroCocherasVisitas` INT NULL,
  `NumeroLineasTelefonicas` INT NULL,
  `EdadInmueble` INT NULL,
  `EstadoConservacion` VARCHAR(45) NULL,
  `CuartoServicio` VARCHAR(45) NULL,
  `NivelesConstruidos` VARCHAR(45) NULL,
  `NivelUbicacion` VARCHAR(45) NULL,
  `TipoDpto` VARCHAR(45) NULL,
  `ubicacioncuartoServicio` VARCHAR(45) NULL,
  `NumeroPrivados` VARCHAR(45) NULL,
  `idClasificacionEdificio` INT NULL,
  `idTipoObra` INT NULL,
  `idTipoTerreno` INT NULL,
  `NumeroFrentes` INT NULL,
  `FormaTerreno` VARCHAR(45) NULL,
  `UsoSuelo` VARCHAR(45) NULL,
  `Concentracion-Industrial` VARCHAR(45) NULL,
  `Ferrocarril` VARCHAR(45) NULL,
  `TransporteMultimodal` VARCHAR(45) NULL,
  `M2Oficina` VARCHAR(45) NULL,
  `AreaManiobras` VARCHAR(45) NULL,
  `TipoTecho` VARCHAR(45) NULL,
  `ViasComunicacionAutopista` VARCHAR(45) NULL,
  `Puerto` VARCHAR(45) NULL,
  `Andenes` VARCHAR(45) NULL,
  `AuraLibre` VARCHAR(45) NULL,
  `CargaPisoToneladas` VARCHAR(45) NULL,
  `Hectareas` INT NULL,
  `SistemaRiego` VARCHAR(45) NULL,
  `AbiertoVisitantes` VARCHAR(45) NULL,
  `RioCercano` VARCHAR(45) NULL,
  `SuperficiePastizal` VARCHAR(45) NULL,
  `OrigenAgua` VARCHAR(45) NULL,
  `TipoCultivos` VARCHAR(45) NULL,
  `TipoGanado` VARCHAR(45) NULL,
  `TipoRancho` VARCHAR(45) NULL,
  `VistaPanoramica` VARCHAR(45) NULL,
  `LagunaCercana` VARCHAR(45) NULL,
  `Establo` VARCHAR(45) NULL,
  `SuperficieAgricola` VARCHAR(45) NULL,
  `SuperficieHabitable` VARCHAR(45) NULL,
  `NumeroPozos` VARCHAR(45) NULL,
  `NumeroArbolesFrutales` VARCHAR(45) NULL,
  `NumeroCasas` VARCHAR(45) NULL,
  PRIMARY KEY (`idCaracteristicas`),
  CONSTRAINT `fk_tblCaracteristicas_tblTipoTerreno1`
    FOREIGN KEY (`idTipoTerreno`)
    REFERENCES `mydb`.`tblTipoTerreno` (`idTipoTerreno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblCaracteristicas_tblTipoObra1`
    FOREIGN KEY (`idTipoObra`)
    REFERENCES `mydb`.`tblTipoObra` (`idTipoObra`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblCaracteristicas_tblClasificacionEdificio1`
    FOREIGN KEY (`idClasificacionEdificio`)
    REFERENCES `mydb`.`tblClasificacionEdificio` (`idClasificacionEdificio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_tblCaracteristicas_tblTipoTerreno1_idx` ON `mydb`.`tblCaracteristicas` (`idTipoTerreno` ASC);

CREATE INDEX `fk_tblCaracteristicas_tblTipoObra1_idx` ON `mydb`.`tblCaracteristicas` (`idTipoObra` ASC);

CREATE INDEX `fk_tblCaracteristicas_tblClasificacionEdificio1_idx` ON `mydb`.`tblCaracteristicas` (`idClasificacionEdificio` ASC);


-- -----------------------------------------------------
-- Table `mydb`.`tblOtros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tblOtros` (
  `idOtros` INT NOT NULL AUTO_INCREMENT,
  `CasaCondominio` VARCHAR(45) NULL,
  `EdoConservacion` VARCHAR(45) NULL,
  `Estilo` VARCHAR(45) NULL,
  `Manttenimiento` VARCHAR(45) NULL,
  `M2Terraza` VARCHAR(45) NULL,
  `AireAcondicionado` VARCHAR(45) NULL,
  `Calefaccion` VARCHAR(45) NULL,
  `Cisterna` VARCHAR(45) NULL,
  `Parrilla` VARCHAR(45) NULL,
  `GasEstacionario` VARCHAR(45) NULL,
  `CuartoLavado` VARCHAR(45) NULL,
  `NumeroBodegas` VARCHAR(45) NULL,
  `Vigilancia` VARCHAR(45) NULL,
  `Alarmas` VARCHAR(45) NULL,
  `Accesos` VARCHAR(45) NULL,
  `ZonaArbolada` VARCHAR(45) NULL,
  `ParqueCercanol` VARCHAR(45) NULL,
  `EscuelaCercana` VARCHAR(45) NULL,
  `CocinaIntegral` VARCHAR(45) NULL,
  `Desayunador` VARCHAR(45) NULL,
  `Antecomedor` VARCHAR(45) NULL,
  `Despensa` VARCHAR(45) NULL,
  `Chimenea` VARCHAR(45) NULL,
  `Estudio` VARCHAR(45) NULL,
  `Despacho` VARCHAR(45) NULL,
  `SalaTv` VARCHAR(45) NULL,
  `NumeroVestidores` VARCHAR(45) NULL,
  `Jacuzzi` VARCHAR(45) NULL,
  `Vapor` VARCHAR(45) NULL,
  `Internet` VARCHAR(45) NULL,
  `TvDigital` VARCHAR(45) NULL,
  `SalaJuegos` VARCHAR(45) NULL,
  `SalaFiestas` VARCHAR(45) NULL,
  `Amueblado` VARCHAR(45) NULL,
  `VistaPanoramica` VARCHAR(45) NULL,
  `ComerciosCercanos` VARCHAR(45) NULL,
  `HospitalCercano` VARCHAR(45) NULL,
  `DepartamentosPorPiso` VARCHAR(45) NULL,
  `NivelesEdificio` VARCHAR(45) NULL,
  `ExteriorInterior` VARCHAR(45) NULL,
  `NoElevadores` VARCHAR(45) NULL,
  `RedIncndios` VARCHAR(45) NULL,
  `FamilyRoom` VARCHAR(45) NULL,
  `ViasRapidas` VARCHAR(45) NULL,
  `ElevadorCarga` VARCHAR(45) NULL,
  `NumeroLocales` VARCHAR(45) NULL,
  `Extinguidores` VARCHAR(45) NULL,
  `SalidaEmergencia` VARCHAR(45) NULL,
  `PlantaLuz` VARCHAR(45) NULL,
  `CorrienteTrifasica` VARCHAR(45) NULL,
  `Conmutador` VARCHAR(45) NULL,
  `Acabados` VARCHAR(45) NULL,
  `FibraOptica` VARCHAR(45) NULL,
  `CircuitoCerrado` VARCHAR(45) NULL,
  `ExclusivoCorporativo` VARCHAR(45) NULL,
  `EspacioComedor` VARCHAR(45) NULL,
  `Cafeteria` VARCHAR(45) NULL,
  `InstalacionElectrica` VARCHAR(45) NULL,
  `UbicacionPlaza` VARCHAR(45) NULL,
  `Plafones` VARCHAR(45) NULL,
  `Canceleria` VARCHAR(45) NULL,
  `GasNatural` VARCHAR(45) NULL,
  `Bascula` VARCHAR(45) NULL,
  `AguaPotable` VARCHAR(45) NULL,
  `Ilumincion` VARCHAR(45) NULL,
  `Ventilacion` VARCHAR(45) NULL,
  `BaniosOficina` VARCHAR(45) NULL,
  `AccesoTrailer` VARCHAR(45) NULL,
  `Electricidad` VARCHAR(45) NULL,
  `AguaTratada` VARCHAR(45) NULL,
  `PorcentajeIluminacion` VARCHAR(45) NULL,
  `BaniosTrabajadores` VARCHAR(45) NULL,
  `AreaLibre` VARCHAR(45) NULL,
  `MaterialConstruccion` VARCHAR(45) NULL,
  PRIMARY KEY (`idOtros`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tblDocumentacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tblDocumentacion` (
  `idDocumentacion` INT NOT NULL AUTO_INCREMENT,
  `Escritura` VARCHAR(45) NULL,
  `FechaEscrituracion` DATE NULL,
  `Notario` VARCHAR(45) NULL,
  `Licenciado` VARCHAR(45) NULL,
  `Comprador` VARCHAR(45) NULL,
  `Identificacion` VARCHAR(45) NULL,
  `NumeroRPP` VARCHAR(45) NULL,
  `FechaRPP` DATE NULL,
  `ClaveCatastral` VARCHAR(45) NULL,
  `ValorCatastral` INT NULL,
  `ComproCasaConstruida` VARCHAR(45) NULL,
  `AvisoTerminacionObra` VARCHAR(45) NULL,
  `CreditoHipotecario` VARCHAR(45) NULL,
  `Vigente` VARCHAR(45) NULL,
  `Emisor` VARCHAR(45) NULL,
  `Monto` INT NULL,
  `Mensualidad` INT NULL,
  `Estatus` VARCHAR(45) NULL,
  `Herencia` VARCHAR(45) NULL,
  `Propietarios` VARCHAR(45) NULL,
  `RegimenConyugal` VARCHAR(45) NULL,
  `Observaciones` VARCHAR(45) NULL,
  PRIMARY KEY (`idDocumentacion`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tblArea`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tblArea` (
  `idarea` INT NOT NULL AUTO_INCREMENT,
  `JuegosInfantiles` VARCHAR(45) NULL,
  `CanchaTenis` VARCHAR(45) NULL,
  `AlbercaTechada` VARCHAR(45) NULL,
  `AlbercaDescubierta` VARCHAR(45) NULL,
  `Gym` VARCHAR(45) NULL,
  `Boliche` VARCHAR(45) NULL,
  `RecepcionComun` VARCHAR(45) NULL,
  `CanchaPaddle` VARCHAR(45) NULL,
  `CasaClub` VARCHAR(45) NULL,
  `UsosMultiples` VARCHAR(45) NULL,
  `SalaCine` VARCHAR(45) NULL,
  `Otros` VARCHAR(45) NULL,
  PRIMARY KEY (`idarea`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tblTipoEstatus`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tblTipoEstatus` (
  `idTipoEstatus` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idTipoEstatus`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tblPropiedad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tblPropiedad` (
  `idPropiedad` INT NOT NULL AUTO_INCREMENT,
  `idPersonalizado` VARCHAR(45) NOT NULL,
  `idPropietario` INT NOT NULL,
  `idAsesor` INT NULL,
  `idTipo` INT NOT NULL,
  `LigaYouTube` VARCHAR(255) NULL,
  `CarpetaImagenes` VARCHAR(255) NOT NULL,
  `Descripcion` VARCHAR(255) NOT NULL,
  `Fecha` DATE NOT NULL,
  `FechaMod` DATE NULL,
  `idUbicacion` INT NOT NULL,
  `PrecioVenta` INT NULL,
  `PrecioRenta` INT NULL,
  `ComisionVenta` INT NULL,
  `ComisionREnta` INT NULL,
  `idCaracteristicas` INT NULL,
  `idDocumentacion` INT NULL,
  `idOtros` INT NULL,
  `idArea` INT NULL,
  `Comentarios` VARCHAR(255) NULL,
  `VistasPagina` INT NULL,
  `Destaque` TINYINT(1) NULL,
  `Exclusiva` TINYINT(1) NULL,
  `EstatusVenta` VARCHAR(45) NULL,
  `idVendida` INT NULL,
  `Estatus` INT NULL,
  PRIMARY KEY (`idPropiedad`),
  CONSTRAINT `fk_tblPropiedad_catTipo1`
    FOREIGN KEY (`idTipo`)
    REFERENCES `mydb`.`catTipo` (`idCatTipo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblPropiedad_tbDatos1`
    FOREIGN KEY (`idAsesor`)
    REFERENCES `mydb`.`tblDatos` (`iddatos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblPropiedad_tbDatos2`
    FOREIGN KEY (`idPropietario`)
    REFERENCES `mydb`.`tblDatos` (`iddatos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblPropiedad_tblVendida1`
    FOREIGN KEY (`idVendida`)
    REFERENCES `mydb`.`tblVendida` (`idVendida`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblPropiedad_tblCaracteristicas1`
    FOREIGN KEY (`idCaracteristicas`)
    REFERENCES `mydb`.`tblCaracteristicas` (`idCaracteristicas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblPropiedad_tblOtros1`
    FOREIGN KEY (`idOtros`)
    REFERENCES `mydb`.`tblOtros` (`idOtros`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblPropiedad_tblDocumentacion1`
    FOREIGN KEY (`idDocumentacion`)
    REFERENCES `mydb`.`tblDocumentacion` (`idDocumentacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblPropiedad_tblArea1`
    FOREIGN KEY (`idArea`)
    REFERENCES `mydb`.`tblArea` (`idarea`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblPropiedad_tblTipoEstatus1`
    FOREIGN KEY (`Estatus`)
    REFERENCES `mydb`.`tblTipoEstatus` (`idTipoEstatus`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_tblPropiedad_catTipo1_idx` ON `mydb`.`tblPropiedad` (`idTipo` ASC);

CREATE INDEX `fk_tblPropiedad_tbDatos1_idx` ON `mydb`.`tblPropiedad` (`idAsesor` ASC);

CREATE INDEX `fk_tblPropiedad_tbDatos2_idx` ON `mydb`.`tblPropiedad` (`idPropietario` ASC);

CREATE INDEX `fk_tblPropiedad_tblVendida1_idx` ON `mydb`.`tblPropiedad` (`idVendida` ASC);

CREATE INDEX `fk_tblPropiedad_tblCaracteristicas1_idx` ON `mydb`.`tblPropiedad` (`idCaracteristicas` ASC);

CREATE INDEX `fk_tblPropiedad_tblOtros1_idx` ON `mydb`.`tblPropiedad` (`idOtros` ASC);

CREATE INDEX `fk_tblPropiedad_tblDocumentacion1_idx` ON `mydb`.`tblPropiedad` (`idDocumentacion` ASC);

CREATE INDEX `fk_tblPropiedad_tblArea1_idx` ON `mydb`.`tblPropiedad` (`idArea` ASC);

CREATE INDEX `fk_tblPropiedad_tblTipoEstatus1_idx` ON `mydb`.`tblPropiedad` (`Estatus` ASC);


-- -----------------------------------------------------
-- Table `mydb`.`tblReportes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tblReportes` (
  `idRedporte` INT NOT NULL AUTO_INCREMENT,
  `Asunto` VARCHAR(255) NOT NULL,
  `Mensaje` VARCHAR(255) NOT NULL,
  `Usuario` INT NOT NULL,
  PRIMARY KEY (`idRedporte`),
  CONSTRAINT `fk_tblReportes_tblDatos1`
    FOREIGN KEY (`Usuario`)
    REFERENCES `mydb`.`tblDatos` (`iddatos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_tblReportes_tblDatos1_idx` ON `mydb`.`tblReportes` (`Usuario` ASC);


-- -----------------------------------------------------
-- Table `mydb`.`tblRespuesta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tblRespuesta` (
  `idRespuesta` INT NOT NULL AUTO_INCREMENT,
  `Asunto` VARCHAR(255) NOT NULL,
  `Mensaje` VARCHAR(255) NOT NULL,
  `Usuario` INT NOT NULL,
  `idReporte` INT NULL,
  PRIMARY KEY (`idRespuesta`),
  CONSTRAINT `fk_tblRespuesta_tblDatos1`
    FOREIGN KEY (`Usuario`)
    REFERENCES `mydb`.`tblDatos` (`iddatos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblRespuesta_tblReportes1`
    FOREIGN KEY (`idReporte`)
    REFERENCES `mydb`.`tblReportes` (`idRedporte`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_tblRespuesta_tblDatos1_idx` ON `mydb`.`tblRespuesta` (`Usuario` ASC);

CREATE INDEX `fk_tblRespuesta_tblReportes1_idx` ON `mydb`.`tblRespuesta` (`idReporte` ASC);


-- -----------------------------------------------------
-- Table `mydb`.`tblAsignacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tblAsignacion` (
  `idAsignacion` INT NOT NULL AUTO_INCREMENT,
  `asesor` INT NOT NULL,
  `cliente` INT NOT NULL,
  PRIMARY KEY (`idAsignacion`),
  CONSTRAINT `fk_tblAsignacion_tblDatos1`
    FOREIGN KEY (`cliente`)
    REFERENCES `mydb`.`tblDatos` (`iddatos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblAsignacion_tblDatos2`
    FOREIGN KEY (`asesor`)
    REFERENCES `mydb`.`tblDatos` (`iddatos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_tblAsignacion_tblDatos1_idx` ON `mydb`.`tblAsignacion` (`cliente` ASC);

CREATE INDEX `fk_tblAsignacion_tblDatos2_idx` ON `mydb`.`tblAsignacion` (`asesor` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
