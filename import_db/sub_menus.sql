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
-- Table structure for table `sub_menus`
--

DROP TABLE IF EXISTS `sub_menus`;
CREATE TABLE IF NOT EXISTS `sub_menus` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `sub_menus_menu_id_foreign` (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_menus`
--

INSERT INTO `sub_menus` (`id`, `name`, `description`, `uri`, `menu_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Company', 'Company Description', '/dashboard/company', 1, '2017-11-24 02:42:33', '2017-11-24 02:42:33', 0),
(2, 'Company Tax Table', 'Company Tax Table Description', '/dashboard/companytaxtable', 1, '2017-11-24 02:42:34', '2017-11-24 02:42:34', 0),
(3, 'Company Statutory Table ', 'Company Statutory Table  Description', '/dashboard/companystatutorytable', 1, '2017-11-24 02:42:35', '2017-11-24 02:42:35', 0),
(4, 'Payroll Setup', 'Payroll Setup Description', '/dashboard/payrollsetup', 1, '2017-11-24 02:42:36', '2017-11-24 02:42:36', 0),
(5, 'Entities', 'Entities Description', '/dashboard/entities', 1, '2017-11-24 02:42:37', '2017-11-24 02:42:37', 1),
(6, 'User', 'User Description', '/dashboard/user', 1, '2017-11-24 02:42:39', '2017-11-24 02:42:39', 1),
(7, 'Customers', 'Customers Description', '/dashboard/customers', 1, '2017-11-24 02:42:40', '2017-11-24 02:42:40', 0),
(8, 'Sales Representative', 'Sales Representative Description', '/dashboard/salesrepresentative', 1, '2017-11-24 02:42:41', '2017-11-24 02:42:41', 0),
(9, 'Tax Codes', 'Tax Codes Description', '/dashboard/taxcodes', 1, '2017-11-24 02:42:42', '2017-11-24 02:42:42', 0),
(10, 'Taxes Authorities', 'Taxes Authorities Description', '/dashboard/taxesauthorities', 1, '2017-11-24 02:42:43', '2017-11-24 02:42:43', 0),
(11, 'Vendor ', 'Vendor  Description', '/dashboard/vendor', 1, '2017-11-24 02:42:44', '2017-11-24 02:42:44', 1),
(12, 'Inventory Items', 'Inventory Items Description', '/dashboard/inventoryitems', 1, '2017-11-24 02:42:45', '2017-11-24 02:42:45', 0),
(13, 'Employees', 'Employees Description', '/dashboard/employee', 1, '2017-11-24 02:42:46', '2017-11-24 02:42:46', 1),
(14, 'Chart of Accounts', 'Chart of Accounts Description', '/dashboard/chartofaccounts', 1, '2017-11-24 02:42:47', '2017-11-24 02:42:47', 1),
(15, 'Item Prices', 'Item Prices Description', '/dashboard/itemprices', 1, '2017-11-24 02:42:48', '2017-11-24 02:42:48', 0),
(16, 'Employee Billing Rates', 'Employee Billing Rates Description', '/dashboard/employeebillingrates', 1, '2017-11-24 02:42:49', '2017-11-24 02:42:49', 0),
(17, 'Sub-Contractor', 'Sub-Contractor Description', '/dashboard/sub-contractor', 1, '2017-11-24 02:42:50', '2017-11-24 02:42:50', 0),
(18, 'Jobs', 'Jobs Description', '/dashboard/jobs', 1, '2017-11-24 02:42:51', '2017-11-24 02:42:51', 0),
(19, 'KYC', 'KYC Description', '/dashboard/kyc', 1, '2017-11-24 02:42:52', '2017-11-24 02:42:52', 1),
(20, 'User Type', 'User Type Description', '/dashboard/usertype', 1, '2017-11-24 02:42:53', '2017-11-24 02:42:53', 1),
(21, 'Products', 'Products Description', '/dashboard/product', 6, '2017-11-24 02:42:54', '2017-11-24 02:42:54', 1),
(22, 'Production Board', 'Production Board Description', '/dashboard/production_board', 2, '2017-11-24 02:42:55', '2017-11-24 02:42:55', 1),
(23, 'Production', 'Production Description', '/dashboard/production', 2, '2017-11-24 02:42:56', '2017-11-24 02:42:56', 1),
(24, 'Scale', 'Scale Description', '/dashboard/Scale', 3, '2017-11-24 02:42:58', '2017-11-24 02:42:58', 0),
(25, 'Mix & Mold', 'Mix & Mold Description', '/dashboard/Mix & Mold', 3, '2017-11-24 02:42:59', '2017-11-24 02:42:59', 0),
(26, 'Proof', 'Proof Description', '/dashboard/Proof', 3, '2017-11-24 02:43:00', '2017-11-24 02:43:00', 0),
(27, 'Pre-Oven QA', 'Pre-Oven QA Description', '/dashboard/Pre-Oven QA', 3, '2017-11-24 02:43:01', '2017-11-24 02:43:01', 0),
(28, 'Bake/Oven', 'Bake/Oven Description', '/dashboard/Bake/Oven', 3, '2017-11-24 02:43:02', '2017-11-24 02:43:02', 0),
(29, 'Post-Oven QA', 'Post-Oven QA Description', '/dashboard/Post-Oven QA', 3, '2017-11-24 02:43:03', '2017-11-24 02:43:03', 0),
(30, 'Purchase Request', 'Purchase Request Description', '/dashboard/purchase_request', 4, '2017-11-24 02:43:05', '2017-11-24 02:43:05', 1),
(31, 'Canvass', 'Canvass Description', '/dashboard/canvass', 4, '2017-11-24 02:43:06', '2017-11-24 02:43:06', 1),
(32, 'Purchase Orders', 'Purchase Orders Description', '/dashboard/purchase_orders', 4, '2017-11-24 02:43:07', '2017-11-24 02:43:07', 1),
(33, 'Purchase Receive', 'Purchase Receive Description', '/dashboard/purchase_receive2', 4, '2017-11-24 02:43:08', '2017-11-24 02:43:08', 1),
(34, 'Purchase Memo', 'Purchase Memo Description', '/dashboard/Purchase Memo', 4, '2017-11-24 02:43:09', '2017-11-24 02:43:09', 1),
(35, 'Payment', 'Payment Description', '/dashboard/payments', 4, '2017-11-24 02:43:10', '2017-11-24 02:43:10', 1),
(36, 'Sales Quotes', 'Sales Quotes Description', '/dashboard/Sales Quotes', 5, '2017-11-24 02:43:12', '2017-11-24 02:43:12', 0),
(37, 'Sales Order', 'Sales Order Description', '/dashboard/sales_order', 5, '2017-11-24 02:43:12', '2017-11-24 02:43:12', 1),
(38, 'Sales and Invoicing', 'Sales and Invoicing Description', '/dashboard/invoice', 5, '2017-11-24 02:43:14', '2017-11-24 02:43:14', 1),
(39, 'Point of Sales', 'Point of Sales Description', '/dashboard/point_of_sales', 5, '2017-11-24 02:43:15', '2017-11-24 02:43:15', 1),
(40, 'Sales Memo', 'Sales Memo Description', '/dashboard/Sales Memo', 5, '2017-11-24 02:43:16', '2017-11-24 02:43:16', 0),
(41, 'Customer Statement', 'Customer Statement Description', '/dashboard/Customer Statement', 5, '2017-11-24 02:43:17', '2017-11-24 02:43:17', 0),
(42, 'Receipt', 'Receipt Description', '/dashboard/Receipt', 5, '2017-11-24 02:43:18', '2017-11-24 02:43:18', 0),
(44, 'Adjustment', 'Adjustment Description', '/dashboard/Adjustment', 6, '2017-11-24 02:43:20', '2017-11-24 02:43:20', 0),
(45, 'Build ', 'Build  Description', '/dashboard/Build ', 6, '2017-11-24 02:43:21', '2017-11-24 02:43:21', 0),
(46, 'General Journal', 'General Journal Description', '/dashboard/General Journal', 7, '2017-11-24 02:43:23', '2017-11-24 02:43:23', 0),
(47, 'Accounting Period', 'Accounting Period Description', '/dashboard/Accounting Period', 7, '2017-11-24 02:43:24', '2017-11-24 02:43:24', 0),
(48, 'Account Reconciliation', 'Account Reconciliation Description', '/dashboard/Account Reconciliation', 7, '2017-11-24 02:43:25', '2017-11-24 02:43:25', 0),
(49, 'Account Register', 'Account Register Description', '/dashboard/Account Register', 7, '2017-11-24 02:43:26', '2017-11-24 02:43:26', 0),
(50, 'Payroll Entry', 'Payroll Entry Description', '/dashboard/Payroll Entry', 8, '2017-11-24 02:43:27', '2017-11-24 02:43:27', 0),
(51, 'Prospecting', 'Prospecting Description', '/dashboard/Prospecting', 9, '2017-11-24 02:43:29', '2017-11-24 02:43:29', 0),
(52, 'After Sales Care', 'After Sales Care Description', '/dashboard/After Sales Care', 9, '2017-11-24 02:43:30', '2017-11-24 02:43:30', 0),
(53, 'Customer Feedback', 'Customer Feedback Description', '/dashboard/Customer Feedback', 9, '2017-11-24 02:43:31', '2017-11-24 02:43:31', 0),
(54, 'Promos and Privileges', 'Promos and Privileges Description', '/dashboard/Promos and Privileges', 9, '2017-11-24 02:43:32', '2017-11-24 02:43:32', 0),
(55, '201 File', '201 File Description', '/dashboard/201 File', 10, '2017-11-24 02:43:34', '2017-11-24 02:43:34', 0),
(56, 'Workforce and Succession', 'Workforce and Succession Description', '/dashboard/Workforce and Succession', 10, '2017-11-24 02:43:35', '2017-11-24 02:43:35', 0),
(57, 'Recruitment and Hiring ', 'Recruitment and Hiring  Description', '/dashboard/Recruitment and Hiring ', 10, '2017-11-24 02:43:36', '2017-11-24 02:43:36', 0),
(58, 'Onboarding', 'Onboarding Description', '/dashboard/Onboarding', 10, '2017-11-24 02:43:36', '2017-11-24 02:43:36', 0),
(59, 'Training and Personnel Development', 'Training and Personnel Development Description', '/dashboard/Training and Personnel Development', 10, '2017-11-24 02:43:37', '2017-11-24 02:43:37', 0),
(60, 'Appraisal', 'Appraisal Description', '/dashboard/appraisal', 10, '2017-11-24 02:43:38', '2017-11-24 02:43:38', 0),
(61, 'Benefits and Compensation', 'Benefits and Compensation Description', '/dashboard/benefits_and_compensation', 10, '2017-11-24 02:43:39', '2017-11-24 02:43:39', 0),
(62, 'Time Management', 'Time Management Description', '/dashboard/time_management', 10, '2017-11-24 02:43:40', '2017-11-24 02:43:40', 0),
(63, 'Skills Gap', 'Skills Gap Description', '/dashboard/skills_gap', 10, '2017-11-24 02:43:41', '2017-11-24 02:43:41', 0),
(64, 'Report', 'Report', '/dashboard/inventory_report', 6, NULL, NULL, 1),
(65, 'Receiving Reports', 'Reports for all the purchases received transactions', '/dashboard/receiving_reports', 4, NULL, NULL, 1),
(66, 'Cash Transfer', 'Cash Transfer', '/dashboard/cash_transfer', 5, NULL, NULL, 1),
(67, 'Product Transfer', 'Product Transfer', '/dashboard/product_transfer', 5, NULL, NULL, 1),
(68, 'Sales', 'Sales Report', '/dashboard/sales_report', 11, NULL, NULL, 1),
(69, 'Ingredients', 'Ingredients', '/dashboard/ingredient', 6, NULL, NULL, 1),
(70, 'Non Bread', 'Non Bread', '/dashboard/nonbread', 6, NULL, NULL, 1),
(71, 'Invoice', 'Invoice', '/dashboard/invoice', 4, NULL, NULL, 1),
(72, 'COCI', 'COCI', '/dashboard/coci', 5, NULL, NULL, 1),
(73, 'Productions', 'Productions Report', '/dashboard/productions_report', 11, NULL, NULL, 1),
(74, 'Performance', 'Performance Report', '/dashboard/performance_report', 11, NULL, NULL, 1),
(75, 'Inventory', 'Inventory Summary', '/dashboard/inventory_summary', 11, NULL, NULL, 1),
(76, 'Tradenames', 'Trade Name menu', '/dashboard/tradenames', 1, NULL, NULL, 1),
(77, 'Areas', 'Areas menu', '/dashboard/areas', 1, NULL, NULL, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
