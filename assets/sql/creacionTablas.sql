-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-04-2016 a las 12:24:41
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `autor` varchar(50) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `contenido` text,
  `noticia` int(11) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id`, `autor`, `fecha`, `contenido`, `noticia`, `likes`) VALUES
(1, 'toni', '2016-04-14', 'Que pasa gente', 4, 1),
(2, 'toni', '2016-04-14', 'Se me olvidaba, como va el asunto?', 4, 1),
(3, '', '2016-04-14', 'Va biiieeeeen!', 4, 1),
(4, 'admin', '2016-04-14', 'Aver que soy el administrador eh, no me cabreeis..', 4, 3),
(5, 'admin', '2016-04-14', 'Aver con un text area', 4, 2),
(6, 'admin', '2016-04-14', 'Primero en comentar!! :D', 3, 0),
(7, '', '2016-04-14', 'Comentario de anonimo', 2, 1),
(8, 'Anonimo', '2016-04-14', 'Bieeeeen!, comentando como user anonimo.', 5, 1),
(9, 'Anonimo', '2016-04-14', 'Anonimous comentando!', 6, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE `noticia` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `texto` text,
  `fecha` date DEFAULT NULL,
  `autor` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`id`, `titulo`, `texto`, `fecha`, `autor`) VALUES
(2, 'POST PRUEBAS', 'esto lo a escrito el usuario admin!', '2016-04-13', 'admin'),
(4, 'POOOOOOST', 'by toni :D', '2016-04-13', 'toni'),
(6, 'NUEVA COMPROBACION RETURNO', 'Aver si va bien esto', '2016-04-14', 'Anonimo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `user` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `user`, `password`, `admin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'toni', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(3, 'jacob', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(4, 'tupac', '81dc9bdb52d04dc20036dbd8313ed055', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
