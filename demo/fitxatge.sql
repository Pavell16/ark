-- Crear base de dades
drop database if exists demom14;
create database if not exists demom14;
use demom14;
-- --------------------------------------

-- Taules

-- Taula d'usuaris

drop table if exists users;
 create table if not exists users (
	ID int auto_increment,
    usuari varchar(50),
    passwd varchar(255),
    hora_creacio datetime,
    constraint PK_users primary key(ID)
);
-- Taula sales

drop table if exists sales;
create table if not exists sales(
	ID int auto_increment,
    nom varchar(255),
    pis varchar(50),
    constraint PK_sala primary key(ID)
);

-- Taula motius
drop table if exists motius;
create table if not exists motius(
	ID int auto_increment,
    motiu varchar(255),
    constraint PK_motiu primary key(ID)
);
-- Taula registre fitxament

drop table if exists fitxa;
create table if not exists fitxa(
	ID int auto_increment,
    usuari int,
    motiu int,
    sala int,
    temps_fitxa datetime,
    constraint PK_fitxa primary key(ID),
    -- Unio amb la taulausuaris
    constraint FK_UnioUsuaris foreign key (usuari) references users(ID),
    constraint FK_UnioMotius foreign key(motiu) references motius(ID),
    constraint FK_UnioSales foreign key(sala) references sales(ID)
);

-- usuaris base

INSERT INTO users(users.usuari, users.passwd, users.hora_creacio) VALUES ("admin", "12345", current_timestamp());
INSERT INTO users(users.usuari, users.passwd, users.hora_creacio) VALUES ("mundane", "12345", current_timestamp());

-- motius
insert into motius(motiu) VALUES ("S'ha mort el servidor");
insert into motius(motiu) VALUES ("Manteniment del servidor");

-- sales

insert into sales(nom, pis) values ("ASIX", "3");
insert into sales(nom, pis) values ("DAM", "3");
insert into sales(nom, pis) values ("DAW", "3");