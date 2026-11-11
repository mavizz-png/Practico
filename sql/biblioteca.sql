-- Biblioteca Virtual - Práctico 2
CREATE DATABASE IF NOT EXISTS biblioteca CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE biblioteca;

CREATE TABLE roles (
  id_rol INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(30) NOT NULL UNIQUE
) ENGINE=InnoDB;

CREATE TABLE usuarios (
  id_usuario INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(80) NOT NULL,
  email VARCHAR(120) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  id_rol INT NOT NULL,
  fecha_registro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (id_rol) REFERENCES roles(id_rol)
) ENGINE=InnoDB;

CREATE TABLE categorias (
  id_categoria INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(60) NOT NULL UNIQUE
) ENGINE=InnoDB;

CREATE TABLE autores (
  id_autor INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE editoriales (
  id_editorial INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE articulos (
  id_articulo INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(150) NOT NULL,
  descripcion TEXT,
  tipo ENUM('libro','revista','audiolibro','comic','manga') NOT NULL DEFAULT 'libro',
  imagen VARCHAR(255),
  precio DECIMAL(10,2) DEFAULT 0,
  disponible TINYINT(1) NOT NULL DEFAULT 1,
  destacado TINYINT(1) NOT NULL DEFAULT 0,
  fecha_alta DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  id_categoria INT NOT NULL,
  id_autor INT NOT NULL,
  id_editorial INT NULL,
  FOREIGN KEY (id_categoria) REFERENCES categorias(id_categoria),
  FOREIGN KEY (id_autor) REFERENCES autores(id_autor),
  FOREIGN KEY (id_editorial) REFERENCES editoriales(id_editorial)
) ENGINE=InnoDB;

INSERT INTO roles (id_rol, nombre) VALUES (1,'Administrador'),(2,'Usuario');
INSERT INTO categorias (nombre) VALUES
 ('Cuentos Infantiles'),('Historia'),('Acción'),('Misterio'),('Terror'),('Literatura clásica');
-- El usuario administrador se crea ejecutando crear_admin.php (una sola vez)
