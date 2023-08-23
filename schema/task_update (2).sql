-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 23, 2023 at 10:57 AM
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
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '0129371212', 'admin@gmail.com', NULL, '$2y$10$SWHgKHcAV.2c9wGZXeHsguxv90A34tm94ScvQggEPu/13ueBL2T4u', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`, `status`, `slug`) VALUES
(4, 'Blog', 'Blog Description', '2023-07-30 20:07:55', '2023-07-31 12:40:56', 'active', ''),
(5, 'Novel', 'Novel US change', '2023-07-31 12:28:51', '2023-07-31 12:35:00', 'active', ''),
(8, 'Story', 'Story Desc', '2023-07-31 14:28:37', '2023-08-07 23:41:37', 'active', ''),
(10, 'Romantic', 'Romantic', '2023-07-31 16:28:21', '2023-08-20 23:51:47', 'inactive', 'romantic');

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
(13, '2023_08_09_025437_create_sale_products_table', 7),
(14, '2023_08_15_094758_create_posts_table', 8),
(15, '2023_08_17_083337_add_content_to_posts_table', 9),
(16, '2023_08_17_103319_create_admins_table', 10),
(17, '2023_08_21_015335_add_status_to_categories_table', 11),
(18, '2023_08_21_015939_add_status_and_price_sale_to_products_table', 12),
(19, '2023_08_21_020249_remove_author_id_from_products_table', 13),
(21, '2023_08_21_021004_add_foreign_key_author_id_to_products_table', 14),
(22, '2023_08_21_023246_add_status_to_posts_table', 15),
(23, '2023_08_21_032001_add_slug_to_categories_table', 16),
(24, '2023_08_21_071446_add_slug_to_products_table', 17),
(42, '2023_08_21_073912_create_warehouses_table', 18),
(43, '2023_08_21_073926_create_stores_table', 18),
(44, '2023_08_21_074000_create_warehouse_stores_table', 18),
(45, '2023_08_21_074026_create_product_stores_table', 18),
(46, '2023_08_21_074037_create_product_warehouses_table', 18),
(47, '2023_08_21_092840_add_status_to_warehouses_table', 18),
(48, '2023_08_21_092919_add_status_to_stores_table', 18),
(49, '2023_08_21_095418_add_warehouse_id_to_purchases_table', 19);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `slug`, `title`, `description`, `thumb`, `created_at`, `updated_at`, `user_id`, `content`, `status`) VALUES
(4, 'my-newyork-trip', 'my newyork trip', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Pharetra et ultrices neque ornare aenean euismod. Velit dignissim sodales ut eu sem integer vitae justo', '64ddc2048ce58-this-is-my-title.jpg', '2023-08-16 23:45:24', '2023-08-17 02:11:37', 3, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Pharetra et ultrices neque ornare aenean euismod. Velit dignissim sodales ut eu sem integer vitae justo. Ut placerat orci nulla pellentesque dignissim enim sit amet venenatis. Rhoncus dolor purus non enim praesent elementum facilisis. Id nibh tortor id aliquet lectus proin nibh nisl condimentum. Vestibulum morbi blandit cursus risus at ultrices mi tempus. Risus nec feugiat in fermentum posuere urna. Venenatis tellus in metus vulputate eu scelerisque felis imperdiet proin. Eu mi bibendum neque egestas congue quisque. Nunc sed augue lacus viverra vitae congue eu consequat ac. Tortor aliquam nulla facilisi cras fermentum. Dui ut ornare lectus sit amet est placerat in. Augue neque gravida in fermentum et. Non tellus orci ac auctor augue mauris. Mattis enim ut tellus elementum sagittis vitae. Venenatis tellus in metus vulputate. Lacus laoreet non curabitur gravida arcu. Varius morbi enim nunc faucibus a. Porttitor rhoncus dolor purus non enim.</p>\r\n\r\n<p>Et leo duis ut diam quam. Auctor urna nunc id cursus metus aliquam eleifend mi in. Pellentesque dignissim enim sit amet venenatis. Libero justo laoreet sit amet cursus. Eget dolor morbi non arcu risus quis varius quam quisque. Imperdiet nulla malesuada pellentesque elit. Id aliquet lectus proin nibh nisl condimentum id. Tincidunt lobortis feugiat vivamus at augue eget. Diam vel quam elementum pulvinar etiam non quam lacus suspendisse. Consectetur libero id faucibus nisl tincidunt eget nullam. Accumsan sit amet nulla facilisi morbi. Lorem mollis aliquam ut porttitor leo a. In dictum non consectetur a erat nam at lectus urna. Ut eu sem integer vitae justo. In fermentum et sollicitudin ac orci phasellus. Vulputate sapien nec sagittis aliquam malesuada bibendum. Velit ut tortor pretium viverra suspendisse potenti. Cursus risus at ultrices mi tempus imperdiet. Massa tincidunt nunc pulvinar sapien et ligula.</p>\r\n\r\n<p>Ultrices in iaculis nunc sed augue lacus viverra vitae congue. Natoque penatibus et magnis dis parturient. Dignissim enim sit amet venenatis urna. In hac habitasse platea dictumst quisque sagittis. Ultrices gravida dictum fusce ut placerat orci nulla pellentesque. Eleifend donec pretium vulputate sapien nec sagittis aliquam. Non curabitur gravida arcu ac tortor dignissim convallis aenean et. Sem et tortor consequat id. Varius vel pharetra vel turpis nunc eget. Bibendum enim facilisis gravida neque convallis. Elit at imperdiet dui accumsan sit amet nulla facilisi morbi. Viverra justo nec ultrices dui sapien.</p>\r\n\r\n<p>Amet justo donec enim diam vulputate ut pharetra. Quis blandit turpis cursus in hac habitasse. Felis eget nunc lobortis mattis aliquam faucibus. Lectus sit amet est placerat in egestas erat imperdiet. Ullamcorper dignissim cras tincidunt lobortis feugiat vivamus at augue eget. Quam adipiscing vitae proin sagittis nisl rhoncus mattis. Arcu ac tortor dignissim convallis aenean et tortor. Pharetra pharetra massa massa ultricies mi quis. Eu nisl nunc mi ipsum faucibus vitae aliquet nec. Enim ut sem viverra aliquet eget sit. Purus gravida quis blandit turpis cursus in hac. Non blandit massa enim nec.</p>\r\n\r\n<p>Morbi tincidunt augue interdum velit. Vitae et leo duis ut diam quam. Risus nec feugiat in fermentum. Integer malesuada nunc vel risus commodo viverra. Lacinia quis vel eros donec ac odio tempor. At lectus urna duis convallis convallis. Et netus et malesuada fames ac turpis egestas integer eget. Purus semper eget duis at tellus at. Dignissim suspendisse in est ante in nibh mauris cursus mattis. Sem integer vitae justo eget magna fermentum. Eu scelerisque felis imperdiet proin fermentum leo vel orci porta. Risus quis varius quam quisque id diam vel quam. Suspendisse ultrices gravida dictum fusce ut placerat orci nulla pellentesque.</p>', 'active'),
(7, 'london', 'London', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elit ut aliquam purus sit amet.', '64dddb1072d59-london.jpg', '2023-08-17 01:32:16', '2023-08-17 01:54:27', 2, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elit ut aliquam purus sit amet. Tristique nulla aliquet enim tortor at auctor urna. Malesuada pellentesque elit eget gravida cum sociis natoque penatibus et. <strong>Malesuada proin libero nunc consequat interdum varius</strong>. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus. Elementum integer enim neque volutpat ac tincidunt vitae. Augue eget arcu dictum varius duis at. Magnis dis parturient montes nascetur ridiculus mus mauris vitae. Ullamcorper dignissim cras tincidunt lobortis feugiat. Nibh cras pulvinar mattis nunc sed blandit libero volutpat sed. Sed arcu non odio euismod lacinia at quis risus sed. In aliquam sem fringilla ut. Pretium quam vulputate dignissim suspendisse in.</p>\r\n\r\n<p>Scelerisque fermentum dui faucibus in ornare. Nec nam aliquam sem et tortor. Volutpat est velit egestas dui id ornare arcu. Fermentum dui faucibus in ornare. Imperdiet dui accumsan sit amet nulla facilisi morbi. A iaculis at erat pellentesque adipiscing commodo elit. Nisi scelerisque eu ultrices vitae auctor eu. Fringilla urna porttitor rhoncus dolor purus non enim. Morbi tristique senectus et netus et malesuada fames ac. Iaculis eu non diam phasellus vestibulum lorem sed risus. Ut consequat semper viverra nam libero justo. Rhoncus urna neque viverra justo nec ultrices dui sapien. Etiam non quam lacus suspendisse faucibus interdum posuere lorem. Ipsum a arcu cursus vitae congue mauris rhoncus. Bibendum est ultricies integer quis auctor elit. Pellentesque pulvinar pellentesque habitant morbi tristique. Ornare lectus sit amet est placerat in. Fermentum posuere urna nec tincidunt praesent semper feugiat nibh sed.</p>\r\n\r\n<p>Pretium lectus quam id leo in. Sed id semper risus in hendrerit gravida. Odio eu feugiat pretium nibh ipsum. Pharetra diam sit amet nisl suscipit adipiscing bibendum. Tellus id interdum velit laoreet id. Nibh sed pulvinar proin gravida hendrerit lectus. Tempor orci dapibus ultrices in iaculis nunc sed augue. Accumsan sit amet nulla facilisi morbi. Enim ut sem viverra aliquet eget sit amet. Sit amet tellus cras adipiscing enim eu turpis egestas.</p>\r\n\r\n<p>Donec et odio pellentesque diam volutpat commodo sed egestas. Magna sit amet purus gravida quis. Praesent elementum facilisis leo vel fringilla est ullamcorper eget. Sit amet consectetur adipiscing elit duis. Velit aliquet sagittis id consectetur. Ultricies lacus sed turpis tincidunt id aliquet risus feugiat. Amet consectetur adipiscing elit pellentesque habitant morbi tristique. Quam pellentesque nec nam aliquam sem et tortor. Dolor sit amet consectetur adipiscing elit duis. Scelerisque fermentum dui faucibus in ornare. Amet volutpat consequat mauris nunc congue nisi vitae suscipit. Neque volutpat ac tincidunt vitae. Nec dui nunc mattis enim ut. Iaculis eu non diam phasellus vestibulum lorem sed risus ultricies. Neque laoreet suspendisse interdum consectetur. Tortor at risus viverra adipiscing at in. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Duis ultricies lacus sed turpis tincidunt id aliquet. Nec feugiat nisl pretium fusce id velit ut tortor pretium.</p>\r\n\r\n<p>Porttitor eget dolor morbi non arcu. Neque laoreet suspendisse interdum consectetur libero id. Tincidunt lobortis feugiat vivamus at augue eget. Donec ac odio tempor orci dapibus ultrices. Tincidunt lobortis feugiat vivamus at augue eget arcu. Arcu non odio euismod lacinia at. Cras sed felis eget velit aliquet. Pharetra convallis posuere morbi leo. Enim tortor at auctor urna nunc id cursus metus aliquam. Sapien et ligula ullamcorper malesuada proin libero nunc consequat. Tempor id eu nisl nunc mi. Nisi quis eleifend quam adipiscing vitae proin sagittis nisl. Ultrices dui sapien eget mi proin sed. Purus in mollis nunc sed id. Rutrum tellus pellentesque eu tincidunt tortor aliquam nulla facilisi cras. Arcu cursus euismod quis viverra nibh cras.</p>', 'active'),
(8, 'paris', 'Paris', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', '64dde58a8a7ee-paris.jpg', '2023-08-17 02:16:58', '2023-08-17 02:16:58', 3, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Massa vitae tortor condimentum lacinia quis vel eros donec. Aliquam etiam erat velit scelerisque in dictum. Felis donec et odio pellentesque diam. Pretium nibh ipsum consequat nisl vel. Faucibus in ornare quam viverra. Vivamus at augue eget arcu dictum varius duis at. Turpis massa sed elementum tempus egestas sed sed risus. Rhoncus mattis rhoncus urna neque viverra. Varius vel pharetra vel turpis nunc eget. Commodo ullamcorper a lacus vestibulum sed arcu non odio euismod.</p>\r\n\r\n<p>Platea dictumst vestibulum rhoncus est pellentesque elit. Erat nam at lectus urna duis convallis convallis tellus id. Viverra nam libero justo laoreet sit amet cursus sit. Diam maecenas sed enim ut sem viverra aliquet. Tellus rutrum tellus pellentesque eu. Id cursus metus aliquam eleifend mi in nulla posuere sollicitudin. A cras semper auctor neque vitae tempus. Scelerisque felis imperdiet proin fermentum leo vel orci. Condimentum vitae sapien pellentesque habitant morbi tristique senectus. Velit sed ullamcorper morbi tincidunt ornare massa. Diam sollicitudin tempor id eu nisl nunc. Viverra nam libero justo laoreet sit amet.</p>\r\n\r\n<p>Eget arcu dictum varius duis at consectetur lorem donec massa. Dui accumsan sit amet nulla facilisi. Magna fermentum iaculis eu non. Sagittis purus sit amet volutpat consequat mauris. Ornare massa eget egestas purus. Ornare arcu odio ut sem nulla pharetra diam. Amet volutpat consequat mauris nunc congue nisi vitae suscipit. Sit amet consectetur adipiscing elit duis tristique sollicitudin nibh sit. Id porta nibh venenatis cras. Nunc eget lorem dolor sed. Ut enim blandit volutpat maecenas volutpat blandit aliquam etiam erat. Senectus et netus et malesuada fames ac turpis egestas. Id diam maecenas ultricies mi eget. Morbi tempus iaculis urna id volutpat lacus laoreet non. Tristique nulla aliquet enim tortor at auctor urna nunc id. Risus nullam eget felis eget nunc. Lorem ipsum dolor sit amet consectetur. Est ullamcorper eget nulla facilisi etiam dignissim. Lobortis mattis aliquam faucibus purus in massa tempor nec.</p>\r\n\r\n<p>Est lorem ipsum dolor sit. Fermentum leo vel orci porta. Quis vel eros donec ac odio tempor. Pretium viverra suspendisse potenti nullam. Nullam ac tortor vitae purus faucibus ornare suspendisse. Molestie nunc non blandit massa. In eu mi bibendum neque egestas congue quisque egestas. Nisl condimentum id venenatis a condimentum vitae. Aliquam etiam erat velit scelerisque in dictum non consectetur a. Consectetur a erat nam at lectus urna duis convallis convallis. Est lorem ipsum dolor sit. Morbi quis commodo odio aenean sed adipiscing. Et tortor at risus viverra adipiscing at in. Et netus et malesuada fames ac. Interdum varius sit amet mattis vulputate enim. Enim sit amet venenatis urna cursus eget nunc. A condimentum vitae sapien pellentesque habitant morbi tristique senectus.</p>\r\n\r\n<p>Amet luctus venenatis lectus magna fringilla. Bibendum enim facilisis gravida neque convallis a cras semper auctor. Viverra nam libero justo laoreet sit amet cursus. Auctor neque vitae tempus quam pellentesque nec nam aliquam. Aenean pharetra magna ac placerat vestibulum lectus mauris. Amet nisl purus in mollis nunc sed. Eget aliquet nibh praesent tristique magna sit amet. Sed libero enim sed faucibus turpis in. Ut tellus elementum sagittis vitae et leo duis ut. Mauris vitae ultricies leo integer.</p>', 'active'),
(9, 'hong-kong', 'hong kong', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', '64dde58a8a7ee-paris.jpg', '2023-08-17 02:16:58', '2023-08-17 02:16:58', 3, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Massa vitae tortor condimentum lacinia quis vel eros donec. Aliquam etiam erat velit scelerisque in dictum. Felis donec et odio pellentesque diam. Pretium nibh ipsum consequat nisl vel. Faucibus in ornare quam viverra. Vivamus at augue eget arcu dictum varius duis at. Turpis massa sed elementum tempus egestas sed sed risus. Rhoncus mattis rhoncus urna neque viverra. Varius vel pharetra vel turpis nunc eget. Commodo ullamcorper a lacus vestibulum sed arcu non odio euismod.</p>\r\n\r\n<p>Platea dictumst vestibulum rhoncus est pellentesque elit. Erat nam at lectus urna duis convallis convallis tellus id. Viverra nam libero justo laoreet sit amet cursus sit. Diam maecenas sed enim ut sem viverra aliquet. Tellus rutrum tellus pellentesque eu. Id cursus metus aliquam eleifend mi in nulla posuere sollicitudin. A cras semper auctor neque vitae tempus. Scelerisque felis imperdiet proin fermentum leo vel orci. Condimentum vitae sapien pellentesque habitant morbi tristique senectus. Velit sed ullamcorper morbi tincidunt ornare massa. Diam sollicitudin tempor id eu nisl nunc. Viverra nam libero justo laoreet sit amet.</p>\r\n\r\n<p>Eget arcu dictum varius duis at consectetur lorem donec massa. Dui accumsan sit amet nulla facilisi. Magna fermentum iaculis eu non. Sagittis purus sit amet volutpat consequat mauris. Ornare massa eget egestas purus. Ornare arcu odio ut sem nulla pharetra diam. Amet volutpat consequat mauris nunc congue nisi vitae suscipit. Sit amet consectetur adipiscing elit duis tristique sollicitudin nibh sit. Id porta nibh venenatis cras. Nunc eget lorem dolor sed. Ut enim blandit volutpat maecenas volutpat blandit aliquam etiam erat. Senectus et netus et malesuada fames ac turpis egestas. Id diam maecenas ultricies mi eget. Morbi tempus iaculis urna id volutpat lacus laoreet non. Tristique nulla aliquet enim tortor at auctor urna nunc id. Risus nullam eget felis eget nunc. Lorem ipsum dolor sit amet consectetur. Est ullamcorper eget nulla facilisi etiam dignissim. Lobortis mattis aliquam faucibus purus in massa tempor nec.</p>\r\n\r\n<p>Est lorem ipsum dolor sit. Fermentum leo vel orci porta. Quis vel eros donec ac odio tempor. Pretium viverra suspendisse potenti nullam. Nullam ac tortor vitae purus faucibus ornare suspendisse. Molestie nunc non blandit massa. In eu mi bibendum neque egestas congue quisque egestas. Nisl condimentum id venenatis a condimentum vitae. Aliquam etiam erat velit scelerisque in dictum non consectetur a. Consectetur a erat nam at lectus urna duis convallis convallis. Est lorem ipsum dolor sit. Morbi quis commodo odio aenean sed adipiscing. Et tortor at risus viverra adipiscing at in. Et netus et malesuada fames ac. Interdum varius sit amet mattis vulputate enim. Enim sit amet venenatis urna cursus eget nunc. A condimentum vitae sapien pellentesque habitant morbi tristique senectus.</p>\r\n\r\n<p>Amet luctus venenatis lectus magna fringilla. Bibendum enim facilisis gravida neque convallis a cras semper auctor. Viverra nam libero justo laoreet sit amet cursus. Auctor neque vitae tempus quam pellentesque nec nam aliquam. Aenean pharetra magna ac placerat vestibulum lectus mauris. Amet nisl purus in mollis nunc sed. Eget aliquet nibh praesent tristique magna sit amet. Sed libero enim sed faucibus turpis in. Ut tellus elementum sagittis vitae et leo duis ut. Mauris vitae ultricies leo integer.</p>', 'active'),
(10, 'phu-quoc', 'phu quoc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', '64dde58a8a7ee-paris.jpg', '2023-08-17 02:16:58', '2023-08-17 02:16:58', 3, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Massa vitae tortor condimentum lacinia quis vel eros donec. Aliquam etiam erat velit scelerisque in dictum. Felis donec et odio pellentesque diam. Pretium nibh ipsum consequat nisl vel. Faucibus in ornare quam viverra. Vivamus at augue eget arcu dictum varius duis at. Turpis massa sed elementum tempus egestas sed sed risus. Rhoncus mattis rhoncus urna neque viverra. Varius vel pharetra vel turpis nunc eget. Commodo ullamcorper a lacus vestibulum sed arcu non odio euismod.</p>\r\n\r\n<p>Platea dictumst vestibulum rhoncus est pellentesque elit. Erat nam at lectus urna duis convallis convallis tellus id. Viverra nam libero justo laoreet sit amet cursus sit. Diam maecenas sed enim ut sem viverra aliquet. Tellus rutrum tellus pellentesque eu. Id cursus metus aliquam eleifend mi in nulla posuere sollicitudin. A cras semper auctor neque vitae tempus. Scelerisque felis imperdiet proin fermentum leo vel orci. Condimentum vitae sapien pellentesque habitant morbi tristique senectus. Velit sed ullamcorper morbi tincidunt ornare massa. Diam sollicitudin tempor id eu nisl nunc. Viverra nam libero justo laoreet sit amet.</p>\r\n\r\n<p>Eget arcu dictum varius duis at consectetur lorem donec massa. Dui accumsan sit amet nulla facilisi. Magna fermentum iaculis eu non. Sagittis purus sit amet volutpat consequat mauris. Ornare massa eget egestas purus. Ornare arcu odio ut sem nulla pharetra diam. Amet volutpat consequat mauris nunc congue nisi vitae suscipit. Sit amet consectetur adipiscing elit duis tristique sollicitudin nibh sit. Id porta nibh venenatis cras. Nunc eget lorem dolor sed. Ut enim blandit volutpat maecenas volutpat blandit aliquam etiam erat. Senectus et netus et malesuada fames ac turpis egestas. Id diam maecenas ultricies mi eget. Morbi tempus iaculis urna id volutpat lacus laoreet non. Tristique nulla aliquet enim tortor at auctor urna nunc id. Risus nullam eget felis eget nunc. Lorem ipsum dolor sit amet consectetur. Est ullamcorper eget nulla facilisi etiam dignissim. Lobortis mattis aliquam faucibus purus in massa tempor nec.</p>\r\n\r\n<p>Est lorem ipsum dolor sit. Fermentum leo vel orci porta. Quis vel eros donec ac odio tempor. Pretium viverra suspendisse potenti nullam. Nullam ac tortor vitae purus faucibus ornare suspendisse. Molestie nunc non blandit massa. In eu mi bibendum neque egestas congue quisque egestas. Nisl condimentum id venenatis a condimentum vitae. Aliquam etiam erat velit scelerisque in dictum non consectetur a. Consectetur a erat nam at lectus urna duis convallis convallis. Est lorem ipsum dolor sit. Morbi quis commodo odio aenean sed adipiscing. Et tortor at risus viverra adipiscing at in. Et netus et malesuada fames ac. Interdum varius sit amet mattis vulputate enim. Enim sit amet venenatis urna cursus eget nunc. A condimentum vitae sapien pellentesque habitant morbi tristique senectus.</p>\r\n\r\n<p>Amet luctus venenatis lectus magna fringilla. Bibendum enim facilisis gravida neque convallis a cras semper auctor. Viverra nam libero justo laoreet sit amet cursus. Auctor neque vitae tempus quam pellentesque nec nam aliquam. Aenean pharetra magna ac placerat vestibulum lectus mauris. Amet nisl purus in mollis nunc sed. Eget aliquet nibh praesent tristique magna sit amet. Sed libero enim sed faucibus turpis in. Ut tellus elementum sagittis vitae et leo duis ut. Mauris vitae ultricies leo integer.</p>', 'active'),
(11, 'nhat-ban', 'nhat ban', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', '64dde58a8a7ee-paris.jpg', '2023-08-17 02:16:58', '2023-08-17 02:16:58', 3, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Massa vitae tortor condimentum lacinia quis vel eros donec. Aliquam etiam erat velit scelerisque in dictum. Felis donec et odio pellentesque diam. Pretium nibh ipsum consequat nisl vel. Faucibus in ornare quam viverra. Vivamus at augue eget arcu dictum varius duis at. Turpis massa sed elementum tempus egestas sed sed risus. Rhoncus mattis rhoncus urna neque viverra. Varius vel pharetra vel turpis nunc eget. Commodo ullamcorper a lacus vestibulum sed arcu non odio euismod.</p>\r\n\r\n<p>Platea dictumst vestibulum rhoncus est pellentesque elit. Erat nam at lectus urna duis convallis convallis tellus id. Viverra nam libero justo laoreet sit amet cursus sit. Diam maecenas sed enim ut sem viverra aliquet. Tellus rutrum tellus pellentesque eu. Id cursus metus aliquam eleifend mi in nulla posuere sollicitudin. A cras semper auctor neque vitae tempus. Scelerisque felis imperdiet proin fermentum leo vel orci. Condimentum vitae sapien pellentesque habitant morbi tristique senectus. Velit sed ullamcorper morbi tincidunt ornare massa. Diam sollicitudin tempor id eu nisl nunc. Viverra nam libero justo laoreet sit amet.</p>\r\n\r\n<p>Eget arcu dictum varius duis at consectetur lorem donec massa. Dui accumsan sit amet nulla facilisi. Magna fermentum iaculis eu non. Sagittis purus sit amet volutpat consequat mauris. Ornare massa eget egestas purus. Ornare arcu odio ut sem nulla pharetra diam. Amet volutpat consequat mauris nunc congue nisi vitae suscipit. Sit amet consectetur adipiscing elit duis tristique sollicitudin nibh sit. Id porta nibh venenatis cras. Nunc eget lorem dolor sed. Ut enim blandit volutpat maecenas volutpat blandit aliquam etiam erat. Senectus et netus et malesuada fames ac turpis egestas. Id diam maecenas ultricies mi eget. Morbi tempus iaculis urna id volutpat lacus laoreet non. Tristique nulla aliquet enim tortor at auctor urna nunc id. Risus nullam eget felis eget nunc. Lorem ipsum dolor sit amet consectetur. Est ullamcorper eget nulla facilisi etiam dignissim. Lobortis mattis aliquam faucibus purus in massa tempor nec.</p>\r\n\r\n<p>Est lorem ipsum dolor sit. Fermentum leo vel orci porta. Quis vel eros donec ac odio tempor. Pretium viverra suspendisse potenti nullam. Nullam ac tortor vitae purus faucibus ornare suspendisse. Molestie nunc non blandit massa. In eu mi bibendum neque egestas congue quisque egestas. Nisl condimentum id venenatis a condimentum vitae. Aliquam etiam erat velit scelerisque in dictum non consectetur a. Consectetur a erat nam at lectus urna duis convallis convallis. Est lorem ipsum dolor sit. Morbi quis commodo odio aenean sed adipiscing. Et tortor at risus viverra adipiscing at in. Et netus et malesuada fames ac. Interdum varius sit amet mattis vulputate enim. Enim sit amet venenatis urna cursus eget nunc. A condimentum vitae sapien pellentesque habitant morbi tristique senectus.</p>\r\n\r\n<p>Amet luctus venenatis lectus magna fringilla. Bibendum enim facilisis gravida neque convallis a cras semper auctor. Viverra nam libero justo laoreet sit amet cursus. Auctor neque vitae tempus quam pellentesque nec nam aliquam. Aenean pharetra magna ac placerat vestibulum lectus mauris. Amet nisl purus in mollis nunc sed. Eget aliquet nibh praesent tristique magna sit amet. Sed libero enim sed faucibus turpis in. Ut tellus elementum sagittis vitae et leo duis ut. Mauris vitae ultricies leo integer.</p>', 'active'),
(12, 'han-quoc', 'han quoc', 'update Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', '64dde58a8a7ee-paris.jpg', '2023-08-17 02:16:58', '2023-08-17 02:49:43', 3, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Massa vitae tortor condimentum lacinia quis vel eros donec. Aliquam etiam erat velit scelerisque in dictum. Felis donec et odio pellentesque diam. Pretium nibh ipsum consequat nisl vel. Faucibus in ornare quam viverra. Vivamus at augue eget arcu dictum varius duis at. Turpis massa sed elementum tempus egestas sed sed risus. Rhoncus mattis rhoncus urna neque viverra. Varius vel pharetra vel turpis nunc eget. Commodo ullamcorper a lacus vestibulum sed arcu non odio euismod.</p>\r\n\r\n<p>Platea dictumst vestibulum rhoncus est pellentesque elit. Erat nam at lectus urna duis convallis convallis tellus id. Viverra nam libero justo laoreet sit amet cursus sit. Diam maecenas sed enim ut sem viverra aliquet. Tellus rutrum tellus pellentesque eu. Id cursus metus aliquam eleifend mi in nulla posuere sollicitudin. A cras semper auctor neque vitae tempus. Scelerisque felis imperdiet proin fermentum leo vel orci. Condimentum vitae sapien pellentesque habitant morbi tristique senectus. Velit sed ullamcorper morbi tincidunt ornare massa. Diam sollicitudin tempor id eu nisl nunc. Viverra nam libero justo laoreet sit amet.</p>\r\n\r\n<p>Eget arcu dictum varius duis at consectetur lorem donec massa. Dui accumsan sit amet nulla facilisi. Magna fermentum iaculis eu non. Sagittis purus sit amet volutpat consequat mauris. Ornare massa eget egestas purus. Ornare arcu odio ut sem nulla pharetra diam. Amet volutpat consequat mauris nunc congue nisi vitae suscipit. Sit amet consectetur adipiscing elit duis tristique sollicitudin nibh sit. Id porta nibh venenatis cras. Nunc eget lorem dolor sed. Ut enim blandit volutpat maecenas volutpat blandit aliquam etiam erat. Senectus et netus et malesuada fames ac turpis egestas. Id diam maecenas ultricies mi eget. Morbi tempus iaculis urna id volutpat lacus laoreet non. Tristique nulla aliquet enim tortor at auctor urna nunc id. Risus nullam eget felis eget nunc. Lorem ipsum dolor sit amet consectetur. Est ullamcorper eget nulla facilisi etiam dignissim. Lobortis mattis aliquam faucibus purus in massa tempor nec.</p>\r\n\r\n<p>Est lorem ipsum dolor sit. Fermentum leo vel orci porta. Quis vel eros donec ac odio tempor. Pretium viverra suspendisse potenti nullam. Nullam ac tortor vitae purus faucibus ornare suspendisse. Molestie nunc non blandit massa. In eu mi bibendum neque egestas congue quisque egestas. Nisl condimentum id venenatis a condimentum vitae. Aliquam etiam erat velit scelerisque in dictum non consectetur a. Consectetur a erat nam at lectus urna duis convallis convallis. Est lorem ipsum dolor sit. Morbi quis commodo odio aenean sed adipiscing. Et tortor at risus viverra adipiscing at in. Et netus et malesuada fames ac. Interdum varius sit amet mattis vulputate enim. Enim sit amet venenatis urna cursus eget nunc. A condimentum vitae sapien pellentesque habitant morbi tristique senectus.</p>\r\n\r\n<p>Amet luctus venenatis lectus magna fringilla. Bibendum enim facilisis gravida neque convallis a cras semper auctor. Viverra nam libero justo laoreet sit amet cursus. Auctor neque vitae tempus quam pellentesque nec nam aliquam. Aenean pharetra magna ac placerat vestibulum lectus mauris. Amet nisl purus in mollis nunc sed. Eget aliquet nibh praesent tristique magna sit amet. Sed libero enim sed faucibus turpis in. Ut tellus elementum sagittis vitae et leo duis ut. Mauris vitae ultricies leo integer.</p>', 'active'),
(13, 'chau-phi', 'chau phi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elit ut aliquam purus sit amet.', '64dddb1072d59-london.jpg', '2023-08-17 01:32:16', '2023-08-17 01:54:27', 2, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elit ut aliquam purus sit amet. Tristique nulla aliquet enim tortor at auctor urna. Malesuada pellentesque elit eget gravida cum sociis natoque penatibus et. <strong>Malesuada proin libero nunc consequat interdum varius</strong>. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus. Elementum integer enim neque volutpat ac tincidunt vitae. Augue eget arcu dictum varius duis at. Magnis dis parturient montes nascetur ridiculus mus mauris vitae. Ullamcorper dignissim cras tincidunt lobortis feugiat. Nibh cras pulvinar mattis nunc sed blandit libero volutpat sed. Sed arcu non odio euismod lacinia at quis risus sed. In aliquam sem fringilla ut. Pretium quam vulputate dignissim suspendisse in.</p>\r\n\r\n<p>Scelerisque fermentum dui faucibus in ornare. Nec nam aliquam sem et tortor. Volutpat est velit egestas dui id ornare arcu. Fermentum dui faucibus in ornare. Imperdiet dui accumsan sit amet nulla facilisi morbi. A iaculis at erat pellentesque adipiscing commodo elit. Nisi scelerisque eu ultrices vitae auctor eu. Fringilla urna porttitor rhoncus dolor purus non enim. Morbi tristique senectus et netus et malesuada fames ac. Iaculis eu non diam phasellus vestibulum lorem sed risus. Ut consequat semper viverra nam libero justo. Rhoncus urna neque viverra justo nec ultrices dui sapien. Etiam non quam lacus suspendisse faucibus interdum posuere lorem. Ipsum a arcu cursus vitae congue mauris rhoncus. Bibendum est ultricies integer quis auctor elit. Pellentesque pulvinar pellentesque habitant morbi tristique. Ornare lectus sit amet est placerat in. Fermentum posuere urna nec tincidunt praesent semper feugiat nibh sed.</p>\r\n\r\n<p>Pretium lectus quam id leo in. Sed id semper risus in hendrerit gravida. Odio eu feugiat pretium nibh ipsum. Pharetra diam sit amet nisl suscipit adipiscing bibendum. Tellus id interdum velit laoreet id. Nibh sed pulvinar proin gravida hendrerit lectus. Tempor orci dapibus ultrices in iaculis nunc sed augue. Accumsan sit amet nulla facilisi morbi. Enim ut sem viverra aliquet eget sit amet. Sit amet tellus cras adipiscing enim eu turpis egestas.</p>\r\n\r\n<p>Donec et odio pellentesque diam volutpat commodo sed egestas. Magna sit amet purus gravida quis. Praesent elementum facilisis leo vel fringilla est ullamcorper eget. Sit amet consectetur adipiscing elit duis. Velit aliquet sagittis id consectetur. Ultricies lacus sed turpis tincidunt id aliquet risus feugiat. Amet consectetur adipiscing elit pellentesque habitant morbi tristique. Quam pellentesque nec nam aliquam sem et tortor. Dolor sit amet consectetur adipiscing elit duis. Scelerisque fermentum dui faucibus in ornare. Amet volutpat consequat mauris nunc congue nisi vitae suscipit. Neque volutpat ac tincidunt vitae. Nec dui nunc mattis enim ut. Iaculis eu non diam phasellus vestibulum lorem sed risus ultricies. Neque laoreet suspendisse interdum consectetur. Tortor at risus viverra adipiscing at in. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Duis ultricies lacus sed turpis tincidunt id aliquet. Nec feugiat nisl pretium fusce id velit ut tortor pretium.</p>\r\n\r\n<p>Porttitor eget dolor morbi non arcu. Neque laoreet suspendisse interdum consectetur libero id. Tincidunt lobortis feugiat vivamus at augue eget. Donec ac odio tempor orci dapibus ultrices. Tincidunt lobortis feugiat vivamus at augue eget arcu. Arcu non odio euismod lacinia at. Cras sed felis eget velit aliquet. Pharetra convallis posuere morbi leo. Enim tortor at auctor urna nunc id cursus metus aliquam. Sapien et ligula ullamcorper malesuada proin libero nunc consequat. Tempor id eu nisl nunc mi. Nisi quis eleifend quam adipiscing vitae proin sagittis nisl. Ultrices dui sapien eget mi proin sed. Purus in mollis nunc sed id. Rutrum tellus pellentesque eu tincidunt tortor aliquam nulla facilisi cras. Arcu cursus euismod quis viverra nibh cras.</p>', 'active'),
(14, 'a-free-trip', 'a free trip', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elit ut aliquam purus sit amet.', '64dddb1072d59-london.jpg', '2023-08-17 01:32:16', '2023-08-17 01:54:27', 2, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elit ut aliquam purus sit amet. Tristique nulla aliquet enim tortor at auctor urna. Malesuada pellentesque elit eget gravida cum sociis natoque penatibus et. <strong>Malesuada proin libero nunc consequat interdum varius</strong>. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus. Elementum integer enim neque volutpat ac tincidunt vitae. Augue eget arcu dictum varius duis at. Magnis dis parturient montes nascetur ridiculus mus mauris vitae. Ullamcorper dignissim cras tincidunt lobortis feugiat. Nibh cras pulvinar mattis nunc sed blandit libero volutpat sed. Sed arcu non odio euismod lacinia at quis risus sed. In aliquam sem fringilla ut. Pretium quam vulputate dignissim suspendisse in.</p>\r\n\r\n<p>Scelerisque fermentum dui faucibus in ornare. Nec nam aliquam sem et tortor. Volutpat est velit egestas dui id ornare arcu. Fermentum dui faucibus in ornare. Imperdiet dui accumsan sit amet nulla facilisi morbi. A iaculis at erat pellentesque adipiscing commodo elit. Nisi scelerisque eu ultrices vitae auctor eu. Fringilla urna porttitor rhoncus dolor purus non enim. Morbi tristique senectus et netus et malesuada fames ac. Iaculis eu non diam phasellus vestibulum lorem sed risus. Ut consequat semper viverra nam libero justo. Rhoncus urna neque viverra justo nec ultrices dui sapien. Etiam non quam lacus suspendisse faucibus interdum posuere lorem. Ipsum a arcu cursus vitae congue mauris rhoncus. Bibendum est ultricies integer quis auctor elit. Pellentesque pulvinar pellentesque habitant morbi tristique. Ornare lectus sit amet est placerat in. Fermentum posuere urna nec tincidunt praesent semper feugiat nibh sed.</p>\r\n\r\n<p>Pretium lectus quam id leo in. Sed id semper risus in hendrerit gravida. Odio eu feugiat pretium nibh ipsum. Pharetra diam sit amet nisl suscipit adipiscing bibendum. Tellus id interdum velit laoreet id. Nibh sed pulvinar proin gravida hendrerit lectus. Tempor orci dapibus ultrices in iaculis nunc sed augue. Accumsan sit amet nulla facilisi morbi. Enim ut sem viverra aliquet eget sit amet. Sit amet tellus cras adipiscing enim eu turpis egestas.</p>\r\n\r\n<p>Donec et odio pellentesque diam volutpat commodo sed egestas. Magna sit amet purus gravida quis. Praesent elementum facilisis leo vel fringilla est ullamcorper eget. Sit amet consectetur adipiscing elit duis. Velit aliquet sagittis id consectetur. Ultricies lacus sed turpis tincidunt id aliquet risus feugiat. Amet consectetur adipiscing elit pellentesque habitant morbi tristique. Quam pellentesque nec nam aliquam sem et tortor. Dolor sit amet consectetur adipiscing elit duis. Scelerisque fermentum dui faucibus in ornare. Amet volutpat consequat mauris nunc congue nisi vitae suscipit. Neque volutpat ac tincidunt vitae. Nec dui nunc mattis enim ut. Iaculis eu non diam phasellus vestibulum lorem sed risus ultricies. Neque laoreet suspendisse interdum consectetur. Tortor at risus viverra adipiscing at in. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Duis ultricies lacus sed turpis tincidunt id aliquet. Nec feugiat nisl pretium fusce id velit ut tortor pretium.</p>\r\n\r\n<p>Porttitor eget dolor morbi non arcu. Neque laoreet suspendisse interdum consectetur libero id. Tincidunt lobortis feugiat vivamus at augue eget. Donec ac odio tempor orci dapibus ultrices. Tincidunt lobortis feugiat vivamus at augue eget arcu. Arcu non odio euismod lacinia at. Cras sed felis eget velit aliquet. Pharetra convallis posuere morbi leo. Enim tortor at auctor urna nunc id cursus metus aliquam. Sapien et ligula ullamcorper malesuada proin libero nunc consequat. Tempor id eu nisl nunc mi. Nisi quis eleifend quam adipiscing vitae proin sagittis nisl. Ultrices dui sapien eget mi proin sed. Purus in mollis nunc sed id. Rutrum tellus pellentesque eu tincidunt tortor aliquam nulla facilisi cras. Arcu cursus euismod quis viverra nibh cras.</p>', 'active'),
(15, 'around-world-in-3-days', 'around world in 3 days', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elit ut aliquam purus sit amet.', '64dddb1072d59-london.jpg', '2023-08-17 01:32:16', '2023-08-17 01:54:27', 2, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elit ut aliquam purus sit amet. Tristique nulla aliquet enim tortor at auctor urna. Malesuada pellentesque elit eget gravida cum sociis natoque penatibus et. <strong>Malesuada proin libero nunc consequat interdum varius</strong>. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus. Elementum integer enim neque volutpat ac tincidunt vitae. Augue eget arcu dictum varius duis at. Magnis dis parturient montes nascetur ridiculus mus mauris vitae. Ullamcorper dignissim cras tincidunt lobortis feugiat. Nibh cras pulvinar mattis nunc sed blandit libero volutpat sed. Sed arcu non odio euismod lacinia at quis risus sed. In aliquam sem fringilla ut. Pretium quam vulputate dignissim suspendisse in.</p>\r\n\r\n<p>Scelerisque fermentum dui faucibus in ornare. Nec nam aliquam sem et tortor. Volutpat est velit egestas dui id ornare arcu. Fermentum dui faucibus in ornare. Imperdiet dui accumsan sit amet nulla facilisi morbi. A iaculis at erat pellentesque adipiscing commodo elit. Nisi scelerisque eu ultrices vitae auctor eu. Fringilla urna porttitor rhoncus dolor purus non enim. Morbi tristique senectus et netus et malesuada fames ac. Iaculis eu non diam phasellus vestibulum lorem sed risus. Ut consequat semper viverra nam libero justo. Rhoncus urna neque viverra justo nec ultrices dui sapien. Etiam non quam lacus suspendisse faucibus interdum posuere lorem. Ipsum a arcu cursus vitae congue mauris rhoncus. Bibendum est ultricies integer quis auctor elit. Pellentesque pulvinar pellentesque habitant morbi tristique. Ornare lectus sit amet est placerat in. Fermentum posuere urna nec tincidunt praesent semper feugiat nibh sed.</p>\r\n\r\n<p>Pretium lectus quam id leo in. Sed id semper risus in hendrerit gravida. Odio eu feugiat pretium nibh ipsum. Pharetra diam sit amet nisl suscipit adipiscing bibendum. Tellus id interdum velit laoreet id. Nibh sed pulvinar proin gravida hendrerit lectus. Tempor orci dapibus ultrices in iaculis nunc sed augue. Accumsan sit amet nulla facilisi morbi. Enim ut sem viverra aliquet eget sit amet. Sit amet tellus cras adipiscing enim eu turpis egestas.</p>\r\n\r\n<p>Donec et odio pellentesque diam volutpat commodo sed egestas. Magna sit amet purus gravida quis. Praesent elementum facilisis leo vel fringilla est ullamcorper eget. Sit amet consectetur adipiscing elit duis. Velit aliquet sagittis id consectetur. Ultricies lacus sed turpis tincidunt id aliquet risus feugiat. Amet consectetur adipiscing elit pellentesque habitant morbi tristique. Quam pellentesque nec nam aliquam sem et tortor. Dolor sit amet consectetur adipiscing elit duis. Scelerisque fermentum dui faucibus in ornare. Amet volutpat consequat mauris nunc congue nisi vitae suscipit. Neque volutpat ac tincidunt vitae. Nec dui nunc mattis enim ut. Iaculis eu non diam phasellus vestibulum lorem sed risus ultricies. Neque laoreet suspendisse interdum consectetur. Tortor at risus viverra adipiscing at in. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Duis ultricies lacus sed turpis tincidunt id aliquet. Nec feugiat nisl pretium fusce id velit ut tortor pretium.</p>\r\n\r\n<p>Porttitor eget dolor morbi non arcu. Neque laoreet suspendisse interdum consectetur libero id. Tincidunt lobortis feugiat vivamus at augue eget. Donec ac odio tempor orci dapibus ultrices. Tincidunt lobortis feugiat vivamus at augue eget arcu. Arcu non odio euismod lacinia at. Cras sed felis eget velit aliquet. Pharetra convallis posuere morbi leo. Enim tortor at auctor urna nunc id cursus metus aliquam. Sapien et ligula ullamcorper malesuada proin libero nunc consequat. Tempor id eu nisl nunc mi. Nisi quis eleifend quam adipiscing vitae proin sagittis nisl. Ultrices dui sapien eget mi proin sed. Purus in mollis nunc sed id. Rutrum tellus pellentesque eu tincidunt tortor aliquam nulla facilisi cras. Arcu cursus euismod quis viverra nibh cras.</p>', 'active'),
(16, 'this-is-my-journey', 'this is my journey', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '64e2d20e479b7-this-is-my-journey.jpg', '2023-08-20 19:55:10', '2023-08-20 20:15:08', 2, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Curabitur gravida arcu ac tortor dignissim convallis. Est ullamcorper eget nulla facilisi etiam dignissim diam quis enim. Sit amet nulla facilisi morbi tempus iaculis urna id. Natoque penatibus et magnis dis parturient montes nascetur ridiculus. Massa sapien faucibus et molestie ac feugiat sed. Dapibus ultrices in iaculis nunc sed augue lacus viverra. Arcu cursus vitae congue mauris rhoncus aenean vel elit scelerisque. Aliquet enim tortor at auctor urna. Ultrices eros in cursus turpis massa tincidunt dui ut ornare. Dui ut ornare lectus sit amet est placerat in. Enim nulla aliquet porttitor lacus luctus accumsan tortor posuere ac. Sit amet mattis vulputate enim nulla aliquet. Mattis pellentesque id nibh tortor id aliquet.</p>\r\n\r\n<p>Fames ac turpis egestas maecenas pharetra convallis. Vitae congue eu consequat ac felis. Gravida quis blandit turpis cursus in hac habitasse. A erat nam at lectus urna duis convallis convallis. Quam id leo in vitae turpis massa sed elementum. Scelerisque eu ultrices vitae auctor eu augue ut lectus. At ultrices mi tempus imperdiet nulla malesuada pellentesque. Vestibulum sed arcu non odio euismod. Velit aliquet sagittis id consectetur. Euismod in pellentesque massa placerat duis ultricies lacus. A diam sollicitudin tempor id. Mi proin sed libero enim sed faucibus turpis in. Duis ut diam quam nulla porttitor. Dolor purus non enim praesent elementum facilisis leo vel fringilla. Blandit volutpat maecenas volutpat blandit aliquam etiam erat.</p>\r\n\r\n<p>Vitae suscipit tellus mauris a diam maecenas. Facilisis mauris sit amet massa vitae tortor condimentum lacinia quis. Vulputate eu scelerisque felis imperdiet proin fermentum leo vel. Sollicitudin tempor id eu nisl nunc mi ipsum faucibus. Donec ac odio tempor orci dapibus. Tincidunt tortor aliquam nulla facilisi. Ipsum a arcu cursus vitae. Vulputate sapien nec sagittis aliquam. Vel eros donec ac odio. At tellus at urna condimentum mattis.</p>\r\n\r\n<p>Dolor purus non enim praesent. Erat pellentesque adipiscing commodo elit at imperdiet dui. Pretium lectus quam id leo in vitae turpis. Tortor condimentum lacinia quis vel. Quam lacus suspendisse faucibus interdum posuere lorem ipsum. Non enim praesent elementum facilisis leo. Consectetur a erat nam at lectus urna duis convallis. Nunc congue nisi vitae suscipit tellus. Lectus nulla at volutpat diam ut venenatis. Etiam sit amet nisl purus. Laoreet suspendisse interdum consectetur libero id.</p>\r\n\r\n<p>Donec et odio pellentesque diam volutpat commodo sed egestas egestas. Volutpat blandit aliquam etiam erat velit scelerisque in dictum. Mi eget mauris pharetra et ultrices neque ornare aenean. Adipiscing elit ut aliquam purus sit amet luctus venenatis lectus. Odio aenean sed adipiscing diam donec. Nunc sed augue lacus viverra vitae congue eu consequat ac. Tincidunt praesent semper feugiat nibh sed pulvinar proin. Ultricies leo integer malesuada nunc vel risus commodo viverra. Morbi tristique senectus et netus et malesuada fames ac turpis. Pharetra magna ac placerat vestibulum lectus. Dignissim sodales ut eu sem integer vitae. Lacus vel facilisis volutpat est velit egestas. Luctus venenatis lectus magna fringilla urna porttitor rhoncus.</p>', 'active');

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
  `author_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price_sale` decimal(8,2) DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `author_id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `thumb`, `price`, `qty`, `content`, `category_id`, `author_type`, `created_at`, `updated_at`, `price_sale`, `status`, `author_id`, `slug`) VALUES
