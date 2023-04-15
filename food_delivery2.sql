-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220801.ff0b2d86c9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 14, 2023 at 04:29 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_delivery2`
--

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
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `category` enum('Food','Drink') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `category`, `image`, `restaurant_id`, `created_at`, `updated_at`) VALUES
(1, 'neque', '360.78', 'Drink', NULL, 5, '2023-04-09 05:29:16', '2023-04-09 05:29:16'),
(2, 'adipisci', '773.41', 'Food', NULL, 8, '2023-04-09 05:29:16', '2023-04-09 05:29:16'),
(3, 'non', '2113.96', 'Drink', NULL, 3, '2023-04-09 05:29:16', '2023-04-09 05:29:16'),
(4, 'aut', '2183.21', 'Food', NULL, 5, '2023-04-09 05:29:16', '2023-04-09 05:29:16'),
(5, 'nulla', '2216.22', 'Drink', NULL, 7, '2023-04-09 05:29:16', '2023-04-09 05:29:16'),
(6, 'natus', '2449.51', 'Drink', NULL, 6, '2023-04-09 05:29:16', '2023-04-09 05:29:16'),
(7, 'consectetur', '901.05', 'Drink', 'AYZR5YurgBivJcvXJb8Efdc3bc3a0dQoBoRrRe9r.png', 1, '2023-04-09 05:29:16', '2023-04-11 13:47:21'),
(9, 'quia22', '1626.86', 'Food', 'Ut0FDLPbRz7FD1OrlGD0jD3O7F3KwqQia5VTGgH3.png', 1, '2023-04-09 05:29:16', '2023-04-11 13:46:42'),
(10, 'quod', '1905.47', 'Food', '7hdqZTbqatnF96p4rVa1zsi2M9yu8sCANlrAk2UE.png', 1, '2023-04-09 05:29:16', '2023-04-11 13:39:41'),
(11, 'ea', '455.24', 'Food', '71Cj08HwFKhLMvUbMomLIAE8NViXuJ1yzVnLtGV3.png', 1, '2023-04-09 05:29:16', '2023-04-11 13:48:08'),
(12, 'ut', '400.65', 'Drink', 'z1j5EZkZHxDqQwkyfOpwTCHwQBtuB4jYonpLcssN.png', 1, '2023-04-09 05:29:16', '2023-04-11 13:37:57'),
(13, 'ex', '1330.92', 'Food', 'lDhzRPkP5b0l4RR3Ps21OImnjIp0dIPGJnqJLt4y.png', 1, '2023-04-09 05:29:16', '2023-04-11 13:36:14'),
(14, 'facere', '1528.22', 'Food', 'QGRGmdM39TvkRuhFPbUsrkM6bHdZFe0IniGGrI9k.png', 1, '2023-04-09 05:29:16', '2023-04-11 13:35:19'),
(15, 'et', '2148.19', 'Drink', 'NQ176ALmbvWaTscLNbeKOF2ntA94LXcOjxHep5kb.png', 1, '2023-04-09 05:29:16', '2023-04-11 13:34:30'),
(16, 'fuga', '177.50', 'Food', '4vDkjSKAKmQScrfQpQ27oDS2UUGNBIz7j10rCeMF.png', 1, '2023-04-09 05:29:16', '2023-04-11 13:33:21'),
(17, 'tempore', '2421.51', 'Food', NULL, 1, '2023-04-09 05:29:16', '2023-04-09 05:29:16'),
(18, 'reprehenderit', '486.75', 'Drink', NULL, 6, '2023-04-09 05:29:16', '2023-04-09 05:29:16'),
(19, 'distinctio', '473.08', 'Drink', NULL, 10, '2023-04-09 05:29:16', '2023-04-09 05:29:16'),
(20, 'quo', '1231.19', 'Drink', NULL, 3, '2023-04-09 05:29:16', '2023-04-09 05:29:16'),
(21, 'Coca-cola', '200.00', 'Drink', NULL, 1, '2023-04-09 13:12:01', '2023-04-09 13:12:01'),
(27, 'Fanta', '200.00', 'Drink', NULL, 1, '2023-04-09 13:16:56', '2023-04-09 13:16:56'),
(28, 'test1', '230.00', 'Food', NULL, 1, '2023-04-09 13:18:02', '2023-04-09 13:18:02'),
(29, 'ttttest', '333.00', 'Food', NULL, 1, '2023-04-09 15:02:44', '2023-04-09 15:02:44'),
(30, 'test3', '234.00', 'Food', NULL, 1, '2023-04-09 15:04:30', '2023-04-09 15:04:30'),
(31, 'sdf', '234.00', 'Drink', NULL, 1, '2023-04-09 15:13:59', '2023-04-09 15:13:59'),
(32, 'wer', '333.00', 'Food', NULL, 1, '2023-04-09 15:14:48', '2023-04-09 15:14:48'),
(33, 'wwew', '234.00', 'Food', NULL, 1, '2023-04-09 16:19:42', '2023-04-09 16:19:42'),
(35, 'ttttt', '444.00', 'Drink', NULL, 1, '2023-04-09 17:28:42', '2023-04-09 17:28:42'),
(36, 'wsfsdf', '233.00', 'Food', NULL, 1, '2023-04-09 17:30:20', '2023-04-09 17:30:20'),
(37, 'asdf', '123.00', 'Food', NULL, 1, '2023-04-09 17:38:10', '2023-04-09 17:38:10'),
(39, 'Burger', '670.00', 'Food', 'uRue8Tn790sUuYObx2BHhjXapEDnIV4QyZjo4Smz.jpg', 1, '2023-04-10 08:47:18', '2023-04-10 08:47:18'),
(40, 'tete', '333.00', 'Food', 'p3cID4OZ7u4x6SpfMEla0b48fGjPJvDb0cnyc4tC.jpg', 1, '2023-04-11 08:44:06', '2023-04-11 08:44:06');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_04_06_150748_create_restaurants_table', 1),
(7, '2023_04_06_162215_create_items_table', 1),
(8, '2023_04_06_165716_create_orders_table', 1),
(9, '2023_04_06_190658_create_order_items_table', 1),
(10, '2023_04_13_085138_add_quantity_and_total_to_order_items_table', 2),
(11, '2023_04_13_090444_add_grand_total_to_orders_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `delivery_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('created','accepted','delivered','canceled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'created',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `grand_total` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `restaurant_id`, `delivery_id`, `status`, `created_at`, `updated_at`, `grand_total`) VALUES
(1, 1, 1, NULL, 'created', '2023-04-13 04:40:24', '2023-04-13 04:40:24', '0.00'),
(2, 1, 1, NULL, 'created', '2023-04-13 04:43:31', '2023-04-13 04:43:31', '0.00'),
(3, 1, 1, NULL, 'created', '2023-04-13 07:15:34', '2023-04-13 07:15:34', '0.00'),
(4, 1, 1, NULL, 'created', '2023-04-13 07:19:29', '2023-04-13 07:19:29', '0.00'),
(5, 1, 1, NULL, 'created', '2023-04-13 07:21:22', '2023-04-13 07:21:22', '3810.94'),
(6, 1, 1, NULL, 'created', '2023-04-13 09:06:30', '2023-04-13 09:06:30', '4433.38'),
(7, 1, 3, NULL, 'created', '2023-04-13 10:02:34', '2023-04-13 10:02:34', '2113.96');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_id`, `item_id`, `quantity`, `total`) VALUES
(4, 7, 1, '901.05'),
(4, 9, 1, '1626.86'),
(5, 10, 2, '3810.94'),
(6, 10, 1, '1905.47'),
(6, 9, 1, '1626.86'),
(6, 7, 1, '901.05'),
(7, 3, 1, '2113.96');

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 2, 'auth_token', 'e720e480ba9be4ead138a7318eb444b344f6d450b408db7b26436c36146997c8', '[\"admin\"]', '2023-04-14 11:35:26', NULL, '2023-04-14 10:07:25', '2023-04-14 11:35:26'),
(2, 'App\\Models\\User', 2, 'auth_token', '45c3f5a2c41429143412464978c95d6a71dbdce8485e501747358b3b099f11c8', '[\"admin\"]', '2023-04-14 12:27:59', NULL, '2023-04-14 12:25:28', '2023-04-14 12:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `address`, `email`, `email_verified_at`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'McDonalds', 'address3', 'mcdonalds@gmail.com', NULL, '$2y$10$3QXVAX/6u852LaZ3xEQa7.O22Y24PsNaj2DSl49xIReIuHDq23LF.', NULL, NULL, '2023-04-09 05:29:16', '2023-04-09 05:29:16'),
(2, 'Wisoky, Fahey and Hoeger', '395 Kristian Ridges\nAmoshaven, AZ 38308', 'ward.woodrow@block.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'Hua6uDIlo0', '2023-04-09 05:29:16', '2023-04-09 05:29:16'),
(3, 'Kris Ltd', '265 Schuster Lake\nDavisview, VT 78467-8835', 'marcel52@weissnat.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'wwoaQFq3be', '2023-04-09 05:29:16', '2023-04-09 05:29:16'),
(4, 'Cummerata-Kemmer', '6805 Smith Manor\nYesseniaville, TX 74874', 'aleen.zemlak@borer.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'WNXdWzmzcF', '2023-04-09 05:29:16', '2023-04-09 05:29:16'),
(5, 'Jones Ltd', '301 Fleta Cape Apt. 150\nWinstonhaven, HI 37036', 'janet.hammes@koch.org', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'xMJMQNROUB', '2023-04-09 05:29:16', '2023-04-09 05:29:16'),
(6, 'Reinger PLC', '9552 Dianna Brooks\nTyreektown, ID 69143-1384', 'wunsch.frank@mills.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '6skbj6kjYJ', '2023-04-09 05:29:16', '2023-04-09 05:29:16'),
(7, 'Rath Ltd', '3763 Richie Knoll\nBoscoberg, KY 40833-9528', 'kkrajcik@vonrueden.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'I5HVX0gvG3', '2023-04-09 05:29:16', '2023-04-09 05:29:16'),
(8, 'Hettinger Inc', '74895 Macejkovic Plaza\nSouth Camille, NE 37935-8983', 'aiden.morissette@will.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'AoRG3iKJsH', '2023-04-09 05:29:16', '2023-04-09 05:29:16'),
(9, 'Anderson, Funk and Zieme', '727 Bernhard Turnpike Apt. 678\nWatersstad, MO 99769-4895', 'amiya.vandervort@reilly.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'HtxgtJApnn', '2023-04-09 05:29:16', '2023-04-09 05:29:16'),
(10, 'Emmerich Inc', '801 Fabiola Trace Suite 049\nRathchester, AK 10227-8910', 'yaufderhar@herzog.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'Sl9Ze5hqj0', '2023-04-09 05:29:16', '2023-04-09 05:29:16'),
(11, 'Yundt, Upton and Lehner', '29849 Jeanne Glens Suite 946\nMarianeview, CO 44233-2117', 'kobe.walter@grant.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'QwiSbeyPmR', '2023-04-09 05:29:16', '2023-04-09 05:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('customer','delivery','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `address`, `email`, `email_verified_at`, `password`, `image`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Pera', 'Peric', 'address1', 'pera@gmail.com', NULL, '$2y$10$viABtJ9bnYyMATdfTo3TAu3ylpOxlEpS9a1rtDIcxy7JHE8.unxvu', NULL, 'customer', NULL, '2023-04-09 05:29:16', '2023-04-09 05:29:16'),
(2, 'Admin', 'Admin', 'address2', 'admin@gmail.com', NULL, '$2y$10$9wVQCKTVWLSJtu0SUZafzufn0femE6bx6FHlbFi2vN7IzmXyqQF5e', NULL, 'admin', NULL, '2023-04-09 05:29:16', '2023-04-09 05:29:16'),
(3, 'Neva', 'Larson', '708 Bernier Junctions Suite 410\nWainoport, CA 53281', 'beahan.maxie@example.org', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'customer', 'kCwa72zZhn', '2023-04-09 05:29:16', '2023-04-09 05:29:16'),
(4, 'Mortimer', 'Heidenreich', '86596 Ryleigh Turnpike Apt. 666\nNorth Kevin, ME 79594', 'melvin.sipes@example.org', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'customer', '2FgvP94S3O', '2023-04-09 05:29:16', '2023-04-09 05:29:16'),
(5, 'Pera4', 'Peric4', 'addresss 33', 'pera5@gmail.com', NULL, '$2y$10$8nEJWJbC6O4A/KUp0GQ5xOgWyOheS8tEaM88Npt4taIkag8PiVjvy', NULL, 'customer', 'ZAKaXB6Lvc', '2023-04-09 05:29:16', '2023-04-14 12:27:48'),
(6, 'Darby', 'Erdman', '49304 Scarlett Well\nNew Colin, MD 12710', 'friedrich.lebsack@example.org', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'customer', 'GlRhSWbtWM', '2023-04-09 05:29:16', '2023-04-09 05:29:16'),
(7, 'Alexandrea', 'Heathcote', '14555 Major Mountains Suite 332\nNorth Monserrateville, SD 32308', 'jerrold96@example.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'customer', 's977H2BVP5', '2023-04-09 05:29:16', '2023-04-09 05:29:16'),
(8, 'Jazmin', 'Friesen', '853 Van Square\nEast Virginieport, AR 49692-5252', 'robyn.kreiger@example.org', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'customer', 'bfhCAF9WSn', '2023-04-09 05:29:16', '2023-04-09 05:29:16'),
(9, 'Pete', 'Spencer', '14830 Kulas Field Suite 519\nLeeton, NC 78957', 'alize.wilkinson@example.org', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'customer', 'T53gJWXxHi', '2023-04-09 05:29:16', '2023-04-09 05:29:16'),
(10, 'Makenna', 'Hyatt', '8391 Gino Ramp Apt. 371\nHudsonstad, OK 34532-9249', 'qschimmel@example.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'customer', 'wb8MzeAxgU', '2023-04-09 05:29:16', '2023-04-09 05:29:16'),
(11, 'Marcel', 'Fadel', '14034 Keebler Port\nLake Breanna, WA 08340', 'bernadine.jacobi@example.net', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'customer', 'q9kcAn4IqJ', '2023-04-09 05:29:16', '2023-04-09 05:29:16'),
(12, 'Madelynn', 'Spinka', '190 Augustine Cliff\nSawaynshire, OH 39739', 'batz.keenan@example.org', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'customer', 'S8ZFPF9rLx', '2023-04-09 05:29:16', '2023-04-09 05:29:16'),
(13, 'Test User', 'Test User', 'address 1', 'test@gmail.com', NULL, '$2y$10$ayR9OIsq0E9Ze1dkIYZM1eYwXygIPSbr0a4wddYxPQX2fwnn2xtPi', NULL, 'customer', NULL, '2023-04-14 10:50:13', '2023-04-14 10:50:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_restaurant_id_foreign` (`restaurant_id`),
  ADD KEY `orders_delivery_id_foreign` (`delivery_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_item_id_foreign` (`item_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `restaurants_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_delivery_id_foreign` FOREIGN KEY (`delivery_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
