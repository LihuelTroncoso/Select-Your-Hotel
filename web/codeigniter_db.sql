-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-07-2022 a las 05:35:42
-- Versión del servidor: 8.0.25
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `codeigniter_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `idhabitaciones` int NOT NULL,
  `disponibilidad` tinyint NOT NULL DEFAULT '0',
  `hotel_idHotel` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotel`
--

CREATE TABLE `hotel` (
  `idHotel` int NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(10000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `slug` varchar(45) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `hotel`
--

INSERT INTO `hotel` (`idHotel`, `nombre`, `descripcion`, `telefono`, `slug`, `image`) VALUES
(15, 'Hotel 2', '<p>O2 HOTEL IGUAZU se sit&uacute;a en Puerto Iguaz&uacute;. Cuenta con piscina al aire libre de temporada, wi-fi gratis en zonas comunes y servicio de spa, adem&aacute;s de sauna.<br />\r\n<br />\r\nNecesitas saber:<br />\r\n&bull; Acceso a unidades por escaleras<br />\r\n&bull; Accesible para personas con movilidad reducida<br />\r\n&bull; Unidades adaptadas a personas con movilidad reducida<br />\r\n&bull; Men&uacute; apto para cel&iacute;acos<br />\r\n<br />\r\nEl alojamiento sirve diariamente el desayuno, el cual se ofrece en el restaurante. Tambi&eacute;n dispone de bar y snack bar, as&iacute; como bar en &aacute;rea de piscina. El personal de la propiedad proporcionar&aacute; servicio a la habitaci&oacute;n.<br />\r\n<br />\r\nEntre los servicios de la propiedad se encuentran servicio de masajes, estacionamiento limitado, gimnasio y recepci&oacute;n 24 hrs. Los hu&eacute;spedes tambi&eacute;n podr&aacute;n disfrutar de servicio de guarda-equipaje gratis y informaci&oacute;n tur&iacute;stica. Por un suplemento, la propiedad cuenta con servicio de lavander&iacute;a.</p>\r\n', NULL, 'hotel-2', 'hotel2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infohabitaciones`
--

CREATE TABLE `infohabitaciones` (
  `idinfoHabitaciones` int NOT NULL,
  `cuartos` int DEFAULT NULL,
  `banos` int DEFAULT NULL,
  `habitaciones_idhabitaciones` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infohotel`
--

CREATE TABLE `infohotel` (
  `idinfoHotel` int NOT NULL,
  `estacionamiento` varchar(45) DEFAULT NULL,
  `wifi` varchar(45) DEFAULT NULL,
  `lavanderia` varchar(45) DEFAULT NULL,
  `servicioHabitacion` varchar(45) DEFAULT NULL,
  `spa` varchar(45) DEFAULT NULL,
  `piscinas` varchar(45) DEFAULT NULL,
  `hotel_idHotel` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE `log` (
  `idLog` int NOT NULL,
  `date` date NOT NULL,
  `users_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `idReserva` int NOT NULL,
  `hotel_idHotel` int NOT NULL,
  `users_id` int NOT NULL,
  `dateStart` timestamp NOT NULL,
  `dateEnd` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`idReserva`, `hotel_idHotel`, `users_id`, `dateStart`, `dateEnd`) VALUES
(1, 15, 2, '2020-10-11 03:00:00', '2020-10-12 03:00:00'),
(2, 15, 2, '2022-07-07 03:00:00', '2022-07-11 03:00:00'),
(3, 15, 2, '2022-07-06 03:00:00', '2022-07-12 03:00:00'),
(4, 15, 2, '2022-07-06 03:00:00', '2022-07-10 03:00:00'),
(5, 15, 1, '2000-10-11 03:00:00', '2000-10-12 03:00:00'),
(6, 15, 3, '2022-07-07 03:00:00', '2022-07-11 03:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int NOT NULL,
  `dob` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `username`, `contact`, `role_id`, `dob`, `register_date`) VALUES
(1, 'Administrator', 'ynandan55@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'yadu', '12312312', 1, '1990-08-03', '2017-08-18 22:16:38'),
(2, 'lihuel', 'lihueltroncoso@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'lihuel200', '', 0, '', '2022-06-14 01:22:04'),
(3, 'lihuel', 'bermupedia@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'lihuel16', '', 0, '', '2022-07-06 02:43:21');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD PRIMARY KEY (`idhabitaciones`,`hotel_idHotel`),
  ADD KEY `fk_habitaciones_hotel1_idx` (`hotel_idHotel`);

--
-- Indices de la tabla `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`idHotel`);

--
-- Indices de la tabla `infohabitaciones`
--
ALTER TABLE `infohabitaciones`
  ADD PRIMARY KEY (`idinfoHabitaciones`,`habitaciones_idhabitaciones`),
  ADD KEY `fk_infoHabitaciones_habitaciones1_idx` (`habitaciones_idhabitaciones`);

--
-- Indices de la tabla `infohotel`
--
ALTER TABLE `infohotel`
  ADD PRIMARY KEY (`idinfoHotel`,`hotel_idHotel`),
  ADD KEY `fk_infoHotel_hotel1_idx` (`hotel_idHotel`);

--
-- Indices de la tabla `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`idLog`,`users_id`),
  ADD KEY `fk_log_users1_idx` (`users_id`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`idReserva`),
  ADD KEY `fk_hotel_has_users_users1_idx` (`users_id`),
  ADD KEY `fk_hotel_has_users_hotel1_idx` (`hotel_idHotel`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  MODIFY `idhabitaciones` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hotel`
--
ALTER TABLE `hotel`
  MODIFY `idHotel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `infohotel`
--
ALTER TABLE `infohotel`
  MODIFY `idinfoHotel` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `log`
--
ALTER TABLE `log`
  MODIFY `idLog` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `idReserva` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD CONSTRAINT `fk_habitaciones_hotel1` FOREIGN KEY (`hotel_idHotel`) REFERENCES `hotel` (`idHotel`);

--
-- Filtros para la tabla `infohabitaciones`
--
ALTER TABLE `infohabitaciones`
  ADD CONSTRAINT `fk_infoHabitaciones_habitaciones1` FOREIGN KEY (`habitaciones_idhabitaciones`) REFERENCES `habitaciones` (`idhabitaciones`);

--
-- Filtros para la tabla `infohotel`
--
ALTER TABLE `infohotel`
  ADD CONSTRAINT `fk_infoHotel_hotel1` FOREIGN KEY (`hotel_idHotel`) REFERENCES `hotel` (`idHotel`);

--
-- Filtros para la tabla `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `fk_log_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `fk_hotel_has_users_hotel1` FOREIGN KEY (`hotel_idHotel`) REFERENCES `hotel` (`idHotel`),
  ADD CONSTRAINT `fk_hotel_has_users_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
