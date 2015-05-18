-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-05-2015 a las 18:04:34
-- Versión del servidor: 5.5.41
-- Versión de PHP: 5.3.10-1ubuntu3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bd_congress`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Actividades`
--

CREATE TABLE IF NOT EXISTS `Actividades` (
  `Denominación` tinytext NOT NULL,
  `Fecha y hora` datetime NOT NULL,
  `Descripción` text NOT NULL,
  `Foto` text NOT NULL,
  `Importe` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Actividades`
--

INSERT INTO `Actividades` (`Denominación`, `Fecha y hora`, `Descripción`, `Foto`, `Importe`) VALUES
('Visita por Granada', '2015-06-22 11:00:00', 'Visita guiada por la ciudad de Granada, donde transitaremos por las zonas más importantes, y visitaremos los monumentos más emblemáticos', 'Prox', 'Incluido en la suscripción'),
('Visita a la Alhambra', '2015-06-23 09:30:00', 'Visita guiada que recorre todo el monumento completo de la Alhambra y el Generalife, visitando el Patio de los Leones, los Palacios Nazaríes, el Palacio de Carlos V....\n\nVa incluido el transporte', 'Prox', '30€'),
('Visita Sierra Nevada', '2015-06-24 08:45:00', 'Visita guiada a Sierra Nevada. Donde los congresistas dispondrán de 2 horas de clases en grupo de esquí o snowboard; tendrán 2 horas más de tiempo de libre disposición para esquiar por las distintas pistas, según su nivel. Por último habrá una comida en grupo y una caminata hasta el Veleta.\r\n\r\nVa incluido el transporte, la comida, el equipamiento y el forfait.', 'Prox', '80€'),
('Torneo de fútbol 7', '2015-06-25 09:00:00', 'Torneo de fútbol 7, en el complejo deportivo "Fuente Nueva"\r\n\r\nSe desarrollará en pistas de césped artificial, con árbitros colegiados, y habrá medallas y premios para los participantes.\r\n\r\nVa incluido la equipación (No el calzado)', 'Prox', '25€'),
('Torneo de padel', '2015-06-25 17:30:00', 'Torneo de padel, en el complejo deportivo "Fuente Nueva"\r\n\r\nHabrá medallas y premios para los participantes.\r\n\r\nVa incluido el material', 'Prox', '20€'),
('Competición de karts y Airsoft', '2015-06-26 09:00:00', 'Competición de karts, con tandas de prácticas, calificación, y carrera. 8 participantes por competición, y luego competición entre los ganadores. Tras esto, parrillada a las afuera de granada, y competición por equipos de Airsoft.\r\n\r\nHabrá medallas y premios para los participantes.\r\n\r\nVa incluido el transporte y los materiales.', 'Prox', '60€'),
('Cena de clausura', '2015-06-26 21:00:00', 'Para dar cierre al congreso, organizaremos una cena de clausura en un importante hotel de Granada. Se degustará los platos de la tierra.', 'Prox', '30€');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Cuotas`
--

CREATE TABLE IF NOT EXISTS `Cuotas` (
  `Denominación` varchar(30) NOT NULL,
  `Descripción` tinytext NOT NULL,
  `Importe` tinytext NOT NULL,
  PRIMARY KEY (`Denominación`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Cuotas`
--

INSERT INTO `Cuotas` (`Denominación`, `Descripción`, `Importe`) VALUES
('Acompañante', 'Cualquier persona registrada en el congreso tiene derecho a traer a un acompañante, por una cantidad extra.\r\n\r\nIncluye la cena de clausura y una visita por Granada.', '250€'),
('Colegiados', 'Para todo aquel colegiado.\r\n\r\nIncluye la cena de clausura, una visita por Granada y una visita a la Alhambra.', '550€'),
('Colegiados Granada', 'Para todo aquel colegiado de residencia en Granada.\r\n\r\nIncluye la cena de clausura, una visita por Granada y una visita a la Alhambra.', '350€'),
('Estudiantes', 'Para todos los estudiantes de grado, o que cursen un FP medio o superior.\r\n\r\nIncluye la cena de clausura y una visita por Granada.', '350€'),
('Estudiantes Posgrado', 'Para todo aquel graduado, que cursan posgrado..\r\n\r\nIncluye la cena de clausura, una visita por Granada y una visita a la Alhambra.', '450€');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
