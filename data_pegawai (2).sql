-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14 Agu 2018 pada 07.20
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_pegawai`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `dropshipper_id` int(11) NOT NULL,
  `name_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_retail` double(8,2) NOT NULL,
  `price_reseller` double(8,2) NOT NULL,
  `profit` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `dropshipper_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `dropshipper_id`, `name_product`, `code_product`, `color_product`, `size`, `price_retail`, `price_reseller`, `profit`, `quantity`, `dropshipper_email`, `session_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Sweater Momo', 'SM_02-M', 'Kuning', 'Medium', 200000.00, 180000.00, 20000.00, 1, 'cahyani.alma@gmail.com', 'jcZN9bWedMFjMTWWNS6KtPyff8VfQ0j5v8vgJAxa', NULL, NULL),
(2, 10, 1, 'Nizza Shoes', 'NS_20-40', 'Putih', '40', 200000.00, 180000.00, 20000.00, 1, 'cahyani.alma@gmail.com', 'GUwsIRpsIoDgmcc6vMBJdaQSlS1HCbbu1SaPSXjU', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_parent` int(11) NOT NULL DEFAULT '0',
  `name_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `id_parent`, `name_category`, `description`, `url`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'Pakaian', 'Kategori Pakaian', 'pakaian', 1, NULL, '2018-07-27 20:13:16', '2018-07-27 22:12:21'),
(2, 0, 'Sepatu', 'Kategori Sepatu', 'sepatu', 1, NULL, '2018-07-27 22:12:57', '2018-07-27 22:12:57'),
(3, 0, 'Komputer', 'Kategori Komputer', 'komputer', 1, NULL, '2018-07-27 22:15:54', '2018-08-03 22:59:26'),
(4, 1, 'Pakaian Pria', 'Sub kategori Pakaian', 'pakaian-pria', 1, NULL, '2018-07-28 01:17:12', '2018-08-04 00:05:23'),
(5, 1, 'Pakaian Wanita', 'Sub Kategori Pakaian', 'pakaian-wanita', 1, NULL, '2018-07-31 07:54:50', '2018-08-04 00:05:40'),
(6, 2, 'Sepatu Pria', 'Sub Kategori Sepatu', 'sepatu-pria', 1, NULL, '2018-08-03 06:24:06', '2018-08-04 00:05:56'),
(7, 2, 'Sepatu Wanita', 'Sub Kategori Sepatu', 'sepatu-wanita', 1, NULL, '2018-08-03 21:40:09', '2018-08-04 00:06:23'),
(8, 3, 'Aksesori Komputer', 'Sub Kategori Komputer', 'aksesori-komputer', 1, NULL, '2018-08-03 23:00:16', '2018-08-04 00:06:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dropshippers`
--

CREATE TABLE `dropshippers` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `handphone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dropshippers`
--

