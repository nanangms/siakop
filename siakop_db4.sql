-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2022 at 03:44 AM
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
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id` int(11) NOT NULL,
  `nama_agama` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id`, `nama_agama`, `created_at`, `updated_at`, `uuid`) VALUES
(2, 'Islam', '2021-12-07 11:19:54', '2021-12-07 11:19:54', 'ec245137-676c-4811-bc16-8f0f554e0b29'),
(3, 'Kristen', '2021-12-07 11:23:42', '2021-12-07 11:23:42', '4331b389-cf99-4fef-b854-541430aa6b25');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `no_anggota` int(3) UNSIGNED ZEROFILL NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `t4_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `agama_id` int(11) NOT NULL,
  `alamat` text DEFAULT NULL,
  `kota` varchar(100) NOT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `no_anggota`, `nik`, `nama_lengkap`, `t4_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama_id`, `alamat`, `kota`, `kode_pos`, `no_hp`, `keterangan`, `status`, `created_at`, `updated_at`, `uuid`) VALUES
(2, 001, '12313', 'Nanang Maulana Syarip', 'Kuningan', '1993-06-22', 'Laki-laki', 2, 'Jl. Selamat', 'JAMBI', '36146', '23131', NULL, 'AKTIF', '2021-12-07 11:40:27', '2022-01-04 07:36:11', '91459209-2821-4213-89a3-02572d533087'),
(4, 003, '213131', 'Haruka', 'Jambi', '2021-12-08', 'Perempuan', 2, 'sdfsf', 'Jambi', '3423', '424', 'sdfs', 'AKTIF', '2021-12-08 10:20:44', '2021-12-24 10:02:35', '1f0d2004-aba2-4281-a5d8-cacf3c024be8'),
(6, 004, '1212121212', 'fefe', 'dsf', '2022-01-03', 'Perempuan', 3, NULL, 'jambi', NULL, NULL, NULL, 'AKTIF', '2022-01-03 10:27:35', '2022-01-03 10:30:19', 'e5da53ee-8601-4245-ab0b-6a24098ddbb0'),
(7, 005, '35555555555', 'edfter', 'dgs', '2022-01-03', 'Laki-laki', 2, NULL, 'dgsg', NULL, NULL, NULL, 'AKTIF', '2022-01-03 10:36:57', '2022-01-03 10:36:57', '1558ed01-1dbc-4aba-832b-418bec7be40e');

-- --------------------------------------------------------

--
-- Table structure for table `bunga_pinjaman`
--

CREATE TABLE `bunga_pinjaman` (
  `id` int(11) NOT NULL,
  `jangka_waktu` int(3) NOT NULL,
  `nilai_bunga` float NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bunga_pinjaman`
--

