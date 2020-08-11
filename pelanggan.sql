-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2020 at 02:41 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `tagihan` varchar(20) NOT NULL,
  `terbilang` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `kode`, `layanan`, `nama_pelanggan`, `tagihan`, `terbilang`, `keterangan`) VALUES
(1, 'RXH-2019-110001', '1', 'Moh. Nasrulloh', 'Rp 100,000', 'Seratus Ribu Rupiah', 'Berlangganan Bulanan'),
(2, 'RXH-2019-110002', '1', 'Angga Mogol', 'Rp 100,000', 'Seratus Ribu Rupiah', 'Berlangganan Bulanan'),
(32, 'RXH-2019-120003', '1', 'Yulia Fudi Rahayu', 'Rp 100,000', 'Seratus Ribu Rupiah', 'Berlangganan Bulanan'),
(33, 'RXH-2019-120004', '1', 'Vikria Rahma Hanim', 'Rp 100,000', 'Seratus Ribu Rupiah', 'Berlangganan Bulanan'),
(34, 'RXH-2020-060006', '1', 'H. Heru Widianto', 'Rp 100,000', 'Seratus Ribu Rupiah', 'Berlangganan Bulanan'),
(35, 'RXH-2020-060007', '1', 'Yuda', 'Rp 100,000', 'Seratus Ribu Rupiah', 'Berlangganan Bulanan'),
(36, 'RXH-2020-070008', '1', 'Maya', 'Rp 100,000', 'Seratus Ribu Rupiah', 'Berlangganan Bulanan'),
(37, 'RXH-2020-070009', '1', 'Rubaikah', 'Rp 125,000', 'Seratus Dua Puluh Lima Ribu Rupiah', 'Berlangganan Bulanan'),
(38, 'RXH-2020-060005', '1', 'Santoso', 'Rp 100,000', 'Seratus Ribu Rupiah', 'Berlangganan Bulanan');

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
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
