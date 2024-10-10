-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2024 a las 05:22:17
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_ropa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `pais_origen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `nombre`, `pais_origen`) VALUES
(1, 'Nike', 'USA'),
(2, 'Adidas', 'Germany'),
(3, 'Puma', 'Germany'),
(4, 'Reebok', 'UK'),
(5, 'Under Armour', 'USA');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `marcas_con_ventas`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `marcas_con_ventas` (
`nombre` varchar(255)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prendas`
--

CREATE TABLE `prendas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `marca_id` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `prendas`
--

INSERT INTO `prendas` (`id`, `nombre`, `marca_id`, `stock`, `precio`) VALUES
(1, 'Camiseta Nike', 1, 60, 25.50),
(2, 'Pantalones Adidas', 2, 50, 40.00),
(3, 'Zapatillas Puma', 3, 30, 60.00),
(4, 'Sudadera Reebok', 4, 20, 55.00),
(5, 'Leggings Under Armour', 5, 75, 35.00);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `prendas_vendidas_y_stock`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `prendas_vendidas_y_stock` (
`nombre` varchar(255)
,`total_vendido` decimal(32,0)
,`stock` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `top_5_marcas_vendidas`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `top_5_marcas_vendidas` (
`nombre` varchar(255)
,`total_ventas` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `prenda_id` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `prenda_id`, `fecha`, `cantidad`) VALUES
(1, 1, '2024-10-01', 10),
(2, 2, '2024-10-01', 5),
(3, 3, '2024-10-02', 2),
(4, 4, '2024-10-02', 1);

-- --------------------------------------------------------

--
-- Estructura para la vista `marcas_con_ventas`
--
DROP TABLE IF EXISTS `marcas_con_ventas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `marcas_con_ventas`  AS SELECT DISTINCT `m`.`nombre` AS `nombre` FROM ((`marcas` `m` join `prendas` `p` on(`m`.`id` = `p`.`marca_id`)) join `ventas` `v` on(`p`.`id` = `v`.`prenda_id`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `prendas_vendidas_y_stock`
--
DROP TABLE IF EXISTS `prendas_vendidas_y_stock`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `prendas_vendidas_y_stock`  AS SELECT `p`.`nombre` AS `nombre`, sum(`v`.`cantidad`) AS `total_vendido`, `p`.`stock` AS `stock` FROM (`prendas` `p` join `ventas` `v` on(`p`.`id` = `v`.`prenda_id`)) GROUP BY `p`.`nombre`, `p`.`stock` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `top_5_marcas_vendidas`
--
DROP TABLE IF EXISTS `top_5_marcas_vendidas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `top_5_marcas_vendidas`  AS SELECT `m`.`nombre` AS `nombre`, sum(`v`.`cantidad`) AS `total_ventas` FROM ((`marcas` `m` join `prendas` `p` on(`m`.`id` = `p`.`marca_id`)) join `ventas` `v` on(`p`.`id` = `v`.`prenda_id`)) GROUP BY `m`.`nombre` ORDER BY sum(`v`.`cantidad`) DESC LIMIT 0, 5 ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prendas`
--
ALTER TABLE `prendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marca_id` (`marca_id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prenda_id` (`prenda_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `prendas`
--
ALTER TABLE `prendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `prendas`
--
ALTER TABLE `prendas`
  ADD CONSTRAINT `prendas_ibfk_1` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`prenda_id`) REFERENCES `prendas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
