-- MySQL Workbench Synchronization
-- Generated: 2017-11-07 14:31
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: 2507

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

ALTER SCHEMA `inventario`  DEFAULT CHARACTER SET utf8  DEFAULT COLLATE utf8_general_ci ;

ALTER TABLE `inventario`.`articulos` 
ADD COLUMN `proyectos_id` INT(11) NOT NULL AFTER `create_time`,
ADD COLUMN `responsables_id` INT(11) NOT NULL DEFAULT 0 AFTER `proyectos_id`,
ADD INDEX `fk_articulos_proyectos1_idx` (`proyectos_id` ASC),
ADD INDEX `fk_articulos_responsables1_idx` (`responsables_id` ASC);

ALTER TABLE `inventario`.`historicos` 
CHANGE COLUMN `tipo` `tipo` ENUM('Pase', 'Prestamo', 'Alta', 'Retorno', 'Reparacion') NOT NULL ,
ADD COLUMN `observacion` VARCHAR(255) NULL DEFAULT NULL AFTER `tipo`;

CREATE TABLE IF NOT EXISTS `inventario`.`proyectos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `inventario`.`responsables` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `apellido` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

ALTER TABLE `inventario`.`articulos` 
ADD CONSTRAINT `fk_articulos_proyectos1`
  FOREIGN KEY (`proyectos_id`)
  REFERENCES `inventario`.`proyectos` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_articulos_responsables1`
  FOREIGN KEY (`responsables_id`)
  REFERENCES `inventario`.`responsables` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
