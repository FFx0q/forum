CREATE DATABASE IF NOT EXISTS `phpboard`;

use `phpboard`;

CREATE TABLE `category` (
	`id` INT unsigned NOT NULL AUTO_INCREMENT,
	`root_category` INT unsigned NULL,
	`name` VARCHAR(65) DEFAULT '',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `user` (
	`id` INT unsigned NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(48),
	`password_hash` BINARY(60),
	`email` VARCHAR(255),
	`join_date` BIGINT(20),
	`avatar_url` VARCHAR(64),
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `thread` (
	`id` INT unsigned NOT NULL AUTO_INCREMENT,
	`category_id` INT unsigned NOT NULL,
	`author_id` INT unsigned NOT NULL,
	`title` VARCHAR(65) NOT NULL,
	`created_date` BIGINT(20),
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;


CREATE TABLE `post` (
	`id` INT unsigned NOT NULL AUTO_INCREMENT,
	`thread_id` INT unsigned NOT NULL,
	`author_id` INT unsigned NOT NULL,
	`content` TEXT,
	`created_date` BIGINT(20),
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;