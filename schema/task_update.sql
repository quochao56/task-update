-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 09, 2023 at 10:32 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_update`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(4, 'Blog', 'Blog Description', '2023-07-30 20:07:55', '2023-07-31 12:40:56'),
(5, 'Novel', 'Novel US change', '2023-07-31 12:28:51', '2023-07-31 12:35:00'),
(8, 'Story', 'Story Desc', '2023-07-31 14:28:37', '2023-08-07 23:41:37'),
(10, 'Romantic', 'Romantic', '2023-07-31 16:28:21', '2023-07-31 16:28:21');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'hao', 'quochao@gmail.com', '0123456789', 'binh chanh', NULL, NULL),
(3, 'hao le', 'quochao2k2@gmail.com', '1223456789', 'binh chanh', '2023-08-09 00:48:48', '2023-08-09 00:48:48'),
(11, 'hao le', 'quochao2k@gmail.com', '1233456789', 'binh chanh', '2023-08-09 02:47:23', '2023-08-09 02:47:23');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_08_031628_create_categories_table', 2),
(6, '2023_08_08_064704_create_products_table', 3),
(7, '2023_08_08_083326_add_author_type_to_users_table', 4),
(8, '2023_08_08_092412_create_purchases_table', 5),
(9, '2023_08_08_092423_create_purchase_products_table', 5),
(11, '2023_08_09_025423_create_customers_table', 6),
(12, '2023_08_09_025431_create_sales_table', 7),
(13, '2023_08_09_025437_create_sale_products_table', 7);

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
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `qty` int NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `author_id` bigint UNSIGNED NOT NULL,
  `author_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `thumb`, `price`, `qty`, `content`, `category_id`, `author_id`, `author_type`, `created_at`, `updated_at`) VALUES
(1, 'Harry Potter 1', '/storage/uploads/1690886327.harry-potter.jpg', '100.00', 1, '<p>content</p>', 8, 5, 'Novelist', '2023-07-31 21:58:09', '2023-07-31 20:38:48'),
(2, 'Fans', '/storage/uploads/1690881925.harry-potter.jpg', '2000.00', 1, '<p>content fans</p>', 4, 7, 'Blog', '2023-07-31 21:58:09', '2023-07-31 20:39:15'),
(7, 'Harry Potter 2', '/storage/uploads/1690886372.harry-potter.jpg', '333.00', 1, '<p>aaa</p>', 5, 2, 'Novelist', '2023-07-31 20:12:03', '2023-07-31 20:39:34'),
(8, 'Harry Potter 3', '/storage/uploads/1690886391.harry-potter.jpg', '333.00', 7, '<p>aaa</p>', 5, 4, 'Novelist', '2023-07-31 20:35:13', '2023-08-09 02:47:23'),
(9, 'Harry Potter 4', '/storage/uploads/1690886409.harry-potter.jpg', '333.00', 10, '<p>content</p>', 5, 2, 'Novelist', '2023-07-31 20:38:11', '2023-08-09 02:25:59'),
(16, 'Harry Potter 7', '/storage/uploads/1691572836.1690886372.harry-potter.jpg', '333.00', 5, '<p>content</p>', 5, 1, 'Novelist', '2023-08-09 02:20:38', '2023-08-09 02:25:59');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint UNSIGNED NOT NULL,
  `total_qty` int NOT NULL,
  `shipping_cost` int NOT NULL DEFAULT '0',
  `total_amount` int NOT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('pending','finished') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `purchase_date` date NOT NULL DEFAULT (curdate()),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `total_qty`, `shipping_cost`, `total_amount`, `note`, `status`, `purchase_date`, `created_at`, `updated_at`) VALUES
