-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Sep 2020 pada 12.27
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

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
-- Struktur dari tabel `failed_jobs`
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
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2020_07_27_181057_add_username_to_users', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_beritapkpm`
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
-- Dumping data untuk tabel `tb_beritapkpm`
--

INSERT INTO `tb_beritapkpm` (`id`, `idUser`, `namaBerita`, `file`, `created_at`, `updated_at`) VALUES
(3, 7, 'Daftar Doosen Pembimbing PKPM', 'CIoXXVzhnS6U0sA31596660222.pdf', '2020-08-05 13:43:42', '2020-08-05 13:43:42'),
(5, 7, 'abs', 'cxSD09rMIGO6rSVV1597925184.pdf', '2020-08-20 05:06:23', '2020-08-20 05:06:23'),
(6, 18, 'daftar peserta pkpm', 'ZFtBpEDvXkqFwSxj1598011267.pdf', '2020-08-21 05:01:07', '2020-08-21 05:01:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_kelompok`
--

CREATE TABLE `tb_detail_kelompok` (
  `idDetail` bigint(20) NOT NULL,
  `idKelompok` bigint(20) NOT NULL,
  `idPeserta` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_detail_kelompok`
--

INSERT INTO `tb_detail_kelompok` (`idDetail`, `idKelompok`, `idPeserta`, `created_at`, `updated_at`) VALUES
(17, 6, 20, '2020-09-01 18:52:21', '2020-09-01 18:52:21'),
(24, 6, 22, '2020-09-08 04:53:51', '2020-09-08 04:53:51'),
(25, 6, 23, '2020-09-08 10:56:03', '2020-09-08 10:56:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_formobservasi`
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
-- Dumping data untuk tabel `tb_formobservasi`
--

INSERT INTO `tb_formobservasi` (`id`, `idUser`, `namaFile`, `file`, `created_at`, `updated_at`) VALUES
(4, 7, 'Form Observasi 2020', 'a7o4Qh9FSxpHqN951597954760.pdf', '2020-08-20 13:19:20', '2020-08-20 13:19:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelompok`
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
-- Dumping data untuk tabel `tb_kelompok`
--

INSERT INTO `tb_kelompok` (`idKelompok`, `namaKelompok`, `dpl`, `namaTempat`, `created_at`, `updated_at`) VALUES
(6, '1', '21', 'adiluwih', '2020-09-01 18:52:03', '2020-09-01 18:52:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_panduanpkpm`
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
-- Dumping data untuk tabel `tb_panduanpkpm`
--

INSERT INTO `tb_panduanpkpm` (`id`, `idUser`, `namaFile`, `file`, `created_at`, `updated_at`) VALUES
(4, 7, 'panduan 2020', 'I6yxPYkgGZj0DXII1596660199.pdf', '2020-08-05 13:43:18', '2020-08-05 13:43:18'),
(5, 7, 'Form nilai', 'hUJI35WBne4NHWMx1597918671.pdf', '2020-08-20 03:17:51', '2020-08-20 03:17:51'),
(6, 7, 'qwertyuio qwertyui asdfghjk qwert', '3fiHjI1MfP1rw5jU1597949778.pdf', '2020-08-20 11:56:18', '2020-08-20 11:56:18'),
(7, 7, 'xfxfxfgxfx', 'WOsPNcDIzSoGpW6V1597949872.pdf', '2020-08-20 11:57:52', '2020-08-20 11:57:52'),
(8, 7, 'drtdrtdrtdtd', '5RoqVmKkmtRnHpLy1597949886.pdf', '2020-08-20 11:58:06', '2020-08-20 11:58:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `id` bigint(20) NOT NULL,
  `pengirim` bigint(20) NOT NULL,
  `penerima` bigint(20) NOT NULL,
  `pesan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pesan`
--

INSERT INTO `tb_pesan` (`id`, `pengirim`, `penerima`, `pesan`, `created_at`, `updated_at`) VALUES
(17, 12, 21, 'fhgfhjghj', '2020-09-08 10:44:29', '2020-09-08 10:44:29'),
(20, 17, 21, 'adasfdsfdsfs', '2020-09-08 10:57:48', '2020-09-08 10:57:48'),
(21, 21, 17, 'dfgdhgkjhdkghd', '2020-09-08 10:58:01', '2020-09-08 10:58:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesertapkpm`
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
  `transkripSks` varchar(255) NOT NULL,
  `nomorHp` varchar(255) NOT NULL,
  `ukuranKaos` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pesertapkpm`
--

INSERT INTO `tb_pesertapkpm` (`id`, `idUser`, `nama`, `npm`, `jurusan`, `pembayaranPKPM`, `pembayaranBPP`, `transkripKRS`, `transkripNilai`, `transkripSks`, `nomorHp`, `ukuranKaos`, `status`, `created_at`, `updated_at`) VALUES
(22, 12, 'bram', '17411071', 'Sistem Informasi', 'O9CBlFe0RqPZCabR1599015123.jpeg', 'Lp7Ls4CaxhGRBVpt1599015123.jpeg', 'TYJ2iTBh4ZXgmtor1599015123.png', 'TTh5AXMUmlqzf2GC1599015123.jpeg', 'Tob6E4UhOHIQlyYI1599015123.jpeg', '085357636304', 'L', 2, '2020-09-01 19:52:02', '2020-09-02 12:27:06'),
(23, 17, 'Bram Krisna Danu 3', '19411071', 'Sistem Informasi', 'zJSewkroT3fmHu0K1599587213.jpeg', '0JhK31q2ANf4Nf091599587213.jpeg', 'Pl4ueZPfc0k77rOo1599587213.png', '6WGp8sVftv0Uj8Jt1599587213.png', 'L7GvwmjlpQVwXHbE1599587213.png', '085357636304', 'L', 2, '2020-09-08 10:46:53', '2020-09-08 10:55:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_uploadlaporanpkpm`
--

CREATE TABLE `tb_uploadlaporanpkpm` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idUser` bigint(20) NOT NULL,
  `npm` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `laporan` varchar(255) NOT NULL,
  `video` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_uploadlaporanpkpm`
--

INSERT INTO `tb_uploadlaporanpkpm` (`id`, `idUser`, `npm`, `nama`, `laporan`, `video`, `created_at`, `updated_at`) VALUES
(10, 17, '17411071', 'Bram Krisna Danu 3', 'uF4i5E5UwPi8wHSf1599496937.pdf', 'kP3Xf.mp4', '2020-09-07 09:42:16', '2020-09-07 09:42:16'),
(11, 12, '18411071', 'bram', 'UQFz1hTNK2I67H6O1599596942.pdf', 'vCJAr.mp4', '2020-09-08 13:29:01', '2020-09-08 13:29:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dpl` bigint(20) DEFAULT NULL,
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `dpl`, `name`, `username`, `jurusan`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 0, 'Bram Krisna Danu', '17411071', 'Sistem Informasi', 'bram.17411071@student.ubl.ac.id', NULL, '$2y$10$XpYu3P19YGK2z1GOFrij5eloYgKA0X4LJuiO.j/w5c1M.PgFzMuH2', 1, 'RqgcY2qhirBQWqaIJnqp2ZaDEv3QPHiKOFwY7hEJs69fDjJqcl352tDvaNz6', '2020-07-27 12:54:28', '2020-07-27 12:54:28'),
(12, 21, 'bram', '18411071', 'Sistem Informasi', 'bramkrisna16@gmail.com', NULL, '$2y$10$6TlvgXGXufufGJuzLL2FreCaDgRa6t7wpm.zI7V7CvWP4U.cTXoim', 3, 'DZj6hfITYMnnYV2EdRvcP7CAKej9vZ7CfEpT6wEO2DmGkYfVmTtEUJXvN6o7', '2020-07-28 05:05:30', '2020-09-08 04:53:51'),
(17, 21, 'Bram Krisna Danu 3', '19411071', 'Sistem Informasi', 'anu@gmail.com', NULL, '$2y$10$BF5vNLMvPigB1ZV8OOxNwumeCQOf6ina9ZMoCSsOBmb8ix74wNgl.', 3, NULL, '2020-08-02 15:22:59', '2020-09-08 10:56:03'),
(18, 0, 'bram sekjur', '194110711', 'Sistem Informasi', 'kasir@gmail.com', NULL, '$2y$10$zxDXAU6JInCg71MOhHkk0OzDBqXI6EvSk7Yqult4YnXOgx/ZP6ln2', 2, NULL, '2020-08-04 17:21:11', '2020-08-04 17:21:11'),
(19, 0, 'test sekjur', '12345678', 'Sistem Informasi', 'testsekjur@gmail.com', NULL, '$2y$10$E/m3dz5WcityzuBzOAzM4eTwo7MoBBxTABibfE5xf9JAJaXiEVH1m', 2, NULL, '2020-08-04 17:37:27', '2020-08-04 17:37:27'),
(20, 0, 'asd', '1234567890', 'informatika', 'dss@mail.com', NULL, '$2y$10$wsSZ6JJ3.3H2ZVO74eG0MeTAwZ.JpX1fzJhKWrBdLmebTJC6ef3tS', 3, NULL, '2020-08-21 08:23:14', '2020-08-21 08:23:14'),
(21, 0, 'namikaze', '1112345678', NULL, 'namikaze@mail.com', NULL, '$2y$10$iBpus9wqZf1RY/vRlvkLjOXg6IEAFO/ytn9oql1lO/3cO8i/JQVGu', 4, NULL, '2020-09-01 18:39:57', '2020-09-01 18:39:57'),
(22, NULL, 'q', 'wq', 'Tehnik Informatika', 'asdaws@gmail.com', NULL, '$2y$10$82dCPxbSXU6JgkZfzufJxuVAQxHXCEQnCM8tplhIKLx.R.6ZT2cPS', 3, NULL, '2020-09-09 03:23:50', '2020-09-09 03:23:50'),
(23, NULL, 'das', 'sdasd', 'Sistem Informasi', '1@asjj.com', NULL, '$2y$10$zxdXtTkJ41TvO.w8udIWEu5WlFaWGX5bWeoP1lmIQ9OBR7IRPveHq', 3, NULL, '2020-09-09 03:24:49', '2020-09-09 03:24:49');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `tb_beritapkpm`
--
ALTER TABLE `tb_beritapkpm`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_detail_kelompok`
--
ALTER TABLE `tb_detail_kelompok`
  ADD PRIMARY KEY (`idDetail`);

--
-- Indeks untuk tabel `tb_formobservasi`
--
ALTER TABLE `tb_formobservasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kelompok`
--
ALTER TABLE `tb_kelompok`
  ADD PRIMARY KEY (`idKelompok`);

--
-- Indeks untuk tabel `tb_panduanpkpm`
--
ALTER TABLE `tb_panduanpkpm`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pesertapkpm`
--
ALTER TABLE `tb_pesertapkpm`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_uploadlaporanpkpm`
--
ALTER TABLE `tb_uploadlaporanpkpm`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_beritapkpm`
--
ALTER TABLE `tb_beritapkpm`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_kelompok`
--
ALTER TABLE `tb_detail_kelompok`
  MODIFY `idDetail` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tb_formobservasi`
--
ALTER TABLE `tb_formobservasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_kelompok`
--
ALTER TABLE `tb_kelompok`
  MODIFY `idKelompok` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_panduanpkpm`
--
ALTER TABLE `tb_panduanpkpm`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_pesertapkpm`
--
ALTER TABLE `tb_pesertapkpm`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tb_uploadlaporanpkpm`
--
ALTER TABLE `tb_uploadlaporanpkpm`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
