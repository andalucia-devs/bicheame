SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `bicheame` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `bicheame` ;

-- -----------------------------------------------------
-- Table `bicheame`.`domain`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bicheame`.`domain` ;

CREATE  TABLE IF NOT EXISTS `bicheame`.`domain` (
  `domain_id` INT NOT NULL AUTO_INCREMENT ,
  `domain_name` VARCHAR(60) NOT NULL ,
  `domain_blocked` TINYINT NOT NULL DEFAULT 0 ,
  `domain_date` DATETIME NOT NULL ,
  PRIMARY KEY (`domain_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bicheame`.`login`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bicheame`.`login` ;

CREATE  TABLE IF NOT EXISTS `bicheame`.`login` (
  `login_id` INT NOT NULL AUTO_INCREMENT ,
  `domain_id` INT NOT NULL ,
  `login_username` VARCHAR(45) NOT NULL ,
  `login_password` VARCHAR(45) NOT NULL ,
  `login_comment` VARCHAR(45) NULL ,
  `login_date` DATETIME NOT NULL ,
  `votes_positive` INT NOT NULL DEFAULT 0 ,
  `votes_negative` INT NOT NULL DEFAULT 0 ,
  PRIMARY KEY (`login_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bicheame`.`vote`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bicheame`.`vote` ;

CREATE  TABLE IF NOT EXISTS `bicheame`.`vote` (
  `vote_id` INT NOT NULL AUTO_INCREMENT ,
  `login_id` INT NOT NULL ,
  `vote_value` TINYINT NOT NULL ,
  `vote_ip` VARCHAR(45) NULL ,
  `vote_date` DATETIME NOT NULL ,
  PRIMARY KEY (`vote_id`) ,
  INDEX `fk_vote_1` (`login_id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bicheame`.`config`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bicheame`.`config` ;

CREATE  TABLE IF NOT EXISTS `bicheame`.`config` (
  `site_name` VARCHAR(45) NOT NULL ,
  `site_enabled` TINYINT NOT NULL ,
  `admin_user` VARCHAR(45) NOT NULL ,
  `admin_password` VARCHAR(45) NOT NULL )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
