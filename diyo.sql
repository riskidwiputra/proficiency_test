-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Des 2022 pada 23.29
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diyo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_merchant` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `inventories`
--

INSERT INTO `inventories` (`id`, `id_merchant`, `name`, `price`, `amount`, `unit`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Susu', 100000, 1000, 'litres', '2022-12-27 08:25:03', '2022-12-27 08:25:03', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `merchants`
--

CREATE TABLE `merchants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `merchants`
--

INSERT INTO `merchants` (`id`, `name`, `key`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Est odio porro porro unde sed. Perferendis quos reiciendis quasi nulla molestias velit. Aut impedit perferendis ullam iusto quisquam labore. Dolorum et consequatur qui eos harum.', 'client-63ab0038a3b65', '2022-12-27 07:24:56', '2022-12-27 07:24:56', NULL),
(2, 'Unde maxime asperiores quos eveniet id. Doloribus vitae est iure officiis cum veniam tempora. Aspernatur debitis quos et dolores.', 'client-63ab0038a3c22', '2022-12-27 07:24:56', '2022-12-27 07:24:56', NULL);

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
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2022_12_26_040138_create_merchants_table', 1),
(8, '2022_12_26_040713_create_inventories_table', 1),
(9, '2022_12_26_041742_create_products_table', 1),
(10, '2022_12_26_041912_create_variants_table', 1),
(22, '2022_12_26_042047_create_product_variant_table', 2),
(23, '2022_12_27_140712_create_sales_table', 2),
(24, '2022_12_27_140736_create_orders_table', 2),
(26, '2022_12_27_140756_create_orders_variant_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `id_sale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `id_product`, `id_sale`, `created_at`, `updated_at`, `deleted_at`) VALUES
(29, 1, 'S-63ab3c37a4b81-1672166455', '2022-12-27 11:40:55', '2022-12-27 11:40:55', NULL),
(30, 2, 'S-63ab3c37a4b81-1672166455', '2022-12-27 11:40:55', '2022-12-27 11:40:55', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders_variant`
--

CREATE TABLE `orders_variant` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_order` bigint(20) UNSIGNED NOT NULL,
  `id_variant` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders_variant`
--

INSERT INTO `orders_variant` (`id`, `id_order`, `id_variant`, `created_at`, `updated_at`, `deleted_at`) VALUES
(25, 29, 1, '2022-12-27 11:40:55', '2022-12-27 11:40:55', NULL),
(26, 29, 3, '2022-12-27 11:40:55', '2022-12-27 11:40:55', NULL),
(27, 29, 4, '2022-12-27 11:40:55', '2022-12-27 11:40:55', NULL),
(28, 30, 1, '2022-12-27 11:40:55', '2022-12-27 11:40:55', NULL),
(29, 30, 3, '2022-12-27 11:40:55', '2022-12-27 11:40:55', NULL),
(30, 30, 4, '2022-12-27 11:40:55', '2022-12-27 11:40:55', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `id_merchant` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `id_merchant`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Meaty Pizza Heart', 'Sosis ayam & sapi, burger sapi, keju mozzarella, string cheese, saus pizza spesial', 100000, 1, '2022-12-27 08:39:44', '2022-12-27 08:39:44', NULL),
(2, 'Spaghetti Aglio Olio', 'Spaghetti that cooked with onion and olive oil', 50000, 1, '2022-12-27 08:41:41', '2022-12-27 08:41:41', NULL),
(3, 'Beef Arabbiata', 'Pasta Penne, Meatball Sapi dan Saus Arrabbiata', 70000, 1, '2022-12-27 15:18:17', '2022-12-27 15:18:17', NULL),
(4, 'Creamy Truffle', 'Pasta Penne, Sosis Beef Chorizo, Bayam, Saus Alfredo dan Truffle Oil', 70000, 1, '2022-12-27 15:18:37', '2022-12-27 15:18:37', NULL),
(5, 'Veggie Garden', 'Jagung, Jamur, Paprika Merah, Paprika Hijau, Onion dan Keju Mozzarella', 50000, 1, '2022-12-27 15:19:03', '2022-12-27 15:19:03', NULL),
(6, 'Super Supreme Chicken', 'Sosis Ayam, Daging Ayam Asap, Potongan Ayam, Jamur, Onion dan Keju Mozzarella', 50000, 1, '2022-12-27 15:19:22', '2022-12-27 15:19:22', NULL),
(7, 'Galaxy Soda', 'Sirup Anggur, Soda dengan Melon Jelly dan Biji Selasih', 31000, 1, '2022-12-27 15:20:04', '2022-12-27 15:20:04', NULL),
(8, 'Chocolate Milkshake', 'Susu Segar dan Es Krim Cokelat', 29000, 1, '2022-12-27 15:20:19', '2022-12-27 15:20:19', NULL),
(9, 'Mushroom Soup', 'Sup Krim Jamur', 20000, 1, '2022-12-27 15:20:38', '2022-12-27 15:20:38', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_variant`
--

CREATE TABLE `product_variant` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `id_variant` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product_variant`
--

INSERT INTO `product_variant` (`id`, `id_product`, `id_variant`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2022-12-27 11:35:56', '2022-12-27 11:35:56', NULL),
(2, 2, 2, '2022-12-27 15:15:29', '2022-12-27 15:15:29', NULL),
(3, 2, 3, '2022-12-27 15:15:32', '2022-12-27 15:15:32', NULL),
(4, 2, 4, '2022-12-27 15:15:34', '2022-12-27 15:15:34', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales`
--

CREATE TABLE `sales` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` int(11) NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_merchant` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sales`
--

INSERT INTO `sales` (`id`, `total_price`, `payment_method`, `id_merchant`, `created_at`, `updated_at`, `deleted_at`) VALUES
('S-63ab3c37a4b81-1672166455', 240000, 'GOPAY', 1, '2022-12-27 11:40:55', '2022-12-27 11:40:55', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `variants`
--

CREATE TABLE `variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `additional_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `variants`
--

INSERT INTO `variants` (`id`, `name`, `additional_price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'cheese', 15000, '2022-12-27 08:32:16', '2022-12-27 08:32:16', NULL),
(2, 'original', 10000, '2022-12-27 08:33:07', '2022-12-27 08:33:07', NULL),
(3, 'mushroom', 10000, '2022-12-27 08:33:19', '2022-12-27 08:33:19', NULL),
(4, 'chicken', 20000, '2022-12-27 08:33:28', '2022-12-27 08:33:28', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventories_id_merchant_foreign` (`id_merchant`);

--
-- Indeks untuk tabel `merchants`
--
ALTER TABLE `merchants`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_id_product_foreign` (`id_product`),
  ADD KEY `orders_id_sale_foreign` (`id_sale`);

--
-- Indeks untuk tabel `orders_variant`
--
ALTER TABLE `orders_variant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_variant_id_order_foreign` (`id_order`),
  ADD KEY `orders_variant_id_variant_foreign` (`id_variant`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_merchant_foreign` (`id_merchant`);

--
-- Indeks untuk tabel `product_variant`
--
ALTER TABLE `product_variant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variant_id_product_foreign` (`id_product`),
  ADD KEY `product_variant_id_variant_foreign` (`id_variant`);

--
-- Indeks untuk tabel `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_id_merchant_foreign` (`id_merchant`);

--
-- Indeks untuk tabel `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `merchants`
--
ALTER TABLE `merchants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `orders_variant`
--
ALTER TABLE `orders_variant`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `product_variant`
--
ALTER TABLE `product_variant`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `variants`
--
ALTER TABLE `variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `inventories`
--
ALTER TABLE `inventories`
  ADD CONSTRAINT `inventories_id_merchant_foreign` FOREIGN KEY (`id_merchant`) REFERENCES `merchants` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_id_sale_foreign` FOREIGN KEY (`id_sale`) REFERENCES `sales` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `orders_variant`
--
ALTER TABLE `orders_variant`
  ADD CONSTRAINT `orders_variant_id_order_foreign` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_variant_id_variant_foreign` FOREIGN KEY (`id_variant`) REFERENCES `variants` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_merchant_foreign` FOREIGN KEY (`id_merchant`) REFERENCES `merchants` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product_variant`
--
ALTER TABLE `product_variant`
  ADD CONSTRAINT `product_variant_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_variant_id_variant_foreign` FOREIGN KEY (`id_variant`) REFERENCES `variants` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_id_merchant_foreign` FOREIGN KEY (`id_merchant`) REFERENCES `merchants` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
