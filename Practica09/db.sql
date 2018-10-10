CREATE DATABASE `practica09`;

CREATE TABLE `practica09`.`alumno` ( 
	`matricula` INT NOT NULL AUTO_INCREMENT , 
	`nombre` VARCHAR(300) NOT NULL , 
	`carrera` VARCHAR(300) NOT NULL , 
	`situacion` VARCHAR(300) NOT NULL , 
	`email` VARCHAR(300) NOT NULL , 
	`tutor` VARCHAR(300) NOT NULL , 
	`imagen` VARCHAR(1000) NOT NULL , 
	PRIMARY KEY (`matricula`));

CREATE TABLE `practica09`.`carrera` ( 
	`id` INT NOT NULL AUTO_INCREMENT , 
	`nombre` VARCHAR(300) NOT NULL , 
	PRIMARY KEY (`id`));

CREATE TABLE `practica09`.`tutor` ( 
	`id` INT NOT NULL AUTO_INCREMENT , 
	`nombre` VARCHAR(300) NOT NULL , 
	`carrera` VARCHAR(300) NOT NULL , 
	PRIMARY KEY (`id`));


INSERT INTO `carrera` (`id`, `nombre`) 
VALUES (NULL, 'ingenieria en tecnologias de la informacion'), 
	   (NULL, 'ingenieria mecatronica');



INSERT INTO `tutor` (`id`, `nombre`, `carrera`) 
VALUES (NULL, 'mario humberto rodriguez', 'ingenieria en tecnologias de la informacion'), 
	   (NULL, 'jorge omar jasso', 'ingenieria en tecnologias de la informacion');