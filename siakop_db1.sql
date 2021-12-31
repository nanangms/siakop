-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2021 at 10:47 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakop_db`
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
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `urutan`, `kategori`, `pertanyaan`, `jawaban`, `created_at`, `updated_at`, `uuid`) VALUES
(12, 1, 'Umum', 'Bagaimana Tahapan Buat Akun Gudep baru?', '<ul><li>- Akses halaman sipram.jambikota.go.id/pendaftaran\r\n    </li><li>- Klik \"PENDAFTARAN\".\r\nLakukan pengisian data pada form yang disediakan secara lengkap dan benar,\r\n    Kemudian klik \"KIRIM\"</li><li>- Pendaftaran Berhasil, Admin akan memverifikasi data pendaftaran anda dan anda akan menerima notifikasi via email bahwa akun anda sudah aktif.</li><li>- jika akun anda sudah aktif. lakukan Login/masuk ke akun dengan memasukan email dan password yang telah dibuat pada saat pendaftaran. </li></ul>', '2021-03-13 22:39:59', '2021-11-09 10:15:59', '2177b8d7-59ec-4cf0-a034-fe481bccc97c'),
(13, 2, 'Umum', 'Bagaimana Cara Reset Password?', '<ol><li>- masuk ke halaman login\r\n    Klik link \"Lupa Password?\"\r\n    masukkan alamat email yang sudah terdaftar\r\n    </li><li>- buka email (bisa di folder spam)\r\n    klik link/URL yang ada di email (otomatis masuk halaman reset password)\r\n    </li><li>- masukkan password baru, dan\r\n    selesai (otomatis login)</li></ol>', '2021-03-13 22:40:34', '2021-11-09 10:16:28', 'c395174f-2dd7-4b4e-b88b-3a269971c1a6'),
(14, 3, 'Umum', 'Siapa saja yang bisa membuat akun ?', 'sekolah/organisasi yang nama gudepnya telah terdaftar di database dispora<br>', '2021-03-13 22:41:00', '2021-11-09 10:26:15', '67bb2f9e-3d5d-4869-a154-31b28e579068'),
(15, 4, 'Umum', 'Kenapa hanya Wilayah Kota Jambi ?', 'Kami hanya berfokus di wilayah KotaJambi<br>', '2021-03-13 22:41:33', '2021-11-09 10:26:45', '65150f35-6038-4a57-9553-cbf9d756717a'),
(16, 5, 'Umum', 'Bagaimana kerahasiaan data para member ?', 'Kami tidak bertanggung jawab atas segala informasi yang digunakan oleh oknum-oknum tertentu untuk perbuatan yang tidak betanggung jawab. Pastikan data yang anda berikan adalah data memang perlu dibagikan ke umum.', '2021-03-13 22:42:07', '2021-03-13 22:42:07', 'bb66f98b-28eb-4fb6-bf7b-496319145951'),
(17, 6, 'Umum', 'Apakah ada dana yang perlu disetorkan ?', 'Kami tidak pernah meminta satu sen pun kepada member walaupun nanti misalkan ada, informasi akan kami sampakan langsung melalui Web Official ekrafjambi.com', '2021-03-13 22:42:31', '2021-04-13 14:26:26', '0a1b8c85-c78e-4fbc-8e0a-8b57f262c154');

-- --------------------------------------------------------

--
-- Table structure for table `kab_kota`
--

CREATE TABLE `kab_kota` (
  `id` int(11) NOT NULL,
  `nama_kab_kota` varchar(100) NOT NULL,
  `seo_kab_kota` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kab_kota`
--

