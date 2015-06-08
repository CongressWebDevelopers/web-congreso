-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-06-2015 a las 13:36:09
-- Versión del servidor: 5.5.41
-- Versión de PHP: 5.3.10-1ubuntu3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_hoteles`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Capacidad`
--

CREATE TABLE IF NOT EXISTS `Capacidad` (
  `idHotel` int(11) NOT NULL,
  `FechaIn` date NOT NULL,
  `FechaOut` date NOT NULL,
  `tipo_habitacion` text NOT NULL,
  `habitaciones_disponibles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Hoteles`
--

CREATE TABLE IF NOT EXISTS `Hoteles` (
  `idHotel` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `descripcion` text NOT NULL,
  `foto` text NOT NULL,
  `precio_habitacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Hoteles`
--

INSERT INTO `Hoteles` (`idHotel`, `nombre`, `descripcion`, `foto`, `precio_habitacion`) VALUES
(1, 'Carmen Hotel', 'El Hotel Carmen está situado en el centro de Granada y alberga una piscina en la azotea con vistas al palacio de la Alhambra. Ofrece conexión Wi-Fi gratuita y un restaurante con bar al aire libre.\r\n\r\nLas habitaciones son amplias e incluyen aire acondicionado, TV vía satélite, teléfono, minibar y baño privado.\r\n\r\nEl Hotel Carmen cuenta con bañera de hidromasaje, conexión Wi-Fi, aparcamiento y servicio de alquiler de coches.\r\n\r\nEl Hotel Carmen se encuentra a 600 metros del palacio de congresos, un centro de conferencias, y a menos de 10 minutos a pie de la catedral de Granada. Está situado en uno de los encantadores bulevares del centro Granada, rodeado de tiendas prestigiosas.', 'http://q-ec.bstatic.com/images/hotel/840x460/314/31449895.jpg', 50),
(2, 'Hotel Macià Real De La Alhambra ', 'El Macià Real de la Alhambra cuenta con baños árabes y está a 3 km del centro de Granada. Hay conexión WiFi gratuita en todo el hotel.\r\n\r\nTodas las modernas habitaciones del Hotel Real de la Alhambra tienen TV de pantalla plana y caja fuerte. Algunas también disponen de balcón privado con tumbonas.\r\n\r\nEl restaurante del hotel, el Daraxa, sirve una mezcla de cocina tradicional andaluza y platos internacionales. Además, el establecimiento proporciona aparcamiento privado por un suplemento.\r\n\r\nLos autobuses que paran frente al hotel comunican con el centro de la ciudad de Granada en 10 minutos, donde se encuentran el antiguo barrio árabe del Albaicín y la catedral. Las montañas de Sierra Nevada se sitúan a 1 hora en coche aproximadamente.\r\n\r\nGenil es una opción genial para los viajeros interesados en Esquí alpino, Cocina gourmet y Centro histórico.  \r\n', 'http://r-ec.bstatic.com/images/hotel/840x460/883/8832202.jpg', 45),
(3, 'Hotel Abades Recogidas ', 'El Hotel Abades Recogidas se encuentra en el centro de Granada, a 10 minutos a pie de la Plaza Nueva. Dispone de habitaciones con aire acondicionado, conexión Wi-Fi gratuita y una terraza con buenas vistas a la Alhambra.\r\n\r\nTodas sus habitaciones son elegantes y ofrecen vistas a la ciudad. Cuentan con suelo de parqué, TV, minibar y baño con secador de pelo y artículos de aseo gratuitos.\r\n\r\nEl hotel está situado en la calle Recogidas, una de las más importantes del centro de la ciudad. Encontrará tiendas, bares y restaurantes españoles tradicionales a 5 minutos a pie del establecimiento.\r\n\r\nEn las inmediaciones hay aparcamiento público. La recepción del hotel abre las 24 horas y puede ofrecerle información sobre Granada. El barrio del Albaicín y la catedral están a menos de 10 minutos a pie.\r\n\r\nCentro de Granada es una opción genial para los viajeros interesados en Compras, Arquitectura y Comida.   ', 'http://r-ec.bstatic.com/images/hotel/840x460/301/30189735.jpg', 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Reservas`
--

CREATE TABLE IF NOT EXISTS `Reservas` (
  `idHotel` int(11) NOT NULL,
  `FechaIn` date NOT NULL,
  `FechaOut` date NOT NULL,
  `tipo_habitacion` text NOT NULL,
  `reservadas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
