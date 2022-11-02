-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2022 at 08:39 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voice_pro`
--

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_29_130641_create_districts_table', 1),
(6, '2021_10_29_130929_create_divisions_table', 1),
(7, '2021_01_20_163744_create_pages_table', 2),
(8, '2021_12_27_160728_create_package_categories_table', 2),
(13, '2021_12_27_191545_create_packages_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `package_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_details` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `category_id`, `package_title`, `price`, `package_type`, `package_image`, `package_details`, `status`, `created_at`, `updated_at`) VALUES
(5, 3, 'Monthly Subscription-Power Dialer I', '49', 'Monthly', '466339.PNG', '<p>$49.00&nbsp;every month</p>\n\n<p>31+ Agents</p>\n\n<p>1 Line/Channel 1DID</p>\n\n<p>$49/Month per Agent/Seat</p>', 1, '2021-12-29 08:11:11', '2021-12-29 08:11:11'),
(9, 3, 'Monthly Subscription-Power Dialer II', '52', 'Yearly', 'Null', '<p>$ 52.00&nbsp;every month</p>\r\n\r\n<p>16-30 Agents</p>\r\n\r\n<p>1 Line/Channel 1DID</p>\r\n\r\n<p>$52/Month per Agent/Seat</p>', 1, '2021-12-29 09:04:57', '2021-12-29 09:04:57');

-- --------------------------------------------------------

--
-- Table structure for table `package_categories`
--

CREATE TABLE `package_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` int(11) DEFAULT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_categories`
--

