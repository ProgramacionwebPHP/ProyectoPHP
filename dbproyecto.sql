-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2020 a las 20:18:53
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbproyecto`
--
CREATE DATABASE IF NOT EXISTS `dbproyecto` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dbproyecto`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cama`
--

CREATE TABLE `cama` (
  `ID` int(11) NOT NULL,
  `Disponible` bit(1) DEFAULT NULL,
  `IDHabitacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cama`
--

INSERT INTO `cama` (`ID`, `Disponible`, `IDHabitacion`) VALUES
(1, b'0', 1),
(2, b'0', 1),
(3, b'0', 2),
(4, b'0', 3),
(5, b'0', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `ID` int(11) NOT NULL,
  `Nombre` char(15) DEFAULT NULL,
  `IDPaciente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`ID`, `Nombre`, `IDPaciente`) VALUES
(1, 'ventilador', 1),
(2, 'ventilador', 2),
(3, 'televisor', 2),
(4, 'televisor', NULL),
(5, 'xbox', 3),
(6, 'play', 5),
(7, 'play', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE `habitacion` (
  `ID` int(11) NOT NULL,
  `Disponible` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`ID`, `Disponible`) VALUES
(1, b'0'),
(2, b'0'),
(3, b'0'),
(4, b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `ID` int(11) NOT NULL,
  `Nombre` char(15) DEFAULT NULL,
  `Email` char(40) DEFAULT NULL,
  `Contraseña` char(15) DEFAULT NULL,
  `Rol` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`ID`, `Nombre`, `Email`, `Contraseña`, `Rol`) VALUES
(1, 'Johan', 'johan@gmail.com', '3DBDE697D71690A', b'1'),
(2, 'Carlos', 'carlos@gmail.com', '3DBDE697D71690A', b'0'),
(3, 'Juan', 'juan@gmail.com', '3DBDE697D71690A', b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `ID` int(11) NOT NULL,
  `IDPaciente` int(11) DEFAULT NULL,
  `IDMedico` int(11) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajesequipos`
--

CREATE TABLE `mensajesequipos` (
  `IDMensaje` int(11) DEFAULT NULL,
  `IDEquipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `ID` int(11) NOT NULL,
  `Nombre` char(15) DEFAULT NULL,
  `Diagnostico` char(15) DEFAULT NULL,
  `Prioridad` int(11) DEFAULT NULL,
  `TiempoDeDuracion` int(11) DEFAULT NULL,
  `FechaDeIngreso` date DEFAULT NULL,
  `IDHabitacion` int(11) DEFAULT NULL,
  `IDCama` int(11) DEFAULT NULL,
  `IDMedico` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`ID`, `Nombre`, `Diagnostico`, `Prioridad`, `TiempoDeDuracion`, `FechaDeIngreso`, `IDHabitacion`, `IDCama`, `IDMedico`) VALUES
(1, 'Camilo', 'Diarrea', 1, 2, '2011-03-12', 1, 1, 3),
(2, 'Carlos', 'Vomito', 3, 5, '2020-03-12', 1, 2, 2),
(3, 'Nuevo', 'sdfghbnj', 2, 8, '2020-05-25', 2, 3, 3),
(4, 'Nuevo2', 'fvghj', 2, 5, '2020-05-20', 3, 4, 3),
(5, 'Raul', 'sdfghbnj', 2, 5, '2000-03-25', 4, 5, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacienterecursos`
--

CREATE TABLE `pacienterecursos` (
  `IDRecurso` int(11) DEFAULT NULL,
  `IDPaciente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pacienterecursos`
--

INSERT INTO `pacienterecursos` (`IDRecurso`, `IDPaciente`) VALUES
(1, 1),
(1, 2),
(3, 1),
(3, 2),
(2, 1),
(4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos`
--

CREATE TABLE `recursos` (
  `ID` int(11) NOT NULL,
  `Nombre` char(15) DEFAULT NULL,
  `NumeroUnidades` int(11) DEFAULT NULL,
  `NumeroUnidadesDisponibles` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recursos`
--

INSERT INTO `recursos` (`ID`, `Nombre`, `NumeroUnidades`, `NumeroUnidadesDisponibles`) VALUES
(1, 'anestesia', 2, 0),
(2, 'desinflamatorio', 2, 1),
(3, 'unidadesDeMasca', 3, 1),
(4, 'Aspirina', 10, 9);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cama`
--
ALTER TABLE `cama`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDHabitacion` (`IDHabitacion`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDPaciente` (`IDPaciente`);

--
-- Indices de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDPaciente` (`IDPaciente`),
  ADD KEY `IDMedico` (`IDMedico`);

--
-- Indices de la tabla `mensajesequipos`
--
ALTER TABLE `mensajesequipos`
  ADD KEY `IDMensaje` (`IDMensaje`),
  ADD KEY `IDEquipo` (`IDEquipo`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDHabitacion` (`IDHabitacion`),
  ADD KEY `IDCama` (`IDCama`),
  ADD KEY `IDMedico` (`IDMedico`);

--
-- Indices de la tabla `pacienterecursos`
--
ALTER TABLE `pacienterecursos`
  ADD KEY `IDRecurso` (`IDRecurso`),
  ADD KEY `IDPaciente` (`IDPaciente`);

--
-- Indices de la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cama`
--
ALTER TABLE `cama`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `recursos`
--
ALTER TABLE `recursos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cama`
--
ALTER TABLE `cama`
  ADD CONSTRAINT `cama_ibfk_1` FOREIGN KEY (`IDHabitacion`) REFERENCES `habitacion` (`ID`);

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`IDPaciente`) REFERENCES `paciente` (`ID`);

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `mensajes_ibfk_1` FOREIGN KEY (`IDPaciente`) REFERENCES `paciente` (`ID`),
  ADD CONSTRAINT `mensajes_ibfk_2` FOREIGN KEY (`IDMedico`) REFERENCES `medico` (`ID`);

--
-- Filtros para la tabla `mensajesequipos`
--
ALTER TABLE `mensajesequipos`
  ADD CONSTRAINT `mensajesequipos_ibfk_1` FOREIGN KEY (`IDMensaje`) REFERENCES `mensajes` (`ID`),
  ADD CONSTRAINT `mensajesequipos_ibfk_2` FOREIGN KEY (`IDEquipo`) REFERENCES `equipos` (`ID`);

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`IDHabitacion`) REFERENCES `habitacion` (`ID`),
  ADD CONSTRAINT `paciente_ibfk_2` FOREIGN KEY (`IDCama`) REFERENCES `cama` (`ID`),
  ADD CONSTRAINT `paciente_ibfk_3` FOREIGN KEY (`IDMedico`) REFERENCES `medico` (`ID`);

--
-- Filtros para la tabla `pacienterecursos`
--
ALTER TABLE `pacienterecursos`
  ADD CONSTRAINT `pacienterecursos_ibfk_1` FOREIGN KEY (`IDRecurso`) REFERENCES `recursos` (`ID`),
  ADD CONSTRAINT `pacienterecursos_ibfk_2` FOREIGN KEY (`IDPaciente`) REFERENCES `paciente` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
