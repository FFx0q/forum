CREATE DATABASE IF NOT EXISTS `society`;

use `society`;

CREATE TABLE `User` (
	id VARCHAR(36) PRIMARY KEY NOT NULL,
	username VARCHAR(48) UNIQUE,
	password BINARY(60),
    email VARCHAR(255),
	createdAt BIGINT(20)
) ENGINE=InnoDB;

create TABLE `Post` (
    id VARCHAR(36) PRIMARY KEY NOT NULL,
    author VARCHAR(16) NOT NULL,
    content VARCHAR(255),
    createdAt BIGINT(20),
    updatedAt BIGINT(20)
) ENGINE=InnoDB;