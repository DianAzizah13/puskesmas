-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2024 at 06:19 PM
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
-- Database: `si_puskesmas`
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
('admin@gmail.com|127.0.0.1', 'i:1;', 1719166298),
('admin@gmail.com|127.0.0.1:timer', 'i:1719166298;', 1719166298),
('dokter@mail.com|127.0.0.1', 'i:1;', 1719164953),
('dokter@mail.com|127.0.0.1:timer', 'i:1719164953;', 1719164953),
('dokterbiasa@mail.com|127.0.0.1', 'i:1;', 1718996091),
('dokterbiasa@mail.com|127.0.0.1:timer', 'i:1718996091;', 1718996091);

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
-- Table structure for table `detail_resep`
--

CREATE TABLE `detail_resep` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_resep` bigint(20) UNSIGNED NOT NULL,
  `id_obat` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(10) UNSIGNED NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_resep`
--

INSERT INTO `detail_resep` (`id`, `id_resep`, `id_obat`, `jumlah`, `keterangan`, `created_at`, `updated_at`) VALUES
(4, 3, 1, 2, '-', '2024-06-23 17:39:20', '2024-06-23 17:39:20'),
(5, 4, 1, 5, '-', '2024-06-23 18:04:53', '2024-06-23 18:04:53');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_poli` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(50) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `id_user`, `id_poli`, `nip`, `telepon`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '432154654567', '081234567890', '2024-06-20 16:13:24', '2024-06-20 16:13:24'),
(2, 4, 2, '432154654567', '081234567890', '2024-06-20 16:13:24', '2024-06-20 16:13:24'),
(3, 2, 3, '432154654567', '081234567890', '2024-06-20 16:13:24', '2024-06-20 16:13:24'),
(4, 1, 4, '432154654567', '081234567890', '2024-06-20 16:13:24', '2024-06-20 16:13:24');

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
-- Table structure for table `inboxes`
--

CREATE TABLE `inboxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(16) NOT NULL,
  `pesan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inboxes`
--

INSERT INTO `inboxes` (`id`, `nama`, `email`, `telepon`, `pesan`, `created_at`, `updated_at`) VALUES
(2, 'Tes', 'tes@mail.com', '081234567890', 'tes inbox pesan', '2024-06-25 15:30:15', '2024-06-25 15:30:15');

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
-- Table structure for table `kunjungan`
--

CREATE TABLE `kunjungan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pasien` bigint(20) UNSIGNED NOT NULL,
  `id_poli` bigint(20) UNSIGNED NOT NULL,
  `id_waktu` bigint(20) UNSIGNED NOT NULL,
  `tanggal_kunjungan` date NOT NULL,
  `kode_kunjungan` varchar(20) NOT NULL,
  `status` enum('Aktif','Selesai') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kunjungan`
--

INSERT INTO `kunjungan` (`id`, `id_pasien`, `id_poli`, `id_waktu`, `tanggal_kunjungan`, `kode_kunjungan`, `status`, `created_at`, `updated_at`) VALUES
(12, 1, 1, 1, '2024-06-24', 'A-1', 'Selesai', '2024-06-23 17:33:43', '2024-06-23 17:35:23'),
(13, 1, 1, 1, '2024-06-24', 'A-2', 'Selesai', '2024-06-23 17:34:26', '2024-06-23 17:48:29'),
(14, 1, 1, 1, '2024-06-24', 'A-3', 'Aktif', '2024-06-23 18:05:57', '2024-06-23 18:05:57'),
(15, 1, 2, 1, '2024-06-24', 'B-1', 'Aktif', '2024-06-23 18:06:11', '2024-06-23 18:06:11'),
(16, 2, 1, 1, '2024-06-26', 'A-1', 'Aktif', '2024-06-25 13:59:55', '2024-06-25 13:59:55'),
(17, 2, 1, 1, '2024-06-25', 'A-1', 'Selesai', '2024-06-25 14:01:11', '2024-06-25 15:11:56'),
(18, 2, 1, 1, '2024-06-25', 'A-2', 'Aktif', '2024-06-25 14:01:25', '2024-06-25 14:01:25');

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
(4, '2024_06_16_231148_create_polis_table', 1),
(5, '2024_06_16_233033_create_waktus_table', 1),
(6, '2024_06_17_231103_create_dokters_table', 1),
(7, '2024_06_17_231846_create_pasiens_table', 1),
(8, '2024_06_17_232849_create_kunjungans_table', 1),
(9, '2024_06_17_233332_create_rekam_medis_table', 1),
(10, '2024_06_17_233844_create_resep_obats_table', 1),
(11, '2024_06_17_234535_create_obats_table', 1),
(12, '2024_06_17_235201_create_detail_reseps_table', 1),
(13, '2024_06_25_222026_create_inboxes_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `stok` int(10) UNSIGNED NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `kadaluwarsa` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `stok`, `satuan`, `kadaluwarsa`, `created_at`, `updated_at`) VALUES
(1, 'Paracetamol', 38, 'Strip', '2024-07-04', '2024-06-20 17:45:33', '2024-06-23 18:04:53');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `penjamin` enum('Umum/Asuransi Lain','BPJS') NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `bpjs` varchar(20) DEFAULT NULL,
  `tanggal_lahir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nik`, `nama_pasien`, `penjamin`, `jenis_kelamin`, `alamat`, `telepon`, `bpjs`, `tanggal_lahir`, `created_at`, `updated_at`) VALUES
(1, '123123123', 'tes', 'Umum/Asuransi Lain', 'Laki-Laki', 'tes', '345235467', NULL, '2024-06-04', '2024-06-20 16:14:22', '2024-06-20 16:14:22'),
(2, '1234123412341234', 'john', 'Umum/Asuransi Lain', 'Laki-Laki', 'pondok labu', '081234567890', NULL, '2024-05-28', '2024-06-25 13:59:55', '2024-06-25 13:59:55');

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
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_poli` varchar(50) NOT NULL,
  `kode_poli` varchar(2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`id`, `nama_poli`, `kode_poli`, `created_at`, `updated_at`) VALUES
