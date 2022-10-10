-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema gestor-orcamento
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema gestor-orcamento
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `gestor-orcamento` ;
USE `gestor-orcamento` ;

-- -----------------------------------------------------
-- Table `gestor-orcamento`.`categoria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestor-orcamento`.`categoria` ;

CREATE TABLE IF NOT EXISTS `gestor-orcamento`.`categoria` (
  `idcategoria` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NULL,
  `icon` VARCHAR(500) NOT NULL,
  PRIMARY KEY (`idcategoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestor-orcamento`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestor-orcamento`.`usuario` ;

CREATE TABLE IF NOT EXISTS `gestor-orcamento`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `primeiroNome` VARCHAR(45) NOT NULL,
  `ultimoNome` VARCHAR(45) NOT NULL,
  `usuario` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(300) NOT NULL,
  PRIMARY KEY (`idusuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestor-orcamento`.`conta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestor-orcamento`.`conta` ;

CREATE TABLE IF NOT EXISTS `gestor-orcamento`.`conta` (
  `idconta` INT NOT NULL AUTO_INCREMENT,
  `idusuario` INT NOT NULL,
  `nome` VARCHAR(30) NOT NULL,
  `descricao` VARCHAR(45) NOT NULL,
  `saldo` DECIMAL(2) NOT NULL,
  PRIMARY KEY (`idconta`, `idusuario`),
  INDEX `fk_conta_usuario1_idx` (`idusuario` ASC) VISIBLE,
  CONSTRAINT `fk_conta_usuario1`
    FOREIGN KEY (`idusuario`)
    REFERENCES `gestor-orcamento`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestor-orcamento`.`tipo_transacao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestor-orcamento`.`tipo_transacao` ;

CREATE TABLE IF NOT EXISTS `gestor-orcamento`.`tipo_transacao` (
  `idtipo` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idtipo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestor-orcamento`.`transacao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestor-orcamento`.`transacao` ;

CREATE TABLE IF NOT EXISTS `gestor-orcamento`.`transacao` (
  `idtransacao` INT NOT NULL AUTO_INCREMENT,
  `idconta` INT NOT NULL,
  `idtipo` INT NOT NULL,
  `idcategoria` INT NOT NULL,
  `valor` DECIMAL(2) NOT NULL,
  `data` DATETIME NULL,
  `comentario` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idtransacao`, `idconta`),
  INDEX `fk_fluxo_tipo_fluxo_idx` (`idtipo` ASC) VISIBLE,
  INDEX `fk_fluxo_categoria1_idx` (`idcategoria` ASC) VISIBLE,
  INDEX `fk_fluxo_conta1_idx` (`idconta` ASC) VISIBLE,
  CONSTRAINT `fk_fluxo_tipo_fluxo`
    FOREIGN KEY (`idtipo`)
    REFERENCES `gestor-orcamento`.`tipo_transacao` (`idtipo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_fluxo_categoria1`
    FOREIGN KEY (`idcategoria`)
    REFERENCES `gestor-orcamento`.`categoria` (`idcategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_fluxo_conta1`
    FOREIGN KEY (`idconta`)
    REFERENCES `gestor-orcamento`.`conta` (`idconta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