INSERT INTO `bunga_pinjaman` (`id`, `jangka_waktu`, `nilai_bunga`, `created_at`, `updated_at`, `uuid`) VALUES
(1, 1, 2, '2021-12-29 10:45:48', '2021-12-29 10:45:48', '97f9909b-be07-4704-a5f3-3cb0689a46b9'),
(2, 2, 2, '2021-12-29 10:45:58', '2021-12-29 10:45:58', 'a80b0bbf-2494-4374-9da8-52b268b3fcea'),
(3, 3, 2, '2021-12-29 10:46:07', '2021-12-29 10:46:07', '668cfbda-c683-4ee3-af41-6edbee22e0a5'),
(4, 4, 2, '2021-12-29 10:46:22', '2021-12-29 10:46:22', 'f497bb85-9a39-411c-9d8c-8a539e1c04c5'),
(5, 5, 2, '2021-12-29 10:46:28', '2021-12-29 10:46:28', '575fc8c8-345f-4314-a9d7-f8516fae0dab'),
(6, 6, 2, '2021-12-29 10:46:44', '2021-12-29 10:46:44', 'f90ae972-415a-4820-aa36-a8c70d740098'),
(7, 7, 2, '2021-12-29 10:46:51', '2021-12-29 10:46:51', '5dcec749-c5a2-4ac3-be49-88ea2e63314a'),
(8, 8, 2, '2021-12-29 10:47:14', '2021-12-29 10:47:14', '83890fd9-956a-4d3e-bf8f-0fb8bff662e0'),
(9, 9, 2, '2021-12-29 10:47:20', '2021-12-29 10:47:20', '65fb2e87-66d4-42e2-bf29-4f05e7a7ce93'),
(10, 10, 2, '2021-12-29 10:47:24', '2021-12-29 10:47:24', 'c8bc3c69-7bab-4287-8eee-7979cdaab50f'),
(11, 11, 2, '2021-12-29 10:47:28', '2021-12-29 10:47:28', '37229495-7ff1-4d68-ba30-cd13d8b1bc50'),
(12, 12, 2, '2021-12-29 10:47:32', '2021-12-29 10:47:32', 'b86124e3-b8b4-48a4-b33e-c1e58d05a776'),
(13, 13, 2, '2021-12-29 10:48:00', '2021-12-29 10:48:00', '0bae176e-96a8-4bb5-a3b7-0e670e5ceab7'),
(14, 14, 2, '2021-12-29 10:48:04', '2021-12-29 10:48:04', 'd8589e02-1a11-4fe7-9426-03a52d92128d'),
(15, 15, 2, '2021-12-29 10:48:08', '2021-12-29 10:48:08', '51174e38-51aa-43bb-be93-d24050a5b09a'),
(16, 16, 2, '2021-12-29 10:48:12', '2021-12-29 10:48:12', 'd7bbf4ac-4317-403b-b2fb-4864b19fef7c'),
(17, 17, 2, '2021-12-29 10:48:16', '2021-12-29 10:48:16', 'a824c448-b796-4c88-a48b-991b6f2a9aad'),
(18, 18, 2, '2021-12-29 10:48:20', '2021-12-29 10:48:20', '928f66c2-b3e1-47af-900d-4c2be11ac0ad'),
(19, 19, 2, '2021-12-29 10:49:53', '2021-12-29 10:49:53', 'f825ad27-e758-4c54-9af2-55784b967d26'),
(20, 20, 2, '2021-12-29 10:49:57', '2021-12-29 10:49:57', '863ce35f-c3ad-4077-8111-8da2befbf691'),
(21, 21, 2, '2021-12-29 10:50:02', '2021-12-29 10:50:02', '25e5f6c6-6a8c-4042-be02-1eb3564fb218'),
(22, 22, 2, '2021-12-29 10:50:05', '2021-12-29 10:50:05', 'd347266b-acd9-4abf-b615-27bbc8fd41fd'),
(23, 23, 2, '2021-12-29 10:50:09', '2021-12-29 10:50:09', '8114953a-3a41-4588-b99b-ad4af0e3f47b'),
(24, 24, 2, '2021-12-29 10:50:13', '2021-12-29 10:50:13', '09d38fbc-8747-4404-91e5-4707745f955d'),
(25, 25, 2, '2021-12-29 10:50:17', '2021-12-29 10:50:17', 'a2231a7c-49e6-4f30-962c-acfd4518088a'),
(26, 26, 2, '2021-12-29 10:50:21', '2021-12-29 10:50:21', 'aaab4ad3-aad5-47fb-be61-daf3c59c625c'),
(27, 30, 2, '2021-12-29 10:50:26', '2021-12-29 10:50:26', '7c849b60-b401-4420-b454-57a9d95d986d'),
(28, 40, 2, '2021-12-29 10:50:30', '2021-12-29 10:50:30', '071ee4e4-f542-4e28-88f2-248fe104fdc2');

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
-- Table structure for table `identitas_koperasi`
--

