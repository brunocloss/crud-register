CREATE DATABASE projeto;

USE projeto;

CREATE TABLE users(
	`id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(30) NOT NULL,
    `email` VARCHAR(30) NOT NULL,
    `telephone` VARCHAR(15) NOT NULL,
    `pwd` VARCHAR(30) NOT NULL,
    `datetime` DATETIME DEFAULT NOW()
);