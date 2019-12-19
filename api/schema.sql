CREATE DATABASE IF NOT EXITS `phpboard`;

use `phpboard`;

CREATE TABLE `category` (
	`id` INT unsigned NOT NULL AUTO_INCREMENT,
	`root_category` INT unsigned NULL,
	`name` VARCHAR(65) DEFAULT '',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `thread` (
	`id` INT unsigned NOT NULL AUTO_INCREMENT,
	`category_id` INT unsigned NOT NULL,
	`title` VARCHAR(65) NOT NULL,
	`created_date` BIGINT(20),
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;


CREATE TABLE `post` (
	`id` INT unsigned NOT NULL AUTO_INCREMENT,
	`thread_id` INT unsigned NOT NULL,
	`content` TEXT,
	`created_date` BIGINT(20),
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;