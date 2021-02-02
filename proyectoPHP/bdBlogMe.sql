CREATE DATABASE blog;
USE blog;
DROP DATABASE blog;

CREATE TABLE usuarios(
	id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50),
    apellidos VARCHAR(50),
    email VARCHAR(50),
    password VARCHAR(150),
    fecha DATE
); -- SELECT * FROM usuarios;
INSERT INTO usuarios VALUES(NULL,'Cristobal','Sepúlveda','crisbkn2009@live.cl','navino13',CURDATE());
CREATE TABLE categorias(
	id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50)
); -- SELECT * FROM categorias;

CREATE TABLE entradas(
	id INT PRIMARY KEY AUTO_INCREMENT,
    usuario_fk_id INT,
    categoria_fk_id INT,
    titulo VARCHAR(50),
    descripcion mediumtext,
    fecha DATE,
    FOREIGN KEY (usuario_fk_id) REFERENCES usuarios(id),
    FOREIGN KEY (categoria_fk_id) REFERENCES categorias(id)
); -- SELECT * FROM entradas;