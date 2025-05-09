CREATE DATABASE IF NOT EXISTS cazadores_bd;
USE cazadores_bd;

CREATE TABLE IF NOT EXISTS SOCIOS (
    ID_Socio INT AUTO_INCREMENT PRIMARY KEY,
    DNI VARCHAR(9) UNIQUE NOT NULL,
    Nombre VARCHAR(50) NOT NULL,
    Apellido1 VARCHAR(50) NOT NULL,
    Apellido2 VARCHAR(50),
    Fecha_Nacimiento DATE NOT NULL,
    Localidad VARCHAR(100) NOT NULL,
    Domicilio VARCHAR(150) NOT NULL,
    Codigo_Postal VARCHAR(10) NOT NULL,
    Telefono VARCHAR(15),
    Email VARCHAR(100),
    Fecha_Alta DATE NOT NULL,
    Fecha_Baja DATE,
    Estado ENUM('Activo', 'Inactivo', 'Suspendido') DEFAULT 'Activo',
    ROL ENUM('Admin', 'Socio') DEFAULT 'Socio',

    CONSTRAINT chk_dni_format CHECK (DNI REGEXP '^[0-9]{8}[A-Za-z]$'),
    CONSTRAINT chk_email_format CHECK (Email IS NULL OR Email LIKE '%@%.%')
);


CREATE TABLE IF NOT EXISTS LICENCIAS (
    ID_Licencia INT AUTO_INCREMENT PRIMARY KEY,
    Tipo_Licencia INT NOT NULL,
    Descripcion VARCHAR(100) NOT NULL,
    Vigencia INT NOT NULL COMMENT 'Duración en años',
    Precio DECIMAL(10,2) NOT NULL,
    CONSTRAINT chk_vigencia_positiva CHECK (Vigencia > 0)
);


CREATE TABLE IF NOT EXISTS SOCIO_LICENCIAS (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    ID_Socio INT NOT NULL,
    ID_Licencia INT NOT NULL,
    Fecha_Expedicion DATE NOT NULL,
    Fecha_Caducidad DATE NOT NULL,
    Numero_Licencia VARCHAR(20) UNIQUE,
    Ruta_Documento VARCHAR(255) COMMENT 'Ruta al archivo escaneado',
    FOREIGN KEY (ID_Socio) REFERENCES SOCIOS(ID_Socio),
    FOREIGN KEY (ID_Licencia) REFERENCES LICENCIAS(ID_Licencia),
    CONSTRAINT chk_fechas_validas CHECK (Fecha_Caducidad > Fecha_Expedicion)
);

CREATE TABLE IF NOT EXISTS MODALIDADES_CAZA (
    ID_Modalidad INT AUTO_INCREMENT PRIMARY KEY,
    Nombre_Modalidad VARCHAR(50) NOT NULL,
    Descripcion TEXT,
    Temporada_Inicio DATE NOT NULL,
    Temporada_Fin DATE NOT NULL,
    Tipo_Caza ENUM('Mayor', 'Menor') NOT NULL,
    Arma_Predominante VARCHAR(30),
    Requiere_Permiso_Especial BOOLEAN DEFAULT FALSE,
    CONSTRAINT chk_temporada_valida CHECK (Temporada_Fin > Temporada_Inicio)
);

CREATE TABLE IF NOT EXISTS SOCIO_MODALIDADES (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    ID_Socio INT NOT NULL,
    ID_Modalidad INT NOT NULL,
    Fecha_Registro DATE NOT NULL DEFAULT CURRENT_DATE,
    FOREIGN KEY (ID_Socio) REFERENCES SOCIOS(ID_Socio),
    FOREIGN KEY (ID_Modalidad) REFERENCES MODALIDADES_CAZA(ID_Modalidad),
    CONSTRAINT uc_socio_modalidad UNIQUE (ID_Socio, ID_Modalidad)
);


INSERT INTO SOCIOS (DNI, Nombre, Apellido1, Apellido2, Fecha_Nacimiento, Localidad, Domicilio, Codigo_Postal, Telefono, Email, Fecha_Alta, Fecha_Baja, Estado, ROL) 
VALUES ('12345678Z', 'Shenhao', 'Zhou', 'Zhou', '1990-05-15', 'Cáceres', 'Calle Mayor 5', '10001', '600123456', 'shenhao.zhou@example.com', '2023-01-01', NULL, 'Activo', 'Admin');


INSERT INTO SOCIOS (DNI, Nombre, Apellido1, Apellido2, Fecha_Nacimiento, Localidad, Domicilio, Codigo_Postal, Telefono, Email, Fecha_Alta, Fecha_Baja, Estado, ROL) 
VALUES ('23456789X', 'Juan', 'Gómez', 'Pérez', '1985-03-10', 'Badajoz', 'Avenida de la Paz 15', '06001', '610234567', 'juan.gomez@example.com', '2022-07-01', NULL, 'Activo', 'Socio');


INSERT INTO SOCIOS (DNI, Nombre, Apellido1, Apellido2, Fecha_Nacimiento, Localidad, Domicilio, Codigo_Postal, Telefono, Email, Fecha_Alta, Fecha_Baja, Estado, ROL) 
VALUES ('34567890Y', 'María', 'López', 'Rodríguez', '1992-11-22', 'Mérida', 'Plaza España 8', '06800', '620345678', 'maria.lopez@example.com', '2021-05-12', NULL, 'Activo', 'Socio');


INSERT INTO SOCIOS (DNI, Nombre, Apellido1, Apellido2, Fecha_Nacimiento, Localidad, Domicilio, Codigo_Postal, Telefono, Email, Fecha_Alta, Fecha_Baja, Estado, ROL) 
VALUES ('45678901W', 'Pedro', 'Fernández', 'Martín', '1978-08-05', 'Plasencia', 'Calle Real 12', '10600', '630456789', 'pedro.fernandez@example.com', '2020-02-18', '2023-08-01', 'Inactivo', 'Socio');


INSERT INTO SOCIOS (DNI, Nombre, Apellido1, Apellido2, Fecha_Nacimiento, Localidad, Domicilio, Codigo_Postal, Telefono, Email, Fecha_Alta, Fecha_Baja, Estado, ROL) 
VALUES ('56789012T', 'Laura', 'García', 'Sánchez', '2000-02-14', 'Trujillo', 'Calle Santa María 7', '10200', '640567890', 'laura.garcia@example.com', '2022-03-10', NULL, 'Activo', 'Socio');


INSERT INTO SOCIOS (DNI, Nombre, Apellido1, Apellido2, Fecha_Nacimiento, Localidad, Domicilio, Codigo_Postal, Telefono, Email, Fecha_Alta, Fecha_Baja, Estado, ROL) 
VALUES ('67890123Q', 'Raúl', 'Jiménez', 'Domínguez', '1980-12-01', 'Zafra', 'Camino de la Estación 23', '06300', '650678901', 'raul.jimenez@example.com', '2021-09-25', NULL, 'Activo', 'Socio');
