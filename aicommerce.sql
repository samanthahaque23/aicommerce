-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2024 at 04:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aicommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('sam@example.com|127.0.0.1', 'i:1;', 1725126462),
('sam@example.com|127.0.0.1:timer', 'i:1725126462;', 1725126462),
('samanthahaque23@gmail.com|127.0.0.1', 'i:1;', 1725126466),
('samanthahaque23@gmail.com|127.0.0.1:timer', 'i:1725126466;', 1725126466);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_06_01_231815_create_products_table', 1),
(5, '2024_06_01_231913_create_orders_table', 1),
(6, '2024_06_01_232218_create_order_details_table', 1),
(7, '2024_06_01_232228_create_order_items_table', 1),
(8, '2024_06_01_232302_create_payments_table', 1),
(9, '2024_06_01_232311_create_customers_table', 1),
(10, '2024_06_24_233810_add_is_admin_column_to_users_table', 1),
(11, '2024_07_10_160107_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_price` decimal(20,2) NOT NULL,
  `status` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(45) DEFAULT NULL,
  `zipcode` varchar(45) NOT NULL,
  `country_code` varchar(3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
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
  `title` varchar(2000) NOT NULL,
  `slug` varchar(2000) NOT NULL,
  `image` varchar(2000) DEFAULT NULL,
  `image_mime` varchar(255) DEFAULT NULL,
  `image_size` int(11) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `image`, `image_mime`, `image_size`, `description`, `price`, `created_by`, `updated_by`, `deleted_at`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'Lip Sleeping Mask Intense Hydration with Vitamin C', 'lip-sleeping-mask-intense-hydration-vitamin-c', 'https://threoskin.com/cdn/shop/products/LaneigeLipSleepingMaskThreoSkin.png?v=1670308885', 'image/png', 1024, 'No details available', 24.00, 1, 1, NULL, NULL, '2024-08-31 02:28:02', '2024-08-31 02:28:02'),
(2, 'Soy Hydrating Gentle Face Cleanser', 'soy-hydrating-gentle-face-cleanser', 'https://www.sephora.com/productimages/sku/s2534675-main-zoom.jpg?imwidth=315', 'image/jpg', 315, 'No details available', 39.00, 1, 1, NULL, NULL, '2024-08-31 02:28:02', '2024-08-31 02:28:02'),
(3, '100 percent Pure Argan Oil', '100-percent-pure-argan-oil', 'https://www.josiemaran.com/cdn/shop/files/100-percent-pure-organic-argan-oil-30mL-2048x2048_8b5dbea0-6f05-42ed-ac94-4638c90b349d.png?v=1707325512&width=1920', 'image/png', 1920, 'No details available', 49.00, 1, 1, NULL, NULL, '2024-08-31 02:28:02', '2024-08-31 02:28:02'),
(4, 'Ultra Repair Cream Intense Hydration', 'ultra-repair-cream-intense-hydration', 'https://m.media-amazon.com/images/I/61cQmKA-SQL._AC_UF1000,1000_QL80_.jpg', 'image/jpg', 1000, 'No details available', 38.00, 1, 1, NULL, NULL, '2024-08-31 02:28:02', '2024-08-31 02:28:02'),
(5, 'Alpha Beta Extra Strength Daily Peel Pads', 'alpha-beta-extra-strength-daily-peel-pads', 'https://www.sephora.com/productimages/sku/s1499482-main-zoom.jpg?imwidth=315', 'image/jpg', 315, 'No details available', 92.00, 1, 1, NULL, NULL, '2024-08-31 02:28:02', '2024-08-31 02:28:02'),
(6, 'The True Cream Aqua Bomb', 'the-true-cream-aqua-bomb', 'https://m.media-amazon.com/images/I/61f7G1WkWYL._AC_UF1000,1000_QL80_.jpg', 'image/jpg', 1000, 'No details available', 38.00, 1, 1, NULL, NULL, '2024-08-31 02:28:02', '2024-08-31 02:28:02'),
(7, 'Green Clean Makeup Removing Cleansing Balm', 'green-clean-makeup-removing-cleansing-balm', 'https://www.sephora.com/productimages/sku/s1899103-av-129-zoom.jpg', 'image/jpg', 315, 'No details available', 34.00, 1, 1, NULL, NULL, '2024-08-31 02:28:02', '2024-08-31 02:28:02'),
(8, 'Green Clean Makeup Meltaway Cleansing Balm Limited Edition Jumbo', 'green-clean-makeup-meltaway-cleansing-balm-limited-edition-jumbo', 'https://www.farmacybeauty.com/cdn/shop/files/Farmacy_GreenClean_200ml_2021PCRPackaging_Hero.jpg?v=1684267491&width=2000', 'image/jpg', 2000, 'No details available', 48.00, 1, 1, NULL, NULL, '2024-08-31 02:28:02', '2024-08-31 02:28:02'),
(9, 'Protini Polypeptide Firming Refillable Moisturizer', 'protini-polypeptide-firming-refillable-moisturizer', 'https://www.sephora.com/productimages/sku/s2025633-main-zoom.jpg?imwidth=315', 'image/jpg', 315, 'No details available', 68.00, 1, 1, NULL, NULL, '2024-08-31 02:28:02', '2024-08-31 02:28:02'),
(10, 'Superfood Antioxidant Cleanser', 'superfood-antioxidant-cleanser', 'http://media.allure.com/photos/5cb771f5b8699b017913061c/master/pass/youth-to-the-people-superfood-antioxidant-cleanser.jpg', 'image/jpg', 500, 'No details available', 36.00, 1, 1, NULL, NULL, '2024-08-31 02:28:02', '2024-08-31 02:28:02'),
(11, 'Mini Superfood Antioxidant Cleanser', 'mini-superfood-antioxidant-cleanser', 'https://images.urbndata.com/is/image/Anthropologie/69071454_237_b?$a15-pdp-detail-shot$&fit=constrain&qlt=80&wid=640', 'image/jpg', 640, 'No details available', 12.00, 1, 1, NULL, NULL, '2024-08-31 02:28:02', '2024-08-31 02:28:02'),
(12, 'Niacinamide 10% + Zinc 1% Oil Control Serum', 'niacinamide-10-zinc-1-oil-control-serum', 'https://www.sephora.com/productimages/sku/s2031391-main-zoom.jpg?imwidth=315', 'image/jpg', 315, 'No details available', 10.00, 1, 1, NULL, NULL, '2024-08-31 02:28:02', '2024-08-31 02:28:02'),
(13, 'Good Genes All-In-One AHA Lactic Acid Treatment', 'good-genes-all-in-one-aha-lactic-acid-treatment', 'https://www.sephora.com/productimages/sku/s1887298-main-zoom.jpg?imwidth=315', 'image/jpg', 315, 'No details available', 105.00, 1, 1, NULL, NULL, '2024-08-31 02:28:02', '2024-08-31 02:28:02'),
(14, 'Cicapair Tiger Grass Color Correcting Treatment SPF 30', 'cicapair-tiger-grass-color-correcting-treatment-spf-30', 'https://www.drjart.com/media/export/cms/products/1000x1000/dj_sku_H59X01_1000x1000_0.jpg', 'image/jpg', 1000, 'No details available', 52.00, 1, 1, NULL, NULL, '2024-08-31 02:28:02', '2024-08-31 02:28:02'),
(15, 'Rosebud Salve', 'rosebud-salve', 'https://www.sephora.com/productimages/sku/s683490-main-zoom.jpg?imwidth=315', 'image/jpg', 315, 'No details available', 8.00, 1, 1, NULL, NULL, '2024-08-31 02:28:02', '2024-08-31 02:28:02'),
(16, 'Mini Cicapair Tiger Grass Color Correcting Treatment SPF 30', 'mini-cicapair-tiger-grass-color-correcting-treatment-spf-30', 'https://www.sephora.com/productimages/sku/s1936202-main-zoom.jpg?imwidth=315', 'image/jpg', 315, 'No details available', 19.00, 1, 1, NULL, NULL, '2024-08-31 02:28:02', '2024-08-31 02:28:02'),
(17, 'Pure Skin Face Cleanser', 'pure-skin-face-cleanser', 'https://www.sephora.com/productimages/sku/s1217710-main-zoom.jpg?imwidth=315', 'image/jpg', 315, 'No details available', 24.00, 1, 1, NULL, NULL, '2024-08-31 02:28:02', '2024-08-31 02:28:02'),
(18, 'Mini Daily Microfoliant Exfoliator', 'mini-daily-microfoliant-exfoliator', 'https://www.sephora.com/productimages/sku/s2221133-main-zoom.jpg?imwidth=315', 'image/jpg', 315, 'No details available', 16.00, 1, 1, NULL, NULL, '2024-08-31 02:28:02', '2024-08-31 02:28:02'),
(19, 'Daily Microfoliant Exfoliator', 'daily-microfoliant-exfoliator', 'https://www.dermalogica.com/cdn/shop/files/daily-microfoliant_0.45oz_main-with-benefits.jpg?v=1718297691&width=1946', 'image/jpg', 1946, 'No details available', 59.00, 1, 1, NULL, NULL, '2024-08-31 02:28:02', '2024-08-31 02:28:02'),
(20, 'Salicylic Acid Acne Healing Dots', 'salicylic-acid-acne-healing-dots', 'https://www.sephora.com/productimages/sku/s2575124-main-zoom.jpg?imwidth=315', 'image/jpg', 315, 'No details available', 19.00, 1, 1, NULL, NULL, '2024-08-31 02:28:02', '2024-08-31 02:28:02');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1eeukLM5YcCV0HlSwfHn5ye8dWX8Hy7ktmf1Jpq2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSHJTazlNS01uZFVPazA2RlY1WE1ITGdldHE2b1ZRS0M1TnF2QzZ5NCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1725137499),
('DwAzAptFaTpIcVC3wZcsr6ccg6vmcFNG9yMlmbJq', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidlVaRmhZM2N5eVY2ODRDN05MY3JBZ2NYeGRoQWhxWVhjUk01VEFSSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1725078791),
('O7r9iw5rIvAjvGBHhYNaNit2cV0OnpcvjpAtFbR5', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS1loNnJ4ODhJSGNDYUt5Q2NNOFB2anBHeWV1SG9zSUs5UTVHTVZCWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1725126560),
('wk1nugqNfqrxs0bL7xDPHdQ0oKUV65XPMmFbKDZ7', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNlk5cFVxTmpoeVJWa2VrejdZbTVVTzdMRmM0ZU9xTVNpWUtsWWNiTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1725149191),
('WQws6XaLbe7VIiMaMrWFO2iKdNWR4HwyMSlwZQAL', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicTc0aDZJTFZTdEVqeEtVRDhsbkdhR3hURE1BbHFhMVN5T2lGckN3ViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1725126342);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'Admin', 'admin@example.com', '2024-08-31 01:27:39', '$2y$12$HxAr7FZAB35yoW6LN.RDgep3yb6V/18TL2NxcBtzs22IeZm89s4D.', NULL, '2024-08-31 01:27:39', '2024-08-31 01:27:39', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

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
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_order_id_foreign` (`order_id`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
