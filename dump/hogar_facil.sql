-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-01-2017 a las 14:41:34
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hogar_facil`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodega`
--

CREATE TABLE `bodega` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `bodega`
--

INSERT INTO `bodega` (`id`, `nombre`) VALUES
(1, 'casdasdasdasdasdasd'),
(2, 'asdadsasasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `domicilio_particular` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `domicilio_laboral` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fono_red_fija` decimal(20,0) DEFAULT NULL,
  `celular` decimal(20,0) DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_apertura_cuenta` date DEFAULT NULL,
  `numero_cuenta` int(11) DEFAULT NULL,
  `credito_autorizado` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_pago_pactada` date DEFAULT NULL,
  `total_cargos` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_abonos` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `usuario_id`, `domicilio_particular`, `domicilio_laboral`, `fono_red_fija`, `celular`, `email`, `fecha_apertura_cuenta`, `numero_cuenta`, `credito_autorizado`, `fecha_pago_pactada`, `total_cargos`, `total_abonos`, `estado`) VALUES
(1, NULL, '12312', '3123', '123123', '12312', '312312', '2014-02-03', 123123, '123123', '2013-04-06', '1231', '23123', 'estado.activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobradores`
--

CREATE TABLE `cobradores` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `porcentaje_comision` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `id` int(11) NOT NULL,
  `producto_id` char(36) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(DC2Type:guid)',
  `numero` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_apertura_cuenta` date DEFAULT NULL,
  `cantidad` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`id`, `producto_id`, `numero`, `fecha_apertura_cuenta`, `cantidad`) VALUES
(1, '4a31756e-d565-11e6-a18f-c4b301b7a691', '123', '2013-03-04', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_deudor`
--

CREATE TABLE `historial_deudor` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `vendedor_id` int(11) DEFAULT NULL,
  `documento_pendiente_pago` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `monto_total_deuda` decimal(30,0) DEFAULT NULL,
  `fecha_ultimo_pago` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `historial_deudor`
--

INSERT INTO `historial_deudor` (`id`, `cliente_id`, `vendedor_id`, `documento_pendiente_pago`, `monto_total_deuda`, `fecha_ultimo_pago`) VALUES
(1, NULL, NULL, '123123', NULL, '2014-03-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `cobrador_id` int(11) DEFAULT NULL,
  `vendedor_id` int(11) DEFAULT NULL,
  `glosa_id` int(11) DEFAULT NULL,
  `numero_documento` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `detalle_transaccion` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `monto` decimal(30,0) DEFAULT NULL,
  `fecha_movimiento` date DEFAULT NULL,
  `forma_pago` date DEFAULT NULL,
  `tipo_movimiento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `bodega_id` int(11) DEFAULT NULL,
  `nombre_producto` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cantidad` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `precio_neto` decimal(30,0) DEFAULT NULL,
  `estado` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `bodega_id`, `nombre_producto`, `cantidad`, `precio_neto`, `estado`) VALUES
('4a31756e-d565-11e6-a18f-c4b301b7a691', 1, '123', '12312', '123', 'estado.bueno'),
('59009e96-d563-11e6-a18f-c4b301b7a691', 1, 'asdjaskd', '1', '1231231231', 'estado.bueno'),
('7bd08aca-d564-11e6-a18f-c4b301b7a691', 1, '123', '123', '123', 'estado.bueno'),
('8b608760-d564-11e6-a18f-c4b301b7a691', 2, '123123', '123123', '1123', 'estado.bueno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `rut` int(11) DEFAULT NULL,
  `nombre` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellido_parteno` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellido_marteno` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contrasenia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `nombre_usuario` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salto` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `rut`, `nombre`, `apellido_parteno`, `apellido_marteno`, `contrasenia`, `estado`, `roles`, `nombre_usuario`, `salto`) VALUES
(17, 1, 'asdasd', '112312', '3123', '9cb1229e16447a7f31b147b2c489fe4291ea71e8', 'estado.activo', 'a:5:{i:0;s:13:"ROLE_VENDEDOR";i:1;s:13:"ROLE_COBRADOR";i:2;s:21:"ROLE_GERENTE_FINANZAS";i:3;s:19:"ROLE_GERENTE_VENTAS";i:4;a:4:{i:0;s:13:"ROLE_VENDEDOR";i:1;s:13:"ROLE_COBRADOR";i:2;s:21:"ROLE_GERENTE_FINANZAS";i:3;s:19:"ROLE_GERENTE_VENTAS";}}', 'admin', '287a1bb7e8e42e11488812e57b4f57b0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedores`
--

CREATE TABLE `vendedores` (
  `id` int(11) NOT NULL,
  `usuarios_id` int(11) DEFAULT NULL,
  `porcentaje_comision` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bodega`
--
ALTER TABLE `bodega`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_50FE07D7DB38439E` (`usuario_id`);

--
-- Indices de la tabla `cobradores`
--
ALTER TABLE `cobradores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_F91516C9DB38439E` (`usuario_id`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_80397C307645698E` (`producto_id`);

--
-- Indices de la tabla `historial_deudor`
--
ALTER TABLE `historial_deudor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_3BBBE47ADE734E51` (`cliente_id`),
  ADD UNIQUE KEY `UNIQ_3BBBE47A8361A8B8` (`vendedor_id`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_AB16A839DE734E51` (`cliente_id`),
  ADD UNIQUE KEY `UNIQ_AB16A839E34DBF53` (`cobrador_id`),
  ADD UNIQUE KEY `UNIQ_AB16A8398361A8B8` (`vendedor_id`),
  ADD UNIQUE KEY `UNIQ_AB16A839AE50FB8E` (`glosa_id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A7BB06158B1FDE9D` (`bodega_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_658C2856F01D3B25` (`usuarios_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bodega`
--
ALTER TABLE `bodega`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `cobradores`
--
ALTER TABLE `cobradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `historial_deudor`
--
ALTER TABLE `historial_deudor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `vendedores`
--
ALTER TABLE `vendedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `FK_50FE07D7DB38439E` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `cobradores`
--
ALTER TABLE `cobradores`
  ADD CONSTRAINT `FK_F91516C9DB38439E` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `FK_80397C307645698E` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `historial_deudor`
--
ALTER TABLE `historial_deudor`
  ADD CONSTRAINT `FK_3BBBE47A8361A8B8` FOREIGN KEY (`vendedor_id`) REFERENCES `vendedores` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_3BBBE47ADE734E51` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD CONSTRAINT `FK_AB16A8398361A8B8` FOREIGN KEY (`vendedor_id`) REFERENCES `vendedores` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_AB16A839AE50FB8E` FOREIGN KEY (`glosa_id`) REFERENCES `detalle` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_AB16A839DE734E51` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_AB16A839E34DBF53` FOREIGN KEY (`cobrador_id`) REFERENCES `cobradores` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `FK_A7BB06158B1FDE9D` FOREIGN KEY (`bodega_id`) REFERENCES `bodega` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `vendedores`
--
ALTER TABLE `vendedores`
  ADD CONSTRAINT `FK_658C2856F01D3B25` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
