-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2023 at 09:20 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gal-on`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID_Admin` int(5) NOT NULL,
  `Nama_Admin` varchar(50) NOT NULL,
  `Password_Admin` varchar(20) NOT NULL,
  `Telp_Admin` int(7) NOT NULL,
  `Email_Admin` varchar(20) NOT NULL,
  `Alamat_Admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID_Admin`, `Nama_Admin`, `Password_Admin`, `Telp_Admin`, `Email_Admin`, `Alamat_Admin`) VALUES
(2, 'Keyvaro Amatulah', 'bang66', 889765, 'keyvar42@gmail.com', 'Jl. Sukamaju RT. 001 RW.007 No.11, Jakarta Selatan'),
(3, 'Kanaya Sulistia', 'nayasulis6', 883165, 'nayaaaa2@gmail.com', 'Jl. Kutilang RT. 002 RW.001 No.15, Tangerang Selatan');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `ID_Barang` int(5) NOT NULL,
  `ID_Supplier` int(5) NOT NULL,
  `Tipe_Barang` varchar(15) NOT NULL,
  `Harga_Barang` int(7) NOT NULL,
  `Stok` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`ID_Barang`, `ID_Supplier`, `Tipe_Barang`, `Harga_Barang`, `Stok`) VALUES
(5, 1, 'galon', 212111, 211),
(7, 1, 'botol 300ml', 4000, 7),
(10, 1, 'galon', 30000, 15),
(11, 3, 'gelas 200ml', 50000, 21);

-- --------------------------------------------------------

--
-- Table structure for table `jasa`
--

