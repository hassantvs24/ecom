-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 24, 2020 at 01:29 PM
-- Server version: 10.1.40-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barcelo6_client`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertise`
--

CREATE TABLE `advertise` (
  `advertiseID` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'advertise.jpg',
  `starts` datetime DEFAULT NULL,
  `ends` datetime DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertise`
--

INSERT INTO `advertise` (`advertiseID`, `name`, `description`, `img`, `starts`, `ends`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, '05204d226222c30f3850e1d38ee75773.jpg', '2019-08-01 00:00:00', '2019-08-31 23:59:59', 'Active', NULL, '2019-08-02 16:09:46', '2019-08-02 16:11:51'),
(2, NULL, NULL, '84c5d9f0fcbb1a4440ff437e7a33df06.jpg', '2019-08-01 00:00:00', '2019-08-31 23:59:59', 'Active', NULL, '2019-08-02 16:11:07', '2019-08-02 16:11:57');

-- --------------------------------------------------------

--
-- Table structure for table `carrier`
--

CREATE TABLE `carrier` (
  `carrierID` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carrier`
--

INSERT INTO `carrier` (`carrierID`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(5, 'Latush Pata', NULL, '2019-08-01 17:23:26', '2019-08-01 17:23:26'),
(4, 'BIG STICK', NULL, '2019-08-01 17:23:17', '2019-08-01 17:23:17'),
(7, 'POS LAJU', NULL, '2019-08-02 11:10:26', '2019-08-02 11:10:26');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chatID` bigint(20) UNSIGNED NOT NULL,
  `userID` bigint(20) DEFAULT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adminID` bigint(20) DEFAULT NULL,
  `adminName` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chatID`, `userID`, `name`, `email`, `adminID`, `adminName`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 'Darren', 'darren@yl2u.com', 1, 'Super Admin', 'Active', NULL, '2019-08-02 14:29:18', '2019-08-02 14:29:33');

-- --------------------------------------------------------

--
-- Table structure for table `chat_history`
--

CREATE TABLE `chat_history` (
  `chatHistoryID` bigint(20) UNSIGNED NOT NULL,
  `chatID` bigint(20) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fromType` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Customer',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_history`
--

INSERT INTO `chat_history` (`chatHistoryID`, `chatID`, `message`, `name`, `fromType`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'TESTING', 'Darren', 'Customer', NULL, '2019-08-02 14:29:18', '2019-08-02 14:29:18'),
(2, 1, 'Hi Darren', 'Super Admin', 'Admin', NULL, '2019-08-02 14:29:39', '2019-08-02 14:29:39'),
(3, 1, 'How may i help you', 'Super Admin', 'Admin', NULL, '2019-08-02 14:30:25', '2019-08-02 14:30:25'),
(4, 1, 'Hi, testing 123', 'Darren', 'Customer', NULL, '2019-08-02 14:30:40', '2019-08-02 14:30:40');

-- --------------------------------------------------------

--
-- Table structure for table `commission`
--

CREATE TABLE `commission` (
  `commissionID` bigint(20) UNSIGNED NOT NULL,
  `percents` double NOT NULL DEFAULT '0',
  `amount` double NOT NULL DEFAULT '0',
  `orderID` bigint(20) UNSIGNED NOT NULL,
  `productID` bigint(20) UNSIGNED NOT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL DEFAULT '0',
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'product.jpg',
  `userID` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commission`
--

INSERT INTO `commission` (`commissionID`, `percents`, `amount`, `orderID`, `productID`, `sku`, `name`, `category`, `price`, `img`, `userID`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 5, 10, 3, 1, 'ORG-001', 'ORANGE', 'ORANGE', 100, 'c8aae8cfbe03a4f2103effd60f787f5d.jpg', 14, NULL, '2019-08-24 13:00:08', '2019-08-24 13:00:08'),
(2, 2, 4, 3, 1, 'ORG-001', 'ORANGE', 'ORANGE', 100, 'c8aae8cfbe03a4f2103effd60f787f5d.jpg', 15, NULL, '2019-08-24 13:00:08', '2019-08-24 13:00:08'),
(3, 5, 0.135, 3, 2, 'APP-001', 'APPLE', 'APPLE', 0.9, '1a697e5d9b610cdc988bcffdb0bb749e.jpg', 14, NULL, '2019-08-24 13:00:08', '2019-08-24 13:00:08'),
(4, 2, 0.054000000000000006, 3, 2, 'APP-001', 'APPLE', 'APPLE', 0.9, '1a697e5d9b610cdc988bcffdb0bb749e.jpg', 15, NULL, '2019-08-24 13:00:08', '2019-08-24 13:00:08');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `locationID` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`locationID`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(5, 'Statum', NULL, '2019-08-01 17:23:41', '2019-08-01 17:23:41'),
(4, 'Sylhet', NULL, '2019-08-01 17:23:37', '2019-08-01 17:23:37'),
(7, 'WEST MALAYSIA', NULL, '2019-08-02 11:10:16', '2019-08-02 11:10:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_04_30_101615_create_role_table', 1),
(4, '2019_04_30_101635_create_product_table', 1),
(5, '2019_04_30_101655_create_temp_order_table', 1),
(6, '2019_04_30_101714_create_orders_table', 1),
(7, '2019_04_30_101953_create_orders_item_table', 1),
(8, '2019_04_30_102259_create_promotion_table', 1),
(9, '2019_04_30_102333_create_advertise_table', 1),
(10, '2019_04_30_102418_create_points_table', 1),
(11, '2019_04_30_102608_create_commission_table', 1),
(12, '2019_04_30_103458_create_permission_table', 1),
(13, '2019_05_10_090923_create_redemption_table', 1),
(14, '2019_05_10_091000_create_redemption_item_table', 1),
(15, '2019_05_11_051038_create_temp_order_reedim_table', 1),
(16, '2019_05_11_051212_create_order_reedim_table', 1),
(17, '2019_05_15_094012_create_chat_table', 1),
(18, '2019_05_15_094128_create_chat_history_table', 1),
(19, '2019_05_23_164326_create_pages_table', 1),
(20, '2019_07_31_095603_create_carrier_table', 2),
(21, '2019_07_31_095648_create_location_table', 2),
(22, '2019_08_01_024251_create_shipping_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` bigint(20) UNSIGNED NOT NULL,
  `orderNumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payslip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shippingID` bigint(20) DEFAULT NULL,
  `shipCost` double NOT NULL DEFAULT '0',
  `userID` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Confirm',
  `trackNumber` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `orderNumber`, `payslip`, `notes`, `shippingID`, `shipCost`, `userID`, `status`, `trackNumber`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1564748099', 'e268fff384d437b3c9921d0190707224.jpg', 'PAYMENT DONE. PLEASE CHECK.', 1, 5.596, 2, 'Paid', NULL, NULL, '2019-08-02 16:14:59', '2019-08-02 16:15:48'),
(2, '1564839370', '1026edd4ff9a575541a520a12d2d6cd8.jpg', 'REF0001', 2, 4.800000000000001, 6, 'Pending', NULL, NULL, '2019-08-03 17:36:10', '2019-08-03 17:36:10'),
(3, '1566636957', '56e758fb05f92376a1772656b6785ad0.PNG', 'REF NO:1234', 2, 7.199999999999999, 17, 'Complete', NULL, NULL, '2019-08-24 12:55:57', '2019-08-24 13:00:08');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `orderItemID` bigint(20) UNSIGNED NOT NULL,
  `orderID` bigint(20) UNSIGNED NOT NULL,
  `productID` bigint(20) UNSIGNED NOT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL DEFAULT '0',
  `qty` double NOT NULL DEFAULT '0',
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'product.jpg',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`orderItemID`, `orderID`, `productID`, `sku`, `name`, `price`, `qty`, `img`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'ORG-001', 'ORANGE', 100, 3, 'c8aae8cfbe03a4f2103effd60f787f5d.jpg', NULL, '2019-08-02 16:14:59', '2019-08-02 16:14:59'),
(2, 2, 1, 'ORG-001', 'ORANGE', 100, 3, 'c8aae8cfbe03a4f2103effd60f787f5d.jpg', NULL, '2019-08-03 17:36:10', '2019-08-03 17:36:10'),
(3, 3, 1, 'ORG-001', 'ORANGE', 100, 2, 'c8aae8cfbe03a4f2103effd60f787f5d.jpg', NULL, '2019-08-24 12:55:57', '2019-08-24 12:55:57'),
(4, 3, 2, 'APP-001', 'APPLE', 0.9, 3, '1a697e5d9b610cdc988bcffdb0bb749e.jpg', NULL, '2019-08-24 12:55:57', '2019-08-24 12:55:57');

-- --------------------------------------------------------

--
-- Table structure for table `order_rdmp_item`
--

CREATE TABLE `order_rdmp_item` (
  `orderRdmItemID` bigint(20) UNSIGNED NOT NULL,
  `orderID` bigint(20) UNSIGNED NOT NULL,
  `productID` bigint(20) UNSIGNED NOT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `point` double NOT NULL DEFAULT '0',
  `qty` double NOT NULL DEFAULT '0',
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'product.jpg',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_rdmp_item`
--

INSERT INTO `order_rdmp_item` (`orderRdmItemID`, `orderID`, `productID`, `sku`, `name`, `point`, `qty`, `img`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'ORG-001', 'ORANGE', 100, 1, 'c8aae8cfbe03a4f2103effd60f787f5d.jpg', NULL, '2019-08-02 16:14:59', '2019-08-02 16:14:59'),
(2, 3, 1, 'ORG-001', 'ORANGE', 100, 2, 'c8aae8cfbe03a4f2103effd60f787f5d.jpg', NULL, '2019-08-24 12:55:57', '2019-08-24 12:55:57');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `pagesID` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subTitle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pagesID`, `name`, `title`, `subTitle`, `content`, `img`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'promotion', 'AUGUST PROMOTION', 'PROMOTION', NULL, 'promotion.jpg', NULL, '2019-08-02 15:35:10', '2019-08-02 15:35:10'),
(2, 'redemption', NULL, NULL, NULL, 'redemption.jpg', NULL, '2019-08-02 15:41:50', '2019-08-02 15:41:50'),
(3, 'shop', NULL, NULL, NULL, 'shop.jpg', NULL, '2019-08-02 15:59:03', '2019-08-02 15:59:03'),
(4, 'about', NULL, NULL, NULL, 'about.jpg', NULL, '2019-08-02 16:00:19', '2019-08-02 16:00:19'),
(5, 'contact', NULL, NULL, NULL, 'contact.jpg', NULL, '2019-08-02 16:01:40', '2019-08-02 16:01:40'),
(6, 'cart', NULL, NULL, '<p><font color=\"#000000\">NAME : XXX XXX XXX</font><p><font color=\"#000000\">ACCOUNT NO : 0000 1111 2222</font></p><p><font color=\"#000000\"><span style=\"display: inline !important; float: none; background-color: transparent; font-family: Roboto, Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\">BANK: PUBLIC BANK</span></font><br></p><p></p><p></p><p></p></p>\n', 'cart.jpg', NULL, '2019-08-02 16:03:49', '2019-08-24 12:02:16'),
(7, 'checkout', NULL, NULL, '<p><font color=\"#000000\">NAME : XXX XXX XXX</font><p><font color=\"#000000\">ACCOUNT NO : 0000 1111 2222</font></p><p><font color=\"#000000\"><span style=\"display: inline !important; float: none; background-color: transparent; font-family: Roboto, Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\">BANK: PUBLIC BANK</span></font><br></p><p></p><p></p><p></p></p>\n', NULL, NULL, '2019-08-03 07:26:00', '2019-08-24 12:02:16');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `permissionID` bigint(20) UNSIGNED NOT NULL,
  `roleID` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `values` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `pointID` bigint(20) UNSIGNED NOT NULL,
  `pointIN` double NOT NULL DEFAULT '0',
  `pointOUT` double NOT NULL DEFAULT '0',
  `trType` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'IN',
  `sector` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref` int(11) DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userID` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`pointID`, `pointIN`, `pointOUT`, `trType`, `sector`, `ref`, `description`, `userID`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 100, 0, 'IN', 'Registration', NULL, 'NEW REGISTRATION', 2, NULL, '2019-08-02 11:18:14', '2019-08-02 11:18:14'),
(2, 100, 0, 'IN', 'Registration', NULL, 'NEW REGISTRATION', 3, NULL, '2019-08-02 12:14:55', '2019-08-02 12:14:55'),
(3, 100, 0, 'IN', 'Registration', NULL, 'NEW REGISTRATION', 4, NULL, '2019-08-03 10:45:19', '2019-08-03 10:45:19'),
(4, 100, 0, 'IN', 'Registration', NULL, 'NEW REGISTRATION', 5, NULL, '2019-08-03 10:46:12', '2019-08-03 10:46:12'),
(5, 80, 0, 'IN', 'Referral', NULL, 'NEW REGISTRATION FROM REFERER', 1, NULL, '2019-08-03 11:12:34', '2019-08-03 11:12:34'),
(6, 200, 0, 'IN', 'Registration', 1, 'NEW REGISTRATION', 6, NULL, '2019-08-03 11:12:34', '2019-08-03 11:12:34'),
(7, 100, 0, 'IN', 'Registration', NULL, 'NEW REGISTRATION', 7, NULL, '2019-08-03 11:13:57', '2019-08-03 11:13:57'),
(8, 80, 0, 'IN', 'Referral', NULL, 'NEW REGISTRATION FROM REFERER', 7, NULL, '2019-08-03 11:18:34', '2019-08-03 11:18:34'),
(9, 200, 0, 'IN', 'Registration', 7, 'NEW REGISTRATION', 8, NULL, '2019-08-03 11:18:34', '2019-08-03 11:18:34'),
(10, 80, 0, 'IN', 'Referral', NULL, 'NEW REGISTRATION FROM REFERER', 1, NULL, '2019-08-03 11:22:12', '2019-08-03 11:22:12'),
(11, 200, 0, 'IN', 'Registration', 1, 'NEW REGISTRATION', 9, NULL, '2019-08-03 11:22:12', '2019-08-03 11:22:12'),
(12, 80, 0, 'IN', 'Referral', NULL, 'NEW REGISTRATION FROM REFERER', 1, NULL, '2019-08-03 11:26:24', '2019-08-03 11:26:24'),
(13, 200, 0, 'IN', 'Registration', 1, 'NEW REGISTRATION', 10, NULL, '2019-08-03 11:26:24', '2019-08-03 11:26:24'),
(14, 80, 0, 'IN', 'Referral', NULL, 'NEW REGISTRATION FROM REFERER', 1, NULL, '2019-08-20 08:02:18', '2019-08-20 08:02:18'),
(15, 200, 0, 'IN', 'Registration', 1, 'NEW REGISTRATION', 11, NULL, '2019-08-20 08:02:18', '2019-08-20 08:02:18'),
(16, 100, 0, 'IN', 'Registration', NULL, 'NEW REGISTRATION', 12, NULL, '2019-08-21 09:30:23', '2019-08-21 09:30:23'),
(17, 80, 0, 'IN', 'Referral', NULL, 'NEW REGISTRATION FROM REFERER', 12, NULL, '2019-08-21 09:38:20', '2019-08-21 09:38:20'),
(18, 200, 0, 'IN', 'Registration', 12, 'NEW REGISTRATION', 13, NULL, '2019-08-21 09:38:20', '2019-08-21 09:38:20'),
(19, 100, 0, 'IN', 'Registration', NULL, 'NEW REGISTRATION', 14, NULL, '2019-08-24 11:13:23', '2019-08-24 11:13:23'),
(20, 80, 0, 'IN', 'Referral', NULL, 'NEW REGISTRATION FROM REFERER', 14, NULL, '2019-08-24 11:16:44', '2019-08-24 11:16:44'),
(21, 200, 0, 'IN', 'Registration', 14, 'NEW REGISTRATION', 15, NULL, '2019-08-24 11:16:44', '2019-08-24 11:16:44'),
(22, 80, 0, 'IN', 'Referral', NULL, 'NEW REGISTRATION FROM REFERER', 15, NULL, '2019-08-24 11:27:45', '2019-08-24 11:27:45'),
(23, 200, 0, 'IN', 'Registration', 15, 'NEW REGISTRATION', 16, NULL, '2019-08-24 11:27:45', '2019-08-24 11:27:45'),
(24, 80, 0, 'IN', 'Referral', NULL, 'NEW REGISTRATION FROM REFERER', 15, NULL, '2019-08-24 11:44:32', '2019-08-24 11:44:32'),
(25, 200, 0, 'IN', 'Registration', 15, 'NEW REGISTRATION', 17, NULL, '2019-08-24 11:44:32', '2019-08-24 11:44:32'),
(26, 20.27, 0, 'IN', 'Sales', 3, 'Purchase Product', 17, NULL, '2019-08-24 13:00:08', '2019-08-24 13:00:08'),
(27, 0, 200, 'OUT', 'Redemption', 3, 'Redemption Product', 17, NULL, '2019-08-24 13:00:08', '2019-08-24 13:00:08');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` bigint(20) UNSIGNED NOT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `additional` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` int(11) NOT NULL DEFAULT '0',
  `rating` double NOT NULL DEFAULT '0',
  `s_commission` double NOT NULL DEFAULT '5',
  `d_commission` double NOT NULL DEFAULT '2',
  `price` double NOT NULL DEFAULT '0',
  `pre_price` double NOT NULL DEFAULT '0',
  `weight` double NOT NULL DEFAULT '0',
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'product.jpg',
  `img_one` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_two` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_tree` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `sku`, `name`, `category`, `notes`, `description`, `additional`, `review`, `rating`, `s_commission`, `d_commission`, `price`, `pre_price`, `weight`, `img`, `img_one`, `img_two`, `img_tree`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'ORG-001', 'ORANGE', 'FRUITS', NULL, NULL, NULL, 0, 0, 5, 2, 100, 0, 0.1, 'c8aae8cfbe03a4f2103effd60f787f5d.jpg', NULL, NULL, NULL, NULL, '2019-08-02 11:14:06', '2019-08-24 15:35:25'),
