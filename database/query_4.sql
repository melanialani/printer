-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2018 at 06:17 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `printer`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `id_jenis` int(11) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `warning` int(11) NOT NULL DEFAULT '10',
  `harga` int(11) DEFAULT NULL,
  `ukuran` varchar(255) DEFAULT NULL,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `id_jenis`, `nama`, `jumlah`, `warning`, `harga`, `ukuran`, `deskripsi`) VALUES
(1, 3, 'Kertas A4', 150, 10, 150, '21x24cm', 'Kertas A4 ukuran 21x24cm');

-- --------------------------------------------------------

--
-- Table structure for table `barang_jenis`
--

CREATE TABLE `barang_jenis` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_jenis`
--

INSERT INTO `barang_jenis` (`id`, `nama`) VALUES
(0, 'No Category'),
(1, 'Laminasi'),
(2, 'Porforasi'),
(3, 'Kertas'),
(6, 'Cover');

-- --------------------------------------------------------

--
-- Table structure for table `manajemen_stok`
--

CREATE TABLE `manajemen_stok` (
  `id` int(11) NOT NULL,
  `barang_awal` int(11) NOT NULL,
  `barang_akhir` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='transform product 1 into many product 2';

-- --------------------------------------------------------

--
-- Table structure for table `referensi`
--

CREATE TABLE `referensi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referensi`
--

INSERT INTO `referensi` (`id`, `nama`) VALUES
(1, 'Ukuran Kertas'),
(2, 'Jenis Kertas'),
(3, 'Jenis Laminasi'),
(4, 'Jenis Porforasi'),
(5, 'Warna Kertas');

-- --------------------------------------------------------

--
-- Table structure for table `referensi_detail`
--

CREATE TABLE `referensi_detail` (
  `id` int(11) NOT NULL,
  `id_referensi` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referensi_detail`
--

INSERT INTO `referensi_detail` (`id`, `id_referensi`, `nama`) VALUES
(1, 5, 'Putih'),
(2, 5, 'Merah');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `photo` text,
  `id_role` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `email`, `photo`, `id_role`, `is_active`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@mail.com', NULL, 1, 1),
(2, 'John Doe', 'john', '2829fc16ad8ca5a79da932f910afad1c', 'johndoe@gmail.com', NULL, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `nama`) VALUES
(1, 'Admin'),
(2, 'Pegawai'),
(3, 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_barang_fk` (`id_jenis`);

--
-- Indexes for table `barang_jenis`
--
ALTER TABLE `barang_jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manajemen_stok`
--
ALTER TABLE `manajemen_stok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang_awal` (`barang_awal`),
  ADD KEY `id_barang_akhir` (`barang_akhir`);

--
-- Indexes for table `referensi`
--
ALTER TABLE `referensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referensi_detail`
--
ALTER TABLE `referensi_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `referensi_parent` (`id_referensi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user` (`id_role`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `barang_jenis`
--
ALTER TABLE `barang_jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `manajemen_stok`
--
ALTER TABLE `manajemen_stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referensi`
--
ALTER TABLE `referensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `referensi_detail`
--
ALTER TABLE `referensi_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `jenis_barang_fk` FOREIGN KEY (`id_jenis`) REFERENCES `barang_jenis` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `manajemen_stok`
--
ALTER TABLE `manajemen_stok`
  ADD CONSTRAINT `id_barang_akhir` FOREIGN KEY (`barang_akhir`) REFERENCES `barang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `id_barang_awal` FOREIGN KEY (`barang_awal`) REFERENCES `barang` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `referensi_detail`
--
ALTER TABLE `referensi_detail`
  ADD CONSTRAINT `referensi_parent` FOREIGN KEY (`id_referensi`) REFERENCES `referensi` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `role_user` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
