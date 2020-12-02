-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-10-2020 a las 17:38:13
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `empresa1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nom_categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nom_categoria`) VALUES
(0, 'Cliente'),
(1, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `dni` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nac` date NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`dni`, `nombre`, `fecha_nac`, `telefono`) VALUES
(1, 'FRANCISCO', '2001-05-12', '(221) 456 6464'),
(38, 'Fernanda España', '1998-11-24', '(234) 192-2312'),
(39, 'Aldair Sanchez', '2000-11-11', '(236) 120-6253'),
(40, 'Mike Badillo', '3211-02-23', '(234) 192-2312'),
(41, 'sebastian', '2004-05-12', '(255) 456 2546'),
(45, 'Francisco Alvarez', '2001-04-12', '(986) 456 4589');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `dni_cliente` int(11) NOT NULL,
  `codigo_producto` int(11) NOT NULL,
  `cant` int(11) NOT NULL,
  `fecha_compra` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`dni_cliente`, `codigo_producto`, `cant`, `fecha_compra`) VALUES
(28, 10, 1, '2019-08-16'),
(28, 10, 1, '2019-08-16'),
(28, 10, 1, '2019-08-16'),
(28, 888, 1, '2019-08-16'),
(28, 90, 1, '2019-08-16'),
(28, 20, 2, '2019-08-20'),
(28, 30, 1, '2019-08-20'),
(28, 20, 1, '2019-08-20'),
(28, 20, 1, '2019-08-20'),
(28, 10, 1, '2019-08-20'),
(28, 10, 1, '2019-08-20'),
(28, 10, 1, '2019-08-20'),
(28, 10, 1, '2019-08-20'),
(28, 888, 1, '2019-08-20'),
(28, 20, 1, '2019-08-20'),
(28, 10, 1, '2019-08-20'),
(28, 20, 1, '2019-08-20'),
(28, 90, 1, '2019-08-20'),
(28, 10, 1, '2019-08-20'),
(28, 20, 1, '2019-08-20'),
(28, 90, 1, '2019-08-20'),
(28, 30, 1, '2019-08-20'),
(28, 20, 1, '2019-08-20'),
(28, 10, 1, '2019-08-20'),
(36, 20, 1, '2019-08-21'),
(36, 10, 1, '2019-08-21'),
(38, 5, 1, '2019-08-21'),
(38, 1, 1, '2019-08-21'),
(38, 2, 1, '2019-08-21'),
(38, 3, 1, '2019-08-21'),
(38, 4, 1, '2019-08-21'),
(39, 1, 2, '2019-08-21'),
(39, 2, 1, '2019-08-21'),
(39, 3, 1, '2019-08-21'),
(39, 4, 1, '2019-08-21'),
(39, 5, 2, '2019-08-21'),
(28, 5, 1, '2019-08-21'),
(28, 1, 1, '2019-08-21'),
(28, 2, 1, '2019-08-21'),
(28, 3, 1, '2019-08-21'),
(28, 4, 1, '2019-08-21'),
(28, 1, 1, '2019-08-21'),
(28, 2, 1, '2019-08-21'),
(28, 3, 1, '2019-08-21'),
(28, 4, 1, '2019-08-21'),
(28, 5, 1, '2019-08-21'),
(40, 1, 1, '2019-08-21'),
(40, 1, 1, '2019-08-21'),
(40, 1, 1, '2019-08-21'),
(40, 1, 1, '2019-08-21'),
(40, 2, 1, '2019-08-21'),
(41, 2, 1, '2020-10-28'),
(41, 3, 1, '2020-10-28'),
(41, 4, 1, '2020-10-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras_temp`
--

CREATE TABLE `compras_temp` (
  `id` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `compras_temp`
--

INSERT INTO `compras_temp` (`id`, `idCliente`, `idProducto`, `cantidad`) VALUES
(5, 20, 121, 1),
(6, 20, 121, 1),
(7, 20, 301, 1),
(8, 20, 301, 1),
(9, 20, 121, 1),
(10, 26, 301, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `precio` double NOT NULL,
  `nif_proveedor` int(11) NOT NULL,
  `ruta_foto` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codigo`, `nombre`, `precio`, `nif_proveedor`, `ruta_foto`) VALUES
(1, 'Iphone 7S (128GB)', 8879, 1, '   ../Imagenes/7gb.png'),
(2, 'Iphone X (64GB)', 19999, 1, '../Imagenes/iphone-x-kf-device-tab-d-3-retina.png'),
(3, 'Iphone 8(64BG)', 13999, 1, '../Imagenes/iphone-8-plus-gris-v-211x450.png'),
(4, 'Samsung Galaxi S10(128GB)', 14399, 2, '../Imagenes/61YVqHdFRxL._SX569_.jpg'),
(5, 'Hp Envy Spectre X360', 33900, 3, '../Imagenes/5EQ43EA-ABU_9_1750x1285.jpg'),
(7896, 'ONE PLUS 9!', 10589, 123, '../Imagenes/oneplus.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `nif` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`nif`, `nombre`, `direccion`) VALUES
(1, 'Apple', 'Plaza Revolución'),
(2, 'Samsung', 'Puebla, Puebla'),
(4, 'Intel', 'Veracruz'),
(123, 'sebastian', '3 sur');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Nombre`, `Username`, `Password`, `id_categoria`) VALUES
(28, '1', '2', '$2y$10$OgvXES/Yj9a4F0fcKNM1CeedUnWqncy9VMsrB62cgIwNSxd9TKdEC', 0),
(40, 'Mike Badio', 'Perro', '$2y$10$NV9tTrw5PS87C1uZ/z7aoeOD2EnnMoJf32C29vo/w8vzt4ZKw6XyC', 0),
(41, 'sebastian', 'trifu', '$2y$10$fe2Uwj3YAa7RWET45xC8q.qMsTw0WNuU6mevRGbQQzIaljXUIIPvK', 1),
(45, 'Francisco Alvarez', 'frank', '$2y$10$azT2sYb3AySQ8sM0CGVgVOkioX6cU.CBQsZ2cAM75g3BetDoQTdaC', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `compras_temp`
--
ALTER TABLE `compras_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`nif`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras_temp`
--
ALTER TABLE `compras_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
