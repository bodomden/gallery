
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema Galery
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Galery
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Galery` DEFAULT CHARACTER SET utf8 ;
USE `Galery` ;

-- -----------------------------------------------------
-- Table `Galery`.`Album`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Galery`.`Album` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Galery`.`Image`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Galery`.`Image` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `title` VARCHAR(45) NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  `like` INT NULL DEFAULT 0,
  `dislike` INT NULL DEFAULT 0,
  `comment` INT NULL DEFAULT 0,
  `album_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Image_Album_idx` (`album_id` ASC),
  CONSTRAINT `fk_Image_Album`
    FOREIGN KEY (`album_id`)
    REFERENCES `Galery`.`Album` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Galery`.`Comment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Galery`.`Comment` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `comment` VARCHAR(255) NOT NULL,
  `Image_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Comment_Image1_idx` (`Image_id` ASC),
  CONSTRAINT `fk_Comment_Image1`
    FOREIGN KEY (`Image_id`)
    REFERENCES `Galery`.`Image` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