(2, 'APP-001', 'APPLE', 'FRUITS', NULL, NULL, NULL, 0, 0, 5, 2, 0.9, 0, 0.1, '1a697e5d9b610cdc988bcffdb0bb749e.jpg', NULL, NULL, NULL, NULL, '2019-08-21 09:40:00', '2019-08-24 15:35:17'),
(3, 'W001', 'WATER MELON', 'FRUITS', NULL, 'WATER MELON', NULL, 0, 0, 5, 2, 5.5, 0, 0, '33bec6fbc34c6993f7d04c44936079c9.jpg', NULL, NULL, NULL, NULL, '2019-08-24 15:30:03', '2019-08-24 15:36:17'),
(4, 'B001', 'BANANA', 'FRUITS', NULL, NULL, NULL, 0, 0, 5, 2, 2, 2, 0, '0bfe812e55e49e37ba96bb2e94947aaf.jpg', NULL, NULL, NULL, NULL, '2019-08-24 15:33:27', '2019-08-24 15:33:27'),
(5, 'M001', 'MANGO', 'FRUITS', NULL, NULL, NULL, 0, 0, 5, 2, 4, 0, 0, 'e9208a376a4c6e4e74acfc809c163b05.jpg', NULL, NULL, NULL, NULL, '2019-08-24 15:33:51', '2019-08-24 15:33:51'),
(6, 'P001', 'PINEAPPLE', 'FRUITS', NULL, NULL, NULL, 0, 0, 5, 2, 10, 0, 0, 'cc1b3d09a6c2b5951b92ab280de9aeeb.jpg', NULL, NULL, NULL, NULL, '2019-08-24 15:34:17', '2019-08-24 15:34:17'),
(7, 'K001', 'KIWI', 'FRUITS', NULL, NULL, NULL, 0, 0, 5, 2, 4, 0, 0, 'c139e1ac8b41effb2c2794a6d42fe2b9.jpg', NULL, NULL, NULL, NULL, '2019-08-24 15:34:35', '2019-08-24 15:34:35'),
(8, 'S001', 'STRAWBERRY', 'FRUITS', NULL, NULL, NULL, 0, 0, 5, 2, 15, 0, 0, 'd69cd80d8bd770765de53d6200b88ffb.jpg', NULL, NULL, NULL, NULL, '2019-08-24 15:35:08', '2019-08-24 15:35:08'),
(9, 'C001', 'CHERRY', 'FRUITS', NULL, NULL, NULL, 0, 0, 5, 2, 20, 0, 0, 'a1d662470ba82e27f9d4b10ccfa73b52.jpg', NULL, NULL, NULL, NULL, '2019-08-24 15:35:51', '2019-08-24 15:35:51');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `promotionID` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'promotion.jpg',
  `productID` bigint(20) UNSIGNED NOT NULL,
  `starts` datetime DEFAULT NULL,
  `ends` datetime DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`promotionID`, `name`, `description`, `img`, `productID`, `starts`, `ends`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'AUGUST PROMOTION', 'BUY ONE FREE ONE', 'e89224b6578fd2d9904ed160b8613c3d.jpg', 1, '2019-08-01 00:00:00', '2019-08-31 23:59:59', 'Active', NULL, '2019-08-02 15:31:33', '2019-08-02 15:36:18');

