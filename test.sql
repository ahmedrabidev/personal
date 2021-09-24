-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2021 at 04:13 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_09_15_220635_create_grades_table', 1),
(5, '2021_09_18_134154_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trans` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `trans`, `created_at`, `updated_at`) VALUES
(2, 'table permissions', 'web', '{\"en\":\"Table Permissions\",\"ar\":\"\\u062c\\u062f\\u0648\\u0644 \\u0627\\u0644\\u0635\\u0644\\u0627\\u062d\\u064a\\u0627\\u062a\"}', '2021-09-18 22:05:09', '2021-09-18 22:05:09'),
(3, 'page permissions', 'web', '{\"en\":\"Page Permissions\",\"ar\":\"\\u0635\\u0641\\u062d\\u0629 \\u0627\\u0644\\u0635\\u0644\\u0627\\u062d\\u064a\\u0627\\u062a\"}', '2021-09-18 22:06:18', '2021-09-18 22:06:18'),
(4, 'new permission', 'web', '{\"en\":\"New Permission\",\"ar\":\"\\u0627\\u0636\\u0627\\u0641\\u0629 \\u0635\\u0644\\u0627\\u062d\\u064a\\u0629\"}', '2021-09-18 22:06:50', '2021-09-18 22:06:50'),
(5, 'process permission', 'web', '{\"en\":\"Process Permissions\",\"ar\":\"\\u0639\\u0645\\u0644\\u064a\\u0627\\u062a \\u0627\\u0644\\u0635\\u0644\\u0627\\u062d\\u064a\\u0627\\u062a\"}', '2021-09-18 22:07:46', '2021-09-18 22:07:46'),
(6, 'delete permission', 'web', '{\"en\":\"Delete Permission\",\"ar\":\"\\u062d\\u0630\\u0641 \\u0635\\u0644\\u0627\\u062d\\u064a\\u0629\"}', '2021-09-18 22:08:13', '2021-09-18 22:08:13'),
(7, 'update permission', 'web', '{\"en\":\"Update Permission\",\"ar\":\"\\u062a\\u0639\\u062f\\u064a\\u0644 \\u0635\\u0644\\u0627\\u062d\\u064a\\u0629\"}', '2021-09-18 22:08:33', '2021-09-18 22:08:33'),
(9, 'page roles', 'web', '{\"en\":\"Page Roles\",\"ar\":\"\\u0635\\u0641\\u062d\\u0629 \\u0623\\u0646\\u0648\\u0627\\u0639 \\u0627\\u0644\\u0645\\u062a\\u0633\\u062e\\u062f\\u0645\\u064a\\u0646\"}', '2021-09-19 11:19:51', '2021-09-19 11:19:51'),
(10, 'create_page roles', 'web', '{\"en\":\"Create User Type Page\",\"ar\":\"\\u0635\\u0641\\u062d\\u0629 \\u0623\\u0636\\u0627\\u0641\\u0629 \\u0646\\u0648\\u0639 \\u0645\\u0633\\u062a\\u062e\\u062f\\u0645\"}', '2021-09-19 11:22:08', '2021-09-19 11:22:08'),
(11, 'add roles', 'web', '{\"en\":\"Add User Type\",\"ar\":\"\\u0623\\u0636\\u0627\\u0641\\u0629 \\u0646\\u0648\\u0639 \\u0645\\u0633\\u062a\\u062e\\u062f\\u0645\"}', '2021-09-19 11:22:35', '2021-09-19 11:22:35'),
(12, 'edit_page roles', 'web', '{\"en\":\"Update User Type Page\",\"ar\":\"\\u0635\\u0641\\u062d\\u0629 \\u062a\\u0639\\u062f\\u064a\\u0644 \\u0646\\u0648\\u0639 \\u0645\\u0633\\u062a\\u062e\\u062f\\u0645\"}', '2021-09-19 11:23:24', '2021-09-19 11:23:24'),
(13, 'update roles', 'web', '{\"en\":\"Update User Type\",\"ar\":\"\\u062a\\u0639\\u062f\\u064a\\u0644 \\u0646\\u0648\\u0639 \\u0645\\u0633\\u062a\\u062e\\u062f\\u0645\"}', '2021-09-19 11:23:54', '2021-09-19 11:23:54'),
(14, 'delete roles', 'web', '{\"en\":\"Delete User Type\",\"ar\":\"\\u062d\\u0630\\u0641 \\u0646\\u0648\\u0639 \\u0645\\u0633\\u062a\\u062e\\u062f\\u0645\"}', '2021-09-19 11:24:25', '2021-09-19 11:24:25'),
(15, 'process users', 'web', '{\"en\":\"Process Users\",\"ar\":\"\\u0639\\u0645\\u0644\\u064a\\u0627\\u062a \\u0627\\u0644\\u0645\\u0633\\u062a\\u062e\\u062f\\u0645\\u064a\\u0646\"}', '2021-09-19 11:33:09', '2021-09-19 11:33:09'),
(16, 'direct_permission_page users', 'web', '{\"en\":\"Direct permissions Page\",\"ar\":\"\\u0635\\u0641\\u062d\\u0629 \\u0627\\u0644\\u0635\\u0644\\u0627\\u062d\\u064a\\u0627\\u062a \\u0627\\u0644\\u0645\\u0628\\u0627\\u0634\\u0631\\u0629\"}', '2021-09-19 11:40:09', '2021-09-19 11:40:09'),
(17, 'save_direct_permission users', 'web', '{\"en\":\"Save Direct Permissions\",\"ar\":\"\\u062d\\u0641\\u0638 \\u0627\\u0644\\u0635\\u0644\\u0627\\u062d\\u064a\\u0627\\u062a \\u0627\\u0644\\u0645\\u0628\\u0627\\u0634\\u0631\\u0629\"}', '2021-09-19 11:40:57', '2021-09-19 11:40:57'),
(18, 'dropdown users page', 'web', '{\"en\":\"Dropdown Of Users Page\",\"ar\":\"\\u0642\\u0627\\u0626\\u0645\\u0629 \\u0635\\u0641\\u062d\\u0627\\u062a \\u0627\\u0644\\u0645\\u0633\\u062a\\u062e\\u062f\\u0645\\u064a\\u0646\"}', '2021-09-19 11:45:15', '2021-09-19 11:46:25'),
(19, 'add users', 'web', '{\"en\":\"New user\",\"ar\":\"\\u0627\\u0636\\u0627\\u0641\\u0629 \\u0645\\u0633\\u062a\\u062e\\u062f\\u0645 \\u062c\\u062f\\u064a\\u062f\"}', '2021-09-19 11:50:03', '2021-09-19 11:50:03'),
(20, 'create_page users', 'web', '{\"en\":\"Create User Page\",\"ar\":\"\\u0635\\u0641\\u062d\\u0629 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u0645\\u0633\\u062a\\u062e\\u062f\\u0645\"}', '2021-09-19 11:50:38', '2021-09-19 11:50:50'),
(21, 'edit_page users', 'web', '{\"en\":\"Update User Page\",\"ar\":\"\\u0635\\u0641\\u062d\\u0629 \\u062a\\u0639\\u062f\\u064a\\u0644 \\u0645\\u0633\\u062a\\u062e\\u062f\\u0645\"}', '2021-09-19 11:51:40', '2021-09-19 11:51:40'),
(22, 'update users', 'web', '{\"en\":\"Update User\",\"ar\":\"\\u062a\\u0639\\u062f\\u064a\\u0644 \\u0645\\u0633\\u062a\\u062e\\u062f\\u0645\"}', '2021-09-19 11:52:07', '2021-09-19 11:52:07'),
(23, 'delete users', 'web', '{\"en\":\"Delete User\",\"ar\":\"\\u062d\\u0630\\u0641 \\u0645\\u0633\\u062a\\u062e\\u062f\\u0645\"}', '2021-09-19 11:52:32', '2021-09-19 11:52:32'),
(24, 'page users', 'web', '{\"en\":\"Users Page\",\"ar\":\"\\u0635\\u0641\\u062d\\u0629 \\u0627\\u0644\\u0645\\u0633\\u062a\\u062e\\u062f\\u0645\\u064a\\u0646\"}', '2021-09-19 11:55:10', '2021-09-19 11:55:10'),
(26, 'table users', 'web', '{\"en\":\"Table Users\",\"ar\":\"\\u062c\\u062f\\u0648\\u0644 \\u0627\\u0644\\u0645\\u0633\\u062a\\u062e\\u062f\\u0645\\u064a\\u0646\"}', '2021-09-19 12:00:25', '2021-09-19 12:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'owner', 'web', '2021-09-18 21:57:26', '2021-09-18 21:57:26'),
(2, 'user', 'web', '2021-09-18 22:09:49', '2021-09-18 22:09:49');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(7, 1),
(7, 2),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(26, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ahmed Rabi owner', 'a@a.com', NULL, '$2y$10$diC40fCM2p6ljzFzm6JEQeNmGYojh.sXUwMUTEw7BvMAtv55TtQwq', NULL, '2021-09-18 21:57:26', '2021-09-18 21:57:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
