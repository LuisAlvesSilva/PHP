CREATE DATABASE CRUD;
USE CRUD;
CREATE TABLE CRUDTABLE(
	id INT NOT NULL IDENTITY(1,1) PRIMARY key,
	nome varchar(40),
	sobrenome varchar(40),
	email varchar(40),
	pass varchar(20)
);