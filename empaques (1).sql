-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-07-2024 a las 14:17:10
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
  `codigo_barras` varchar(255) DEFAULT NULL,
  `des_Item` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `num-caja` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `Ref` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tiendaempaques`
--

INSERT INTO `tiendaempaques` (`id`, `codigo_barras`, `des_Item`, `cantidad`, `num-caja`, `fecha_registro`, `Ref`) VALUES
(1, '3', '3', 1, 3, '2024-07-25 16:02:47', '3'),
(2, '7770023', 'DEF5678', 2, 2, '2024-07-25 16:03:58', 'REF003'),
(3, '7770023', 'DEF5678', 1, 1, '2024-07-25 16:13:12', 'REF003'),
(4, '7770022', 'ABC1234', 1, 3, '2024-07-25 16:22:32', 'REF002'),
(5, '7770022', 'ABC1234', 1, 5, '2024-07-25 16:27:07', 'REF002'),
(6, '121321', 'CAMIONETA', 1, 8, '2024-07-25 16:28:39', 'VVVV'),
(7, '121321', 'Descripción no encontrada', 2, 2, '2024-07-25 16:32:23', 'REF003'),
(8, '7770022', 'ABC1234', 1, 9, '2024-07-25 16:33:40', 'REF002'),
(9, '7770021', 'carros de supermercado', 1, 8, '2024-07-25 16:36:05', 'REF001'),
(10, '7770022', 'muñecos leon', 1, 4, '2024-07-25 16:36:15', 'REF002'),
(11, '7770023', 'Biciclestas', 1, 2, '2024-07-25 16:36:24', 'REF003'),
(12, '7770023', 'trenes', 6, 1, '2024-07-26 15:22:31', 'REF003'),
(13, '121321', 'Descripción no encontrada', 6, 2, '2024-07-26 15:27:32', '12'),
(14, '121321', '123', 2, 2, '2024-07-26 15:30:01', 'tiywet'),
(15, '7770023', 'trenes', 1, 2, '2024-07-26 15:31:47', 'REF003'),
(16, 'REF003', 'Descripción no encontrada', 1, 1, '2024-07-26 20:12:25', 'undefined'),
(17, '7770023', 'trenes 2', 2, 1, '2024-07-26 20:13:00', 'REF003'),
(18, '77777', '007 ', 1, 7, '2024-07-26 21:49:12', 'golden '),
(19, '7770022', 'muñecos leon', 1, 10, '2024-07-26 21:55:02', 'REF002');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