INSERT INTO `dropshippers` (`id`, `email`, `password`, `name`, `handphone`, `address`, `bank_account_number`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'cahyani.alma@gmail.com', '$2y$10$1s7l8Kzca/JV420jnr5mhuwrNN0brDSmtkXgO5XNXXUToDvYlKkhO', 'Almaun Tri Cahyani', '083846912992', 'Jln. Kejawan Tambak Putih No.22 Surabaya', '140-00-15590226-6', NULL, '2018-08-11 04:08:09', '2018-08-11 04:08:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_07_25_031355_create_supplier_table', 2),
(4, '2018_07_26_005338_create_products_table', 3),
(5, '2018_07_28_030823_create_category_table', 4),
(6, '2018_07_30_014807_create_dropshipper_users_table', 5),
(7, '2018_07_31_030734_create_products_attributes_table', 6),
(8, '2018_08_07_051204_create_cart_table', 7),
(9, '2018_08_08_142847_create_sale_table', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_category` int(11) NOT NULL,
  `name_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_retail` double(9,2) NOT NULL,
  `price_reseller` double(9,2) NOT NULL,
  `profit` double(9,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `id_category`, `name_product`, `code_product`, `color_product`, `desc`, `price_retail`, `price_reseller`, `profit`, `image`, `created_at`, `updated_at`) VALUES
(1, 5, 'Sweater Momo', 'SM_02', 'Kuning', 'Bahan : Polar Fleece, \r\nOrder : 083542335645 (WA)', 200000.00, 180000.00, 20000.00, '95323.png', '2018-07-28 20:28:01', '2018-08-04 20:06:19'),
(4, 4, 'Jaket Colombo', 'JC_03', 'Coklat', 'Colombo Jacket Casual', 400000.00, 350000.00, 50000.00, '47522.png', '2018-08-03 06:22:32', '2018-08-03 06:22:32'),
(5, 4, 'Jack B. Shirt', 'JB_03', 'Abu-abu', 'Jack B. Shirt Collection', 350000.00, 340000.00, 10000.00, '72217.png', '2018-08-03 06:27:43', '2018-08-03 06:27:43'),
(7, 7, 'Adidas Campus Original', 'ACO_030', 'Merah Muda', 'Adidas Original', 3000000.00, 2500000.00, 500000.00, '33243.png', '2018-08-05 03:08:58', '2018-08-05 03:08:58'),
(8, 8, 'Earphone Type', 'ET_01', 'Coklat', 'Pengiriman dari Bekasi, Order :08524247964 (WA)', 100000.00, 90000.00, 10000.00, '82862.png', '2018-08-05 03:17:41', '2018-08-05 03:17:41'),
(9, 8, 'Speaker Type', 'ST_01', 'Putih', 'Pengiriman dari Bekasi, Order : 08524247964 (WA)', 200000.00, 150000.00, 50000.00, '76963.png', '2018-08-05 03:23:05', '2018-08-05 03:23:05'),
(10, 6, 'Nizza Shoes', 'NS_20', 'Putih', 'Pengiriman dari Surabaya', 200000.00, 180000.00, 20000.00, '19303.png', '2018-08-05 03:28:03', '2018-08-13 20:50:46'),
(11, 5, 'Dress Icon', 'DI_15', 'Putih', 'Pengiriman dari Surabaya', 150000.00, 120000.00, 30000.00, '94491.png', '2018-08-05 03:38:38', '2018-08-05 03:38:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products_attributes`
--

CREATE TABLE `products_attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_retail` double(9,2) NOT NULL,
  `price_reseller` double(9,2) NOT NULL,
  `profit` double(9,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products_attributes`
--

INSERT INTO `products_attributes` (`id`, `product_id`, `sku`, `size`, `price_retail`, `price_reseller`, `profit`, `stock`, `created_at`, `updated_at`) VALUES
(1, 1, 'SM_02-M', 'Medium', 200000.00, 180000.00, 20000.00, 1, '2018-08-06 17:04:39', '2018-08-13 21:19:11'),
(2, 1, 'SM_02-L', 'Large', 200000.00, 160000.00, 40000.00, 2, '2018-08-06 17:04:39', '2018-08-13 21:19:11'),
(3, 10, 'NS_20-40', '40', 200000.00, 180000.00, 20000.00, 2, '2018-08-07 02:59:48', '2018-08-07 02:59:48'),
(4, 10, 'NS_20-39', '39', 200000.00, 160000.00, 40000.00, 1, '2018-08-07 02:59:49', '2018-08-07 02:59:49'),
(5, 8, 'ET_01-G', 'Global', 100000.00, 90000.00, 10000.00, 3, '2018-08-11 07:38:53', '2018-08-11 07:38:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales`
--

CREATE TABLE `sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `cart_id` int(11) NOT NULL,
  `dropshipper_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profit` double(8,2) NOT NULL,
  `delivery_payment` double(8,2) NOT NULL,
  `dropshipper_payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_delivery_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_supplier` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`id`, `id_supplier`, `name`, `address`, `phone`, `email`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'Mana', 'Kediri', '083672976212', 'mana@gmail.com', NULL, '2018-07-25 05:00:41', '2018-07-27 18:42:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$XpgwJ0GlaaE47C7vGiwRG.IbSjQMdFdncdY/HKw7x2xRa.3t4p1wG', NULL, 'y1kJaLu7tLHFrrOvY6dqWPtKHbBz7z7W76pEwgMvKjqhwKYRXIQdgMHgwNjl', '2018-06-27 00:13:31', '2018-06-27 00:13:31'),
(3, 'Admin', 'admin@admin.com', '$2y$10$XpgwJ0GlaaE47C7vGiwRG.IbSjQMdFdncdY/HKw7x2xRa.3t4p1wG', 1, '3RpKGJADrQYjmIXawOker72smjQjlg0cRbio6amf0Il1JCzAFQfoi1GkqekT', '2018-06-27 00:13:31', '2018-06-27 00:13:31');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `dropshippers`
--
ALTER TABLE `dropshippers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dropshippers_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `dropshippers`
--
ALTER TABLE `dropshippers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `products_attributes`
--
ALTER TABLE `products_attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
