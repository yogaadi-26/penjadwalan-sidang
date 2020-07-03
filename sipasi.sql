-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2020 at 08:31 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, '181113928', '9bbc7e182ea74581692c32d7bfd0d077', 'user'),
(3, '181113929', '265031454676467c02209a3b162d51fe', 'user'),
(4, '181113930', '30c837936537b610237fbb36b8eb124e', 'user'),
(5, '181113931', '28cf89a2f7baf2e6fe58f55f551f8bfe', 'user'),
(6, '181113932', 'e7387c7e70b7003fa790e05009fce6a9', 'user'),
(7, '181113933', '6a7f8fdbd5c4caa7886a9e1d2a1fe6f5', 'user'),
(8, '181113934', '7ea91f942dc72c2b1f548bb3c1fc4b7f', 'user'),
(9, '181113935', '8121fc80f31d5785a29d1b1fc22cdd18', 'user'),
(10, '181113936', '2640518a452f3ab5701c0bafb63b2508', 'user'),
(11, '181113937', '50f6edcfb9e1af7c6381b54864f9177b', 'user'),
(12, '181113938', '1bbb7a1537ac0ca1d28188c72250dc4c', 'user'),
(13, '181113939', '502d91b80d7bc88553320b88657d222a', 'user'),
(14, '181113941', '1e7a770112b6ae9ee865e1892b3e38df', 'user'),
(15, '181113942', '5b7c6d5990d1d06fbb89a4ee588c7978', 'user'),
(16, '181113943', '3ba6dc66ad3d23eba0602886fc434e3c', 'user'),
(17, '181113944', 'e9be77543659b46ff59cd85a49ddd6f6', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `id_account`, `nama`, `gambar`) VALUES
(1, 1, 'Kepala Bengkel', 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `pembimbing`
--

CREATE TABLE `pembimbing` (
  `id` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembimbing`
--

INSERT INTO `pembimbing` (`id`, `nip`, `nama`, `email`) VALUES
(1, '20224071', 'Trimans Yogiana, S.Pd', 'trimans.yogiana@gmail.com'),
(2, '20224072', 'Rudi Haryadi, ST. M.Pd', 'rudigaries@gmail.com'),
(3, '20224073', 'Diky Ridwan, S.Kom', 'diky@gmail.com'),
(4, '20224074', 'Dodi Permana Hidayat, S.Pd', 'dodi.permana.h@gmail.com'),
(5, '20224075', 'Adi Setiadi, ST.', 'adi1238@gmail.com'),
(6, '20224076', 'Antoni Budiman, S.Pd', 'abanjar25@gmail.com'),
(7, '20224077', 'DR. Hj. Sri Prihatiningsih, MT.', 'ucisricimahi@gmail.com'),
(8, '20224078', 'Netty Amaliah, S.Pd', 'netty.febrian@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `sidang`
--

CREATE TABLE `sidang` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_penguji1` int(11) NOT NULL,
  `id_penguji2` int(11) NOT NULL,
  `id_tanggal` int(11) NOT NULL,
  `id_waktu` int(11) NOT NULL,
  `ruangan` enum('Lab Dasar','Lab Simulasi','Lab Aplikasi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sidang`
--

INSERT INTO `sidang` (`id`, `id_siswa`, `id_penguji1`, `id_penguji2`, `id_tanggal`, `id_waktu`, `ruangan`) VALUES
(1, 1, 2, 3, 1, 1, 'Lab Dasar'),
(2, 2, 1, 5, 1, 1, 'Lab Simulasi'),
(3, 3, 6, 8, 1, 1, 'Lab Aplikasi'),
(4, 4, 1, 5, 1, 2, 'Lab Simulasi'),
(5, 5, 2, 3, 1, 2, 'Lab Dasar'),
(6, 6, 1, 5, 1, 3, 'Lab Simulasi'),
(7, 7, 6, 8, 1, 2, 'Lab Aplikasi'),
(8, 8, 2, 3, 1, 3, 'Lab Dasar'),
(9, 9, 6, 8, 1, 3, 'Lab Aplikasi'),
(10, 10, 1, 5, 1, 4, 'Lab Simulasi'),
(11, 11, 6, 8, 1, 4, 'Lab Dasar'),
(17, 13, 2, 3, 1, 5, 'Lab Dasar'),
(18, 12, 1, 5, 1, 5, 'Lab Simulasi'),
(20, 14, 6, 8, 1, 4, 'Lab Aplikasi'),
(21, 15, 6, 8, 1, 5, 'Lab Aplikasi');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `id_pembimbing` int(11) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` enum('XIII-A','XIII-B') NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `id_account`, `id_pembimbing`, `nis`, `nama`, `kelas`, `status`, `gambar`) VALUES
(1, 2, 1, '181113928', 'Adelia Puspita', 'XIII-B', 'Terpenuhi', 'user.png'),
(2, 3, 2, '181113929', 'Andi Ramli Hidayat', 'XIII-B', 'Terpenuhi', 'user.png'),
(3, 4, 3, '181113930', 'Anggita Aulia', 'XIII-B', 'Terpenuhi', 'user.png'),
(4, 5, 4, '181113931', 'Azriel Ramadhan', 'XIII-B', 'Terpenuhi', 'user.png'),
(5, 6, 5, '181113932', 'Ches Bella Valentina', 'XIII-B', 'Terpenuhi', 'user.png'),
(6, 7, 6, '181113933', 'Destiandira Rakhadian', 'XIII-B', 'Terpenuhi', 'user.png'),
(7, 8, 7, '181113934', 'Deswita Triani', 'XIII-B', 'Terpenuhi', 'user.png'),
(8, 9, 8, '181113935', 'Devina Dwiyanti', 'XIII-B', 'Terpenuhi', 'user.png'),
(9, 10, 1, '181113936', 'Eva Nur Hidayah', 'XIII-B', 'Terpenuhi', 'user.png'),
(10, 11, 2, '181113937', 'Fathur Rizqi Zidan Al-Akbar', 'XIII-B', 'Terpenuhi', 'user.png'),
(11, 12, 3, '181113938', 'Fauzan Anwar Pratama', 'XIII-B', 'Terpenuhi', 'user.png'),
(12, 13, 4, '181113939', 'Favian Ahza Putra Sobar', 'XIII-B', 'Terpenuhi', 'user.png'),
(13, 14, 5, '181113941', 'Ferdy Hendriawan', 'XIII-B', 'Terpenuhi', 'user.png'),
(14, 15, 1, '181113942', 'Fikrie Widihantoro', 'XIII-B', 'Terpenuhi', 'user.png'),
(15, 16, 2, '181113943', 'Herlina Octaviani', 'XIII-B', 'Terpenuhi', 'user.png'),
(16, 17, 6, '181113944', 'Ibnu Farhan Ramadhan', 'XIII-B', 'Terpenuhi', 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `tanggal`
--

CREATE TABLE `tanggal` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tanggal`
--

INSERT INTO `tanggal` (`id`, `tanggal`) VALUES
(1, '2021-02-08'),
(2, '2021-02-09'),
(3, '2021-02-10'),
(4, '2021-02-11'),
(5, '2021-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `waktu`
--

CREATE TABLE `waktu` (
  `id` int(11) NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_akhir` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `waktu`
--

INSERT INTO `waktu` (`id`, `waktu_mulai`, `waktu_akhir`) VALUES
(1, '08:00:00', '09:00:00'),
(2, '09:00:00', '10:00:00'),
(3, '10:00:00', '11:00:00'),
(4, '11:00:00', '12:00:00'),
(5, '13:00:00', '14:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_admin_account` (`id_account`);

--
-- Indexes for table `pembimbing`
--
ALTER TABLE `pembimbing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sidang`
--
ALTER TABLE `sidang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sidang_siswa` (`id_siswa`),
  ADD KEY `fk_sidang_penguji1` (`id_penguji1`),
  ADD KEY `fk_sidang_penguji2` (`id_penguji2`),
  ADD KEY `fk_sidang_tanggal` (`id_tanggal`),
  ADD KEY `fk_sidang_waktu` (`id_waktu`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_siswa_account` (`id_account`),
  ADD KEY `fk_siswa_pembimbing` (`id_pembimbing`);

--
-- Indexes for table `tanggal`
--
ALTER TABLE `tanggal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `waktu`
--
ALTER TABLE `waktu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembimbing`
--
ALTER TABLE `pembimbing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sidang`
--
ALTER TABLE `sidang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tanggal`
--
ALTER TABLE `tanggal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `waktu`
--
ALTER TABLE `waktu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_admin_account` FOREIGN KEY (`id_account`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sidang`
--
ALTER TABLE `sidang`
  ADD CONSTRAINT `fk_sidang_penguji1` FOREIGN KEY (`id_penguji1`) REFERENCES `pembimbing` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sidang_penguji2` FOREIGN KEY (`id_penguji2`) REFERENCES `pembimbing` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sidang_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sidang_tanggal` FOREIGN KEY (`id_tanggal`) REFERENCES `tanggal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sidang_waktu` FOREIGN KEY (`id_waktu`) REFERENCES `waktu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `fk_siswa_pembimbing` FOREIGN KEY (`id_pembimbing`) REFERENCES `pembimbing` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