CREATE TABLE `identitas_koperasi` (
  `id` int(11) NOT NULL,
  `nama_koperasi` varchar(100) DEFAULT NULL,
  `nama_pimpinan` varchar(100) DEFAULT NULL,
  `no_hp` varchar(100) DEFAULT NULL,
  `no_telp` varchar(100) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `identitas_koperasi`
--

INSERT INTO `identitas_koperasi` (`id`, `nama_koperasi`, `nama_pimpinan`, `no_hp`, `no_telp`, `alamat`, `kota`, `email`, `website`, `created_at`, `updated_at`, `uuid`) VALUES
(1, 'KOPERASI SP1', 'saya', NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-27 14:53:29', '2021-12-27 15:32:18', 'rf245137-156c-4811-gg16-8f0f224e0b54');

-- --------------------------------------------------------

--
-- Table structure for table `jenispinjaman`
--

CREATE TABLE `jenispinjaman` (
  `id` int(11) NOT NULL,
  `nama_jenis` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenispinjaman`
--

INSERT INTO `jenispinjaman` (`id`, `nama_jenis`, `created_at`, `updated_at`, `uuid`) VALUES
(1, 'Pinjaman Anggota', '2021-12-07 14:08:23', '2021-12-07 14:08:23', 'c0f5e24a-5fe9-4e8e-9088-726c21230513'),
(2, 'Pinjaman Anggota Bunga Menurun', '2021-12-07 14:08:48', '2021-12-07 14:08:48', '8e7ffe0c-7870-42b6-b255-6d1b50addce7'),
(3, 'Pinjaman dengan Perhitungan Bunga diawal', '2021-12-07 14:09:31', '2021-12-07 14:09:31', '4e89a731-75d1-40c9-9580-9808881ad354');

-- --------------------------------------------------------

--
-- Table structure for table `jenissimpanan`
--

CREATE TABLE `jenissimpanan` (
  `id` int(11) NOT NULL,
  `kode_jenis` varchar(10) NOT NULL,
  `nama_jenis` varchar(100) NOT NULL,
  `posisi` varchar(10) NOT NULL,
  `rekening_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenissimpanan`
--

INSERT INTO `jenissimpanan` (`id`, `kode_jenis`, `nama_jenis`, `posisi`, `rekening_id`, `created_at`, `updated_at`, `uuid`) VALUES
(1, '01', 'SIMPANAN POKOK', 'K', 0, '2021-12-07 14:17:04', '2021-12-08 11:25:02', '6853245a-7c7c-439c-9de2-bcd25dcc9b35'),
(2, '02', 'SIMPANAN WAJIB', 'K', 0, '2021-12-07 14:17:22', '2021-12-08 11:25:15', 'ff5ad251-ee1c-4f05-a36b-b1f72bb7e375'),
(3, '03', 'SIMPANAN SUKARELA', 'K', 0, '2021-12-08 11:25:28', '2021-12-08 11:25:28', '1beb4224-15b2-41dc-aca0-8bf7a885f97c'),
(4, '04', 'SIMPANAN WAJIB KHUSUS', 'K', 0, '2021-12-08 11:25:44', '2021-12-08 11:25:44', 'ec1d05c9-22c0-4227-9306-1e7611f67b3b');

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
(23, 2, 'Kategori Berita', 'data-master/kategori', 4, '-', '2021-03-15 09:55:20', '2021-11-23 12:19:41', 'fae34c0f-93ea-43eb-ab5f-7c3dd7eb6d6d'),
(25, 2, 'Identitas Koperasi', 'data-master/identitas-koperasi', 5, '-', '2021-03-20 23:53:03', '2021-12-27 14:41:16', '28373d9d-7976-4029-b551-e5b9a8f8bc4c'),
(29, 0, 'Laporan', 'laporan', 8, 'fas fa-file', '2021-04-05 08:15:29', '2021-04-16 10:19:14', 'f599224b-1d9e-4e59-9acd-a3560904446b'),
(59, 10, 'Administrator', 'user/admin', 1, '-', '2021-08-24 11:18:21', '2021-12-28 11:02:41', '23c192a1-ac0a-4291-a6a2-0f894beb57cf'),
(80, 0, 'Anggota Koperasi', 'anggota-koperasi', 2, 'fa fa-users', '2021-12-07 09:28:22', '2021-12-07 09:28:48', 'f40d634f-c25e-4364-8405-67105c4f5dd6'),
(81, 2, 'Agama', 'data-master/agama', 1, '-', '2021-12-07 11:14:42', '2021-12-07 11:14:42', 'f4a0942d-d377-49da-98bd-0b3a5b9a63d6'),
(82, 0, 'Pembayaran', 'pembayaran', 3, 'fa fa-credit-card', '2021-12-07 12:36:48', '2021-12-17 10:04:39', '66a6f428-90b6-4973-a546-9ae4aed0e600'),
(83, 0, 'Pinjaman', 'pinjaman', 5, 'fa fa-money-bill', '2021-12-07 12:37:29', '2021-12-20 15:15:49', '0b5dbfae-2ead-4378-afc7-edad62b07033'),
(84, 0, 'Simpanan', 'simpanan', 4, 'fa fa-cash-register', '2021-12-07 12:37:49', '2021-12-17 10:02:36', '76cb2bf3-a3b0-445a-8124-081e994c2d4e'),
(85, 2, 'Jenis Pinjaman', 'data-master/jenispinjaman', 2, '-', '2021-12-07 14:05:34', '2021-12-07 14:05:34', 'a1a9c542-2af1-4dfd-989d-107a4ae9bc55'),
(86, 2, 'Jenis Simpanan', 'data-master/jenissimpanan', 3, '-', '2021-12-07 14:15:10', '2021-12-07 14:15:10', 'e04f6c89-fb06-415f-b984-58c012febe8d'),
(87, 10, 'Anggota Koperasi', 'user/anggota', 2, '-', '2021-12-09 08:59:42', '2021-12-09 09:00:24', '8994254d-91e2-441e-b7de-f134add0748a'),
(89, 84, 'Data Simpanan', 'simpanan/perorangan', 2, '-', '2021-12-14 14:47:41', '2021-12-27 10:14:46', '3e01590f-9b28-4518-b805-1eb42147ccbc'),
(90, 84, 'Transaksi', 'simpanan/transaksi', 3, '-', '2021-12-14 15:05:54', '2021-12-14 15:26:18', '1a796439-60ad-4933-9826-4201377eb32d'),
(91, 84, 'Setoran/Penarikan Tunai', 'simpanan/tambah', 1, '-', '2021-12-14 15:07:51', '2021-12-27 10:22:00', '5ca50b1e-235e-4590-a8fe-b1759e58a1e9'),
(92, 84, 'Setoran Tunai', 'simpanan/setoran', 1, '-', '2021-12-27 10:15:48', '2021-12-27 10:15:48', 'b15dfe6a-e015-4671-96bc-fcd1c16d3ea0'),
(93, 84, 'Penarikan Tunai', 'simpanan/penarikan', 2, '-', '2021-12-27 10:16:26', '2021-12-27 10:16:26', '1c2442f7-d71f-4c64-96a9-833d68dc35e9'),
(94, 83, 'Data Pengajuan', 'pinjaman/data-pengajuan', 1, '-', '2021-12-28 10:22:06', '2021-12-28 10:22:06', '1b745480-3a42-46f4-a808-b2e3088c2679'),
(95, 83, 'Data Pinjaman', 'pinjaman/data-pinjaman', 2, '-', '2021-12-28 10:22:31', '2021-12-28 10:22:31', 'fbfcc328-51b5-48e4-9daa-7157fcf6d948'),
(96, 83, 'Bayar Angsuran', 'pinjaman/bayar-angsuran', 3, '-', '2021-12-28 10:23:08', '2021-12-28 10:23:08', '53f66723-c0d4-4285-a878-9f2e86f00ae4'),
(97, 2, 'Bunga Pinjaman', 'data-master/bungapinjaman', 6, '-', '2021-12-29 10:38:31', '2021-12-29 10:38:31', 'b7e78176-8404-436d-97d3-bb1464e2e769');

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
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id` int(11) NOT NULL,
  `anggota_id` int(11) NOT NULL,
  `no_urut` int(4) UNSIGNED ZEROFILL NOT NULL,
  `no_pinjaman` varchar(100) NOT NULL,
  `jenispinjaman_id` int(11) NOT NULL,
  `tgl_pinjaman` date NOT NULL,
  `jml_pinjaman` double NOT NULL,
  `angsuran_pokok` double NOT NULL,
  `bunga` double NOT NULL,
  `status_lunas` varchar(20) NOT NULL,
  `jumlah_angsuran` double NOT NULL,
  `jangka_waktu` int(11) NOT NULL,
  `tgl_jatuhtempo` date NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id` int(11) NOT NULL,
  `kode_rekening` varchar(10) NOT NULL,
  `nama_rekening` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 'Admin', '2021-03-06 13:07:17', '2021-03-06 13:07:17'),
(3, 'Anggota', '2021-12-09 08:58:43', '2021-12-09 08:59:09'),
(11, 'Kasir', '2021-12-23 12:45:16', '2021-12-28 08:19:10');

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
(147, 1, 59, '2021-11-22 15:55:34', '2021-11-22 15:55:34'),
(151, 1, 80, '2021-12-07 09:28:35', '2021-12-07 09:28:35'),
(152, 1, 81, '2021-12-07 11:14:58', '2021-12-07 11:14:58'),
(154, 1, 83, '2021-12-07 12:38:07', '2021-12-07 12:38:07'),
(155, 1, 84, '2021-12-07 12:38:13', '2021-12-07 12:38:13'),
(156, 1, 85, '2021-12-07 14:05:52', '2021-12-07 14:05:52'),
(157, 1, 86, '2021-12-07 14:15:24', '2021-12-07 14:15:24'),
(158, 1, 87, '2021-12-09 08:59:57', '2021-12-09 08:59:57'),
(160, 1, 89, '2021-12-14 14:47:56', '2021-12-14 14:47:56'),
(161, 1, 90, '2021-12-14 15:06:12', '2021-12-14 15:06:12'),
(162, 1, 91, '2021-12-14 15:08:23', '2021-12-14 15:08:23'),
(163, 2, 1, '2021-12-20 15:12:27', '2021-12-20 15:12:27'),
(164, 2, 2, '2021-12-20 15:12:35', '2021-12-20 15:12:35'),
(165, 2, 10, '2021-12-20 15:12:50', '2021-12-20 15:12:50'),
(166, 2, 59, '2021-12-20 15:13:06', '2021-12-20 15:13:06'),
(167, 2, 80, '2021-12-20 15:13:13', '2021-12-20 15:13:13'),
(168, 2, 81, '2021-12-20 15:13:23', '2021-12-20 15:13:23'),
(169, 2, 82, '2021-12-20 15:13:32', '2021-12-20 15:13:32'),
(170, 2, 83, '2021-12-20 15:13:42', '2021-12-20 15:13:42'),
(171, 2, 84, '2021-12-20 15:13:51', '2021-12-20 15:13:51'),
(172, 2, 85, '2021-12-20 15:14:12', '2021-12-20 15:14:12'),
(173, 2, 86, '2021-12-20 15:14:18', '2021-12-20 15:14:18'),
(174, 2, 87, '2021-12-20 15:14:34', '2021-12-20 15:14:34'),
(175, 2, 89, '2021-12-20 15:14:46', '2021-12-20 15:14:46'),
(176, 2, 90, '2021-12-20 15:14:53', '2021-12-20 15:14:53'),
(177, 2, 91, '2021-12-20 15:15:01', '2021-12-20 15:15:01'),
(178, 1, 25, '2021-12-27 14:41:37', '2021-12-27 14:41:37'),
(179, 2, 25, '2021-12-27 14:41:47', '2021-12-27 14:41:47'),
(180, 1, 29, '2021-12-27 16:07:24', '2021-12-27 16:07:24'),
(181, 2, 29, '2021-12-27 16:07:38', '2021-12-27 16:07:38'),
(182, 1, 94, '2021-12-28 10:23:32', '2021-12-28 10:23:32'),
(183, 1, 95, '2021-12-28 10:23:41', '2021-12-28 10:23:41'),
(184, 1, 96, '2021-12-28 10:23:47', '2021-12-28 10:23:47'),
(185, 2, 94, '2021-12-28 10:24:03', '2021-12-28 10:24:03'),
(186, 2, 95, '2021-12-28 10:24:11', '2021-12-28 10:24:11'),
(187, 2, 96, '2021-12-28 10:24:17', '2021-12-28 10:24:17'),
(188, 1, 97, '2021-12-29 10:38:49', '2021-12-29 10:38:49'),
(189, 2, 97, '2021-12-29 10:38:58', '2021-12-29 10:38:58');

-- --------------------------------------------------------

--
-- Table structure for table `saldo_simpanan_harian`
--

CREATE TABLE `saldo_simpanan_harian` (
  `id` int(11) NOT NULL,
  `anggota_id` int(11) NOT NULL,
  `simpanan_id` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `jenissimpanan_id` int(11) NOT NULL,
  `saldo` float NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saldo_simpanan_harian`
--

INSERT INTO `saldo_simpanan_harian` (`id`, `anggota_id`, `simpanan_id`, `tgl_transaksi`, `jenissimpanan_id`, `saldo`, `created_at`, `updated_at`, `uuid`) VALUES
(1, 2, 13, '2021-12-23', 1, 1000000, '2021-12-23 02:50:45', '2021-12-23 02:50:45', 'e5f0e718-95e7-456a-8e4c-99c4af86c3ac'),
(2, 4, 14, '2021-12-23', 1, 50000, '2021-12-23 03:10:25', '2021-12-23 03:10:25', '51cd48a3-a5bd-4142-9522-3fa1f32765a3'),
(4, 2, 16, '2021-12-23', 1, 500000, '2021-12-23 03:27:07', '2021-12-23 03:27:07', 'b625339b-f0e0-4a5d-ae31-24b6fbd07eeb'),
(6, 2, 18, '2021-12-24', 1, 100000, '2021-12-24 03:20:51', '2021-12-24 03:20:51', '958aea4e-416a-4c92-9529-b8eb6998e04c'),
(7, 2, 19, '2021-12-24', 1, 0, '2021-12-24 03:21:35', '2021-12-24 03:21:35', 'cf9618f8-4091-4a9e-be39-bf8ad86a83f2'),
(8, 2, 20, '2021-12-24', 1, 1000000, '2021-12-24 03:25:10', '2021-12-24 03:25:10', '1d6683a3-f4b6-4548-a45e-63722321238f'),
(9, 2, 21, '2021-12-24', 1, 0, '2021-12-24 03:26:04', '2021-12-24 03:26:04', 'acd2a53e-e97c-42be-8e83-b358496a300b'),
(10, 2, 22, '2021-12-24', 1, 100000, '2021-12-24 03:27:56', '2021-12-24 03:27:56', 'd1a4512c-6461-4f7e-947d-3dd7e04cbb57'),
(11, 2, 23, '2021-12-27', 1, 700000, '2021-12-27 00:27:49', '2021-12-27 00:27:49', '5663df5e-6d8b-4bd2-893e-0f461f612c97'),
(13, 2, 25, '2021-12-27', 1, 790000, '2021-12-27 07:37:47', '2021-12-27 07:37:47', '98d495db-481e-485d-840f-06034957fa9d'),
(14, 4, 26, '2021-12-27', 1, 150000, '2021-12-27 07:39:05', '2021-12-27 07:39:05', '38545dd9-de57-4cb7-ac3c-ebf80b940432'),
(15, 4, 27, '2021-12-29', 1, 1150000, '2021-12-29 14:46:39', '2021-12-29 14:46:39', '598b9539-9df9-48a7-881e-fd2b95afc0b0'),
(16, 2, 28, '2022-01-03', 1, 890000, '2022-01-03 08:45:10', '2022-01-03 08:45:10', '202a8e15-a080-484b-bff3-e495c8a63a07'),
(17, 2, 29, '2022-01-03', 2, 1000000, '2022-01-03 16:26:37', '2022-01-03 16:26:37', '56cf0111-de86-4db5-a8d1-ca2cfcb0118d'),
(18, 2, 30, '2022-01-03', 1, 990000, '2022-01-03 16:27:54', '2022-01-03 16:27:54', '823ffe82-4aee-468b-ba31-a6101a25467d');

-- --------------------------------------------------------

--
-- Table structure for table `simpanan`
--

CREATE TABLE `simpanan` (
  `id` int(11) NOT NULL,
  `anggota_id` int(11) NOT NULL,
  `no_urut` int(4) UNSIGNED ZEROFILL NOT NULL,
  `no_transaksi` varchar(100) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `jenis_transaksi` varchar(50) NOT NULL,
  `jenissimpanan_id` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `jumlah` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `simpanan`
--

INSERT INTO `simpanan` (`id`, `anggota_id`, `no_urut`, `no_transaksi`, `tgl_transaksi`, `jenis_transaksi`, `jenissimpanan_id`, `keterangan`, `jumlah`, `user_id`, `created_at`, `updated_at`, `uuid`) VALUES
(13, 2, 0001, 'SA-06/2021/0001', '2021-12-23', 'kredit', 1, 'Saldo awal, Nanang', 1000000, 1, '2021-12-23 02:50:45', '2021-12-23 02:50:45', 'c4875123-93e9-4772-8f2e-e2447f70ccf2'),
(14, 4, 0002, 'SA-06/2021/0002', '2021-12-23', 'kredit', 1, 'SIMPANAN POKOK, Haruka', 50000, 1, '2021-12-23 03:10:25', '2021-12-23 03:10:25', '64b65650-20cd-4ebe-973e-f95957b8180a'),
(16, 2, 0004, 'SA-06/2021/0004', '2021-12-21', 'debit', 1, 'Penarikan SIMPANAN POKOK, Nanang', 500000, 1, '2021-12-23 03:27:07', '2021-12-23 03:27:07', 'f7ef2627-39ff-4023-88da-70bbb0493563'),
(18, 2, 0005, 'SA-06/2021/0005', '2021-12-24', 'debit', 1, 'SIMPANAN POKOK, Nanang', 400000, 1, '2021-12-24 03:20:51', '2021-12-24 03:20:51', '8ce11e1f-d927-4e97-b83a-cef8b31d1dde'),
(19, 2, 0006, 'SA-06/2021/0006', '2021-12-24', 'debit', 1, 'SIMPANAN POKOK, Nanang', 100000, 1, '2021-12-24 03:21:35', '2021-12-24 03:21:35', 'a11e13d5-5056-4c80-974a-b41254fed835'),
(20, 2, 0007, 'SA-06/2021/0007', '2021-12-24', 'kredit', 1, 'SIMPANAN POKOK, Nanang', 1000000, 1, '2021-12-24 03:25:10', '2021-12-24 03:25:10', '69da91fe-7553-461e-bd58-fc312e78212b'),
(21, 2, 0008, 'SA-06/2021/0008', '2021-12-24', 'debit', 1, 'SIMPANAN POKOK, Nanang', 1000000, 1, '2021-12-24 03:26:04', '2021-12-24 03:26:04', 'ef020cb3-115e-4c97-9432-cc23e5bb4681'),
(22, 2, 0009, 'SA-06/2021/0009', '2021-12-24', 'kredit', 1, 'SIMPANAN POKOK, Nanang', 100000, 1, '2021-12-24 03:27:56', '2021-12-24 03:27:56', 'dc04ad27-ba2d-4f2d-b3eb-3a50a3ec9c97'),
(23, 2, 0010, 'SA-06/2021/0010', '2021-12-27', 'kredit', 1, 'SIMPANAN POKOK, Nanang', 600000, 1, '2021-12-27 00:27:49', '2021-12-27 00:27:49', '048590ea-5029-458f-b1aa-3603a4255f86'),
(25, 2, 0011, 'SA-06/2021/0011', '2021-12-27', 'kredit', 1, 'SIMPANAN POKOK, Nanang', 90000, 1, '2021-12-27 07:37:47', '2021-12-27 07:37:47', 'dd1fdc8c-0981-4ac4-b1de-2d94a6c5ed1c'),
(26, 4, 0012, 'SA-06/2021/0012', '2021-12-27', 'kredit', 1, 'SIMPANAN POKOK, Haruka', 100000, 1, '2021-12-27 07:39:05', '2021-12-27 07:39:05', '032106bd-2925-436a-b13c-2d35fc93fcc8'),
(27, 4, 0013, 'SA-06/2021/0013', '2021-12-29', 'kredit', 1, 'SIMPANAN POKOK, Haruka', 1000000, 1, '2021-12-29 14:46:39', '2021-12-29 14:46:39', '64cfc9a4-d97f-4bfa-81c1-1f7a6bdf3c31'),
(28, 2, 0001, 'SA-06/2022/0001', '2022-01-03', 'kredit', 1, 'SIMPANAN POKOK, Nanang', 100000, 1, '2022-01-03 08:45:10', '2022-01-03 08:45:10', 'a6e18667-b045-4358-9e3b-16dc6d556cbd'),
(29, 2, 0002, 'SA-06/2022/0002', '2022-01-03', 'kredit', 2, 'SIMPANAN WAJIB, Nanang22', 1000000, 1, '2022-01-03 16:26:37', '2022-01-03 16:26:37', '9caf6a69-dfc9-4868-b838-20f5c6529153'),
(30, 2, 0003, 'SA-06/2022/0003', '2022-01-03', 'kredit', 1, 'SIMPANAN POKOK, Nanang22', 100000, 1, '2022-01-03 16:27:54', '2022-01-03 16:27:54', 'b3b0c3d5-5926-4196-8b1f-f9c5ec2d74a4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `anggota_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(5) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `verifikasi` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_verifikasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `last_login_ip` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `anggota_id`, `name`, `no_hp`, `email`, `role_id`, `password`, `remember_token`, `is_active`, `email_verified_at`, `verifikasi`, `kode_verifikasi`, `photo`, `last_login_at`, `last_login_ip`, `created_at`, `updated_at`, `uuid`) VALUES
(1, 0, 'Nanang Maulana Syarif', '085266972611', 'nanang.ms22@gmail.com', 1, '$2y$10$KTSdgTewtWzw5OGRWb/1GelkmHNTu1ywECfD/2dGolWt7w0kvJSbO', 'br3WaEa1UXlZYuJcbidTZEkCoTD1H1HfBvPMaMhNweRT8si16OtmQUTomMy5', 'Y', NULL, 'Y', NULL, 'Nanang_Maulana_Syarif_sDL27.png', '2022-01-12 00:28:17', '127.0.0.1', '2021-02-27 03:42:29', '2022-01-12 00:28:17', '745bddb6-05b3-4cd0-9b93-6db3bcfda1a4'),
(24, 0, 'Admin', '-', 'admin@gmail.com', 2, '$2y$10$0yW6EiqJW4150zYU9t/4UOpl5cSvMgzx41fUWWOpVXP0uLS.pjSOq', NULL, 'Y', NULL, 'Y', NULL, NULL, NULL, NULL, '2021-06-27 12:18:42', '2021-11-16 08:58:54', '745bddb6-03c8-4cd0-9b93-6db3bcfda1a4'),
(54, 2, 'Nanang', '213131', 'conan.getrich@gmail.com', 3, '$2y$10$TCjQEasZkv3W13zoKw16Je4TZ65BY7KxRaopXCaR11DXd9qw.mjOG', NULL, 'Y', NULL, 'Y', NULL, NULL, '2021-12-09 09:47:49', '127.0.0.1', '2021-12-09 09:31:06', '2021-12-28 09:26:06', 'd9d103a8-57a6-4f1b-81ed-29d0c274ac83');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_anggota` (`no_anggota`);

--
-- Indexes for table `bunga_pinjaman`
--
ALTER TABLE `bunga_pinjaman`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `identitas_koperasi`
--
ALTER TABLE `identitas_koperasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenispinjaman`
--
ALTER TABLE `jenispinjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenissimpanan`
--
ALTER TABLE `jenissimpanan`
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
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `saldo_simpanan_harian`
--
ALTER TABLE `saldo_simpanan_harian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `simpanan`
--
ALTER TABLE `simpanan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_transaksi` (`no_transaksi`),
  ADD KEY `anggota_id` (`anggota_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `anggota_id` (`anggota_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bunga_pinjaman`
--
ALTER TABLE `bunga_pinjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
-- AUTO_INCREMENT for table `identitas_koperasi`
--
ALTER TABLE `identitas_koperasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jenispinjaman`
--
ALTER TABLE `jenispinjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenissimpanan`
--
ALTER TABLE `jenissimpanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `role_menu`
--
ALTER TABLE `role_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `saldo_simpanan_harian`
--
ALTER TABLE `saldo_simpanan_harian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `simpanan`
--
ALTER TABLE `simpanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `simpanan`
--
ALTER TABLE `simpanan`
  ADD CONSTRAINT `simpanan_ibfk_1` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
