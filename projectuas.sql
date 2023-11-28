-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2023 at 03:21 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectuas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirm` enum('No','Yes') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `type`, `vendor_id`, `mobile`, `email`, `password`, `image`, `confirm`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Michael The', 'Superadmin', 0, '1234567', 'admin@admin.com', '$2y$10$Zg9.yCgGTSHeHx2Lr2EmU.MoWkND4K.RF61ejj8U.6UJJ/dmC1m3q', '', 'No', 1, NULL, '2023-01-02 21:08:37'),
(2, 'veto', 'vendor', 1, '08125756890', 'veto@gmail.com', '$2a$10$mYdHpXoqvB7qz3EXjWP3QeldiZQS00DSPIfTYflM8jSn9P7ZDXTSS', '', 'No', 1, NULL, '2023-01-02 21:20:46'),
(3, 'Matthew', 'vendor', 4, '0894567321', 'matthew@gmail.com', '$2y$10$8kokgavxWrnGHMXqxQSM5u4e3JvTGIQ0tOL1IiQvc7BKyC8oTo7f2', NULL, 'No', 1, '2022-12-16 22:40:25', '2022-12-19 04:02:05'),
(4, 'Tobing', 'vendor', 5, '08945673299', 'tobing@gmail.com', '$2y$10$.gO6I1QuuRueHG5oTxeWjeW3u/8MqSYSBDK3cYW1r.Evwl3oHJ62e', NULL, 'No', 1, '2022-12-21 05:10:17', '2022-12-21 06:23:19'),
(5, 'tes', 'vendor', 6, '0894567324', 'tes@gmail.com', '$2y$10$lqsZqqqCFL3QRMg0sb02YueXhALkxACncSftvNYulFPWQQUBCOjKS', NULL, 'No', 1, '2023-01-02 21:19:23', '2023-01-02 21:20:16');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `type`, `link`, `title`, `alt`, `status`, `created_at`, `updated_at`) VALUES
(1, 'banner-1.png', 'Slider', 'spring-collection', 'Spring Collection', 'Spring Collection', 0, NULL, '2022-12-09 18:42:28'),
(2, 'banner-2.png', 'Slider', 'tops', 'Tops', 'Tops', 0, NULL, '2022-12-09 18:42:28'),
(3, '43063.png', '', 'spring-collection', 'Spring Collection', 'Spring Collection', 1, '2022-12-07 05:47:44', '2022-12-07 05:47:44'),
(5, '13192.png', 'Fix', 'Test', 'Test', 'Test', 1, '2022-12-07 19:35:29', '2022-12-10 21:00:24'),
(6, '18300.jpg', 'Fix', 'shirt', 'shirt', 'shirt', 0, '2022-12-07 19:48:29', '2022-12-09 18:56:42'),
(7, '44349.png', 'Slider', 'merry-christmas', 'Merry Christmas', 'merry christmas', 1, '2022-12-09 18:41:50', '2022-12-09 20:40:01'),
(8, '89799.png', 'Slider', 'happy-newyear', 'Happy New Year', 'happy new year', 1, '2022-12-09 18:42:23', '2022-12-09 20:40:19'),
(9, '44320.png', 'Fix', 'merry-christmas', 'Merry Christmas', 'merry christmas', 1, '2022-12-09 18:56:11', '2022-12-09 18:56:11');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bape', 1, NULL, NULL),
(2, 'Nike', 1, NULL, NULL),
(3, 'Adidas', 1, NULL, NULL),
(4, 'Samsung', 1, NULL, NULL),
(5, 'Apple', 1, NULL, NULL),
(6, 'LG', 1, NULL, NULL),
(7, 'Lenovo', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `session_id`, `user_id`, `product_id`, `size`, `quantity`, `created_at`, `updated_at`) VALUES
(2, 'sTYiiBYXpeV5VoUT02uNDFzffoQ5lHHTckLryapD', 0, 13, 'Medium', '1', '2022-12-22 05:23:06', '2022-12-22 06:05:18');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_discount` double(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `section_id`, `category_name`, `category_image`, `category_discount`, `description`, `url`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'Men', '', 0.00, 'Men shirt', 'men', 'men', 'men', 'men', 1, NULL, '2022-12-14 06:40:04'),
(2, 0, 1, 'Women', '', 0.00, 'Women Category', 'women', NULL, NULL, NULL, 1, NULL, '2022-12-11 06:35:16'),
(3, 0, 1, 'Kids', '', 0.00, '', 'kids', '', '', '0', 1, NULL, NULL),
(4, 0, 2, 'Mobiles', '', 0.00, '', 'mobiles', '', '', '0', 1, NULL, NULL),
(5, 4, 2, 'Smartphones', '', 0.00, NULL, 'smartphone', 'smartphone', 'smartphone', 'smartphone', 1, NULL, '2022-12-11 06:33:49'),
(6, 1, 1, 'T-Shirts', '', 10.00, 'T-shirts', 'tshirt', 't-shirt', 't-shirt', 't-shirt', 1, NULL, NULL),
(7, 1, 1, 'Shirts', '', 10.00, 'shirts', 'shirt', 'shirt', 'shirt', 'shirt', 1, NULL, NULL),
(8, 2, 1, 'Top', '', 15.00, 'Top', 'top', 'top', 'top', 'top', 1, NULL, NULL),
(9, 1, 1, 'Men Shoe', '', 0.00, 'mshoe', 'mshoe', 'mshoe', 'mshoe', 'mshoe', 1, NULL, NULL),
(10, 2, 1, 'Women Shoe', '', 0.00, 'wshoe', 'wshoe', 'wshoe', 'wshoe', 'wshoe', 1, NULL, NULL),
(11, 3, 1, 'Kids Shoe', '', 0.00, 'kshoe', 'kshoe', 'kshoe', 'kshoe', 'kshoe', 1, NULL, NULL),
(12, 0, 2, 'Screen', NULL, 0.00, 'screen', 'screen', 'screen', 'screen', 'screen', 1, '2022-12-13 05:30:10', '2022-12-13 05:31:28'),
(13, 0, 4, 'Ball', NULL, 0.00, 'Ball', 'ball', 'ball', 'ball', 'ball', 1, '2023-01-02 21:12:06', '2023-01-02 21:12:06');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT '',
  `status` tinyint(4) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'Afghanistan', 0, NULL, '2022-11-28 12:33:55'),