(1, 'Harry Potter 1', '/storage/uploads/1692787295.harry-potter.jpg', '100.00', 10, '<p>content</p>', 8, 'Novelist', '2023-07-31 21:58:09', '2023-08-23 03:41:35', NULL, 'active', 1, 'harry-potter-1'),
(2, 'Fans', '/storage/uploads/1692787270.harry-potter.jpg', '2000.00', 13, '<p>content fans</p>', 4, 'Blog', '2023-07-31 21:58:09', '2023-08-23 03:45:48', NULL, 'active', 1, 'fans'),
(7, 'Harry Potter 2', '/storage/uploads/1692787244.harry-potter.jpg', '333.00', 10, '<p>aaa</p>', 5, 'Novelist', '2023-07-31 20:12:03', '2023-08-23 03:40:44', NULL, 'active', 1, 'harry-potter-2'),
(8, 'Harry Potter 3', '/storage/uploads/1692787219.harry-potter.jpg', '333.00', 10, '<p>aaa</p>', 5, 'Novelist', '2023-07-31 20:35:13', '2023-08-23 03:40:19', NULL, 'active', 1, 'harry-potter-3'),
(9, 'Harry Potter 4', '/storage/uploads/1692787195.harry-potter.jpg', '333.00', 10, '<p>content</p>', 5, 'Novelist', '2023-07-31 20:38:11', '2023-08-23 03:39:55', NULL, 'active', 1, 'harry-potter-4'),
(16, 'Harry Potter 7', '/storage/uploads/1692787174.harry-potter.jpg', '333.00', 13, '<p>content</p>', 5, 'Novelist', '2023-08-09 02:20:38', '2023-08-23 03:39:34', NULL, 'active', 1, 'harry-potter-7'),
(22, 'Lucifer Morningstar', '/storage/uploads/1692787322.harry-potter.jpg', '333.00', 12, '<p>a</p>', 5, 'Novelist', '2023-08-14 00:20:51', '2023-08-23 03:42:02', NULL, 'inactive', 1, 'lucifer-morningstar'),
(23, 'Lucifer Morningstar season 1', '/storage/uploads/1692602170.lucifer.jpg', '884.00', 7, '<p>lucifer&nbsp;</p>', 5, 'Novelist', '2023-08-21 00:16:10', '2023-08-23 03:45:48', NULL, 'active', 1, 'lucifer-morningstar-season-1');

