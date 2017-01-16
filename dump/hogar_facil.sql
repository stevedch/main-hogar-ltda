-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-01-2017 a las 21:23:42
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
(5, 'asdasd'),
(6, 'asda'),
(7, 'asda'),
(8, 'asda'),
(9, '21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `collectors`
--

CREATE TABLE `collectors` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `percentage_commission` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `collectors`
--

INSERT INTO `collectors` (`id`, `user_id`, `percentage_commission`) VALUES
(13, 20, NULL),
(14, 20, NULL),
(15, 20, NULL),
(16, 20, NULL),
(17, 20, NULL),
(18, 20, NULL),
(19, 20, NULL),
(20, 20, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `home_address` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `work_address` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fixed_network_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cell_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_opening_date` date DEFAULT NULL,
  `account_number` int(11) DEFAULT NULL,
  `authorized_credit` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_date_agreed` date DEFAULT NULL,
  `total_charge` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_deposit` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rut` int(11) DEFAULT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mothers_last_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`id`, `home_address`, `work_address`, `fixed_network_phone`, `cell_phone`, `email`, `account_opening_date`, `account_number`, `authorized_credit`, `payment_date_agreed`, `total_charge`, `total_deposit`, `status`, `rut`, `name`, `last_name`, `mothers_last_name`) VALUES
(7, 'asdasd', 'sdasda', '231', '123', 'asdasd@gmail.com', '2016-03-04', 123123, '123', '2014-03-02', '12312', '3123', 'status.active', 123123, '1asdasda', 'sdasd', 'asdasd'),
(18, 'asdasd', 'sdasda', '231', '123', 'asdasd@gmail.com', '2016-03-04', 123123, '123', '2014-03-02', '12312', '3123', 'status.active', 123123, '1asdasda', 'sdasd', 'asdasd'),
(19, 'asdasd', 'sdasda', '231', '123', 'asdasd@gmail.com', '2016-03-04', 123123, '123', '2014-03-02', '12312', '3123', 'status.active', 123123, '1asdasda', 'sdasd', 'asdasd'),
(20, 'asdasd', 'sdasda', '231', '123', 'asdasd@gmail.com', '2016-03-04', 123123, '123', '2014-03-02', '12312', '3123', 'status.active', 123123, '1asdasda', 'sdasd', 'asdasd'),
(21, '12312', 'asda', 'sd', '123123', 'asdasd@gmail.com', '2014-04-03', 1231, '23123', '2014-03-04', '123123', '123', 'status.active', 123123, '123123', 'asdasdas', 'asdsd'),
(22, '12312', 'asda', 'sd', '123123', 'asdasd@gmail.com', '2014-04-03', 1231, '23123', '2014-03-04', '123123', '123', 'status.active', 123123, '123123', 'asdasdas', 'asdsd'),
(23, 'asdasd', 'sdasda', '231', '123', 'asdasd@gmail.com', '2016-03-04', 123123, '123', '2014-03-02', '12312', '3123', 'status.active', 123123, '1asdasda', 'sdasd', 'asdasd'),
(24, '12312', 'asda', 'sd', '123123', 'asdasd@gmail.com', '2014-04-03', 1231, '23123', '2014-03-04', '123123', '123', 'status.active', 123123, '123123', 'asdasdas', 'asdsd'),
(25, '31231', '231', '1231', '23123', '3123@gmail.com', '2014-04-04', 123112, '3123123', '2015-04-02', '31231', '12312', 'status.active', 123, '312', '3123', '2312'),
(26, '31231', '231', '1231', '23123', '3123@gmail.com', '2014-04-04', 123112, '3123123', '2015-04-02', '31231', '12312', 'status.active', 123, '312', '3123', '2312'),
(27, '31231', '231', '1231', '23123', '3123@gmail.com', '2014-04-04', 123112, '3123123', '2015-04-02', '31231', '12312', 'status.active', 123, '312', '3123', '2312'),
(28, '31231', '231', '1231', '23123', '3123@gmail.com', '2014-04-04', 123112, '3123123', '2015-04-02', '31231', '12312', 'status.active', 123, '312', '3123', '2312'),
(29, 'sdfs', 'df', 'sdfsdf1', '2313', '123123@gmail.com', '2015-07-04', 123123, '123', '2016-04-02', '123123', '123', 'status.active', 123123123, 'sdf', 'csdsdfsdf', 'sdf'),
(30, 'sdfs', 'df', 'sdfsdf1', '2313', '123123@gmail.com', '2015-07-04', 123123, '123', '2016-04-02', '123123', '123', 'status.active', 123123123, 'sdf', 'csdsdfsdf', 'sdf'),
(32, 'sdfs', 'df', 'sdfsdf1', '2313', '123123@gmail.com', '2015-07-04', 123123, '123', '2016-04-02', '123123', '123', 'status.active', 123123123, 'sdf', 'csdsdfsdf', 'sdf'),
(33, 'sdfs', 'df', 'sdfsdf1', '2313', '123123@gmail.com', '2015-07-04', 123123, '123', '2016-04-02', '123123', '123', 'status.active', 123123123, 'sdf', 'csdsdfsdf', 'sdf'),
(34, 'sdfs', 'df', 'sdfsdf1', '2313', '123123@gmail.com', '2015-07-04', 123123, '123', '2016-04-02', '123123', '123', 'status.active', 123123123, 'sdf', 'csdsdfsdf', 'sdf'),
(35, '23', '123123', '231123', '123', 'adasd@gmail.com', '2014-02-03', 123, '123123', '2013-01-01', '123', '123', 'status.active', 1231, '231', '231231', '231'),
(36, '23', '123123', '231123', '123', 'adasd@gmail.com', '2014-02-03', 123, '123123', '2013-01-01', '123', '123', 'status.active', 1231, '231', '231231', '231'),
(37, '23', '123123', '231123', '123', 'adasd@gmail.com', '2014-02-03', 123, '123123', '2013-01-01', '123', '123', 'status.active', 1231, '231', '231231', '231'),
(38, '23', '123123', '231123', '123', 'adasd@gmail.com', '2014-02-03', 123, '123123', '2013-01-01', '123', '123', 'status.active', 1231, '231', '231231', '231'),
(39, '23', '123123', '231123', '123', 'adasd@gmail.com', '2014-02-03', 123, '123123', '2013-01-01', '123', '123', 'status.active', 1231, '231', '231231', '231'),
(40, '23', '123123', '231123', '123', 'adasd@gmail.com', '2014-02-03', 123, '123123', '2013-01-01', '123', '123', 'status.active', 1231, '231', '231231', '231'),
(41, '23', '123123', '231123', '123', 'adasd@gmail.com', '2014-02-03', 123, '123123', '2013-01-01', '123', '123', 'status.active', 1231, '231', '231231', '231');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `number` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateOfIssue` date DEFAULT NULL,
  `quantity` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `metadata` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)',
  `type` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `details`
--

INSERT INTO `details` (`id`, `number`, `dateOfIssue`, `quantity`, `metadata`, `type`) VALUES
(10, '1212317', '2017-01-14', '1231', 'a:2:{s:6:"seller";a:2:{s:2:"id";i:16;s:8:"fullName";s:22:"Steven Delgado Chacón";}s:7:"product";O:25:"AppBundle\\Entity\\Products":8:{s:5:"\0*\0id";s:36:"bab3fd32-dab7-11e6-8f37-c4b301b7a691";s:7:"\0*\0name";s:6:"123123";s:11:"\0*\0quantity";i:1231;s:8:"\0*\0price";i:23123;s:11:"\0*\0priceNet";d:25617971.6999999992549419403076171875;s:9:"\0*\0cellar";O:23:"AppBundle\\Entity\\Cellar":2:{s:5:"\0*\0id";N;s:7:"\0*\0name";s:4:"asda";}s:9:"\0*\0status";s:11:"status.good";s:11:"\0*\0supplier";O:25:"AppBundle\\Entity\\Supplier":3:{s:5:"\0*\0id";N;s:7:"\0*\0name";s:5:"asdas";s:10:"\0*\0address";s:4:"dasd";}}}', 'detail.purchase'),
(15, '1212318', '2017-01-14', '123', 'a:3:{s:6:"seller";a:2:{s:2:"id";i:16;s:8:"fullName";s:22:"Steven Delgado Chacón";}s:7:"product";O:25:"AppBundle\\Entity\\Products":8:{s:5:"\0*\0id";s:36:"4c5b94aa-da01-11e6-8f37-c4b301b7a691";s:7:"\0*\0name";s:5:"12312";s:11:"\0*\0quantity";i:3123123;s:8:"\0*\0price";s:7:"2312312";s:11:"\0*\0priceNet";s:4:"1231";s:9:"\0*\0cellar";O:38:"Proxies\\__CG__\\AppBundle\\Entity\\Cellar":3:{s:17:"__isInitialized__";b:0;s:5:"\0*\0id";i:4;s:7:"\0*\0name";N;}s:9:"\0*\0status";s:11:"status.good";s:11:"\0*\0supplier";O:40:"Proxies\\__CG__\\AppBundle\\Entity\\Supplier":4:{s:17:"__isInitialized__";b:0;s:5:"\0*\0id";i:4;s:7:"\0*\0name";N;s:10:"\0*\0address";N;}}s:8:"customer";O:26:"AppBundle\\Entity\\Customers":17:{s:5:"\0*\0id";N;s:6:"\0*\0rut";i:123123;s:7:"\0*\0name";s:8:"1asdasda";s:11:"\0*\0lastName";s:5:"sdasd";s:18:"\0*\0mothersLastName";s:6:"asdasd";s:14:"\0*\0homeAddress";s:6:"asdasd";s:14:"\0*\0workAddress";s:6:"sdasda";s:20:"\0*\0fixedNetworkPhone";s:3:"231";s:12:"\0*\0cellPhone";s:3:"123";s:8:"\0*\0email";s:16:"asdasd@gmail.com";s:21:"\0*\0accountOpeningDate";O:8:"DateTime":3:{s:4:"date";s:26:"2016-03-04 00:00:00.000000";s:13:"timezone_type";i:3;s:8:"timezone";s:16:"America/Santiago";}s:16:"\0*\0accountNumber";i:123123;s:19:"\0*\0authorizedCredit";s:3:"123";s:20:"\0*\0paymentDateAgreed";O:8:"DateTime":3:{s:4:"date";s:26:"2014-03-02 00:00:00.000000";s:13:"timezone_type";i:3;s:8:"timezone";s:16:"America/Santiago";}s:14:"\0*\0totalCharge";s:5:"12312";s:15:"\0*\0totalDeposit";s:4:"3123";s:9:"\0*\0status";s:13:"status.active";}}', 'detail.sale'),
(16, '1212319', '2017-01-14', '123123', 'a:2:{s:6:"seller";a:2:{s:2:"id";i:16;s:8:"fullName";s:22:"Steven Delgado Chacón";}s:7:"product";O:25:"AppBundle\\Entity\\Products":8:{s:5:"\0*\0id";s:36:"d9891662-daca-11e6-8f37-c4b301b7a691";s:7:"\0*\0name";s:3:"213";s:11:"\0*\0quantity";i:123123;s:8:"\0*\0price";i:123123;s:11:"\0*\0priceNet";d:13643345816.1000003814697265625;s:9:"\0*\0cellar";O:23:"AppBundle\\Entity\\Cellar":2:{s:5:"\0*\0id";N;s:7:"\0*\0name";s:2:"21";}s:9:"\0*\0status";s:11:"status.good";s:11:"\0*\0supplier";O:25:"AppBundle\\Entity\\Supplier":3:{s:5:"\0*\0id";N;s:7:"\0*\0name";s:6:"123123";s:10:"\0*\0address";s:5:"sd123";}}}', 'detail.purchase'),
(17, '1212320', '2017-01-15', '12312', 'a:3:{s:6:"seller";a:2:{s:2:"id";i:16;s:8:"fullName";s:22:"Steven Delgado Chacón";}s:7:"product";O:25:"AppBundle\\Entity\\Products":8:{s:5:"\0*\0id";s:36:"93d4478a-dab7-11e6-8f37-c4b301b7a691";s:7:"\0*\0name";s:6:"123123";s:11:"\0*\0quantity";i:1231;s:8:"\0*\0price";s:5:"23123";s:11:"\0*\0priceNet";s:8:"25617972";s:9:"\0*\0cellar";O:38:"Proxies\\__CG__\\AppBundle\\Entity\\Cellar":3:{s:17:"__isInitialized__";b:0;s:5:"\0*\0id";i:6;s:7:"\0*\0name";N;}s:9:"\0*\0status";s:11:"status.good";s:11:"\0*\0supplier";O:40:"Proxies\\__CG__\\AppBundle\\Entity\\Supplier":4:{s:17:"__isInitialized__";b:0;s:5:"\0*\0id";i:6;s:7:"\0*\0name";N;s:10:"\0*\0address";N;}}s:8:"customer";O:26:"AppBundle\\Entity\\Customers":17:{s:5:"\0*\0id";N;s:6:"\0*\0rut";i:123123;s:7:"\0*\0name";s:6:"123123";s:11:"\0*\0lastName";s:8:"asdasdas";s:18:"\0*\0mothersLastName";s:5:"asdsd";s:14:"\0*\0homeAddress";s:5:"12312";s:14:"\0*\0workAddress";s:4:"asda";s:20:"\0*\0fixedNetworkPhone";s:2:"sd";s:12:"\0*\0cellPhone";s:6:"123123";s:8:"\0*\0email";s:16:"asdasd@gmail.com";s:21:"\0*\0accountOpeningDate";O:8:"DateTime":3:{s:4:"date";s:26:"2014-04-03 00:00:00.000000";s:13:"timezone_type";i:3;s:8:"timezone";s:16:"America/Santiago";}s:16:"\0*\0accountNumber";i:1231;s:19:"\0*\0authorizedCredit";s:5:"23123";s:20:"\0*\0paymentDateAgreed";O:8:"DateTime":3:{s:4:"date";s:26:"2014-03-04 00:00:00.000000";s:13:"timezone_type";i:3;s:8:"timezone";s:16:"America/Santiago";}s:14:"\0*\0totalCharge";s:6:"123123";s:15:"\0*\0totalDeposit";s:3:"123";s:9:"\0*\0status";s:13:"status.active";}}', 'detail.sale'),
(18, '1212321', '2017-01-15', '23123', 'a:3:{s:6:"seller";a:2:{s:2:"id";i:16;s:8:"fullName";s:22:"Steven Delgado Chacón";}s:7:"product";O:25:"AppBundle\\Entity\\Products":8:{s:5:"\0*\0id";s:36:"d9891662-daca-11e6-8f37-c4b301b7a691";s:7:"\0*\0name";s:3:"213";s:11:"\0*\0quantity";i:123123;s:8:"\0*\0price";s:6:"123123";s:11:"\0*\0priceNet";s:11:"13643345816";s:9:"\0*\0cellar";O:38:"Proxies\\__CG__\\AppBundle\\Entity\\Cellar":3:{s:17:"__isInitialized__";b:0;s:5:"\0*\0id";i:9;s:7:"\0*\0name";N;}s:9:"\0*\0status";s:11:"status.good";s:11:"\0*\0supplier";O:40:"Proxies\\__CG__\\AppBundle\\Entity\\Supplier":4:{s:17:"__isInitialized__";b:0;s:5:"\0*\0id";i:9;s:7:"\0*\0name";N;s:10:"\0*\0address";N;}}s:8:"customer";O:26:"AppBundle\\Entity\\Customers":17:{s:5:"\0*\0id";N;s:6:"\0*\0rut";i:123;s:7:"\0*\0name";s:3:"312";s:11:"\0*\0lastName";s:4:"3123";s:18:"\0*\0mothersLastName";s:4:"2312";s:14:"\0*\0homeAddress";s:5:"31231";s:14:"\0*\0workAddress";s:3:"231";s:20:"\0*\0fixedNetworkPhone";s:4:"1231";s:12:"\0*\0cellPhone";s:5:"23123";s:8:"\0*\0email";s:14:"3123@gmail.com";s:21:"\0*\0accountOpeningDate";O:8:"DateTime":3:{s:4:"date";s:26:"2014-04-04 00:00:00.000000";s:13:"timezone_type";i:3;s:8:"timezone";s:16:"America/Santiago";}s:16:"\0*\0accountNumber";i:123112;s:19:"\0*\0authorizedCredit";s:7:"3123123";s:20:"\0*\0paymentDateAgreed";O:8:"DateTime":3:{s:4:"date";s:26:"2015-04-02 00:00:00.000000";s:13:"timezone_type";i:3;s:8:"timezone";s:16:"America/Santiago";}s:14:"\0*\0totalCharge";s:5:"31231";s:15:"\0*\0totalDeposit";s:5:"12312";s:9:"\0*\0status";s:13:"status.active";}}', 'detail.sale'),
(19, '1212322', '2017-01-15', '1231', 'a:3:{s:6:"seller";a:2:{s:2:"id";i:16;s:8:"fullName";s:22:"Steven Delgado Chacón";}s:7:"product";O:25:"AppBundle\\Entity\\Products":8:{s:5:"\0*\0id";s:36:"fd2d918a-da00-11e6-8f37-c4b301b7a691";s:7:"\0*\0name";s:5:"12312";s:11:"\0*\0quantity";i:3123123;s:8:"\0*\0price";s:7:"2312312";s:11:"\0*\0priceNet";s:4:"1231";s:9:"\0*\0cellar";O:38:"Proxies\\__CG__\\AppBundle\\Entity\\Cellar":3:{s:17:"__isInitialized__";b:0;s:5:"\0*\0id";i:2;s:7:"\0*\0name";N;}s:9:"\0*\0status";s:11:"status.good";s:11:"\0*\0supplier";O:40:"Proxies\\__CG__\\AppBundle\\Entity\\Supplier":4:{s:17:"__isInitialized__";b:0;s:5:"\0*\0id";i:2;s:7:"\0*\0name";N;s:10:"\0*\0address";N;}}s:8:"customer";O:26:"AppBundle\\Entity\\Customers":17:{s:5:"\0*\0id";N;s:6:"\0*\0rut";i:123123123;s:7:"\0*\0name";s:3:"sdf";s:11:"\0*\0lastName";s:9:"csdsdfsdf";s:18:"\0*\0mothersLastName";s:3:"sdf";s:14:"\0*\0homeAddress";s:4:"sdfs";s:14:"\0*\0workAddress";s:2:"df";s:20:"\0*\0fixedNetworkPhone";s:7:"sdfsdf1";s:12:"\0*\0cellPhone";s:4:"2313";s:8:"\0*\0email";s:16:"123123@gmail.com";s:21:"\0*\0accountOpeningDate";O:8:"DateTime":3:{s:4:"date";s:26:"2015-07-04 00:00:00.000000";s:13:"timezone_type";i:3;s:8:"timezone";s:16:"America/Santiago";}s:16:"\0*\0accountNumber";i:123123;s:19:"\0*\0authorizedCredit";s:3:"123";s:20:"\0*\0paymentDateAgreed";O:8:"DateTime":3:{s:4:"date";s:26:"2016-04-02 00:00:00.000000";s:13:"timezone_type";i:3;s:8:"timezone";s:16:"America/Santiago";}s:14:"\0*\0totalCharge";s:6:"123123";s:15:"\0*\0totalDeposit";s:3:"123";s:9:"\0*\0status";s:13:"status.active";}}', 'detail.sale'),
(20, '1212323', '2017-01-15', '123123', 'a:3:{s:6:"seller";a:2:{s:2:"id";i:16;s:8:"fullName";s:22:"Steven Delgado Chacón";}s:7:"product";O:25:"AppBundle\\Entity\\Products":8:{s:5:"\0*\0id";s:36:"4c5b94aa-da01-11e6-8f37-c4b301b7a691";s:7:"\0*\0name";s:5:"12312";s:11:"\0*\0quantity";i:3123123;s:8:"\0*\0price";s:7:"2312312";s:11:"\0*\0priceNet";s:4:"1231";s:9:"\0*\0cellar";O:38:"Proxies\\__CG__\\AppBundle\\Entity\\Cellar":3:{s:17:"__isInitialized__";b:0;s:5:"\0*\0id";i:4;s:7:"\0*\0name";N;}s:9:"\0*\0status";s:11:"status.good";s:11:"\0*\0supplier";O:40:"Proxies\\__CG__\\AppBundle\\Entity\\Supplier":4:{s:17:"__isInitialized__";b:0;s:5:"\0*\0id";i:4;s:7:"\0*\0name";N;s:10:"\0*\0address";N;}}s:8:"customer";O:26:"AppBundle\\Entity\\Customers":17:{s:5:"\0*\0id";N;s:6:"\0*\0rut";i:1231;s:7:"\0*\0name";s:3:"231";s:11:"\0*\0lastName";s:6:"231231";s:18:"\0*\0mothersLastName";s:3:"231";s:14:"\0*\0homeAddress";s:2:"23";s:14:"\0*\0workAddress";s:6:"123123";s:20:"\0*\0fixedNetworkPhone";s:6:"231123";s:12:"\0*\0cellPhone";s:3:"123";s:8:"\0*\0email";s:15:"adasd@gmail.com";s:21:"\0*\0accountOpeningDate";O:8:"DateTime":3:{s:4:"date";s:26:"2014-02-03 00:00:00.000000";s:13:"timezone_type";i:3;s:8:"timezone";s:16:"America/Santiago";}s:16:"\0*\0accountNumber";i:123;s:19:"\0*\0authorizedCredit";s:6:"123123";s:20:"\0*\0paymentDateAgreed";O:8:"DateTime":3:{s:4:"date";s:26:"2013-01-01 00:00:00.000000";s:13:"timezone_type";i:3;s:8:"timezone";s:16:"America/Santiago";}s:14:"\0*\0totalCharge";s:3:"123";s:15:"\0*\0totalDeposit";s:3:"123";s:9:"\0*\0status";s:13:"status.active";}}', 'detail.sale');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movements`
--

CREATE TABLE `movements` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `rode` int(11) DEFAULT NULL,
  `date_movement` date DEFAULT NULL,
  `paid_form` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `movement_type` int(11) DEFAULT NULL,
  `collector_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `document_number_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `movements`
--

INSERT INTO `movements` (`id`, `seller_id`, `rode`, `date_movement`, `paid_form`, `movement_type`, `collector_id`, `client_id`, `document_number_id`) VALUES
(5, 6, 66755, '2017-01-15', 'payment.debit', 2, 13, 18, 15),
(6, 7, 123123123, '2017-01-15', 'cash.payment', 1, 14, 19, 15),
(7, 8, 1224498, '2017-01-15', 'cash.payment', 2, 15, 20, 15),
(8, 9, 376, '2017-01-15', 'cash.payment', 1, 16, 22, 17),
(9, 10, 160000000, '2017-01-15', 'cash.payment', 2, 17, 23, 15),
(10, 11, 284690000, '2017-01-15', 'payment.debit', 1, 18, 24, 17),
(11, 12, 129, '2017-01-15', 'cash.payment', 2, 19, 26, 18),
(12, 13, 2147483647, '2017-01-15', 'payment.check', 2, 20, 27, 18),
(13, 14, 699489353, '2017-01-15', 'payment.credit', 1, 20, 28, 18),
(14, 15, 2147483647, '2017-01-15', 'cash.payment', 1, 20, 30, 19),
(15, 17, 698972424, '2017-01-15', 'payment.credit', 2, 20, 32, 19),
(16, 18, 13123123, '2017-01-15', 'cash.payment', 1, 20, 33, 19),
(17, 19, -13123122, '2017-01-15', 'payment.credit', 2, 20, 34, 19),
(18, 20, 376, '2017-01-15', 'cash.payment', 1, 20, 36, 20),
(19, 21, 90000, '2017-01-15', 'cash.payment', 2, 20, 37, 20),
(20, 22, 700000, '2017-01-15', 'payment.credit', 2, 20, 38, 20),
(21, 6, 2234, '2017-01-15', 'cash.payment', 2, 20, 39, 20),
(22, 6, 66, '2017-01-15', 'payment.check', 1, 20, 40, 20),
(23, 6, 12, '2017-01-15', 'payment.credit', 1, 20, 41, 20);

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
('93d4478a-dab7-11e6-8f37-c4b301b7a691', 6, '123123', 1231, '25617972', 'status.good', 6, '23123'),
('a0138524-dab7-11e6-8f37-c4b301b7a691', 7, '123123', 1231, '25617972', 'status.good', 7, '23123'),
('ac4ee5fe-da03-11e6-8f37-c4b301b7a691', 5, '12312', 3123123, '1231', 'status.good', 5, '2312312'),
('bab3fd32-dab7-11e6-8f37-c4b301b7a691', 8, '123123', 1231, '25617972', 'status.good', 8, '23123'),
('d9891662-daca-11e6-8f37-c4b301b7a691', 9, '213', 123123, '13643345816', 'status.good', 9, '123123'),
('fd2d918a-da00-11e6-8f37-c4b301b7a691', 2, '12312', 3123123, '1231', 'status.good', 2, '2312312');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `record`
--

CREATE TABLE `record` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `amount_total_debt` decimal(30,0) DEFAULT NULL,
  `last_payment_date` date DEFAULT NULL,
  `document_pending_payment_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `record`
--

INSERT INTO `record` (`id`, `customer_id`, `seller_id`, `amount_total_debt`, `last_payment_date`, `document_pending_payment_id`) VALUES
(3, 32, 17, '1', '2017-01-15', 19),
(4, 36, 20, '284698790000', '2017-01-15', 20),
(5, 37, 21, '284698700000', '2017-01-15', 20),
(6, 38, 22, '284698000000', '2017-01-15', 20),
(7, 39, 6, '284697997766', '2017-01-15', 20),
(8, 40, 6, '284697997700', '2017-01-15', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sellers`
--

CREATE TABLE `sellers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `percentage_commission` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `sellers`
--

INSERT INTO `sellers` (`id`, `user_id`, `percentage_commission`) VALUES
(6, 16, NULL),
(7, 16, NULL),
(8, 16, NULL),
(9, 16, NULL),
(10, 16, NULL),
(11, 16, NULL),
(12, 16, NULL),
(13, 16, NULL),
(14, 16, NULL),
(15, 16, NULL),
(17, 16, NULL),
(18, 16, NULL),
(19, 16, NULL),
(20, 16, NULL),
(21, 16, NULL),
(22, 16, NULL);

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
(5, '1asasd', '123123'),
(6, 'asdas', 'dasd'),
(7, 'asdas', 'dasd'),
(8, 'asdas', 'dasd'),
(9, '123123', 'sd123');

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
  `rut` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mothers_last_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `rut`, `name`, `last_name`, `mothers_last_name`, `status`) VALUES
(15, 'adminGeneral', 'admingeneral', 'sistema@gmail.com', 'sistema@gmail.com', 1, '7Yg3RJgKldbHOgCxAcv7s3Kz3uimV.HdOCXS2vN0Qj0', 'QMZFk5m3DxMWog8+HjNiQO2oXDQwvRMbTiczvKHOPh2+82u5GDkMPKneFt3kX+rggN+TdFL1Aelnsc1yI3Ui3w==', '2017-01-15 21:21:53', NULL, NULL, 'a:1:{i:0;s:18:"ROLE_ADMIN_GENERAL";}', 23283822, 'Administrador', 'General', 'Sistema', 'status.active'),
(16, 'vendedor', 'vendedor', 'steven@gmail.com', 'steven@gmail.com', 1, 'bC0628Dyy.zaqnq4O9Jq9io0VIUrLKdjfIdSxthP9kY', 'qJAmbYKr9+AM/4NqoamdGCWxy/4MeMh1DxGMfJovamLCoK5s1froy+DNFkyNZgBj9ZvFA5EYyJUQTu2TpGGT3A==', '2017-01-15 21:22:11', NULL, NULL, 'a:1:{i:0;s:13:"ROLE_VENDEDOR";}', 22755862, 'Steven', 'Delgado', 'Chacón', 'status.active'),
(20, 'cobrador', 'cobrador', 'cobrador@gmail.com', 'cobrador@gmail.com', 1, 'Qf8AbDfqmaHf57bBVbfGHV7r2Hr5wvQK7uipDnRaQME', 'r44Qyp8xMlUX0VD9UBJZec5lZEIEXVECoijGR4a/MqXPWk8Ux0qyu/W7hpJgI+2gDrPDAFQhYylaHNK5CtMgbA==', '2017-01-15 20:28:03', NULL, NULL, 'a:1:{i:0;s:13:"ROLE_COBRADOR";}', 18902483, 'Cobrador', 'Test', 'Test', 'status.active'),
(21, 'gerenteVentas', 'gerenteventas', 'dadasd@gmail.com', 'dadasd@gmail.com', 1, 'iIAWiOIF8MzxaEVaLRFrMu9Ulx/KhUkh87tY/uMKsCI', 'k8AOofiMSvMMiH96aNxsrFiDeTMGoUdAyAhMm7rhc5ubcPQdqE3shGMkOLOlzJBsSVn4HbWb6bW4WdO42RvngQ==', '2017-01-15 20:16:15', NULL, NULL, 'a:1:{i:0;s:19:"ROLE_GERENTE_VENTAS";}', 23123123, 'adadasd', 'asdasd', 'asdas', 'status.active'),
(22, 'gerenteFinanzas', 'gerentefinanzas', 'asdasasd@gmail.com', 'asdasasd@gmail.com', 1, 'uB59sT4Vc.8UgiBWu5DwUrNMsR.45xcdn/YgVmN0fEk', 'pJZqABHMtvnbUo7+DWIIaMdeFHOHnyrUAk5+/62wYBhYT3XvV/72EyZBUuj3/TNFGufO+4r/SraKpK+vl9hGqA==', '2017-01-15 20:34:27', NULL, NULL, 'a:1:{i:0;s:21:"ROLE_GERENTE_FINANZAS";}', 1231212, '3123123', 'saasdada', 'asdasas', 'status.active');

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
  ADD KEY `IDX_64AA1945A76ED395` (`user_id`);

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movements`
--
ALTER TABLE `movements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_382375218DE820D9` (`seller_id`),
  ADD KEY `IDX_38237521670BAFFE` (`collector_id`),
  ADD KEY `IDX_3823752119EB6921` (`client_id`),
  ADD KEY `IDX_382375212299F6B1` (`document_number_id`);

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
  ADD KEY `IDX_9B349F919395C3F3` (`customer_id`),
  ADD KEY `IDX_9B349F918DE820D9` (`seller_id`),
  ADD KEY `IDX_9B349F91723CDDED` (`document_pending_payment_id`);

--
-- Indices de la tabla `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_AFFE6BEFA76ED395` (`user_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `collectors`
--
ALTER TABLE `collectors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT de la tabla `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `movements`
--
ALTER TABLE `movements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `record`
--
ALTER TABLE `record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `collectors`
--
ALTER TABLE `collectors`
  ADD CONSTRAINT `FK_64AA1945A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `movements`
--
ALTER TABLE `movements`
  ADD CONSTRAINT `FK_3823752119EB6921` FOREIGN KEY (`client_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_382375212299F6B1` FOREIGN KEY (`document_number_id`) REFERENCES `details` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_38237521670BAFFE` FOREIGN KEY (`collector_id`) REFERENCES `collectors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_382375218DE820D9` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `FK_9B349F91723CDDED` FOREIGN KEY (`document_pending_payment_id`) REFERENCES `details` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_9B349F918DE820D9` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_9B349F919395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sellers`
--
ALTER TABLE `sellers`
  ADD CONSTRAINT `FK_AFFE6BEFA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
