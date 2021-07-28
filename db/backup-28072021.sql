-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2021 at 10:57 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotspot`
--

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(50) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `layanan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `tagihan` int(20) NOT NULL,
  `terbilang` varchar(255) NOT NULL,
  `operasional` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `kode`, `layanan`, `nama_pelanggan`, `tagihan`, `terbilang`, `operasional`) VALUES
(1, 'RXH-2019-110001', '1', 'Moh. Nasrulloh', 100000, 'Seratus Ribu Rupiah', 'UTP/LAN20m/RJ45/R.ZTE609'),
(2, 'RXH-2019-110002', '1', 'Angga Mogol', 100000, 'Seratus Ribu Rupiah', 'UTP/LAN35m/RJ45/R.ZTE609'),
(3, 'RXH-2019-120003', '1', 'Yulia Fudi Rahayu', 100000, 'Seratus Ribu Rupiah', 'FO2Core.100m/Conv/Tenda.N300'),
(4, 'RXH-2019-120004', '1', 'Vikria Rahma Hanim', 100000, 'Seratus Ribu Rupiah', 'UTP/LAN20m/RJ45/TotoLink.N200RE'),
(5, 'RXH-2020-060006', '1', 'Sindystya Widiasri A.', 100000, 'Seratus Ribu Rupiah', 'FO2Core.200m/Conv/TotoLink.N300'),
(6, 'RXH-2020-060007', '1', 'Bu Yuni / Yuda', 100000, 'Seratus Ribu Rupiah', 'UTP/LAN35m/RJ45/R.ZTE609'),
(7, 'RXH-2020-070008', '1', 'Maya', 100000, 'Seratus Ribu Rupiah', 'UTP/LAN17m/RJ45/TotoLink.N200RE'),
(8, 'RXH-2020-070009', '1', 'Rubaikah', 125000, 'Seratus Dua Puluh Lima Ribu Rupiah', 'FO2Core.150m/Conv/TotoLink.N200RE'),
(9, 'RXH-2020-060005', '1', 'Santoso', 100000, 'Seratus Ribu Rupiah', 'FO2Core.150m/Conv/TotoLink.N300'),
(10, 'RXH-2020-080010', '1', 'Sumarni', 100000, 'Seratus Ribu Rupiah', 'FO2Core.100m/Conv/TotoLink.N200RE'),
(11, 'RXH-2020-090011', '1', 'Agus Suyitno', 100000, 'Seratus Ribu Rupiah', 'UTP/LAN17m/RJ45/TotoLink.N200RE'),
(12, 'RXH-2020-090012', '1', 'Ruba\'i', 130000, 'Seratus Tiga Puluh Ribu Rupiah', 'FO2Core.100m/Conv/TotoLink.N200RE'),
(13, 'RXH-2020-090013', '1', 'Siti Hanifah', 100000, 'Seratus Ribu Rupiah', 'FO2Core.100m/Conv/TotoLink.N200RE'),
(14, 'RXH-2020-100014', '1', 'Samsul Bakri', 100000, 'Seratus Ribu Rupiah', 'UTP/LAN50m/RJ45/TotoLink.N200RE'),
(15, 'RXH-2020-120015', '1', 'Bpk. Supa\'at', 100000, 'Seratus Ribu Rupiah', 'UTP/LAN20m/RJ45/TotoLink.N200RE'),
(16, 'RXH-2021-020016', '1', 'Agung Suhartono', 100000, 'Seratus Ribu Rupiah', 'FO2Core.100m/Conv/TotoLink.N200RE'),
(17, 'RXH-2021-030017', '1', 'Bpk. Mahfudi', 100000, 'Seratus Ribu Rupiah', 'UTP/LAN20m/RJ45/TotoLink.N200RE'),
(18, 'RXH-2021-040018', '1', 'Bu Amunah', 100000, 'Seratus Ribu Rupiah', 'FO2Core.100m/Conv/TotoLink.N200RE'),
(19, 'RXH-2021-040019', '1', 'Bpk. Arifin', 100000, 'Seratus Ribu Rupiah', 'UTP/LAN40m/RJ45/TotoLink.N200RE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
