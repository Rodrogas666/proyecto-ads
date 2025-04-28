-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 06-03-2023 a las 03:56:58
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `veterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_cita` int NOT NULL,
  `asunto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` varchar(255) NOT NULL,
  `id_cliente` int NOT NULL,
  `id_mascota` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_cita`, `asunto`, `fecha`, `estado`, `id_cliente`, `id_mascota`) VALUES
(39, 'Mi gato está orinando sangre', '2023-03-10 10:00:00', 'Not taken', 3, 33),
(40, 'Mi gato necesita un chequeo', '2023-03-14 08:00:00', 'Not taken', 3, 34),
(41, 'Mi perro se fracturó una pata ', '2023-03-07 11:00:00', 'Not taken', 2, 17),
(42, 'Le golpearon la costilla a mi perro', '2023-03-08 06:00:00', 'Not taken', 2, 35),
(43, 'No puede comer por fractura en el pico', '2023-03-06 09:00:00', 'Not taken', 1, 3),
(44, 'Mi tortuga es muy lenta', '2023-03-09 07:00:00', 'Taken', 1, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contrasenia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellido`, `correo`, `contrasenia`) VALUES
(1, 'Leandro', 'Valencia', 'quinterosmachista@gmail.com', '12345'),
(2, 'Lucas', 'Jimenez', 'machado@gmail.com', 'machado'),
(3, 'Norberto', 'Colorado', 'norberto.fenix@gmail.com', 'maritza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientemascotas`
--

CREATE TABLE `clientemascotas` (
  `id` int NOT NULL,
  `id_mascota` int NOT NULL,
  `id_cliente` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `clientemascotas`
--

INSERT INTO `clientemascotas` (`id`, `id_mascota`, `id_cliente`) VALUES
(1, 1, 2),
(2, 3, 1),
(10, 16, 1),
(11, 17, 2),
(17, 25, 2),
(23, 31, 2),
(25, 33, 3),
(26, 34, 3),
(27, 35, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `id` int NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `especie` varchar(255) NOT NULL,
  `raza` varchar(255) NOT NULL,
  `edad` int NOT NULL,
  `genero` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`id`, `nombre`, `especie`, `raza`, `edad`, `genero`) VALUES
(1, 'Zeus', 'Canino', 'Huskey', 5, 'Macho'),
(3, 'Chepe', 'Ave', 'Guacamayo', 1, 'Hembra'),
(16, 'Donatello', 'Tortuga', 'Egipcia', 2, 'Hembra'),
(17, 'Juca', 'Canino', 'Hush puppie', 3, 'Hembra'),
(25, 'Michi', 'Felino', 'Albino', 2, 'Hembra'),
(31, 'Manchitas', 'Canino', 'Pastor alemán', 1, 'Macho'),
(33, 'Pikachu', 'Felino', 'Naranja', 2, 'Macho'),
(34, 'Nyamero', 'Felino', 'Blanco', 2, 'Hembra'),
(35, 'Alfeo', 'Canino', 'Aguacatero', 9, 'Macho');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_medico`
--

CREATE TABLE `registro_medico` (
  `id` int NOT NULL,
  `examenes` text NOT NULL,
  `resultados` text NOT NULL,
  `enfermedades` text NOT NULL,
  `medicamentos` text NOT NULL,
  `id_mascota` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `registro_medico`
--

INSERT INTO `registro_medico` (`id`, `examenes`, `resultados`, `enfermedades`, `medicamentos`, `id_mascota`) VALUES
(1, '- Análisis de sangre\n- Medición de la presión\n- Análisis de orina \n- Análisis de glaucoma', '- Sangre: B+\r\n- Presión: Regular\r\n- Orina: Normal\r\n- Glaucoma: Normal', '- Hepatitis infecciosa\r\n- Gastroenteritis', '- Carprofeno\r\n- Deracoxib', 3),
(6, 'Exámen de sangre', 'B+', 'Gripe', 'Acetaminofén', 3),
(7, 'Exámen de sangre', 'B+', 'Gripe', 'Acetaminofén', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veterinario`
--

CREATE TABLE `veterinario` (
  `id` int NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contrasenia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `veterinario`
--

INSERT INTO `veterinario` (`id`, `nombre`, `apellido`, `correo`, `contrasenia`) VALUES
(1, 'Juan ', 'Quinteros', 'quinterosaraujo@gmail.com', 'sofia123'),
(2, 'José ', 'Luis', 'joseluis@gmail.com', 'ligando'),
(3, 'Ferchofloo', 'Jímenez', 'fercho@gmail.com', 'apexlegends');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veterinariocitas`
--

CREATE TABLE `veterinariocitas` (
  `id` int NOT NULL,
  `id_veterinario` int NOT NULL,
  `id_cita` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `veterinariocitas`
--

INSERT INTO `veterinariocitas` (`id`, `id_veterinario`, `id_cita`) VALUES
(14, 2, 44);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_mascota` (`id_mascota`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientemascotas`
--
ALTER TABLE `clientemascotas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mascota` (`id_mascota`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro_medico`
--
ALTER TABLE `registro_medico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mascota` (`id_mascota`);

--
-- Indices de la tabla `veterinario`
--
ALTER TABLE `veterinario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `veterinariocitas`
--
ALTER TABLE `veterinariocitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_veterinario` (`id_veterinario`),
  ADD KEY `id_cita` (`id_cita`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_cita` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientemascotas`
--
ALTER TABLE `clientemascotas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `registro_medico`
--
ALTER TABLE `registro_medico`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `veterinario`
--
ALTER TABLE `veterinario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `veterinariocitas`
--
ALTER TABLE `veterinariocitas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_3` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `citas_ibfk_4` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clientemascotas`
--
ALTER TABLE `clientemascotas`
  ADD CONSTRAINT `clientemascotas_ibfk_1` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clientemascotas_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `registro_medico`
--
ALTER TABLE `registro_medico`
  ADD CONSTRAINT `registro_medico_ibfk_1` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `veterinariocitas`
--
ALTER TABLE `veterinariocitas`
  ADD CONSTRAINT `veterinariocitas_ibfk_1` FOREIGN KEY (`id_veterinario`) REFERENCES `veterinario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `veterinariocitas_ibfk_2` FOREIGN KEY (`id_cita`) REFERENCES `citas` (`id_cita`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
