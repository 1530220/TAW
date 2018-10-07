create database `mvc`;

create table `mvc`.`users` ( 
	`id` INT NOT NULL AUTO_INCREMENT , 
	`usuario` VARCHAR(300) NOT NULL , 
	`password` VARCHAR(300) NOT NULL ,
	`email` VARCHAR(300) NOT NULL ,
	PRIMARY KEY (`id`)
);
