-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2022 at 02:02 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_warga_bonsar`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota_keluarga`
--

CREATE TABLE `anggota_keluarga` (
  `id_anggota` int(11) NOT NULL,
  `id_warga` int(11) NOT NULL,
  `id_keluarga` int(11) NOT NULL,
  `hubungan_keluarga` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota_keluarga`
--

INSERT INTO `anggota_keluarga` (`id_anggota`, `id_warga`, `id_keluarga`, `hubungan_keluarga`, `created_at`, `updated_at`) VALUES
(1, 15, 3, 'SUAMI', '2022-11-24 05:46:13', '2022-11-24 05:46:13'),
(3, 16, 3, 'ISTRI', '2022-11-24 06:43:54', '2022-11-24 06:43:54');

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
--

CREATE TABLE `keluarga` (
  `id_keluarga` int(11) NOT NULL,
  `id_warga` int(11) NOT NULL,
  `no_kk` varchar(255) NOT NULL,
  `alamat_keluarga` text NOT NULL,
  `desa_kelurahan_keluarga` varchar(50) NOT NULL,
  `kecamatan_keluarga` varchar(50) NOT NULL,
  `kabupaten_kota_keluarga` varchar(50) NOT NULL,
  `provinsi_keluarga` varchar(50) NOT NULL,
  `negara_keluarga` varchar(50) NOT NULL,
  `rt_keluarga` varchar(30) NOT NULL,
  `rw_keluarga` varchar(30) NOT NULL,
  `kode_pos_keluarga` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keluarga`
--

INSERT INTO `keluarga` (`id_keluarga`, `id_warga`, `no_kk`, `alamat_keluarga`, `desa_kelurahan_keluarga`, `kecamatan_keluarga`, `kabupaten_kota_keluarga`, `provinsi_keluarga`, `negara_keluarga`, `rt_keluarga`, `rw_keluarga`, `kode_pos_keluarga`, `created_at`, `updated_at`) VALUES
(3, 15, '0531602200400002	', 'Kebonsari', 'Baros', 'Cimahi Tengah', 'Cimahi', 'Jawa Barat', 'Indonesia', '001', '06', '4040', '2022-11-23 16:10:01', '2022-11-23 16:10:01');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_list`
--

CREATE TABLE `schedule_list` (
  `id` int(30) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `title`, `description`, `start_datetime`, `end_datetime`) VALUES
(6, 'Ronda 1', 'Ronda 1', '2022-11-28 01:09:00', '2022-11-28 04:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `username_user` varchar(255) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username_user`, `password_user`, `email_user`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'adminkebonsari06@gmail.com', 'admin', '2022-11-21 03:23:38', '2022-11-21 03:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `warga`
--

CREATE TABLE `warga` (
  `id_warga` int(11) NOT NULL,
  `nik_warga` varchar(255) NOT NULL,
  `nama_warga` varchar(255) NOT NULL,
  `tempat_lahir_warga` varchar(255) NOT NULL,
  `tanggal_lahir_warga` date NOT NULL,
  `jenis_kelamin_warga` enum('L','P') NOT NULL,
  `alamat_ktp_warga` text NOT NULL,
  `alamat_warga` text NOT NULL,
  `desa_kelurahan_warga` varchar(255) NOT NULL,
  `kecamatan_warga` varchar(255) NOT NULL,
  `kabupaten_kota_warga` varchar(255) NOT NULL,
  `provinsi_warga` varchar(255) NOT NULL,
  `negara_warga` varchar(255) NOT NULL,
  `rt_warga` varchar(10) NOT NULL,
  `rw_warga` varchar(10) NOT NULL,
  `agama_warga` varchar(255) NOT NULL,
  `pendidikan_terakhir_warga` varchar(255) NOT NULL,
  `pekerjaan_warga` varchar(255) NOT NULL,
  `status_perkawinan_warga` enum('Kawin','Belum Kawin') NOT NULL,
  `status_warga` enum('Tetap','Kontrak') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `warga`
--

INSERT INTO `warga` (`id_warga`, `nik_warga`, `nama_warga`, `tempat_lahir_warga`, `tanggal_lahir_warga`, `jenis_kelamin_warga`, `alamat_ktp_warga`, `alamat_warga`, `desa_kelurahan_warga`, `kecamatan_warga`, `kabupaten_kota_warga`, `provinsi_warga`, `negara_warga`, `rt_warga`, `rw_warga`, `agama_warga`, `pendidikan_terakhir_warga`, `pekerjaan_warga`, `status_perkawinan_warga`, `status_warga`, `created_at`, `updated_at`) VALUES
(15, '093453463', 'Ahmad Gunawan', 'Sungai Liat', '1966-01-09', 'L', 'Pasanggrahan', 'Kebonsari', 'Baros', 'Cimahi Tengah', 'Cimahi', 'Jawa Barat', 'Indonesia', '001', '006', 'Islam', 'D3', 'Pegawai Swasta', 'Kawin', 'Tetap', '2022-11-23 14:45:34', '2022-11-23 14:45:34'),
(16, '43654645', 'Dini mitarsih', 'Gombong', '1976-02-08', 'P', 'Pasanggrahan', 'Kebonsari', 'Baros', 'Cimahi Tengah', 'Cimahi', 'Jawa Barat', 'Indonesia', '001', '006', 'Islam', 'SMA', 'Tidak Bekerja', 'Kawin', 'Tetap', '2022-11-23 14:49:35', '2022-11-23 14:49:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota_keluarga`
--
ALTER TABLE `anggota_keluarga`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `id_warga` (`id_warga`,`id_keluarga`),
  ADD KEY `id_keluarga` (`id_keluarga`);

--
-- Indexes for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`id_keluarga`),
  ADD KEY `id_penduduk` (`id_warga`);

--
-- Indexes for table `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`id_warga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota_keluarga`
--
ALTER TABLE `anggota_keluarga`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keluarga`
--
ALTER TABLE `keluarga`
  MODIFY `id_keluarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warga`
--
ALTER TABLE `warga`
  MODIFY `id_warga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota_keluarga`
--
ALTER TABLE `anggota_keluarga`
  ADD CONSTRAINT `anggota_keluarga_ibfk_1` FOREIGN KEY (`id_warga`) REFERENCES `warga` (`id_warga`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anggota_keluarga_ibfk_2` FOREIGN KEY (`id_keluarga`) REFERENCES `keluarga` (`id_keluarga`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD CONSTRAINT `keluarga_ibfk_1` FOREIGN KEY (`id_warga`) REFERENCES `warga` (`id_warga`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
