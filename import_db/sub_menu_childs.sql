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
-- Table structure for table `sub_menu_childs`
--

DROP TABLE IF EXISTS `sub_menu_childs`;
CREATE TABLE IF NOT EXISTS `sub_menu_childs` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `uri` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_menu_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `create` tinyint(1) NOT NULL DEFAULT '0',
  `update` tinyint(1) NOT NULL DEFAULT '0',
  `delete` tinyint(1) NOT NULL DEFAULT '0',
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `publish` tinyint(1) NOT NULL DEFAULT '0',
  `download` tinyint(1) NOT NULL DEFAULT '0',
  `override` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `sub_menu_childs_sub_menu_id_foreign` (`sub_menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=268 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_menu_childs`
--

INSERT INTO `sub_menu_childs` (`id`, `name`, `description`, `uri`, `sub_menu_id`, `created_at`, `updated_at`, `create`, `update`, `delete`, `read`, `publish`, `download`, `override`) VALUES
(127, '', 'description', '/dashboard/company', 127, '2017-11-23 08:59:38', '2017-11-23 08:59:38', 0, 0, 0, 0, 0, 0, 0),
(128, '', 'description', '/dashboard/companytaxtable', 128, '2017-11-23 08:59:39', '2017-11-23 08:59:39', 0, 0, 0, 0, 0, 0, 0),
(129, '', 'description', '/dashboard/companystatutorytable', 129, '2017-11-23 08:59:40', '2017-11-23 08:59:40', 0, 0, 0, 0, 0, 0, 0),
(130, '', 'description', '/dashboard/payrollsetup', 130, '2017-11-23 08:59:40', '2017-11-23 08:59:40', 0, 0, 0, 0, 0, 0, 0),
(131, '', 'description', '/dashboard/entities', 131, '2017-11-23 08:59:41', '2017-11-23 08:59:41', 0, 0, 0, 0, 0, 0, 0),
(132, '', 'description', '/dashboard/user', 132, '2017-11-23 08:59:41', '2017-11-23 08:59:41', 0, 0, 0, 0, 0, 0, 0),
(133, '', 'description', '/dashboard/customers', 133, '2017-11-23 08:59:42', '2017-11-23 08:59:42', 0, 0, 0, 0, 0, 0, 0),
(134, '', 'description', '/dashboard/salesrepresentative', 134, '2017-11-23 08:59:42', '2017-11-23 08:59:42', 0, 0, 0, 0, 0, 0, 0),
(135, '', 'description', '/dashboard/taxcodes', 135, '2017-11-23 08:59:43', '2017-11-23 08:59:43', 0, 0, 0, 0, 0, 0, 0),
(136, '', 'description', '/dashboard/taxesauthorities', 136, '2017-11-23 08:59:43', '2017-11-23 08:59:43', 0, 0, 0, 0, 0, 0, 0),
(137, '', 'description', '/dashboard/vendor', 137, '2017-11-23 08:59:44', '2017-11-23 08:59:44', 0, 0, 0, 0, 0, 0, 0),
(138, '', 'description', '/dashboard/inventoryitems', 138, '2017-11-23 08:59:44', '2017-11-23 08:59:44', 0, 0, 0, 0, 0, 0, 0),
(139, '', 'description', '/dashboard/employees', 139, '2017-11-23 08:59:45', '2017-11-23 08:59:45', 0, 0, 0, 0, 0, 0, 0),
(140, '', 'description', '/dashboard/chartofaccounts', 140, '2017-11-23 08:59:46', '2017-11-23 08:59:46', 0, 0, 0, 0, 0, 0, 0),
(141, '', 'description', '/dashboard/itemprices', 141, '2017-11-23 08:59:46', '2017-11-23 08:59:46', 0, 0, 0, 0, 0, 0, 0),
(142, '', 'description', '/dashboard/employeebillingrates', 142, '2017-11-23 08:59:47', '2017-11-23 08:59:47', 0, 0, 0, 0, 0, 0, 0),
(143, '', 'description', '/dashboard/sub-contractor', 143, '2017-11-23 08:59:47', '2017-11-23 08:59:47', 0, 0, 0, 0, 0, 0, 0),
(144, '', 'description', '/dashboard/jobs', 144, '2017-11-23 08:59:48', '2017-11-23 08:59:48', 0, 0, 0, 0, 0, 0, 0),
(145, '', 'description', '/dashboard/kyc', 145, '2017-11-23 08:59:48', '2017-11-23 08:59:48', 0, 0, 0, 0, 0, 0, 0),
(146, '', 'description', '/dashboard/usertype', 146, '2017-11-23 08:59:49', '2017-11-23 08:59:49', 0, 0, 0, 0, 0, 0, 0),
(147, '', 'description', '/dashboard/products', 147, '2017-11-23 08:59:50', '2017-11-23 08:59:50', 0, 0, 0, 0, 0, 0, 0),
(148, '', 'description', '/dashboard/productionroute', 148, '2017-11-23 08:59:50', '2017-11-23 08:59:50', 0, 0, 0, 0, 0, 0, 0),
(149, '', 'description', '/dashboard/productionboard', 149, '2017-11-23 08:59:51', '2017-11-23 08:59:51', 0, 0, 0, 0, 0, 0, 0),
(150, '', 'description', '/dashboard/scale', 150, '2017-11-23 08:59:52', '2017-11-23 08:59:52', 0, 0, 0, 0, 0, 0, 0),
(151, '', 'description', '/dashboard/mix&mold', 151, '2017-11-23 08:59:52', '2017-11-23 08:59:52', 0, 0, 0, 0, 0, 0, 0),
(152, '', 'description', '/dashboard/proof', 152, '2017-11-23 08:59:53', '2017-11-23 08:59:53', 0, 0, 0, 0, 0, 0, 0),
(153, '', 'description', '/dashboard/pre-ovenqa', 153, '2017-11-23 08:59:53', '2017-11-23 08:59:53', 0, 0, 0, 0, 0, 0, 0),
(154, '', 'description', '/dashboard/bake/oven', 154, '2017-11-23 08:59:54', '2017-11-23 08:59:54', 0, 0, 0, 0, 0, 0, 0),
(155, '', 'description', '/dashboard/post-ovenqa', 155, '2017-11-23 08:59:54', '2017-11-23 08:59:54', 0, 0, 0, 0, 0, 0, 0),
(156, '', 'description', '/dashboard/purchaserequest', 156, '2017-11-23 08:59:55', '2017-11-23 08:59:55', 0, 0, 0, 0, 0, 0, 0),
(157, '', 'description', '/dashboard/canvass', 157, '2017-11-23 08:59:56', '2017-11-23 08:59:56', 0, 0, 0, 0, 0, 0, 0),
(158, '', 'description', '/dashboard/purchaseorders', 158, '2017-11-23 08:59:56', '2017-11-23 08:59:56', 0, 0, 0, 0, 0, 0, 0),
(159, '', 'description', '/dashboard/purchasereceive', 159, '2017-11-23 08:59:57', '2017-11-23 08:59:57', 0, 0, 0, 0, 0, 0, 0),
(160, '', 'description', '/dashboard/purchasememo', 160, '2017-11-23 08:59:57', '2017-11-23 08:59:57', 0, 0, 0, 0, 0, 0, 0),
(161, '', 'description', '/dashboard/payment', 161, '2017-11-23 08:59:58', '2017-11-23 08:59:58', 0, 0, 0, 0, 0, 0, 0),
(162, '', 'description', '/dashboard/salesquotes', 162, '2017-11-23 08:59:59', '2017-11-23 08:59:59', 0, 0, 0, 0, 0, 0, 0),
(163, '', 'description', '/dashboard/salesorder', 163, '2017-11-23 09:00:00', '2017-11-23 09:00:00', 0, 0, 0, 0, 0, 0, 0),
(164, '', 'description', '/dashboard/salesandinvoicing', 164, '2017-11-23 09:00:00', '2017-11-23 09:00:00', 0, 0, 0, 0, 0, 0, 0),
(165, '', 'description', '/dashboard/pointofsales', 165, '2017-11-23 09:00:01', '2017-11-23 09:00:01', 0, 0, 0, 0, 0, 0, 0),
(166, '', 'description', '/dashboard/salesmemo', 166, '2017-11-23 09:00:01', '2017-11-23 09:00:01', 0, 0, 0, 0, 0, 0, 0),
(167, '', 'description', '/dashboard/customerstatement', 167, '2017-11-23 09:00:02', '2017-11-23 09:00:02', 0, 0, 0, 0, 0, 0, 0),
(168, '', 'description', '/dashboard/receipt', 168, '2017-11-23 09:00:02', '2017-11-23 09:00:02', 0, 0, 0, 0, 0, 0, 0),
(169, '', 'description', '/dashboard/purchasereceive', 169, '2017-11-23 09:00:03', '2017-11-23 09:00:03', 0, 0, 0, 0, 0, 0, 0),
(170, '', 'description', '/dashboard/adjustment', 170, '2017-11-23 09:00:04', '2017-11-23 09:00:04', 0, 0, 0, 0, 0, 0, 0),
(171, '', 'description', '/dashboard/build', 171, '2017-11-23 09:00:04', '2017-11-23 09:00:04', 0, 0, 0, 0, 0, 0, 0),
(172, '', 'description', '/dashboard/generaljournal', 172, '2017-11-23 09:00:05', '2017-11-23 09:00:05', 0, 0, 0, 0, 0, 0, 0),
(173, '', 'description', '/dashboard/accountingperiod', 173, '2017-11-23 09:00:06', '2017-11-23 09:00:06', 0, 0, 0, 0, 0, 0, 0),
(174, '', 'description', '/dashboard/accountreconciliation', 174, '2017-11-23 09:00:06', '2017-11-23 09:00:06', 0, 0, 0, 0, 0, 0, 0),
(175, '', 'description', '/dashboard/accountregister', 175, '2017-11-23 09:00:07', '2017-11-23 09:00:07', 0, 0, 0, 0, 0, 0, 0),
(176, '', 'description', '/dashboard/payrollentry', 176, '2017-11-23 09:00:08', '2017-11-23 09:00:08', 0, 0, 0, 0, 0, 0, 0),
(177, '', 'description', '/dashboard/prospecting', 177, '2017-11-23 09:00:08', '2017-11-23 09:00:08', 0, 0, 0, 0, 0, 0, 0),
(178, '', 'description', '/dashboard/aftersalescare', 178, '2017-11-23 09:00:09', '2017-11-23 09:00:09', 0, 0, 0, 0, 0, 0, 0),
(179, '', 'description', '/dashboard/customerfeedback', 179, '2017-11-23 09:00:09', '2017-11-23 09:00:09', 0, 0, 0, 0, 0, 0, 0),
(180, '', 'description', '/dashboard/promosandprivileges', 180, '2017-11-23 09:00:10', '2017-11-23 09:00:10', 0, 0, 0, 0, 0, 0, 0),
(181, '', 'description', '/dashboard/201file', 181, '2017-11-23 09:00:11', '2017-11-23 09:00:11', 0, 0, 0, 0, 0, 0, 0),
(182, '', 'description', '/dashboard/workforceandsuccession', 182, '2017-11-23 09:00:11', '2017-11-23 09:00:11', 0, 0, 0, 0, 0, 0, 0),
(183, '', 'description', '/dashboard/recruitmentandhiring', 183, '2017-11-23 09:00:12', '2017-11-23 09:00:12', 0, 0, 0, 0, 0, 0, 0),
(184, '', 'description', '/dashboard/onboarding', 184, '2017-11-23 09:00:12', '2017-11-23 09:00:12', 0, 0, 0, 0, 0, 0, 0),
(185, '', 'description', '/dashboard/trainingandpersonneldevelopment', 185, '2017-11-23 09:00:13', '2017-11-23 09:00:13', 0, 0, 0, 0, 0, 0, 0),
(186, '', 'description', '/dashboard/appraisal', 186, '2017-11-23 09:00:13', '2017-11-23 09:00:13', 0, 0, 0, 0, 0, 0, 0),
(187, '', 'description', '/dashboard/benefitsandcompensation', 187, '2017-11-23 09:00:14', '2017-11-23 09:00:14', 0, 0, 0, 0, 0, 0, 0),
(188, '', 'description', '/dashboard/timemanagement', 188, '2017-11-23 09:00:15', '2017-11-23 09:00:15', 0, 0, 0, 0, 0, 0, 0),
(189, '', 'description', '/dashboard/skillsgap', 189, '2017-11-23 09:00:15', '2017-11-23 09:00:15', 0, 0, 0, 0, 0, 0, 0),
(190, '', 'description', '/dashboard/company', 1, '2017-11-24 02:42:33', '2017-11-24 02:42:33', 0, 0, 0, 0, 0, 0, 0),
(191, '', 'description', '/dashboard/companytaxtable', 2, '2017-11-24 02:42:34', '2017-11-24 02:42:34', 0, 0, 0, 0, 0, 0, 0),
(192, '', 'description', '/dashboard/companystatutorytable', 3, '2017-11-24 02:42:36', '2017-11-24 02:42:36', 0, 0, 0, 0, 0, 0, 0),
(193, '', 'description', '/dashboard/payrollsetup', 4, '2017-11-24 02:42:37', '2017-11-24 02:42:37', 0, 0, 0, 0, 0, 0, 0),
(194, '', 'description', '/dashboard/entities', 5, '2017-11-24 02:42:38', '2017-11-24 02:42:38', 0, 0, 0, 0, 0, 0, 0),
(195, '', 'description', '/dashboard/user', 6, '2017-11-24 02:42:39', '2017-11-24 02:42:39', 0, 0, 0, 0, 0, 0, 0),
(196, '', 'description', '/dashboard/customers', 7, '2017-11-24 02:42:40', '2017-11-24 02:42:40', 0, 0, 0, 0, 0, 0, 0),
(197, '', 'description', '/dashboard/salesrepresentative', 8, '2017-11-24 02:42:41', '2017-11-24 02:42:41', 0, 0, 0, 0, 0, 0, 0),
(198, '', 'description', '/dashboard/taxcodes', 9, '2017-11-24 02:42:42', '2017-11-24 02:42:42', 0, 0, 0, 0, 0, 0, 0),
(199, '', 'description', '/dashboard/taxesauthorities', 10, '2017-11-24 02:42:43', '2017-11-24 02:42:43', 0, 0, 0, 0, 0, 0, 0),
(200, '', 'description', '/dashboard/vendor', 11, '2017-11-24 02:42:44', '2017-11-24 02:42:44', 0, 0, 0, 0, 0, 0, 0),
(201, '', 'description', '/dashboard/inventoryitems', 12, '2017-11-24 02:42:45', '2017-11-24 02:42:45', 0, 0, 0, 0, 0, 0, 0),
(202, '', 'description', '/dashboard/employees', 13, '2017-11-24 02:42:46', '2017-11-24 02:42:46', 0, 0, 0, 0, 0, 0, 0),
(203, '', 'description', '/dashboard/chartofaccounts', 14, '2017-11-24 02:42:47', '2017-11-24 02:42:47', 0, 0, 0, 0, 0, 0, 0),
(204, '', 'description', '/dashboard/itemprices', 15, '2017-11-24 02:42:48', '2017-11-24 02:42:48', 0, 0, 0, 0, 0, 0, 0),
(205, '', 'description', '/dashboard/employeebillingrates', 16, '2017-11-24 02:42:49', '2017-11-24 02:42:49', 0, 0, 0, 0, 0, 0, 0),
(206, '', 'description', '/dashboard/sub-contractor', 17, '2017-11-24 02:42:50', '2017-11-24 02:42:50', 0, 0, 0, 0, 0, 0, 0),
(207, '', 'description', '/dashboard/jobs', 18, '2017-11-24 02:42:51', '2017-11-24 02:42:51', 0, 0, 0, 0, 0, 0, 0),
(208, '', 'description', '/dashboard/kyc', 19, '2017-11-24 02:42:52', '2017-11-24 02:42:52', 0, 0, 0, 0, 0, 0, 0),
(209, '', 'description', '/dashboard/usertype', 20, '2017-11-24 02:42:53', '2017-11-24 02:42:53', 0, 0, 0, 0, 0, 0, 0),
(210, '', 'description', '/dashboard/products', 21, '2017-11-24 02:42:55', '2017-11-24 02:42:55', 0, 0, 0, 0, 0, 0, 0),
(211, '', 'description', '/dashboard/productionroute', 22, '2017-11-24 02:42:56', '2017-11-24 02:42:56', 0, 0, 0, 0, 0, 0, 0),
(212, '', 'description', '/dashboard/productionboard', 23, '2017-11-24 02:42:57', '2017-11-24 02:42:57', 0, 0, 0, 0, 0, 0, 0),
(213, '', 'description', '/dashboard/scale', 24, '2017-11-24 02:42:58', '2017-11-24 02:42:58', 0, 0, 0, 0, 0, 0, 0),
(214, '', 'description', '/dashboard/mix&mold', 25, '2017-11-24 02:42:59', '2017-11-24 02:42:59', 0, 0, 0, 0, 0, 0, 0),
(215, '', 'description', '/dashboard/proof', 26, '2017-11-24 02:43:00', '2017-11-24 02:43:00', 0, 0, 0, 0, 0, 0, 0),
(216, '', 'description', '/dashboard/pre-ovenqa', 27, '2017-11-24 02:43:01', '2017-11-24 02:43:01', 0, 0, 0, 0, 0, 0, 0),
(217, '', 'description', '/dashboard/bake/oven', 28, '2017-11-24 02:43:02', '2017-11-24 02:43:02', 0, 0, 0, 0, 0, 0, 0),
(218, '', 'description', '/dashboard/post-ovenqa', 29, '2017-11-24 02:43:04', '2017-11-24 02:43:04', 0, 0, 0, 0, 0, 0, 0),
(219, '', 'description', '/dashboard/purchaserequest', 30, '2017-11-24 02:43:05', '2017-11-24 02:43:05', 0, 0, 0, 0, 0, 0, 0),
(220, '', 'description', '/dashboard/canvass', 31, '2017-11-24 02:43:06', '2017-11-24 02:43:06', 0, 0, 0, 0, 0, 0, 0),
(221, '', 'description', '/dashboard/purchaseorders', 32, '2017-11-24 02:43:07', '2017-11-24 02:43:07', 0, 0, 0, 0, 0, 0, 0),
(222, '', 'description', '/dashboard/purchasereceive', 33, '2017-11-24 02:43:08', '2017-11-24 02:43:08', 0, 0, 0, 0, 0, 0, 0),
(223, '', 'description', '/dashboard/purchasememo', 34, '2017-11-24 02:43:09', '2017-11-24 02:43:09', 0, 0, 0, 0, 0, 0, 0),
(224, '', 'description', '/dashboard/payment', 35, '2017-11-24 02:43:10', '2017-11-24 02:43:10', 0, 0, 0, 0, 0, 0, 0),
(225, '', 'description', '/dashboard/salesquotes', 36, '2017-11-24 02:43:12', '2017-11-24 02:43:12', 0, 0, 0, 0, 0, 0, 0),
(226, '', 'description', '/dashboard/salesorder', 37, '2017-11-24 02:43:13', '2017-11-24 02:43:13', 0, 0, 0, 0, 0, 0, 0),
(227, '', 'description', '/dashboard/salesandinvoicing', 38, '2017-11-24 02:43:14', '2017-11-24 02:43:14', 0, 0, 0, 0, 0, 0, 0),
(228, '', 'description', '/dashboard/pointofsales', 39, '2017-11-24 02:43:15', '2017-11-24 02:43:15', 0, 0, 0, 0, 0, 0, 0),
(229, '', 'description', '/dashboard/salesmemo', 40, '2017-11-24 02:43:16', '2017-11-24 02:43:16', 0, 0, 0, 0, 0, 0, 0),
(230, '', 'description', '/dashboard/customerstatement', 41, '2017-11-24 02:43:17', '2017-11-24 02:43:17', 0, 0, 0, 0, 0, 0, 0),
(231, '', 'description', '/dashboard/receipt', 42, '2017-11-24 02:43:18', '2017-11-24 02:43:18', 0, 0, 0, 0, 0, 0, 0),
(232, '', 'description', '/dashboard/purchasereceive', 43, '2017-11-24 02:43:19', '2017-11-24 02:43:19', 0, 0, 0, 0, 0, 0, 0),
(233, '', 'description', '/dashboard/adjustment', 44, '2017-11-24 02:43:20', '2017-11-24 02:43:20', 0, 0, 0, 0, 0, 0, 0),
(234, '', 'description', '/dashboard/build', 45, '2017-11-24 02:43:22', '2017-11-24 02:43:22', 0, 0, 0, 0, 0, 0, 0),
(235, '', 'description', '/dashboard/generaljournal', 46, '2017-11-24 02:43:23', '2017-11-24 02:43:23', 0, 0, 0, 0, 0, 0, 0),
(236, '', 'description', '/dashboard/accountingperiod', 47, '2017-11-24 02:43:24', '2017-11-24 02:43:24', 0, 0, 0, 0, 0, 0, 0),
(237, '', 'description', '/dashboard/accountreconciliation', 48, '2017-11-24 02:43:25', '2017-11-24 02:43:25', 0, 0, 0, 0, 0, 0, 0),
(238, '', 'description', '/dashboard/accountregister', 49, '2017-11-24 02:43:26', '2017-11-24 02:43:26', 0, 0, 0, 0, 0, 0, 0),
(239, '', 'description', '/dashboard/payrollentry', 50, '2017-11-24 02:43:28', '2017-11-24 02:43:28', 0, 0, 0, 0, 0, 0, 0),
(240, '', 'description', '/dashboard/prospecting', 51, '2017-11-24 02:43:29', '2017-11-24 02:43:29', 0, 0, 0, 0, 0, 0, 0),
(241, '', 'description', '/dashboard/aftersalescare', 52, '2017-11-24 02:43:30', '2017-11-24 02:43:30', 0, 0, 0, 0, 0, 0, 0),
(242, '', 'description', '/dashboard/customerfeedback', 53, '2017-11-24 02:43:31', '2017-11-24 02:43:31', 0, 0, 0, 0, 0, 0, 0),
(243, '', 'description', '/dashboard/promosandprivileges', 54, '2017-11-24 02:43:32', '2017-11-24 02:43:32', 0, 0, 0, 0, 0, 0, 0),
(244, '', 'description', '/dashboard/201file', 55, '2017-11-24 02:43:34', '2017-11-24 02:43:34', 0, 0, 0, 0, 0, 0, 0),
(245, '', 'description', '/dashboard/workforceandsuccession', 56, '2017-11-24 02:43:35', '2017-11-24 02:43:35', 0, 0, 0, 0, 0, 0, 0),
(246, '', 'description', '/dashboard/recruitmentandhiring', 57, '2017-11-24 02:43:36', '2017-11-24 02:43:36', 0, 0, 0, 0, 0, 0, 0),
(247, '', 'description', '/dashboard/onboarding', 58, '2017-11-24 02:43:37', '2017-11-24 02:43:37', 0, 0, 0, 0, 0, 0, 0),
(248, '', 'description', '/dashboard/trainingandpersonneldevelopment', 59, '2017-11-24 02:43:38', '2017-11-24 02:43:38', 0, 0, 0, 0, 0, 0, 0),
(249, '', 'description', '/dashboard/appraisal', 60, '2017-11-24 02:43:39', '2017-11-24 02:43:39', 0, 0, 0, 0, 0, 0, 0),
(250, '', 'description', '/dashboard/benefitsandcompensation', 61, '2017-11-24 02:43:39', '2017-11-24 02:43:39', 0, 0, 0, 0, 0, 0, 0),
(251, '', 'description', '/dashboard/timemanagement', 62, '2017-11-24 02:43:40', '2017-11-24 02:43:40', 0, 0, 0, 0, 0, 0, 0),
(252, '', 'description', '/dashboard/skillsgap', 63, '2017-11-24 02:43:41', '2017-11-24 02:43:41', 0, 0, 0, 0, 0, 0, 0),
(254, '', '', '', 76, NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(255, '', '', '', 77, NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(256, '', '', '', 65, NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(257, '', '', '', 71, NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(258, '', '', '', 66, NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(259, '', '', '', 67, NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(260, '', '', '', 72, NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(261, '', '', '', 64, NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(262, '', '', '', 69, NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(263, '', '', '', 70, NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(264, '', '', '', 68, NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(265, '', '', '', 73, NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(266, '', '', '', 74, NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(267, '', '', '', 75, NULL, NULL, 0, 0, 0, 0, 0, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
