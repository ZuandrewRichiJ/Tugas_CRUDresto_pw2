-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2022 at 05:34 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zuandrewresto`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` char(12) DEFAULT NULL,
  `pw_admin` char(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `pw_admin`) VALUES
('admin1', '1'),
('admin2', '1'),
('admin3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` char(8) NOT NULL,
  `kategori` varchar(10) DEFAULT NULL,
  `nama_menu` varchar(30) DEFAULT NULL,
  `jumlah_menu` int(4) DEFAULT NULL,
  `harga` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `kategori`, `nama_menu`, `jumlah_menu`, `harga`) VALUES
('MDK001', 'Minuman', 'Frozen Capucino', 67, 19000),
('MDK002', 'Minuman', 'Black Currant', 71, 21000),
('MDK003', 'Minuman', 'Lychee Tea', 131, 14000),
('MFD001', 'Makanan', 'Ayam Lada Hitam', 153, 25000),
('MFD002', 'Makanan', 'Express Bowl Ayam Mayo', 78, 24000),
('MFD003', 'Makanan', 'Bihun Siram Ayam', 42, 32000),
('MFD004', 'Makanan', 'Bihun Siram Sapi', 27, 42000),
('MFD005', 'Makanan', 'Nasi Goreng', 53, 29000),
('MSNK001', 'Snack', 'Spring Roll', 147, 19000),
('MSNK002', 'Snack', 'French Fries', 76, 21000);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` char(7) NOT NULL,
  `nama_pegawai` varchar(20) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(13) DEFAULT NULL,
  `pw_pegawai` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `tgl_lahir`, `jenis_kelamin`, `pw_pegawai`) VALUES
('PE001', 'Asnatun', '2002-02-02', 'Perempuan', '1'),
('PE002', 'Aini', '2002-02-09', 'Perempuan', '1'),
('PE003', 'Riko', '1993-11-29', 'Laki-Laki', '1'),
('PE004', 'Dini', '1999-04-01', 'Perempuan', '1'),
('PE005', 'Fariz', '1991-08-17', 'Laki-Laki', '1'),
('PE006', 'Ibal', '1996-07-18', 'Laki-Laki', '1'),
('PE007', 'Snow', '1990-03-04', 'Perempuan', '1');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(8) NOT NULL,
  `id_menu` char(8) DEFAULT NULL,
  `id_pegawai` char(7) DEFAULT NULL,
  `jumlah_beli` int(4) DEFAULT NULL,
  `tgl_transaksi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_menu`, `id_pegawai`, `jumlah_beli`, `tgl_transaksi`) VALUES
(1004, 'MFD002', 'PE003', 5, '2021-05-13'),
(1005, 'MDK003', 'PE001', 2, '2021-04-30'),
(1006, 'MDK001', 'PE005', 6, '2021-05-12'),
(1007, 'MDK001', 'PE001', 11, '2021-05-19'),
(1009, 'MFD002', 'PE005', 3, '2021-05-12'),
(1010, 'MDK003', 'PE003', 3, '2021-05-02'),
(1012, 'MFD002', 'PE003', 5, '2021-05-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1013;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
