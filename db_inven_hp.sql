-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2022 at 10:33 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inven_hp`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `kota`) VALUES
(0, 'Budi', 'Bogor'),
(1, 'Yudi', 'Bandung'),
(2, 'Maya', 'Semarang'),
(3, 'Alfatah', 'Cirebon'),
(4, 'Indah', 'Badung'),
(5, 'Dedi', 'Singapore'),
(6, 'John', 'Singapore'),
(7, 'Manny', 'Manila');

-- --------------------------------------------------------

--
-- Table structure for table `hp`
--

CREATE TABLE `hp` (
  `id_hp` int(11) NOT NULL,
  `nama_kategori` int(11) DEFAULT NULL,
  `nama_supplier` int(11) DEFAULT NULL,
  `jenis_hp` varchar(50) DEFAULT NULL,
  `harga_jual` int(15) DEFAULT NULL,
  `harga_beli` int(15) DEFAULT NULL,
  `stok` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hp`
--

INSERT INTO `hp` (`id_hp`, `nama_kategori`, `nama_supplier`, `jenis_hp`, `harga_jual`, `harga_beli`, `stok`) VALUES
(1, 1, 1, 'ZENFONE', 3000000, 2000000, 6),
(2, 2, 2, 'A3', 8000000, 7000000, 2),
(3, 2, 1, 'S21', 9000000, 5000000, 4),
(5, 5, 4, 'Reno6', 4000000, 3500000, 22),
(6, 4, 6, 'iPhone XR', 7600000, 3500000, 5),
(7, 3, 7, 'Poco M4 Pro 5G', 6600000, 6500000, 7),
(8, 6, 4, 'G10', 5000000, 4000000, 2),
(9, 6, 5, 'Asha 310', 4500000, 4500000, 12),
(12, 7, 7, 'Xperia X', 8800000, 7700000, 6);

-- --------------------------------------------------------

--
-- Stand-in structure for view `jenis_kategori_stok`
-- (See below for the actual view)
--
CREATE TABLE `jenis_kategori_stok` (
`jenis_hp` varchar(50)
,`nama_kategori` varchar(155)
,`stok` int(15)
);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(155) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'ASUS'),
(2, 'SAMSUNG'),
(3, 'XIAOMI'),
(4, 'APPLE'),
(5, 'OPPO'),
(6, 'NOKIA'),
(7, 'SONY');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(155) DEFAULT NULL,
  `kota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `kota`) VALUES
(1, 'Ahmad', 'Bandung'),
(2, 'Bejo', 'Semarang'),
(3, 'Parjo', 'Bogor'),
(4, 'Richard', 'Singapore'),
(5, 'James', 'Sydney'),
(6, 'Wahyu', 'Denpasar'),
(7, 'Cecep', 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `kodeUser` int(11) NOT NULL,
  `user` varchar(155) DEFAULT NULL,
  `password` varchar(155) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`kodeUser`, `user`, `password`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Structure for view `jenis_kategori_stok`
--
DROP TABLE IF EXISTS `jenis_kategori_stok`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jenis_kategori_stok`  AS SELECT `hp`.`jenis_hp` AS `jenis_hp`, `kategori`.`nama_kategori` AS `nama_kategori`, `hp`.`stok` AS `stok` FROM (`hp` join `kategori` on(`hp`.`nama_kategori` = `kategori`.`id_kategori`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `hp`
--
ALTER TABLE `hp`
  ADD PRIMARY KEY (`id_hp`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`kodeUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hp`
--
ALTER TABLE `hp`
  MODIFY `id_hp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `kodeUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
