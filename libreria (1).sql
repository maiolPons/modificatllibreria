-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-01-2023 a las 01:31:07
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `libreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `nombreUsuario` varchar(40) NOT NULL,
  `contraseña` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`nombreUsuario`, `contraseña`) VALUES
('', ''),
('admin', '0cc175b9c0f1b6a831c399e269772661');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `activo`) VALUES
(12, 'Historia', 1),
(13, 'Ciencia', 1),
(17, 'Autoayuda', 1),
(18, 'Filologia', 1),
(19, 'Filosofía', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `passwd` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `email`, `nombre`, `apellido`, `direccion`, `dni`, `passwd`) VALUES
(7, 'maiol@gmail.com', 'maiol', 'pons', 'mataro', '12345678N', '6f8f57715090da2632453988d9a1501b');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `ISBN` varchar(20) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `editorial` varchar(100) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `foto` varchar(60) NOT NULL,
  `stock` int(5) NOT NULL,
  `precioUni` int(10) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `destacado` tinyint(1) NOT NULL DEFAULT 0,
  `novedades` date NOT NULL,
  `estadoL` tinyint(1) NOT NULL DEFAULT 1,
  `favorito` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`ISBN`, `titulo`, `autor`, `editorial`, `descripcion`, `foto`, `stock`, `precioUni`, `idCategoria`, `destacado`, `novedades`, `estadoL`, `favorito`) VALUES
('9788401029813', 'En la sombra', 'Principe Harry', 'Plaza & Janes editore', 'El príncipe Harry, duque de Sussex, es marido, padre, filántropo, veterano del ejército y activista por el bienestar mental y el medioambiente. Reside en Santa Bárbara, California, con su familia y tr', 'img/sombra.jpg', 95, 10, 12, 1, '2023-01-09', 1, 1),
('9788418118036', 'Habitos Atomicos', 'James Clear', 'Planeta', 'Más de 4 millones de ejemplares vendidos en todo el mundo. Un libro fascinante que cambiará el modo en que vivimos nuestro día a día. «Sumamente práctico y útil.» MARK MANSON, autor de El sutil arte d', 'img/habitos.jpg', 100, 18, 17, 1, '2023-01-09', 1, 1),
('9788419105615', 'La llave de la atención', 'Enrique Moya', 'Sirio', 'La llave de la atención nos propone un entendimiento claro, pero sencillo y conciso de la experiencia humana. Esta llave nos hace focalizarnos e implicarnos justo en aquello que sucede momento a momen', 'img/llave.jpg', 100, 13, 17, 1, '2023-01-09', 1, 0),
('9788466242141', 'El universo', 'VV.AA.', 'Libsa', 'Imaginaos, solo por un instante, que estáis en la Prehistoria, en la piel de un hombre o una mujer de las cavernas, cuando la única fuente de polución luminosa se limitaba a un fuego que brillaba toda', 'img/universo.jpg', 100, 24, 13, 1, '2023-01-09', 1, 0),
('9788490652336', 'Diarios Completos', 'Sylvia Plath', 'Alba Editorial', 'Esta edición de los Diarios completos de Sylvia Plath incrementa en dos tercios el material de los anteriormente publicados en Estados Unidos en 1982 y en España en 1996. Entre los nuevos pasajes, se ', 'img/diarios.jpg', 100, 30, 18, 0, '2023-01-09', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineapedidos`
--

CREATE TABLE `lineapedidos` (
  `idPedido` int(11) NOT NULL,
  `ISBN` varchar(20) NOT NULL,
  `cantidad` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `fechaPeticion` date NOT NULL,
  `estado` varchar(20) NOT NULL DEFAULT 'pendiente',
  `ImporteTotal` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `idCliente`, `fechaPeticion`, `estado`, `ImporteTotal`) VALUES
(4, 7, '2023-01-09', 'pendiente', 50);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`nombreUsuario`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`,`email`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `lineapedidos`
--
ALTER TABLE `lineapedidos`
  ADD PRIMARY KEY (`idPedido`,`ISBN`) USING BTREE,
  ADD KEY `lineapedidos_ibfk_1` (`ISBN`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCliente` (`idCliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `lineapedidos`
--
ALTER TABLE `lineapedidos`
  ADD CONSTRAINT `lineapedidos_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `libros` (`ISBN`),
  ADD CONSTRAINT `lineapedidos_ibfk_3` FOREIGN KEY (`idPedido`) REFERENCES `pedidos` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
