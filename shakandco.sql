-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2023 a las 17:14:50
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `shakandco`
--
CREATE DATABASE IF NOT EXISTS `shakandco` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `shakandco`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_alumno`
--

CREATE TABLE `tbl_alumno` (
  `num_matricula` int(11) NOT NULL,
  `dni_alu` varchar(10) NOT NULL,
  `nombre_alu` varchar(50) NOT NULL,
  `apellido_alu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_alumno`
--

INSERT INTO `tbl_alumno` (`num_matricula`, `dni_alu`, `nombre_alu`, `apellido_alu`) VALUES
(123456773, '123456774Q', 'Ian', 'Romero'),
(123456774, '123456775P', 'Eric', 'Molina'),
(123456775, '123456776O', 'Oscar', 'Lopez'),
(123456776, '123456777N', 'Jinquan', 'Lin'),
(123456777, '123456778M', 'Sergio', 'Leon'),
(123456778, '123456779L', 'Manel', 'Garcia'),
(123456779, '123456780K', 'Olga', 'Clemente'),
(123456780, '123456781J', 'Ricard', 'Casals'),
(123456781, '123456782I', 'Alberto', 'Bermejo'),
(123456782, '123456782H', 'Wilson', 'Alfredo'),
(123456783, '123456783G', 'Carla', 'Maldonado'),
(123456784, '123456784F', 'Julia', 'Suarez'),
(123456785, '123456785E', 'Luca', 'Lusuardi'),
(123456786, '123456786D', 'Sergio', 'Callejas'),
(123456787, '123456787C', 'Ivan', 'Moreno'),
(123456789, '123456789A', 'Joan', 'Becerril');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_alumno_nota_assignatura`
--

