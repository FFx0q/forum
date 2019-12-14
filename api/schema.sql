CREATE DATABASE IF NOT EXITS `phpboard`;

use `phpboard`;

CREATE TABLE `category` (
	`id` INT unsigned NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(65) DEFAULT '',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

