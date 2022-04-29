-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2022 at 10:54 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'William Shakespeare', '/uploads/image/author-626037a917faf.png', 1, '2022-04-19 03:45:14', '2022-04-20 10:41:13'),
(2, 'Agatha Christie', '/uploads/image/author-626037cbe2d89.png', 1, '2022-04-20 10:41:48', '2022-04-20 10:41:48'),
(3, 'Barbara Cartland', '/uploads/image/author-626037da5e6f0.png', 1, '2022-04-20 10:42:02', '2022-04-20 10:42:02'),
(4, 'Danielle Steel', '/uploads/image/author-626037e4c5f64.png', 1, '2022-04-20 10:42:13', '2022-04-20 10:42:13'),
(5, 'Harold Robbins', '/uploads/image/author-626037ed96248.png', 1, '2022-04-20 10:42:21', '2022-04-20 10:42:21'),
(6, 'Georges Simenon', '/uploads/image/author-626037f723ea3.png', 1, '2022-04-20 10:42:31', '2022-04-20 10:42:31'),
(7, 'Enid Blyton', '/uploads/image/author-62603801c5ff7.png', 1, '2022-04-20 10:42:41', '2022-04-20 10:42:41'),
(8, 'Sidney Sheldon', '/uploads/image/author-626038116bf2f.png', 1, '2022-04-20 10:42:57', '2022-04-20 10:42:57'),
(9, 'Eiichiro Oda', '/uploads/image/author-6260382a90ba4.png', 1, '2022-04-20 10:43:22', '2022-04-20 10:43:22');

-- --------------------------------------------------------

--
-- Table structure for table `billing_addresses`
--

CREATE TABLE `billing_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billing_addresses`
--

