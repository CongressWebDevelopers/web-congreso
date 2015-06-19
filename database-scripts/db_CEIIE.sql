-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-06-2015 a las 18:32:02
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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`idActividad`, `denominacion`, `descripcion`, `fecha`, `hora`, `importe`, `foto`) VALUES
(33, 'Visita a la Alhambra', 'La Alhambra representa todo el esplendor y el poder de la dinastÃ­a nazarÃ­. Su toma se produjo el 2 de enero de 1492 con la entrada de los Reyes CatÃ³licos en la ciudad tras una guerra de 10 aÃ±os. El primer sultÃ¡n de la Alhambra fue Muhammad I o Al-Ahmar, el fundador de la dinastÃ­a nazarÃ­, y el Ãºltimo sultÃ¡n: Muhammad XII, mÃ¡s conocido como Boabdil.\r\n\r\nLa Alhambra de Granada es el monumento mÃ¡s visitado de EspaÃ±a. 3 millones de turistas visitaron la Alhambra y el Generalife en 2012. Este conjunto monumental fue declarado Patrimonio de la Humanidad por la Unesco en el aÃ±o 1984.\r\n\r\nDesde este 1Âº Congreso de IngenierÃ­a InformÃ¡tica, no queremos dejar pasar la oportunidad de hacer un tour guiado por la Alhambra y los jardines del Generalife.', '2016-01-02', '07:00:00', 15, 'alhambr.jpg'),
(34, 'Sierra Nevada', 'Enclavada en la parte central de la Cordillera PenibÃ©tica, el macizo de Sierra Nevada constituye la mÃ¡s extensa de las Ã¡reas montaÃ±osas ibÃ©ricas dotadas de unidad estructural propia. Denominada por los Ã¡rabes de la Edad Media como â€œSierra del Solâ€, alberga no sÃ³lo una de las floras mas valiosas de todo el continente europeo, sino que ademÃ¡s esconde un rico patrimonio cultural e histÃ³rico acumulado durante siglos.\r\n\r\nLa estaciÃ³n de esquÃ­ se encuentra en pleno corazÃ³n del Parque Nacional de Sierra Nevada, siendo Ã©sta la mÃ¡s alta de EspaÃ±a y la mÃ¡s merdional de Europa. Estas condiciones hacen que la estaciÃ³n de esquÃ­ de Sierra Nevada , sea la que tenga mÃ¡s horas de Sol de toda Europa; convirtiÃ©ndola tambiÃ©n en la mÃ¡s visitada de EspaÃ±a. Es mÃ¡s, Sierra Nevada estÃ¡ considerada la estaciÃ³n de esquÃ­ con mÃ¡s ambiente nocturno de Europa.', '2016-01-02', '07:00:00', 15, 'esqui.jpg'),
(35, 'Visita a los Cahorros', 'Monachil es un pueblo que estÃ¡ situado a tan sÃ³lo unos 8 kilÃ³metros hacia el sureste de Granada, en la parte del centro-sur de la comarca de la Vega de Granada. Es aquÃ­ donde estÃ¡n Los Cahorros, una zona de alucinantes paisajes ideal para hacer senderismo o practicar escalada.', '2016-01-02', '07:00:00', 15, 'cahorros.jpg');

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
(34, 19),
(33, 20),
(34, 20),
(35, 20),
(33, 15),
(33, 21),
(35, 21),
(34, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuota`
--

CREATE TABLE IF NOT EXISTS `cuota` (
`idCuota` int(11) NOT NULL,
  `denominacion` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `importe` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuota`
--

INSERT INTO `cuota` (`idCuota`, `denominacion`, `descripcion`, `importe`) VALUES
(15, 'Profesor', 'Profesorado', 50),
(16, 'Profesor', 'Profesorado', 50),
(17, 'Profesor', 'ssss', 50),
(18, 'Profesor', 'ssss', 50),
(19, 'Visita a la Alhambra', 'sss', 21),
(20, 'Todo incluido', 'Esta cuota incluye todo', 100),
(21, 'Exponente', 'Esta cuota incluye a los exponentes en alguna temÃ¡tica o SPRINT del congreso.', 40);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Inscripcion`
--

INSERT INTO `Inscripcion` (`idInscripcion`, `nombre`, `centro`, `telefono`, `cuota`, `hotel`, `fechaSalida`, `fechaEntrada`, `idUsuario`) VALUES
(2, 'Ivan Ortega Alba 2', 'UGR', '680', 20, 0, '0000-00-00', '0000-00-00', 11),
(3, 'Ivan Ortega Alba 3', 'UGR', '680', 17, 0, '0000-00-00', '0000-00-00', 12),
(5, 'Francisco', 'UGR', '680178921', 19, 0, '0000-00-00', '0000-00-00', 13),
(6, 'German', 'UGR', '680446758', 20, 0, '0000-00-00', '0000-00-00', 14),
(7, 'yoyoyo', 'jajaj', '12312314', 20, 0, '0000-00-00', '0000-00-00', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcionactividad`
--

CREATE TABLE IF NOT EXISTS `inscripcionactividad` (
  `idInscripcion` int(11) NOT NULL,
  `idActividad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inscripcionactividad`
--

INSERT INTO `inscripcionactividad` (`idInscripcion`, `idActividad`) VALUES
(1, 33),
(1, 34),
(1, 35),
(2, 33),
(2, 34),
(2, 35),
(3, 33),
(4, 33),
(4, 34),
(4, 35),
(5, 33),
(5, 34),
(5, 35),
(6, 33),
(6, 34),
(6, 35),
(7, 33),
(7, 34),
(7, 35);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`idUsuario` int(11) NOT NULL,
  `nombreUsuario` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombreUsuario`, `password`, `rol`) VALUES
(4, 'ivanortegaalba@gmail.com', '2d01b437ef5276d5fef064e19800ebee', 0),
(10, 'ivanortegaalba@hotmail.com', '0861ffa03c95ef4aa7c1fd2327dab91d', 0),
(11, '1234', '1234', 1),
(12, 'ivan', '2c42e5cf1cdbafea04ed267018ef1511', 1),
(13, 'fjmelero@ugr.es', '944bc406c52b4f411be922897b0936e2', 1),
(14, 'usuariodeprueba@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(15, 'fjmelero@ugr.es', '944bc406c52b4f411be922897b0936e2', 1),
(16, 'jota_ele256@hotmail.com', 'e26e64e9987829d9801ac9845b08593d', 1);

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
MODIFY `idActividad` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT de la tabla `cuota`
--
ALTER TABLE `cuota`
MODIFY `idCuota` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `Inscripcion`
--
ALTER TABLE `Inscripcion`
MODIFY `idInscripcion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