INSERT INTO `kab_kota` (`id`, `nama_kab_kota`, `seo_kab_kota`, `created_at`, `updated_at`, `uuid`) VALUES
(1, 'Kota Jambi', 'kota-jambi', '2021-03-11 21:56:12', '2021-03-11 22:20:02', '160f4c37-c890-4a01-a013-a2a3a013a4d5'),
(2, 'Kab. Kerinci', 'kab-kerinci', '2021-03-11 21:59:13', '2021-03-11 22:07:26', '178d85e3-d812-4f1a-abf4-fe5c5d94d388'),
(4, 'Kab. Bungo', 'kab-bungo', '2021-03-11 22:17:21', '2021-03-11 22:17:21', 'b7e6bb77-752f-4015-9426-32de9089c109'),
(5, 'Kab. Merangin', 'kab-merangin', '2021-03-11 22:17:35', '2021-03-11 22:17:35', '82781221-6dfa-4af1-bd27-2f45e2feb181'),
(6, 'Kab. Muaro Jambi', 'kab-muaro-jambi', '2021-03-11 22:17:50', '2021-03-11 22:17:50', '4bc0995e-38fd-4ae9-a1bf-6786c1ddcf77'),
(7, 'Kab. Sarolangun', 'kab-sarolangun', '2021-03-11 22:18:03', '2021-03-11 22:18:03', '8920fa6e-0e03-47e2-9b05-40e6a0273d07'),
(8, 'Kab. Tanjung Jabung Barat', 'kab-tanjung-jabung-barat', '2021-03-11 22:18:23', '2021-03-11 22:18:23', '47e3add8-9f76-4506-bb76-eb6dc2e00193'),
(9, 'Kab. Tanjung Jabung Timur', 'kab-tanjung-jabung-timur', '2021-03-11 22:18:57', '2021-03-11 22:18:57', 'e08aca2e-25bf-45ae-a8d3-7d1784a83a04'),
(10, 'Kab. Tebo', 'kab-tebo', '2021-03-11 22:19:05', '2021-03-11 22:19:05', 'd1516b82-5afb-48ef-bca7-71ed5b7a6373'),
(11, 'Kota Sungai Penuh', 'kota-sungai-penuh', '2021-03-11 22:19:24', '2021-03-11 22:19:24', '62bdb522-8b31-437c-949e-9d945500ac1c'),
(12, 'Kab. Batang Hari', 'kab-batang-hari', '2021-03-11 22:19:47', '2021-03-11 22:19:47', 'ef07fc8c-4872-4f3e-b109-ada1f027fefd');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `kategori_seo` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `kategori_seo`, `created_at`, `updated_at`, `uuid`) VALUES
(2, 'saaass', 'saaass', '2021-03-15 10:12:49', '2021-11-23 09:17:59', '19213fbc-d463-4f8e-885c-31da5b178c4a'),
(3, 'Berita', 'berita', '2021-03-15 10:15:15', '2021-11-10 08:21:06', 'd1568714-00dc-45f4-951b-315eb15b46ca'),
(5, 'Kegiatan', 'kegiatan', '2021-11-17 11:02:47', '2021-11-17 11:02:47', 'b05cc41e-c709-443c-ac23-686c97c34c01');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `urutan` int(2) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `id_menu`, `nama_menu`, `url`, `urutan`, `icon`, `created_at`, `updated_at`, `uuid`) VALUES
(1, 0, 'Dashboard', 'home', 1, 'fa fa-home', '2021-03-01 19:55:06', '2021-06-20 16:57:04', '270e8b89-f2de-41f9-8234-dfc1bba1d7d0'),
(2, 0, 'Data Master', 'data-master', 11, 'fa fa-database', '2021-03-06 10:24:13', '2021-04-05 08:19:59', '28c8e6ba-0d9f-49c7-bb22-4d3b4527c91c'),
(4, 0, 'Setting', 'setting', 12, 'fas fa-cogs', '2021-03-06 11:49:48', '2021-04-05 08:20:05', '4b5e74bd-ec0f-47c6-80e4-36c131d3b802'),
(7, 4, 'Menu', 'setting/menu', 1, '-', '2021-03-06 12:54:10', '2021-03-06 12:54:10', '6fa9ff16-b5fc-4024-ba09-3b47ffd0be36'),
(8, 4, 'Role', 'setting/role', 2, '-', '2021-03-06 12:54:38', '2021-03-06 12:54:38', 'cc2f8d56-9828-477c-b923-7913bfef5f5f'),
(9, 4, 'Role Menu', 'setting/role_menu', 3, '-', '2021-03-06 12:55:09', '2021-03-06 15:51:38', '89a44338-d516-4dd8-85d4-8a033c3b3c83'),
(10, 0, 'Data Pengguna', 'user', 10, 'fas fa-users', '2021-03-06 12:56:11', '2021-04-05 08:19:49', 'b6350a8a-0942-4a4a-adfc-dc88ce3e1533'),
(22, 0, 'FAQ', 'faq', 9, 'fa fa-paw', '2021-03-13 22:24:22', '2021-04-05 08:19:41', '37e934f1-705c-4857-94cf-13a9106aa200'),
(23, 2, 'Kategori Berita', 'data-master/kategori', 4, '-', '2021-03-15 09:55:20', '2021-11-23 12:19:41', 'fae34c0f-93ea-43eb-ab5f-7c3dd7eb6d6d'),
(25, 2, 'Setting Website', 'data-master/setting-web', 6, '-', '2021-03-20 23:53:03', '2021-03-20 23:53:03', '28373d9d-7976-4029-b551-e5b9a8f8bc4c'),
(29, 0, 'Laporan', 'laporan', 8, 'fas fa-file', '2021-04-05 08:15:29', '2021-04-16 10:19:14', 'f599224b-1d9e-4e59-9acd-a3560904446b'),
(34, 0, 'Slide Homepage', 'slide_homepage', 7, 'fa fa-images', '2021-05-30 14:49:07', '2021-06-05 09:54:25', 'b87d8a4f-bbc8-4c36-8115-f4a9971363dd'),
(43, 0, 'Rekapitulasi/Laporan', 'rekapitulasi', 3, 'fa fa-file', '2021-07-22 09:50:00', '2021-07-22 09:50:00', '33330f11-1661-4da9-ba76-371703458093'),
(59, 10, 'Administrator', 'user', 1, '-', '2021-08-24 11:18:21', '2021-08-24 11:18:31', '23c192a1-ac0a-4291-a6a2-0f894beb57cf');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

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
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nama_role` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `nama_role`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '2021-03-06 13:06:49', '2021-03-06 13:06:49'),
(2, 'Admin', '2021-03-06 13:07:17', '2021-03-06 13:07:17');

-- --------------------------------------------------------

--
-- Table structure for table `role_menu`
--

CREATE TABLE `role_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_menu`
--

INSERT INTO `role_menu` (`id`, `role_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-03-06 13:16:01', '2021-03-06 13:16:01'),
(2, 1, 10, '2021-03-06 13:17:00', '2021-03-06 13:17:00'),
(3, 1, 2, '2021-03-06 13:17:28', '2021-03-06 13:17:28'),
(5, 1, 4, '2021-03-06 13:18:16', '2021-03-06 13:18:16'),
(6, 1, 7, '2021-03-06 13:18:23', '2021-03-06 13:18:23'),
(7, 1, 8, '2021-03-06 13:18:29', '2021-03-06 13:18:29'),
(22, 1, 23, '2021-03-15 09:56:13', '2021-03-15 09:56:13'),
(147, 1, 59, '2021-11-22 15:55:34', '2021-11-22 15:55:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(5) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verifikasi` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `no_hp`, `email`, `role_id`, `email_verified_at`, `password`, `remember_token`, `verifikasi`, `photo`, `is_active`, `created_at`, `updated_at`, `uuid`) VALUES
(1, 'Nanang Maulana Syarif', '085266972611', 'nanang.ms22@gmail.com', 1, NULL, '$2y$10$KyedPF6kMwfW2l0XXYCcuOSvhyrTprcHmvYQPaNTrENXFWNlwLCTy', 'b97PBfbiZdjdWX9VwcPe3Cga8HDW4pjFL9O4WS5euRaATPwuYWxmEAGaFkQa', 'Y', 'Nanang_Maulana_Syarif_sDL27.png', 'Y', '2021-02-27 03:42:29', '2021-11-23 10:33:42', '745bddb6-05b3-4cd0-9b93-6db3bcfda1a4'),
(24, 'Admin', '-', 'admin@gmail.com', 2, NULL, '$2y$10$0yW6EiqJW4150zYU9t/4UOpl5cSvMgzx41fUWWOpVXP0uLS.pjSOq', NULL, 'Y', NULL, 'Y', '2021-06-27 12:18:42', '2021-11-16 08:58:54', '745bddb6-03c8-4cd0-9b93-6db3bcfda1a4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kab_kota`
--
ALTER TABLE `kab_kota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
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
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_menu`
--
ALTER TABLE `role_menu`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kab_kota`
--
ALTER TABLE `kab_kota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `role_menu`
--
ALTER TABLE `role_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