(2, 'AL', 'Albania', 0, NULL, '2022-11-28 12:33:55'),
(3, 'DZ', 'Algeria', 0, NULL, '2022-11-28 12:33:55'),
(4, 'DS', 'American Samoa', 0, NULL, '2022-11-28 12:33:55'),
(5, 'AD', 'Andorra', 0, NULL, '2022-11-28 12:33:55'),
(6, 'AO', 'Angola', 0, NULL, '2022-11-28 12:33:55'),
(7, 'AI', 'Anguilla', 0, NULL, '2022-11-28 12:33:55'),
(8, 'AQ', 'Antarctica', 0, NULL, '2022-11-28 12:33:55'),
(9, 'AG', 'Antigua and Barbuda', 0, NULL, '2022-11-28 12:33:55'),
(10, 'AR', 'Argentina', 0, NULL, '2022-11-28 12:33:55'),
(11, 'AM', 'Armenia', 0, NULL, '2022-11-28 12:33:55'),
(12, 'AW', 'Aruba', 0, NULL, '2022-11-28 12:33:55'),
(13, 'AU', 'Australia', 0, NULL, '2022-11-28 12:33:55'),
(14, 'AT', 'Austria', 0, NULL, '2022-11-28 12:33:55'),
(15, 'AZ', 'Azerbaijan', 0, NULL, '2022-11-28 12:33:55'),
(16, 'BS', 'Bahamas', 0, NULL, '2022-11-28 12:33:55'),
(17, 'BH', 'Bahrain', 0, NULL, '2022-11-28 12:33:55'),
(18, 'BD', 'Bangladesh', 0, NULL, '2022-11-28 12:33:55'),
(19, 'BB', 'Barbados', 0, NULL, '2022-11-28 12:33:55'),
(20, 'BY', 'Belarus', 0, NULL, '2022-11-28 12:33:55'),
(21, 'BE', 'Belgium', 0, NULL, '2022-11-28 12:33:55'),
(22, 'BZ', 'Belize', 0, NULL, '2022-11-28 12:33:55'),
(23, 'BJ', 'Benin', 0, NULL, '2022-11-28 12:33:55'),
(24, 'BM', 'Bermuda', 0, NULL, '2022-11-28 12:33:55'),
(25, 'BT', 'Bhutan', 0, NULL, '2022-11-28 12:33:55'),
(26, 'BO', 'Bolivia', 0, NULL, '2022-11-28 12:33:55'),
(27, 'BA', 'Bosnia and Herzegovina', 0, NULL, '2022-11-28 12:33:55'),
(28, 'BW', 'Botswana', 0, NULL, '2022-11-28 12:33:55'),
(29, 'BV', 'Bouvet Island', 0, NULL, '2022-11-28 12:33:55'),
(30, 'BR', 'Brazil', 0, NULL, '2022-11-28 12:33:55'),
(31, 'IO', 'British Indian Ocean Territory', 0, NULL, '2022-11-28 12:33:55'),
(32, 'BN', 'Brunei Darussalam', 0, NULL, '2022-11-28 12:33:55'),
(33, 'BG', 'Bulgaria', 0, NULL, '2022-11-28 12:33:55'),
(34, 'BF', 'Burkina Faso', 0, NULL, '2022-11-28 12:33:55'),
(35, 'BI', 'Burundi', 0, NULL, '2022-11-28 12:33:55'),
(36, 'KH', 'Cambodia', 0, NULL, '2022-11-28 12:33:55'),
(37, 'CM', 'Cameroon', 0, NULL, '2022-11-28 12:33:55'),
(38, 'CA', 'Canada', 0, NULL, '2022-11-28 12:33:55'),
(39, 'CV', 'Cape Verde', 0, NULL, '2022-11-28 12:33:55'),
(40, 'KY', 'Cayman Islands', 0, NULL, '2022-11-28 12:33:55'),
(41, 'CF', 'Central African Republic', 0, NULL, '2022-11-28 12:33:55'),
(42, 'TD', 'Chad', 0, NULL, '2022-11-28 12:33:55'),
(43, 'CL', 'Chile', 0, NULL, '2022-11-28 12:33:55'),
(44, 'CN', 'China', 0, NULL, '2022-11-28 12:33:55'),
(45, 'CX', 'Christmas Island', 0, NULL, '2022-11-28 12:33:55'),
(46, 'CC', 'Cocos (Keeling) Islands', 0, NULL, '2022-11-28 12:33:55'),
(47, 'CO', 'Colombia', 0, NULL, '2022-11-28 12:33:55'),
(48, 'KM', 'Comoros', 0, NULL, '2022-11-28 12:33:55'),
(49, 'CD', 'Democratic Republic of the Congo', 0, NULL, '2022-11-28 12:33:55'),
(50, 'CG', 'Republic of Congo', 0, NULL, '2022-11-28 12:33:55'),
(51, 'CK', 'Cook Islands', 0, NULL, '2022-11-28 12:33:55'),
(52, 'CR', 'Costa Rica', 0, NULL, '2022-11-28 12:33:55'),
(53, 'HR', 'Croatia (Hrvatska)', 0, NULL, '2022-11-28 12:33:55'),
(54, 'CU', 'Cuba', 0, NULL, '2022-11-28 12:33:55'),
(55, 'CY', 'Cyprus', 0, NULL, '2022-11-28 12:33:55'),
(56, 'CZ', 'Czech Republic', 0, NULL, '2022-11-28 12:33:55'),
(57, 'DK', 'Denmark', 0, NULL, '2022-11-28 12:33:55'),
(58, 'DJ', 'Djibouti', 0, NULL, '2022-11-28 12:33:55'),
(59, 'DM', 'Dominica', 0, NULL, '2022-11-28 12:33:55'),
(60, 'DO', 'Dominican Republic', 0, NULL, '2022-11-28 12:33:55'),
(61, 'TP', 'East Timor', 0, NULL, '2022-11-28 12:33:55'),
(62, 'EC', 'Ecuador', 0, NULL, '2022-11-28 12:33:55'),
(63, 'EG', 'Egypt', 0, NULL, '2022-11-28 12:33:55'),
(64, 'SV', 'El Salvador', 0, NULL, '2022-11-28 12:33:55'),
(65, 'GQ', 'Equatorial Guinea', 0, NULL, '2022-11-28 12:33:55'),
(66, 'ER', 'Eritrea', 0, NULL, '2022-11-28 12:33:55'),
(67, 'EE', 'Estonia', 0, NULL, '2022-11-28 12:33:55'),
(68, 'ET', 'Ethiopia', 0, NULL, '2022-11-28 12:33:55'),
(69, 'FK', 'Falkland Islands (Malvinas)', 0, NULL, '2022-11-28 12:33:55'),
(70, 'FO', 'Faroe Islands', 0, NULL, '2022-11-28 12:33:55'),
(71, 'FJ', 'Fiji', 0, NULL, '2022-11-28 12:33:55'),
(72, 'FI', 'Finland', 0, NULL, '2022-11-28 12:33:55'),
(73, 'FR', 'France', 0, NULL, '2022-11-28 12:33:55'),
(74, 'FX', 'France, Metropolitan', 0, NULL, '2022-11-28 12:33:55'),
(75, 'GF', 'French Guiana', 0, NULL, '2022-11-28 12:33:55'),
(76, 'PF', 'French Polynesia', 0, NULL, '2022-11-28 12:33:55'),
(77, 'TF', 'French Southern Territories', 0, NULL, '2022-11-28 12:33:55'),
(78, 'GA', 'Gabon', 0, NULL, '2022-11-28 12:33:55'),
(79, 'GM', 'Gambia', 0, NULL, '2022-11-28 12:33:55'),
(80, 'GE', 'Georgia', 0, NULL, '2022-11-28 12:33:55'),
(81, 'DE', 'Germany', 0, NULL, '2022-11-28 12:33:55'),
(82, 'GH', 'Ghana', 0, NULL, '2022-11-28 12:33:55'),
(83, 'GI', 'Gibraltar', 0, NULL, '2022-11-28 12:33:55'),
(84, 'GK', 'Guernsey', 0, NULL, '2022-11-28 12:33:55'),
(85, 'GR', 'Greece', 0, NULL, '2022-11-28 12:33:55'),
(86, 'GL', 'Greenland', 0, NULL, '2022-11-28 12:33:55'),
(87, 'GD', 'Grenada', 0, NULL, '2022-11-28 12:33:55'),
(88, 'GP', 'Guadeloupe', 0, NULL, '2022-11-28 12:33:55'),
(89, 'GU', 'Guam', 0, NULL, '2022-11-28 12:33:55'),
(90, 'GT', 'Guatemala', 0, NULL, '2022-11-28 12:33:55'),
(91, 'GN', 'Guinea', 0, NULL, '2022-11-28 12:33:55'),
(92, 'GW', 'Guinea-Bissau', 0, NULL, '2022-11-28 12:33:55'),
(93, 'GY', 'Guyana', 0, NULL, '2022-11-28 12:33:55'),
(94, 'HT', 'Haiti', 0, NULL, '2022-11-28 12:33:55'),
(95, 'HM', 'Heard and Mc Donald Islands', 0, NULL, '2022-11-28 12:33:55'),
(96, 'HN', 'Honduras', 0, NULL, '2022-11-28 12:33:55'),
(97, 'HK', 'Hong Kong', 0, NULL, '2022-11-28 12:33:55'),
(98, 'HU', 'Hungary', 0, NULL, '2022-11-28 12:33:55'),
(99, 'IS', 'Iceland', 0, NULL, '2022-11-28 12:33:55'),
(100, 'IN', 'India', 0, NULL, '2022-11-28 12:33:55'),
(101, 'IM', 'Isle of Man', 0, NULL, '2022-11-28 12:33:55'),
(102, 'ID', 'Indonesia', 0, NULL, '2022-11-28 12:33:55'),
(103, 'IR', 'Iran (Islamic Republic of)', 0, NULL, '2022-11-28 12:33:55'),
(104, 'IQ', 'Iraq', 0, NULL, '2022-11-28 12:33:55'),
(105, 'IE', 'Ireland', 0, NULL, '2022-11-28 12:33:55'),
(106, 'IL', 'Israel', 0, NULL, '2022-11-28 12:33:55'),
(107, 'IT', 'Italy', 0, NULL, '2022-11-28 12:33:55'),
(108, 'CI', 'Ivory Coast', 0, NULL, '2022-11-28 12:33:55'),
(109, 'JE', 'Jersey', 0, NULL, '2022-11-28 12:33:55'),
(110, 'JM', 'Jamaica', 0, NULL, '2022-11-28 12:33:55'),
(111, 'JP', 'Japan', 0, NULL, '2022-11-28 12:33:55'),
(112, 'JO', 'Jordan', 0, NULL, '2022-11-28 12:33:55'),
(113, 'KZ', 'Kazakhstan', 0, NULL, '2022-11-28 12:33:55'),
(114, 'KE', 'Kenya', 0, NULL, '2022-11-28 12:33:55'),
(115, 'KI', 'Kiribati', 0, NULL, '2022-11-28 12:33:55'),
(116, 'KP', 'Korea, Democratic People\'s Republic of', 0, NULL, '2022-11-28 12:33:55'),
(117, 'KR', 'Korea, Republic of', 0, NULL, '2022-11-28 12:33:55'),
(118, 'XK', 'Kosovo', 0, NULL, '2022-11-28 12:33:55'),
(119, 'KW', 'Kuwait', 0, NULL, '2022-11-28 12:33:55'),
(120, 'KG', 'Kyrgyzstan', 0, NULL, '2022-11-28 12:33:55'),
(121, 'LA', 'Lao People\'s Democratic Republic', 0, NULL, '2022-11-28 12:33:55'),
(122, 'LV', 'Latvia', 0, NULL, '2022-11-28 12:33:55'),
(123, 'LB', 'Lebanon', 0, NULL, '2022-11-28 12:33:55'),
(124, 'LS', 'Lesotho', 0, NULL, '2022-11-28 12:33:55'),
(125, 'LR', 'Liberia', 0, NULL, '2022-11-28 12:33:55'),
(126, 'LY', 'Libyan Arab Jamahiriya', 0, NULL, '2022-11-28 12:33:55'),
(127, 'LI', 'Liechtenstein', 0, NULL, '2022-11-28 12:33:55'),
(128, 'LT', 'Lithuania', 0, NULL, '2022-11-28 12:33:55'),
(129, 'LU', 'Luxembourg', 0, NULL, '2022-11-28 12:33:55'),
(130, 'MO', 'Macau', 0, NULL, '2022-11-28 12:33:55'),
(131, 'MK', 'North Macedonia', 0, NULL, '2022-11-28 12:33:55'),
(132, 'MG', 'Madagascar', 0, NULL, '2022-11-28 12:33:55'),
(133, 'MW', 'Malawi', 0, NULL, '2022-11-28 12:33:55'),
(134, 'MY', 'Malaysia', 0, NULL, '2022-11-28 12:33:55'),
(135, 'MV', 'Maldives', 0, NULL, '2022-11-28 12:33:55'),
(136, 'ML', 'Mali', 0, NULL, '2022-11-28 12:33:55'),
(137, 'MT', 'Malta', 0, NULL, '2022-11-28 12:33:55'),
(138, 'MH', 'Marshall Islands', 0, NULL, '2022-11-28 12:33:55'),
(139, 'MQ', 'Martinique', 0, NULL, '2022-11-28 12:33:55'),
(140, 'MR', 'Mauritania', 0, NULL, '2022-11-28 12:33:55'),
(141, 'MU', 'Mauritius', 0, NULL, '2022-11-28 12:33:55'),
(142, 'TY', 'Mayotte', 0, NULL, '2022-11-28 12:33:55'),
(143, 'MX', 'Mexico', 0, NULL, '2022-11-28 12:33:55'),
(144, 'FM', 'Micronesia, Federated States of', 0, NULL, '2022-11-28 12:33:55'),
(145, 'MD', 'Moldova, Republic of', 0, NULL, '2022-11-28 12:33:55'),
(146, 'MC', 'Monaco', 0, NULL, '2022-11-28 12:33:55'),
(147, 'MN', 'Mongolia', 0, NULL, '2022-11-28 12:33:55'),
(148, 'ME', 'Montenegro', 0, NULL, '2022-11-28 12:33:55'),
(149, 'MS', 'Montserrat', 0, NULL, '2022-11-28 12:33:55'),
(150, 'MA', 'Morocco', 0, NULL, '2022-11-28 12:33:55'),
(151, 'MZ', 'Mozambique', 0, NULL, '2022-11-28 12:33:55'),
(152, 'MM', 'Myanmar', 0, NULL, '2022-11-28 12:33:55'),
(153, 'NA', 'Namibia', 0, NULL, '2022-11-28 12:33:55'),
(154, 'NR', 'Nauru', 0, NULL, '2022-11-28 12:33:55'),
(155, 'NP', 'Nepal', 0, NULL, '2022-11-28 12:33:55'),
(156, 'NL', 'Netherlands', 0, NULL, '2022-11-28 12:33:55'),
(157, 'AN', 'Netherlands Antilles', 0, NULL, '2022-11-28 12:33:55'),
(158, 'NC', 'New Caledonia', 0, NULL, '2022-11-28 12:33:55'),
(159, 'NZ', 'New Zealand', 0, NULL, '2022-11-28 12:33:55'),
(160, 'NI', 'Nicaragua', 0, NULL, '2022-11-28 12:33:55'),
(161, 'NE', 'Niger', 0, NULL, '2022-11-28 12:33:55'),
(162, 'NG', 'Nigeria', 0, NULL, '2022-11-28 12:33:55'),
(163, 'NU', 'Niue', 0, NULL, '2022-11-28 12:33:55'),
(164, 'NF', 'Norfolk Island', 0, NULL, '2022-11-28 12:33:55'),
(165, 'MP', 'Northern Mariana Islands', 0, NULL, '2022-11-28 12:33:55'),
(166, 'NO', 'Norway', 0, NULL, '2022-11-28 12:33:55'),
(167, 'OM', 'Oman', 0, NULL, '2022-11-28 12:33:55'),
(168, 'PK', 'Pakistan', 0, NULL, '2022-11-28 12:33:55'),
(169, 'PW', 'Palau', 0, NULL, '2022-11-28 12:33:55'),
(170, 'PS', 'Palestine', 0, NULL, '2022-11-28 12:33:55'),
(171, 'PA', 'Panama', 0, NULL, '2022-11-28 12:33:55'),
(172, 'PG', 'Papua New Guinea', 0, NULL, '2022-11-28 12:33:55'),
(173, 'PY', 'Paraguay', 0, NULL, '2022-11-28 12:33:55'),
(174, 'PE', 'Peru', 0, NULL, '2022-11-28 12:33:55'),
(175, 'PH', 'Philippines', 0, NULL, '2022-11-28 12:33:55'),
(176, 'PN', 'Pitcairn', 0, NULL, '2022-11-28 12:33:55'),
(177, 'PL', 'Poland', 0, NULL, '2022-11-28 12:33:55'),
(178, 'PT', 'Portugal', 0, NULL, '2022-11-28 12:33:55'),
(179, 'PR', 'Puerto Rico', 0, NULL, '2022-11-28 12:33:55'),
(180, 'QA', 'Qatar', 0, NULL, '2022-11-28 12:33:55'),
(181, 'RE', 'Reunion', 0, NULL, '2022-11-28 12:33:55'),
(182, 'RO', 'Romania', 0, NULL, '2022-11-28 12:33:55'),
(183, 'RU', 'Russian Federation', 0, NULL, '2022-11-28 12:33:55'),
(184, 'RW', 'Rwanda', 0, NULL, '2022-11-28 12:33:55'),
(185, 'KN', 'Saint Kitts and Nevis', 0, NULL, '2022-11-28 12:33:55'),
(186, 'LC', 'Saint Lucia', 0, NULL, '2022-11-28 12:33:55'),
(187, 'VC', 'Saint Vincent and the Grenadines', 0, NULL, '2022-11-28 12:33:55'),
(188, 'WS', 'Samoa', 0, NULL, '2022-11-28 12:33:55'),
(189, 'SM', 'San Marino', 0, NULL, '2022-11-28 12:33:55'),
(190, 'ST', 'Sao Tome and Principe', 0, NULL, '2022-11-28 12:33:55'),
(191, 'SA', 'Saudi Arabia', 0, NULL, '2022-11-28 12:33:55'),
(192, 'SN', 'Senegal', 0, NULL, '2022-11-28 12:33:55'),
(193, 'RS', 'Serbia', 0, NULL, '2022-11-28 12:33:55'),
(194, 'SC', 'Seychelles', 0, NULL, '2022-11-28 12:33:55'),
(195, 'SL', 'Sierra Leone', 0, NULL, '2022-11-28 12:33:55'),
(196, 'SG', 'Singapore', 0, NULL, '2022-11-28 12:33:55'),
(197, 'SK', 'Slovakia', 0, NULL, '2022-11-28 12:33:55'),
(198, 'SI', 'Slovenia', 0, NULL, '2022-11-28 12:33:55'),
(199, 'SB', 'Solomon Islands', 0, NULL, '2022-11-28 12:33:55'),
(200, 'SO', 'Somalia', 0, NULL, '2022-11-28 12:33:55'),
(201, 'ZA', 'South Africa', 0, NULL, '2022-11-28 12:33:55'),
(202, 'GS', 'South Georgia South Sandwich Islands', 0, NULL, '2022-11-28 12:33:55'),
(203, 'SS', 'South Sudan', 0, NULL, '2022-11-28 12:33:55'),
(204, 'ES', 'Spain', 0, NULL, '2022-11-28 12:33:55'),
(205, 'LK', 'Sri Lanka', 0, NULL, '2022-11-28 12:33:55'),
(206, 'SH', 'St. Helena', 0, NULL, '2022-11-28 12:33:55'),
(207, 'PM', 'St. Pierre and Miquelon', 0, NULL, '2022-11-28 12:33:55'),
(208, 'SD', 'Sudan', 0, NULL, '2022-11-28 12:33:55'),
(209, 'SR', 'Suriname', 0, NULL, '2022-11-28 12:33:55'),
(210, 'SJ', 'Svalbard and Jan Mayen Islands', 0, NULL, '2022-11-28 12:33:55'),
(211, 'SZ', 'Eswatini', 0, NULL, '2022-11-28 12:33:55'),
(212, 'SE', 'Sweden', 0, NULL, '2022-11-28 12:33:55'),
(213, 'CH', 'Switzerland', 0, NULL, '2022-11-28 12:33:55'),
(214, 'SY', 'Syrian Arab Republic', 0, NULL, '2022-11-28 12:33:55'),
(215, 'TW', 'Taiwan', 0, NULL, '2022-11-28 12:33:55'),
(216, 'TJ', 'Tajikistan', 0, NULL, '2022-11-28 12:33:55'),
(217, 'TZ', 'Tanzania, United Republic of', 0, NULL, '2022-11-28 12:33:55'),
(218, 'TH', 'Thailand', 0, NULL, '2022-11-28 12:33:55'),
(219, 'TG', 'Togo', 0, NULL, '2022-11-28 12:33:55'),
(220, 'TK', 'Tokelau', 0, NULL, '2022-11-28 12:33:55'),
(221, 'TO', 'Tonga', 0, NULL, '2022-11-28 12:33:55'),
(222, 'TT', 'Trinidad and Tobago', 0, NULL, '2022-11-28 12:33:55'),
(223, 'TN', 'Tunisia', 0, NULL, '2022-11-28 12:33:55'),
(224, 'TR', 'Turkey', 0, NULL, '2022-11-28 12:33:55'),
(225, 'TM', 'Turkmenistan', 0, NULL, '2022-11-28 12:33:55'),
(226, 'TC', 'Turks and Caicos Islands', 0, NULL, '2022-11-28 12:33:55'),
(227, 'TV', 'Tuvalu', 0, NULL, '2022-11-28 12:33:55'),
(228, 'UG', 'Uganda', 0, NULL, '2022-11-28 12:33:55'),
(229, 'UA', 'Ukraine', 0, NULL, '2022-11-28 12:33:55'),
(230, 'AE', 'United Arab Emirates', 0, NULL, '2022-11-28 12:33:55'),
(231, 'GB', 'United Kingdom', 0, NULL, '2022-11-28 12:33:55'),
(232, 'US', 'United States', 0, NULL, '2022-11-28 12:33:55'),
(233, 'UM', 'United States minor outlying islands', 0, NULL, '2022-11-28 12:33:55'),
(234, 'UY', 'Uruguay', 0, NULL, '2022-11-28 12:33:55'),
(235, 'UZ', 'Uzbekistan', 0, NULL, '2022-11-28 12:33:55'),
(236, 'VU', 'Vanuatu', 0, NULL, '2022-11-28 12:33:55'),
(237, 'VA', 'Vatican City State', 0, NULL, '2022-11-28 12:33:55'),
(238, 'VE', 'Venezuela', 0, NULL, '2022-11-28 12:33:55'),
(239, 'VN', 'Vietnam', 0, NULL, '2022-11-28 12:33:55'),
(240, 'VG', 'Virgin Islands (British)', 0, NULL, '2022-11-28 12:33:55'),
(241, 'VI', 'Virgin Islands (U.S.)', 0, NULL, '2022-11-28 12:33:55'),
(242, 'WF', 'Wallis and Futuna Islands', 0, NULL, '2022-11-28 12:33:55'),
(243, 'EH', 'Western Sahara', 0, NULL, '2022-11-28 12:33:55'),
(244, 'YE', 'Yemen', 0, NULL, '2022-11-28 12:33:55'),
(245, 'ZM', 'Zambia', 0, NULL, '2022-11-28 12:33:55'),
(246, 'ZW', 'Zimbabwe', 0, NULL, '2022-11-28 12:33:55');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(9, '2022_11_28_125210_create_section_table', 4),
(11, '2022_11_29_033705_create_categories_table', 6),
(14, '2022_12_01_112940_create_products_table', 9),
(18, '2014_10_12_000000_create_users_table', 10),
(19, '2014_10_12_100000_create_password_resets_table', 10),
(20, '2019_08_19_000000_create_failed_jobs_table', 10),
(21, '2019_12_14_000001_create_personal_access_tokens_table', 10),
(22, '2022_11_22_123526_create_vendors_table', 10),
(23, '2022_11_22_123956_create_admin_table', 10),
(24, '2022_11_24_113756_create_vendors_business_details_table', 10),
(25, '2022_11_24_114259_create_vendors_bank_details_table', 10),
(26, '2022_11_28_130341_create_sections_table', 10),
(27, '2022_12_01_102545_create_categories_table', 10),
(28, '2022_12_01_105102_create_brands_table', 10),
(29, '2022_12_01_154258_create_products_table', 10),
(30, '2022_12_05_134714_create_products_attributes_table', 10),
(31, '2022_12_06_105923_create_products_images_table', 10),
(32, '2022_12_07_013238_create_banners_table', 11),
(33, '2022_12_08_022224_update_banners_table', 12),
(34, '2022_12_10_022646_update_products_table', 13),
(35, '2022_12_13_123533_create_prodcuts_filters_table', 14),
(36, '2022_12_13_123751_create_products_filters_values_table', 15),
(37, '2022_12_13_125409_create_products_filters_table', 16),
(38, '2022_12_13_125646_create_products_filters_table', 17),
(39, '2022_12_13_130120_create_products_filters_table', 18),
(40, '2022_12_13_130301_create_products_filters_values_table', 19),
(41, '2022_12_21_140617_create_carts_table', 20);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `admin_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` float NOT NULL,
  `product_discount` float NOT NULL,
  `product_weight` int(11) NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operating_system` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `screen_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occasion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pattern` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sleeve` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fabric` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_featured` enum('No','Yes') COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_bestseller` enum('No','Yes') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `section_id`, `category_id`, `brand_id`, `admin_id`, `vendor_id`, `admin_type`, `product_name`, `product_code`, `product_color`, `product_price`, `product_discount`, `product_weight`, `product_image`, `product_video`, `description`, `operating_system`, `screen_size`, `occasion`, `fit`, `pattern`, `sleeve`, `ram`, `fabric`, `meta_title`, `meta_description`, `meta_keywords`, `is_featured`, `is_bestseller`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 5, 4, 1, 0, 'Superadmin', 'Samsung Note', 'SM10', 'Black', 10000000, 10, 500, '83801jpeg', '', 'Samsung Note 10+', 'Android', '4 to 4.4 in', NULL, NULL, NULL, NULL, '8 GB', NULL, 'samsung', 'samsung', 'samsung', 'No', 'No', 1, NULL, '2022-12-14 23:12:29'),
(2, 1, 7, 2, 1, 0, 'Superadmin', 'Nike Casual Shirts', 'NC001', 'Blue', 100000, 10, 200, '95244jpg', '', 'Nike T-shirt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tshirt', 'tshirt', 'tshirt', 'Yes', 'No', 1, NULL, '2022-12-10 23:57:17'),
(3, 1, 6, 2, 1, 0, 'Superadmin', 'Nike Skull T-shirts', 'NSTS001', 'Black', 100000, 10, 100, '15716png', NULL, 'Skull T-shirts', NULL, NULL, NULL, 'Regular Fit', NULL, 'Full Sleeve', NULL, 'cotton', 'Skull T-shirts', 'Good Tshirts', 'Tshirts', 'Yes', 'Yes', 1, '2022-12-10 23:35:16', '2022-12-21 05:41:31'),
(4, 1, 6, 3, 1, 0, 'Superadmin', 'Motor T-shirts', 'MT001', 'Black', 150000, 0, 100, '91914png', NULL, 'motor t-shirts', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'polyester', 'Tshirts', 'Tshirts', 'Tshirts', 'Yes', 'Yes', 1, '2022-12-10 23:36:01', '2022-12-16 04:21:59'),
(5, 1, 9, 2, 1, 0, 'Superadmin', 'Green Men Shoe', 'MS001', 'Green', 245000, 10, 250, '53629png', NULL, 'Shoe Green', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Green Shoe', 'Green Shoe', 'shoe', 'No', 'Yes', 1, '2022-12-10 23:37:14', '2022-12-10 23:37:14'),
(6, 1, 10, 3, 1, 0, 'Superadmin', 'Adidas Orange Shoe', 'AO001', 'Orange', 250000, 0, 250, '5029png', NULL, 'Orange Shoe for Woman', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'shoe orange', 'Orange Shoe', 'orange, shoe', 'Yes', 'No', 1, '2022-12-10 23:38:15', '2022-12-10 23:38:15'),
(7, 1, 11, 1, 1, 0, 'Superadmin', 'Bape Purple Shoe', 'BPS001', 'Purple', 345000, 2, 250, '87110png', NULL, 'Shoe Purple for Kids', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'shoe purple', 'Shoe Purple', 'shoe,purple', 'No', 'Yes', 1, '2022-12-10 23:39:13', '2022-12-10 23:39:13'),
(8, 1, 8, 3, 1, 0, 'Superadmin', 'Adidas God Top', 'GT001', 'Black', 235000, 5, 200, '42749png', NULL, 'Top for Woman', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Wool', 'top', 'top', 'top', 'No', 'Yes', 1, '2022-12-10 23:41:11', '2022-12-16 04:22:08'),
(9, 2, 5, 6, 1, 0, 'Superadmin', 'LG Phone', 'LG001', 'Black', 4300000, 15, 250, '28407jpeg', NULL, 'LG Phone', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lg', 'lg', 'lg', 'No', 'No', 1, '2022-12-13 05:19:39', '2022-12-13 05:19:39'),
(10, 2, 5, 5, 1, 0, 'Superadmin', 'Iphone', 'IP001', 'Black', 15000000, 25, 250, '77050jpg', NULL, 'Iphone 13', 'IOS', '4 to 4.4 in', NULL, NULL, NULL, NULL, '8 GB', NULL, 'iphone', 'iphone', 'iphone', 'No', 'No', 1, '2022-12-13 05:24:25', '2022-12-21 05:43:44'),
(11, 1, 6, 3, 1, 0, 'Superadmin', 'Adidas Test Shirt', 'TES001', 'White', 150000, 0, 250, '2457jpg', NULL, 'tes', NULL, NULL, NULL, 'Regular Fit', NULL, 'Full Sleeve', NULL, 'cotton', 'tes', 'tes', 'tes', 'No', 'No', 1, '2022-12-14 23:08:46', '2022-12-14 23:08:46'),
(12, 1, 6, 3, 3, 4, 'vendor', 'Adidas  Vendor Shirt', 'AVS001', 'White', 150000, 0, 250, '85733jpg', NULL, 'Vendor tee', NULL, NULL, NULL, 'Regular Fit', NULL, 'Full Sleeve', NULL, 'cotton', 'vendor tee', 'vendor tee', 'vendor tee', 'No', 'No', 1, '2022-12-19 03:34:11', '2022-12-19 03:42:08'),
(13, 1, 6, 3, 2, 1, 'vendor', 'Veto Shirt', 'VT001', 'Black', 100000, 0, 200, '99503png', NULL, 'Veto Shirt', NULL, NULL, NULL, 'Regular Fit', NULL, 'Half Sleeve', NULL, 'polyester', 'veto', 'veto', 'veto', 'No', 'No', 1, '2022-12-21 06:18:05', '2022-12-21 06:18:05');

-- --------------------------------------------------------

--
-- Table structure for table `products_attributes`
--

CREATE TABLE `products_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_attributes`
--

INSERT INTO `products_attributes` (`id`, `product_id`, `size`, `price`, `stock`, `sku`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Small', 100000, 10, 'NC001-S', 1, NULL, '2022-12-16 05:42:04'),
(2, 2, 'Medium', 200000, 10, 'NC001-M', 1, NULL, '2022-12-16 05:42:04'),
(3, 2, 'Large', 300000, 15, 'NC001-L', 1, NULL, '2022-12-16 05:42:04'),
(4, 2, 'XL', 400000, 15, 'NC001-XL', 1, '2022-12-16 05:43:15', '2022-12-16 05:43:15'),
(5, 1, '128GB - 4GB', 10000, 10, 'SM10-128', 1, '2022-12-16 05:46:29', '2022-12-16 05:46:29'),
(6, 10, '128GB - 4GB', 15000000, 1, 'IP001-128', 1, '2022-12-16 05:55:43', '2022-12-20 07:22:59'),
(7, 10, '64GB - 4GB', 13000000, 1, 'IP001-64', 1, '2022-12-16 05:56:09', '2022-12-20 06:22:15'),
(8, 13, 'Small', 100000, 14, 'VT001-S', 1, '2022-12-21 22:58:49', '2022-12-21 22:58:49'),
(9, 13, 'Medium', 120000, 2, 'VT001-M', 1, '2022-12-21 22:58:49', '2022-12-21 22:58:49'),
(10, 13, 'Large', 150000, 20, 'VT001-L', 1, '2022-12-21 22:58:49', '2022-12-21 22:58:49');

-- --------------------------------------------------------

--
-- Table structure for table `products_filters`
--

CREATE TABLE `products_filters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_ids` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filter_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filter_column` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_filters`
--

INSERT INTO `products_filters` (`id`, `cat_ids`, `filter_name`, `filter_column`, `status`, `created_at`, `updated_at`) VALUES
(1, '1,6,7,9,2,8,3', 'Fabric', 'fabric', 1, '2022-12-13 19:01:34', '2022-12-13 19:01:34'),
(2, '4,5', 'RAM', 'ram', 1, '2022-12-13 19:03:26', '2022-12-13 19:03:26'),
(3, '1,6,7,9,2,8,3', 'Sleeve', 'sleeve', 1, '2022-12-13 19:06:08', '2022-12-13 19:06:08'),
(4, '1,6,7,2,8,3', 'Pattern', 'pattern', 1, '2022-12-13 19:06:45', '2022-12-13 19:06:45'),
(5, '1,6,7,2,8,3', 'Fit', 'fit', 1, '2022-12-13 19:07:20', '2022-12-13 19:07:20'),
(6, '1,6,7,2,8,3', 'Occasion', 'occasion', 1, '2022-12-13 19:08:15', '2022-12-13 19:08:15'),
(7, '4,5', 'Screen Size', 'screen_size', 1, '2022-12-13 19:35:15', '2022-12-13 19:35:15'),
(8, '4,5', 'Operarting System', 'operating_system', 1, '2022-12-13 19:36:54', '2022-12-13 19:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `products_filters_values`
--

CREATE TABLE `products_filters_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filter_id` int(11) NOT NULL,
  `filter_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_filters_values`
--

INSERT INTO `products_filters_values` (`id`, `filter_id`, `filter_value`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'cotton', 1, '2022-12-13 19:30:00', '2022-12-13 19:30:00'),
(2, 1, 'polyester', 1, '2022-12-13 19:31:40', '2022-12-13 19:31:40'),
(3, 1, 'Wool', 1, '2022-12-13 19:32:22', '2022-12-13 19:32:22'),
(4, 3, 'Full Sleeve', 1, '2022-12-13 19:32:44', '2022-12-13 19:32:44'),
(5, 3, 'Half Sleeve', 1, '2022-12-13 19:33:02', '2022-12-13 19:33:02'),
(6, 2, '4 GB', 1, '2022-12-13 19:33:46', '2022-12-13 19:33:46'),
(7, 2, '8 GB', 1, '2022-12-13 19:33:53', '2022-12-13 19:33:53'),
(8, 7, 'Up to 3.9 in', 1, '2022-12-13 19:36:03', '2022-12-13 19:36:03'),
(9, 7, '4 to 4.4 in', 1, '2022-12-13 19:36:23', '2022-12-13 19:36:23'),
(10, 8, 'Android', 1, '2022-12-13 19:37:08', '2022-12-13 19:37:08'),
(11, 8, 'IOS', 1, '2022-12-13 19:37:27', '2022-12-13 19:37:27'),
(12, 8, 'Windows', 1, '2022-12-13 19:37:47', '2022-12-13 19:37:47'),
(13, 5, 'Regular Fit', 1, '2022-12-14 05:30:27', '2022-12-14 05:30:27');

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

CREATE TABLE `products_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Clothing', 1, NULL, NULL),
(2, 'Electronics', 1, NULL, NULL),
(3, 'Entertainment', 1, NULL, NULL),
(4, 'Sportse', 1, '2023-01-02 21:10:29', '2023-01-02 21:11:00');

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

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm` enum('No','Yes') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `email`, `confirm`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nino', 'Marina', 'Semarang', 'Jawa Tengah', 'Indonesia', '50123', '08125756890', 'veto@gmail.com', 'No', 1, NULL, '2023-01-02 21:20:46'),
(4, 'Matthew', 'Jl. Salatiga', 'Salatiga', 'Jawa Tengah', 'Indonesia', '95037', '0894567321', 'matthew@gmail.com', 'No', 0, '2022-12-16 22:40:25', '2022-12-19 04:02:05'),
(5, 'Tobing', 'Jl.Jakarta', 'Jakarta', 'Jawa Tengah', 'Indonesia', '95029', '08945673299', 'tobing@gmail.com', 'No', 0, '2022-12-21 05:10:17', '2022-12-21 06:23:19'),
(6, 'tes', NULL, NULL, NULL, NULL, NULL, '0894567324', 'tes@gmail.com', 'No', 1, '2023-01-02 21:19:23', '2023-01-02 21:20:16');

-- --------------------------------------------------------

--
-- Table structure for table `vendors_bank_details`
--

CREATE TABLE `vendors_bank_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors_bank_details`
--

INSERT INTO `vendors_bank_details` (`id`, `vendor_id`, `account_name`, `account_number`, `bank_name`, `bank_code`, `created_at`, `updated_at`) VALUES
(1, 1, 'veto', '030303030', 'Mandiri', '121212', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendors_business_details`
--

CREATE TABLE `vendors_business_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `shop_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_pincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_proof` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_license_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors_business_details`
--

INSERT INTO `vendors_business_details` (`id`, `vendor_id`, `shop_name`, `shop_address`, `shop_city`, `shop_pincode`, `shop_mobile`, `shop_email`, `address_proof`, `business_license_number`, `created_at`, `updated_at`) VALUES
(1, 1, 'Maju Jaya', 'Marina', 'Semarang', '50123', '0247548123', 'majujaya@gmail.com', 'Passport', '123123123', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_attributes`
--
ALTER TABLE `products_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_filters`
--
ALTER TABLE `products_filters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_filters_values`
--
ALTER TABLE `products_filters_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendors_email_unique` (`email`);

--
-- Indexes for table `vendors_bank_details`
--
ALTER TABLE `vendors_bank_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors_business_details`
--
ALTER TABLE `vendors_business_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products_attributes`
--
ALTER TABLE `products_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products_filters`
--
ALTER TABLE `products_filters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products_filters_values`
--
ALTER TABLE `products_filters_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vendors_bank_details`
--
ALTER TABLE `vendors_bank_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendors_business_details`
--
ALTER TABLE `vendors_business_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
