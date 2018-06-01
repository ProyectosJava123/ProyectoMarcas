-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2018 a las 20:58:44
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `encuestas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta`
--

CREATE TABLE `encuesta` (
  `id_encuesta` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `encuesta`
--

INSERT INTO `encuesta` (`id_encuesta`, `nombre`) VALUES
(11, 'Encuesta de prueba 1'),
(12, 'Encuesta de prueba 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `id_pregunta` int(11) NOT NULL,
  `texto` varchar(500) NOT NULL,
  `fk_encuesta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`id_pregunta`, `texto`, `fk_encuesta`) VALUES
(31, 'Pregunta 1 de encuesta 1', 11),
(32, 'Pregunta 2 de encuesta 1', 11),
(33, 'Pregunta 3 de encuesta 1', 11),
(34, 'Pregunta 4 de encuesta 1', 11),
(35, 'Pregunta 5 de encuesta 1', 11),
(36, 'Pregunta 1 de encuesta 2', 12),
(37, 'Pregunta 2 de encuesta 2', 12),
(38, 'Pregunta 3 de encuesta 2', 12),
(39, 'Pregunta 4 de encuesta 2', 12),
(40, 'Pregunta 5 de encuesta 2', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE `resultados` (
  `fk_pregunta` int(11) NOT NULL,
  `fk_usuario` int(11) NOT NULL,
  `respuesta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `resultados`
--

INSERT INTO `resultados` (`fk_pregunta`, `fk_usuario`, `respuesta`) VALUES
(31, 3, 'Muy satisfecho'),
(32, 3, 'Muy satisfecho'),
(33, 3, 'Indiferente'),
(34, 3, 'Muy decepcionado'),
(35, 3, 'Muy decepcionado'),
(31, 3, 'Muy satisfecho'),
(32, 3, 'Muy satisfecho'),
(33, 3, 'Indiferente'),
(34, 3, 'Muy decepcionado'),
(35, 3, 'Muy decepcionado'),
(31, 3, 'Decepcionado'),
(32, 3, 'Decepcionado'),
(33, 3, 'Muy decepcionado'),
(34, 3, 'Muy decepcionado'),
(35, 3, 'Muy decepcionado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nick` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tipo` varchar(100) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nick`, `pass`, `email`, `tipo`) VALUES
(2, 'Javi', 'hola', 'javi@hotmail.com', 'admin'),
(3, 'Javi2', 'hola', 'javi2@hotmail.com', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  ADD PRIMARY KEY (`id_encuesta`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`id_pregunta`),
  ADD KEY `fk_encuesta` (`fk_encuesta`);

--
-- Indices de la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD KEY `fk_pregunta` (`fk_pregunta`),
  ADD KEY `fk_usuario` (`fk_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  MODIFY `id_encuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id_pregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `pregunta_ibfk_1` FOREIGN KEY (`fk_encuesta`) REFERENCES `encuesta` (`id_encuesta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD CONSTRAINT `resultados_ibfk_1` FOREIGN KEY (`fk_pregunta`) REFERENCES `pregunta` (`id_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resultados_ibfk_2` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