-- --------------------------------------------------------

--
-- Table structure for table `product_warehouses`
--

CREATE TABLE `product_warehouses` (
  `id` bigint UNSIGNED NOT NULL,
  `warehouse_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `qty` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_warehouses`
--

INSERT INTO `product_warehouses` (`id`, `warehouse_id`, `product_id`, `qty`, `created_at`, `updated_at`) VALUES
(1, 2, 23, 4, '2023-08-21 10:04:24', '2023-08-21 04:06:22'),
(2, 3, 16, 3, '2023-08-21 10:04:24', NULL),
(3, 2, 9, 5, '2023-08-21 23:24:42', '2023-08-21 23:24:42'),
(6, 2, 16, 10, '2023-08-21 23:24:42', '2023-08-21 23:24:42'),
(7, 2, 8, 5, '2023-08-21 23:24:42', '2023-08-21 23:24:42'),
(8, 2, 2, 3, '2023-08-21 23:24:42', '2023-08-21 23:24:42');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `warehouse_id` bigint UNSIGNED DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `total_qty`, `shipping_cost`, `total_amount`, `note`, `status`, `purchase_date`, `created_at`, `updated_at`, `warehouse_id`) VALUES
(1, 5, 0, 20000, 'some note', 'finished', '2023-08-02', '2023-08-02 02:56:02', NULL, 1),
(2, 10, 0, 300000, 'some note', 'pending', '2023-08-02', '2023-08-02 02:56:02', NULL, 1),
(9, 4, 0, 1332, 'note', 'pending', '2023-08-03', '2023-08-02 13:01:06', '2023-08-02 13:01:06', 1),
(10, 6, 0, 6300, NULL, 'pending', '2023-08-08', '2023-08-08 02:46:02', '2023-08-08 02:46:02', 1),
(11, 3, 0, 999, 'buy 3 hp 6', 'pending', '2023-08-08', '2023-08-08 02:55:58', '2023-08-08 02:55:58', 1),
(12, 1, 0, 333, NULL, 'pending', '2023-08-08', '2023-08-08 02:56:39', '2023-08-08 02:56:39', 1),
(13, 5, 0, 1665, NULL, 'pending', '2023-08-08', '2023-08-08 02:57:06', '2023-08-08 02:57:06', 1),
(14, 3, 0, 999, NULL, 'pending', '2023-08-08', '2023-08-08 02:58:29', '2023-08-08 02:58:29', 1),
(20, 6, 0, 1998, NULL, 'finished', '2023-08-08', '2023-08-08 03:05:15', '2023-08-08 03:05:15', 1),
(21, 2, 0, 666, NULL, 'pending', '2023-08-08', '2023-08-08 03:05:28', '2023-08-08 03:05:28', 1),
(22, 6, 0, 1998, NULL, 'finished', '2023-08-09', '2023-08-08 19:50:52', '2023-08-08 19:50:52', 1),
(23, 3, 0, 999, NULL, 'finished', '2023-08-09', '2023-08-08 21:55:48', '2023-08-08 21:55:48', 1),
(24, 22, 0, 7326, NULL, 'pending', '2023-08-09', '2023-08-09 01:40:00', '2023-08-09 01:40:00', 1),
(25, 6, 0, 1998, NULL, 'pending', '2023-08-09', '2023-08-09 02:22:23', '2023-08-09 02:22:23', 1),
(26, 7, 0, 2331, 'note', 'pending', '2023-08-11', '2023-08-10 19:02:16', '2023-08-10 19:02:16', 1),
(27, 4, 0, 1332, NULL, 'pending', '2023-08-11', '2023-08-11 00:44:25', '2023-08-11 00:44:25', 1),
(28, 10, 0, 3330, NULL, 'pending', '2023-08-18', '2023-08-18 01:11:45', '2023-08-18 01:11:45', 1),
(43, 4, 0, 2985, NULL, 'pending', '2023-08-21', '2023-08-21 03:40:14', '2023-08-21 03:40:14', 2),
(60, 1, 0, 884, NULL, 'pending', '2023-08-21', '2023-08-21 04:06:22', '2023-08-21 04:06:22', 2),
(61, 3, 0, 999, NULL, 'pending', '2023-08-22', '2023-08-21 23:24:42', '2023-08-21 23:24:42', 2);

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
(24, 25, 16, 3, 333, 999, NULL, NULL),
(25, 26, 8, 3, 333, 999, NULL, NULL),
(26, 26, 16, 4, 333, 1332, NULL, NULL),
(27, 27, 16, 4, 333, 1332, NULL, NULL),
(28, 28, 22, 10, 333, 3330, NULL, NULL),
(29, 43, 16, 1, 333, 333, NULL, NULL),
(30, 43, 23, 3, 884, 2652, NULL, NULL),
(31, 60, 23, 1, 884, 884, NULL, NULL),
(32, 61, 9, 3, 333, 999, NULL, NULL);

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
  `status` enum('pending','shipped','delivered') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
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
(9, 11, 1, 0, 333, NULL, 'pending', '2023-08-09', '2023-08-09 02:47:23', '2023-08-09 02:47:23'),
(10, 3, 3, 0, 999, 'hp 7', 'pending', '2023-08-11', '2023-08-10 19:04:12', '2023-08-10 19:04:12'),
(11, 3, 8, 0, 2664, 'note', 'pending', '2023-08-11', '2023-08-11 00:46:13', '2023-08-11 00:46:13'),
(12, 3, 3, 0, 2652, NULL, 'pending', '2023-08-21', '2023-08-21 00:19:57', '2023-08-21 00:19:57'),
(31, 3, 6, 0, 3651, NULL, 'pending', '2023-08-23', '2023-08-23 01:53:02', '2023-08-23 01:53:02'),
(32, 3, 5, 0, 6652, NULL, 'pending', '2023-08-23', '2023-08-23 03:45:48', '2023-08-23 03:45:48');

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
(16, 9, 8, 1, 333, 333, NULL, NULL),
(17, 10, 16, 3, 333, 999, NULL, NULL),
(18, 11, 16, 8, 333, 2664, NULL, NULL),
(19, 12, 23, 3, 884, 2652, NULL, NULL),
(20, 31, 9, 3, 333, 999, NULL, NULL),
(21, 31, 23, 3, 884, 2652, NULL, NULL),
(22, 32, 2, 2, 2000, 4000, NULL, NULL),
(23, 32, 23, 3, 884, 2652, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`, `phone`, `location`, `created_at`, `updated_at`, `status`) VALUES
(1, 'opsgreat 1', '0123646782', 'q1', NULL, NULL, 'active'),
(2, 'opsgreat 2', '0123646282', 'q1', NULL, NULL, 'active'),
(3, 'opsgreat 4', '1234567851', 'binh chanh', '2023-08-23 03:31:16', '2023-08-23 03:31:16', 'active');

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
(1, 'Admin', 'admin@gmail.com', NULL, 'admin', '$2y$10$SWHgKHcAV.2c9wGZXeHsguxv90A34tm94ScvQggEPu/13ueBL2T4u', NULL, NULL, NULL, 'Novelist'),
(2, 'Agent', 'quochao2k2@gmail.com', NULL, 'agent', '$2y$10$2JnjrHwscBL5sjpf9ua1.u08Gbzswj.hCjOqXgx.E3MPQtP3kOXDG', 'H53LeyZAp9LecyAGej4UyxO041qsObu5gpD0jQVtzhSPJiq9aPKk3LJ4wd6X', NULL, '2023-08-20 19:39:53', 'Poet'),
(3, 'User', 'user@gmail.com', NULL, 'user', '$2y$10$SWHgKHcAV.2c9wGZXeHsguxv90A34tm94ScvQggEPu/13ueBL2T4u', NULL, NULL, NULL, 'Essayist'),
(4, 'Prof. Garth Leffler', 'paris83@example.com', '2023-08-07 01:05:02', 'user', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '5Nu7ITx6GH', '2023-08-07 01:05:02', '2023-08-07 01:05:02', 'Novelist'),
(5, 'Bernadine Mayert IV', 'arne.walter@example.net', '2023-08-07 01:05:02', 'agent', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6fg54A2i4V', '2023-08-07 01:05:02', '2023-08-07 01:05:02', 'Novelist'),
(6, 'Jaylen Goodwin', 'halvorson.mabel@example.org', '2023-08-07 01:05:02', 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Db1czv7Gtf', '2023-08-07 01:05:02', '2023-08-07 01:05:02', 'Novelist'),
(7, 'Prof. Perry Rempel V', 'althea.dicki@example.net', '2023-08-07 01:05:02', 'user', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'JL17E0gKzV', '2023-08-07 01:05:02', '2023-08-07 01:05:02', 'Novelist'),
(8, 'Joshua Volkman', 'dashawn42@example.org', '2023-08-07 01:05:02', 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Z2UCK85ywu', '2023-08-07 01:05:02', '2023-08-07 01:05:02', 'Novelist');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `name`, `phone`, `location`, `created_at`, `updated_at`, `status`) VALUES
(1, 'w opsgreat 1', '0123435948', 'q3', NULL, NULL, 'active'),
(2, 'w opsgreat 2', '01234567899', 'q4', NULL, NULL, 'active'),
(3, 'w opsgreat 3', '0112345678', 'q2', NULL, NULL, 'active'),
(5, 'w opsgreat 4', '1234526789', 'q9', '2023-08-23 03:30:45', '2023-08-23 03:30:45', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_stores`
--

CREATE TABLE `warehouse_stores` (
  `id` bigint UNSIGNED NOT NULL,
  `store_id` bigint UNSIGNED NOT NULL,
  `warehouse_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouse_stores`
--

INSERT INTO `warehouse_stores` (`id`, `store_id`, `warehouse_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-08-21 10:05:18', NULL),
(2, 1, 2, '2023-08-21 10:05:18', NULL),
(3, 2, 3, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_author_id_foreign` (`author_id`);

--
-- Indexes for table `product_warehouses`
--
ALTER TABLE `product_warehouses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_warehouses_warehouse_id_foreign` (`warehouse_id`),
  ADD KEY `product_warehouses_product_id_foreign` (`product_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_warehouse_id_foreign` (`warehouse_id`);

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
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouse_stores`
--
ALTER TABLE `warehouse_stores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warehouse_stores_store_id_foreign` (`store_id`),
  ADD KEY `warehouse_stores_warehouse_id_foreign` (`warehouse_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_warehouses`
--
ALTER TABLE `product_warehouses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `purchase_products`
--
ALTER TABLE `purchase_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `sale_products`
--
ALTER TABLE `sale_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `warehouse_stores`
--
ALTER TABLE `warehouse_stores`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_warehouses`
--
ALTER TABLE `product_warehouses`
  ADD CONSTRAINT `product_warehouses_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_warehouses_warehouse_id_foreign` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_warehouse_id_foreign` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`) ON DELETE CASCADE;

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

--
-- Constraints for table `warehouse_stores`
--
ALTER TABLE `warehouse_stores`
  ADD CONSTRAINT `warehouse_stores_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `warehouse_stores_warehouse_id_foreign` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