(1, 5, 0, 20000, 'some note', 'finished', '2023-08-02', '2023-08-02 02:56:02', NULL),
(2, 10, 0, 300000, 'some note', 'pending', '2023-08-02', '2023-08-02 02:56:02', NULL),
(9, 4, 0, 1332, 'note', 'pending', '2023-08-03', '2023-08-02 13:01:06', '2023-08-02 13:01:06'),
(10, 6, 0, 6300, NULL, 'pending', '2023-08-08', '2023-08-08 02:46:02', '2023-08-08 02:46:02'),
(11, 3, 0, 999, 'buy 3 hp 6', 'pending', '2023-08-08', '2023-08-08 02:55:58', '2023-08-08 02:55:58'),
(12, 1, 0, 333, NULL, 'pending', '2023-08-08', '2023-08-08 02:56:39', '2023-08-08 02:56:39'),
(13, 5, 0, 1665, NULL, 'pending', '2023-08-08', '2023-08-08 02:57:06', '2023-08-08 02:57:06'),
(14, 3, 0, 999, NULL, 'pending', '2023-08-08', '2023-08-08 02:58:29', '2023-08-08 02:58:29'),
(20, 6, 0, 1998, NULL, 'finished', '2023-08-08', '2023-08-08 03:05:15', '2023-08-08 03:05:15'),
(21, 2, 0, 666, NULL, 'pending', '2023-08-08', '2023-08-08 03:05:28', '2023-08-08 03:05:28'),
(22, 6, 0, 1998, NULL, 'finished', '2023-08-09', '2023-08-08 19:50:52', '2023-08-08 19:50:52'),
(23, 3, 0, 999, NULL, 'finished', '2023-08-09', '2023-08-08 21:55:48', '2023-08-08 21:55:48'),
(24, 22, 0, 7326, NULL, 'pending', '2023-08-09', '2023-08-09 01:40:00', '2023-08-09 01:40:00'),
(25, 6, 0, 1998, NULL, 'pending', '2023-08-09', '2023-08-09 02:22:23', '2023-08-09 02:22:23');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_products`
--

CREATE TABLE `purchase_products` (
  `id` bigint UNSIGNED NOT NULL,
  `purchase_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `qty` int NOT NULL,
  `price` int NOT NULL,
  `total_amount` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_products`
--

INSERT INTO `purchase_products` (`id`, `purchase_id`, `product_id`, `qty`, `price`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 5000, 10000, '2023-08-02 03:02:38', NULL),
(2, 1, 1, 2, 10000, 20000, '2023-08-02 03:03:39', NULL),
(3, 2, 8, 20, 2000, 40000, '2023-08-02 03:03:39', NULL),
(6, 9, 8, 2, 333, 666, NULL, NULL),
(7, 9, 9, 2, 333, 666, NULL, NULL),
(8, 10, 1, 3, 100, 300, NULL, NULL),
(9, 10, 2, 3, 2000, 6000, NULL, NULL),
(14, 20, 8, 3, 333, 999, NULL, NULL),
(15, 20, 9, 3, 333, 999, NULL, NULL),
(16, 21, 9, 2, 333, 666, NULL, NULL),
(17, 22, 9, 3, 333, 999, NULL, NULL),
(19, 23, 9, 3, 333, 999, NULL, NULL),
(20, 24, 8, 6, 333, 1998, NULL, NULL),
(21, 24, 9, 12, 333, 3996, NULL, NULL),
(23, 25, 8, 3, 333, 999, NULL, NULL),
(24, 25, 16, 3, 333, 999, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `total_qty` int NOT NULL,
  `shipping_cost` int NOT NULL DEFAULT '0',
  `total_amount` int NOT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('pending','finished') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `sale_date` date NOT NULL DEFAULT (curdate()),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `customer_id`, `total_qty`, `shipping_cost`, `total_amount`, `note`, `status`, `sale_date`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 0, 20000, 'note', 'pending', '2023-08-09', NULL, NULL),
(2, 1, 4, 0, 1332, NULL, 'pending', '2023-08-09', '2023-08-09 00:33:51', '2023-08-09 00:33:51'),
(3, 3, 6, 0, 1998, NULL, 'pending', '2023-08-09', '2023-08-09 00:48:48', '2023-08-09 00:48:48'),
(4, 1, 7, 0, 2331, NULL, 'pending', '2023-08-09', '2023-08-09 01:25:48', '2023-08-09 01:25:48'),
(5, 3, 9, 0, 2997, NULL, 'pending', '2023-08-09', '2023-08-09 01:29:02', '2023-08-09 01:29:02'),
(6, 1, 1, 0, 333, NULL, 'pending', '2023-08-09', '2023-08-09 01:31:45', '2023-08-09 01:31:45'),
(8, 3, 1, 0, 333, NULL, 'pending', '2023-08-09', '2023-08-09 02:36:47', '2023-08-09 02:36:47'),
(9, 11, 1, 0, 333, NULL, 'pending', '2023-08-09', '2023-08-09 02:47:23', '2023-08-09 02:47:23');

-- --------------------------------------------------------

--
-- Table structure for table `sale_products`
--

CREATE TABLE `sale_products` (
  `id` bigint UNSIGNED NOT NULL,
  `sale_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `qty` int NOT NULL,
  `price` int NOT NULL,
  `total_amount` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_products`
--

INSERT INTO `sale_products` (`id`, `sale_id`, `product_id`, `qty`, `price`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 300, 300, NULL, NULL),
(2, 1, 1, 2, 300, 600, NULL, NULL),
(3, 2, 9, 1, 333, 333, NULL, NULL),
(5, 3, 8, 2, 333, 666, NULL, NULL),
(7, 4, 8, 1, 333, 333, NULL, NULL),
(8, 4, 9, 3, 333, 999, NULL, NULL),
(10, 5, 9, 8, 333, 2664, NULL, NULL),
(12, 6, 8, 1, 333, 333, NULL, NULL),
(15, 8, 8, 1, 333, 333, NULL, NULL),
(16, 9, 8, 1, 333, 333, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','user','agent') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` enum('Novelist','Poet','Essayist') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `role`, `password`, `remember_token`, `created_at`, `updated_at`, `type`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, 'admin', '$2y$10$xe1eyo2Ch1mFdT40cjIPweg6JvUiIaC0f3SomOAeTVWjantj5V9eu', NULL, NULL, NULL, 'Novelist'),
(2, 'Agent', 'agent@gmail.com', NULL, 'agent', '$2y$10$9DiE1E1P3BkSrd5HUIL8LO7uREmqKE.qvCX.Gy7ZS0WztpPxhHBOi', NULL, NULL, NULL, 'Poet'),
(3, 'User', 'user@gmail.com', NULL, 'user', '$2y$10$bdScoLanPZEP7AospfllmO7mp4U2g6u5RsDgEOIck4pX7IEt1fNMm', NULL, NULL, NULL, 'Essayist'),
(4, 'Prof. Garth Leffler', 'paris83@example.com', '2023-08-07 01:05:02', 'user', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '5Nu7ITx6GH', '2023-08-07 01:05:02', '2023-08-07 01:05:02', 'Novelist'),
(5, 'Bernadine Mayert IV', 'arne.walter@example.net', '2023-08-07 01:05:02', 'agent', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6fg54A2i4V', '2023-08-07 01:05:02', '2023-08-07 01:05:02', 'Novelist'),
(6, 'Jaylen Goodwin', 'halvorson.mabel@example.org', '2023-08-07 01:05:02', 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Db1czv7Gtf', '2023-08-07 01:05:02', '2023-08-07 01:05:02', 'Novelist'),
(7, 'Prof. Perry Rempel V', 'althea.dicki@example.net', '2023-08-07 01:05:02', 'user', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'JL17E0gKzV', '2023-08-07 01:05:02', '2023-08-07 01:05:02', 'Novelist'),
(8, 'Joshua Volkman', 'dashawn42@example.org', '2023-08-07 01:05:02', 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Z2UCK85ywu', '2023-08-07 01:05:02', '2023-08-07 01:05:02', 'Novelist');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_author_id_foreign` (`author_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_products`
--
ALTER TABLE `purchase_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_products_purchase_id_foreign` (`purchase_id`),
  ADD KEY `purchase_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `sale_products`
--
ALTER TABLE `sale_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sale_products_sale_id_foreign` (`sale_id`),
  ADD KEY `sale_products_product_id_foreign` (`product_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `purchase_products`
--
ALTER TABLE `purchase_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sale_products`
--
ALTER TABLE `sale_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchase_products`
--
ALTER TABLE `purchase_products`
  ADD CONSTRAINT `purchase_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchase_products_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sale_products`
--
ALTER TABLE `sale_products`
  ADD CONSTRAINT `sale_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sale_products_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
