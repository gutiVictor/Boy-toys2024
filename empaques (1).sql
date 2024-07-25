-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-07-2024 a las 21:46:54
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
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tiendaempaques`
--

INSERT INTO `tiendaempaques` (`id`, `codigo_barras`, `des_Item`, `cantidad`, `num-caja`, `fecha_registro`) VALUES
(1, '7760166', 'MUÑECA CON PAREJA EN PLAYA ARTICULADOS', 1, 2, '2024-07-24 15:28:08'),
(2, '7760190', 'MUÑECA CON ACCESORIOS TOCADOR Y CLOSET', 1, 3, '2024-07-24 15:28:52'),
(3, '7045671', 'PLAY-DOH FÁBRICA DE DIVERSIÓN SET DE INICIO', 1, 2, '2024-07-24 15:29:24'),
(4, '7045025', 'LAT HW MONSTER TRUCKS GLOW IN THE DARK', 1, 3, '2024-07-24 15:29:39'),
(5, '7461567', 'PELUCHE OSO 30 CMS VESTIDO', 1, 3, '2024-07-24 15:29:54'),
(6, '7710139', 'PARLANTE BLUETOOTH', 1, 2, '2024-07-24 15:30:12'),
(7, '7011423', 'SET POCILLOS X2 BX60', 1, 2, '2024-07-24 15:31:38'),
(8, '7011410', 'CANGURO RIÑORERA BX30', 1, 3, '2024-07-24 15:32:07'),
(9, '7011419', 'ESPEJO CON LUZ BX20', 1, 3, '2024-07-24 15:32:19'),
(10, '7011424', 'PAPEL PARA AIR FRYER ANTIADERHENTE X50 BX80', 1, 4, '2024-07-24 15:32:36'),
(11, '7191618', 'GLOBO FOIL 16', 1, 4, '2024-07-24 15:41:45'),
(12, '7011433', 'SET DE TARROS X 2 PCS BX12', 1, 4, '2024-07-24 16:32:35'),
(13, '7011428', 'BANDEJA METALIZADA BX320', 1, 2, '2024-07-24 16:49:05'),
(14, '7011413', 'MALETA 4 SERVICIOS DIS OSO BX100', 6, 5, '2024-07-24 16:49:54'),
(15, '7011413', 'MALETA 4 SERVICIOS DIS OSO BX100', 6, 5, '2024-07-24 16:50:28'),
(16, '7011413', 'MALETA 4 SERVICIOS DIS OSO BX100', 22, 2, '2024-07-24 16:57:15'),
(17, '1213141516', 'Descripción no encontrada', 1, 2, '2024-07-24 16:58:44'),
(18, '7011410', 'CANGURO RIÑORERA BX30', 12, 23, '2024-07-24 16:59:24'),
(19, '7011416', 'ESPEJO CON LUZ Y CABLE USB BX100', 1, 6, '2024-07-24 17:00:38'),
(20, '7011419', 'ESPEJO CON LUZ BX20', 1, 3, '2024-07-24 17:09:36'),
(21, '7011417', 'ESPEJO CON PORTARRETRATO Y CABBX36', 1, 5, '2024-07-24 18:40:52'),
(22, '7011413', 'MALETA 4 SERVICIOS DIS OSO BX100', 77, 1, '2024-07-24 19:06:48'),
(23, '7011410', 'CANGURO RIÑORERA BX30', 2, 2, '2024-07-24 19:35:44'),
(24, '11222', 'Descripción no encontrada', 1, 1, '2024-07-24 19:38:53'),
(25, '7760184', 'MUÑECA SIRENA DELFIN ACCESORIOS SURTIDO', 1, 76, '2024-07-24 19:40:05'),
(26, '7760180', 'MUÑECA CON TRENZA LARGA SURTIDO', 2, 2, '2024-07-24 19:44:25');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
