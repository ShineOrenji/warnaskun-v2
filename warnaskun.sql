-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table warnaskun.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table warnaskun.cache: ~0 rows (approximately)

-- Dumping structure for table warnaskun.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table warnaskun.cache_locks: ~0 rows (approximately)

-- Dumping structure for table warnaskun.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table warnaskun.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table warnaskun.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table warnaskun.jobs: ~0 rows (approximately)

-- Dumping structure for table warnaskun.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table warnaskun.job_batches: ~0 rows (approximately)

-- Dumping structure for table warnaskun.menus
CREATE TABLE IF NOT EXISTS `menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `menu_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` int NOT NULL,
  `stock` int NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_menu_code_unique` (`menu_code`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table warnaskun.menus: ~1 rows (approximately)
INSERT INTO `menus` (`id`, `menu_code`, `name`, `category`, `description`, `price`, `stock`, `image`, `status`, `created_at`, `updated_at`) VALUES
	(4, 'NK001', 'Nasi Kuning Originale', 'nasi', 'Nasi Kuning ori loh ya', 6000, 0, '1785938475.jpg', 1, '2026-08-05 07:01:15', '2026-08-07 10:30:14'),
	(5, 'MN001', 'Es Teh Manis', 'minuman', 'Minuman es teh segar', 5000, 10, '1785938561.jpg', 1, '2026-08-05 07:02:41', '2026-08-09 02:59:26');

-- Dumping structure for table warnaskun.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table warnaskun.migrations: ~13 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2026_07_21_074756_create_reservations_table', 1),
	(5, '2026_07_22_052614_create_subscribes_table', 2),
	(6, '2026_07_23_071420_create_pegawais_table', 3),
	(7, '2026_07_24_055448_create_menus_table', 4),
	(8, '2026_07_24_142207_add_category_to_menus_table', 5),
	(9, '2026_07_25_145007_create_orders_table', 6),
	(10, '2026_07_25_145351_create_order_items_table', 7),
	(11, '2026_07_25_190257_add_delivery_type_to_orders_table', 8),
	(12, '2026_07_25_194052_make_address_nullable_in_orders_table', 9),
	(13, '2026_07_27_142955_add_status_to_reservations_table', 10),
	(14, '2026_08_03_183434_add_menu_code_and_stock_to_menus_table', 11),
	(15, '2026_08_07_153020_create_order_histories_table', 12),
	(16, '2026_08_07_165805_add_note_and_landmark_to_order_histories_table', 13);

-- Dumping structure for table warnaskun.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_type` enum('antar','ambil') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'antar',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landmark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `total` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Menunggu',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table warnaskun.orders: ~0 rows (approximately)
INSERT INTO `orders` (`id`, `customer_name`, `phone`, `delivery_type`, `address`, `landmark`, `note`, `total`, `status`, `created_at`, `updated_at`) VALUES
	(18, 'tes', '555', 'ambil', NULL, NULL, 'tes 2', 5000, 'Menunggu', '2026-08-09 02:59:26', '2026-08-09 02:59:26');

-- Dumping structure for table warnaskun.order_histories
CREATE TABLE IF NOT EXISTS `order_histories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `landmark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `total` int NOT NULL,
  `items_detail` json DEFAULT NULL,
  `order_created_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table warnaskun.order_histories: ~5 rows (approximately)
INSERT INTO `order_histories` (`id`, `customer_name`, `phone`, `delivery_type`, `address`, `landmark`, `note`, `total`, `items_detail`, `order_created_at`, `created_at`, `updated_at`) VALUES
	(10, 'Fahmi', '123', 'antar', 'TES', 'TES', 'tes', 61000, '[{"id": 24, "qty": 1, "price": 6000, "menu_id": 4, "order_id": 13, "subtotal": 6000, "menu_name": "Nasi Kuning Originale", "created_at": "2026-08-07T17:01:26.000000Z", "updated_at": "2026-08-07T17:01:26.000000Z"}, {"id": 25, "qty": 11, "price": 5000, "menu_id": 5, "order_id": 13, "subtotal": 55000, "menu_name": "Es Teh Manis", "created_at": "2026-08-07T17:01:26.000000Z", "updated_at": "2026-08-07T17:01:26.000000Z"}]', '2026-08-07 10:01:26', '2026-08-07 10:02:11', '2026-08-07 10:02:11'),
	(12, 'Rusdi', '12345', 'ambil', NULL, NULL, 'sibal', 242000, '[{"id": 26, "qty": 22, "price": 5000, "menu_id": 5, "order_id": 14, "subtotal": 110000, "menu_name": "Es Teh Manis", "created_at": "2026-08-07T17:28:00.000000Z", "updated_at": "2026-08-07T17:28:00.000000Z"}, {"id": 27, "qty": 22, "price": 6000, "menu_id": 4, "order_id": 14, "subtotal": 132000, "menu_name": "Nasi Kuning Originale", "created_at": "2026-08-07T17:28:00.000000Z", "updated_at": "2026-08-07T17:28:00.000000Z"}]', '2026-08-07 10:28:00', '2026-08-07 10:28:31', '2026-08-09 02:24:16'),
	(13, 'SIBAL', '089123', 'ambil', NULL, NULL, 'Sekya', 259000, '[{"id": 28, "qty": 11, "price": 5000, "menu_id": 5, "order_id": 15, "subtotal": 55000, "menu_name": "Es Teh Manis", "created_at": "2026-08-07T17:30:14.000000Z", "updated_at": "2026-08-07T17:30:14.000000Z"}, {"id": 29, "qty": 34, "price": 6000, "menu_id": 4, "order_id": 15, "subtotal": 204000, "menu_name": "Nasi Kuning Originale", "created_at": "2026-08-07T17:30:14.000000Z", "updated_at": "2026-08-07T17:30:14.000000Z"}]', '2026-08-07 10:30:14', '2026-08-07 10:31:52', '2026-08-09 02:23:02'),
	(14, 'Rusdi', '12345', 'ambil', NULL, NULL, 'tes', 15000, '[{"id": 30, "qty": 3, "price": 5000, "menu_id": 5, "order_id": 16, "subtotal": 15000, "menu_name": "Es Teh Manis", "created_at": "2026-08-08T10:11:40.000000Z", "updated_at": "2026-08-08T10:11:40.000000Z"}]', '2026-08-08 03:11:40', '2026-08-08 03:12:05', '2026-08-09 02:24:16'),
	(15, 'Rusdi', '12345', 'ambil', NULL, NULL, 'tes', 5000, '[{"id": 31, "qty": 1, "price": 5000, "menu_id": 5, "order_id": 17, "subtotal": 5000, "menu_name": "Es Teh Manis", "created_at": "2026-08-09T09:04:15.000000Z", "updated_at": "2026-08-09T09:04:15.000000Z"}]', '2026-08-09 02:04:15', '2026-08-09 02:04:36', '2026-08-09 02:24:16');

-- Dumping structure for table warnaskun.order_items
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `menu_id` bigint unsigned NOT NULL,
  `menu_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `qty` int NOT NULL,
  `subtotal` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`),
  KEY `order_items_menu_id_foreign` (`menu_id`),
  CONSTRAINT `order_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table warnaskun.order_items: ~0 rows (approximately)
INSERT INTO `order_items` (`id`, `order_id`, `menu_id`, `menu_name`, `price`, `qty`, `subtotal`, `created_at`, `updated_at`) VALUES
	(32, 18, 5, 'Es Teh Manis', 5000, 1, 5000, '2026-08-09 02:59:26', '2026-08-09 02:59:26');

-- Dumping structure for table warnaskun.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table warnaskun.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table warnaskun.reservations
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `person` tinyint unsigned NOT NULL,
  `reservation_date` date NOT NULL,
  `reservation_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Menunggu',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table warnaskun.reservations: ~0 rows (approximately)

