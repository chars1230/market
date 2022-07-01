-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2020 a las 06:47:01
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `indesing_sisposw_v3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL,
  `nick_usuario` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_reg` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_administrador`, `nick_usuario`, `clave`, `fecha_reg`, `estado`, `persona`) VALUES
(2, 'administrador', '81dc9bdb52d04dc20036dbd8313ed055', '10/10/2020', '1', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`) VALUES
(1, 'cereales'),
(2, 'atunes'),
(3, 'pastas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nick_usuario` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_reg` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nick_usuario`, `clave`, `fecha_reg`, `estado`, `persona`) VALUES
(1, 'admin', '1234', '2020-10-06', '1', 1),
(4, 'dasdas', '', '2020-10-06', '1', 3),
(5, 'admin3', '827ccb0eea8a706c4c34a16891f84e7b', '2020-10-09', '1', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_ventas`
--

CREATE TABLE `det_ventas` (
  `id_detalle` int(11) NOT NULL,
  `venta` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` double(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `det_ventas`
--

INSERT INTO `det_ventas` (`id_detalle`, `venta`, `producto`, `cantidad`, `subtotal`) VALUES
(1, 5, 2, 3, 3900.00),
(2, 5, 1, 1, 1500.00),
(3, 6, 1, 1, 1500.00),
(4, 6, 2, 1, 1300.00),
(5, 7, 1, 1, 1500.00),
(6, 8, 2, 1, 1300.00),
(7, 8, 2, 1, 1300.00),
(8, 8, 2, 1, 1300.00),
(9, 9, 1, 1, 1500.00),
(10, 10, 2, 1, 1300.00),
(11, 11, 2, 1, 1300.00),
(12, 14, 2, 5, 6500.00),
(13, 14, 3, 8, 15200.00),
(14, 15, 2, 5, 6500.00),
(15, 15, 3, 8, 15200.00),
(16, 15, 4, 6, 36000.00),
(17, 18, 3, 50, 95000.00),
(18, 18, 2, 20, 26000.00),
(19, 18, 5, 15, 105000.00),
(20, 19, 6, 12, 15000.00),
(21, 19, 7, 20, 32000.00),
(22, 20, 2, 1, 1300.00),
(23, 20, 2, 3, 3900.00),
(24, 20, 3, 1, 1900.00),
(25, 20, 4, 1, 6000.00),
(26, 20, 5, 1, 7000.00),
(27, 20, 6, 1, 1250.00),
(28, 20, 7, 1, 1600.00),
(29, 21, 2, 1, 1300.00),
(30, 21, 7, 1, 1600.00),
(31, 21, 6, 1, 1250.00),
(32, 21, 4, 1, 6000.00),
(33, 22, 2, 1, 1300.00),
(34, 22, 3, 1, 1900.00),
(35, 23, 3, 1, 1900.00),
(36, 23, 3, 50, 95000.00),
(37, 24, 1, 20, 30000.00),
(38, 25, 1, 20, 30000.00),
(39, 26, 1, 20, 30000.00),
(40, 27, 2, 30, 39000.00),
(41, 28, 2, 10, 13000.00),
(42, 29, 1, 1, 1500.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_persona` int(11) NOT NULL,
  `nombres` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellidos` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nro_identificacion` int(11) NOT NULL,
  `direccion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `celular` int(10) NOT NULL,
  `correo` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `nombres`, `apellidos`, `nro_identificacion`, `direccion`, `celular`, `correo`) VALUES
(1, 'Juan ', 'castro', 123456789, 'cra 28 f1', 1476, 'manuel2@algo.com'),
(3, 'juan manuel', 'castro minotta', 2147483647, 'calle 14', 131321, 'manuel@gmail.com'),
(4, 'Manuel', 'pirlo', 11112, 'calle  9', 2147483647, 'manuel14@gmail.com'),
(6, 'Manuelas', 'Castro', 1143976892, 'calle 8', 1111, 'manuelcastro911@gmail.com'),
(7, 'juan sebastian', 'ospina', 1234567890, 'calle cali', 8888, 'sebas@gmail.com'),
(9, 'leonardo', 'izquierdo', 7890, 'cali', 20321030, 'leo@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `precio` double(20,2) NOT NULL,
  `categoria` int(11) NOT NULL,
  `imagen` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `existencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `precio`, `categoria`, `imagen`, `marca`, `stock`, `existencia`) VALUES
(1, 'Arroz diana Premium', 1500.00, 1, 'imagenes/arrozdiana.jpg', 'diana', -20, 9),
(2, 'Arroz Costeño', 1300.00, 1, 'imagenes/arrozcosteño.jpg', 'costeño', -1, 10),
(3, 'Arroz faraon', 1900.00, 1, 'imagenes/arrozfaraon.jpg', 'Faraon', -50, 100),
(4, 'Atun isabell', 6000.00, 2, 'imagenes/atunisabel.jpg', 'isabell', -1, 35),
(5, 'Atun van camps', 7000.00, 2, 'imagenes/atunvancamps.jpg', 'van camps', -1, 20),
(6, 'Fideos Doria', 1250.00, 3, 'imagenes/fideosdoria.jpg', 'doria', -1, 36),
(7, 'Pasta concha', 1600.00, 3, 'imagenes/pastaslamunecaconcha.jpg', 'la muñeca', -1, 45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE `sesiones` (
  `id_sesion` int(11) NOT NULL,
  `fecha_inicio` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_fin` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `hora_inicio` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `hora_fin` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado_sesion` int(1) NOT NULL,
  `cliente` int(11) DEFAULT NULL,
  `administrador` int(11) DEFAULT NULL,
  `tipo_de_usuario` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `cliente` int(11) NOT NULL,
  `fecha_venta` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `total` double(20,2) NOT NULL,
  `metodo_pag` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `cliente`, `fecha_venta`, `total`, `metodo_pag`) VALUES
(1, 1, '2020-10-06', 3900.00, NULL),
(2, 1, '2020-10-06', 3900.00, NULL),
(3, 1, '2020-10-06', 5400.00, NULL),
(4, 1, '2020-10-06', 5400.00, NULL),
(5, 1, '2020-10-06', 5400.00, NULL),
(6, 1, '2020-10-07', 2800.00, NULL),
(7, 1, '2020-10-09', 1500.00, NULL),
(8, 1, '2020-10-09', 3900.00, NULL),
(9, 1, '2020-10-09', 1500.00, NULL),
(10, 1, '2020-10-09', 1300.00, NULL),
(11, 1, '2020-10-09', 1300.00, NULL),
(12, 5, '2020-10-12', 11700.00, NULL),
(13, 5, '2020-10-12', 18200.00, NULL),
(14, 5, '2020-10-12', 21700.00, NULL),
(15, 5, '2020-10-12', 57700.00, NULL),
(16, 5, '2020-10-12', 57700.00, NULL),
(17, 5, '2020-10-12', 18200.00, NULL),
(18, 5, '2020-10-12', 226000.00, NULL),
(19, 5, '2020-10-12', 47000.00, NULL),
(20, 5, '2020-10-12', 22950.00, NULL),
(21, 5, '2020-10-12', 10150.00, NULL),
(22, 5, '2020-10-12', 3200.00, NULL),
(23, 5, '2020-10-12', 96900.00, NULL),
(24, 5, '2020-10-12', 30000.00, NULL),
(25, 5, '2020-10-12', 30000.00, NULL),
(26, 5, '2020-10-12', 30000.00, NULL),
(27, 5, '2020-10-12', 39000.00, NULL),
(28, 5, '2020-10-12', 13000.00, NULL),
(29, 5, '2020-10-12', 1500.00, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`),
  ADD UNIQUE KEY `nick_usuario_UNIQUE` (`nick_usuario`),
  ADD KEY `fk_ADMINISTRADOR_PERSONAS1_idx` (`persona`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `nick_usuario_UNIQUE` (`nick_usuario`),
  ADD KEY `fk_CLIENTES_PERSONAS1_idx` (`persona`);

--
-- Indices de la tabla `det_ventas`
--
ALTER TABLE `det_ventas`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `fk_PRODUCTOS_has_VENTAS_VENTAS1_idx` (`venta`),
  ADD KEY `fk_PRODUCTOS_has_VENTAS_PRODUCTOS1_idx` (`producto`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`),
  ADD UNIQUE KEY `nro_identificacion_UNIQUE` (`nro_identificacion`),
  ADD UNIQUE KEY `correo_UNIQUE` (`correo`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria_idx` (`categoria`);

--
-- Indices de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD PRIMARY KEY (`id_sesion`),
  ADD KEY `fk_SESIONES_CLIENTES1_idx` (`cliente`),
  ADD KEY `fk_SESIONES_ADMINISTRADOR1_idx` (`administrador`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `fk_FACTURA_CLIENTES1_idx` (`cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `det_ventas`
--
ALTER TABLE `det_ventas`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `fk_ADMINISTRADOR_PERSONAS1` FOREIGN KEY (`persona`) REFERENCES `personas` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_CLIENTES_PERSONAS1` FOREIGN KEY (`persona`) REFERENCES `personas` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `det_ventas`
--
ALTER TABLE `det_ventas`
  ADD CONSTRAINT `fk_PRODUCTOS_has_VENTAS_PRODUCTOS1` FOREIGN KEY (`producto`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PRODUCTOS_has_VENTAS_VENTAS1` FOREIGN KEY (`venta`) REFERENCES `ventas` (`id_venta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `id_categoria` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD CONSTRAINT `fk_SESIONES_ADMINISTRADOR1` FOREIGN KEY (`administrador`) REFERENCES `administrador` (`id_administrador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SESIONES_CLIENTES1` FOREIGN KEY (`cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `fk_FACTURA_CLIENTES1` FOREIGN KEY (`cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
