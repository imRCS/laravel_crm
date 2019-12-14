-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-12-2019 a las 15:09:21
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crmdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campaigns`
--

CREATE TABLE `campaigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expectedrevenue` decimal(10,2) UNSIGNED NOT NULL,
  `currentrevenue` decimal(10,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `beginning_month` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `beginning_year` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `ending_month` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `ending_year` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `campaigns`
--

INSERT INTO `campaigns` (`id`, `name`, `description`, `expectedrevenue`, `currentrevenue`, `status`, `beginning_month`, `beginning_year`, `ending_month`, `ending_year`, `created_at`, `updated_at`) VALUES
(1, 'Anuncios', 'Publicar anuncios en Youtube', '21000.00', '0.00', 'activa', 4, 2019, 1, 2020, '2019-12-12 01:31:14', '2019-12-12 01:31:14'),
(2, 'Evento nacional', 'Celebración de apertura', '20000.00', '0.00', 'cancelada', 5, 2019, 1, 2020, '2019-12-12 12:05:26', '2019-12-12 12:16:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_09_161929_create_products_table', 1),
(5, '2019_12_09_174255_create_sales_table', 1),
(6, '2019_12_09_175231_create_campaigns_table', 1);

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
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(12,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `sales` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `vendor_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `description`, `views`, `sales`, `vendor_id`, `created_at`, `updated_at`) VALUES
(1, 'apuntes de mates', 'apuntes', '15.85', 'muy completos', 1, 3, 1, '2019-12-12 01:03:39', '2019-12-12 11:41:29'),
(2, 'apuntes de ingles', 'apuntes', '6.70', 'con ejemplos muy variados', 1, 3, 1, '2019-12-12 01:04:48', '2019-12-12 11:34:00'),
(3, 'apuntes de lengua', 'apuntes', '8.50', 'Gramática completa con ejercicios de sintaxis', 1, 2, 1, '2019-12-12 01:06:00', '2019-12-12 11:37:30'),
(4, 'Estadistica y Big data', 'libro', '40.00', 'Libro completo sobre la aplicacion de la estadística en Big Data', 2, 2, 0, '2019-12-12 10:21:06', '2019-12-12 10:53:14'),
(5, 'Curso avanzado de C#', 'curso', '120.00', 'Aprende aplicaciones mas avanzadas y complejas', 3, 3, 0, '2019-12-12 10:23:47', '2019-12-12 11:41:38'),
(6, 'Quimica 3º ESO', 'libro', '40.00', 'Libro de quimica de editorial X \r\nISBN xxxxxxx \r\nAutor X', 3, 2, 0, '2019-12-12 10:26:21', '2019-12-12 11:44:58'),
(7, 'apuntes de quimica', 'apuntes', '12.55', 'Apuntes de formulacion y problemas resueltos', 0, 0, 3, '2019-12-12 10:56:51', '2019-12-12 10:56:51'),
(8, 'apuntes de fisica', 'apuntes', '13.50', 'bla bla bla', 0, 0, 4, '2019-12-12 11:33:28', '2019-12-12 11:33:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `month` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `year` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `product` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sales`
--

INSERT INTO `sales` (`id`, `month`, `year`, `product`, `category`, `created_at`, `updated_at`) VALUES
(1, 1, 2019, 'apuntes de ingles', 'apuntes', '2019-12-12 10:52:38', '2019-12-12 10:52:38'),
(2, 1, 2019, 'Estadistica y Big data', 'libro', '2019-12-12 10:52:42', '2019-12-12 10:52:42'),
(3, 1, 2019, 'Estadistica y Big data', 'libro', '2019-12-12 10:53:06', '2019-12-12 10:53:06'),
(4, 1, 2019, 'Curso avanzado de C#', 'curso', '2019-12-12 10:53:09', '2019-12-12 10:53:09'),
(5, 10, 2019, 'apuntes de mates', 'apuntes', '2019-12-12 10:55:06', '2019-12-12 10:55:06'),
(6, 11, 2019, 'apuntes de ingles', 'apuntes', '2019-12-12 10:55:11', '2019-12-12 10:55:11'),
(7, 12, 2019, 'apuntes de lengua', 'apuntes', '2019-12-12 10:55:16', '2019-12-12 10:55:16'),
(8, 11, 2019, 'Curso avanzado de C#', 'curso', '2019-12-12 10:55:21', '2019-12-12 10:55:21'),
(9, 10, 2019, 'Quimica 3º ESO', 'libro', '2019-12-12 10:56:01', '2019-12-12 10:56:01'),
(10, 10, 2019, 'apuntes de mates', 'apuntes', '2019-12-12 11:33:50', '2019-12-12 11:33:50'),
(11, 11, 2019, 'apuntes de ingles', 'apuntes', '2019-12-12 11:34:00', '2019-12-12 11:34:00'),
(12, 1, 2019, 'apuntes de lengua', 'apuntes', '2019-12-12 11:37:30', '2019-12-12 11:37:30'),
(13, 12, 2019, 'Curso avanzado de C#', 'curso', '2019-12-12 11:37:43', '2019-12-12 11:37:43'),
(14, 11, 2019, 'apuntes de mates', 'apuntes', '2019-12-12 11:41:29', '2019-12-12 11:41:29'),
(15, 1, 2019, 'Quimica 3º ESO', 'libro', '2019-12-12 11:44:58', '2019-12-12 11:44:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profits` decimal(12,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `purchases` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `is_admin`, `email`, `email_verified_at`, `password`, `profits`, `purchases`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'pepe', 0, 'pepe@mail.com', NULL, '$2y$10$E.BSKuTIJsZ/3N1rw1xqLe2ede4RXHn7WsSEVBqaEVhB.ZgBThSa2', '7.93', 0, NULL, '2019-12-12 01:02:57', '2019-12-12 12:49:34'),
(2, 'administrador', 1, 'administrador@mail.com', NULL, '$2y$10$E.BSKuTIJsZ/3N1rw1xqLe2ede4RXHn7WsSEVBqaEVhB.ZgBThSa2', '0.00', 0, NULL, '2019-12-12 01:02:57', '2019-12-12 01:02:57'),
(3, 'ana', 0, 'ana@mail.com', NULL, '$2y$10$vqt59eN4vfUZeQfL389KSeVjMNcj9iDxFNAkmp9a5udrn6TPU5qRq', '0.00', 0, 'qjK4T5xxmwzAOjgRWH1LqHzlMG3wOgvPzE0X04BJcdNIw6Yl65nK0M07ErRj', '2019-12-12 10:28:34', '2019-12-12 13:12:44');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
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
-- AUTO_INCREMENT de la tabla `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