-- --------------------------------------------------------

--
-- Table structure for table `redemption`
--

CREATE TABLE `redemption` (
  `redemptionID` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'promotion.jpg',
  `starts` datetime DEFAULT NULL,
  `ends` datetime DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redemption`
--

INSERT INTO `redemption` (`redemptionID`, `name`, `description`, `img`, `starts`, `ends`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Redeem Now', 'Test Redeem', 'fec515ef656cbd70d5e98a2d3533d626.jpg', '2019-08-01 00:00:00', '2019-08-31 23:59:59', 'Active', NULL, '2019-08-02 15:40:08', '2019-08-02 15:44:19');

-- --------------------------------------------------------

--
-- Table structure for table `redemption_item`
--

CREATE TABLE `redemption_item` (
  `redemptionItemID` bigint(20) UNSIGNED NOT NULL,
  `productID` bigint(20) UNSIGNED NOT NULL,
  `redemptionID` bigint(20) UNSIGNED NOT NULL,
  `point` double NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redemption_item`
--

INSERT INTO `redemption_item` (`redemptionItemID`, `productID`, `redemptionID`, `point`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 100, NULL, '2019-08-02 15:40:28', '2019-08-02 15:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `roleID` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleID`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', NULL, '2019-07-27 01:24:46', '2019-07-27 01:24:46'),
(2, 'Manager', NULL, '2019-08-01 02:34:18', '2019-08-01 02:34:18');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shippingID` bigint(20) UNSIGNED NOT NULL,
  `carrierID` bigint(20) UNSIGNED NOT NULL,
  `locationID` bigint(20) UNSIGNED NOT NULL,
  `weight` double NOT NULL DEFAULT '0',
  `weight_add` double NOT NULL DEFAULT '0',
  `rate` double NOT NULL DEFAULT '0',
  `rate_add` double NOT NULL DEFAULT '0',
  `shipping_time` int(11) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shippingID`, `carrierID`, `locationID`, `weight`, `weight_add`, `rate`, `rate_add`, `shipping_time`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 4, 5, 0.5, 0.25, 6, 1.01, 2, NULL, '2019-08-01 18:03:24', '2019-08-01 18:03:24'),
