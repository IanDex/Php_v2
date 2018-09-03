-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-09-2018 a las 04:28:15
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_php`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario`
--

CREATE TABLE `formulario` (
  `id` int(11) NOT NULL,
  `num_proceso` varchar(8) NOT NULL,
  `descripcion` text NOT NULL,
  `sede` varchar(10) NOT NULL,
  `presupuesto` double NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `formulario`
--

INSERT INTO `formulario` (`id`, `num_proceso`, `descripcion`, `sede`, `presupuesto`, `fecha`) VALUES
(26, '12345678', 'Dolares en Pesos van 7000', 'México', 7000, '0000-00-00 00:00:00'),
(28, '12345681', 'Descripcion Nuevo Proceso 12345681', 'Perú', 2000, '2018-09-02 12:23:15'),
(32, '12345685', '12345685', 'Perú', 12345685, '2018-09-02 12:35:52'),
(33, '12345686', 'Descripcion que termina en 86 \nBogota Pr 6000', 'Bogotá', 6000, '2018-09-29 18:00:00'),
(34, '12345687', 'Datos', 'Perú', 12345687, '2018-09-02 12:38:32'),
(35, '12345688', 'Descripcion...', 'México', 5000, '2018-09-02 12:39:26'),
(36, '12345689', 'Datos de descripcion.....', 'Bogotá', 12345689, '2018-09-02 12:39:47'),
(37, '12345690', 'Proceso Creado a las 9:23 p. m.', 'Bogotá', 900000, '2018-09-02 21:22:14');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `formulario`
--
ALTER TABLE `formulario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
