-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2023 a las 15:22:39
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `actividad_bodega`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso`
--

CREATE TABLE `ingreso` (
  `id_Ingreso` varchar(20) NOT NULL,
  `nom_Distribuidor` varchar(30) NOT NULL,
  `tel_Distribuidor` varchar(30) NOT NULL,
  `id_Producto` varchar(20) NOT NULL,
  `cantidad_Ingresada` int(11) NOT NULL,
  `fecha_Ingreso` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ingreso`
--

INSERT INTO `ingreso` (`id_Ingreso`, `nom_Distribuidor`, `tel_Distribuidor`, `id_Producto`, `cantidad_Ingresada`, `fecha_Ingreso`) VALUES
('D001', 'Bavaria', '3130000000', 'C001', 30, '2023-11-20'),
('D002', 'Bavaria', '3130000000', 'C002', 50, '2023-11-20'),
('D003', 'Bavaria', '3130000000', 'C003', 40, '2023-11-20'),
('D004', 'Bavaria', '3130000000', 'C004', 40, '2023-11-20'),
('D005', 'Bavaria', '123456789', 'C005', 15, '2023-11-21'),
('D006', 'Bavaria', '123456789', 'C006', 15, '2023-11-21'),
('D007', 'Bavaria', '123456789', 'C007', 20, '2023-11-21'),
('D008', 'Bavaria', '12344435', 'C003', 5, '2023-11-22'),
('D009', 'Bavaria', '12344435', 'C003', 5, '2023-11-22'),
('D010', 'Bavaria', '00000000', 'C008', 20, '2023-11-22'),
('D011', 'Bavaria', '00000000', 'C008', 15, '2023-11-23'),
('D012', 'Bavaria', '00000000', 'C008', 16, '2023-11-24'),
('D013', 'Bavaria', '00000000', 'C008', 20, '2023-11-25'),
('D014', 'Bavaria', '00000000', 'C008', 40, '2023-11-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_Producto` varchar(20) NOT NULL,
  `nom_Producto` varchar(30) NOT NULL,
  `precio_Producto` varchar(30) NOT NULL,
  `cantidad_Producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_Producto`, `nom_Producto`, `precio_Producto`, `cantidad_Producto`) VALUES
('C001', 'Cerveza Poker', '2000', 10),
('C002', 'Cerveza Aguila', '2500', 20),
('C003', 'Cerveza Budweiser', '3000', 25),
('C004', 'Cerveza Corona', '3500', 15),
('C005', 'Cerveza Costeña', '3800', 30),
('C006', 'Cerveza TKT', '3600', 30),
('C007', 'Cerbeza Club Colombia Gold', '4100', 15),
('C008', 'Cerveza X', '2000', -26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_Venta` varchar(20) NOT NULL,
  `id_Producto` varchar(20) NOT NULL,
  `cantidad_Venta` int(11) NOT NULL,
  `total_Venta` int(11) NOT NULL,
  `fecha_Venta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_Venta`, `id_Producto`, `cantidad_Venta`, `total_Venta`, `fecha_Venta`) VALUES
('V001', 'C001', 20, 40000, '2023-11-20'),
('V002', 'C002', 30, 75000, '2023-11-20'),
('V003', 'C003', 25, 75000, '2023-11-20'),
('V004', 'C004', 10, 35000, '2023-11-20'),
('V005', 'C004', 15, 100, '2023-11-21'),
('V006', 'C005', 5, 95, '2023-11-21'),
('V007', 'C007', 10, 120, '2023-11-21'),
('V008', 'C008', 80, 120, '2023-11-27'),
('V009', 'C008', 5, 30, '2023-11-28'),
('V010', 'C008', 2, 10, '2023-11-29'),
('V011', 'C008', 100, 300, '2023-11-30');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD PRIMARY KEY (`id_Ingreso`),
  ADD KEY `id_Producto` (`id_Producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_Producto`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_Venta`),
  ADD KEY `id_Producto` (`id_Producto`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD CONSTRAINT `ingreso_ibfk_1` FOREIGN KEY (`id_Producto`) REFERENCES `productos` (`id_Producto`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_Producto`) REFERENCES `productos` (`id_Producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
