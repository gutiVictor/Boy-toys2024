-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-07-2024 a las 00:11:53
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
-- Base de datos: `empaques`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendaempaques`
--

CREATE TABLE `tiendaempaques` (
  `id` int(11) NOT NULL,
  `referencias` varchar(255) NOT NULL,
  `des_Item` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `num-caja` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tiendaempaques`
--

INSERT INTO `tiendaempaques` (`id`, `referencias`, `des_Item`, `cantidad`, `num-caja`, `fecha_registro`) VALUES
(1, '6672362', 'carro', 1, 2, '2024-07-19 16:52:53');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tiendaempaques`
--
ALTER TABLE `tiendaempaques`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tiendaempaques`
--
ALTER TABLE `tiendaempaques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