INSERT INTO `billing_addresses` (`id`, `user_id`, `name`, `phone`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, 2, 'fdsfdsf', 'dsfsdf', 'sfsdf', 'sdfdsf', NULL, NULL),
(4, 1, 'Kennan Mcconnell', '+1 (336) 922-8949', 'rynyn@mailinator.com', 'Provident quasi obc', '2022-04-21 22:29:40', '2022-04-21 22:29:40'),
(5, 5, 'Joseph Moon', '+1 (468) 873-9476', 'nabakavyta@mailinator.com', 'Reprehenderit non v', '2022-04-21 23:58:08', '2022-04-21 23:58:08');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `author_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `publisher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_page` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `demo_pdf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=>unpublished,1=>published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `category_id`, `author_id`, `title`, `price`, `image`, `stock`, `publisher`, `country`, `language`, `max_page`, `pdf`, `demo_pdf`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 4, 'Ulysses by James Joyce', 19.99, '/uploads/image/book-62603949c08af.png', 85, '', '', '', '', '', NULL, 1, '2022-04-19 03:46:42', '2022-04-20 10:48:09'),
(2, 1, 1, 'In Search of Lost Time by Marcel Proust', 10.55, '/uploads/image/book-62603932b43d7.png', 50, '', '', '', '', '', NULL, 1, '2022-04-20 10:47:46', '2022-04-20 10:47:46'),
(3, 7, 5, 'Don Quixote by Miguel de Cervantes', 5.69, '/uploads/image/book-6260395fa91ca.png', 100, '', '', '', '', '', NULL, 1, '2022-04-20 10:48:31', '2022-04-20 10:48:31'),
(4, 6, 4, 'One Hundred Years of Solitude by Gabriel Garcia Marque', 50.95, '/uploads/image/book-626039a1469d0.png', 50, '', '', '', '', '', NULL, 1, '2022-04-20 10:49:37', '2022-04-20 10:49:37'),
(5, 9, 6, 'Moby Dick by Herman Melville', 45.59, '/uploads/image/book-626039ba56ec0.png', 20, '', '', '', '', '', NULL, 1, '2022-04-20 10:50:02', '2022-04-20 10:50:02'),
(6, 5, 5, 'War and Peace by Leo Tolstoy', 25.85, '/uploads/image/book-626039d17b34c.png', 50, '', '', '', '', '', NULL, 1, '2022-04-20 10:50:25', '2022-04-20 10:50:25'),
(7, 9, 8, 'Hamlet by William Shakespeare.', 52.25, '/uploads/image/book-626039eced24c.png', 50, '', '', '', '', '', NULL, 0, '2022-04-20 10:50:52', '2022-04-20 10:50:52'),
(8, 11, 7, 'Nobis aut non Nam no', 999, '/uploads/image/book-626065d48d68a.png', 86, 'Sequi deserunt excep', 'Tempore sit velit e', 'Qui consequatur ut', '43', '/uploads/pdf//book-626065d4920ab.pdf', NULL, 1, '2022-04-20 13:58:12', '2022-04-20 13:58:12'),
(9, 10, 2, 'Facilis et et iure a', 621, '/uploads/image/book-62617479da32c.png', 61, 'Sunt iusto dolorum i', 'Lorem quis proident', 'In et neque laborum', '0', '/uploads/pdf//book-6261747a16374.pdf', NULL, 1, '2022-04-21 09:12:58', '2022-04-21 11:25:53'),
(10, 14, 1, 'Unde enim repellendu', 794, '/uploads/image/book-6261a61090cae.png', 23, 'Nisi at quo et dolor', 'Deserunt eu in volup', 'Sunt vero placeat', '0', 'uploads/pdf//book-6261a61095c66.pdf', NULL, 1, '2022-04-21 12:44:32', '2022-04-21 12:45:23');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL DEFAULT 0,
  `discount` double NOT NULL DEFAULT 0,
  `tax` double NOT NULL DEFAULT 0,
  `delivery_charge` double NOT NULL DEFAULT 0,
  `sub_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `book_id`, `quantity`, `price`, `discount`, `tax`, `delivery_charge`, `sub_total`, `trx_id`, `created_at`, `updated_at`) VALUES
(6, 1, 10, 3, 794, 0, 0, 0, '2382', NULL, '2022-04-21 21:54:30', '2022-04-21 21:57:46'),
(7, 1, 9, 3, 621, 0, 0, 0, '1863', NULL, '2022-04-21 21:54:34', '2022-04-21 21:57:46'),
(8, 1, 6, 4, 25.85, 0, 0, 0, '103.4', NULL, '2022-04-21 21:54:38', '2022-04-21 21:57:46');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Grammatical Grammer', '/uploads/image/category-626032fd678ea.png', 1, '2022-04-19 03:32:17', '2022-04-20 10:23:30'),
(2, 'Mystery Math', '/uploads/image/category-626032f30241d.png', 1, '2022-04-20 10:11:46', '2022-04-20 10:23:14'),
(3, 'Literary Fiction.', '/uploads/image/category-626032e40794a.png', 1, '2022-04-20 10:12:24', '2022-04-20 10:22:51'),
(4, 'Horror.', '/uploads/image/category-626032d95796f.png', 1, '2022-04-20 10:12:29', '2022-04-20 10:22:42'),
(5, 'Historical Fiction.', '/uploads/image/category-626032ce66adb.png', 1, '2022-04-20 10:12:34', '2022-04-20 10:22:34'),
(6, 'Fantasy.', '/uploads/image/category-626032c14dabb.png', 1, '2022-04-20 10:12:39', '2022-04-20 10:22:25'),
(7, 'Detective and Mystery.', '/uploads/image/category-626032b671437.png', 1, '2022-04-20 10:12:44', '2022-04-20 10:22:15'),
(8, 'Comic Book or Graphic Novel.', '/uploads/image/category-626032aa021c1.png', 1, '2022-04-20 10:12:48', '2022-04-20 10:22:06'),
(9, 'Classics.', '/uploads/image/category-6260328a982d0.png', 1, '2022-04-20 10:12:57', '2022-04-20 10:21:56'),
(10, 'Action and Adventure.', '/uploads/image/category-62603284d1400.png', 1, '2022-04-20 10:13:02', '2022-04-20 10:21:47'),
(11, 'Science Fiction', '/uploads/image/category-6260327e60a4e.png', 1, '2022-04-20 10:13:08', '2022-04-20 10:21:27'),
(13, '6uyrhtrtr', NULL, 1, '2022-04-21 12:03:26', '2022-04-21 12:03:26'),
(14, 'dfgfdg', NULL, 1, '2022-04-21 12:03:49', '2022-04-21 12:03:49'),
(15, 'dfgdfg', NULL, 1, '2022-04-21 12:03:51', '2022-04-21 12:03:51'),
(16, 'dfgfdg', NULL, 1, '2022-04-21 12:03:53', '2022-04-21 12:03:53'),
(17, 'dfgfdg', NULL, 1, '2022-04-21 12:03:56', '2022-04-21 12:03:56'),
(18, 'Porro sed suscipit e', NULL, 0, '2022-04-21 12:27:55', '2022-04-21 12:27:55'),
(19, 'Reprehenderit fugit', NULL, 1, '2022-04-21 12:28:47', '2022-04-21 12:28:47'),
(20, 'Voluptatem velit si', NULL, 0, '2022-04-21 12:29:04', '2022-04-21 12:29:04'),
(21, 'Sint ea quam eu cupi', NULL, 1, '2022-04-21 12:29:25', '2022-04-21 12:29:25');

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
(4, '2021_07_10_170555_create_roles_table', 1),
(5, '2022_04_15_190350_create_categories_table', 1),
(6, '2022_04_15_203130_create_authors_table', 1),
(7, '2022_04_16_153319_create_books_table', 1),
(8, '2022_04_16_171742_create_billing_adresses_table', 1),
(9, '2022_04_16_175136_create_orders_table', 1),
(10, '2022_04_16_182023_create_return_orders_table', 1),
(11, '2022_04_16_183527_create_order_details_table', 1),
(12, '2022_04_19_070832_create_settings_table', 1),
(13, '2022_04_20_194537_add_columns_to_books_table', 2),
(15, '2022_04_21_155326_create_reviews_table', 3),
(16, '2022_04_21_164659_create_carts_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `billing_address_id` bigint(20) UNSIGNED DEFAULT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 => unpaid,1=>paid',
  `total_quantity` int(11) NOT NULL DEFAULT 0,
  `sub_total` double NOT NULL DEFAULT 0,
  `total_discount` double NOT NULL DEFAULT 0,
  `total_tax` double NOT NULL DEFAULT 0,
  `delivery_charge` double NOT NULL DEFAULT 0,
  `total_amount` double NOT NULL DEFAULT 0,
  `total_payable` double NOT NULL DEFAULT 0,
  `delivery_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=>pending,1=>confirmed,2=>delivered',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `billing_address_id`, `invoice_no`, `payment_type`, `payment_status`, `total_quantity`, `sub_total`, `total_discount`, `total_tax`, `delivery_charge`, `total_amount`, `total_payable`, `delivery_status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'IN-1042413455', 'bkash', '1', 1, 20, 0, 0, 20, 40, 40, 3, NULL, '2022-04-21 11:45:15'),
