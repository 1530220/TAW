create table usuarios(
	id  int primary key auto_increment,
	nombre varchar(255),
	paterno varchar(255),
	materno varchar(255),
	email varchar(255),
	nickname varchar(255),
	password varchar(255),
	tipo varchar(255),
	puntos int
);
insert into usuarios (nombre,paterno,materno,email,nickname,password,tipo) 
	values("admin","admin","admin","admin@gmail.com","admin","admin","administrador");
insert into usuarios (nombre,paterno,materno,email,nickname,password,tipo,puntos) 
	values("mario","rodriguez","chavez","mario@gmail.com","mario","mario","cliente",0);

create table premios(
	id int primary key auto_increment,
	nombre varchar(255),
	descripcion varchar(255),
	puntos int
);

create table promociones(
	id int primary key auto_increment,
	nombre varchar(255),
	descripcion varchar(255)
);
 
create table visitas(
	id int primary key auto_increment,
	idUsuario int,
	fecha date,
	hora time,
	foreign key(idUsuario) references usuarios(id)
);

create table horario(
	id int primary key auto_increment,
	descripcion varchar(255)
);

insert into horario (descripcion) values ("De lunes a viernes: 9:00 - 14:00");