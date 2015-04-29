-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-04-2015 a las 12:59:50
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `melicine`
--
CREATE DATABASE IF NOT EXISTS `melicine` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `melicine`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `ID` smallint(2) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` tinytext NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `password` tinytext NOT NULL,
  `email` varchar(50) NOT NULL,
  `usermaestro` tinyint(1) NOT NULL DEFAULT '2',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Usuarios ' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `usuario`, `nombre`, `password`, `email`, `usermaestro`) VALUES
(1, 'Administrador', 'Administrador', '$1$K3/.LL2.$nxhV2tvrHTttkRLfabvqA/', 'administrador@melicine.com', 1),
(2, 'pepito', 'Pepito taquilla', '$1$Wn4.nV4.$BdVeg4tjb7I340o.uDYWz/', 'pepito@melicine.com', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
