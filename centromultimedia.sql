-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema centromultimedia
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema centromultimedia
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `centromultimedia` DEFAULT CHARACTER SET utf8 ;
USE `centromultimedia` ;

-- -----------------------------------------------------
-- Table `centromultimedia`.`artista`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `centromultimedia`.`artista` (
  `id_artista` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_artista`))
ENGINE = InnoDB
AUTO_INCREMENT = 1666
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `centromultimedia`.`clase`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `centromultimedia`.`clase` (
  `id_clase` INT(11) NOT NULL,
  `tipo` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id_clase`),
  UNIQUE INDEX `tipo_UNIQUE` (`tipo` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `centromultimedia`.`pelicula`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `centromultimedia`.`pelicula` (
  `id_pelicula` INT(11) NOT NULL AUTO_INCREMENT,
  `cod_imdb` VARCHAR(10) NULL DEFAULT NULL,
  `url_imdb` VARCHAR(100) NULL DEFAULT NULL,
  `titulo` VARCHAR(100) NULL DEFAULT NULL,
  `año` VARCHAR(6) NULL DEFAULT NULL,
  `sinopsis` TEXT NULL DEFAULT NULL,
  `duracion` INT(3) NULL DEFAULT NULL,
  `rating` DECIMAL(4,1) NULL DEFAULT NULL,
  `cartel` VARCHAR(255) NOT NULL,
  `fichero` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_pelicula`))
ENGINE = InnoDB
AUTO_INCREMENT = 603
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `centromultimedia`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `centromultimedia`.`usuario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  `login` VARCHAR(45) NULL DEFAULT NULL,
  `password` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `login_UNIQUE` (`login` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `centromultimedia`.`favoritos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `centromultimedia`.`favoritos` (
  `id_pelicula` INT(11) NOT NULL,
  `usuario_id_usuario` INT(11) NOT NULL,
  PRIMARY KEY (`id_pelicula`, `usuario_id_usuario`),
  INDEX `fk_favoritos_pelicula1_idx` (`id_pelicula` ASC),
  INDEX `fk_favoritos_usuario1_idx` (`usuario_id_usuario` ASC),
  CONSTRAINT `fk_favoritos_pelicula1`
    FOREIGN KEY (`id_pelicula`)
    REFERENCES `centromultimedia`.`pelicula` (`id_pelicula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_favoritos_usuario1`
    FOREIGN KEY (`usuario_id_usuario`)
    REFERENCES `centromultimedia`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `centromultimedia`.`genero`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `centromultimedia`.`genero` (
  `id_genero` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_genero` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_genero`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `centromultimedia`.`pais`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `centromultimedia`.`pais` (
  `id_pais` INT(11) NOT NULL,
  `pais` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id_pais`),
  UNIQUE INDEX `pais_UNIQUE` (`pais` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `centromultimedia`.`rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `centromultimedia`.`rol` (
  `id_rol` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_rol`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `centromultimedia`.`pelicula_artista_rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `centromultimedia`.`pelicula_artista_rol` (
  `id_artista` INT(11) NOT NULL,
  `id_rol` INT(11) NOT NULL,
  `id_pelicula` INT(11) NOT NULL,
  PRIMARY KEY (`id_artista`, `id_rol`, `id_pelicula`),
  INDEX `fk_artista_rol_rol_idx` (`id_rol` ASC),
  INDEX `fk_artista_rol_pelicula_idx` (`id_pelicula` ASC),
  CONSTRAINT `fk_artista_rol_artista`
    FOREIGN KEY (`id_artista`)
    REFERENCES `centromultimedia`.`artista` (`id_artista`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_artista_rol_pelicula1`
    FOREIGN KEY (`id_pelicula`)
    REFERENCES `centromultimedia`.`pelicula` (`id_pelicula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_artista_rol_roll`
    FOREIGN KEY (`id_rol`)
    REFERENCES `centromultimedia`.`rol` (`id_rol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `centromultimedia`.`pelicula_genero`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `centromultimedia`.`pelicula_genero` (
  `id_pelicula` INT(11) NOT NULL,
  `id_genero` INT(11) NOT NULL,
  PRIMARY KEY (`id_pelicula`, `id_genero`),
  INDEX `fk_pelicula_genero_genero1_idx` (`id_genero` ASC),
  CONSTRAINT `fk_genero`
    FOREIGN KEY (`id_genero`)
    REFERENCES `centromultimedia`.`genero` (`id_genero`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pelicula`
    FOREIGN KEY (`id_pelicula`)
    REFERENCES `centromultimedia`.`pelicula` (`id_pelicula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `centromultimedia`.`pelicula_pais`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `centromultimedia`.`pelicula_pais` (
  `id_pais` INT(11) NOT NULL,
  `id_pelicula` INT(11) NOT NULL,
  PRIMARY KEY (`id_pais`, `id_pelicula`),
  INDEX `fk_pelicula_pais_pais1_idx` (`id_pais` ASC),
  INDEX `fk_pelicula_pais_pelicula1_idx` (`id_pelicula` ASC),
  CONSTRAINT `fk_pelicula_pais_pais1`
    FOREIGN KEY (`id_pais`)
    REFERENCES `centromultimedia`.`pais` (`id_pais`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pelicula_pais_pelicula1`
    FOREIGN KEY (`id_pelicula`)
    REFERENCES `centromultimedia`.`pelicula` (`id_pelicula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `centromultimedia`.`usuario_clase`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `centromultimedia`.`usuario_clase` (
  `id_usuario` INT(11) NOT NULL,
  `id_clase` INT(11) NOT NULL,
  PRIMARY KEY (`id_usuario`, `id_clase`),
  INDEX `fk_usuario_clase_clase1_idx` (`id_clase` ASC),
  CONSTRAINT `fk_usuario_clase_clase1`
    FOREIGN KEY (`id_clase`)
    REFERENCES `centromultimedia`.`clase` (`id_clase`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_clase_usuario1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `centromultimedia`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
