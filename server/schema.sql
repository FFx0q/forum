CREATE DATABASE IF NOT EXISTS `society`;

use `society`;

CREATE TABLE `User` (
	id VARCHAR(36) PRIMARY KEY NOT NULL,
	login VARCHAR(48) UNIQUE NOT NULL,
	password BINARY(60),
    email VARCHAR(255),
	createdAt DATETIME
) ENGINE=InnoDB;

create TABLE `Post` (
    id VARCHAR(36) PRIMARY KEY NOT NULL,
    author VARCHAR(36) NOT NULL,
    content TEXT,
    createdAt DATETIME,
    updatedAt DATETIME
) ENGINE=InnoDB;