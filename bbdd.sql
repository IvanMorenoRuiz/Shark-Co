-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema shakandco
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema shakandco
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `shakandco` DEFAULT CHARACTER SET utf8mb4 ;
USE `shakandco` ;

-- -----------------------------------------------------
-- Table `shakandco`.`tbl_alumno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shakandco`.`tbl_alumno` (
  `num_matricula` INT(11) NOT NULL AUTO_INCREMENT,
  `dni_alu` VARCHAR(10) NOT NULL,
  `nombre_alu` VARCHAR(50) NOT NULL,
  `apellido_alu` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`num_matricula`))
ENGINE = InnoDB
AUTO_INCREMENT = 123456790
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `shakandco`.`tbl_departamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shakandco`.`tbl_departamento` (
  `id_dep` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_dept` VARCHAR(50) NULL DEFAULT NULL,
  `codigo_dept` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_dep`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `shakandco`.`tbl_profesor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shakandco`.`tbl_profesor` (
  `dni_prof` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_prof` VARCHAR(50) NOT NULL,
  `contrasena_prof` VARCHAR(60) NOT NULL,
  `apellido_prof` VARCHAR(50) NOT NULL,
  `email_prof` VARCHAR(100) NOT NULL,
  `dept_prof` INT(11) NOT NULL,
  PRIMARY KEY (`dni_prof`),
  INDEX `fk_dept_prof` (`dept_prof` ASC),
  CONSTRAINT `fk_dept_prof`
    FOREIGN KEY (`dept_prof`)
    REFERENCES `shakandco`.`tbl_departamento` (`id_dep`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `shakandco`.`tbl_assignatura`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shakandco`.`tbl_assignatura` (
  `id_assignatura` INT(11) NOT NULL AUTO_INCREMENT,
  `codigo_clase` INT(11) NOT NULL,
  `nombre_assignatura` VARCHAR(50) NOT NULL,
  `profesor` INT(11) NOT NULL,
  PRIMARY KEY (`id_assignatura`),
  INDEX `fk_profesor` (`profesor` ASC),
  CONSTRAINT `fk_profesor`
    FOREIGN KEY (`profesor`)
    REFERENCES `shakandco`.`tbl_profesor` (`dni_prof`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `shakandco`.`tbl_alumno_nota_assignatura`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shakandco`.`tbl_alumno_nota_assignatura` (
  `id_alumno_nota_assignatura` INT(11) NOT NULL AUTO_INCREMENT,
  `num_matricula` INT(11) NOT NULL,
  `nota_alumno` DECIMAL(4,2) NOT NULL,
  `id_assignatura` INT(11) NOT NULL,
  PRIMARY KEY (`id_alumno_nota_assignatura`),
  INDEX `fk_alumno_nota` (`num_matricula` ASC),
  INDEX `fk_assignatura_nota` (`id_assignatura` ASC),
  CONSTRAINT `fk_alumno_nota`
    FOREIGN KEY (`num_matricula`)
    REFERENCES `shakandco`.`tbl_alumno` (`num_matricula`),
  CONSTRAINT `fk_assignatura_nota`
    FOREIGN KEY (`id_assignatura`)
    REFERENCES `shakandco`.`tbl_assignatura` (`id_assignatura`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
