-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2016 at 07:28 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `order_produksi`
--

CREATE TABLE IF NOT EXISTS `order_produksi` (
  `id_order_produksi` varchar(10) NOT NULL,
  `tgl_order_produksi` date NOT NULL,
  `jml_order_produksi` int(11) NOT NULL,
  PRIMARY KEY (`id_order_produksi`)
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
  `status_terima` enum('y','n') NOT NULL,
  PRIMARY KEY (`id_pemesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `nama_pemesan`, `alamat_pemesan`, `tgl_pemesanan`, `jml_pemesanan`, `status_kirim`, `status_terima`) VALUES
('PMSN000001', 'A', 'Desa Winduhaji', '2016-07-01', 100, 'y', 'n'),
('PMSN000002', 'B', 'Desa Karangmangu', '2016-07-03', 100, 'y', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `id_penjualan` varchar(10) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `jml_penjualan` int(11) NOT NULL,
  PRIMARY KEY (`id_penjualan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `tgl_penjualan`, `jml_penjualan`) VALUES
('PENJ000001', '2016-07-01', 55),
('PENJ000002', '2016-07-02', 10),
('PENJ000003', '2016-07-03', 35),
('PENJ000004', '2016-07-11', 100),
('PENJ000005', '2016-07-15', 120),
('PENJ000006', '2016-07-23', 600),
('PENJ000007', '2016-08-02', 100);

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
  PRIMARY KEY (`id_produksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`id_produksi`, `tgl_produksi`, `jml_produksi`, `status_terima`, `jml_terima`) VALUES
('PROD000001', '2016-07-01', 100, 'y', 100),
('PROD000002', '2016-07-02', 200, 'y', 200),
('PROD000003', '2016-07-03', 300, 'y', 300),
('PROD000004', '2016-07-04', 200, 'y', 200),
('PROD000005', '2016-07-05', 90, 'y', 90),
('PROD000006', '2016-07-06', 80, 'y', 80),
('PROD000007', '2016-07-11', 11, 'y', 11),
('PROD000008', '2016-07-15', 39, 'y', 39);

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE IF NOT EXISTS `stok` (
  `id_stok` varchar(10) NOT NULL,
  `tgl_stok` date NOT NULL,
  PRIMARY KEY (`id_stok`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id_stok`, `tgl_stok`) VALUES
('STOK000001', '2016-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` varchar(3) NOT NULL,
  `nama_user` varchar(35) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` enum('pimpinan','gudang','produksi') NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
('U01', 'Fazri', 'fazri', '123', 'gudang'),
('U02', 'Didin', 'didin', '123', 'pimpinan'),
('U03', 'Agus', 'agus', '123', 'produksi');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
