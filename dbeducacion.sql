-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2017 a las 02:52:38
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbeducacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `idestudiante` int(10) UNSIGNED NOT NULL,
  `idcurso` int(10) UNSIGNED NOT NULL,
  `idmateria` int(10) UNSIGNED NOT NULL,
  `cal_cuantitativo` decimal(18,2) NOT NULL,
  `cal_cualitativo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cal_bimestre` enum('PRIMER BIMESTRE','SEGUNDO BIMESTRE','TERCER BIMESTRE','CUARTO BIMESTRE') COLLATE utf8mb4_unicode_ci NOT NULL,
  `cal_obs` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cal_estado` tinyint(1) NOT NULL DEFAULT '1',
  `iduregistra` int(10) UNSIGNED NOT NULL,
  `iduactualiza` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(10) UNSIGNED NOT NULL,
  `cur_nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cur_estado` tinyint(1) NOT NULL DEFAULT '1',
  `iduregistra` int(10) UNSIGNED NOT NULL,
  `iduactualiza` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_materia`
--

CREATE TABLE `curso_materia` (
  `id` int(10) UNSIGNED NOT NULL,
  `idcurso` int(10) UNSIGNED NOT NULL,
  `idmateria` int(10) UNSIGNED NOT NULL,
  `iddocente` int(10) UNSIGNED NOT NULL,
  `cm_lun` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cm_lun_hora` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cm_mar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cm_mar_hora` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cm_mie` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cm_mie_hora` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cm_jue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cm_jue_hora` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cm_vie` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cm_vie_hora` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cm_sab` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cm_sab_hora` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cm_estado` tinyint(1) NOT NULL DEFAULT '1',
  `iduregistra` int(10) UNSIGNED NOT NULL,
  `iduactualiza` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `id` int(10) UNSIGNED NOT NULL,
  `doc_foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_ci` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_expedido` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_paterno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_materno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_genero` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_especialidad` enum('MATEMATICA','CIENCIAS NATURALES','FISICA','QUIMICA','BIOLOGIA','HISTORIA','DOCENTE DE AULA','INICIAL','EDUCACION FISICA','ARTES PLASTICAS') COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_rda` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_direccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_telefono` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_celular` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_estado` tinyint(1) NOT NULL DEFAULT '1',
  `iduregistra` int(10) UNSIGNED NOT NULL,
  `iduactualiza` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` int(10) UNSIGNED NOT NULL,
  `est_rude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `est_nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `est_paterno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `est_materno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `est_ci` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `est_expedido` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `est_genero` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `est_sangre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ORH+',
  `est_nacimiento` date NOT NULL,
  `est_lugar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `est_direccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `est_telefono` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `est_celular` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `est_estado` tinyint(1) NOT NULL DEFAULT '1',
  `est_obs` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `idtutor` int(10) UNSIGNED NOT NULL,
  `iduregistra` int(10) UNSIGNED NOT NULL,
  `iduactualiza` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `idestudiante` int(10) UNSIGNED NOT NULL,
  `idcurso` int(10) UNSIGNED NOT NULL,
  `in_tipo` enum('NUEVO','ANTIGUO') COLLATE utf8mb4_unicode_ci NOT NULL,
  `in_colegio_anterior` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `in_cert_nacimiento` enum('SI','NO') COLLATE utf8mb4_unicode_ci NOT NULL,
  `in_carnet` enum('SI','NO') COLLATE utf8mb4_unicode_ci NOT NULL,
  `in_rude` enum('SI','NO') COLLATE utf8mb4_unicode_ci NOT NULL,
  `in_libreta_anterior` enum('SI','NO') COLLATE utf8mb4_unicode_ci NOT NULL,
  `in_obs` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `in_estado` tinyint(1) NOT NULL DEFAULT '1',
  `in_gestion` int(11) NOT NULL DEFAULT '2017',
  `iduregistra` int(10) UNSIGNED NOT NULL,
  `iduactualiza` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id` int(10) UNSIGNED NOT NULL,
  `mat_nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat_descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat_estado` tinyint(1) NOT NULL DEFAULT '1',
  `iduregistra` int(10) UNSIGNED NOT NULL,
  `iduactualiza` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_11_18_043539_create_cursos_table', 1),
(4, '2017_11_18_043942_create_materias_table', 1),
(5, '2017_11_30_184457_create_tutores_table', 2),
(6, '2017_11_30_184517_create_estudiantes_table', 2),
(7, '2017_11_30_204201_create_docentes_table', 3),
(8, '2017_11_30_204732_create_curso_materia_table', 3),
(9, '2017_11_30_204911_create_inscripciones_table', 3),
(10, '2017_11_30_204944_create_calificaciones_table', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutores`
--

CREATE TABLE `tutores` (
  `id` int(10) UNSIGNED NOT NULL,
  `tut_tipo` enum('PADRE','MADRE','TUTOR') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tut_ci` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tut_expedido` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tut_nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tut_paterno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tut_materno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tut_genero` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tut_ocupacion` enum('INGENIERO(A)','ARQUITECTO(A)','ABOGADO(A)','DOCTOR(A)','LICENCIADO(A)','AMA DE CASA','ARTESANO(A)','CARPINTERO') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tut_celular` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `tut_telefono` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `tut_direccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `us_nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_paterno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_materno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_genero` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_cuenta` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_tipo` enum('ADMINISTRADOR','DIRECTOR','PROFESOR','SECRETARIA') COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_estado` tinyint(1) NOT NULL DEFAULT '1',
  `us_obs` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `us_nombre`, `us_paterno`, `us_materno`, `us_genero`, `email`, `us_cuenta`, `us_tipo`, `password`, `us_estado`, `us_obs`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'Administrador', 'Administrador', 'MASCULINO', 'admin@admin.com', 'super.admin', 'ADMINISTRADOR', '$2y$10$QSO30TaNf844/SicIzd0j./DZAC4Bt8ECfBApt.kLFwVTH0xj3.pm', 1, 'Usuario administrador del Sistema', 'WTJASv25AlD4Ba0GtLXWTPNimnhAXKqQ2jbTAKWBxzpv86l1XiSq4zgGIJZ4', '2017-11-29 04:00:00', '2017-11-29 04:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `calificaciones_idestudiante_foreign` (`idestudiante`),
  ADD KEY `calificaciones_idcurso_foreign` (`idcurso`),
  ADD KEY `calificaciones_idmateria_foreign` (`idmateria`),
  ADD KEY `calificaciones_iduregistra_foreign` (`iduregistra`),
  ADD KEY `calificaciones_iduactualiza_foreign` (`iduactualiza`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cursos_iduregistra_foreign` (`iduregistra`),
  ADD KEY `cursos_iduactualiza_foreign` (`iduactualiza`);

--
-- Indices de la tabla `curso_materia`
--
ALTER TABLE `curso_materia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curso_materia_idcurso_foreign` (`idcurso`),
  ADD KEY `curso_materia_idmateria_foreign` (`idmateria`),
  ADD KEY `curso_materia_iddocente_foreign` (`iddocente`),
  ADD KEY `curso_materia_iduregistra_foreign` (`iduregistra`),
  ADD KEY `curso_materia_iduactualiza_foreign` (`iduactualiza`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `docentes_iduregistra_foreign` (`iduregistra`),
  ADD KEY `docentes_iduactualiza_foreign` (`iduactualiza`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estudiantes_idtutor_foreign` (`idtutor`),
  ADD KEY `estudiantes_iduregistra_foreign` (`iduregistra`),
  ADD KEY `estudiantes_iduactualiza_foreign` (`iduactualiza`);

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inscripciones_idestudiante_foreign` (`idestudiante`),
  ADD KEY `inscripciones_idcurso_foreign` (`idcurso`),
  ADD KEY `inscripciones_iduregistra_foreign` (`iduregistra`),
  ADD KEY `inscripciones_iduactualiza_foreign` (`iduactualiza`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materias_iduregistra_foreign` (`iduregistra`),
  ADD KEY `materias_iduactualiza_foreign` (`iduactualiza`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `tutores`
--
ALTER TABLE `tutores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `curso_materia`
--
ALTER TABLE `curso_materia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `tutores`
--
ALTER TABLE `tutores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `calificaciones_idcurso_foreign` FOREIGN KEY (`idcurso`) REFERENCES `cursos` (`id`),
  ADD CONSTRAINT `calificaciones_idestudiante_foreign` FOREIGN KEY (`idestudiante`) REFERENCES `estudiantes` (`id`),
  ADD CONSTRAINT `calificaciones_idmateria_foreign` FOREIGN KEY (`idmateria`) REFERENCES `materias` (`id`),
  ADD CONSTRAINT `calificaciones_iduactualiza_foreign` FOREIGN KEY (`iduactualiza`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `calificaciones_iduregistra_foreign` FOREIGN KEY (`iduregistra`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_iduactualiza_foreign` FOREIGN KEY (`iduactualiza`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cursos_iduregistra_foreign` FOREIGN KEY (`iduregistra`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `curso_materia`
--
ALTER TABLE `curso_materia`
  ADD CONSTRAINT `curso_materia_idcurso_foreign` FOREIGN KEY (`idcurso`) REFERENCES `cursos` (`id`),
  ADD CONSTRAINT `curso_materia_iddocente_foreign` FOREIGN KEY (`iddocente`) REFERENCES `docentes` (`id`),
  ADD CONSTRAINT `curso_materia_idmateria_foreign` FOREIGN KEY (`idmateria`) REFERENCES `materias` (`id`),
  ADD CONSTRAINT `curso_materia_iduactualiza_foreign` FOREIGN KEY (`iduactualiza`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `curso_materia_iduregistra_foreign` FOREIGN KEY (`iduregistra`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD CONSTRAINT `docentes_iduactualiza_foreign` FOREIGN KEY (`iduactualiza`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `docentes_iduregistra_foreign` FOREIGN KEY (`iduregistra`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_idtutor_foreign` FOREIGN KEY (`idtutor`) REFERENCES `tutores` (`id`),
  ADD CONSTRAINT `estudiantes_iduactualiza_foreign` FOREIGN KEY (`iduactualiza`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `estudiantes_iduregistra_foreign` FOREIGN KEY (`iduregistra`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD CONSTRAINT `inscripciones_idcurso_foreign` FOREIGN KEY (`idcurso`) REFERENCES `cursos` (`id`),
  ADD CONSTRAINT `inscripciones_idestudiante_foreign` FOREIGN KEY (`idestudiante`) REFERENCES `estudiantes` (`id`),
  ADD CONSTRAINT `inscripciones_iduactualiza_foreign` FOREIGN KEY (`iduactualiza`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `inscripciones_iduregistra_foreign` FOREIGN KEY (`iduregistra`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `materias_iduactualiza_foreign` FOREIGN KEY (`iduactualiza`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `materias_iduregistra_foreign` FOREIGN KEY (`iduregistra`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