(2, 2, 1, 'IN-10424132465', 'bkash', '1', 1, 20, 0, 0, 20, 40, 40, 2, NULL, NULL),
(3, 2, 1, 'IN-10424525', 'bkash', '1', 1, 20, 0, 0, 20, 40, 40, 2, NULL, NULL),
(4, 1, 4, 'IN-1871476449', 'bkash', '1', 0, 4348.4, 0, 0, 50, 4398.4, 4398.4, 0, '2022-04-21 23:01:34', '2022-04-21 23:01:34'),
(5, 1, 4, 'IN-486687317', 'bkash', '1', 0, 4348.4, 0, 0, 50, 4398.4, 4398.4, 0, '2022-04-21 23:03:43', '2022-04-21 23:03:43'),
(6, 1, 4, 'IN-935840787', 'bkash', '1', 0, 4348.4, 0, 0, 50, 4398.4, 4398.4, 0, '2022-04-21 23:04:35', '2022-04-21 23:04:35'),
(7, 5, 5, 'IN-263234352', 'cod', '1', 0, 2382, 0, 0, 50, 2432, 2432, 0, '2022-04-21 23:58:15', '2022-04-21 23:58:15'),
(8, 5, 5, 'IN-1190119168', 'cod', '1', 0, 2382, 0, 0, 50, 2432, 2432, 0, '2022-04-21 23:58:56', '2022-04-21 23:58:56'),
(9, 5, 5, 'IN-1546575563', 'cod', '1', 0, 2382, 0, 0, 50, 2432, 2432, 0, '2022-04-21 23:59:05', '2022-04-21 23:59:05');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` double NOT NULL DEFAULT 0,
  `tax` double NOT NULL DEFAULT 0,
  `discount` double NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('pharmacist@site.com', '$2y$10$.3xXAc1yXU/RaAZ0j/aNGObij0YGerv8EcTJUZVRHKFCeBHEZ8hlO', '2022-04-19 04:01:13');

-- --------------------------------------------------------

--
-- Table structure for table `return_orders`
--

CREATE TABLE `return_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `is_reject` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `return_orders`
--

