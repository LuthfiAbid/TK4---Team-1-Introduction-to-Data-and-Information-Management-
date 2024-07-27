-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2024 at 02:43 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tk4_apps`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(200) NOT NULL,
  `keterangan` text NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `keterangan`, `satuan`, `id_pengguna`) VALUES
(1, 'Barang 1', 'tes 1', 'pcs', 1),
(2, 'Barang 2', 'Barang 2', 'dus', 1),
(3, 'Barang 3', 'Barang 3', 'pcs', 1),
(4, 'Barang 4', 'Barang 4', 'pcs', 1),
(5, 'Barang 5', 'Barang 5', 'pcs', 1),
(6, 'Barang 6', 'Barang 6', 'pcs', 1),
(7, 'Barang 7', 'Barang 7', 'dus', 1),
(8, 'Barang 8', 'Barang 8', 'dus', 1),
(9, 'Barang 9', 'Barang 9', 'pcs', 1),
(10, 'Barang 10', 'Barang 10', 'Barang 10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_akses` int(11) NOT NULL,
  `nama_akses` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id_akses`, `nama_akses`, `keterangan`) VALUES
(1, 'Super Admin', 'All Access'),
(2, 'Operator', 'Only Operate Menu (Create and Update)');

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(200) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`) VALUES
(1, 'Anton Nugroho', 'Jl Nasional no 97'),
(2, 'Mahendra', 'Jl Bangkok no 5'),
(3, 'Tahta Alvina', 'Jl Aceh no 6'),
(4, 'Akmal Fatih', 'Jl Sumatera  no 4'),
(5, 'Maya Rumantir', 'Jl Kalimantan  no 26'),
(6, 'Krisdayanti', 'Jl Bengkulu  no 52'),
(7, 'Yuni Shara', 'Jl Malang no 3'),
(8, 'Astrid', 'Jl Bandung no 4'),
(9, 'Ahmad Dhani', 'Jl Ciamis  no 65'),
(10, 'Kelly', 'Jl Cirebon no 7'),
(11, 'Robert', 'Jl Kamboja no 12'),
(12, 'Cyntia', 'Jl Pegangsaan no 13'),
(13, 'Melva Yunita', 'Jl Irian no 1'),
(14, 'Fransiska', 'Jl Batam no 54'),
(15, 'Ovita', 'Jl Cianjur no 9'),
(16, 'Baskara Mahendra', 'Jl Wiratno no 7'),
(17, 'Kenzi', 'Jl Merdeka  no 23'),
(18, 'Marinto', 'Jl Makmur  no 98'),
(19, 'Jaja Miharja', 'Jl Sulawesi  no 21'),
(20, 'Meriam Bellina', 'Jl Poros no 4');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `jumlah_pembelian` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `jumlah_pembelian`, `harga_beli`, `id_barang`, `id_pengguna`) VALUES
(1, 100, 3799, 1, 1),
(2, 150, 2399, 2, 1),
(3, 200, 2999, 3, 1),
(4, 120, 2250, 4, 1),
(5, 180, 2299, 5, 1),
(6, 130, 2599, 6, 1),
(7, 140, 2599, 7, 1),
(8, 160, 2399, 8, 1),
(9, 170, 1750, 9, 1),
(10, 110, 2888, 10, 1),
(11, 90, 3799, 1, 1),
(12, 140, 2399, 2, 1),
(13, 180, 2999, 3, 1),
(14, 100, 2250, 4, 1),
(15, 160, 2299, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `nama_depan` varchar(100) NOT NULL,
  `nama_belakang` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `id_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `password`, `nama_depan`, `nama_belakang`, `no_hp`, `alamat`, `id_akses`) VALUES
(1, 'Admin 1', '$2y$12$kT1A.3nl6340GYoQaIPeveKkU/mSuecCfSPbyaPh9NSb270NFRTJa', 'Adi', 'Dia', '08123456789', 'Jl Testing', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `jumlah_penjualan` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `jumlah_penjualan`, `harga_jual`, `id_barang`, `id_pelanggan`) VALUES
(1, 90, 5500, 1, 6),
(2, 140, 5300, 2, 8),
(3, 180, 5200, 3, 9),
(4, 100, 5600, 4, 10),
(5, 160, 5400, 5, 7),
(6, 120, 5200, 6, 8),
(7, 130, 5300, 7, 9),
(8, 150, 5500, 8, 10),
(9, 160, 5400, 9, 6),
(10, 100, 5200, 10, 7),
(11, 110, 5700, 1, 6),
(12, 150, 5500, 2, 8),
(13, 200, 5400, 3, 9),
(14, 120, 5700, 4, 10),
(15, 180, 5600, 5, 7);

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
('k9LQevAm2D2MKeWs6WSB4WqY0vKuycqkNHVrGh4W', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTUhkV050Q3E3N0hOYVdyY0FIV05wbFdJWUZxTjd5VkxpbnhNbzlLRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sYWJhcnVnaSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1722084073);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(200) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat`) VALUES
(1, 'PT Berkah', 'Jl Kenanga no 2'),
(2, 'PT Mawar ', 'Jl Merak no 5'),
(3, 'PT Melati', 'Jl Delima no 10'),
(4, 'PT Kecubung', 'Jl Gelatik no 7'),
(5, 'PT Dahlia', 'Jl Garuda no 15'),
(6, 'PT Nusaindah', 'Jl Pelikan no 5'),
(7, 'PT Tulip', 'Jl Beo no 11'),
(8, 'PT Matahari', 'Jl Bangau no 8'),
(9, 'PT Anyelir', 'Jl Cenderawasih no 19'),
(10, 'PT Kusumawijaya', 'Jl Parkit no 21'),
(11, 'PT Azzura', 'Jl Elang no 50'),
(12, 'PT Lili', 'Jl Rajawali no 23'),
(13, 'PT Harum', 'Jl Kutilang no 43'),
(14, 'PT Daisy', 'Jl Punai no 82'),
(15, 'PT Edelweis', 'Jl Perkutut no 62'),
(16, 'PT Bakung', 'Jl Kalkun no 7'),
(17, 'PT Telang', 'Jl Supratman no 16'),
(18, 'PT Cempaka', 'Jl Asia no 3'),
(19, 'PT Anggrek', 'Jl Afrika no 8'),
(20, 'PT Jasmine', 'Jl Mustafa no 97');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '0001_01_01_000002_create_jobs_table', 1);

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
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_pengguna_FK_pengguna` (`id_pengguna`);

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_akses`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_barang_FK_pembelian_barang` (`id_barang`),
  ADD KEY `id_pengguna_FK_pembelian_pengguna` (`id_pengguna`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `id_akses_FK_hak_akses` (`id_akses`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_pelanggan_FK_penjualan_pelanggan` (`id_pelanggan`),
  ADD KEY `id_barang_FK_penjualan_barang` (`id_barang`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `id_pengguna_FK_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `id_barang_FK_pembelian_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `id_pengguna_FK_pembelian_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `id_akses_FK_hak_akses` FOREIGN KEY (`id_akses`) REFERENCES `hak_akses` (`id_akses`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `id_barang_FK_penjualan_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `id_pelanggan_FK_penjualan_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
