-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-02-2021 a las 11:41:08
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `php-mvc-pattern-basics`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artists`
--

CREATE TABLE `artists` (
  `artist_id` int(4) NOT NULL,
  `artist_name` varchar(30) NOT NULL,
  `picture` varchar(150) NOT NULL,
  `info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artist_song`
--

CREATE TABLE `artist_song` (
  `song_id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `songs`
--

CREATE TABLE `songs` (
  `song_id` int(4) NOT NULL,
  `song_name` varchar(50) NOT NULL,
  `cover` varchar(250) NOT NULL,
  `src` varchar(100) NOT NULL,
  `album` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`artist_id`),
  ADD UNIQUE KEY `artist_id` (`artist_id`);

--
-- Indices de la tabla `artist_song`
--
ALTER TABLE `artist_song`
  ADD PRIMARY KEY (`song_id`,`artist_id`);

--
-- Indices de la tabla `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`song_id`),
  ADD UNIQUE KEY `song_id` (`song_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `artists`
--
ALTER TABLE `artists`
  MODIFY `artist_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `songs`
--
ALTER TABLE `songs`
  MODIFY `song_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
