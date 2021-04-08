-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2021 at 08:14 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Stand-in structure for view `activity_logs`
-- (See below for the actual view)
--
CREATE TABLE `activity_logs` (
`id` int(11)
,`event` varchar(100)
,`person` varchar(120)
,`detail` varchar(150)
,`created_at` timestamp
,`updated_at` timestamp
,`name` varchar(255)
,`role` enum('Admin','Petugas','Owner','Customer')
);

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `event` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `person` varchar(120) CHARACTER SET utf8mb4 NOT NULL,
  `detail` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `event`, `person`, `detail`, `created_at`, `updated_at`) VALUES
(1, 'LOGIN', '1', 'Admin Login Aplikasi', '2021-03-03 21:23:53', '2021-03-03 21:23:53'),
(2, 'LOGIN', '1', 'Admin Melakukan Login Ke Aplikasi', '2021-03-03 21:37:58', '2021-03-03 21:37:58'),
(3, 'LOGIN', '2', 'Customer Melakukan Login Ke Aplikasi', '2021-03-03 21:39:35', '2021-03-03 21:39:35'),
(4, 'LOGIN', '4', 'Petugas Melakukan Login Ke Aplikasi', '2021-03-03 21:42:04', '2021-03-03 21:42:04'),
(5, 'LOGIN', '1', 'Admin Melakukan Login Ke Aplikasi', '2021-03-03 21:49:35', '2021-03-03 21:49:35'),
(6, 'LOGOUT', '1', 'Admin Melakukan Logout Dari Aplikasi', '2021-03-03 21:49:47', '2021-03-03 21:49:47'),
(7, 'LOGOUT', '1', 'Customer Melakukan Logout Dari Aplikasi', '2021-03-03 21:49:47', '2021-03-03 21:49:47'),
(8, 'LOGIN', '4', 'Petugas Melakukan Login Ke Aplikasi', '2021-03-03 21:50:54', '2021-03-03 21:50:54'),
(9, 'LOGIN', '5', 'Owner Melakukan Login Ke Aplikasi', '2021-03-03 21:53:25', '2021-03-03 21:53:25'),
(10, 'LOGOUT', '5', 'Owner Melakukan Logout Dari Aplikasi', '2021-03-03 21:53:30', '2021-03-03 21:53:30');

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

--
-- Dumping data for table `t_detail_transaksi`
--

INSERT INTO `t_detail_transaksi` (`id`, `id_transaksi`, `id_paket`, `quantitas`, `keterangan`) VALUES
('DTR001', 'TR001', 'PK01', 2, 'Tolong sekalian di setrika dengan rapih, akan saya beri lebih saat membayar'),
('DTR002', 'TR002', 'PK02', 4, 'Usahakan untuk segera di proses karena saya akan gunakan untuk ke acara teman saya');

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
('K002', 'Mari Mencuci', 'Jln Kang Mansur', '0218808321'),
('K003', 'Mencuci Ramah Bareng', 'Jln Kahyangan 1', '12345678');

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

--
-- Dumping data for table `t_transaksi`
--

INSERT INTO `t_transaksi` (`id`, `id_outlet`, `id_customer`, `id_petugas`, `tgl_pesan`, `tgl_bayar`, `status`, `dibayar`, `total`) VALUES
('TR001', 'K001', 'C001', 'P001', '2021-01-05 00:00:00', '2021-03-04 00:00:00', 'Selesei', 'Dibayar', 20000),
('TR002', 'K002', 'C002', 'P002', '2021-03-02 00:00:00', '2021-03-04 00:00:00', 'Proses', 'Dibayar', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Admin','Petugas','Owner','Customer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Customer',
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

-- --------------------------------------------------------

--
-- Structure for view `activity_logs`
--
DROP TABLE IF EXISTS `activity_logs`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `activity_logs`  AS  select `logs`.`id` AS `id`,`logs`.`event` AS `event`,`logs`.`person` AS `person`,`logs`.`detail` AS `detail`,`logs`.`created_at` AS `created_at`,`logs`.`updated_at` AS `updated_at`,`users`.`name` AS `name`,`users`.`role` AS `role` from (`logs` join `users` on((`logs`.`person` = `users`.`id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
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
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_outlet` (`id_outlet`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_detail_transaksi`
--
ALTER TABLE `t_detail_transaksi`
  ADD CONSTRAINT `t_detail_transaksi_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `t_paket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_detail_transaksi_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `t_transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_paket`
--
ALTER TABLE `t_paket`
  ADD CONSTRAINT `t_paket_ibfk_1` FOREIGN KEY (`id_outlet`) REFERENCES `t_outlet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  ADD CONSTRAINT `t_transaksi_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `t_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_transaksi_ibfk_2` FOREIGN KEY (`id_outlet`) REFERENCES `t_outlet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_transaksi_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `t_petugas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
