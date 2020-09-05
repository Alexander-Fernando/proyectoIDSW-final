-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-08-2020 a las 03:20:16
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectoidsw`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL DEFAULT '',
  `pass` varchar(200) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `pass`) VALUES
(1, 'silencer1234', '61a1fde2f2a76223ebb153f2e7e6bf0c32320974dbcdd1e50c26c07104daf229c6ffa746a2aab2ebd5c850b309df7f415844354fcc5cb5c8eb0d092f726020d0'),
(2, 'pedritoalejandro', '3069cbc81cf259bf3d432083800146e47cc0229aa71aac881f89a46d42b0d93f806c68579c113add48df7feea249935e40013ca7d8e1f30fd1e8cb901cfec318'),
(3, 'alexander', '559a0612917c8c516c7980c38b376cf2bb2387ae1b6944b3b32245ff4f2bad4d5db3811f02cff394fb62fa3feefd03e2eb83ba7bcca72a912bb87ea609c424da'),
(4, 'usuario1', '07206c75e72b03ec55879984aed4dd41af5082b9b6e1867a09ee66747e280ea85c824f9f66dc42b1fd78b811022cdb26c72450ef3c3051fc6bba331cefa4a1f2'),
(5, 'otro', '060ed6a79cfd6484090a4dedbe2d847514d7b984681b8f30f36e6070794f457a4ce1d54d74468c5d68bdb87c2005928ca8e846180c01c6845173472fedebdb89');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
