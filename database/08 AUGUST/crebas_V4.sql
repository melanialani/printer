-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2018 at 03:45 PM
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
-- Table structure for table `barang_hpembelian`
--

CREATE TABLE `barang_hpembelian` (
  `id_varian` int(11) NOT NULL,
  `id_trans` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detailbarangproses`
--

CREATE TABLE `detailbarangproses` (
  `id_varian` int(11) NOT NULL,
  `id_proses` varchar(10) NOT NULL,
  `qty_barang` int(11) DEFAULT NULL,
  `jumlah_harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_plate`
--

CREATE TABLE `detail_plate` (
  `id_master_plate` int(11) NOT NULL,
  `id_proses` varchar(10) NOT NULL,
  `qty_plate` int(11) DEFAULT NULL,
  `jumlah_harga_plate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dpembelian_barang`
--

CREATE TABLE `dpembelian_barang` (
  `id_varian` int(11) NOT NULL,
  `id_trans` varchar(255) NOT NULL,
  `qty_barang` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dpembelian_cetak`
--

CREATE TABLE `dpembelian_cetak` (
  `id_trans` varchar(255) NOT NULL,
  `id_varian` int(11) NOT NULL,
  `qty_barang` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id_history` int(11) NOT NULL,
  `id_varian` int(11) NOT NULL,
  `tanggal` datetime DEFAULT CURRENT_TIMESTAMP,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hpembelian`
--

CREATE TABLE `hpembelian` (
  `id_trans` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_trans` datetime DEFAULT CURRENT_TIMESTAMP,
  `total_harga` int(11) DEFAULT NULL,
  `customer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id_jenis_barang` int(11) NOT NULL,
  `nama_jenis_barang` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_cetakan`
--

CREATE TABLE `jenis_cetakan` (
  `id_jenis_cetakan` int(11) NOT NULL,
  `nama_jenis_cetakan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kertas`
--

CREATE TABLE `jenis_kertas` (
  `id_jenis_kertas` int(11) NOT NULL,
  `namajenis_kertas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laminasi`
--

CREATE TABLE `laminasi` (
  `id_laminasi` int(11) NOT NULL,
  `id_proses` varchar(10) DEFAULT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `numerator`
--

CREATE TABLE `numerator` (
  `id_numerator` int(11) NOT NULL,
  `nama_numerator` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plong`
--

CREATE TABLE `plong` (
  `id_plong` int(11) NOT NULL,
  `nama_plong` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `porforasi`
--

CREATE TABLE `porforasi` (
  `id_porforasi` int(11) NOT NULL,
  `nama_porforasi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `proses`
--

CREATE TABLE `proses` (
  `id_proses` varchar(10) NOT NULL,
  `id_jenis_cetakan` int(11) NOT NULL,
  `id_numerator` int(11) DEFAULT NULL,
  `id_porforasi` int(11) DEFAULT NULL,
  `id_plong` int(11) DEFAULT NULL,
  `numerator` smallint(6) DEFAULT NULL,
  `plong` smallint(6) DEFAULT NULL,
  `panjang_cetak` int(11) DEFAULT NULL,
  `lebar_cetak` int(11) DEFAULT NULL,
  `tinggi_cetak` int(11) DEFAULT NULL,
  `tanggal_dibuat` datetime DEFAULT CURRENT_TIMESTAMP,
  `tanggal_jadi` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ukuran_kertas`
--

CREATE TABLE `ukuran_kertas` (
  `id_ukuran_kertas` int(11) NOT NULL,
  `nama_ukuran_kertas` varchar(255) DEFAULT NULL,
  `panjang_kertas` int(11) DEFAULT NULL,
  `lebar_kertas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `role` int(11) DEFAULT NULL,
  `is_active` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `varian`
--

CREATE TABLE `varian` (
  `id_varian` int(11) NOT NULL,
  `id_jenis_barang` int(11) NOT NULL,
  `id_ukuran_kertas` int(11) DEFAULT NULL,
  `id_jenis_kertas` int(11) DEFAULT NULL,
  `nama_varian` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `stock_awal` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `warna` varchar(100) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `warning` int(11) NOT NULL DEFAULT '100'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_hpembelian`
--
ALTER TABLE `barang_hpembelian`
  ADD PRIMARY KEY (`id_varian`,`id_trans`),
  ADD KEY `fk_barang_hpembelian2` (`id_trans`);

--
-- Indexes for table `detailbarangproses`
--
ALTER TABLE `detailbarangproses`
  ADD PRIMARY KEY (`id_varian`,`id_proses`),
  ADD KEY `fk_barang_proses2` (`id_proses`);

--
-- Indexes for table `detail_plate`
--
ALTER TABLE `detail_plate`
  ADD PRIMARY KEY (`id_master_plate`,`id_proses`),
  ADD KEY `fk_proses_master_plate2` (`id_proses`);

--
-- Indexes for table `dpembelian_barang`
--
ALTER TABLE `dpembelian_barang`
  ADD PRIMARY KEY (`id_varian`,`id_trans`),
  ADD KEY `fk_dpembelian_barang2` (`id_trans`);

--
-- Indexes for table `dpembelian_cetak`
--
ALTER TABLE `dpembelian_cetak`
  ADD PRIMARY KEY (`id_trans`,`id_varian`),
  ADD KEY `fk_dpembelian_cetak2` (`id_varian`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `fk_varian_history` (`id_varian`);

--
-- Indexes for table `hpembelian`
--
ALTER TABLE `hpembelian`
  ADD PRIMARY KEY (`id_trans`),
  ADD KEY `fk_user_hpembelian` (`id_user`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id_jenis_barang`);

--
-- Indexes for table `jenis_cetakan`
--
ALTER TABLE `jenis_cetakan`
  ADD PRIMARY KEY (`id_jenis_cetakan`);

--
-- Indexes for table `jenis_kertas`
--
ALTER TABLE `jenis_kertas`
  ADD PRIMARY KEY (`id_jenis_kertas`);

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
-- Indexes for table `numerator`
--
ALTER TABLE `numerator`
  ADD PRIMARY KEY (`id_numerator`);

--
-- Indexes for table `plong`
--
ALTER TABLE `plong`
  ADD PRIMARY KEY (`id_plong`);

--
-- Indexes for table `porforasi`
--
ALTER TABLE `porforasi`
  ADD PRIMARY KEY (`id_porforasi`);

--
-- Indexes for table `proses`
--
ALTER TABLE `proses`
  ADD PRIMARY KEY (`id_proses`),
  ADD KEY `fk_proses_jenis_cetakan` (`id_jenis_cetakan`),
  ADD KEY `fk_proses_numerator` (`id_numerator`),
  ADD KEY `fk_proses_porforasi` (`id_porforasi`),
  ADD KEY `fk_proses_plong` (`id_plong`);

--
-- Indexes for table `ukuran_kertas`
--
ALTER TABLE `ukuran_kertas`
  ADD PRIMARY KEY (`id_ukuran_kertas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `varian`
--
ALTER TABLE `varian`
  ADD PRIMARY KEY (`id_varian`),
  ADD KEY `fk_barang_jenis_kertas` (`id_jenis_kertas`),
  ADD KEY `fk_jenisbarang_varian` (`id_jenis_barang`),
  ADD KEY `fk_varian_ukuran_kertas` (`id_ukuran_kertas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id_jenis_barang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_cetakan`
--
ALTER TABLE `jenis_cetakan`
  MODIFY `id_jenis_cetakan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_kertas`
--
ALTER TABLE `jenis_kertas`
  MODIFY `id_jenis_kertas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laminasi`
--
ALTER TABLE `laminasi`
  MODIFY `id_laminasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_plate`
--
ALTER TABLE `master_plate`
  MODIFY `id_master_plate` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `numerator`
--
ALTER TABLE `numerator`
  MODIFY `id_numerator` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plong`
--
ALTER TABLE `plong`
  MODIFY `id_plong` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `porforasi`
--
ALTER TABLE `porforasi`
  MODIFY `id_porforasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ukuran_kertas`
--
ALTER TABLE `ukuran_kertas`
  MODIFY `id_ukuran_kertas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `varian`
--
ALTER TABLE `varian`
  MODIFY `id_varian` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_hpembelian`
--
ALTER TABLE `barang_hpembelian`
  ADD CONSTRAINT `fk_barang_hpembelian` FOREIGN KEY (`id_varian`) REFERENCES `varian` (`id_varian`),
  ADD CONSTRAINT `fk_barang_hpembelian2` FOREIGN KEY (`id_trans`) REFERENCES `hpembelian` (`id_trans`);

--
-- Constraints for table `detailbarangproses`
--
ALTER TABLE `detailbarangproses`
  ADD CONSTRAINT `fk_barang_proses` FOREIGN KEY (`id_varian`) REFERENCES `varian` (`id_varian`),
  ADD CONSTRAINT `fk_barang_proses2` FOREIGN KEY (`id_proses`) REFERENCES `proses` (`id_proses`);

--
-- Constraints for table `detail_plate`
--
ALTER TABLE `detail_plate`
  ADD CONSTRAINT `fk_proses_master_plate` FOREIGN KEY (`id_master_plate`) REFERENCES `master_plate` (`id_master_plate`),
  ADD CONSTRAINT `fk_proses_master_plate2` FOREIGN KEY (`id_proses`) REFERENCES `proses` (`id_proses`);

--
-- Constraints for table `dpembelian_barang`
--
ALTER TABLE `dpembelian_barang`
  ADD CONSTRAINT `fk_dpembelian_barang` FOREIGN KEY (`id_varian`) REFERENCES `varian` (`id_varian`),
  ADD CONSTRAINT `fk_dpembelian_barang2` FOREIGN KEY (`id_trans`) REFERENCES `hpembelian` (`id_trans`);

--
-- Constraints for table `dpembelian_cetak`
--
ALTER TABLE `dpembelian_cetak`
  ADD CONSTRAINT `fk_dpembelian_cetak` FOREIGN KEY (`id_trans`) REFERENCES `hpembelian` (`id_trans`),
  ADD CONSTRAINT `fk_dpembelian_cetak2` FOREIGN KEY (`id_varian`) REFERENCES `varian` (`id_varian`);

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `fk_varian_history` FOREIGN KEY (`id_varian`) REFERENCES `varian` (`id_varian`);

--
-- Constraints for table `hpembelian`
--
ALTER TABLE `hpembelian`
  ADD CONSTRAINT `fk_user_hpembelian` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `laminasi`
--
ALTER TABLE `laminasi`
  ADD CONSTRAINT `fk_proses_laminasi` FOREIGN KEY (`id_proses`) REFERENCES `proses` (`id_proses`);

--
-- Constraints for table `proses`
--
ALTER TABLE `proses`
  ADD CONSTRAINT `fk_proses_jenis_cetakan` FOREIGN KEY (`id_jenis_cetakan`) REFERENCES `jenis_cetakan` (`id_jenis_cetakan`),
  ADD CONSTRAINT `fk_proses_numerator` FOREIGN KEY (`id_numerator`) REFERENCES `numerator` (`id_numerator`),
  ADD CONSTRAINT `fk_proses_plong` FOREIGN KEY (`id_plong`) REFERENCES `plong` (`id_plong`),
  ADD CONSTRAINT `fk_proses_porforasi` FOREIGN KEY (`id_porforasi`) REFERENCES `porforasi` (`id_porforasi`);

--
-- Constraints for table `varian`
--
ALTER TABLE `varian`
  ADD CONSTRAINT `fk_barang_jenis_kertas` FOREIGN KEY (`id_jenis_kertas`) REFERENCES `jenis_kertas` (`id_jenis_kertas`),
  ADD CONSTRAINT `fk_jenisbarang_varian` FOREIGN KEY (`id_jenis_barang`) REFERENCES `jenis_barang` (`id_jenis_barang`),
  ADD CONSTRAINT `fk_varian_ukuran_kertas` FOREIGN KEY (`id_ukuran_kertas`) REFERENCES `ukuran_kertas` (`id_ukuran_kertas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
   
--
-- Dumping data for tables
--

INSERT INTO `user` (`id_user`, `nama_user`, `alamat_user`, `no_hp`, `email`, `photo`, `username`, `password`, `role`, `is_active`) VALUES
(1, 'Administrator', 'Alamat Lengkap Admin', '081234567890', 'admin@mail.com', NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3', 0, 1),
(2, 'Mary Jane', '', '', 'maryjane@gmail.com', NULL, 'mary', '5844a15e76563fedd11840fd6f40ea7b', 1, 1),
(3, NULL, NULL, NULL, 'johndoe@gmail.com', NULL, 'john', '2829fc16ad8ca5a79da932f910afad1c', 2, 1);

INSERT INTO `jenis_barang` (`id_jenis_barang`, `nama_jenis_barang`) VALUES
(1, 'Kertas'),
(2, 'Tinta');

INSERT INTO `jenis_cetakan` (`id_jenis_cetakan`, `nama_jenis_cetakan`) VALUES
(1, 'Banner'),
(2, 'Brosur');

INSERT INTO `jenis_kertas` (`id_jenis_kertas`, `namajenis_kertas`) VALUES
(1, 'Tanpa jenis kertas'),
(2, 'Glossy'),
(3, 'Dove');

INSERT INTO `master_plate` (`id_master_plate`, `panjang_plate`, `lebar_plate`) VALUES
(1, 30, 20),
(2, 50, 50);

INSERT INTO `ukuran_kertas` (`id_ukuran_kertas`, `nama_ukuran_kertas`, `panjang_kertas`, `lebar_kertas`) VALUES
(1, 'Tanpa ukuran kertas', 0, 0),
(2, 'Ukuran A4', 110, 75),
(3, 'Ukuran A5', 75, 50);

INSERT INTO `varian` (`id_varian`, `id_jenis_barang`, `id_ukuran_kertas`, `id_jenis_kertas`, `nama_varian`, `jumlah`, `stock_awal`, `stock`, `warna`, `harga_beli`, `harga_jual`, `warning`) VALUES
(1, 2, 1, 1, 'Tinta Hitam', 30, 50, 40, 'Hitam', 120000, 130000, 10),
(2, 1, 1, 2, 'Kertas A4', 57, 150, 152, 'Kuning', 1000, 1500, 100);

INSERT INTO `history` (`id_history`, `id_varian`, `tanggal`, `deskripsi`) VALUES
(1, 2, '2018-08-20 16:10:17', '+ 150 (awal)'),
(2, 2, '2018-08-20 16:17:06', '+ 12 (update)');