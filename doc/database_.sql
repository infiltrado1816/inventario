-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-10-2017 a las 13:22:45
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE IF NOT EXISTS `articulos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `numeroemco` varchar(45) DEFAULT NULL,
  `serie` varchar(100) DEFAULT NULL,
  `factura` int(11) DEFAULT NULL,
  `clasificaciones_id` int(11) NOT NULL,
  `dependencias_id` int(11) NOT NULL,
  `prestamo` tinyint(1) DEFAULT '0',
  `update_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `create_time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=404 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `descripcion`, `numeroemco`, `serie`, `factura`, `clasificaciones_id`, `dependencias_id`, `prestamo`, `update_time`, `create_time`) VALUES
(400, 'Eq. A/C mod. CST-18HRE , Fabricante: Clark Air Conditioning ', '1111111', '11376NF3041', 0, 13, 18, 0, '2017-10-23 16:43:22', '2017-10-23 16:43:22'),
(401, 'Eq. A/C mod. CST-24HRE , Clark Air Conditioning', '222222', '15031203', 0, 13, 15, 0, '2017-10-23 16:44:56', '2017-10-23 16:44:56'),
(402, 'Eq. A/C mod. CST-24HRE , Clark Air Conditioning', '33333', '15033078', 0, 13, 15, 0, '2017-10-23 16:45:39', '2017-10-23 16:45:39'),
(403, 'UPS 60 KVA, Mod.: Otawa, ', '1400021246', '11320063', 0, 12, 15, 0, '2017-10-23 16:52:51', '2017-10-23 16:52:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificaciones`
--

CREATE TABLE IF NOT EXISTS `clasificaciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clasificaciones`
--

INSERT INTO `clasificaciones` (`id`, `nombre`) VALUES
(12, 'Sistema de Respaldo Electrico'),
(13, 'Sistema de Aire Acondicionado'),
(15, 'Dispositivos de red del SMC'),
(16, 'Computadores del SMC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependencias`
--

CREATE TABLE IF NOT EXISTS `dependencias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `dependencias`
--

INSERT INTO `dependencias` (`id`, `nombre`) VALUES
(0, 'BODEGA ALTA'),
(1, 'JEFE DEPTO'),
(2, 'PLANA MAYOR'),
(3, 'JEFE SMC'),
(4, 'CECIMOA'),
(5, 'OCC'),
(6, 'OFICINA INVENTARIO'),
(7, 'PLANIFICACIÓN'),
(8, 'COC'),
(9, 'SALA DE REUNIONES'),
(10, 'OFICINA SERVIDORES'),
(11, 'SOPORTE TÉCNICO'),
(12, 'INFORMÁTICA'),
(13, 'HALL SALÓN OHIGGINS'),
(14, 'SALÓN OHIGGINS'),
(15, 'SALA SERVIDORES'),
(16, 'BODEGA  INVENTARIO'),
(17, 'CARGO EMERGENCIA'),
(18, 'TERZONA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historicos`
--

CREATE TABLE IF NOT EXISTS `historicos` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `articulos_id` int(11) NOT NULL,
  `dependencias_id` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `tipo` enum('Pase','Prestamo','Alta','Retorno','Reparacion') NOT NULL,
  `observacion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `historicos`
--

INSERT INTO `historicos` (`id`, `fecha`, `articulos_id`, `dependencias_id`, `usuarios_id`, `tipo`, `observacion`) VALUES
(51, '2017-10-23 16:43:22', 400, 0, 3, 'Alta', NULL),
(52, '2017-10-23 16:44:56', 401, 0, 3, 'Alta', NULL),
(53, '2017-10-23 16:45:39', 402, 0, 3, 'Alta', NULL),
(54, '2017-10-23 16:47:29', 400, 15, 3, 'Pase', ''),
(55, '2017-10-23 16:49:06', 400, 18, 3, 'Pase', ''),
(56, '2017-10-23 16:49:35', 401, 15, 3, 'Pase', ''),
(57, '2017-10-23 16:49:49', 402, 15, 3, 'Pase', ''),
(58, '2017-10-23 16:52:51', 403, 0, 3, 'Alta', NULL),
(59, '2017-10-23 16:53:18', 403, 15, 3, 'Pase', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(16) NOT NULL,
  `nombre` varchar(16) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `perfil` enum('Administrador','Usuario') NOT NULL,
  `password` varchar(255) NOT NULL,
  `create_time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `nombre`, `apellido`, `perfil`, `password`, `create_time`) VALUES
(1, 'aencina', 'Alex ', 'encina', 'Usuario', 'A_12345678', '2017-05-23 11:51:45'),
(3, 'cojeda', 'cristian', 'ojeda', 'Administrador', 'A_12345678', '2017-05-23 12:05:07');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_articulos_clasificaciones_idx` (`clasificaciones_id`), ADD KEY `fk_articulos_dependencias1_idx` (`dependencias_id`);

--
-- Indices de la tabla `clasificaciones`
--
ALTER TABLE `clasificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dependencias`
--
ALTER TABLE `dependencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historicos`
--
ALTER TABLE `historicos`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_historicos_articulos1_idx` (`articulos_id`), ADD KEY `fk_historicos_pases_dependencias1_idx` (`dependencias_id`), ADD KEY `fk_historico_pases_usuarios1_idx` (`usuarios_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=404;
--
-- AUTO_INCREMENT de la tabla `clasificaciones`
--
ALTER TABLE `clasificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `dependencias`
--
ALTER TABLE `dependencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `historicos`
--
ALTER TABLE `historicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
ADD CONSTRAINT `fk_articulos_clasificaciones` FOREIGN KEY (`clasificaciones_id`) REFERENCES `clasificaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_articulos_dependencias1` FOREIGN KEY (`dependencias_id`) REFERENCES `dependencias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `historicos`
--
ALTER TABLE `historicos`
ADD CONSTRAINT `fk_historico_pases_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_historicos_articulos1` FOREIGN KEY (`articulos_id`) REFERENCES `articulos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_historicos_pases_dependencias1` FOREIGN KEY (`dependencias_id`) REFERENCES `dependencias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
