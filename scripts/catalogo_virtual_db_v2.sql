-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-06-2025 a las 06:03:16
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
-- Base de datos: `catalogo_virtual_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2025_06_10_004449_create_sessions_table', 1),
(7, '2025_06_10_010904_create_permission_tables', 1),
(8, '2025_06_23_183156_create_products_table', 2),
(9, '2025_06_23_203016_create_cart_items_table', 3),
(10, '2025_06_23_232443_create_orders_table', 4),
(11, '2025_06_23_232543_create_order_items_table', 4),
(12, '2025_06_23_220320_add_payment_method_to_orders_table', 5),
(13, '2025_06_23_221646_recreate_payment_method_on_orders_table', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 5),
(1, 'App\\Models\\User', 7),
(7, 'App\\Models\\User', 3),
(7, 'App\\Models\\User', 4),
(7, 'App\\Models\\User', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total` decimal(12,2) NOT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `payment_method`, `created_at`, `updated_at`) VALUES
(5, 3, 6977000.00, NULL, '2025-06-24 00:04:48', '2025-06-24 00:04:48'),
(6, 3, 4398000.00, NULL, '2025-06-24 00:05:05', '2025-06-24 00:05:05'),
(7, 3, 2287000.00, NULL, '2025-06-24 00:05:27', '2025-06-24 00:05:27'),
(8, 3, 2199000.00, NULL, '2025-06-24 00:57:33', '2025-06-24 00:57:33'),
(9, 3, 3500000.00, NULL, '2025-06-24 01:20:51', '2025-06-24 01:20:51'),
(10, 3, 12488900.00, NULL, '2025-06-24 03:19:06', '2025-06-24 03:19:06'),
(11, 3, 4100000.00, NULL, '2025-06-24 03:22:50', '2025-06-24 03:22:50'),
(12, 3, 6299000.00, NULL, '2025-06-24 03:26:30', '2025-06-24 03:26:30'),
(13, 3, 899000.00, 'credit_card', '2025-06-24 03:34:24', '2025-06-24 03:34:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(8, 5, 1, 1, 3500000.00, '2025-06-24 00:04:48', '2025-06-24 00:04:48'),
(9, 5, 4, 2, 489000.00, '2025-06-24 00:04:48', '2025-06-24 00:04:48'),
(10, 5, 5, 1, 2499000.00, '2025-06-24 00:04:48', '2025-06-24 00:04:48'),
(11, 6, 2, 2, 2199000.00, '2025-06-24 00:05:05', '2025-06-24 00:05:05'),
(12, 7, 6, 2, 899000.00, '2025-06-24 00:05:27', '2025-06-24 00:05:27'),
(13, 7, 4, 1, 489000.00, '2025-06-24 00:05:27', '2025-06-24 00:05:27'),
(14, 8, 2, 1, 2199000.00, '2025-06-24 00:57:33', '2025-06-24 00:57:33'),
(15, 9, 1, 1, 3500000.00, '2025-06-24 01:20:51', '2025-06-24 01:20:51'),
(16, 10, 1, 1, 4100000.00, '2025-06-24 03:19:06', '2025-06-24 03:19:06'),
(17, 10, 13, 1, 4990900.00, '2025-06-24 03:19:06', '2025-06-24 03:19:06'),
(18, 10, 6, 1, 899000.00, '2025-06-24 03:19:06', '2025-06-24 03:19:06'),
(19, 10, 5, 1, 2499000.00, '2025-06-24 03:19:06', '2025-06-24 03:19:06'),
(20, 11, 1, 1, 4100000.00, '2025-06-24 03:22:50', '2025-06-24 03:22:50'),
(21, 12, 1, 1, 4100000.00, '2025-06-24 03:26:30', '2025-06-24 03:26:30'),
(22, 12, 2, 1, 2199000.00, '2025-06-24 03:26:30', '2025-06-24 03:26:30'),
(23, 13, 6, 1, 899000.00, '2025-06-24 03:34:24', '2025-06-24 03:34:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'full', 'web', '2025-06-22 05:00:00', '2025-06-22 05:00:00'),
(2, 'customer', 'web', '2025-06-23 02:22:46', '2025-06-23 02:22:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Portatil Gamer', 'Portatil Gamer para jugar o diseño', 4100000.00, 27, 'products/CViOifBm7fmz2Ma52ftk1beD4MK7X8hPPxNH7zJT.webp', '2025-06-24 00:07:59', '2025-06-24 03:26:30'),
(2, 'Refrigerador No Frost 300L', 'Refrigerador de 300 L con tecnología No Frost y control digital de temperatura.', 2199000.00, 7, 'products/02bUCM6TNng4OmSia2ogOE0xsPFVRcVOEbZ1UVxu.webp', '2025-06-24 00:28:00', '2025-06-24 03:26:30'),
(3, 'Lavadora Automática 10 kg', 'Lavadora de carga superior de 10 kg con 5 programas de lavado y función rápida.', 1345000.00, 7, 'products/3nwz1nLA83Z2vLj6kWJFgrqJTFgfZtbADnsUwCHp.webp', '2025-06-24 00:28:50', '2025-06-24 00:03:13'),
(4, 'Microondas Digital 25 L', 'Microondas de 25 L con 10 niveles de potencia y panel táctil de fácil uso.', 489000.00, 10, 'products/r4nIWO5nZD7la2L4MnBEq8wz8BD7HC1av3ZAksFs.webp', '2025-06-24 00:29:41', '2025-06-24 00:05:27'),
(5, 'Televisor LED 50″ 4K', 'TV LED de 50″ con resolución 4K UHD, HDR y Smart TV integrado.', 2499000.00, 18, 'products/Q4W6UBHf841FSeWomRPntceGtCYMiw8ScnsbeuBx.webp', '2025-06-24 00:30:20', '2025-06-24 03:55:59'),
(6, 'Aspiradora Robot 2000', 'Aspiradora robot con potencia de succión de 2000 Pa, programación y retorno automático.', 899000.00, 6, 'products/m4KAUQKxQkIUuDs8Rm6NfD5qxtlOn05zo1nue8U3.webp', '2025-06-24 00:31:15', '2025-06-24 03:34:24'),
(10, 'Nevecon Samsung', 'Nevecon Samsung de excelente calidad con puertas dobles', 7499000.00, 12, 'products/AFun4ETSbv4GSwVKzBmFPZMoTQPL1iGNXeOsSGcH.png', '2025-06-24 00:10:01', '2025-06-24 00:10:01'),
(11, 'Lavadora Samsung', 'Lavadora Secadora Samsung con varios ciclos de lavado y con la posibilidad de lavar varios tipos de ropa', 3099900.00, 25, 'products/yKCgIP37jUDpNbrleosnfoCYmlfGLfKKZTPwmZfB.webp', '2025-06-24 00:11:43', '2025-06-24 00:11:43'),
(12, 'Horno Microondas con Dorador', 'Horno Microondas con Dorador', 499000.00, 45, 'products/mWOcaVFfj0nE3tkuBq0RavfUW7WpP5pUzdVk4zKn.webp', '2025-06-24 00:12:36', '2025-06-24 00:12:36'),
(13, 'Aspiradora Karcher', 'Aspiradora Karcher', 4990900.00, 20, 'products/Affvit6y2DdwyERJpLmi5UBS5Zw1tRsREvJ9R1Kq.png', '2025-06-24 00:13:11', '2025-06-24 03:19:06'),
(14, 'Secadora Eléctrica 7kg', 'Sensor de humedad, antiarrugas y temporizador digital.', 849000.00, 13, 'products/huVZmRSz5okUnP4u9K8exDz57wP4yV1G1TiH21rW.webp', '2025-06-24 03:43:05', '2025-06-24 03:43:05'),
(15, 'Refrigerador No Frost 300L', 'Puerta de acero inoxidable, sistema No Frost, dispensador de agua.', 2199000.00, 21, 'products/Fq20zzLhNQaCEprhjZ7IVRXrKtX3dO7iOj7C5DAN.png', '2025-06-24 03:44:39', '2025-06-24 03:45:17'),
(16, 'Lavadora Carga Frontal 8kg', '15 programas de lavado, motor inverter, función rápido.', 1099000.00, 14, 'products/sHEOkVtkLhtVCUXzkIYQGfaj9nzLBfkFnvUL64k3.webp', '2025-06-24 03:45:55', '2025-06-24 03:45:55'),
(17, 'Lavavajillas 12 Servicios', 'Tres niveles de lavado, bajo consumo, panel táctil.', 1749000.00, 12, 'products/VXVXGqMKJvY0Qk9dhruSrG1N36YDvB3obqxziAhs.webp', '2025-06-24 03:46:37', '2025-06-24 03:46:37'),
(18, 'Microondas 25L Grill', 'Función grill, 10 niveles de potencia, interior de acero.', 399000.00, 41, 'products/vEVJ94CsjO5StNhMQPsJ67Co56sBTsdK0uJAlPTz.webp', '2025-06-24 03:47:52', '2025-06-24 03:47:52'),
(19, 'Horno Eléctrico Multifunción', '8 modos de cocción, función convección, pantalla LED.', 1299000.00, 26, 'products/9iJzquOGFSdqeAlrgUk9Iaal2NwpnunmSKhbxDYn.webp', '2025-06-24 03:49:04', '2025-06-24 03:49:04'),
(20, 'Estufa a Gas 4 Puestos', 'Cubierta de vidrio templado, perillas de acero inoxidable.', 649000.00, 48, 'products/ylDH4uAKD6h5HjS4tViynfDVaaApYSyWf8AcOJso.png', '2025-06-24 03:50:13', '2025-06-24 03:50:13'),
(21, 'Campana Extractora 90cm', 'Tres velocidades, filtro metálico, iluminación LED.', 490000.00, 85, 'products/l7RzWZxYPrCk1NlBx4DpkYQFvmqlKfflfsVhklu5.png', '2025-06-24 03:51:22', '2025-06-24 03:51:22'),
(22, 'Aspiradora Robot Inteligente', 'Mapeo láser, control por app, programación diaria.', 999000.00, 46, 'products/PtnbPISN0YQO0vU1F4jrk4eMFlENERCXgvUJx7ay.png', '2025-06-24 03:52:28', '2025-06-24 03:52:28'),
(23, 'Licuadora 1.5L 700 W', 'Jarra de vidrio, cuchillas de acero inoxidable, 3 velocidades.', 169000.00, 95, 'products/QkPfciRKUmw6b01aLxo9SDcr5BgKUmUty25F1pKT.png', '2025-06-24 03:53:53', '2025-06-24 03:53:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2025-06-23 05:06:57', '2025-06-23 05:06:57'),
(7, 'customer', 'web', '2025-06-23 09:05:03', '2025-06-23 09:05:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('iQX47C96MqIb8WphmiOFPxm41M23mDGpOhV4wVXI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT3N6MnpZczh0R0phalhCY3Q4ZkU2U0FHQUhIbk4zaVZ5ckFRZmxtaCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1750737369);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(2, 'Diego', 'diego@admin.com', NULL, '$2y$10$AZ8XNQK0KwHISEqToN1yReSnqtfTnLyV/rPsDul5T8h6WWQE83PdS', NULL, NULL, NULL, 'VAw3Ls0igN5vIYwUn097Vji3CqNnTW4epGFmQytXZ5hlRLKdHhW9cy4gzOUs', NULL, NULL, '2025-06-23 03:31:54', '2025-06-23 03:31:54'),
(3, 'Diego Cliente 1', 'cliente1@gmail.com', NULL, '$2y$10$SNlkx0NR5TgrAyhMbAmDyOaGpjBKiKQe599G.87GfxuXuiKCIZyFW', NULL, NULL, NULL, 'oUsKHLZFA6PSI97isGDQEmndzQe8hZgaV5tFVcsgbeHIclriHqJgyEoNUVe2', NULL, NULL, '2025-06-23 09:39:14', '2025-06-23 10:01:05'),
(4, 'Diego Cliente 2', 'cliente2@gmail.com', NULL, '$2y$10$AwHWA/4B.QFxaPfcG46L9OqlYGr1owPgyxoB6ckGZELavprFT7wwS', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-23 10:00:33', '2025-06-23 10:00:50'),
(5, 'admin', 'admin@admin.com', NULL, '$2y$10$llVpqJHCPuegE6EN0LCUxeTvd8oyP7wIe2JNGVSlK5.8Fng82lpzy', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-24 04:19:50', '2025-06-24 04:19:50'),
(6, 'cliente 3', 'cliente3@gmail.com', NULL, '$2y$10$wCuT2qiR/I3JbqWTajYv0OotH0pnvEE/Pre6Q.xKdP8GdoUAurfAS', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-24 00:26:22', '2025-06-24 00:26:22'),
(7, 'client 4', 'cliente4@gmail.com', NULL, '$2y$10$UEIxMaCAK2Vfrg9.zCV6R.YAh5pK1iCoxClSQkNR0vDJhGxohvOma', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-24 01:26:26', '2025-06-24 01:26:26');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_user_id_foreign` (`user_id`),
  ADD KEY `cart_items_product_id_foreign` (`product_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT de la tabla `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
