-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2025 a las 12:37:55
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cazadores_bd`
--
CREATE IF NOT EXISTS `cazadores_bd` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cazadores_bd`;

-- --------------------------------------------------------
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencias`
--

CREATE TABLE `licencias` (
  `ID_Licencia` int(11) NOT NULL,
  `Tipo_Licencia` enum('Anual','Federativa','Especial') NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Vigencia` int(11) NOT NULL COMMENT 'Duración en años (1 para anual, 1-3 para federativa)',
  `Precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `licencias`
--

INSERT INTO `licencias` (`ID_Licencia`, `Tipo_Licencia`, `Descripcion`, `Vigencia`, `Precio`) VALUES
(1, 'Anual', 'Licencia de caza anual', 1, 50.00),
(2, 'Federativa', 'Licencia federativa básica', 1, 80.00),
(3, 'Federativa', 'Licencia federativa avanzada', 3, 200.00),
(4, 'Especial', 'Licencia para caza mayor', 1, 150.00),
(5, 'Especial', 'Licencia para caza menor', 1, 100.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modalidades_caza`
--

CREATE TABLE `modalidades_caza` (
  `ID_Modalidad` int(11) NOT NULL,
  `Nombre_Modalidad` varchar(50) NOT NULL,
  `Descripcion` text DEFAULT NULL,
  `Temporada_Inicio` date NOT NULL,
  `Temporada_Fin` date NOT NULL,
  `Tipo_Caza` enum('Mayor','Menor') NOT NULL,
  `Arma_Predominante` varchar(30) DEFAULT NULL,
  `Requiere_Permiso_Especial` enum('Si','No') DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `modalidades_caza`
--

INSERT INTO `modalidades_caza` (`ID_Modalidad`, `Nombre_Modalidad`, `Descripcion`, `Temporada_Inicio`, `Temporada_Fin`, `Tipo_Caza`, `Arma_Predominante`, `Requiere_Permiso_Especial`) VALUES
(1, 'Salto con escopeta', 'Caza menor en la que el cazador camina y dispara a las aves al vuelo.', '2025-10-01', '2026-02-28', 'Menor', 'Escopeta', 'No'),
(2, 'Liebre con galgos', 'Caza menor donde los galgos persiguen a la liebre para capturarla.', '2025-11-15', '2026-01-31', 'Menor', 'Galgos', 'No'),
(3, 'Perdiz con reclamo', 'Caza menor que utiliza una perdiz macho para atraer a otras perdices.', '2025-12-01', '2026-02-28', 'Menor', 'Escopeta', 'No');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socios`
--

CREATE TABLE `socios` (
  `ID_Socio` int(11) NOT NULL,
  `DNI` varchar(9) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido1` varchar(50) NOT NULL,
  `Apellido2` varchar(50) DEFAULT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Localidad` varchar(100) NOT NULL,
  `Domicilio` varchar(150) NOT NULL,
  `Codigo_Postal` varchar(10) NOT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Fecha_Alta` date NOT NULL,
  `Fecha_Baja` date DEFAULT NULL,
  `Estado` enum('Activo','Inactivo','Suspendido') DEFAULT 'Activo',
  `ROL` enum('Admin','Socio') DEFAULT 'Socio'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `socios`
--

INSERT INTO `socios` (`ID_Socio`, `DNI`, `Nombre`, `Apellido1`, `Apellido2`, `Fecha_Nacimiento`, `Localidad`, `Domicilio`, `Codigo_Postal`, `Telefono`, `Email`, `Fecha_Alta`, `Fecha_Baja`, `Estado`, `ROL`) VALUES
(1, '12345678Z', 'Shenhao', 'Zhou', 'Zhou', '1990-05-15', 'Cáceres', 'Calle Mayor 5', '10001', '600123456', 'shenhao.zhou@example.com', '2023-01-01', NULL, 'Activo', 'Admin'),
(2, '23456789X', 'Juan', 'Gómez', 'Pérez', '1985-03-10', 'Badajoz', 'Avenida de la Paz 15', '06001', '610234567', 'juan.gomez@example.com', '2022-07-01', NULL, 'Activo', 'Socio'),
(4, '45678901W', 'Pedro', 'Fernández', 'Martín', '1978-08-05', 'Plasencia', 'Calle Real 12', '10600', '630456789', 'pedro.fernandez@example.com', '2020-02-18', '2023-08-01', 'Inactivo', 'Socio'),
(5, '56789012T', 'Laura', 'García', 'Sánchez', '2000-02-14', 'Trujillo', 'Calle Santa María 7', '10200', '640567890', 'laura.garcia@example.com', '2022-03-10', NULL, 'Activo', 'Socio'),
(6, '67890123Q', 'Raúl', 'Jiménez', 'Domínguez', '1980-12-01', 'Zafra', 'Camino de la Estación 23', '06300', '650678901', 'raul.jimenez@example.com', '2021-09-25', NULL, 'Activo', 'Socio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio_licencias`
--

CREATE TABLE `socio_licencias` (
  `ID` int(11) NOT NULL,
  `ID_Socio` int(11) NOT NULL,
  `ID_Licencia` int(11) NOT NULL,
  `Fecha_Expedicion` date NOT NULL,
  `Fecha_Caducidad` date NOT NULL,
  `Numero_Licencia` varchar(20) DEFAULT NULL COMMENT 'Formato: CC-YYYY-NNNNN (CC=código, YYYY=año, NNNNN=número)',
  `Numero_Licencia_Federativa` varchar(20) DEFAULT NULL COMMENT 'Número de licencia federativa si aplica',
  `Estado` enum('Válida','Caducada','Revocada') DEFAULT 'Válida'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `socio_licencias`
--

INSERT INTO `socio_licencias` (`ID`, `ID_Socio`, `ID_Licencia`, `Fecha_Expedicion`, `Fecha_Caducidad`, `Numero_Licencia`, `Numero_Licencia_Federativa`, `Estado`) VALUES
(1, 1, 3, '2023-01-02', '2026-01-01', 'CC-2023-00001', 'FED-2023-00123', 'Válida'),
(2, 1, 4, '2023-01-02', '2024-01-01', 'CC-2023-00002', NULL, 'Válida'),
(3, 2, 2, '2022-07-02', '2023-07-01', 'CC-2022-00045', 'FED-2022-00456', 'Caducada'),
(4, 2, 1, '2023-07-15', '2024-07-14', 'CC-2023-00078', NULL, 'Válida'),
(5, 4, 5, '2020-02-20', '2021-02-19', 'CC-2020-00123', NULL, 'Válida'),
(6, 5, 2, '2022-03-12', '2023-03-11', 'CC-2022-00156', 'FED-2022-00567', 'Caducada'),
(7, 5, 3, '2023-03-15', '2026-03-14', 'CC-2023-00189', 'FED-2023-00234', 'Válida'),
(8, 6, 1, '2021-09-26', '2022-09-25', 'CC-2021-00234', NULL, 'Caducada'),
(9, 6, 1, '2022-10-01', '2023-09-30', 'CC-2022-00345', NULL, 'Válida'),
(10, 6, 4, '2022-11-15', '2023-11-14', 'CC-2022-00367', NULL, 'Válida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio_modalidades`
--

CREATE TABLE `socio_modalidades` (
  `ID` int(11) NOT NULL,
  `ID_Socio` int(11) NOT NULL,
  `ID_Modalidad` int(11) NOT NULL,
  `Fecha_Registro` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `socio_modalidades`
--

INSERT INTO `socio_modalidades` (`ID`, `ID_Socio`, `ID_Modalidad`, `Fecha_Registro`) VALUES
(1, 1, 3, '2023-01-05'),
(2, 1, 1, '2023-02-10'),
(3, 2, 1, '2022-07-02'),
(4, 2, 2, '2022-09-15'),
(5, 5, 1, '2022-03-12'),
(6, 5, 2, '2022-06-20'),
(7, 6, 2, '2021-09-26'),
(8, 4, 3, '2020-02-20'),
(9, 4, 1, '2021-05-10'),
(10, 6, 3, '2022-01-15');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `licencias`
--
ALTER TABLE `licencias`
  ADD PRIMARY KEY (`ID_Licencia`);

--
-- Indices de la tabla `modalidades_caza`
--
ALTER TABLE `modalidades_caza`
  ADD PRIMARY KEY (`ID_Modalidad`),
  ADD UNIQUE KEY `Nombre_Modalidad` (`Nombre_Modalidad`);

--
-- Indices de la tabla `socios`
--
ALTER TABLE `socios`
  ADD PRIMARY KEY (`ID_Socio`),
  ADD UNIQUE KEY `DNI` (`DNI`);

--
-- Indices de la tabla `socio_licencias`
--
ALTER TABLE `socio_licencias`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Numero_Licencia` (`Numero_Licencia`),
  ADD KEY `ID_Socio` (`ID_Socio`),
  ADD KEY `ID_Licencia` (`ID_Licencia`);

--
-- Indices de la tabla `socio_modalidades`
--
ALTER TABLE `socio_modalidades`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `uc_socio_modalidad` (`ID_Socio`,`ID_Modalidad`),
  ADD KEY `ID_Modalidad` (`ID_Modalidad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `licencias`
--
ALTER TABLE `licencias`
  MODIFY `ID_Licencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `modalidades_caza`
--
ALTER TABLE `modalidades_caza`
  MODIFY `ID_Modalidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `socios`
--
ALTER TABLE `socios`
  MODIFY `ID_Socio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `socio_licencias`
--
ALTER TABLE `socio_licencias`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `socio_modalidades`
--
ALTER TABLE `socio_modalidades`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `socio_licencias`
--
ALTER TABLE `socio_licencias`
  ADD CONSTRAINT `socio_licencias_ibfk_1` FOREIGN KEY (`ID_Socio`) REFERENCES `socios` (`ID_Socio`),
  ADD CONSTRAINT `socio_licencias_ibfk_2` FOREIGN KEY (`ID_Licencia`) REFERENCES `licencias` (`ID_Licencia`);

--
-- Filtros para la tabla `socio_modalidades`
--
ALTER TABLE `socio_modalidades`
  ADD CONSTRAINT `socio_modalidades_ibfk_1` FOREIGN KEY (`ID_Socio`) REFERENCES `socios` (`ID_Socio`),
  ADD CONSTRAINT `socio_modalidades_ibfk_2` FOREIGN KEY (`ID_Modalidad`) REFERENCES `modalidades_caza` (`ID_Modalidad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE `pagos_licencias` (
  `ID_Pago` INT(11) NOT NULL AUTO_INCREMENT,
  `ID_Socio_Licencia` INT(11) NOT NULL,
  `Fecha_Pago` DATE NOT NULL DEFAULT CURDATE(),
  `Metodo_Pago` ENUM('Efectivo', 'Transferencia', 'Tarjeta', 'Bizum') NOT NULL,
  `Importe` DECIMAL(10,2) NOT NULL,
  `Estado_Pago` ENUM('Pendiente', 'Pagado', 'Rechazado') DEFAULT 'Pagado',
  `Referencia_Transaccion` VARCHAR(50) DEFAULT NULL,
  PRIMARY KEY (`ID_Pago`),
  FOREIGN KEY (`ID_Socio_Licencia`) REFERENCES `socio_licencias`(`ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