CREATE TABLE `jasa` (
  `ID_Jasa` int(5) NOT NULL,
  `Nama_Jasa` varchar(50) NOT NULL,
  `Harga_Jasa` int(7) NOT NULL,
  `Stok` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jasa`
--

INSERT INTO `jasa` (`ID_Jasa`, `Nama_Jasa`, `Harga_Jasa`, `Stok`) VALUES
(1, 'ozon', 57000, 24),
(2, '11x penyaringan', 46000, 20),
(3, 'air bio energy', 46000, 20),
(6, 'Air Zam Zam', 20000, 21),
(7, 'Air Danau Toba', 80000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `ID_Review` int(5) NOT NULL,
  `ID_User` int(5) NOT NULL,
  `Nilai_Review` int(2) NOT NULL,
  `Isi_Review` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `ID_Supplier` int(5) NOT NULL,
  `Nama_Supplier` varchar(20) NOT NULL,
  `Alamat_Supplier` varchar(100) NOT NULL,
  `Kontak_Supplier` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`ID_Supplier`, `Nama_Supplier`, `Alamat_Supplier`, `Kontak_Supplier`) VALUES
(1, 'Aqua', 'Jl. Kiwi No.26, RT.11/RW.3', 2147483647),
(3, 'Vit', 'Jl.Sawangan Raya 30A RT 09/01', 189876544);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_barang`
--

CREATE TABLE `transaksi_barang` (
  `ID_Transaksi_Brg` int(5) NOT NULL,
  `ID_Barang` int(5) NOT NULL,
  `Email_User` varchar(30) NOT NULL,
  `Harga_Barang` int(7) NOT NULL,
  `Jml_Barang` int(2) NOT NULL,
  `Tgl_Pemesanan` date NOT NULL,
  `Index_Transaksi` int(2) NOT NULL,
  `Status_Pemesanan` enum('On Progress','Selesai','Sedang Diantar','Menunggu Konfirmasi','Mengonfirmasi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_barang`
--

INSERT INTO `transaksi_barang` (`ID_Transaksi_Brg`, `ID_Barang`, `Email_User`, `Harga_Barang`, `Jml_Barang`, `Tgl_Pemesanan`, `Index_Transaksi`, `Status_Pemesanan`) VALUES
(1, 5, 'madun89@gmail.com', 30000, 2, '2023-06-12', 1, 'On Progress'),
(2, 11, 'madun89@gmail.com', 50000, 1, '2023-06-12', 2, 'On Progress'),
(12, 5, 'andra@gmail.com', 212111, 1, '2023-06-12', 1, 'On Progress'),
(13, 10, 'andra@gmail.com', 30000, 1, '2023-06-12', 1, 'On Progress'),
(14, 5, 'andra@gmail.com', 212111, 5, '2023-06-12', 2, 'On Progress'),
(15, 7, 'andra@gmail.com', 4000, 3, '2023-06-12', 2, 'On Progress'),
(16, 10, 'andra@gmail.com', 30000, 1, '2023-06-12', 2, 'On Progress'),
(17, 5, 'andra@gmail.com', 212111, 2, '2023-06-12', 3, 'On Progress'),
(18, 7, 'andra@gmail.com', 4000, 1, '2023-06-12', 3, 'On Progress');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_refill`
--

CREATE TABLE `transaksi_refill` (
  `ID_Transaksi_Refill` int(5) NOT NULL,
  `ID_Barang` int(5) NOT NULL,
  `Email_User` varchar(30) NOT NULL,
  `Harga_Barang` int(7) NOT NULL,
  `Jml_Barang` int(3) NOT NULL,
  `Tgl_Pemesanan` date NOT NULL,
  `Index_Transaksi` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_refill`
--

INSERT INTO `transaksi_refill` (`ID_Transaksi_Refill`, `ID_Barang`, `Email_User`, `Harga_Barang`, `Jml_Barang`, `Tgl_Pemesanan`, `Index_Transaksi`) VALUES
(1, 10, 'adip@gmail.com', 212111, 1, '2023-06-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID_User` int(5) NOT NULL,
  `Nama_User` varchar(50) NOT NULL,
  `Password_User` varchar(20) NOT NULL,
  `Telp_User` int(7) NOT NULL,
  `Email_User` varchar(30) NOT NULL,
  `Alamat_User` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_User`, `Nama_User`, `Password_User`, `Telp_User`, `Email_User`, `Alamat_User`) VALUES
(8, 'Matahari', 'password', 8123, 'adip@gmail.com', 'jl. jalanan'),
(0, 'Andra', '4hhtfqsqd', 2147483647, 'andra@gmail.com', 'Jalan Jalan'),
(1, 'Ridwan Hasan', 'hasan098', 888997, 'hasan89@gmail.com', 'Jl. Senja RT. 009 RW. 001 No.12, Tangerang Selatan  '),
(3, 'Karina Fatmah', '', 886594, 'karinuy09@gmail.com', 'Jl. Melawai RT. 002 RW. 001 No.13, Jakarta Selatan  '),
(6, 'Kevin Kurnia', 'kur12ia', 879555, 'kurniakev4@gmail.com', 'Jl. Mandiri RT. 004 RW. 007 No.13, Jakarta Timur'),
(7, 'Madun Marjuki', 'majuyok3', 874555, 'madun89@gmail.com', 'Jl. Makmur RT. 004 RW. 005 No.7, Jakarta Utara'),
(5, 'Sarah Sulistia', 'sarah76', 886985, 'sarah79@gmail.com', 'Jl. Perkutut RT. 003 RW. 001 No.22, Jakarta Barat'),
(4, 'Susanto Setiawan', 'setiaitu1', 887855, 'setia11@gmail.com', 'Jl. Sentosa RT. 004 RW. 001 No.16, Jakarta Selatan  '),
(2, 'Sinta Susanti', 'susantioke', 886555, 'sintaoke9@gmail.com', 'Jl. Mawar RT. 001 RW. 002 No.2, Tangerang Selatan  ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Email_Admin`) USING BTREE;

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`ID_Barang`),
  ADD KEY `ID_Supplier` (`ID_Supplier`),
  ADD KEY `Harga_Barang` (`Harga_Barang`);

--
-- Indexes for table `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`ID_Jasa`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ID_Review`),
  ADD KEY `ID_User` (`ID_User`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`ID_Supplier`);

--
-- Indexes for table `transaksi_barang`
--
ALTER TABLE `transaksi_barang`
  ADD PRIMARY KEY (`ID_Transaksi_Brg`),
  ADD KEY `ID_Barang` (`ID_Barang`),
  ADD KEY `Email_User` (`Email_User`),
  ADD KEY `Harga_Barang` (`Harga_Barang`),
  ADD KEY `Harga_Barang_2` (`Harga_Barang`);

--
-- Indexes for table `transaksi_refill`
--
ALTER TABLE `transaksi_refill`
  ADD PRIMARY KEY (`ID_Transaksi_Refill`),
  ADD KEY `ID_Barang` (`ID_Barang`),
  ADD KEY `Email_User` (`Email_User`),
  ADD KEY `Harga_Barang` (`Harga_Barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Email_User`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `ID_Barang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jasa`
--
ALTER TABLE `jasa`
  MODIFY `ID_Jasa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `ID_Review` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `ID_Supplier` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi_barang`
--
ALTER TABLE `transaksi_barang`
  MODIFY `ID_Transaksi_Brg` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `transaksi_refill`
--
ALTER TABLE `transaksi_refill`
  MODIFY `ID_Transaksi_Refill` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`ID_Supplier`) REFERENCES `supplier` (`ID_Supplier`);

--
-- Constraints for table `transaksi_barang`
--
ALTER TABLE `transaksi_barang`
  ADD CONSTRAINT `transaksi_barang_ibfk_1` FOREIGN KEY (`Email_User`) REFERENCES `user` (`Email_User`),
  ADD CONSTRAINT `transaksi_barang_ibfk_2` FOREIGN KEY (`Harga_Barang`) REFERENCES `barang` (`Harga_Barang`),
  ADD CONSTRAINT `transaksi_barang_ibfk_3` FOREIGN KEY (`ID_Barang`) REFERENCES `barang` (`ID_Barang`);

--
-- Constraints for table `transaksi_refill`
--
ALTER TABLE `transaksi_refill`
  ADD CONSTRAINT `transaksi_refill_ibfk_1` FOREIGN KEY (`ID_Barang`) REFERENCES `barang` (`ID_Barang`),
  ADD CONSTRAINT `transaksi_refill_ibfk_2` FOREIGN KEY (`Email_User`) REFERENCES `user` (`Email_User`),
  ADD CONSTRAINT `transaksi_refill_ibfk_3` FOREIGN KEY (`Harga_Barang`) REFERENCES `barang` (`Harga_Barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
