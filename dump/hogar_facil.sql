-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-01-2017 a las 01:43:37
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
-- Estructura de tabla para la tabla `cellar`
--

CREATE TABLE `cellar` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cellar`
--

INSERT INTO `cellar` (`id`, `name`) VALUES
(2, 'asdasd'),
(3, 'asdasd'),
(4, 'asdasd'),
(5, 'asdasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `collectors`
--

CREATE TABLE `collectors` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `percentage_commission` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `home_address` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `work_address` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fixed_network_phone` decimal(20,0) DEFAULT NULL,
  `cell_phone` decimal(20,0) DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_opening_date` date DEFAULT NULL,
  `account_number` int(11) DEFAULT NULL,
  `authorized_credit` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_date_agreed` date DEFAULT NULL,
  `total_charge` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_deposit` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `product_id` char(36) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(DC2Type:guid)',
  `number` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateOfIssue` date DEFAULT NULL,
  `quantity` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `metadata` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `details`
--

INSERT INTO `details` (`id`, `product_id`, `number`, `dateOfIssue`, `quantity`, `metadata`) VALUES
(4, 'ac4ee5fe-da03-11e6-8f37-c4b301b7a691', '1212312', '2017-01-13', '3123123', 'a:1:{s:8:"supplier";a:2:{s:2:"id";i:16;s:8:"fullName";s:22:"Steven Delgado Chacón";}}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movements`
--

CREATE TABLE `movements` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `cobrador_id` int(11) DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `gloss_id` int(11) DEFAULT NULL,
  `document_number` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction_detail` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rode` decimal(30,0) DEFAULT NULL,
  `date_movement` date DEFAULT NULL,
  `paid_form` date DEFAULT NULL,
  `movement_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `cellar_id` int(11) DEFAULT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price_net` decimal(30,0) DEFAULT NULL,
  `status` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `price` decimal(30,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `cellar_id`, `name`, `quantity`, `price_net`, `status`, `supplier_id`, `price`) VALUES
('17dab904-da01-11e6-8f37-c4b301b7a691', 3, '12312', 3123123, '1231', 'status.good', 3, '2312312'),
('4c5b94aa-da01-11e6-8f37-c4b301b7a691', 4, '12312', 3123123, '1231', 'status.good', 4, '2312312'),
('ac4ee5fe-da03-11e6-8f37-c4b301b7a691', 5, '12312', 3123123, '1231', 'status.good', 5, '2312312'),
('fd2d918a-da00-11e6-8f37-c4b301b7a691', 2, '12312', 3123123, '1231', 'status.good', 2, '2312312');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `record`
--

CREATE TABLE `record` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `document_pending_payment` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount_total_debt` decimal(30,0) DEFAULT NULL,
  `last_payment_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sellers`
--

CREATE TABLE `sellers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `percentage_commission` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `address`) VALUES
(2, '1asasd', '123123'),
(3, '1asasd', '123123'),
(4, '1asasd', '123123'),
(5, '1asasd', '123123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `rut` int(11) DEFAULT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mothers_last_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `rut`, `name`, `last_name`, `mothers_last_name`, `status`) VALUES
(15, 'adminGeneral', 'admingeneral', 'sistema@gmail.com', 'sistema@gmail.com', 1, '7Yg3RJgKldbHOgCxAcv7s3Kz3uimV.HdOCXS2vN0Qj0', 'QMZFk5m3DxMWog8+HjNiQO2oXDQwvRMbTiczvKHOPh2+82u5GDkMPKneFt3kX+rggN+TdFL1Aelnsc1yI3Ui3w==', '2017-01-14 01:04:28', NULL, NULL, 'a:1:{i:0;s:18:"ROLE_ADMIN_GENERAL";}', 23283822, 'Administrador', 'General', 'Sistema', 'status.active'),
(16, 'vendedor', 'vendedor', 'steven@gmail.com', 'steven@gmail.com', 1, 'bC0628Dyy.zaqnq4O9Jq9io0VIUrLKdjfIdSxthP9kY', 'qJAmbYKr9+AM/4NqoamdGCWxy/4MeMh1DxGMfJovamLCoK5s1froy+DNFkyNZgBj9ZvFA5EYyJUQTu2TpGGT3A==', '2017-01-14 01:05:59', NULL, NULL, 'a:1:{i:0;s:13:"ROLE_VENDEDOR";}', 22755862, 'Steven', 'Delgado', 'Chacón', 'status.active'),
(18, '123123123', '123123123', 'adl@gmail.com', 'adl@gmail.com', 1, 'o0q4OZwRfFRM4NWuDqr.8R6QPK7ARGYhrg5mySISkJM', 'IuLbni8jwoylrxg6mUo1e+WUQw5kd6C6m/CUkJ5F/NckNoi/NmF8G5P3pcbVNnPSjJnrr5tKfoGzsDY4q48fPQ==', NULL, NULL, NULL, 'a:1:{i:0;s:13:"ROLE_COBRADOR";}', 123123, '123123', '12312', '1233', 'status.active');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cellar`
--
ALTER TABLE `cellar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `collectors`
--
ALTER TABLE `collectors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_64AA1945A76ED395` (`user_id`);

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_62534E21A76ED395` (`user_id`);

--
-- Indices de la tabla `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_72260B8A4584665A` (`product_id`);

--
-- Indices de la tabla `movements`
--
ALTER TABLE `movements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_38237521DE734E51` (`cliente_id`),
  ADD UNIQUE KEY `UNIQ_38237521E34DBF53` (`cobrador_id`),
  ADD UNIQUE KEY `UNIQ_382375218DE820D9` (`seller_id`),
  ADD UNIQUE KEY `UNIQ_382375215440649A` (`gloss_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_B3BA5A5A2ADD6D8C` (`supplier_id`),
  ADD KEY `IDX_B3BA5A5AD4A8C468` (`cellar_id`);

--
-- Indices de la tabla `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_9B349F919395C3F3` (`customer_id`),
  ADD UNIQUE KEY `UNIQ_9B349F918DE820D9` (`seller_id`);

--
-- Indices de la tabla `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_AFFE6BEFA76ED395` (`user_id`);

--
-- Indices de la tabla `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1483A5E992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_1483A5E9A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_1483A5E9C05FB297` (`confirmation_token`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cellar`
--
ALTER TABLE `cellar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `collectors`
--
ALTER TABLE `collectors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `movements`
--
ALTER TABLE `movements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `record`
--
ALTER TABLE `record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `collectors`
--
ALTER TABLE `collectors`
  ADD CONSTRAINT `FK_64AA1945A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `FK_62534E21A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `FK_72260B8A4584665A` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `movements`
--
ALTER TABLE `movements`
  ADD CONSTRAINT `FK_382375215440649A` FOREIGN KEY (`gloss_id`) REFERENCES `details` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_382375218DE820D9` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_38237521DE734E51` FOREIGN KEY (`cliente_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_38237521E34DBF53` FOREIGN KEY (`cobrador_id`) REFERENCES `collectors` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_B3BA5A5A2ADD6D8C` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_B3BA5A5AD4A8C468` FOREIGN KEY (`cellar_id`) REFERENCES `cellar` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `FK_9B349F918DE820D9` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_9B349F919395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sellers`
--
ALTER TABLE `sellers`
  ADD CONSTRAINT `FK_AFFE6BEFA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
