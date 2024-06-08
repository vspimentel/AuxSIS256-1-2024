-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2023 a las 10:57:35
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id` int(11) NOT NULL,
  `carrera` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `carrera`) VALUES
(26, 'INFORMATICA '),
(35, 'INGENIERIA DE SISTEMAS'),
(111, 'INGENIERIA EN CIENCAS DE LA COMPUTACION\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editoriales`
--

CREATE TABLE `editoriales` (
  `id` int(11) NOT NULL,
  `editorial` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `editoriales`
--

INSERT INTO `editoriales` (`id`, `editorial`) VALUES
(1, 'Castellana'),
(2, 'Bolivia'),
(3, 'Santillana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(11) NOT NULL,
  `imagen` varchar(50) COLLATE utf8_bin NOT NULL,
  `titulo` varchar(200) COLLATE utf8_bin NOT NULL,
  `autor` varchar(200) COLLATE utf8_bin NOT NULL,
  `ideditorial` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `idcarrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `imagen`, `titulo`, `autor`, `ideditorial`, `anio`, `idusuario`, `idcarrera`) VALUES
(1, 'introduccioinformatica.jpg', 'Introduccion a la Informatica', 'Michael Miller', 2, 1992, 0, 1),
(2, 'arquitecturacomputadoras.jpg', 'Aruitectura de Computadoras', 'Patricio Quiroga', 2, 4988, 0, 1),
(3, 'CursoAndroid.jpg', 'Curso Android', 'Maestros del WEB', 1, 8777, 0, 2),
(4, 'bigdata.jpg', 'Bigdata', 'Marcombo', 2, 41, 0, 2),
(5, 'ScrumIngenieriaSoftware.jpg', 'Scrum Ingenieria de Software', 'Dario Palminio', 2, 2015, 0, 3),
(61, '6487926e142a0.png', 'Pariatur Non maxime', 'Maxime cumque pariat', 3, 95, 1, 111),
(62, '6489ad21ca7d2.png', 'Quis consectetur al', 'Ipsa esse excepteu', 1, 12, 1, 1),
(63, '648a278d4f320.png', 'Mollitia excepturi s', 'Veniam qui voluptat', 1, 39, 1, 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `id` int(11) NOT NULL,
  `idlibro` int(11) NOT NULL,
  `nombreprestamo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` smallint(6) NOT NULL,
  `usuario` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `nombrecompleto` varchar(100) COLLATE utf8_bin NOT NULL,
  `cu` varchar(10) COLLATE utf8_bin NOT NULL,
  `idcarrera` int(11) NOT NULL,
  `nivel` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `nombrecompleto`, `cu`, `idcarrera`, `nivel`) VALUES
(1, 'admin@biblioteca.usfx.bo', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Administrador sistema', '35-0', 35, 1),
(2, 'carlosmontellano@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Carlos Montellano', '35-239', 35, 0),
(3, 'Irure est explicabo', 'ce6bcac8b59ff1a91a938d76beca57ac09c926d6', 'Libero fugit esse ', 'Ipsum sint', 78, 31),
(4, 'correo', 'sha1(123)', 'Culpa quae harum ips', 'Libero nec', 0, 0),
(5, 'admin@biblioteca.usfx.bo', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Sed sint sunt expl', '', 0, 68),
(6, 'admin@biblioteca.usfx.bo', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Deleniti non sed sin', 'Ipsa et qu', 26, 0),
(7, '', '', '', '', 0, 0),
(8, 'admin@biblioteca.usfx.bo', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Debitis commodo enim', 'Eum qui au', 26, 1),
(9, 'Consequatur Et veri', '5860c9854553bfbe510ae6d0b9fc8c0406b2dfea', 'Minim non in volupta', 'Voluptate ', 90, 76);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `editoriales`
--
ALTER TABLE `editoriales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `editoriales`
--
ALTER TABLE `editoriales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