(2, 7, 7, 0.5, 0.25, 6, 1.5, 3, NULL, '2019-08-02 11:11:07', '2019-08-02 11:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `temp_od_rdm`
--

CREATE TABLE `temp_od_rdm` (
  `tempRdmOrderID` bigint(20) UNSIGNED NOT NULL,
  `sessionID` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productID` bigint(20) UNSIGNED NOT NULL,
  `redemptionID` bigint(20) UNSIGNED NOT NULL,
  `qty` double NOT NULL DEFAULT '0',
  `points` double NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temp_order`
--

CREATE TABLE `temp_order` (
  `tempOrderID` bigint(20) UNSIGNED NOT NULL,
  `sessionID` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productID` bigint(20) UNSIGNED NOT NULL,
  `qty` double NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temp_order`
--

INSERT INTO `temp_order` (`tempOrderID`, `sessionID`, `productID`, `qty`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'd4b68dbf1de64e6a2ca451b8398263ac', 1, 3, NULL, '2019-08-02 11:18:32', '2019-08-02 11:18:44'),
(4, '6f5768ec2df2136163f92f7884867f0f', 1, 1, NULL, '2019-08-03 07:28:18', '2019-08-03 07:28:18'),
(5, 'f386a6ec8e95fd88d6806535781764dd', 1, 1, NULL, '2019-08-03 11:16:00', '2019-08-03 11:16:00'),
(7, '372d3ca9a0a250edb6dbd9d534c536bd', 1, 4, NULL, '2019-08-03 17:43:44', '2019-08-05 05:11:08'),
(8, '67f0259bdbb30ee138484190e7089602', 1, 1, NULL, '2019-08-03 17:44:24', '2019-08-03 17:44:24'),
(9, '569b2f085ef02f36659fd47a8c81d3d7', 1, 1, NULL, '2019-08-07 13:20:42', '2019-08-07 13:20:42'),
(10, '1963f1f668ac5a65f063e1b61546ae1a', 1, 1, NULL, '2019-08-07 17:35:22', '2019-08-07 17:35:22'),
(14, '35361953247f76638628530a9bcfd85e', 2, 1, NULL, '2019-08-24 12:23:44', '2019-08-24 12:23:44'),
(15, '35361953247f76638628530a9bcfd85e', 1, 1, NULL, '2019-08-24 12:23:53', '2019-08-24 12:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postCode` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` double NOT NULL DEFAULT '0',
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer.jpg',
  `isAdmin` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `userLevel` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Customer',
  `ref` int(11) DEFAULT NULL,
  `distributor` int(11) DEFAULT NULL,
  `salesman` int(11) DEFAULT NULL,
  `roleID` int(11) DEFAULT NULL,
  `locationID` bigint(20) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `contact`, `address`, `state`, `city`, `postCode`, `country`, `points`, `img`, `isAdmin`, `userLevel`, `ref`, `distributor`, `salesman`, `roleID`, `locationID`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@admin.com', NULL, '$2y$10$UAASokiwm4dv1Xt0av7miuUG54UJ0P2sNZxAYi.Dozxo1TX3e88n.', NULL, NULL, NULL, NULL, NULL, NULL, 320, 'customer.jpg', 'YES', 'Admin', NULL, NULL, NULL, 1, NULL, 'Active', NULL, '2019-07-27 01:24:46', '2019-08-20 08:02:18'),
(2, 'Darren', 'darren@yl2u.com', NULL, '$2y$10$swezsex.3JrZzftQECe8t.5Ba6HBRNPmv9zyGZNSpD1elzWPFfNgq', '010-0001122', 'NO.1234', 'JOHOR', 'JOHOR BHARU', '84000', NULL, 100, 'customer.jpg', 'No', 'Customer', NULL, 8, 7, NULL, 5, 'Active', 'P6maeGJ6sxRXElHGizWviJOHA9Cz3BJlxQ6hATiKMkttxcUuHofyQjT7crIi', '2019-08-02 11:18:14', '2019-08-02 11:39:39'),
(3, 'Nazmul Hossain', 'naz@admin.com', NULL, '$2y$10$/DeclYEC4C/308.HNJiBCOetV7R8Y/j8.dWlaTSqRMH.cADmVjAuC', '01675870047', 'Jbnjkbj\r\njhbnjkfbndsgf', 'Satate', 'Sylhet', '84000', 'Bangladesh', 100, 'customer.jpg', 'No', 'Customer', NULL, 8, 7, NULL, 7, 'Active', 's9qBosbllih3j8kKHqsQ1o0MuiqiylXQOLmrYubJweS7MbR13Pk5JwyMR9qo', '2019-08-02 12:14:55', '2019-08-02 12:24:04'),
(4, 'BIG STICK', 'naz@naz.com', NULL, '$2y$10$03eUm9VMeeSHYmLFm.NYzu0LCQY2vnCs2AZvwhwT/O8kY4ihy1hzm', '016854525482', 'Rongmohol Tower Bopndor Bazar Sylhet', 'Sylhet', 'Sylhet', '3100', NULL, 100, 'customer.jpg', 'No', 'Distributor', NULL, NULL, NULL, NULL, 5, 'Active', NULL, '2019-08-03 10:45:19', '2019-08-03 10:45:19'),
(5, 'Statum', 'naz@ladmin.com', NULL, '$2y$10$ui8vZkN50IltFBBDu0zA3uQEROo14uqyvvLOuM7Ib6DLUweMzJPgK', '0100001122', 'NO.1234', 'Sylhet', 'Sylhet', '3100', NULL, 100, 'customer.jpg', 'No', 'Salesman', NULL, NULL, NULL, NULL, 5, 'Active', NULL, '2019-08-03 10:46:12', '2019-08-03 10:46:12'),
(6, 'darren2', 'darren2@yl2u.com', NULL, '$2y$10$/ZzCzZC76.YY.4lcmTRzx.pcmfXf5oE16NA1hcUgAqS39yL6NPaku', '+60126888888', NULL, 'Johor', 'Muar', '84000', NULL, 200, 'customer.jpg', 'No', 'Customer', 1, 8, 7, NULL, 7, 'Active', 'nZecco3JYOohWuuU1C7lT9LfYmET6D633qzdZzpxGjNZDK4PaZC8Wl606BrC', '2019-08-03 11:12:34', '2019-08-03 11:12:34'),
(7, 'salesman', 'salesman@gmail.com', NULL, '$2y$10$gGDtCQuPz6.QRIcLCiq9HevVl.VSoG1YmU6uYYdAGZ4Cp386kT8BG', '000-0000000', '-', '-', '-', '-', NULL, 180, 'customer.jpg', 'No', 'Salesman', NULL, NULL, NULL, NULL, 5, 'Active', NULL, '2019-08-03 11:13:57', '2019-08-03 11:18:34'),
(8, 'distributor', 'distributor@gmail.com', NULL, '$2y$10$glOU0JiyWOxvIEiQ7XPOG.daTRHIC2stbS.dgO534hJeaqIa0uMYG', '000-00000', '-', '-', '-', '-', NULL, 200, 'customer.jpg', 'No', 'Distributor', 7, NULL, NULL, NULL, 7, 'Active', NULL, '2019-08-03 11:18:34', '2019-08-03 11:18:34'),
(9, 'darren3', 'darren3@gmail.com', NULL, '$2y$10$1apaiDE3T78y9gv3tgEpxed9NqlC9r8GOzRWlAX9E5jOKBDGvH7Ce', '0122222222', NULL, 'Johor', 'Muar', '84000', NULL, 200, 'customer.jpg', 'No', 'Customer', 1, 8, 7, NULL, 7, 'Active', 'WEFPqcUKZCFgWyDrYKkv1cxL1Gh9GZTmvWgD7qWpl0ri6XYc92OJIaBSLIZU', '2019-08-03 11:22:12', '2019-08-03 11:22:12'),
(10, 'darren4', 'darren4@gmail.com', NULL, '$2y$10$3b3QaDLuKcFKV/G6d0ape.fimx4Jl43aSgqvdhrezeYlzLstAaiu6', '-', '-', '-', '-', '-', '-', 200, 'customer.jpg', 'No', 'Customer', 1, 8, 7, NULL, 7, 'Active', 'SI9sdIocipHJY8BFyrRrgtBosvs8pOcozFQxku3Cmq4oRw8tA6p8ln24L09O', '2019-08-03 11:26:24', '2019-08-03 11:26:24'),
(11, 'Kuddus', 'k@k.com', NULL, '$2y$10$3DiLCigvb9cdb3UYw6CKjOfU0DxJ0R9KmBAp806DEem4jVnAHG.B.', '01765986436', 'kuddus. ghfd. gfdfg', 'Kul', 'Kul', '24697', 'Malaysia', 200, 'customer.jpg', 'No', 'Customer', 1, 8, 7, NULL, 7, 'Active', 'B5Ev7TBELgAurz8Y1tjEGm9kJE62VxDeFCHneF4n8BLIUbvf51Ke7nhLGrol', '2019-08-20 08:02:18', '2019-08-20 08:02:18'),
(12, 'salesman1', 'salesman1@outlook.com', NULL, '$2y$10$cZYDajY7ONbxNAavPXEmc.gNFFT2eJ5Fq6ohOdTD5WKSMepQHmaLq', '010-111111', 'No 3, Jalan Ali', 'Selangor', 'Klang', '89000', NULL, 180, 'customer.jpg', 'No', 'Salesman', NULL, NULL, NULL, NULL, 7, 'Active', NULL, '2019-08-21 09:30:23', '2019-08-21 09:38:20'),
(13, 'dis1', 'dis1@outlook.com', NULL, '$2y$10$YUQoeKkVohQ3GAOHzIEQvOe6ULHpvjAbvmqWRbRF3rjc8tVBuwC4G', '01222222', 'No.123', 'Selangor', 'Klang', '89000', NULL, 200, 'customer.jpg', 'No', 'Customer', 12, 8, 7, NULL, 7, 'Active', 'gDhvrGwgV03eWIU8DQ7rTxIMRxoyW3OuFIcCzeFdHQQg53CALQUjDzGXomKE', '2019-08-21 09:38:20', '2019-08-21 09:38:20'),
(14, 'Salesman', 'salesman2@gmail.com', NULL, '$2y$10$33gyRdXCkYJ7a4LGktUGI.QCVwQ22Q8WX2LmsYRNaghzH3gXWyIiK', '012-0000000', 'No 3', 'JOHOR', 'BATU', '8000', NULL, 180, 'customer.jpg', 'No', 'Salesman', NULL, NULL, NULL, NULL, 5, 'Active', NULL, '2019-08-24 11:13:23', '2019-08-24 11:16:44'),
(15, 'Dis5', 'dis5@outlook.com', NULL, '$2y$10$axjmqHC7aw7GQkpz.1qvxeT6jF3UjNafR8ZjBuUzAZf44xqxbyxOG', '012-00000', 'No2', 'Johor', 'Batu', '80000', 'Malaysia', 360, 'customer.jpg', 'No', 'Distributor', 14, 8, 7, NULL, 7, 'Active', 'lYvlbvUzSzSeyTsQ69g2g3qaerpScSNSN3STPIIgyuHIX1gP96eR9znqF4ej', '2019-08-24 11:16:44', '2019-08-24 11:44:32'),
(16, 'Cust5', 'cust5@outlook.com', NULL, '$2y$10$jWahdm0WqtuGwLorCBOg1e.QTAlyMqsetoXOXXlVdW74AR0hjW7cu', '012-00000', 'No.1234', 'Johor', 'Batu', '80000', 'Malaysia', 200, 'customer.jpg', 'No', 'Customer', 15, 8, 7, NULL, 7, 'Active', 'dkyBhr2O5yKIMvgfGozGdDDSmhaaLmZhkNL4xDGZuNfOcpAwis3QsMynXD51', '2019-08-24 11:27:45', '2019-08-24 11:27:45'),
(17, 'Cust6', 'cust6@outlook.com', NULL, '$2y$10$lyFsMOIt4EI.sqEZxFa6duhZsBWr47FzN/mmnjVqvUz5V.pIE8gga', '012-00000', 'No2', 'Johor', 'Batu', '80000', 'Malaysia', 20.27000000000001, 'customer.jpg', 'No', 'Customer', 15, 15, 14, NULL, 7, 'Active', 'biRcOeu30hgwH99SNbzIioUd9KhW4TlPJloNmmkOwqXpDKT1L7tBKdqOnJ5e', '2019-08-24 11:44:32', '2019-08-24 13:00:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertise`
--
ALTER TABLE `advertise`
  ADD PRIMARY KEY (`advertiseID`);

--
-- Indexes for table `carrier`
--
ALTER TABLE `carrier`
  ADD PRIMARY KEY (`carrierID`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chatID`);

--
-- Indexes for table `chat_history`
--
ALTER TABLE `chat_history`
  ADD PRIMARY KEY (`chatHistoryID`),
  ADD KEY `chat_history_chatid_index` (`chatID`);

--
-- Indexes for table `commission`
--
ALTER TABLE `commission`
  ADD PRIMARY KEY (`commissionID`),
  ADD KEY `commission_orderid_index` (`orderID`),
  ADD KEY `commission_productid_index` (`productID`),
  ADD KEY `commission_userid_index` (`userID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`locationID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `orders_userid_index` (`userID`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`orderItemID`),
  ADD UNIQUE KEY `order_item_orderid_productid_unique` (`orderID`,`productID`),
  ADD KEY `order_item_orderid_index` (`orderID`),
  ADD KEY `order_item_productid_index` (`productID`);

--
-- Indexes for table `order_rdmp_item`
--
ALTER TABLE `order_rdmp_item`
  ADD PRIMARY KEY (`orderRdmItemID`),
  ADD UNIQUE KEY `order_rdmp_item_orderid_productid_unique` (`orderID`,`productID`),
  ADD KEY `order_rdmp_item_orderid_index` (`orderID`),
  ADD KEY `order_rdmp_item_productid_index` (`productID`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pagesID`),
  ADD UNIQUE KEY `pages_name_unique` (`name`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`permissionID`),
  ADD KEY `permission_roleid_index` (`roleID`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`pointID`),
  ADD KEY `points_userid_index` (`userID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`promotionID`),
  ADD KEY `promotion_productid_index` (`productID`);

--
-- Indexes for table `redemption`
--
ALTER TABLE `redemption`
  ADD PRIMARY KEY (`redemptionID`);

--
-- Indexes for table `redemption_item`
--
ALTER TABLE `redemption_item`
  ADD PRIMARY KEY (`redemptionItemID`),
  ADD UNIQUE KEY `redemption_item_productid_redemptionid_unique` (`productID`,`redemptionID`),
  ADD KEY `redemption_item_productid_index` (`productID`),
  ADD KEY `redemption_item_redemptionid_index` (`redemptionID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleID`),
  ADD UNIQUE KEY `role_name_unique` (`name`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shippingID`),
  ADD KEY `shipping_carrierid_index` (`carrierID`),
  ADD KEY `shipping_locationid_index` (`locationID`);

--
-- Indexes for table `temp_od_rdm`
--
ALTER TABLE `temp_od_rdm`
  ADD PRIMARY KEY (`tempRdmOrderID`),
  ADD UNIQUE KEY `temp_od_rdm_sessionid_productid_unique` (`sessionID`,`productID`),
  ADD KEY `temp_od_rdm_productid_index` (`productID`),
  ADD KEY `temp_od_rdm_redemptionid_index` (`redemptionID`);

--
-- Indexes for table `temp_order`
--
ALTER TABLE `temp_order`
  ADD PRIMARY KEY (`tempOrderID`),
  ADD UNIQUE KEY `temp_order_sessionid_productid_unique` (`sessionID`,`productID`),
  ADD KEY `temp_order_productid_index` (`productID`);

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
-- AUTO_INCREMENT for table `advertise`
--
ALTER TABLE `advertise`
  MODIFY `advertiseID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carrier`
--
ALTER TABLE `carrier`
  MODIFY `carrierID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chatID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chat_history`
--
ALTER TABLE `chat_history`
  MODIFY `chatHistoryID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `commission`
--
ALTER TABLE `commission`
  MODIFY `commissionID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `locationID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `orderItemID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_rdmp_item`
--
ALTER TABLE `order_rdmp_item`
  MODIFY `orderRdmItemID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `pagesID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `permissionID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `pointID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `promotionID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `redemption`
--
ALTER TABLE `redemption`
  MODIFY `redemptionID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `redemption_item`
--
ALTER TABLE `redemption_item`
  MODIFY `redemptionItemID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `roleID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shippingID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `temp_od_rdm`
--
ALTER TABLE `temp_od_rdm`
  MODIFY `tempRdmOrderID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `temp_order`
--
ALTER TABLE `temp_order`
  MODIFY `tempOrderID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
