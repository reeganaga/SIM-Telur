-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2016 at 03:25 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inv`
--

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE IF NOT EXISTS `harga` (
`id_harga` int(11) NOT NULL,
  `jml_per_peti` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`id_harga`, `jml_per_peti`, `harga_jual`) VALUES
(1, 15, 19000);

-- --------------------------------------------------------

--
-- Table structure for table `order_produksi`
--

CREATE TABLE IF NOT EXISTS `order_produksi` (
  `id_order_produksi` varchar(10) NOT NULL,
  `tgl_order_produksi` date NOT NULL,
  `jml_order_produksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_produksi`
--

INSERT INTO `order_produksi` (`id_order_produksi`, `tgl_order_produksi`, `jml_order_produksi`) VALUES
('ORDR000001', '2016-07-03', 50),
('ORDR000002', '2016-07-04', 35),
('ORDR000003', '2016-07-16', 11);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE IF NOT EXISTS `pemesanan` (
  `id_pemesanan` varchar(10) NOT NULL,
  `nama_pemesan` varchar(30) NOT NULL,
  `alamat_pemesan` varchar(30) NOT NULL,
  `tgl_pemesanan` date NOT NULL,
  `jml_pemesanan` int(11) NOT NULL,
  `status_kirim` enum('y','n') NOT NULL,
  `status_terima` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `nama_pemesan`, `alamat_pemesan`, `tgl_pemesanan`, `jml_pemesanan`, `status_kirim`, `status_terima`) VALUES
('PMSN000001', 'A', 'Desa Winduhaji', '2016-07-01', 100, 'y', 'n'),
('PMSN000002', 'B', 'Desa Karangmangu', '2016-07-03', 100, 'y', 'n'),
('PMSN000003', 'C', 'C', '2016-08-05', 12, 'y', 'n'),
('PMSN000004', 'D', 'D', '2016-08-07', 15, 'y', 'n'),
('PMSN000005', 'a', 'a', '2015-06-06', 111, 'y', 'n'),
('PMSN000006', 'b', 'b', '2015-06-06', 4, 'y', 'n'),
('PMSN000007', 'c', 'c', '2016-07-21', 100, 'y', 'n'),
('PMSN000008', 'j', 'j', '2016-08-31', 1, 'y', 'n'),
('PMSN000009', '1', '1', '2016-08-30', 118, 'y', 'n'),
('PMSN000010', 'a', '1', '2016-08-30', 1, 'y', 'n'),
('PMSN000011', 'rega cahya gumilang', 'jogja', '2016-08-30', 10, 'n', 'n'),
('PMSN000012', 'rega cahya gumilang', '1', '2016-08-31', 11, 'y', 'n'),
('PMSN000013', 'rita', 'klaten', '2016-08-29', 10, 'n', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `id_penjualan` varchar(10) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `jml_penjualan` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `tgl_penjualan`, `jml_penjualan`, `total_harga`) VALUES
('PENJ000001', '2016-07-01', 55, 0),
('PENJ000002', '2016-07-02', 10, 0),
('PENJ000003', '2016-07-03', 35, 0),
('PENJ000005', '2016-07-15', 120, 0),
('PENJ000006', '2016-07-23', 600, 0),
('PENJ000007', '2016-08-02', 100, 0),
('PENJ000008', '2016-07-21', 111, 0),
('PENJ000009', '0000-00-00', 100, 0),
('PENJ000010', '2016-08-31', 4, 0),
('PENJ000011', '2016-07-31', 1, 285000),
('PENJ000012', '2016-08-29', 118, 33630000),
('PENJ000013', '2016-08-30', 1, 285000),
('PENJ000014', '2016-08-31', 11, 3135000);

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE IF NOT EXISTS `produksi` (
  `id_produksi` varchar(10) NOT NULL,
  `tgl_produksi` date NOT NULL,
  `jml_produksi` int(11) NOT NULL,
  `status_terima` enum('y','n') NOT NULL,
  `jml_terima` int(11) NOT NULL,
  `umur_ayam` int(11) NOT NULL,
  `populasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`id_produksi`, `tgl_produksi`, `jml_produksi`, `status_terima`, `jml_terima`, `umur_ayam`, `populasi`) VALUES
('PROD000001', '2016-07-01', 100, 'y', 100, 0, 0),
('PROD000002', '2016-07-02', 200, 'y', 200, 0, 0),
('PROD000003', '2016-07-03', 300, 'y', 300, 0, 0),
('PROD000004', '2016-07-04', 200, 'y', 200, 0, 0),
('PROD000005', '2016-07-05', 90, 'y', 90, 0, 0),
('PROD000006', '2016-07-06', 80, 'y', 80, 0, 0),
('PROD000007', '2016-07-11', 11, 'y', 11, 0, 0),
('PROD000008', '2016-07-15', 39, 'y', 39, 0, 0),
('PROD000009', '2016-07-20', 80, 'y', 80, 0, 0),
('PROD000010', '2016-08-08', 100, 'y', 100, 0, 0),
('PROD000011', '2016-07-21', 50, 'y', 35, 0, 0),
('PROD000012', '2016-08-30', 10, 'y', 10, 0, 50),
('PROD000013', '2016-08-30', 10, 'y', 10, 10, 10),
('PROD000014', '2016-08-31', 100, 'y', 98, 96, 100),
('PROD000015', '2016-08-31', 1, 'y', 1, 90, 15);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` varchar(3) NOT NULL,
  `nama_user` varchar(35) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` enum('pimpinan','gudang','produksi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
('U01', 'gudang', 'gudang', '123', 'gudang'),
('U02', 'pimpinan', 'pimpinan', '123', 'pimpinan'),
('U03', 'produksi', 'produksi', '123', 'produksi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
 ADD PRIMARY KEY (`id_harga`);

--
-- Indexes for table `order_produksi`
--
ALTER TABLE `order_produksi`
 ADD PRIMARY KEY (`id_order_produksi`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
 ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
 ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
 ADD PRIMARY KEY (`id_produksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
MODIFY `id_harga` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