-- Dumping structure for table warnaskun.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table warnaskun.sessions: ~2 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('VsuEO2oJpM8TRlt95AJC7IIhYz06tXLywyBgttck', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJiWVdqOEgwZjZWUE9IN2hJM05QYXJnRGVjcmJ0RnE4cVpraUFvWklEIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJjYXJ0IjpbXSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3dhcm5hc2t1bi50ZXN0XC9hZG1pblwvb3JkZXJzXC8xOFwvbW9kYWwiLCJyb3V0ZSI6Im9yZGVycy5tb2RhbCJ9LCJ1cmwiOnsiaW50ZW5kZWQiOiJodHRwOlwvXC93YXJuYXNrdW4udGVzdFwvYWRtaW5cL2N1c3RvbWVycyJ9LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MX0=', 1786270951);

-- Dumping structure for table warnaskun.subscribes
CREATE TABLE IF NOT EXISTS `subscribes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subscribes_email_address_unique` (`email_address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table warnaskun.subscribes: ~0 rows (approximately)

-- Dumping structure for table warnaskun.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table warnaskun.users: ~0 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin Warung', 'ibuopik@warnaskun.eat', NULL, '$2y$12$fe6WdVsvsoq4QkOf0J.dt.XuY.TyDK5BfCPZ.g9NjfyE1ASfCozF2', NULL, '2026-08-03 11:53:56', '2026-08-03 11:53:56');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
