-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-09-2020 a las 05:03:55
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
-- Estructura de tabla para la tabla `tbldetalleventa`
--

CREATE TABLE `tbldetalleventa` (
  `ID` int(11) NOT NULL,
  `IDVENTA` int(11) DEFAULT NULL,
  `IDPRODUCTO` int(11) DEFAULT NULL,
  `PRECIOUNITARIO` decimal(20,2) DEFAULT NULL,
  `CANTIDAD` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbldetalleventa`
--

INSERT INTO `tbldetalleventa` (`ID`, `IDVENTA`, `IDPRODUCTO`, `PRECIOUNITARIO`, `CANTIDAD`) VALUES
(19, 15, 2, '429.00', 1),
(20, 15, 4, '39.90', 1),
(21, 15, 1, '300.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproductos`
--

CREATE TABLE `tblproductos` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Precio` decimal(20,2) DEFAULT NULL,
  `Descripcion` text DEFAULT NULL,
  `Imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblproductos`
--

INSERT INTO `tblproductos` (`ID`, `Nombre`, `Precio`, `Descripcion`, `Imagen`) VALUES
(1, 'Refrigeradora 420 L', '300.00', 'This new book on PHP 7 introduces writing solid, secure, object-oriented code in the new PHP 7: you will create a complete three-tier application using a natural process of building and testing modules within each tier. This practical approach teaches you about app development and introduces PHP features when they are actually needed rather than providing you with abstract theory and contrived examples.', 'https://home.ripley.com.pe/Attachment/WOP_5/2003229251664/2003229251664_2.jpg'),
(2, 'Televisor SAMSUNG CRYSTAL UHD 50\'\' Smart TV UN50TU8000GXPE', '429.00', 'Descubre un mundo de entretenimiento innovador con el Smart TV UN50TU8000GXPE de Samsung . Este televisor cuenta con resolución 4K UHD, cuatro veces más pixeles para que puedas ver las imágenes con una nitidez y claridad sorprendentes:Ahora podrás experimentar una nueva forma de ver películas y series con imágenes más reales que te harán sentir que eres parte de la escena.¡Prepárate para el cambio con Samsung!', 'https://www.comprar.com/wp-content/uploads/2018/12/Televisor-768x487.jpg'),
(3, 'Horno Eléctrico de 40Lt, Color Silver - KOR-40MCS   DAEWOO', '299.00', 'Acabados en color inox, cavidad externa negra', 'http://s7d2.scene7.com/is/image/TottusPE/41958479?$S7Product$&amp;wid=458&amp;hei=458&amp;op_sharpen=0'),
(4, 'Casaca Color Entero Marrón S   ALL BASICS', '39.90', 'Es suave al tacto, te abriga (no es súper abrigadora pero si te mantiene en calor), para los fines que la compre me encanta. La compré en color verde y es muy bonita, tal cual se ve en la foto, la talla es exacta. Me gusta que las mangas tienen un elástico, por lo que se adecua a tu muñeca.', 'https://s7d2.scene7.com/is/image/TottusPE/42113734?$S7Product$&wid=129&hei=129&op_sharpen=0'),
(5, 'HP IMPRESORA MULTIFUNCIONAL INKTANK WIRELESS 415', '649.90', 'Imprima fácilmente grandes volúmenes con un costo por página muy bajo y obtenga una impresión móvil sencilla. Con un sistema de tinta confiable sin derrames, podrá imprimir hasta 8,000 páginas en color o 6,000 en negro y producir calidad excepcional.', 'https://home.ripley.com.pe/Attachment/WOP_5/2004210455771/2004210455771_2.jpg'),
(6, 'HUAWEI Y6P 6.3\" 64GBGB 13MP+5MP+2MP - NEGRO', '1190.00', 'Con el Huawei Y6P podrás obtener fotos con excelente detalle, gracias a su triple cámara trasera de 13MP (cámara principal) + 5MP (gran angular) y 2MP (profundidad)', 'https://home.ripley.com.pe/Attachment/WOP_5/2065253190647/2065253190647_2.jpg'),
(7, 'RIZZOLI DORMITORIO PALERMO CON CAJONES 2 PLAZAS', '899.00', '¡Llegó la hora de ponerse enforma! Ripley.com y la prestigiosa marca Oxford ponen a tu disposición todo lo nuevo de su línea Muvo, enfocada a lograr tu mejor versión', 'https://home.ripley.com.pe/Attachment/WOP_5/2064252560611/2064252560611_2.jpg'),
(8, 'MUVO BY OXFORD TROTADORA ENDURANCE 16', '1999.00', '¡Llegó la hora de ponerse enforma! Ripley.com y la prestigiosa marca Oxford ponen a tu disposición todo lo nuevo de su línea Muvo, enfocada a lograr tu mejor versión', 'https://home.ripley.com.pe/Attachment/WOP_5/2022250517259/2022250517259_2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblventas`
--

CREATE TABLE `tblventas` (
  `ID` int(11) NOT NULL,
  `ClaveTransaccion` varchar(250) NOT NULL DEFAULT '0',
  `Fecha` datetime(6) NOT NULL,
  `Correo` varchar(500) NOT NULL DEFAULT '0',
  `Total` decimal(60,2) NOT NULL DEFAULT 0.00,
  `Nombres` varchar(100) NOT NULL DEFAULT '',
  `Direccion` varchar(100) NOT NULL DEFAULT '',
  `Dni` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblventas`
--

INSERT INTO `tblventas` (`ID`, `ClaveTransaccion`, `Fecha`, `Correo`, `Total`, `Nombres`, `Direccion`, `Dni`) VALUES
(15, 'k7fj04n6926f7bupcos4406fs4', '2020-09-18 19:19:27.000000', 'otrocorreo@hotmail.com', '768.90', 'ALVARADO PARDO FRANK', 'ANGELES Y ALAMOS', 12341234);

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
(5, 'otro', '060ed6a79cfd6484090a4dedbe2d847514d7b984681b8f30f36e6070794f457a4ce1d54d74468c5d68bdb87c2005928ca8e846180c01c6845173472fedebdb89'),
(6, 'alexfernando', '9b6edae40947a901a2ba7b3ded4b361fcd5b6e6f390435c1c9f38fe724a380d4d70b42d51a195ec85eced60708d06715af1a10f0ac6375dc99356bec063adfe0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbldetalleventa`
--
ALTER TABLE `tbldetalleventa`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDVENTA` (`IDVENTA`),
  ADD KEY `IDPRODUCTO` (`IDPRODUCTO`);

--
-- Indices de la tabla `tblproductos`
--
ALTER TABLE `tblproductos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tblventas`
--
ALTER TABLE `tblventas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbldetalleventa`
--
ALTER TABLE `tbldetalleventa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `tblproductos`
--
ALTER TABLE `tblproductos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tblventas`
--
ALTER TABLE `tblventas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbldetalleventa`
--
ALTER TABLE `tbldetalleventa`
  ADD CONSTRAINT `tbldetalleventa_ibfk_1` FOREIGN KEY (`IDVENTA`) REFERENCES `tblventas` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbldetalleventa_ibfk_2` FOREIGN KEY (`IDPRODUCTO`) REFERENCES `tblproductos` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
