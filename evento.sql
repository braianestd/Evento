-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-12-2018 a las 19:55:16
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `evento`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(200) NOT NULL,
  `Detalhe` text NOT NULL,
  `DataeHora` datetime NOT NULL,
  `local` varchar(200) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`ID`, `Nome`, `Detalhe`, `DataeHora`, `local`, `id_user`) VALUES
(1, 'Casamiento', 'Nos casamos ', '2018-12-12 08:00:00', 'Liceo Rivera Chico', 0),
(2, 'PROYECTO X', 'Te invitamos a una fiesta inolvidable,donde los limites no existen.', '2018-12-19 22:30:00', 'Club Telegrafo', 0),
(3, 'Boda', 'Veni a participar de la mejor boda', '2018-12-22 00:00:00', 'Club Bulevard', 0),
(4, 'Aniversario', 'Veni a participar del aniversario mas porrada ', '2018-12-28 04:00:00', 'Club Telegrafo', 0),
(5, 'Bodas de Oro', 'Boda de Adrian & Leticia', '2018-12-27 18:31:00', 'Club Uruguay', 1),
(6, 'Bailable', 'Baile de Favela', '2018-12-06 00:00:00', 'Club Chacarita Party', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitacion`
--

CREATE TABLE `invitacion` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(200) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `cod_event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `invitacion`
--

INSERT INTO `invitacion` (`ID`, `Nome`, `Email`, `cod_event`) VALUES
(1, 'Braulio', 'braulio@gmail.com', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `loja`
--

CREATE TABLE `loja` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `loja`
--

INSERT INTO `loja` (`ID`, `Nome`) VALUES
(1, 'Zapatodos'),
(2, 'Tienda Fitness'),
(3, 'Augusto Modas'),
(4, 'Righi'),
(5, 'Magazine Luiza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regalos`
--

CREATE TABLE `regalos` (
  `ID` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `Imagem` varchar(150) DEFAULT NULL,
  `id_loja` int(10) NOT NULL,
  `id_evento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `regalos`
--

INSERT INTO `regalos` (`ID`, `nome`, `Imagem`, `id_loja`, `id_evento`) VALUES
(9, 'Blusa Regata', 'blusa.jpg', 5, 4),
(10, 'Tenis Fila', 'tenis.png', 3, 6),
(11, 'Blusa Sport', 'blusas.png', 4, 2),
(12, 'Chaqueta', 'vaquero.jpg', 2, 5),
(13, 'Collar Diamante', 'collar.png', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teme`
--

CREATE TABLE `teme` (
  `cod_event` int(11) DEFAULT NULL,
  `cod_reg` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temr`
--

CREATE TABLE `temr` (
  `cod_loj` int(11) DEFAULT NULL,
  `cod_reg` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(70) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Senha` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `emailconfirm` tinyint(4) NOT NULL,
  `token` varchar(10) NOT NULL,
  `Imagem` varchar(500) NOT NULL,
  `tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Nome`, `Email`, `Senha`, `emailconfirm`, `token`, `Imagem`, `tipo`) VALUES
(1, 'Braian', 'braian@gmail.com', '$2y$10$zWjuAsfE8dfwp3wl.LdV9eTs03Sxz8Z7HUriE1dbW3OFStJu1mfIm', 1, '', 's1.png', 'Administrador'),
(2, 'Bruceli', 'bruce@gmail.com', '$2y$10$afAPjk/yxm3EdTZDGgk7iOB4rzAMWWzK.Es61KsgAxdzjyEv/efVS', 1, '6K0TDlX(bQ', 's2.png', 'Administrador'),
(4, 'Douglas', 'doug@gmaill.com', 'doug', 1, '', 's6.png', 'Administrador'),
(5, 'Celeste', 'lacteos@gmail.com', '$2y$10$Zx.a2bJ7nmFANEJLLu6FLOeyYkPuw10LqS88b5Gc2PtO46JleqRpu', 1, 'lAeCI*tdr)', 's5.png', 'Administrador'),
(6, 'Bruno', 'bruno@gmail.com', '$2y$10$j0TZabAVP/Og7NUEbQJbaugrcs9VrqZqTXQd6h6RLKibm1ytw93Se', 1, 'Ls$wVke0xJ', 's4.png', 'Administrador'),
(7, 'Lucelia', 'luceliaif@ifsul.edu.uy', '$2y$10$4zRfyJrVAGXv4lwJLtFLmufJy9tUax6qHtypQNf5wIMiLuYTt5bFm', 1, '7SEi6x9fqd', 's3.png', 'Administrador'),
(8, 'Antony', 'antony@gmail.com', '$2y$10$kR616mlLzConZHJg1dhnQOOu65s59J8xQwdifRCGDhXzDNyM/rHe2', 1, 'Wy54$*qpTc', 's8.png', 'Administrador'),
(9, 'Everton', 'everton@ifsul.edu.uy', '$2y$10$G/VKfdfrYwZwAo4p50fwnejFo2gezCr.zbfizW..myyDprjVOGBRi', 1, 'zbtBmCU0fw', 's7.png', 'Administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `invitacion`
--
ALTER TABLE `invitacion`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `cod_event` (`cod_event`);

--
-- Indices de la tabla `loja`
--
ALTER TABLE `loja`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `regalos`
--
ALTER TABLE `regalos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_loja` (`id_loja`),
  ADD KEY `id_evento` (`id_evento`);

--
-- Indices de la tabla `teme`
--
ALTER TABLE `teme`
  ADD KEY `cod_event` (`cod_event`),
  ADD KEY `cod_reg` (`cod_reg`);

--
-- Indices de la tabla `temr`
--
ALTER TABLE `temr`
  ADD KEY `cod_loj` (`cod_loj`),
  ADD KEY `cod_reg` (`cod_reg`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `invitacion`
--
ALTER TABLE `invitacion`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `loja`
--
ALTER TABLE `loja`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `regalos`
--
ALTER TABLE `regalos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `invitacion`
--
ALTER TABLE `invitacion`
  ADD CONSTRAINT `invitacion_ibfk_1` FOREIGN KEY (`cod_event`) REFERENCES `eventos` (`ID`);

--
-- Filtros para la tabla `regalos`
--
ALTER TABLE `regalos`
  ADD CONSTRAINT `regalos_ibfk_1` FOREIGN KEY (`id_loja`) REFERENCES `loja` (`ID`),
  ADD CONSTRAINT `regalos_ibfk_2` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`ID`);

--
-- Filtros para la tabla `teme`
--
ALTER TABLE `teme`
  ADD CONSTRAINT `teme_ibfk_1` FOREIGN KEY (`cod_event`) REFERENCES `eventos` (`ID`),
  ADD CONSTRAINT `teme_ibfk_2` FOREIGN KEY (`cod_reg`) REFERENCES `regalos` (`ID`);

--
-- Filtros para la tabla `temr`
--
ALTER TABLE `temr`
  ADD CONSTRAINT `temr_ibfk_1` FOREIGN KEY (`cod_loj`) REFERENCES `loja` (`ID`),
  ADD CONSTRAINT `temr_ibfk_2` FOREIGN KEY (`cod_reg`) REFERENCES `regalos` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