INSERT INTO `return_orders` (`id`, `user_id`, `order_id`, `reason`, `status`, `is_reject`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'sdasdasd', 0, 0, NULL, '2022-04-21 11:30:53'),
(2, 2, 1, 'asdadasd', 0, 0, '2022-04-21 23:49:51', '2022-04-21 23:49:51'),
(3, 2, 1, 'asdsad', 0, 0, '2022-04-21 23:50:30', '2022-04-21 23:50:30'),
(4, 2, 3, 'asdsad', 1, 0, '2022-04-21 23:50:35', '2022-04-21 23:50:35');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `rating` double NOT NULL DEFAULT 0,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `book_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 5, 'asdasdsad', '2022-04-21 10:08:13', '2022-04-21 10:08:13'),
(2, 1, 9, 4, 'sdfdsfdsf', '2022-04-21 10:08:33', '2022-04-21 10:08:33'),
(3, 1, 9, 4, 'asfdsafdsaf', '2022-04-21 10:09:49', '2022-04-21 10:09:49'),
(4, 1, 8, 3, 'sfdsfdsf', '2022-04-21 11:37:37', '2022-04-21 11:37:37');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2022-04-19 01:30:04', '2022-04-19 01:30:04'),
(2, 'Pharmacist', '2022-04-19 01:30:04', '2022-04-19 01:30:04');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_charge` double NOT NULL DEFAULT 0,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `email`, `phone`, `address`, `delivery_charge`, `logo`, `favicon`, `created_at`, `updated_at`) VALUES
(1, 'book@support.com', '01631102838', 'Mirpur-11', 50, '/uploads/image/logo-62626c6859505.png', '/uploads/image/favicon-6261b781af1a9.png', '2022-04-19 01:30:04', '2022-04-22 02:50:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `username`, `phone`, `password`, `image`, `status`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@site.com', 'admin', '01836796052', '$2y$10$zJJn9KIRxEOlrlBbi.pCO.JifmVen8xouk8rbO6UglX/njidPugNO', '/uploads/image/user-62618434314e8.png', 1, NULL, NULL, '2022-04-19 01:30:03', '2022-04-21 10:20:04'),
(2, 2, 'Tanvir Ahmed Hera', 'Customersdfdsf@site.com', 'customersdfd', '01836796051', '$2y$10$hIRDIS5AEbbMMVvRB0Z4.eNqqQJ/4d/E4dGO7Ed4AkAsuWxTIOvFW', '/uploads/image/user-62623e818cb6f.png', 0, NULL, NULL, '2022-04-19 01:30:03', '2022-04-21 23:35:56'),
(4, 2, 'Customer1', 'Customer1@site.com', 'customer1', '018367960', '$2y$10$hIRDIS5AEbbMMVvRB0Z4.eNqqQJ/4d/E4dGO7Ed4AkAsuWxTIOvFW', NULL, 0, NULL, NULL, '2022-04-19 01:30:03', '2022-04-19 01:30:03'),
(5, 2, 'Tanvir Ahmed', 'tanvir59@outlook.com', 'tanvir', '01631102838', '$2y$10$D3.0UGz0dtV4FWfsK/cOsOBIsUqAfpq7QLdFjgwEPOsLxTgcraABS', '/uploads/image/user-626243da8ef3d.png', 1, NULL, NULL, '2022-04-21 23:57:36', '2022-04-21 23:57:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_addresses`
--
ALTER TABLE `billing_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `billing_addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_category_id_foreign` (`category_id`),
  ADD KEY `books_author_id_foreign` (`author_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_book_id_foreign` (`book_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_billing_address_id_foreign` (`billing_address_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_book_id_foreign` (`book_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `return_orders`
--
ALTER TABLE `return_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `return_orders_user_id_foreign` (`user_id`),
  ADD KEY `return_orders_order_id_foreign` (`order_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_book_id_foreign` (`book_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `billing_addresses`
--
ALTER TABLE `billing_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `return_orders`
--
ALTER TABLE `return_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing_addresses`
--
ALTER TABLE `billing_addresses`
  ADD CONSTRAINT `billing_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `books_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_billing_address_id_foreign` FOREIGN KEY (`billing_address_id`) REFERENCES `billing_addresses` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `return_orders`
--
ALTER TABLE `return_orders`
  ADD CONSTRAINT `return_orders_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `return_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
