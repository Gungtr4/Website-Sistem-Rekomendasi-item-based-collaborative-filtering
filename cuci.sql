-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2020 at 03:12 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cuci`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(10) NOT NULL,
  `nama_kat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kat`) VALUES
('KAT001', 'Sepatu'),
('KAT002', 'Tas');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_order` varchar(11) NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `tgl_pesan` varchar(20) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id_order`, `no_ktp`, `tgl_pesan`) VALUES
('ORD0001', '5171040811000003', '18-12-2020'),
('ORD0002', '5171040811000003', '18-12-2020');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id_detail` varchar(11) NOT NULL,
  `id_order` varchar(11) NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id_detail`, `id_order`, `id_produk`, `jumlah`, `total_harga`, `status`) VALUES
('DET0002', 'ORD0001', 'PRO00002', 7, 140000, 'Delivered'),
('DET0003', 'ORD0002', 'PRO00001', 5, 50000, 'Delivered'),
('DET0004', 'ORD0002', 'PRO00002', 100, 2000000, 'processed');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(10) NOT NULL,
  `id_kategori` varchar(10) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `gambar` longblob NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `gambar`, `deskripsi`, `harga`) VALUES
('PRO00001', 'KAT001', 'cuci sepatu', 0x50524f30303030313539362d353936313333345f6b6f6e6f2d64696f2d64612d6d656d652d74656d706c6174652d68642d706e672d646f776e6c6f61642e706e67, 'cuci sepatu', 10000),
('PRO00002', 'KAT002', 'cuci tas', 0x50524f30303030326b7261746f732e6a7067, 'yolo', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` varchar(10) NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  `score` int(100) NOT NULL,
  `review` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id_review`, `no_ktp`, `id_produk`, `score`, `review`) VALUES
('REV00001', '5171040811000003', 'PRO00001', 69, 'bagus'),
('REV00002', '5171040811000005', 'PRO00002', 80, 'puas'),
('REV00003', '5171040811000003', 'PRO00001', 65, 'lol'),
('REV00004', '5171040811000003', 'PRO00002', 65, 'good service'),
('REV00005', '5171040811000003', 'PRO00002', 65, 'damm good bro'),
('REV00006', '5171040811000003', 'PRO00001', 10, 'Shit Happens');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `no_ktp` varchar(16) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(15) NOT NULL,
  `role` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`no_ktp`, `username`, `pass`, `role`, `nama`, `email`, `alamat`, `gender`, `tgl_lahir`, `no_telp`) VALUES
('5171040810000002', 'admin', 'YWRtaW4=', 'admin', 'admin', 'admin@gmail.com', 'Jl.Nangka Gg.XI No.16,Dangin Puri Kaja-Denpasar Utara,Denpasar,Bali', 'Laki Laki', '2000-10-08', '089637143215'),
('5171040811000003', 'Demniam', 'RGVkZTEyMzQ1', 'user', 'Anak Agung Putra Adnyana', 'gungputra@gmail.com', 'Jl.Nangka Gg.XI No.16,Dangin Puri Kaja-Denpasar Utara,Bali', 'Laki-Laki', '2000-10-10', '089637143215'),
('5171040811000005', 'Demniam', 'RGVkZTEyMzQ1', 'admin', 'Anak Agung Putra Adnyana', 'gungputra@gmail.com', 'Jl.Nangka Gg.XI No.16,Dangin Puri Kaja-Denpasar Utara,Bali', 'Laki-Laki', '2000-10-10', '089637143215');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `FK_orderuser` (`no_ktp`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `FK_produkkategori` (`id_kategori`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `no_ktp` (`no_ktp`,`id_produk`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`no_ktp`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_orderuser` FOREIGN KEY (`no_ktp`) REFERENCES `user` (`no_ktp`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `FK_produkkategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`no_ktp`) REFERENCES `user` (`no_ktp`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
