-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2018 at 06:52 PM
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
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `stock_awal` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `warning` int(11) DEFAULT NULL,
  `warna` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `jumlah`, `harga_beli`, `harga_jual`, `stock_awal`, `stock`, `warning`, `warna`) VALUES
(2, 'Kertas A4', 62, 1500, NULL, 200, 198, 150, 'Hijau'),
(3, 'Kertas A3', 157, 2000, 2500, 250, 248, 250, 'Kuning');

-- --------------------------------------------------------

--
-- Table structure for table `detailbarangproses`
--

CREATE TABLE `detailbarangproses` (
  `id_barang` int(11) NOT NULL,
  `id_proses` int(11) NOT NULL,
  `qty_barang` int(11) DEFAULT NULL,
  `jumlah_harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_plate`
--

CREATE TABLE `detail_plate` (
  `id_proses` int(11) NOT NULL,
  `id_master_plate` int(11) NOT NULL,
  `qty_plate` int(11) DEFAULT NULL,
  `jumlah_harga_plate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id_history` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `deskripsi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hpembelian`
--

CREATE TABLE `hpembelian` (
  `id_trans` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_trans` datetime DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `customer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hpembelian_barang`
--

CREATE TABLE `hpembelian_barang` (
  `id_trans` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty_barang` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_cetakan`
--

CREATE TABLE `jenis_cetakan` (
  `id_jenis_cetakan` int(11) NOT NULL,
  `nama_jenis_cetakan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_cetakan`
--

INSERT INTO `jenis_cetakan` (`id_jenis_cetakan`, `nama_jenis_cetakan`) VALUES
(1, 'Banner');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kertas`
--

CREATE TABLE `jenis_kertas` (
  `id_jenis_kertas` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `namajenis_kertas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_kertas`
--

INSERT INTO `jenis_kertas` (`id_jenis_kertas`, `id_barang`, `namajenis_kertas`) VALUES
(2, 2, 'Plano'),
(3, 3, 'Dove');

-- --------------------------------------------------------

--
-- Table structure for table `laminasi`
--

CREATE TABLE `laminasi` (
  `id_laminasi` int(11) NOT NULL,
  `id_proses` int(11) DEFAULT NULL,
  `nama_laminasi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_plate`
--

CREATE TABLE `master_plate` (
  `id_master_plate` int(11) NOT NULL,
  `panjang_plate` int(11) DEFAULT NULL,
  `lebar_plate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_plate`
--

INSERT INTO `master_plate` (`id_master_plate`, `panjang_plate`, `lebar_plate`) VALUES
(2, 50, 70);

-- --------------------------------------------------------

--
-- Table structure for table `proses`
--

CREATE TABLE `proses` (
  `id_proses` int(11) NOT NULL,
  `id_jenis_cetakan` int(11) NOT NULL,
  `numerator` smallint(6) DEFAULT NULL,
  `plong` smallint(6) DEFAULT NULL,
  `panjang_cetak` int(11) DEFAULT NULL,
  `lebar_cetak` int(11) DEFAULT NULL,
  `tinggi_cetak` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ukuran_kertas`
--

CREATE TABLE `ukuran_kertas` (
  `id_ukuran_kertas` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `nama_ukuran_kertas` varchar(255) DEFAULT NULL,
  `panjang_kertas` int(11) DEFAULT NULL,
  `lebar_kertas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ukuran_kertas`
--

INSERT INTO `ukuran_kertas` (`id_ukuran_kertas`, `id_barang`, `nama_ukuran_kertas`, `panjang_kertas`, `lebar_kertas`) VALUES
(1, 2, 'Ukuran A4', 110, 75);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `alamat_user` varchar(255) DEFAULT NULL,
  `no_hp` varchar(14) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `alamat_user`, `no_hp`, `email`, `photo`, `username`, `password`, `role`, `is_active`) VALUES
(2, 'Administrator', 'Alamat Lengkap Admin', '081234567890', 'admin@mail.com', NULL, 'admin', 'admin', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `detailbarangproses`
--
ALTER TABLE `detailbarangproses`
  ADD PRIMARY KEY (`id_barang`,`id_proses`),
  ADD KEY `fk_barang_proses2` (`id_proses`);

--
-- Indexes for table `detail_plate`
--
ALTER TABLE `detail_plate`
  ADD PRIMARY KEY (`id_proses`,`id_master_plate`),
  ADD KEY `fk_proses_master_plate2` (`id_master_plate`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `fk_barang_history` (`id_barang`);

--
-- Indexes for table `hpembelian`
--
ALTER TABLE `hpembelian`
  ADD PRIMARY KEY (`id_trans`),
  ADD KEY `fk_user_hpembelian` (`id_user`);

--
-- Indexes for table `hpembelian_barang`
--
ALTER TABLE `hpembelian_barang`
  ADD PRIMARY KEY (`id_trans`,`id_barang`),
  ADD KEY `fk_hpembelian_barang2` (`id_barang`);

--
-- Indexes for table `jenis_cetakan`
--
ALTER TABLE `jenis_cetakan`
  ADD PRIMARY KEY (`id_jenis_cetakan`);

--
-- Indexes for table `jenis_kertas`
--
ALTER TABLE `jenis_kertas`
  ADD PRIMARY KEY (`id_jenis_kertas`),
  ADD KEY `fk_barang_jenis_kertas` (`id_barang`);

--
-- Indexes for table `laminasi`
--
ALTER TABLE `laminasi`
  ADD PRIMARY KEY (`id_laminasi`),
  ADD KEY `fk_proses_laminasi` (`id_proses`);

--
-- Indexes for table `master_plate`
--
ALTER TABLE `master_plate`
  ADD PRIMARY KEY (`id_master_plate`);

--
-- Indexes for table `proses`
--
ALTER TABLE `proses`
  ADD PRIMARY KEY (`id_proses`),
  ADD KEY `fk_proses_jenis_cetakan` (`id_jenis_cetakan`);

--
-- Indexes for table `ukuran_kertas`
--
ALTER TABLE `ukuran_kertas`
  ADD PRIMARY KEY (`id_ukuran_kertas`),
  ADD KEY `fk_barang_ukuran_kertas` (`id_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hpembelian`
--
ALTER TABLE `hpembelian`
  MODIFY `id_trans` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_cetakan`
--
ALTER TABLE `jenis_cetakan`
  MODIFY `id_jenis_cetakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis_kertas`
--
ALTER TABLE `jenis_kertas`
  MODIFY `id_jenis_kertas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `laminasi`
--
ALTER TABLE `laminasi`
  MODIFY `id_laminasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_plate`
--
ALTER TABLE `master_plate`
  MODIFY `id_master_plate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `proses`
--
ALTER TABLE `proses`
  MODIFY `id_proses` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ukuran_kertas`
--
ALTER TABLE `ukuran_kertas`
  MODIFY `id_ukuran_kertas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detailbarangproses`
--
ALTER TABLE `detailbarangproses`
  ADD CONSTRAINT `fk_barang_proses` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `fk_barang_proses2` FOREIGN KEY (`id_proses`) REFERENCES `proses` (`id_proses`);

--
-- Constraints for table `detail_plate`
--
ALTER TABLE `detail_plate`
  ADD CONSTRAINT `fk_proses_master_plate` FOREIGN KEY (`id_proses`) REFERENCES `proses` (`id_proses`),
  ADD CONSTRAINT `fk_proses_master_plate2` FOREIGN KEY (`id_master_plate`) REFERENCES `master_plate` (`id_master_plate`);

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `fk_barang_history` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Constraints for table `hpembelian`
--
ALTER TABLE `hpembelian`
  ADD CONSTRAINT `fk_user_hpembelian` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `hpembelian_barang`
--
ALTER TABLE `hpembelian_barang`
  ADD CONSTRAINT `fk_hpembelian_barang` FOREIGN KEY (`id_trans`) REFERENCES `hpembelian` (`id_trans`),
  ADD CONSTRAINT `fk_hpembelian_barang2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Constraints for table `jenis_kertas`
--
ALTER TABLE `jenis_kertas`
  ADD CONSTRAINT `fk_barang_jenis_kertas` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Constraints for table `laminasi`
--
ALTER TABLE `laminasi`
  ADD CONSTRAINT `fk_proses_laminasi` FOREIGN KEY (`id_proses`) REFERENCES `proses` (`id_proses`);

--
-- Constraints for table `proses`
--
ALTER TABLE `proses`
  ADD CONSTRAINT `fk_proses_jenis_cetakan` FOREIGN KEY (`id_jenis_cetakan`) REFERENCES `jenis_cetakan` (`id_jenis_cetakan`);

--
-- Constraints for table `ukuran_kertas`
--
ALTER TABLE `ukuran_kertas`
  ADD CONSTRAINT `fk_barang_ukuran_kertas` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
