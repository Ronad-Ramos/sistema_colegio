-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 14-10-2021 a las 23:44:25
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
-- Estructura de tabla para la tabla `grado`
--

DROP TABLE IF EXISTS `grado`;
CREATE TABLE IF NOT EXISTS `grado` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `NIVEL` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `GRADO` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `SECCION` varchar(2) COLLATE utf8mb4_general_ci NOT NULL,
  `ESTADO` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`ID`, `NIVEL`, `GRADO`, `SECCION`, `ESTADO`) VALUES
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
(11, 'primaria', '3', 'A', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `CODIGO` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `TIPO` int NOT NULL,
  `NOMBRES` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `APELLIDOS` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `CORREO` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `USUARIO` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `PASSWORD` text COLLATE utf8mb4_general_ci NOT NULL,
  `FECHA_REGISTRO` date NOT NULL,
  `FECHA_NACIMIENTO` date NOT NULL,
  `FOTO_PERFIL` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `CODIGO`, `TIPO`, `NOMBRES`, `APELLIDOS`, `CORREO`, `USUARIO`, `PASSWORD`, `FECHA_REGISTRO`, `FECHA_NACIMIENTO`, `FOTO_PERFIL`) VALUES
(1, 'milo5g', 1, 'Ronald Antonio', 'Ramos Malca', 'ronald.ramos@gmail.com', 'ronald.ramos', '159753', '2021-10-14', '2000-10-30', 'milo5g.gif'),
(2, '6l@2im', 1, 'Emili', 'Roque Ramos', 'emi@gmail.com', 'emi', '123456', '2021-10-14', '2002-03-12', '6l@2im.gif'),
(5, '.yYym4', 1, 'Yo', 'Soy', 'soyyo@gmail.com', 'soyyo', '159753', '2021-10-14', '2000-02-14', '962842.jpg?user=soyyo');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
