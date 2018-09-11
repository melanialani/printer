-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2018 at 02:34 PM
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
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `id_image` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `comment` text NOT NULL,
  `tanggal_dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_comment`, `id_image`, `id_user`, `comment`, `tanggal_dibuat`) VALUES
(2, 14, 2, 'kurang kiri', '2018-09-11 19:16:09'),
(4, 14, 2, 'kurang kanan', '2018-09-11 19:31:55'),
(5, 13, 2, 'jelek', '2018-09-11 19:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `detailbarangproses`
--

CREATE TABLE `detailbarangproses` (
  `id_varian` int(11) NOT NULL,
  `id_proses` varchar(255) NOT NULL,
  `qty_barang` int(11) DEFAULT NULL,
  `jumlah_harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_plate`
--

CREATE TABLE `detail_plate` (
  `id_master_plate` int(11) NOT NULL,
  `id_proses` varchar(255) NOT NULL,
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

--
-- Dumping data for table `dpembelian_barang`
--

INSERT INTO `dpembelian_barang` (`id_varian`, `id_trans`, `qty_barang`, `jumlah`) VALUES
(1, '20180903211632x3', 1, 130000),
(1, '20180903211935x3', 1, 130000),
(1, '20180903211946x3', 1, 130000),
(1, '20180908231816x3', 0, 0),
(2, '20180903220513x3', 10, 15000),
(2, '20180903220714x3', 2, 3000),
(2, '20180903220909x3', 3, 4500),
(3, '20180903211632x3', 2, 300000),
(3, '20180903211935x3', 2, 300000),
(3, '20180903211946x3', 2, 300000),
(3, '20180908231816x3', 1, 150000),
(3, '20180908232012x3', 1, 150000),
(4, '20180903211632x3', 3, 465000),
(4, '20180903211935x3', 3, 465000),
(4, '20180903211946x3', 3, 465000),
(4, '20180908231816x3', 0, 0);

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

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id_history`, `id_varian`, `tanggal`, `deskripsi`) VALUES
(1, 2, '2018-08-20 16:10:17', '+ 150 (awal)'),
(2, 2, '2018-08-20 16:17:06', '+ 12 (update)'),
(3, 3, '2018-08-25 16:36:09', '+48 (awal)'),
(4, 4, '2018-08-25 16:38:04', '+35 (awal)'),
(5, 1, '2018-09-03 21:16:32', '- 40 (penjualan, no.nota = 20180903211632x3)'),
(6, 3, '2018-09-03 21:16:32', '- 47 (penjualan, no.nota = 20180903211632x3)'),
(7, 4, '2018-09-03 21:16:32', '- 37 (penjualan, no.nota = 20180903211632x3)'),
(8, 1, '2018-09-03 21:19:35', '-1 (penjualan, no.nota = 20180903211935x3)'),
(9, 3, '2018-09-03 21:19:35', '-2 (penjualan, no.nota = 20180903211935x3)'),
(10, 4, '2018-09-03 21:19:35', '-3 (penjualan, no.nota = 20180903211935x3)'),
(11, 1, '2018-09-03 21:19:46', '-1 (penjualan, no.nota = 20180903211946x3)'),
(12, 3, '2018-09-03 21:19:46', '-2 (penjualan, no.nota = 20180903211946x3)'),
(13, 4, '2018-09-03 21:19:46', '-3 (penjualan, no.nota = 20180903211946x3)'),
(14, 2, '2018-09-03 22:05:13', '- 10 (penjualan, no.nota = 20180903220513x3)'),
(15, 2, '2018-09-03 22:07:14', '- 2 (penjualan, no.nota = 20180903220714x3)'),
(16, 2, '2018-09-03 22:09:09', '- 3 (penjualan, no.nota = 20180903220909x3)'),
(17, 1, '2018-09-08 23:18:16', '- 0 (penjualan, no.nota = 20180908231816x3)'),
(18, 3, '2018-09-08 23:18:16', '- 1 (penjualan, no.nota = 20180908231816x3)'),
(19, 4, '2018-09-08 23:18:16', '- 0 (penjualan, no.nota = 20180908231816x3)'),
(20, 3, '2018-09-08 23:20:12', '- 1 (penjualan, no.nota = 20180908232012x3)');

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

--
-- Dumping data for table `hpembelian`
--

INSERT INTO `hpembelian` (`id_trans`, `id_user`, `tanggal_trans`, `total_harga`, `customer`) VALUES
('20180903211632x3', 3, '2018-09-03 21:16:32', 895000, 'john'),
('20180903211935x3', 3, '2018-09-03 21:19:35', 895000, 'john'),
('20180903211946x3', 3, '2018-09-03 21:19:46', 895000, 'john'),
('20180903220513x3', 3, '2018-09-03 22:05:13', 15000, 'john'),
('20180903220714x3', 2, '2018-09-03 22:07:14', 0, 'mary jane'),
('20180903220909x3', 3, '2018-09-03 22:09:09', 4500, 'john'),
('20180908231816x3', 3, '2018-09-08 23:18:16', 150000, 'john'),
('20180908232012x3', 3, '2018-09-08 23:20:12', 150000, 'john');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id_image` int(11) NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `file_type` varchar(50) NOT NULL,
  `file_path` varchar(50) NOT NULL,
  `full_path` varchar(100) NOT NULL,
  `raw_name` varchar(50) NOT NULL,
  `orig_name` varchar(50) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `file_ext` varchar(50) NOT NULL,
  `file_size` varchar(10) NOT NULL,
  `image_width` varchar(10) NOT NULL,
  `image_height` varchar(10) NOT NULL,
  `image_type` varchar(10) NOT NULL,
  `image_size_str` varchar(50) NOT NULL,
  `id_proses` varchar(255) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `comment` text,
  `tanggal_upload` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id_image`, `file_name`, `file_type`, `file_path`, `full_path`, `raw_name`, `orig_name`, `client_name`, `file_ext`, `file_size`, `image_width`, `image_height`, `image_type`, `image_size_str`, `id_proses`, `id_user`, `comment`, `tanggal_upload`) VALUES
(9, '18251920x1080jpg.jpg', 'image/jpeg', 'C:/xampp/htdocs/printer/upload/', 'C:/xampp/htdocs/printer/upload/18251920x1080jpg.jpg', '18251920x1080jpg', '18251920x1080jpg.jpg', '1825_1920x1080.jpg', '.jpg', '662.86', '1920', '1080', 'jpeg', 'width=\"1920\" height=\"1080\"', NULL, 0, NULL, '2018-09-10 20:19:01'),
(10, '166178jpg.jpg', 'image/jpeg', 'C:/xampp/htdocs/printer/upload/', 'C:/xampp/htdocs/printer/upload/166178jpg.jpg', '166178jpg', '166178jpg.jpg', '166178.jpg', '.jpg', '899.81', '2560', '1600', 'jpeg', 'width=\"2560\" height=\"1600\"', '20180910215416x3', 3, NULL, '2018-09-10 23:14:38'),
(11, '91df15e7b476f632032c155a98949e31bibleversesjpg.jpg', 'image/jpeg', 'C:/xampp/htdocs/printer/upload/', 'C:/xampp/htdocs/printer/upload/91df15e7b476f632032c155a98949e31bibleversesjpg.jpg', '91df15e7b476f632032c155a98949e31bibleversesjpg', '91df15e7b476f632032c155a98949e31bibleversesjpg.jpg', '91df15e7b476f632032c155a98949e31bible-verses.jpg', '.jpg', '962.83', '1920', '1080', 'jpeg', 'width=\"1920\" height=\"1080\"', '20180910215416x3', 3, 'ephesians', '2018-09-10 23:20:52'),
(13, 'adbjpg.jpg', 'image/jpeg', 'C:/xampp/htdocs/printer/upload/', 'C:/xampp/htdocs/printer/upload/adbjpg.jpg', 'adbjpg', 'adbjpg.jpg', 'adb.jpg', '.jpg', '63.02', '480', '251', 'jpeg', 'width=\"480\" height=\"251\"', '20180910215416x3', 2, '', '2018-09-10 23:45:12'),
(14, 'MyersBriggsTypespng.png', 'image/png', 'C:/xampp/htdocs/printer/upload/', 'C:/xampp/htdocs/printer/upload/MyersBriggsTypespng.png', 'MyersBriggsTypespng', 'MyersBriggsTypespng.png', 'MyersBriggsTypes.png', '.png', '483.42', '1280', '720', 'png', 'width=\"1280\" height=\"720\"', '20180910215416x3', 2, 'types', '2018-09-10 23:45:36');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id_jenis_barang` int(11) NOT NULL,
  `nama_jenis_barang` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jenis_barang`, `nama_jenis_barang`) VALUES
(1, 'Kertas'),
(2, 'Tinta');

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
(1, 'Banner'),
(2, 'Brosur');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kertas`
--

CREATE TABLE `jenis_kertas` (
  `id_jenis_kertas` int(11) NOT NULL,
  `namajenis_kertas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_kertas`
--

INSERT INTO `jenis_kertas` (`id_jenis_kertas`, `namajenis_kertas`) VALUES
(1, 'Tanpa jenis kertas'),
(2, 'Glossy'),
(3, 'Dove');

-- --------------------------------------------------------

--
-- Table structure for table `laminasi`
--

CREATE TABLE `laminasi` (
  `id_laminasi` int(11) NOT NULL,
  `id_proses` varchar(255) DEFAULT NULL,
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
(1, 30, 20),
(2, 50, 50);

-- --------------------------------------------------------

--
-- Table structure for table `plong`
--

CREATE TABLE `plong` (
  `id_plong` int(11) NOT NULL,
  `nama_plong` varchar(255) DEFAULT NULL,
  `panjang_plong` int(11) DEFAULT NULL,
  `lebar_plong` int(11) DEFAULT NULL,
  `harga_plong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plong`
--

INSERT INTO `plong` (`id_plong`, `nama_plong`, `panjang_plong`, `lebar_plong`, `harga_plong`) VALUES
(1, 'Plong 1', 10, 5, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `proses`
--

CREATE TABLE `proses` (
  `id_proses` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jenis_cetakan` int(11) NOT NULL,
  `id_jenis_kertas` int(11) DEFAULT NULL,
  `id_varian` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `laminasi` smallint(6) DEFAULT NULL,
  `numerator` smallint(6) DEFAULT NULL,
  `plong` smallint(6) DEFAULT NULL,
  `uv` tinyint(1) DEFAULT NULL,
  `panjang_cetak` int(11) DEFAULT NULL,
  `lebar_cetak` int(11) DEFAULT NULL,
  `tinggi_cetak` int(11) DEFAULT NULL,
  `tanggal_dibuat` datetime DEFAULT CURRENT_TIMESTAMP,
  `tanggal_jadi` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proses`
--

INSERT INTO `proses` (`id_proses`, `id_user`, `id_jenis_cetakan`, `id_jenis_kertas`, `id_varian`, `qty`, `total_harga`, `laminasi`, `numerator`, `plong`, `uv`, `panjang_cetak`, `lebar_cetak`, `tinggi_cetak`, `tanggal_dibuat`, `tanggal_jadi`) VALUES
('20180910214937x3', 3, 2, 2, 2, 250, 390000, 2, 1, 0, 1, 10, 10, 1, '2018-09-10 21:49:37', '0000-00-00 00:00:00'),
('20180910214987x3', 3, 2, 2, 2, 250, 390000, 2, 1, 0, 1, 10, 10, 1, '2018-09-10 21:49:37', '0000-00-00 00:00:00'),
('20180910215416x3', 2, 1, 2, 2, 3, 32000, 1, 0, 1, 1, 25, 12, 0, '2018-09-10 21:54:16', '2018-09-13 21:54:16'),
('20180910215643x3', 3, 1, 2, 2, 3, 32000, 1, 0, 1, 1, 25, 12, 0, '2018-09-10 21:56:43', '2018-09-13 21:56:43');

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

--
-- Dumping data for table `ukuran_kertas`
--

INSERT INTO `ukuran_kertas` (`id_ukuran_kertas`, `nama_ukuran_kertas`, `panjang_kertas`, `lebar_kertas`) VALUES
(1, 'Tanpa ukuran kertas', 0, 0),
(2, 'Ukuran A4', 110, 75),
(3, 'Ukuran A5', 75, 50);

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

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `alamat_user`, `no_hp`, `email`, `photo`, `username`, `password`, `role`, `is_active`) VALUES
(1, 'Administrator', 'Alamat Lengkap Admin', '081234567890', 'admin@mail.com', NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3', 0, 1),
(2, 'Mary Jane', '', '', 'maryjane@gmail.com', NULL, 'mary', '5844a15e76563fedd11840fd6f40ea7b', 1, 1),
(3, NULL, NULL, NULL, 'johndoe@gmail.com', NULL, 'john', '2829fc16ad8ca5a79da932f910afad1c', 2, 1);

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
  `warna` varchar(255) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `warning` int(11) NOT NULL DEFAULT '100'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `varian`
--

INSERT INTO `varian` (`id_varian`, `id_jenis_barang`, `id_ukuran_kertas`, `id_jenis_kertas`, `nama_varian`, `jumlah`, `stock_awal`, `stock`, `warna`, `harga_beli`, `harga_jual`, `warning`) VALUES
(1, 2, 1, 1, 'Tinta Hitam', 33, 50, 37, 'Hitam', 120000, 130000, 10),
(2, 1, 1, 2, 'Kertas A4', 72, 150, 137, 'Kuning', 1000, 1500, 100),
(3, 2, 1, 1, 'Tinta merah', 54, 48, 39, 'Merah', 140000, 150000, 20),
(4, 2, 1, 1, 'Tinta biru', 45, 35, 28, 'Biru', 145000, 155000, 15);

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
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `fk_comment_image` (`id_image`),
  ADD KEY `fk_comment_user` (`id_user`);

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
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `fk_image_proses` (`id_proses`);

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
-- Indexes for table `plong`
--
ALTER TABLE `plong`
  ADD PRIMARY KEY (`id_plong`);

--
-- Indexes for table `proses`
--
ALTER TABLE `proses`
  ADD PRIMARY KEY (`id_proses`),
  ADD KEY `fk_proses_jenis_cetakan` (`id_jenis_cetakan`),
  ADD KEY `fk_proses_jenis_kertas` (`id_jenis_kertas`),
  ADD KEY `fk_proses_varian` (`id_varian`),
  ADD KEY `fk_proses_user` (`id_user`);

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
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id_jenis_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis_cetakan`
--
ALTER TABLE `jenis_cetakan`
  MODIFY `id_jenis_cetakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis_kertas`
--
ALTER TABLE `jenis_kertas`
  MODIFY `id_jenis_kertas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `plong`
--
ALTER TABLE `plong`
  MODIFY `id_plong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ukuran_kertas`
--
ALTER TABLE `ukuran_kertas`
  MODIFY `id_ukuran_kertas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `varian`
--
ALTER TABLE `varian`
  MODIFY `id_varian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_image` FOREIGN KEY (`id_image`) REFERENCES `image` (`id_image`),
  ADD CONSTRAINT `fk_comment_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

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
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `fk_image_proses` FOREIGN KEY (`id_proses`) REFERENCES `proses` (`id_proses`);

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
  ADD CONSTRAINT `fk_proses_jenis_kertas` FOREIGN KEY (`id_jenis_kertas`) REFERENCES `jenis_kertas` (`id_jenis_kertas`),
  ADD CONSTRAINT `fk_proses_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `fk_proses_varian` FOREIGN KEY (`id_varian`) REFERENCES `varian` (`id_varian`);

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
