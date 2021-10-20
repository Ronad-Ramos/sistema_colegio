-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 20-10-2021 a las 06:32:21
-- Versión del servidor: 8.0.21
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `colegio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

DROP TABLE IF EXISTS `curso`;
CREATE TABLE IF NOT EXISTS `curso` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `TITULO` varchar(250) NOT NULL,
  `IMAGEN` varchar(250) NOT NULL,
  `DESCRIPCION` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

DROP TABLE IF EXISTS `grado`;
CREATE TABLE IF NOT EXISTS `grado` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `NIVEL` varchar(100) NOT NULL,
  `GRADO` varchar(100) NOT NULL,
  `SECCION` varchar(2) NOT NULL,
  `TOTAL_MAX` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`ID`, `NIVEL`, `GRADO`, `SECCION`, `TOTAL_MAX`) VALUES
(1, 'primaria', '1', 'A', 0),
(2, 'primaria', '1', 'B', 0),
(3, 'primaria', '1', 'C', 0),
(4, 'primaria', '1', 'D', 0),
(5, 'primaria', '1', 'E', 0),
(6, 'primaria', '2', 'A', 0),
(7, 'primaria', '2', 'B', 0),
(8, 'primaria', '2', 'C', 0),
(9, 'primaria', '2', 'D', 0),
(10, 'primaria', '2', 'E', 0),
(11, 'primaria', '3', 'A', 0),
(12, 'primaria', '3', 'B', 0),
(13, 'primaria', '3', 'C', 16),
(14, 'primaria', '3', 'D', 0),
(15, 'primaria', '3', 'E', 0),
(16, 'primaria', '4', 'A', 0),
(17, 'primaria', '4', 'B', 0),
(18, 'primaria', '4', 'C', 0),
(19, 'primaria', '4', 'D', 0),
(20, 'primaria', '4', 'E', 0),
(21, 'primaria', '5', 'A', 0),
(22, 'primaria', '5', 'B', 0),
(23, 'primaria', '5', 'C', 0),
(24, 'primaria', '5', 'D', 0),
(25, 'primaria', '5', 'E', 0),
(26, 'primaria', '6', 'A', 0),
(27, 'primaria', '6', 'B', 0),
(28, 'primaria', '6', 'C', 0),
(29, 'primaria', '6', 'D', 0),
(30, 'primaria', '6', 'E', 0),
(31, 'secundaria', '1', 'A', 0),
(32, 'secundaria', '1', 'B', 0),
(33, 'secundaria', '1', 'C', 0),
(34, 'secundaria', '1', 'D', 0),
(35, 'secundaria', '1', 'E', 0),
(36, 'secundaria', '2', 'A', 0),
(37, 'secundaria', '2', 'B', 0),
(38, 'secundaria', '2', 'C', 0),
(39, 'secundaria', '2', 'D', 0),
(40, 'secundaria', '2', 'E', 0),
(41, 'secundaria', '3', 'A', 0),
(42, 'secundaria', '3', 'B', 0),
(43, 'secundaria', '3', 'C', 0),
(44, 'secundaria', '3', 'D', 0),
(45, 'secundaria', '3', 'E', 0),
(46, 'secundaria', '4', 'A', 0),
(47, 'secundaria', '4', 'B', 0),
(48, 'secundaria', '4', 'C', 0),
(49, 'secundaria', '4', 'D', 0),
(50, 'secundaria', '4', 'E', 0),
(51, 'secundaria', '5', 'A', 0),
(52, 'secundaria', '5', 'B', 0),
(53, 'secundaria', '5', 'C', 0),
(54, 'secundaria', '5', 'D', 0),
(55, 'secundaria', '5', 'E', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion`
--

DROP TABLE IF EXISTS `informacion`;
CREATE TABLE IF NOT EXISTS `informacion` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `TITULO` varchar(250) NOT NULL,
  `DESCRIPCION` text NOT NULL,
  `LOGO` varchar(250) NOT NULL,
  `IMAGENES` varchar(250) NOT NULL,
  `BANNERS` varchar(250) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculas`
--

DROP TABLE IF EXISTS `matriculas`;
CREATE TABLE IF NOT EXISTS `matriculas` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int NOT NULL,
  `ID_ALUMNO` int NOT NULL,
  `ID_APODERADO` int NOT NULL,
  `FECHA` date NOT NULL,
  `ARCHIVO` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  KEY `matriculas_ibfk_1` (`ID_ALUMNO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `retiro`
--

DROP TABLE IF EXISTS `retiro`;
CREATE TABLE IF NOT EXISTS `retiro` (
  `ID_RETIRO` int NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int NOT NULL,
  `ID_ALUMNO` int NOT NULL,
  `ID_APODERADO` int NOT NULL,
  `FECHA` date NOT NULL,
  `ARCHIVO` text NOT NULL,
  PRIMARY KEY (`ID_RETIRO`),
  KEY `retiro_ibfk_1` (`ID_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `ID_ROL` int NOT NULL AUTO_INCREMENT,
  `NOM_ROL` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_ROL`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`ID_ROL`, `NOM_ROL`) VALUES
(1, 'Administrador'),
(2, 'Usuario'),
(3, 'Alumno'),
(4, 'Apoderado'),
(5, 'Docente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transferencia`
--

DROP TABLE IF EXISTS `transferencia`;
CREATE TABLE IF NOT EXISTS `transferencia` (
  `ID_TRANSFERENCIA` int NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int NOT NULL,
  `ID_ALUMNO` int NOT NULL,
  `ID_APODERADO` int NOT NULL,
  `FECHA` date NOT NULL,
  `ARCHIVO` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_TRANSFERENCIA`),
  KEY `ID_USUARIO` (`ID_USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_curso`
--

DROP TABLE IF EXISTS `user_curso`;
CREATE TABLE IF NOT EXISTS `user_curso` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int NOT NULL,
  `ID_CURSO` int NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  KEY `ID_CURSO` (`ID_CURSO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `ROL` int NOT NULL,
  `NOMBRES` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `APELLIDOS` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `CORREO` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `USUARIO` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `PASSWORD` text NOT NULL,
  `GENERO` int NOT NULL,
  `SOBRE_MI` text NOT NULL,
  `FECHA_REGISTRO` date NOT NULL,
  `FECHA_NACIMIENTO` date NOT NULL,
  `FOTO_PERFIL` varchar(100) NOT NULL,
  `ID_GRADO` int NOT NULL,
  `DNI` int NOT NULL,
  `NRO_TELEFONICO` int NOT NULL,
  `DIRECCION` varchar(500) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `usuarios_ibfk_1` (`ROL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD CONSTRAINT `matriculas_ibfk_1` FOREIGN KEY (`ID_ALUMNO`) REFERENCES `usuarios` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `retiro`
--
ALTER TABLE `retiro`
  ADD CONSTRAINT `retiro_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`ID`);

--
-- Filtros para la tabla `transferencia`
--
ALTER TABLE `transferencia`
  ADD CONSTRAINT `transferencia_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`ID`);

--
-- Filtros para la tabla `user_curso`
--
ALTER TABLE `user_curso`
  ADD CONSTRAINT `user_curso_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`ID`),
  ADD CONSTRAINT `user_curso_ibfk_2` FOREIGN KEY (`ID_CURSO`) REFERENCES `curso` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`ROL`) REFERENCES `rol` (`ID_ROL`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`ID`) REFERENCES `grado` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
