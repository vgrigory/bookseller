
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- book
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `book`;


CREATE TABLE `book`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(60)  NOT NULL,
	`publisher` VARCHAR(60),
	`price` FLOAT(6,2)  NOT NULL,
	`bookseller_id` INTEGER(11)  NOT NULL,
	`rebate` FLOAT(3,1) default 0.0,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `U_key_2` (`title`, `price`, `bookseller_id`),
	UNIQUE KEY `U_key_1` (`title`, `publisher`, `bookseller_id`)
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- magazine
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `magazine`;


CREATE TABLE `magazine`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(60)  NOT NULL,
	`date_of_publication` DATETIME,
	`price` FLOAT(6,2)  NOT NULL,
	`bookseller_id` INTEGER(11)  NOT NULL,
	`sold_out` TINYINT(4) default 0,
	`can_be_reordered` TINYINT(4) default 1,
	`rebate` FLOAT(3,1) default 0.0,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `U_key_2` (`title`, `price`, `bookseller_id`),
	UNIQUE KEY `U_key_1` (`title`, `date_of_publication`, `bookseller_id`)
)ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