(1, 'Poli Umum', 'A', '2024-06-20 16:13:24', '2024-06-20 16:13:24'),
(2, 'Poli Lansia', 'B', '2024-06-20 16:13:24', '2024-06-20 16:13:24'),
(3, 'Poli KIA', 'C', '2024-06-20 16:13:24', '2024-06-20 16:13:24'),
(4, 'Poli Gigi', 'G', '2024-06-20 16:13:24', '2024-06-20 16:13:24');

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kunjungan` bigint(20) UNSIGNED NOT NULL,
  `id_dokter` bigint(20) UNSIGNED NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `diagnosa` varchar(255) DEFAULT NULL,
  `anamnesa` varchar(255) DEFAULT NULL,
  `berat_badan` varchar(50) DEFAULT NULL,
  `tinggi_badan` varchar(50) DEFAULT NULL,
  `alergi_obat` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekam_medis`
--

INSERT INTO `rekam_medis` (`id`, `id_kunjungan`, `id_dokter`, `keluhan`, `diagnosa`, `anamnesa`, `berat_badan`, `tinggi_badan`, `alergi_obat`, `keterangan`, `created_at`, `updated_at`) VALUES
(4, 12, 1, 'tes', '-', '-', '70', '170', '-', '-', '2024-06-23 17:34:55', '2024-06-23 17:35:23'),
(5, 13, 1, '-', '-', '-', '70', '170', '-', '-', '2024-06-23 17:48:06', '2024-06-23 17:48:29'),
(6, 17, 1, 'tes', '-', '-', '60', '170', '-', '-', '2024-06-25 15:11:34', '2024-06-25 15:11:56');

-- --------------------------------------------------------

--
-- Table structure for table `resep_obat`
--

