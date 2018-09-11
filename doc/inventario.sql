-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-09-2018 a las 05:13:07
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `art_id` int(11) NOT NULL,
  `art_descripcion` varchar(255) CHARACTER SET latin1 NOT NULL,
  `art_numeroemco` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `art_serie` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `art_factura` int(11) DEFAULT NULL,
  `art_prestamo` tinyint(1) DEFAULT '0',
  `update_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `create_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `pro_id` int(11) NOT NULL,
  `res_id` int(11) NOT NULL DEFAULT '0',
  `dep_id` int(11) NOT NULL,
  `clas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificaciones`
--

CREATE TABLE `clasificaciones` (
  `cla_id` int(11) NOT NULL,
  `cla_nombre` varchar(45) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependencias`
--

CREATE TABLE `dependencias` (
  `dep_id` int(11) NOT NULL,
  `dep_nombre` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `dep_firma_nombre` varchar(255) NOT NULL,
  `dep_firma_grado` varchar(255) NOT NULL,
  `dep_firma_titulo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historicos`
--

CREATE TABLE `historicos` (
  `his_id` int(11) NOT NULL,
  `his_fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `art_id` int(11) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `usu_id` int(11) NOT NULL,
  `his_tipo` enum('Pase','Prestamo','Alta','Retorno','Reparacion') CHARACTER SET latin1 NOT NULL,
  `his_observacion` varchar(255) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `pro_id` int(11) NOT NULL,
  `pro_nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsables`
--

CREATE TABLE `responsables` (
  `res_id` int(11) NOT NULL,
  `res_apellido` varchar(45) DEFAULT NULL,
  `res_nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usu_id` int(11) NOT NULL,
  `usu_login` varchar(16) CHARACTER SET latin1 NOT NULL,
  `usu_nombre` varchar(16) CHARACTER SET latin1 NOT NULL,
  `usu_apellido` varchar(45) CHARACTER SET latin1 NOT NULL,
  `usu_perfil` enum('Administrador','Usuario') CHARACTER SET latin1 NOT NULL,
  `usu_password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `create_time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`art_id`),
  ADD KEY `fk_articulos_clasificaciones_idx` (`clas_id`),
  ADD KEY `fk_articulos_dependencias1_idx` (`dep_id`),
  ADD KEY `fk_articulos_proyectos1_idx` (`pro_id`),
  ADD KEY `fk_articulos_responsables1_idx` (`res_id`);

--
-- Indices de la tabla `clasificaciones`
--
ALTER TABLE `clasificaciones`
  ADD PRIMARY KEY (`cla_id`);

--
-- Indices de la tabla `dependencias`
--
ALTER TABLE `dependencias`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indices de la tabla `historicos`
--
ALTER TABLE `historicos`
  ADD PRIMARY KEY (`his_id`),
  ADD KEY `fk_historicos_articulos1_idx` (`art_id`),
  ADD KEY `fk_historicos_pases_dependencias1_idx` (`dep_id`),
  ADD KEY `fk_historico_pases_usuarios1_idx` (`usu_id`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indices de la tabla `responsables`
--
ALTER TABLE `responsables`
  ADD PRIMARY KEY (`res_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `art_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=843;

--
-- AUTO_INCREMENT de la tabla `clasificaciones`
--
ALTER TABLE `clasificaciones`
  MODIFY `cla_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `dependencias`
--
ALTER TABLE `dependencias`
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `historicos`
--
ALTER TABLE `historicos`
  MODIFY `his_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=991;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `responsables`
--
ALTER TABLE `responsables`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `fk_articulos_clasificaciones` FOREIGN KEY (`clas_id`) REFERENCES `clasificaciones` (`cla_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_articulos_dependencias1` FOREIGN KEY (`dep_id`) REFERENCES `dependencias` (`dep_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_articulos_proyectos1` FOREIGN KEY (`pro_id`) REFERENCES `proyectos` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_articulos_responsables1` FOREIGN KEY (`res_id`) REFERENCES `responsables` (`res_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `historicos`
--
ALTER TABLE `historicos`
  ADD CONSTRAINT `fk_historico_pases_usuarios1` FOREIGN KEY (`usu_id`) REFERENCES `usuarios` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_historicos_articulos1` FOREIGN KEY (`art_id`) REFERENCES `articulos` (`art_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_historicos_pases_dependencias1` FOREIGN KEY (`dep_id`) REFERENCES `dependencias` (`dep_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
