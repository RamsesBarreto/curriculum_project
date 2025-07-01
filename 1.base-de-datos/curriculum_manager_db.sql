-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-07-2025 a las 00:28:51
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `curriculum_manager_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `academic_education`
--

CREATE TABLE `academic_education` (
  `id` int(11) NOT NULL,
  `career_degree` varchar(100) DEFAULT NULL,
  `institution` varchar(100) DEFAULT NULL,
  `graduation_year` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `academic_education`
--

INSERT INTO `academic_education` (`id`, `career_degree`, `institution`, `graduation_year`) VALUES
(1, 'Bachiller', 'U.E.N Los Proceres', '2018-10-16'),
(3, 'Ingeniero En Sistemas', 'Universidad Nacional Politecnica De La Fuerza Armada', '2027-06-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `applicant`
--

CREATE TABLE `applicant` (
  `id` int(11) NOT NULL,
  `name` varchar(12) NOT NULL,
  `lastname` varchar(12) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone_number` varchar(13) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `age` tinyint(2) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `birthday_date` date NOT NULL,
  `url_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `applicant`
--

INSERT INTO `applicant` (`id`, `name`, `lastname`, `password`, `phone_number`, `email`, `age`, `gender`, `address`, `birthday_date`, `url_image`) VALUES
(1, 'Ramses', 'Barreto', '12345678', '04163421637', 'ramsesbarreto82@gmail.com', 22, 'M', 'Aragua, Maracay', '2025-06-11', ''),
(3, 'Abraham', 'Yciarte', '12345678', '04167778932', 'abrahamyciarte@gmail.com', 22, 'M', 'Base Sucre', '2003-06-30', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `pdf_url` varchar(255) NOT NULL,
  `fk_applicant_id` int(11) DEFAULT NULL,
  `fk_job_publication_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `application`
--

INSERT INTO `application` (`id`, `pdf_url`, `fk_applicant_id`, `fk_job_publication_id`) VALUES
(1, 'uploads/cv_68434111ddeaf0.84864929.pdf', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `social_denomination` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `domicile` varchar(20) NOT NULL,
  `rif` varchar(10) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `industry` varchar(20) NOT NULL,
  `url_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `company`
--

INSERT INTO `company` (`id`, `social_denomination`, `email`, `password`, `domicile`, `rif`, `contact_number`, `industry`, `url_image`) VALUES
(1, 'Soluciones Luna S.a', 'solucionesluna@gmail.com', '12345678', 'Venezuela', 'J123456789', '04262799505', 'Tecnología', ''),
(2, 'Recreaciones Bz', 'recreacionesbz@gmail.com', '12345678', 'Aragua, maracay', 'J123456788', '04164444932', 'Festejo Recreacional', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_experience`
--

CREATE TABLE `job_experience` (
  `id` int(11) NOT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `job_charge` varchar(100) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `principal_functions` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `job_experience`
--

INSERT INTO `job_experience` (`id`, `company_name`, `job_charge`, `start_date`, `end_date`, `principal_functions`) VALUES
(1, 'Recreaciones BZ', 'Operador', '2023-03-22', '2025-06-30', 'a'),
(3, 'Tech Soluction S.A', 'Desarrollador Web', '2025-06-18', '2025-06-25', 'Analista de Datos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_publication`
--

CREATE TABLE `job_publication` (
  `id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `subtitle` varchar(100) NOT NULL,
  `job_occupation` varchar(25) DEFAULT NULL,
  `start_shift_hours` time DEFAULT NULL,
  `end_shift_hours` time DEFAULT NULL,
  `job_salary` int(8) DEFAULT NULL,
  `start_reclutement_period` date DEFAULT NULL,
  `end_reclutement_period` date DEFAULT NULL,
  `required_experience` varchar(500) DEFAULT NULL,
  `fk_company_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `job_publication`
--

INSERT INTO `job_publication` (`id`, `title`, `subtitle`, `job_occupation`, `start_shift_hours`, `end_shift_hours`, `job_salary`, `start_reclutement_period`, `end_reclutement_period`, `required_experience`, `fk_company_id`) VALUES
(1, 'FULLSTACK', 'PROGRAMAR TODO', 'PROJECT MANAGER', '05:35:00', '18:35:00', 3000, '2025-07-14', '2025-07-16', 'TODO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pre_selected`
--

CREATE TABLE `pre_selected` (
  `id` int(11) NOT NULL,
  `meeting_date` date DEFAULT NULL,
  `message_field` text DEFAULT NULL,
  `fk_application_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `academic_education`
--
ALTER TABLE `academic_education`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicant_id` (`fk_applicant_id`),
  ADD KEY `job_publication_id` (`fk_job_publication_id`);

--
-- Indices de la tabla `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `RIF` (`rif`);

--
-- Indices de la tabla `job_experience`
--
ALTER TABLE `job_experience`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `job_publication`
--
ALTER TABLE `job_publication`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_publication_ibfk_1` (`fk_company_id`);

--
-- Indices de la tabla `pre_selected`
--
ALTER TABLE `pre_selected`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_application_id` (`fk_application_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `applicant`
--
ALTER TABLE `applicant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `job_publication`
--
ALTER TABLE `job_publication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pre_selected`
--
ALTER TABLE `pre_selected`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `academic_education`
--
ALTER TABLE `academic_education`
  ADD CONSTRAINT `id_academic` FOREIGN KEY (`id`) REFERENCES `applicant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `applicant_id` FOREIGN KEY (`fk_applicant_id`) REFERENCES `applicant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `job_publication_id` FOREIGN KEY (`fk_job_publication_id`) REFERENCES `job_publication` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `job_experience`
--
ALTER TABLE `job_experience`
  ADD CONSTRAINT `id_experience` FOREIGN KEY (`id`) REFERENCES `applicant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `job_publication`
--
ALTER TABLE `job_publication`
  ADD CONSTRAINT `job_publication_ibfk_1` FOREIGN KEY (`fk_company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pre_selected`
--
ALTER TABLE `pre_selected`
  ADD CONSTRAINT `fk_application_id` FOREIGN KEY (`fk_application_id`) REFERENCES `application` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