CREATE TABLE `resep_obat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_rekam_medis` bigint(20) UNSIGNED NOT NULL,
  `resep_obat` varchar(255) NOT NULL,
  `status` enum('Sedang Disiapkan','Telah Selesai','Selesai') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resep_obat`
--

INSERT INTO `resep_obat` (`id`, `id_rekam_medis`, `resep_obat`, `status`, `created_at`, `updated_at`) VALUES
(3, 4, '-', 'Selesai', '2024-06-23 17:35:23', '2024-06-23 17:44:16'),
(4, 5, '-', 'Selesai', '2024-06-23 17:48:29', '2024-06-23 18:05:01'),
(5, 6, '-', 'Sedang Disiapkan', '2024-06-25 15:11:56', '2024-06-25 15:11:56');

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
('9aJgBJhdPCDVcI6sHlYTOrVQrFHHZ262Db9wuncB', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:127.0) Gecko/20100101 Firefox/127.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiM1I1aEUxWFhnT3BVYlo2b2ZwYnRHM1NYd3g5QlBzTVhYOHNMdlFFZiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjU7fQ==', 1719332241),
('CKgrRI122pWvOn3j9xrMmC63MLZeh4HgiqKGcdFl', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:127.0) Gecko/20100101 Firefox/127.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUFl0UTdJa3dSdlEwTjMxSFNuTUZ4NXJzNkpIQ3dqY2kwcms2Y2x3WSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1719327095),
('OL9eEtlEVb2iOOYu6hTvjX8ph9yZkC4qmypY9R4E', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 Edg/126.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYURXSVBNclhqdmxFdjY3cGRYZTBnckdPZUxsUUVvRkl0THVPUUpTNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1719331498),
('P14z42zDdw7GvsWxv4Q1OI6yeTNRcjx0ytSOIloI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:127.0) Gecko/20100101 Firefox/127.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic0h6UG9tblZQeDBqRk5VQmNqOHFXMVdkVzdza3pjMGpXTm9pWThqayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly90ZXN0LmxvY2FsaG9zdDo4MDAwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1719331425);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `role` varchar(10) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dokter Gigi', 'doktergigi@mail.com', 'dokter', NULL, '$2y$12$4ozj97NrqdEbev2nIpxsn.SjW.c96A384bfk7jcAY0YsybWNMxp3K', NULL, '2024-06-20 16:13:23', '2024-06-20 16:13:23'),
(2, 'Dokter KIA', 'dokterkia@mail.com', 'dokter', NULL, '$2y$12$Wfhb.nKIR2AAyoHISjAFEOQhht2htp9O3bleND4Eu1WW9C6nb5z6W', NULL, '2024-06-20 16:13:23', '2024-06-20 16:13:23'),
(3, 'Dokter Umum', 'dokterumum@mail.com', 'dokter', NULL, '$2y$12$FMMhTUsqncoHx7oFWNa/9uShAacM3vuCKSGSbIxHrlICiE4k1zQ0.', NULL, '2024-06-20 16:13:23', '2024-06-20 16:13:23'),
(4, 'Dokter Lansia', 'dokterlansia@mail.com', 'dokter', NULL, '$2y$12$AGf2mwAuFoBHAf6ErdUKC.dKlnlpTWBIE/LGVxIxRCWMb4h3J1CAO', NULL, '2024-06-20 16:13:23', '2024-06-20 16:13:23'),
(5, 'Admin', 'admin@mail.com', 'admin', NULL, '$2y$12$N6lM5xtcqzzTNup/Ppdlh.82dSLPmy6PTwlpaRQfT1ew5N0.ZGi.S', NULL, '2024-06-20 16:13:24', '2024-06-20 16:13:24'),
(6, 'Apoteker', 'apoteker@mail.com', 'apoteker', NULL, '$2y$12$k.GIdBlcUnktzNm6nsHJ6O/1Vgc1aSMnWdJxyHYtVHQDTkJ7l7DhK', NULL, '2024-06-20 16:13:24', '2024-06-20 16:13:24');

-- --------------------------------------------------------

--
-- Table structure for table `waktu`
--

CREATE TABLE `waktu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jam` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `waktu`
--

INSERT INTO `waktu` (`id`, `jam`, `created_at`, `updated_at`) VALUES
(1, '08.00', '2024-06-20 16:13:24', '2024-06-20 16:13:24'),
(2, '09.00', '2024-06-20 16:13:24', '2024-06-20 16:13:24'),
(3, '10.00', '2024-06-20 16:13:24', '2024-06-20 16:13:24'),
(4, '11.00', '2024-06-20 16:13:24', '2024-06-20 16:13:24'),
(5, '12.00', '2024-06-20 16:13:24', '2024-06-20 16:13:24'),
(6, '13.00', '2024-06-20 16:13:24', '2024-06-20 16:13:24'),
(7, '14.00', '2024-06-20 16:13:24', '2024-06-20 16:13:24');

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
-- Indexes for table `detail_resep`
--
ALTER TABLE `detail_resep`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_resep_id_resep_foreign` (`id_resep`),
  ADD KEY `detail_resep_id_obat_foreign` (`id_obat`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dokter_id_user_foreign` (`id_user`),
  ADD KEY `dokter_id_poli_foreign` (`id_poli`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inboxes`
--
ALTER TABLE `inboxes`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kunjungan_id_pasien_foreign` (`id_pasien`),
  ADD KEY `kunjungan_id_poli_foreign` (`id_poli`),
  ADD KEY `kunjungan_id_waktu_foreign` (`id_waktu`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pasien_nik_unique` (`nik`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rekam_medis_id_kunjungan_foreign` (`id_kunjungan`),
  ADD KEY `rekam_medis_id_dokter_foreign` (`id_dokter`);

--
-- Indexes for table `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resep_obat_id_rekam_medis_foreign` (`id_rekam_medis`);

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
-- Indexes for table `waktu`
--
ALTER TABLE `waktu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_resep`
--
ALTER TABLE `detail_resep`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inboxes`
--
ALTER TABLE `inboxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kunjungan`
--
ALTER TABLE `kunjungan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `resep_obat`
--
ALTER TABLE `resep_obat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `waktu`
--
ALTER TABLE `waktu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_resep`
--
ALTER TABLE `detail_resep`
  ADD CONSTRAINT `detail_resep_id_obat_foreign` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_resep_id_resep_foreign` FOREIGN KEY (`id_resep`) REFERENCES `resep_obat` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `dokter_id_poli_foreign` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dokter_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD CONSTRAINT `kunjungan_id_pasien_foreign` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kunjungan_id_poli_foreign` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kunjungan_id_waktu_foreign` FOREIGN KEY (`id_waktu`) REFERENCES `waktu` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD CONSTRAINT `rekam_medis_id_dokter_foreign` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rekam_medis_id_kunjungan_foreign` FOREIGN KEY (`id_kunjungan`) REFERENCES `kunjungan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD CONSTRAINT `resep_obat_id_rekam_medis_foreign` FOREIGN KEY (`id_rekam_medis`) REFERENCES `rekam_medis` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
