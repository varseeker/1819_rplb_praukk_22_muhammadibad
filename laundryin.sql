-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2021 at 04:55 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundryin`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(2, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_customer`
--

CREATE TABLE `t_customer` (
  `id` char(11) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `alamat` varchar(120) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `tlp` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_customer`
--

INSERT INTO `t_customer` (`id`, `nama`, `alamat`, `jenis_kelamin`, `tlp`) VALUES
('C001', 'Ahmad Syarifudi', 'Jln. Manuk nu Gahar', 'Pria', '0218893451'),
('C002', 'Alya Farisah', 'Jln. Mau kemana aja', 'Wanita', '085835911779'),
('C003', 'Ammar Muramasha', 'Jln Jalan Santai', 'Pria', '08578895873');

-- --------------------------------------------------------

--
-- Table structure for table `t_detail_transaksi`
--

CREATE TABLE `t_detail_transaksi` (
  `id` char(11) NOT NULL,
  `id_transaksi` char(11) NOT NULL,
  `id_paket` char(11) NOT NULL,
  `quantitas` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_outlet`
--

CREATE TABLE `t_outlet` (
  `id` char(11) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `alamat` varchar(120) NOT NULL,
  `tlp` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_outlet`
--

INSERT INTO `t_outlet` (`id`, `nama`, `alamat`, `tlp`) VALUES
('K001', 'Rumah Bersih', 'Jln Jambu 3 No 10', '0831773590120'),
('K002', 'Mari Mencuci', 'Jln Kang Mansur', '0218808321');

-- --------------------------------------------------------

--
-- Table structure for table `t_paket`
--

CREATE TABLE `t_paket` (
  `id` char(11) NOT NULL,
  `id_outlet` char(11) NOT NULL,
  `jenis` enum('Kiloan','Selimut','Bed_Cover','Kaos','Lain') NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_paket`
--

INSERT INTO `t_paket` (`id`, `id_outlet`, `jenis`, `nama_paket`, `harga`) VALUES
('PK01', 'K001', 'Kiloan', 'Langsung Bersih Seketika', 20000),
('PK02', 'K002', 'Kaos', 'Males Cuci', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `t_petugas`
--

CREATE TABLE `t_petugas` (
  `id` char(11) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `alamat` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `tlp` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_petugas`
--

INSERT INTO `t_petugas` (`id`, `nama`, `alamat`, `email`, `jenis_kelamin`, `tlp`) VALUES
('P001', 'Mohamad Rivansyah', 'Jln Kaliabang nangka 1', 'rivan@example.com', 'Pria', '0857788912886'),
('P002', 'Mahesa Riska Oktarani', 'Jln Perwira 21', 'riska@example.com', 'Wanita', '081732267891');

-- --------------------------------------------------------

--
-- Table structure for table `t_transaksi`
--

CREATE TABLE `t_transaksi` (
  `id` char(11) NOT NULL,
  `id_outlet` char(11) NOT NULL,
  `id_customer` char(11) NOT NULL,
  `id_petugas` char(11) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `tgl_bayar` datetime NOT NULL,
  `status` enum('Baru','Proses','Selesei','Diambil') NOT NULL,
  `dibayar` enum('Dibayar','Belum_Dibayar') NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `role` enum('Admin','Petugas','Owner','Customer') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@example.com', NULL, '$2y$10$6YaAy4NyM40BKBg3J5T2e.ekPgf2haBB0kqn5.5aTkrf9HF4p1gwO', 'Admin', NULL, '2021-02-27 18:25:21', '2021-02-27 18:25:21'),
(2, 'Customer', 'customer@example.com', NULL, '$2y$10$nvdKnWClLc12U/nHViPIBe1yqNY8iR4R.2qpcoWreAtFrTvf4rDfS', 'Customer', NULL, '2021-02-27 19:55:57', '2021-02-27 19:55:57'),
(4, 'Petugas', 'petugas@example.com', NULL, '$2y$10$0KG5oZJH5zpLbtTRUPZy4Osa7sskvllpnTD6tK3t/0yYxGk1UE0sq', 'Petugas', NULL, '2021-02-27 20:51:08', '2021-02-27 20:51:08'),
(5, 'Owner', 'owner@example.com', NULL, '$2y$10$mzQkXIRmgIyWepkiA7fo2ubqph0v24W0NNN5ThcA9e2Bry3sGs0bK', 'Owner', NULL, '2021-02-27 20:51:55', '2021-02-27 20:51:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_customer`
--
ALTER TABLE `t_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_detail_transaksi`
--
ALTER TABLE `t_detail_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `t_outlet`
--
ALTER TABLE `t_outlet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_paket`
--
ALTER TABLE `t_paket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_outlet` (`id_outlet`);

--
-- Indexes for table `t_petugas`
--
ALTER TABLE `t_petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_outlet` (`id_outlet`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `id_customer` (`id_customer`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_detail_transaksi`
--
ALTER TABLE `t_detail_transaksi`
  ADD CONSTRAINT `t_detail_transaksi_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `t_paket` (`id`),
  ADD CONSTRAINT `t_detail_transaksi_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `t_transaksi` (`id`);

--
-- Constraints for table `t_paket`
--
ALTER TABLE `t_paket`
  ADD CONSTRAINT `t_paket_ibfk_1` FOREIGN KEY (`id_outlet`) REFERENCES `t_outlet` (`id`);

--
-- Constraints for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  ADD CONSTRAINT `t_transaksi_ibfk_2` FOREIGN KEY (`id_outlet`) REFERENCES `t_outlet` (`id`),
  ADD CONSTRAINT `t_transaksi_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `t_petugas` (`id`),
  ADD CONSTRAINT `t_transaksi_ibfk_4` FOREIGN KEY (`id_customer`) REFERENCES `t_customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
