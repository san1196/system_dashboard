-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for system_dashboard
CREATE DATABASE IF NOT EXISTS `system_dashboard` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `system_dashboard`;

-- Dumping structure for table system_dashboard.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table system_dashboard.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table system_dashboard.master_list_menu
CREATE TABLE IF NOT EXISTS `master_list_menu` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table system_dashboard.master_list_menu: ~5 rows (approximately)
/*!40000 ALTER TABLE `master_list_menu` DISABLE KEYS */;
INSERT INTO `master_list_menu` (`id`, `menu_name`, `url_link`, `created_by`, `created_at`, `updated_at`) VALUES
	(2, 'Dashboard', '/dashboard', 1, '2021-03-25 17:11:37', '2021-03-25 17:11:37'),
	(3, 'Data Karyawan', '/datakaryawan', 1, '2021-03-25 17:11:48', '2021-03-25 17:11:48'),
	(4, 'Master Role', '/masterrole', 1, '2021-03-25 17:12:00', '2021-03-25 17:18:59'),
	(5, 'Master Menu', '/mastermenu', 1, '2021-03-25 17:12:11', '2021-03-25 17:12:11'),
	(6, 'Master Role Menu', '/masterrolemenu', 1, '2021-03-25 17:12:32', '2021-03-25 17:12:32');
/*!40000 ALTER TABLE `master_list_menu` ENABLE KEYS */;

-- Dumping structure for table system_dashboard.master_role
CREATE TABLE IF NOT EXISTS `master_role` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table system_dashboard.master_role: ~2 rows (approximately)
/*!40000 ALTER TABLE `master_role` DISABLE KEYS */;
INSERT INTO `master_role` (`id`, `role_name`, `created_by`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 1, '2021-03-25 16:26:50', '2021-03-25 16:34:29'),
	(2, 'User', 1, '2021-03-25 16:27:03', '2021-03-25 16:27:03');
/*!40000 ALTER TABLE `master_role` ENABLE KEYS */;

-- Dumping structure for table system_dashboard.master_role_menu
CREATE TABLE IF NOT EXISTS `master_role_menu` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` bigint(20) DEFAULT NULL,
  `role_id` bigint(20) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_id` (`menu_id`),
  KEY `role_id` (`role_id`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table system_dashboard.master_role_menu: ~7 rows (approximately)
/*!40000 ALTER TABLE `master_role_menu` DISABLE KEYS */;
INSERT INTO `master_role_menu` (`id`, `menu_id`, `role_id`, `created_by`, `created_at`, `updated_at`) VALUES
	(1, 2, 1, 1, '2021-03-25 17:53:30', '2021-03-25 17:53:30'),
	(2, 3, 1, 1, '2021-03-25 17:53:42', '2021-03-25 18:00:43'),
	(3, 4, 1, 1, '2021-03-25 17:54:02', '2021-03-25 17:54:02'),
	(4, 5, 1, 1, '2021-03-25 17:54:12', '2021-03-25 17:54:12'),
	(6, 6, 1, 1, '2021-03-25 17:55:04', '2021-03-25 17:55:04'),
	(7, 2, 2, 1, '2021-03-25 17:55:17', '2021-03-25 17:55:17'),
	(8, 3, 2, 1, '2021-03-25 17:55:31', '2021-03-25 17:55:31');
/*!40000 ALTER TABLE `master_role_menu` ENABLE KEYS */;

-- Dumping structure for table system_dashboard.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table system_dashboard.migrations: ~7 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(3, '2014_10_12_100000_create_password_resets_table', 1),
	(4, '2019_08_19_000000_create_failed_jobs_table', 1),
	(9, '2014_10_12_000000_create_users_table', 2),
	(10, '2021_03_25_133715_create_master_role_table', 2),
	(11, '2021_03_25_134052_create_master_list_menu_table', 2),
	(12, '2021_03_25_134139_create_master_role_menu_table', 2),
	(13, '2021_03_25_134811_add_role_active_block_created_to_users', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table system_dashboard.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table system_dashboard.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table system_dashboard.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `block` tinyint(1) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table system_dashboard.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`, `active`, `block`, `created_by`) VALUES
	(1, 'Administrator', 'administrator@mail.com', NULL, '$2y$10$7wDkQTUCD88W6a5pdzLs8O.VQHbNdijZ7ek3KA8MkdU.rjKK62GAy', NULL, '2021-03-25 14:45:55', '2021-03-25 18:26:46', 1, 1, 0, NULL),
	(3, 'User', 'user@mail.com', NULL, '$2y$10$tkpeD2LLOw3zKCibzu6J2edltO7eAqeSZLKiwySgqAeJbioUuweMi', NULL, '2021-03-25 18:23:12', '2021-03-25 18:23:12', 2, 1, 0, 1),
	(4, 'Admin', 'admin@mail.com', NULL, '$2y$10$lWsRBvO9JeTF.9pXPoHJ..PFI/Nm5zr1CnJRuAbdyGoWtaW/pKKoe', NULL, '2021-03-25 18:23:44', '2021-03-25 18:27:02', 1, 0, 0, 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
