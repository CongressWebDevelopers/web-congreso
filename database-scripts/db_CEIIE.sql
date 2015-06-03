-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-06-2015 a las 19:27:55
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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`idActividad`, `denominacion`, `descripcion`, `fecha`, `hora`, `importe`, `foto`) VALUES
(33, 'Visita a la Alhambra', 'La Alhambra representa todo el esplendor y el poder de la dinastÃ­a nazarÃ­. Su toma se produjo el 2 de enero de 1492 con la entrada de los Reyes CatÃ³licos en la ciudad tras una guerra de 10 aÃ±os. El primer sultÃ¡n de la Alhambra fue Muhammad I o Al-Ahmar, el fundador de la dinastÃ­a nazarÃ­, y el Ãºltimo sultÃ¡n: Muhammad XII, mÃ¡s conocido como Boabdil.\r\n\r\nLa Alhambra de Granada es el monumento mÃ¡s visitado de EspaÃ±a. 3 millones de turistas visitaron la Alhambra y el Generalife en 2012. Este conjunto monumental fue declarado Patrimonio de la Humanidad por la Unesco en el aÃ±o 1984.\r\n\r\nDesde este 1Âº Congreso de IngenierÃ­a InformÃ¡tica, no queremos dejar pasar la oportunidad de hacer un tour guiado por la Alhambra y los jardines del Generalife.\r\n', '2016-01-30', '20:00:00', 10, 'alhambr.jpg'),
(34, 'Sierra Nevada', 'Enclavada en la parte central de la Cordillera PenibÃ©tica, el macizo de Sierra Nevada constituye la mÃ¡s extensa de las Ã¡reas montaÃ±osas ibÃ©ricas dotadas de unidad estructural propia. Denominada por los Ã¡rabes de la Edad Media como â€œSierra del Solâ€, alberga no sÃ³lo una de las floras mas valiosas de todo el continente europeo, sino que ademÃ¡s esconde un rico patrimonio cultural e histÃ³rico acumulado durante siglos.\r\n\r\nLa estaciÃ³n de esquÃ­ se encuentra en pleno corazÃ³n del Parque Nacional de Sierra Nevada, siendo Ã©sta la mÃ¡s alta de EspaÃ±a y la mÃ¡s merdional de Europa. Estas condiciones hacen que la estaciÃ³n de esquÃ­ de Sierra Nevada , sea la que tenga mÃ¡s horas de Sol de toda Europa; convirtiÃ©ndola tambiÃ©n en la mÃ¡s visitada de EspaÃ±a. Es mÃ¡s, Sierra Nevada estÃ¡ considerada la estaciÃ³n de esquÃ­ con mÃ¡s ambiente nocturno de Europa.', '2016-01-02', '07:00:00', 15, 'esqui.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividadcuota`
--

CREATE TABLE IF NOT EXISTS `actividadcuota` (
  `idActividad` int(11) DEFAULT NULL,
  `idCuota` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actividadcuota`
--

INSERT INTO `actividadcuota` (`idActividad`, `idCuota`) VALUES
(33, 1),
(33, 17),
(33, 18),
(33, 19),
(34, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuota`
--

CREATE TABLE IF NOT EXISTS `cuota` (
`idCuota` int(11) NOT NULL,
  `denominacion` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `importe` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuota`
--

INSERT INTO `cuota` (`idCuota`, `denominacion`, `descripcion`, `importe`) VALUES
(15, 'Profesor', 'Profesorado', 50),
(16, 'Profesor', 'Profesorado', 50),
(17, 'Profesor', 'ssss', 50),
(18, 'Profesor', 'ssss', 50),
(19, 'Visita a la Alhambra', 'sss', 20);

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
MODIFY `idActividad` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT de la tabla `cuota`
--
ALTER TABLE `cuota`
MODIFY `idCuota` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
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
