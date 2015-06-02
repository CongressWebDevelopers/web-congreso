-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-06-2015 a las 19:03:33
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_CEIIE`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE IF NOT EXISTS `actividad` (
`idActividad` int(11) NOT NULL,
  `denominacion` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `importe` int(11) NOT NULL,
  `foto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuota`
--

CREATE TABLE IF NOT EXISTS `cuota` (
`idCuota` int(11) NOT NULL,
  `denominacion` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `importe` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuota`
--

INSERT INTO `cuota` (`idCuota`, `denominacion`, `descripcion`, `importe`) VALUES
(1, 'Cuota 1', 'lalalalala', 20),
(2, 'Cuota 2', 'lelelele', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Inscripcion`
--

CREATE TABLE IF NOT EXISTS `Inscripcion` (
`idInscripcion` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `centro` varchar(150) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `cuota` int(11) NOT NULL COMMENT 'idCuota',
  `hotel` int(11) NOT NULL COMMENT 'idHotel',
  `fechaSalida` date NOT NULL,
  `fechaEntrada` date NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`idUsuario` int(11) NOT NULL,
  `nombreUsuario` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombreUsuario`, `password`, `rol`) VALUES
(1, 'ivanortegaalba@gmail.com', '', 2),
(2, 'ivanortegaalba@gmail.com', '', 2),
(3, 'ivanortegaalba@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 2),
(4, 'ivanortegaalba@gmail.com', '0861ffa03c95ef4aa7c1fd2327dab91d', 2),
(5, 'ivanortegaalba@gmail.com', '', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
 ADD PRIMARY KEY (`idActividad`);

--
-- Indices de la tabla `cuota`
--
ALTER TABLE `cuota`
 ADD PRIMARY KEY (`idCuota`);

--
-- Indices de la tabla `Inscripcion`
--
ALTER TABLE `Inscripcion`
 ADD PRIMARY KEY (`idInscripcion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
MODIFY `idActividad` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cuota`
--
ALTER TABLE `cuota`
MODIFY `idCuota` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `Inscripcion`
--
ALTER TABLE `Inscripcion`
MODIFY `idInscripcion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
