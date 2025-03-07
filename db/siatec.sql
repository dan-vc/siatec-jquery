-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-02-2025 a las 13:18:18
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `siatec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `usuario`, `clave`, `descripcion`) VALUES
(1, 'lduran', '123', 'Usuario estandar nivel 1a'),
(2, 'lflores', '123', 'Usuario estandar nivel 2b'),
(3, 'vromero', '123', 'Usuario estandar nivel 2b'),
(4, 'wvasquez', '123', 'Usuario invitado       '),
(5, 'osanchez', '123', 'Usuario supervisor'),
(6, 'sdara', '123', 'Usuario delegado'),
(8, 'mmorales', '123456', 'Usuario delegado 2'),
(9, 'rportal', '123456', 'Usuario delegado nivel 2'),
(10, 'mpalomino', '123456', 'Usuario delegado nivel 2'),
(11, 'achiroque', '123456', 'Usuario delegado nivel 3'),
(12, 'jretuerto', '123456', 'Usuario delegado nivel 3                          '),
(16, 'jluquech', '123456', 'Usuario Administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
