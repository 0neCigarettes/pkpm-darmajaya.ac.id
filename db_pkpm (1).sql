-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2020 at 02:55 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pkpm`
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
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2020_07_27_181057_add_username_to_users', 2);

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
-- Table structure for table `tb_beritapkpm`
--

CREATE TABLE `tb_beritapkpm` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idUser` bigint(20) NOT NULL,
  `namaBerita` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_beritapkpm`
--

INSERT INTO `tb_beritapkpm` (`id`, `idUser`, `namaBerita`, `file`, `created_at`, `updated_at`) VALUES
(3, 7, 'Daftar Doosen Pembimbing PKPM', 'CIoXXVzhnS6U0sA31596660222.pdf', '2020-08-05 13:43:42', '2020-08-05 13:43:42'),
(5, 7, 'abs', 'cxSD09rMIGO6rSVV1597925184.pdf', '2020-08-20 05:06:23', '2020-08-20 05:06:23'),
(6, 18, 'daftar peserta pkpm', 'ZFtBpEDvXkqFwSxj1598011267.pdf', '2020-08-21 05:01:07', '2020-08-21 05:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_kelompok`
--

CREATE TABLE `tb_detail_kelompok` (
  `idDetail` bigint(20) NOT NULL,
  `idKelompok` bigint(20) NOT NULL,
  `idPeserta` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_detail_kelompok`
--

INSERT INTO `tb_detail_kelompok` (`idDetail`, `idKelompok`, `idPeserta`, `created_at`, `updated_at`) VALUES
(14, 5, 18, '2020-08-17 15:29:16', '2020-08-17 15:29:16'),
(15, 5, 19, '2020-08-17 15:29:20', '2020-08-17 15:29:20'),
(16, 5, 20, '2020-08-21 01:36:12', '2020-08-21 01:36:12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_formobservasi`
--

CREATE TABLE `tb_formobservasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idUser` bigint(20) NOT NULL,
  `namaFile` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_formobservasi`
--

INSERT INTO `tb_formobservasi` (`id`, `idUser`, `namaFile`, `file`, `created_at`, `updated_at`) VALUES
(4, 7, 'Form Observasi 2020', 'a7o4Qh9FSxpHqN951597954760.pdf', '2020-08-20 13:19:20', '2020-08-20 13:19:20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelompok`
--

CREATE TABLE `tb_kelompok` (
  `idKelompok` bigint(20) NOT NULL,
  `namaKelompok` varchar(40) NOT NULL,
  `dpl` varchar(255) NOT NULL,
  `namaTempat` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kelompok`
--

INSERT INTO `tb_kelompok` (`idKelompok`, `namaKelompok`, `dpl`, `namaTempat`, `created_at`, `updated_at`) VALUES
(5, '1690088784', 'zainudin S.kom,M.sc', 'adiluwih', '2020-08-17 14:12:40', '2020-08-17 14:12:40');

-- --------------------------------------------------------

--
-- Table structure for table `tb_panduanpkpm`
--

CREATE TABLE `tb_panduanpkpm` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idUser` bigint(20) NOT NULL,
  `namaFile` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_panduanpkpm`
--

INSERT INTO `tb_panduanpkpm` (`id`, `idUser`, `namaFile`, `file`, `created_at`, `updated_at`) VALUES
(4, 7, 'panduan 2020', 'I6yxPYkgGZj0DXII1596660199.pdf', '2020-08-05 13:43:18', '2020-08-05 13:43:18'),
(5, 7, 'Form nilai', 'hUJI35WBne4NHWMx1597918671.pdf', '2020-08-20 03:17:51', '2020-08-20 03:17:51'),
(6, 7, 'qwertyuio qwertyui asdfghjk qwert', '3fiHjI1MfP1rw5jU1597949778.pdf', '2020-08-20 11:56:18', '2020-08-20 11:56:18'),
(7, 7, 'xfxfxfgxfx', 'WOsPNcDIzSoGpW6V1597949872.pdf', '2020-08-20 11:57:52', '2020-08-20 11:57:52'),
(8, 7, 'drtdrtdrtdtd', '5RoqVmKkmtRnHpLy1597949886.pdf', '2020-08-20 11:58:06', '2020-08-20 11:58:06');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesertapkpm`
--

CREATE TABLE `tb_pesertapkpm` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idUser` bigint(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `npm` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `pembayaranPKPM` varchar(255) NOT NULL,
  `pembayaranBPP` varchar(255) NOT NULL,
  `transkripKRS` varchar(255) NOT NULL,
  `transkripNilai` varchar(255) NOT NULL,
  `nomorHp` varchar(255) NOT NULL,
  `ukuranKaos` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pesertapkpm`
--

INSERT INTO `tb_pesertapkpm` (`id`, `idUser`, `nama`, `npm`, `jurusan`, `pembayaranPKPM`, `pembayaranBPP`, `transkripKRS`, `transkripNilai`, `nomorHp`, `ukuranKaos`, `status`, `created_at`, `updated_at`) VALUES
(20, 17, 'Bram Krisna Danu 3', '17411071', 'Sistem Informasi', 'DeBZWkPNBPUT0Cvj1597995891.jpeg', 'dcTpZUPKYE4C2KHH1597995891.jpeg', '3WWZV5OGv1qvmL6u1597995891.jpeg', '3psuKiTvBEu6Upho1597995891.jpeg', '085357636304', 'L', 2, '2020-08-21 00:44:51', '2020-08-21 01:32:32');

-- --------------------------------------------------------

--
-- Table structure for table `tb_uploadlaporanpkpm`
--

CREATE TABLE `tb_uploadlaporanpkpm` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idUser` bigint(20) NOT NULL,
  `npm` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `laporan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_uploadlaporanpkpm`
--

INSERT INTO `tb_uploadlaporanpkpm` (`id`, `idUser`, `npm`, `nama`, `laporan`, `created_at`, `updated_at`) VALUES
(9, 12, '17411071', 'bram', 'I5qLaDEfgIFWBC6z1596683748.pdf', '2020-08-05 20:15:48', '2020-08-05 20:15:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(1) NOT NULL DEFAULT 3,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `jurusan`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'Bram Krisna Danu', '17411071', 'Sistem Informasi', 'bram.17411071@student.ubl.ac.id', NULL, '$2y$10$XpYu3P19YGK2z1GOFrij5eloYgKA0X4LJuiO.j/w5c1M.PgFzMuH2', 1, 'UhpVDDHui8VQ6FhZ4BMRjPYlDBoxLTblmdGB09ezXW1FJyXmLqLIsaSF78ez', '2020-07-27 12:54:28', '2020-07-27 12:54:28'),
(12, 'bram', '18411071', 'Sistem Informasi', 'bramkrisna16@gmail.com', NULL, '$2y$10$6TlvgXGXufufGJuzLL2FreCaDgRa6t7wpm.zI7V7CvWP4U.cTXoim', 3, 'DZj6hfITYMnnYV2EdRvcP7CAKej9vZ7CfEpT6wEO2DmGkYfVmTtEUJXvN6o7', '2020-07-28 05:05:30', '2020-07-28 05:05:30'),
(17, 'Bram Krisna Danu 3', '19411071', 'Sistem Informasi', 'anu@gmail.com', NULL, '$2y$10$BF5vNLMvPigB1ZV8OOxNwumeCQOf6ina9ZMoCSsOBmb8ix74wNgl.', 3, NULL, '2020-08-02 15:22:59', '2020-08-02 15:22:59'),
(18, 'bram sekjur', '194110711', 'Sistem Informasi', 'kasir@gmail.com', NULL, '$2y$10$zxDXAU6JInCg71MOhHkk0OzDBqXI6EvSk7Yqult4YnXOgx/ZP6ln2', 2, NULL, '2020-08-04 17:21:11', '2020-08-04 17:21:11'),
(19, 'test sekjur', '12345678', 'Sistem Informasi', 'testsekjur@gmail.com', NULL, '$2y$10$E/m3dz5WcityzuBzOAzM4eTwo7MoBBxTABibfE5xf9JAJaXiEVH1m', 2, NULL, '2020-08-04 17:37:27', '2020-08-04 17:37:27');

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tb_beritapkpm`
--
ALTER TABLE `tb_beritapkpm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_detail_kelompok`
--
ALTER TABLE `tb_detail_kelompok`
  ADD PRIMARY KEY (`idDetail`);

--
-- Indexes for table `tb_formobservasi`
--
ALTER TABLE `tb_formobservasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kelompok`
--
ALTER TABLE `tb_kelompok`
  ADD PRIMARY KEY (`idKelompok`);

--
-- Indexes for table `tb_panduanpkpm`
--
ALTER TABLE `tb_panduanpkpm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pesertapkpm`
--
ALTER TABLE `tb_pesertapkpm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_uploadlaporanpkpm`
--
ALTER TABLE `tb_uploadlaporanpkpm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_beritapkpm`
--
ALTER TABLE `tb_beritapkpm`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_detail_kelompok`
--
ALTER TABLE `tb_detail_kelompok`
  MODIFY `idDetail` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_formobservasi`
--
ALTER TABLE `tb_formobservasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_kelompok`
--
ALTER TABLE `tb_kelompok`
  MODIFY `idKelompok` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_panduanpkpm`
--
ALTER TABLE `tb_panduanpkpm`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_pesertapkpm`
--
ALTER TABLE `tb_pesertapkpm`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_uploadlaporanpkpm`
--
ALTER TABLE `tb_uploadlaporanpkpm`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