CREATE TABLE `tbl_alumno_nota_assignatura` (
  `id_alumno_nota_assignatura` int(11) NOT NULL,
  `num_matricula` int(11) NOT NULL,
  `nota_alumno` decimal(4,2) NOT NULL,
  `id_assignatura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_alumno_nota_assignatura`
--

INSERT INTO `tbl_alumno_nota_assignatura` (`id_alumno_nota_assignatura`, `num_matricula`, `nota_alumno`, `id_assignatura`) VALUES
(1, 123456773, '8.50', 5),
(2, 123456773, '7.20', 3),
(3, 123456773, '7.40', 1),
(4, 123456773, '2.40', 4),
(5, 123456774, '5.30', 5),
(6, 123456774, '7.80', 3),
(7, 123456774, '0.00', 1),
(8, 123456774, '3.60', 4),
(9, 123456775, '8.90', 5),
(10, 123456775, '4.60', 3),
(11, 123456775, '1.70', 1),
(12, 123456775, '3.60', 4),
(13, 123456776, '7.50', 5),
(14, 123456776, '5.00', 3),
(15, 123456776, '1.60', 1),
(16, 123456776, '10.00', 4),
(17, 123456777, '6.00', 5),
(18, 123456777, '3.90', 3),
(19, 123456777, '9.10', 1),
(20, 123456777, '7.00', 4),
(21, 123456778, '4.50', 5),
(22, 123456778, '0.00', 3),
(23, 123456778, '2.60', 1),
(24, 123456778, '9.00', 4),
(25, 123456779, '10.00', 5),
(26, 123456779, '6.60', 3),
(27, 123456779, '7.90', 1),
(28, 123456779, '4.00', 4),
(29, 123456780, '2.00', 5),
(30, 123456780, '8.60', 3),
(31, 123456780, '4.90', 1),
(32, 123456780, '1.00', 4),
(33, 123456781, '3.00', 5),
(34, 123456781, '8.60', 3),
(35, 123456781, '4.90', 1),
(36, 123456781, '1.00', 4),
(37, 123456782, '5.00', 5),
(38, 123456782, '3.00', 3),
(39, 123456782, '10.00', 1),
(40, 123456782, '4.00', 4),
(41, 123456783, '6.00', 5),
(42, 123456783, '2.00', 3),
(43, 123456783, '8.75', 1),
(44, 123456783, '5.00', 4),
(45, 123456784, '2.00', 5),
(46, 123456784, '8.60', 3),
(47, 123456784, '4.90', 1),
(48, 123456784, '1.00', 4),
(49, 123456785, '10.00', 5),
(50, 123456785, '6.00', 3),
(51, 123456785, '9.00', 1),
(52, 123456785, '7.00', 4),
(53, 123456786, '8.00', 5),
(54, 123456786, '2.00', 3),
(55, 123456786, '1.00', 1),
(56, 123456786, '10.00', 4),
(57, 123456787, '4.00', 5),
(58, 123456787, '4.00', 3),
(59, 123456787, '7.00', 1),
(60, 123456787, '7.00', 4),
(65, 123456789, '8.00', 5),
(66, 123456789, '8.00', 3),
(67, 123456789, '1.00', 1),
(68, 123456779, '4.00', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_assignatura`
--

CREATE TABLE `tbl_assignatura` (
  `id_assignatura` int(11) NOT NULL,
  `codigo_clase` int(11) NOT NULL,
  `nombre_assignatura` varchar(50) NOT NULL,
  `profesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_assignatura`
--

INSERT INTO `tbl_assignatura` (`id_assignatura`, `codigo_clase`, `nombre_assignatura`, `profesor`) VALUES
(1, 12, 'Sintesis', 2),
(2, 7, 'Desenvolupament Web en Servidor', 2),
(3, 6, 'Desenvolupaent web en entorn client', 3),
(4, 9, 'Disseny interficies web', 1),
(5, 8, 'Servidors aplicacions web', 1),
(6, 3, 'Programacio OO', 3),
(7, 4, 'Base de dades', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_departamento`
--

CREATE TABLE `tbl_departamento` (
  `id_dep` int(11) NOT NULL,
  `nombre_dept` varchar(50) DEFAULT NULL,
  `codigo_dept` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_departamento`
--

INSERT INTO `tbl_departamento` (`id_dep`, `nombre_dept`, `codigo_dept`) VALUES
(1, 'Departamento GM (Grado Medio)', 1),
(2, 'Departamento GS (Grado Superior)', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_profesor`
--

CREATE TABLE `tbl_profesor` (
  `dni_prof` int(11) NOT NULL,
  `nombre_prof` varchar(50) NOT NULL,
  `contrasena_prof` varchar(60) NOT NULL,
  `apellido_prof` varchar(50) NOT NULL,
  `email_prof` varchar(100) NOT NULL,
  `dept_prof` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_profesor`
--

INSERT INTO `tbl_profesor` (`dni_prof`, `nombre_prof`, `contrasena_prof`, `apellido_prof`, `email_prof`, `dept_prof`) VALUES
(1, 'Agnes', '$2y$10$lY1Gw1s2WDu/CFLRstKHT./KbJ9G5KLRRMuz1r1apnINxpuRzeey6', 'Plans', 'agnes.plans@fje.edu', 2),
(2, 'Alberto', '$2y$10$lY1Gw1s2WDu/CFLRstKHT./KbJ9G5KLRRMuz1r1apnINxpuRzeey6', 'De Santos', 'alberto.santos@fje.edu', 2),
(3, 'Fatima', '$2y$10$lY1Gw1s2WDu/CFLRstKHT./KbJ9G5KLRRMuz1r1apnINxpuRzeey6', 'Martinez', 'fatima.martinez@fje.edu', 2),
(4, 'Sussana', '$2y$10$lY1Gw1s2WDu/CFLRstKHT./KbJ9G5KLRRMuz1r1apnINxpuRzeey6', 'Del Pozo', 'sussana.pozo@fje.edu', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_alumno`
--
ALTER TABLE `tbl_alumno`
  ADD PRIMARY KEY (`num_matricula`);

--
-- Indices de la tabla `tbl_alumno_nota_assignatura`
--
ALTER TABLE `tbl_alumno_nota_assignatura`
  ADD PRIMARY KEY (`id_alumno_nota_assignatura`),
  ADD KEY `fk_alumno_nota` (`num_matricula`),
  ADD KEY `fk_assignatura_nota` (`id_assignatura`);

--
-- Indices de la tabla `tbl_assignatura`
--
ALTER TABLE `tbl_assignatura`
  ADD PRIMARY KEY (`id_assignatura`),
  ADD KEY `fk_profesor` (`profesor`);

--
-- Indices de la tabla `tbl_departamento`
--
ALTER TABLE `tbl_departamento`
  ADD PRIMARY KEY (`id_dep`);

--
-- Indices de la tabla `tbl_profesor`
--
ALTER TABLE `tbl_profesor`
  ADD PRIMARY KEY (`dni_prof`),
  ADD KEY `fk_dept_prof` (`dept_prof`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_alumno`
--
ALTER TABLE `tbl_alumno`
  MODIFY `num_matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123456790;

--
-- AUTO_INCREMENT de la tabla `tbl_alumno_nota_assignatura`
--
ALTER TABLE `tbl_alumno_nota_assignatura`
  MODIFY `id_alumno_nota_assignatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT de la tabla `tbl_assignatura`
--
ALTER TABLE `tbl_assignatura`
  MODIFY `id_assignatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tbl_departamento`
--
ALTER TABLE `tbl_departamento`
  MODIFY `id_dep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_profesor`
--
ALTER TABLE `tbl_profesor`
  MODIFY `dni_prof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_alumno_nota_assignatura`
--
ALTER TABLE `tbl_alumno_nota_assignatura`
  ADD CONSTRAINT `fk_alumno_nota` FOREIGN KEY (`num_matricula`) REFERENCES `tbl_alumno` (`num_matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_assignatura_nota` FOREIGN KEY (`id_assignatura`) REFERENCES `tbl_assignatura` (`id_assignatura`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_assignatura`
--
ALTER TABLE `tbl_assignatura`
  ADD CONSTRAINT `fk_profesor` FOREIGN KEY (`profesor`) REFERENCES `tbl_profesor` (`dni_prof`);

--
-- Filtros para la tabla `tbl_profesor`
--
ALTER TABLE `tbl_profesor`
  ADD CONSTRAINT `fk_dept_prof` FOREIGN KEY (`dept_prof`) REFERENCES `tbl_departamento` (`id_dep`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
