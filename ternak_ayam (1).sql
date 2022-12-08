-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 10:13 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ternak_ayam`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_ayam`
--

CREATE TABLE `data_ayam` (
  `id` int(10) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `jumlah_masuk` int(100) NOT NULL,
  `mati` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_ayam`
--

INSERT INTO `data_ayam` (`id`, `tanggal_masuk`, `jumlah_masuk`, `mati`) VALUES
(1, '2022-08-09', 100, 9),
(2, '2022-10-12', 100, 9),
(6, '0000-00-00', 150, 4);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pakan`
--

CREATE TABLE `detail_pakan` (
  `id` int(255) NOT NULL,
  `pembelian` date NOT NULL,
  `jenis_pakan` varchar(255) NOT NULL,
  `stok_pakan` int(255) NOT NULL,
  `total_harga` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pakan`
--

INSERT INTO `detail_pakan` (`id`, `pembelian`, `jenis_pakan`, `stok_pakan`, `total_harga`) VALUES
(1, '2022-09-08', 'Dedak Padi', 50, 1000000),
(2, '2022-09-02', 'Sorgum', 69, 2000000);

-- --------------------------------------------------------

--
-- Table structure for table `distribusi`
--

CREATE TABLE `distribusi` (
  `id` int(255) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `tanggal_distribusi` date NOT NULL,
  `contact` int(255) NOT NULL,
  `total_ayam` int(255) NOT NULL,
  `payment` int(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `distribusi`
--

INSERT INTO `distribusi` (`id`, `customer`, `tanggal_distribusi`, `contact`, `total_ayam`, `payment`, `address`) VALUES
(1, 'Aishanda', '2022-10-09', 812345678, 23, 2500000, 'Nias Cluster'),
(2, 'Vania', '2022-10-17', 813456788, 50, 1000000, 'Taman Anggrek');

-- --------------------------------------------------------

--
-- Table structure for table `level_detail`
--

CREATE TABLE `level_detail` (
  `id_level` tinyint(4) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level_detail`
--

INSERT INTO `level_detail` (`id_level`, `level`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `pendapatan`
--

CREATE TABLE `pendapatan` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `pemasukan` int(11) NOT NULL,
  `pengeluaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendapatan`
--

INSERT INTO `pendapatan` (`id`, `tanggal`, `pemasukan`, `pengeluaran`) VALUES
(3, '2022-12-13', 3500000, 1000000),
(5, '2022-12-27', 2400000, 100000),
(8, '2022-12-23', 2147483647, 5000000),
(9, '2022-12-20', 3300000, 600001);

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(255) NOT NULL,
  `harga_pakan` int(255) NOT NULL,
  `tgl_beli_pakan` date NOT NULL,
  `biaya_vaksin` int(255) NOT NULL,
  `tgl_vaksin` date NOT NULL,
  `tenaga_kerja` int(255) NOT NULL,
  `bibit_ayam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `harga_pakan`, `tgl_beli_pakan`, `biaya_vaksin`, `tgl_vaksin`, `tenaga_kerja`, `bibit_ayam`) VALUES
(1, 7500, '2022-11-22', 2000, '2022-11-21', 3000000, 200);

-- --------------------------------------------------------

--
-- Table structure for table `sample_jual`
--

CREATE TABLE `sample_jual` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `jml_jual` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sample_jual`
--

INSERT INTO `sample_jual` (`id`, `id_user`, `user_fullname`, `jml_jual`) VALUES
(1, 1, 'Aishandavania25', '30.00'),
(2, 2, 'Ecaa Daenasty', '21.00'),
(3, 5, 'suciii', '55.00'),
(4, 7, 'vio', '17.00'),
(5, 9, 'cacaaa', '45.00'),
(6, 15, 'febi', '32.00'),
(7, 16, 'Aanisah', '40.00');

-- --------------------------------------------------------

--
-- Table structure for table `tenaga_kerja`
--

CREATE TABLE `tenaga_kerja` (
  `id_karyawan` int(12) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `jabatan` varchar(12) NOT NULL,
  `gaji` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id` int(11) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_fullname` varchar(50) NOT NULL,
  `level` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id`, `user_email`, `user_password`, `user_fullname`, `level`) VALUES
(2, 'admin@admin.com', '12344321', 'Ecaa Daenasty', 1),
(5, 'suci@gmail.com', '12345', 'sucii', 2),
(7, 'vio@gmail.com', '12345', 'vio', 2),
(9, 'caca@gmail.com', '12345', 'cacaaa', 2),
(16, 'aanisah@gmail.com', '12345', 'Aanisah', 2);

-- --------------------------------------------------------

--
-- Table structure for table `vaksin_detail`
--

CREATE TABLE `vaksin_detail` (
  `id` int(255) NOT NULL,
  `tanggal_ovk` date NOT NULL,
  `jenis_ovk` varchar(255) NOT NULL,
  `jumlah_ovk` int(255) NOT NULL,
  `next_ovk` date NOT NULL,
  `biaya_ovk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaksin_detail`
--

INSERT INTO `vaksin_detail` (`id`, `tanggal_ovk`, `jenis_ovk`, `jumlah_ovk`, `next_ovk`, `biaya_ovk`) VALUES
(1, '2022-09-21', 'Za', 68, '2022-09-29', 7000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_ayam`
--
ALTER TABLE `data_ayam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_pakan`
--
ALTER TABLE `detail_pakan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distribusi`
--
ALTER TABLE `distribusi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_detail`
--
ALTER TABLE `level_detail`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sample_jual`
--
ALTER TABLE `sample_jual`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fullname` (`user_fullname`);

--
-- Indexes for table `tenaga_kerja`
--
ALTER TABLE `tenaga_kerja`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaksin_detail`
--
ALTER TABLE `vaksin_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_ayam`
--
ALTER TABLE `data_ayam`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `detail_pakan`
--
ALTER TABLE `detail_pakan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `distribusi`
--
ALTER TABLE `distribusi`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `level_detail`
--
ALTER TABLE `level_detail`
  MODIFY `id_level` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tenaga_kerja`
--
ALTER TABLE `tenaga_kerja`
  MODIFY `id_karyawan` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `vaksin_detail`
--
ALTER TABLE `vaksin_detail`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
