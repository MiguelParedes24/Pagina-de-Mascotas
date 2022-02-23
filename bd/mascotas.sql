-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-02-2022 a las 14:57:55
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mascotas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animalitos`
--

CREATE TABLE `animalitos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `aporte` decimal(12,2) DEFAULT NULL,
  `imagen` varchar(100) NOT NULL,
  `perdido` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `animalitos`
--

INSERT INTO `animalitos` (`id`, `nombre`, `descripcion`, `aporte`, `imagen`, `perdido`) VALUES
(1, 'Lola', 'Lola es una perrita muy bonita', '100.00', 'foto1.jpg', 0),
(2, 'Sofia', 'Sofia es una gatita muy linda', '200.00', 'foto2.jpg', 1),
(3, 'Pelusa', 'Pelusa es una perrita muy cariñosa', '300.00', 'foto3.jpg', 0),
(4, 'Nala', 'Nala es una perrita muy chillona', '400.00', 'foto4.jpg', 1),
(5, 'Newton', 'Perro muy demandante', '200.00', 'foto5.jpg', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `nombre`, `descripcion`, `imagen`) VALUES
(1, 'noticia 1', '...descripcion', 'noticia1.jpg'),
(2, 'noticia 2', '...descripcion', 'noticia2.jpg'),
(3, 'noticia 3', '...descripcion', 'noticia3.jpg'),
(4, 'noticia 4', '...descripcion', 'noticia4.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `perfil` int(1) NOT NULL,
  `avatar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `password`, `perfil`, `avatar`) VALUES
(1, 'Miguel', 'Paredes', 'miguel_arg@live.com', '$2y$10$EDerx.x8gE8WEvVkWZGmsOXAg0AexLyEFdZJ.RXAy5zQw3/ODDZhu', 1, 'avatar-61b3681c41d3a.jpg'),
(2, 'Miguel', 'Paredes', 'trimexdn34@gmail.com', '$2y$10$4N/3BDeZohv.XgctZrh3FOewG3MvRIkVe/DRkL/4bU8sCe/b1iXFC', 0, 'avatar-61b665a0080da.jpg'),
(3, 'Maria', 'Lopez', 'mar@gmail.com', '$2y$10$Z.kI9xU4Cc3sR0BG4dP5fu8ggSIXERLffiwWmfJgNqJvoTaGO0yD6', 1, 'avatar-61b676e830bfe.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `animalitos`
--
ALTER TABLE `animalitos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `animalitos`
--
ALTER TABLE `animalitos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
