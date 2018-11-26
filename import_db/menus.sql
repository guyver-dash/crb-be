-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 22, 2018 at 09:16 AM
-- Server version: 5.7.21
-- PHP Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pbmis_updated_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'System Settings', NULL, '2017-11-24 02:42:31', '2017-11-24 02:42:31'),
(2, 'Productions', NULL, '2017-11-24 02:42:54', '2017-11-24 02:42:54'),
(3, 'Breeds', NULL, '2017-11-24 02:42:57', '2017-11-24 02:42:57'),
(4, 'Purchases Modules', NULL, '2017-11-24 02:43:04', '2017-11-24 02:43:04'),
(5, 'Sales', NULL, '2017-11-24 02:43:11', '2017-11-24 02:43:11'),
(6, 'Inventories', NULL, '2017-11-24 02:43:19', '2017-11-24 02:43:19'),
(7, 'General Ledgers', NULL, '2017-11-24 02:43:22', '2017-11-24 02:43:22'),
(8, 'Payroll', NULL, '2017-11-24 02:43:27', '2017-11-24 02:43:27'),
(9, 'CRM', NULL, '2017-11-24 02:43:28', '2017-11-24 02:43:28'),
(10, 'HRIS', NULL, '2017-11-24 02:43:33', '2017-11-24 02:43:33'),
(11, 'Reports', NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
