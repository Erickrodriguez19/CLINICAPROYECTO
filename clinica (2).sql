-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-05-2025 a las 22:29:50
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `n_cita` varchar(50) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `servicio` varchar(100) NOT NULL,
  `especialidad` varchar(100) NOT NULL,
  `medico` varchar(100) NOT NULL,
  `fecha_cita` datetime NOT NULL,
  `costo` decimal(10,2) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `otros` varchar(255) DEFAULT NULL,
  `total_cancelar` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `n_cita`, `fecha_registro`, `servicio`, `especialidad`, `medico`, `fecha_cita`, `costo`, `codigo`, `nombres`, `otros`, `total_cancelar`, `created_at`) VALUES
(1, 'C003', '2024-11-02 22:25:00', 'Consulta General', 'Odontología', 'Dr.Perez', '2024-11-20 22:25:00', 30.00, 'P001', 'Jhon Erick', 'Sin alergias', 30.00, '2024-11-03 03:25:59'),
(2, '11111', '2024-11-04 09:18:00', 'Medina General', 'Cardiología', 'Dr.Jhon Erick', '2024-11-21 09:19:00', 30.00, 'M004', 'Jhon Erick', 'Sin  Alergias', 30.00, '2024-11-04 14:19:51'),
(3, '11111', '2024-11-04 09:18:00', 'Medina General', 'Cardiología', 'Dr.Jhon Erick', '2024-11-21 09:19:00', 30.00, 'M004', 'Jhon Erick', 'Sin  Alergias', 30.00, '2024-11-04 14:20:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `especialidad` varchar(100) NOT NULL,
  `servicio` varchar(100) NOT NULL,
  `consultorio` varchar(10) NOT NULL,
  `tarifa` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id`, `codigo`, `especialidad`, `servicio`, `consultorio`, `tarifa`) VALUES
(11, 'E001', 'Odontologia', 'S001', '2525', 10.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenes`
--

CREATE TABLE `examenes` (
  `id` int(11) NOT NULL,
  `historial_id` int(11) DEFAULT NULL,
  `archivo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `examenes`
--

INSERT INTO `examenes` (`id`, `historial_id`, `archivo`, `created_at`) VALUES
(9, 13, 'uploads/CUADERNO DE INFORMES IV INFORME 5.pdf', '2024-11-03 03:59:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_pacientes`
--

CREATE TABLE `historial_pacientes` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `atencion` varchar(255) NOT NULL,
  `medico` varchar(255) NOT NULL,
  `receta` text DEFAULT NULL,
  `proximo_control` date DEFAULT NULL,
  `alergico` enum('Sí','No') DEFAULT 'No',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `dni` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historial_pacientes`
--

INSERT INTO `historial_pacientes` (`id`, `fecha`, `hora`, `atencion`, `medico`, `receta`, `proximo_control`, `alergico`, `created_at`, `nombres`, `apellidos`, `dni`) VALUES
(13, '2024-11-02', '22:58:00', 'inmediata', 'Dr. Juan Lopez', 'Jarabe amoxilina 3 ', '2024-11-20', 'No', '2024-11-03 03:59:08', 'Jhon Erick', 'Erick Rodríguez', '79625942');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `dni` varchar(15) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `especialidad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`id`, `codigo`, `apellidos`, `nombres`, `direccion`, `telefono`, `dni`, `fecha_nacimiento`, `especialidad`) VALUES
(3, 'M001', 'Ganzales Prada', 'Felicia', 'av,paraiso', '959496288', '75959465', '1999-09-25', 'Medicina General'),
(4, 'M003', 'Perez Delgado', 'Juan ', 'av.304 vallejos', '95945524', '65448487', '1987-11-10', 'Pediatra'),
(5, 'M002', 'Cruz Benites', 'Eulogio Roberto', 'av.algarrobos', '965959423', '78595955', '2000-08-08', 'Odontología');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `dni` varchar(15) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `sexo` enum('Masculino','Femenino','Otro') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `codigo`, `nombres`, `apellidos`, `direccion`, `telefono`, `dni`, `fecha_nacimiento`, `sexo`) VALUES
(9, 'P002', 'Juan Perez', 'Santos Damian', 'Av. Siempre Viva 456', '9565824', '78656492', '1996-10-20', 'Masculino'),
(12, '14211', 'Jhon Erick', 'Rodriguez Monja', 'Cp Insculas', '921180682', '79625942', '2000-10-21', 'Masculino'),
(13, '111', 'Sebastian', 'Requejo Galvez', 'feswfewfewfewf', '921180681', '41589551', '2005-02-10', 'Masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `idservicio` varchar(10) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`idservicio`, `descripcion`) VALUES
('S001', 'Pediatra');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `examenes`
--
ALTER TABLE `examenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historial_id` (`historial_id`);

--
-- Indices de la tabla `historial_pacientes`
--
ALTER TABLE `historial_pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`idservicio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `examenes`
--
ALTER TABLE `examenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `historial_pacientes`
--
ALTER TABLE `historial_pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `examenes`
--
ALTER TABLE `examenes`
  ADD CONSTRAINT `examenes_ibfk_1` FOREIGN KEY (`historial_id`) REFERENCES `historial_pacientes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
