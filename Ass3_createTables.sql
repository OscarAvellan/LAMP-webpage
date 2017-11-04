-- -----------------------------------------------------------------------------
-- Created by Oscar Avellan
-- -----------------------------------------------------------------------------

-- -----------------------------------------------------
-- Table `Spatula`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Spatula` ;

CREATE TABLE IF NOT EXISTS `Spatula` (
  `idSpatula` INT NOT NULL AUTO_INCREMENT,
  `ProductName` VARCHAR(50) NOT NULL,
  `Type` ENUM('Food','Drugs','Paints','Plaster') NOT NULL,
  `Size` VARCHAR(50) NOT NULL,
  `Colour` VARCHAR(50) NOT NULL,
  `Price` DECIMAL(10,2) NOT NULL,
  `QuantityInStock` INT NOT NULL,
  PRIMARY KEY (`idSpatula`)
  )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `Order`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Order` ;

CREATE TABLE IF NOT EXISTS `Order` (
  `idOrder` INT NOT NULL AUTO_INCREMENT,
  `RequestedTime` DATETIME NOT NULL,
  `ResponsibleStaffMember` VARCHAR(100) NOT NULL,
  `CustomerDetails` VARCHAR(300) NOT NULL,
  PRIMARY KEY (`idOrder`)
   )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `OrderLineItem`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `OrderLineItem` ;

CREATE TABLE IF NOT EXISTS `OrderLineItem` (
  `idSpatula` INT NOT NULL,
  `idOrder` INT NOT NULL,
  `Quantity` INT NOT NULL,
  PRIMARY KEY (`idSpatula`,`idOrder`),
	FOREIGN KEY(`idSpatula`)
    REFERENCES `Spatula`(`idSpatula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
	FOREIGN KEY(`idOrder`)
    REFERENCES `Order`(`idOrder`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    )
ENGINE = InnoDB;