INSERT INTO `package_categories` (`id`, `page_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 42, 'test', 1, '2021-12-27 12:57:51', '2021-12-27 12:57:51'),
(2, 42, 'test', 1, '2021-12-27 13:09:56', '2021-12-27 13:09:56'),
(3, 54, 'Web-Based Power Dialer & Custom CRM', 1, '2021-12-29 08:09:11', '2021-12-29 08:09:11');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `seo_title`, `slug`, `meta_tag`, `meta_description`, `cover_image`, `alt_image`, `image`, `status`, `created_at`, `updated_at`) VALUES
(42, 'testsdefsdfsdf', 'test', 'large-business', 'test', 'testr', 'Null', 'test', NULL, 1, '2021-12-24 13:28:21', '2021-12-24 14:39:34'),
(53, 'trdrdy', 'dfg', 'dfg-fdgh', 'fg', 'fg', NULL, 'fdg', NULL, 1, '2021-12-25 13:36:42', '2021-12-25 13:36:42'),
(54, 'Call Center &mdash; Voice Pro', 'Call Center &mdash; Voice Pro', 'call-center', 'Call Center &mdash; Voice Pro', 'Call Center &mdash; Voice Pro', NULL, 'Call Center &mdash; Voice Pro', NULL, 1, '2021-12-29 08:08:32', '2021-12-29 08:08:32');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT 0,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `is_admin`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 1, 'foysal@gmail.com', '018326547895', NULL, '$2y$10$BgqjM8QQLnxPb843fVVUwec6mCsmFFXm8V0MVg2dcgWrviCN640i6', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_url_hits_records`
--

CREATE TABLE `user_url_hits_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_url_hits_records`
--

INSERT INTO `user_url_hits_records` (`id`, `ip_address`, `date`, `time`, `site_url`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.1', 'Dec 24, 2021', '04:01PM EST', 'http://localhost/project/voice_pro/public/large-business', NULL, NULL),
(2, '::1', 'Dec 24, 2021', '04:05PM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(3, '::1', 'Dec 24, 2021', '04:05PM EST', 'http://localhost/project/voice_pro/public/small-business', NULL, NULL),
(4, '::1', 'Dec 24, 2021', '04:05PM EST', 'http://localhost/project/voice_pro/public/small-business', NULL, NULL),
(5, '::1', 'Dec 24, 2021', '04:05PM EST', 'http://localhost/project/voice_pro/public/large-business', NULL, NULL),
(6, '::1', 'Dec 24, 2021', '04:07PM EST', 'http://localhost/project/voice_pro/public/large-business', NULL, NULL),
(7, '::1', 'Dec 24, 2021', '04:08PM EST', 'http://localhost/project/voice_pro/public/large-business', NULL, NULL),
(8, '::1', 'Dec 24, 2021', '04:08PM EST', 'http://localhost/project/voice_pro/public/large-business', NULL, NULL),
(9, '::1', 'Dec 24, 2021', '04:09PM EST', 'http://localhost/project/voice_pro/public/large-business', NULL, NULL),
(10, '::1', 'Dec 24, 2021', '04:10PM EST', 'http://localhost/project/voice_pro/public/large-business', NULL, NULL),
(11, '::1', 'Dec 24, 2021', '04:10PM EST', 'http://localhost/project/voice_pro/public/large-business', NULL, NULL),
(12, '::1', 'Dec 24, 2021', '04:11PM EST', 'http://localhost/project/voice_pro/public/large-business', NULL, NULL),
(13, '::1', 'Dec 24, 2021', '04:12PM EST', 'http://localhost/project/voice_pro/public/large-business', NULL, NULL),
(14, '::1', 'Dec 25, 2021', '03:45AM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(15, '::1', 'Dec 25, 2021', '03:45AM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(16, '::1', 'Dec 25, 2021', '03:47AM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(17, '::1', 'Dec 25, 2021', '03:47AM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(18, '::1', 'Dec 25, 2021', '03:47AM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(19, '::1', 'Dec 25, 2021', '03:47AM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(20, '::1', 'Dec 25, 2021', '03:47AM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(21, '::1', 'Dec 25, 2021', '07:34AM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(22, '127.0.0.1', 'Dec 25, 2021', '08:17AM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(23, '::1', 'Dec 26, 2021', '06:10AM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(24, '::1', 'Dec 27, 2021', '09:57AM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(25, '127.0.0.1', 'Dec 27, 2021', '10:00AM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(26, '127.0.0.1', 'Dec 27, 2021', '10:34AM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(27, '::1', 'Dec 27, 2021', '04:02PM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(28, '::1', 'Dec 27, 2021', '04:02PM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(29, '::1', 'Dec 27, 2021', '04:02PM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(30, '::1', 'Dec 27, 2021', '04:02PM EST', 'http://localhost/project/voice_pro/public/call-center', NULL, NULL),
(31, '::1', 'Dec 27, 2021', '04:03PM EST', 'http://localhost/project/voice_pro/public/call-center', NULL, NULL),
(32, '::1', 'Dec 27, 2021', '04:07PM EST', 'http://localhost/project/voice_pro/public/call-center', NULL, NULL),
(33, '::1', 'Dec 28, 2021', '04:06AM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(34, '::1', 'Dec 29, 2021', '07:18AM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(35, '::1', 'Dec 29, 2021', '08:56AM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(36, '::1', 'Dec 29, 2021', '09:01AM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(37, '::1', 'Dec 29, 2021', '09:03AM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(38, '::1', 'Dec 29, 2021', '09:03AM EST', 'http://localhost/project/voice_pro/public/call-center', NULL, NULL),
(39, '::1', 'Dec 29, 2021', '09:22AM EST', 'http://localhost/project/voice_pro/public/call-center', NULL, NULL),
(40, '::1', 'Dec 29, 2021', '09:26AM EST', 'http://localhost/project/voice_pro/public/call-center', NULL, NULL),
(41, '::1', 'Dec 29, 2021', '09:28AM EST', 'http://localhost/project/voice_pro/public/call-center', NULL, NULL),
(42, '::1', 'Dec 29, 2021', '09:28AM EST', 'http://localhost/project/voice_pro/public/call-center', NULL, NULL),
(43, '::1', 'Dec 29, 2021', '09:28AM EST', 'http://localhost/project/voice_pro/public/call-center', NULL, NULL),
(44, '::1', 'Dec 29, 2021', '09:29AM EST', 'http://localhost/project/voice_pro/public/call-center', NULL, NULL),
(45, '::1', 'Dec 29, 2021', '09:41AM EST', 'http://localhost/project/voice_pro/public/call-center', NULL, NULL),
(46, '::1', 'Dec 29, 2021', '09:42AM EST', 'http://localhost/project/voice_pro/public/call-center', NULL, NULL),
(47, '::1', 'Dec 29, 2021', '09:42AM EST', 'http://localhost/project/voice_pro/public/call-center', NULL, NULL),
(48, '::1', 'Dec 29, 2021', '09:42AM EST', 'http://localhost/project/voice_pro/public/call-center', NULL, NULL),
(49, '::1', 'Dec 29, 2021', '09:42AM EST', 'http://localhost/project/voice_pro/public/call-center', NULL, NULL),
(50, '::1', 'Dec 29, 2021', '09:54AM EST', 'http://localhost/project/voice_pro/public/call-center', NULL, NULL),
(51, '::1', 'Dec 29, 2021', '10:03AM EST', 'http://localhost/project/voice_pro/public/call-center', NULL, NULL),
(52, '::1', 'Dec 29, 2021', '10:03AM EST', 'http://localhost/project/voice_pro/public/call-center', NULL, NULL),
(53, '::1', 'Dec 29, 2021', '10:05AM EST', 'http://localhost/project/voice_pro/public/call-center', NULL, NULL),
(54, '::1', 'Dec 29, 2021', '10:06AM EST', 'http://localhost/project/voice_pro/public/call-center', NULL, NULL),
(55, '::1', 'Dec 29, 2021', '10:08AM EST', 'http://localhost/project/voice_pro/public/call-center', NULL, NULL),
(56, '::1', 'Dec 29, 2021', '10:08AM EST', 'http://localhost/project/voice_pro/public/call-center', NULL, NULL),
(57, '::1', 'Dec 29, 2021', '10:10AM EST', 'http://localhost/project/voice_pro/public/call-center', NULL, NULL),
(58, '::1', 'Dec 29, 2021', '11:44AM EST', 'http://localhost/project/voice_pro/public/call-center', NULL, NULL),
(59, '::1', 'Dec 29, 2021', '11:44AM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(60, '::1', 'Dec 29, 2021', '11:44AM EST', 'http://localhost/project/voice_pro/public/crm', NULL, NULL),
(61, '::1', 'Dec 29, 2021', '11:44AM EST', 'http://localhost/project/voice_pro/public/fax-broadcasting', NULL, NULL),
(62, '::1', 'Dec 29, 2021', '11:44AM EST', 'http://localhost/project/voice_pro/public/fax-broadcasting', NULL, NULL),
(63, '::1', 'Dec 29, 2021', '11:44AM EST', 'http://localhost/project/voice_pro/public/politicalcampaign', NULL, NULL),
(64, '::1', 'Dec 29, 2021', '11:44AM EST', 'http://localhost/project/voice_pro/public/call-center', NULL, NULL),
(65, '::1', 'Dec 29, 2021', '11:44AM EST', 'http://localhost/project/voice_pro/public/crm', NULL, NULL),
(66, '::1', 'Dec 29, 2021', '11:52AM EST', 'http://localhost/project/voice_pro/public/crm', NULL, NULL),
(67, '::1', 'Dec 29, 2021', '11:52AM EST', 'http://localhost/project/voice_pro/public/politicalcampaign', NULL, NULL),
(68, '::1', 'Dec 29, 2021', '11:53AM EST', 'http://localhost/project/voice_pro/public/politicalcampaign', NULL, NULL),
(69, '::1', 'Dec 29, 2021', '11:53AM EST', 'http://localhost/project/voice_pro/public/politicalcampaign', NULL, NULL),
(70, '::1', 'Dec 29, 2021', '11:54AM EST', 'http://localhost/project/voice_pro/public/politicalcampaign', NULL, NULL),
(71, '::1', 'Dec 29, 2021', '11:54AM EST', 'http://localhost/project/voice_pro/public/politicalcampaign', NULL, NULL),
(72, '::1', 'Dec 29, 2021', '11:56AM EST', 'http://localhost/project/voice_pro/public/politicalcampaign', NULL, NULL),
(73, '::1', 'Dec 29, 2021', '12:09PM EST', 'http://localhost/project/voice_pro/public/crm', NULL, NULL),
(74, '::1', 'Dec 29, 2021', '12:10PM EST', 'http://localhost/project/voice_pro/public/crm', NULL, NULL),
(75, '::1', 'Dec 29, 2021', '12:10PM EST', 'http://localhost/project/voice_pro/public/politicalcampaign', NULL, NULL),
(76, '::1', 'Dec 29, 2021', '12:10PM EST', 'http://localhost/project/voice_pro/public/politicalcampaign', NULL, NULL),
(77, '::1', 'Dec 29, 2021', '12:10PM EST', 'http://localhost/project/voice_pro/public/sms-broadcasting', NULL, NULL),
(78, '::1', 'Dec 29, 2021', '12:11PM EST', 'http://localhost/project/voice_pro/public/sms-broadcasting', NULL, NULL),
(79, '::1', 'Dec 29, 2021', '12:11PM EST', 'http://localhost/project/voice_pro/public/sms-broadcasting', NULL, NULL),
(80, '::1', 'Dec 29, 2021', '12:11PM EST', 'http://localhost/project/voice_pro/public/politicalcampaign', NULL, NULL),
(81, '::1', 'Dec 29, 2021', '12:11PM EST', 'http://localhost/project/voice_pro/public/sms-broadcasting', NULL, NULL),
(82, '::1', 'Dec 29, 2021', '12:11PM EST', 'http://localhost/project/voice_pro/public/sms-broadcasting', NULL, NULL),
(83, '::1', 'Dec 29, 2021', '12:12PM EST', 'http://localhost/project/voice_pro/public/call-center', NULL, NULL),
(84, '::1', 'Dec 30, 2021', '04:58AM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(85, '::1', 'Dec 30, 2021', '09:57AM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(86, '::1', 'Dec 30, 2021', '11:22AM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(87, '::1', 'Dec 30, 2021', '11:23AM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(88, '::1', 'Dec 30, 2021', '12:15PM EST', 'http://localhost/project/voice_pro/public/crm', NULL, NULL),
(89, '::1', 'Dec 31, 2021', '02:58AM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(90, '::1', 'Jan 01, 2022', '08:29AM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(91, '127.0.0.1', 'Jan 01, 2022', '12:05PM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(92, '127.0.0.1', 'Jan 01, 2022', '12:20PM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(93, '127.0.0.1', 'Jan 01, 2022', '12:25PM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(94, '127.0.0.1', 'Jan 01, 2022', '12:32PM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(95, '127.0.0.1', 'Jan 01, 2022', '12:33PM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(96, '127.0.0.1', 'Jan 01, 2022', '12:34PM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(97, '::1', 'Jan 02, 2022', '10:38AM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(98, '::1', 'Jan 03, 2022', '08:26AM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(99, '::1', 'Jan 03, 2022', '12:16PM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL),
(100, '::1', 'Jan 03, 2022', '12:16PM EST', 'http://localhost/project/voice_pro/public/crm', NULL, NULL),
(101, '::1', 'Jan 03, 2022', '12:16PM EST', 'http://localhost/project/voice_pro/public/fax-broadcasting', NULL, NULL),
(102, '::1', 'Jan 03, 2022', '12:16PM EST', 'http://localhost/project/voice_pro/public/fax-broadcasting', NULL, NULL),
(103, '::1', 'Jan 03, 2022', '12:16PM EST', 'http://localhost/project/voice_pro/public/sms-broadcasting', NULL, NULL),
(104, '::1', 'Jan 03, 2022', '12:17PM EST', 'http://localhost/project/voice_pro/public/politicalcampaign', NULL, NULL),
(105, '::1', 'Jan 03, 2022', '12:17PM EST', 'http://localhost/project/voice_pro/public/call-center', NULL, NULL),
(106, '::1', 'Jan 05, 2022', '08:23AM EST', 'http://localhost/project/voice_pro/public/', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
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
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_categories`
--
ALTER TABLE `package_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_url_hits_records`
--
ALTER TABLE `user_url_hits_records`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `package_categories`
--
ALTER TABLE `package_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_url_hits_records`
--
ALTER TABLE `user_url_hits_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
