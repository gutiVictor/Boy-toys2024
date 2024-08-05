-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-08-2024 a las 16:05:01
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

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
(1, '3', '3', 1, 3, '2024-07-25 05:00:00', '3'),
(2, '7770023', 'DEF5678', 2, 2, '2024-07-25 05:00:00', 'REF003'),
(3, '7770023', 'DEF5678', 1, 1, '2024-07-25 05:00:00', 'REF003'),
(4, '7770022', 'ABC1234', 1, 3, '2024-07-25 05:00:00', 'REF002'),
(5, '7770022', 'ABC1234', 1, 5, '2024-07-25 05:00:00', 'REF002'),
(6, '121321', 'CAMIONETA', 1, 8, '2024-07-25 05:00:00', 'VVVV'),
(7, '121321', 'Descripción no encontrada', 2, 2, '2024-07-25 05:00:00', 'REF003'),
(8, '7770022', 'ABC1234', 1, 9, '2024-07-25 05:00:00', 'REF002'),
(9, '7770021', 'carros de supermercado', 1, 8, '2024-07-25 05:00:00', 'REF001'),
(10, '7770022', 'muñecos leon', 1, 4, '2024-07-25 05:00:00', 'REF002'),
(11, '7770023', 'Biciclestas', 1, 2, '2024-07-25 05:00:00', 'REF003'),
(12, '7770023', 'trenes', 6, 1, '2024-07-26 05:00:00', 'REF003'),
(13, '121321', 'Descripción no encontrada', 6, 2, '2024-07-26 05:00:00', '12'),
(14, '121321', '123', 2, 2, '2024-07-26 05:00:00', 'tiywet'),
(15, '7770023', 'trenes', 1, 2, '2024-07-26 05:00:00', 'REF003'),
(16, 'REF003', 'Descripción no encontrada', 1, 1, '2024-07-26 05:00:00', 'undefined'),
(17, '7770023', 'trenes 2', 2, 1, '2024-07-26 05:00:00', 'REF003'),
(18, '77777', '007 ', 1, 7, '2024-07-26 05:00:00', 'golden '),
(19, '7770022', 'muñecos leon', 1, 10, '2024-07-26 05:00:00', 'REF002'),
(20, '7770023', 'trenes', 112, 1, '2024-07-29 05:00:00', 'REF003'),
(21, '7770023', 'trenes', 2, 2, '2024-07-29 05:00:00', 'REF003'),
(22, '7770023', 'trenes', 2, 2, '2024-07-29 05:00:00', 'REF003'),
(23, '77700233', 'trenes', 3, 3, '2024-07-29 05:00:00', 'REF003'),
(24, '77700233', 'trenes', 1, 10, '2024-07-29 05:00:00', 'REF003'),
(25, '77700233', 'trenes', 10, 10, '2024-07-29 14:21:51', 'REF003'),
(26, '77700233', 'trenes', 1, 12, '2024-07-29 17:04:29', 'REF003'),
(27, '77700233', 'trenes', 1, 13, '2024-07-29 17:05:51', 'REF003'),
(28, '630208', 'Cacarrito', 1, 12, '2024-07-29 18:55:33', 'RE0989'),
(29, '63020888888888', 'Cacarrito', 1, 14, '2024-07-29 19:24:10', 'RE09898888'),
(30, '7770026', 'Para sol', 1, 12, '2024-07-29 19:26:40', 'REF008'),
(31, '7770026', 'Para sol', 1, 22222, '2024-07-29 19:55:05', 'REF008'),
(32, '630001', 'Muñecas porcelana', 1, 1, '2024-07-29 19:59:24', 'REF003'),
(33, '77700435', 'Tarro pintura', 1, 100, '2024-07-29 20:41:32', 'REF0987'),
(34, '77700435', 'Tarro pintura', 1, 99, '2024-07-29 20:41:42', 'REF0987'),
(35, '77700435', 'Tarro pintura', 999, 99, '2024-07-29 20:42:54', 'REF0987'),
(36, '77700435', 'Tarro pintura', 1, 1, '2024-07-30 13:20:11', 'REF0987'),
(37, '7703318111026', 'BOY TOYS TRUCK NIÑO                     ', 1, 5, '2024-08-01 19:51:41', 'CPF960-1'),
(38, '7680071', 'COMEDOR MULTIUSOS ', 1, 6, '2024-08-01 19:53:02', 'MJC0071'),
(39, '7191290', 'GLOBO M. 14 NUMERO 3 PLATA', 1, 4, '2024-08-01 19:54:20', 'SEM1290'),
(40, '7043734', 'JUEGO DE MUÑECAS DE 11.5 (CUERPO SUAVE', 1, 3, '2024-08-01 20:28:42', 'TOY3734'),
(41, '7043747', 'ELEFANTE', 1, 5, '2024-08-01 20:29:16', 'TOY3747'),
(42, '7043779', 'MAT SNAKES & LADDERS GAME', 1, 6, '2024-08-01 20:30:03', 'TOY3779'),
(43, '7043779', 'MAT SNAKES & LADDERS GAME', 1, 3, '2024-08-01 20:31:08', 'TOY3779'),
(44, '7043779', 'MAT SNAKES & LADDERS GAME', 1, 6, '2024-08-01 20:31:25', 'TOY3779'),
(45, '7043790', 'NEW GIRLS DREAM-TOURING  158 PCS', 1, 5, '2024-08-01 22:21:33', 'TOY3790'),
(46, '7043799', 'FIRE STATION 612PCS', 1, 5, '2024-08-01 22:21:58', 'TOY3799'),
(47, '7043722', 'TOOL SET', 1, 2, '2024-08-02 12:45:59', 'TOY3722');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
