
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
-- Table `Galery`.`album`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Galery`.`album` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Galery`.`image`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Galery`.`image` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `title` VARCHAR(45) NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  `like` INT NULL DEFAULT 0,
  `dislike` INT NULL DEFAULT 0,
  `comment` INT NULL DEFAULT 0,
  `album_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_image_album_idx` (`album_id` ASC),
  CONSTRAINT `fk_image_album`
    FOREIGN KEY (`album_id`)
    REFERENCES `Galery`.`album` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Galery`.`comment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Galery`.`comment` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `comment` VARCHAR(255) NOT NULL,
  `image_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_comment_image1_idx` (`image_id` ASC),
  CONSTRAINT `fk_comment_image1`
    FOREIGN KEY (`image_id`)
    REFERENCES `Galery`.`image` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
