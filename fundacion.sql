-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 24-01-2013 a las 13:47:33
-- Versión del servidor: 5.1.61
-- Versión de PHP: 5.3.6-13ubuntu3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `fundacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuadrodinamico`
--

CREATE TABLE IF NOT EXISTS `cuadrodinamico` (
  `nombre` varchar(100) NOT NULL,
  `posicion` int(2) NOT NULL,
  `texto` varchar(20000) DEFAULT NULL,
  PRIMARY KEY (`nombre`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuadrodinamico`
--

INSERT INTO `cuadrodinamico` (`nombre`, `posicion`, `texto`) VALUES
('QUE ES EFICIENCIA ENERGETICA. ', 1, 'QUE ES EFICIENCIA ENERGETICA. '),
('CURSOS FORMATIVOS', 2, 'CURSOS FORMATIVOS'),
('INVOLUCRATE', 3, 'INVOLUCRATE'),
('DONACIONES ', 4, 'DONACIONES '),
('TODOS DEBEMOS PASAR LA CERTIFICACIÓN ENERGÉTICA EN LOS EDIFICIOS', 5, 'TODOS DEBEMOS PASAR LA CERTIFICACIÓN ENERGÉTICA EN LOS EDIFICIOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `nombre` varchar(100) NOT NULL,
  `apodo` varchar(30) NOT NULL,
  `posicion` int(2) NOT NULL,
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`nombre`, `apodo`, `posicion`) VALUES
('Blog', 'blog', 5),
('Campos de trabajo', 'campostrabajo', 3),
('Colabora', 'colabora', 4),
('Contacto', 'contacto', 6),
('Oferta formativa', 'formacion', 2),
('Quienes somos', 'quienessomos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `submenu`
--

CREATE TABLE IF NOT EXISTS `submenu` (
  `menu` varchar(30) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apodo` varchar(30) NOT NULL,
  `posicion` int(2) NOT NULL,
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `submenu`
--

INSERT INTO `submenu` (`menu`, `nombre`, `apodo`, `posicion`) VALUES
('formacion', 'Acceso aula virtual', 'aulavirtual', 2),
('formacion', 'Actividades', 'actividades', 5),
('campostrabajo', 'Agente de cooperación', 'agentesdecooperacion', 5),
('campostrabajo', 'Asesoramos', 'asesoramos', 1),
('quienessomos', 'Con quien trabajamos', 'quientrabajamos', 2),
('campostrabajo', 'Desarrollamos proyectos', 'desarrollamosproyectos', 4),
('colabora', 'Donaciones', 'donaciones', 2),
('formacion', 'Formación bonificada', 'formacionbonificada', 1),
('formacion', 'Formación online', 'formaciononline', 3),
('formacion', 'Formación presencial', 'formacionpresencial', 4),
('campostrabajo', 'Formamos', 'formamos', 3),
('campostrabajo', 'Gestionamos', 'gestionamos', 2),
('colabora', 'Involúcrate', 'involucrate', 1),
('quienessomos', 'Quienes somos', 'quienessomos', 1),
('quienessomos', 'Sedes', 'sedes', 3),
('quienessomos', 'Voluntariado: conoce a nuestros voluntarios', 'voluntariado', 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
