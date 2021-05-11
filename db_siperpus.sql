-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 06, 2021 at 01:42 PM
-- Server version: 8.0.23-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siperpus`
--
CREATE DATABASE IF NOT EXISTS `db_siperpus` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_siperpus`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `kd_inventaris` bigint NOT NULL,
  `judul_buku` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `pengarang` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `isbn` text COLLATE utf8mb4_general_ci NOT NULL,
  `penerbit` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `thn_terbit` char(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_klasifikasi` char(4) COLLATE utf8mb4_general_ci NOT NULL,
  `jml_hlm` char(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `qrcode` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sampul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'placeholder.jpg',
  `stok` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`kd_inventaris`, `judul_buku`, `pengarang`, `isbn`, `penerbit`, `thn_terbit`, `id_klasifikasi`, `jml_hlm`, `qrcode`, `sampul`, `stok`) VALUES
(1, 'PEMROGRAMAN WEB DASAR', 'RINTHO, RANTE, RERUNG', '9786028519939', 'CV.ABATA INDO', '2020', '600', '230+xii', 'd11d9d8dda27f69ccf31060d398a7403.png', 'd11d9d8dda27f69ccf31060d398a7403.jpg', 10),
(2, 'PEMROGRAMAN JAVA DASAR', 'HERI AGUNG, RIZAL GERUNG', '9287028113451', 'CV.ABATA INDO', '2021', '600', '140+xi', '5d535d5a4b50eaaa669ebe746513f927.png', '5d535d5a4b50eaaa669ebe746513f927.jpg', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tb_klasifikasi`
--

CREATE TABLE `tb_klasifikasi` (
  `id_klasifikasi` char(4) COLLATE utf8mb4_general_ci NOT NULL,
  `klasifikasi` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_klasifikasi`
--

INSERT INTO `tb_klasifikasi` (`id_klasifikasi`, `klasifikasi`) VALUES
('000', 'KARYA UMUM'),
('100', 'ILMU FILSAFAT, PSIKOLOGI, PARAPSIKOLOGI, OKULTISME'),
('200', 'AGAMA'),
('300', 'ILMU-ILMU SOSIAL'),
('400', 'BAHASA'),
('500', 'ILMU-ILMU MURNI'),
('600', 'TEKNOLOGI (ILMU TERAPAN)'),
('700', 'KESENIAN DAN SENI DEKORASI'),
('800', 'KESUSTRAAN'),
('900', 'GEOGRAFI UMUM DAN SEJARAH UMUM');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kunjungan`
--

CREATE TABLE `tb_kunjungan` (
  `id_kunjungan` bigint NOT NULL,
  `nis` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_kunjungan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kunjungan`
--

INSERT INTO `tb_kunjungan` (`id_kunjungan`, `nis`, `tgl_kunjungan`) VALUES
(1, '000001', '2021-04-16'),
(2, '000001', '2021-04-16'),
(3, '000006', '2021-04-16'),
(4, '000006', '2021-04-16'),
(5, '000006', '2021-04-16'),
(6, '000006', '2021-04-16'),
(7, '000006', '2021-04-16'),
(8, '000006', '2021-04-16'),
(9, '000006', '2021-04-16'),
(10, '000006', '2021-04-16'),
(11, '000006', '2021-04-16'),
(12, '000006', '2021-04-16'),
(13, '000006', '2021-04-16'),
(14, '000006', '2021-04-16'),
(15, '000001', '2021-04-16'),
(16, '000001', '2021-04-16'),
(17, '000001', '2021-04-16'),
(18, '000001', '2021-04-16'),
(19, '000001', '2021-04-16'),
(20, '000001', '2021-04-16'),
(21, '000006', '2021-04-19'),
(22, '000006', '2021-04-19'),
(23, '000006', '2021-04-26'),
(24, '000006', '2021-04-26'),
(25, '000006', '2021-04-26'),
(26, '000006', '2021-04-26'),
(27, '000006', '2021-04-26'),
(28, '000006', '2021-04-26'),
(29, '000006', '2021-04-26'),
(30, '000006', '2021-04-26'),
(31, '000003', '2021-04-27'),
(32, '000003', '2021-04-27'),
(33, '000003', '2021-04-27'),
(34, '000003', '2021-04-27'),
(35, '000003', '2021-04-27'),
(36, '000006', '2021-04-27'),
(37, '000006', '2021-04-27'),
(38, '000006', '2021-04-27'),
(39, '000006', '2021-04-27'),
(40, '000006', '2021-04-27'),
(41, '000006', '2021-04-27'),
(42, '000006', '2021-04-27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman_detail`
--

CREATE TABLE `tb_peminjaman_detail` (
  `kd_peminjaman_detail` bigint NOT NULL,
  `kd_peminjaman_header` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `kd_inventaris` bigint NOT NULL,
  `kd_perpanjangan` int DEFAULT NULL,
  `jml_pinjam` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_peminjaman_detail`
--

INSERT INTO `tb_peminjaman_detail` (`kd_peminjaman_detail`, `kd_peminjaman_header`, `kd_inventaris`, `kd_perpanjangan`, `jml_pinjam`) VALUES
(1, 'PM-20210429060609', 1, NULL, 1),
(2, 'PM-20210429060609', 2, NULL, 1),
(3, 'PM-20210429060699', 2, NULL, 1),
(4, 'PM-20210429060611', 1, NULL, 1),
(5, 'PM-20210429060611', 2, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman_header`
--

CREATE TABLE `tb_peminjaman_header` (
  `kd_peminjaman_header` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nis` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` enum('Sudah Kembali','Belum Kembali','Perpanjangan') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `denda` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_peminjaman_header`
--

INSERT INTO `tb_peminjaman_header` (`kd_peminjaman_header`, `nis`, `tgl_pinjam`, `tgl_kembali`, `status`, `denda`) VALUES
('PM-20210429060609', '000005', '2021-04-26', '2021-04-28', 'Sudah Kembali', 500),
('PM-20210429060611', '000001', '2021-05-01', '2021-05-03', 'Belum Kembali', 0),
('PM-20210429060699', '000006', '2021-04-27', '2021-04-29', 'Sudah Kembali', 2500);

-- --------------------------------------------------------

--
-- Table structure for table `tb_perpanjangan`
--

CREATE TABLE `tb_perpanjangan` (
  `kd_perpanjangan` int NOT NULL,
  `tgl_perpanjangan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id_role` int NOT NULL,
  `role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'Siswa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `nis` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `kelas` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '-',
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_lengkap` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `login_hash` int NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'placeholder.jpg',
  `qrcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `log` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`nis`, `kelas`, `username`, `nama_lengkap`, `tgl_lahir`, `alamat`, `password`, `login_hash`, `foto`, `qrcode`, `log`) VALUES
('000001', 'XII-IPA1', '000001', 'BAGAS PAMUNGKAS', '1905-05-05', 'PEKALONGAN', '$2y$10$llG0JC3lAuZu0th397f6seF2InGmQEaOzs4JXghM7fKBD7Zdc9vFW', 2, '04fc711301f3c784d66955d98d399afb.png', '000001.png', '2021-04-26 08:38:17'),
('000003', 'XII-IPA1', '000003', 'FATIH AL IKHSAN', '1998-05-02', 'PERUMAHAN GRIYA PERMAI C.33', '$2y$10$aUHtUpkdFFM8LRtvZQR9z.LL37hZhdtkD7.j8YV7vEe1C4n5N9F0q', 2, 'f7a5c99c58103f6b65c451efd0f81826.jpg', '000003.png', '2021-04-27 04:32:34'),
('000005', 'XII-IPA1', '000005', 'SOLEH SOLIHUN', '1998-07-03', 'PEKALONGAN, PODOSUGIH', '$2y$10$Xk7CL78o1MK1Cb/Y4ipYpOiSm9BdGUVyHdmAAxP7ahJZwubu.IuIe', 2, 'b69b712f7bd6757ddcda59959c89a2b1.png', '000005.png', '2021-04-27 04:24:10'),
('000006', 'XII-IPA1', '000006', 'CHEALSEA OLIVIA', '1999-04-16', 'PEKALONGAN, PODOSUGIH', '$2y$10$AF7.ihRVq.C8VgtNdne.AeeSNbAnuzRX/CbTw2fu6sq1H2AC5am1S', 2, '58b2c53441a9db19e159bec686d685d8.png', '000006.png', '2021-05-06 06:18:05'),
('999999', 'PETUGAS', '999999', 'ALEX PORAT', '1999-05-02', 'PERUMAHAN GRIYA TIRTO PERMAI B.44', '$2y$10$Fizy4MpubET5ikr1tPb3qOHUkS0pzwO7X8XC4ACqglIDCb21hc8X2', 1, '52c69e3a57331081823331c4e69d3f2e.jpg', '999999.png', '2021-05-06 04:16:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`kd_inventaris`),
  ADD KEY `tb_buku_ibfk_1` (`id_klasifikasi`);

--
-- Indexes for table `tb_klasifikasi`
--
ALTER TABLE `tb_klasifikasi`
  ADD PRIMARY KEY (`id_klasifikasi`),
  ADD KEY `id_klasifikasi` (`id_klasifikasi`);

--
-- Indexes for table `tb_kunjungan`
--
ALTER TABLE `tb_kunjungan`
  ADD PRIMARY KEY (`id_kunjungan`),
  ADD KEY `tb_kunjungan_ibfk_1` (`nis`);

--
-- Indexes for table `tb_peminjaman_detail`
--
ALTER TABLE `tb_peminjaman_detail`
  ADD PRIMARY KEY (`kd_peminjaman_detail`),
  ADD KEY `tb_peminjaman_detail_ibfk_2` (`kd_inventaris`),
  ADD KEY `tb_peminjaman_detail_ibfk_3` (`kd_perpanjangan`),
  ADD KEY `tb_peminjaman_detail_ibfk_4` (`kd_peminjaman_header`);

--
-- Indexes for table `tb_peminjaman_header`
--
ALTER TABLE `tb_peminjaman_header`
  ADD PRIMARY KEY (`kd_peminjaman_header`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `tb_perpanjangan`
--
ALTER TABLE `tb_perpanjangan`
  ADD PRIMARY KEY (`kd_perpanjangan`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `login_hash` (`login_hash`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `kd_inventaris` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12321312313;

--
-- AUTO_INCREMENT for table `tb_kunjungan`
--
ALTER TABLE `tb_kunjungan`
  MODIFY `id_kunjungan` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tb_peminjaman_detail`
--
ALTER TABLE `tb_peminjaman_detail`
  MODIFY `kd_peminjaman_detail` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_perpanjangan`
--
ALTER TABLE `tb_perpanjangan`
  MODIFY `kd_perpanjangan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`login_hash`) REFERENCES `tb_role` (`id_role`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;