-- Adminer 4.8.1 MySQL 10.11.11-MariaDB-0ubuntu0.24.04.2 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `published_year` year(4) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `synopsis` text DEFAULT NULL,
  `pages` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `books_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `books` (`id`, `title`, `author`, `category_id`, `published_year`, `created_at`, `updated_at`, `synopsis`, `pages`) VALUES
(1,	'Dilan 19455',	'Fernanda',	2,	'2000',	'2025-05-06 03:59:31',	'2025-05-15 06:24:49',	'Menceritakan seorang siswa SMA yang menyukai seorang gadis di sekolahnya yg bernama MIlea',	50),
(2,	'Indonesia Dalam Arus Sejarah',	'Taufik Abdullah',	4,	'2012',	'2025-05-06 04:10:21',	'2025-05-06 04:10:21',	NULL,	NULL),
(3,	'Ciro Berhati Biru',	'Fernanda',	4,	'2025',	'2025-05-06 04:11:08',	'2025-05-06 04:11:08',	NULL,	NULL),
(5,	'Pria Kesedihan',	'Fernanda',	2,	'2007',	'2025-05-06 04:40:42',	'2025-05-06 07:58:03',	NULL,	NULL),
(7,	'Cerita SMP',	'FR',	3,	'2019',	'2025-05-06 07:24:33',	'2025-05-06 07:56:09',	NULL,	NULL),
(8,	'Disiplin Di Dalam Kehidupan',	'Dosen',	3,	'1995',	'2025-05-06 08:35:39',	'2025-05-06 08:40:30',	NULL,	NULL),
(10,	'Jumbo',	'Someone',	2,	'2025',	'2025-05-07 02:12:14',	'2025-05-07 02:12:14',	'Anak',	45),
(12,	'arsenal',	'arteta',	4,	'2023',	'2025-05-07 03:54:28',	'2025-05-07 03:54:28',	'satpam piala EPL',	3),
(17,	'All I Want',	'Olivia',	10,	'2021',	'2025-05-09 02:26:06',	'2025-05-09 06:12:49',	'nonee',	16),
(18,	'Naruto',	'Masashi Kishimoto',	9,	'2000',	'2025-05-14 02:46:01',	'2025-05-14 02:46:01',	'naruto',	207),
(19,	'tes',	'tes',	5,	'2019',	'2025-05-15 06:25:11',	'2025-05-15 06:25:11',	'tes',	23);

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2,	'Fiksi',	'2025-05-06 04:05:10',	'2025-05-06 04:05:10'),
(3,	'Pendidikan',	'2025-05-06 04:05:48',	'2025-05-06 04:05:48'),
(4,	'Sejarah',	'2025-05-06 04:05:58',	'2025-05-06 04:05:58'),
(5,	'Teknologi',	'2025-05-06 04:06:10',	'2025-05-06 04:32:20'),
(6,	'Non FIksi',	'2025-05-06 08:40:49',	'2025-05-06 08:40:49'),
(7,	'Fantasi',	'2025-05-07 03:55:22',	'2025-05-07 03:55:22'),
(8,	'Horror',	'2025-05-07 03:57:04',	'2025-05-07 03:57:04'),
(9,	'Komik',	'2025-05-07 04:35:24',	'2025-05-07 04:35:24'),
(10,	'novel',	'2025-05-08 08:38:37',	'2025-05-08 08:38:37');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','petugas') NOT NULL DEFAULT 'petugas',
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`id`, `username`, `password`, `role`, `email`) VALUES
(1,	'admin',	'admin123',	'admin',	'');

-- 2025-05-19 04:32:25
