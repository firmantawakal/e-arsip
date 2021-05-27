-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 27, 2021 at 10:13 AM
-- Server version: 8.0.23
-- PHP Version: 7.3.24-(to be removed in future macOS)

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-arsip`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `id_bagian` int NOT NULL,
  `nama_bagian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id_bagian`, `nama_bagian`) VALUES
(2, 'SIUM (Seksi Umum)'),
(4, 'Unit Provos'),
(5, 'Unit Reskrim'),
(6, 'Unit Intelkam'),
(7, 'Unit Binmas'),
(8, 'Unit Sabhara'),
(10, 'Kapolsek');

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id_disposisi` int NOT NULL,
  `id_bagian` int NOT NULL,
  `id_suratmasuk` int NOT NULL,
  `tgl_disposisi` date NOT NULL,
  `perintah` text NOT NULL,
  `tindakan` int NOT NULL DEFAULT '0' COMMENT '0=blm ditindaklanjut 1=sdh ditindaklanjut'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `disposisi`
--

INSERT INTO `disposisi` (`id_disposisi`, `id_bagian`, `id_suratmasuk`, `tgl_disposisi`, `perintah`, `tindakan`) VALUES
(2, 6, 1, '2021-04-09', 'Tindaklanjut surat', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int NOT NULL,
  `nama_jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`) VALUES
(1, 'Surat Biasa'),
(4, 'Surat Perintah'),
(5, 'Surat Telegram'),
(6, 'Surat dari instansi lain'),
(7, 'Nota Dinas');

-- --------------------------------------------------------

--
-- Table structure for table `suratkeluar`
--

CREATE TABLE `suratkeluar` (
  `id_suratkeluar` int NOT NULL,
  `no_suratkeluar` varchar(30) NOT NULL,
  `tgl_suratkeluar` date NOT NULL,
  `id_bagian` int NOT NULL,
  `alamat_suratkeluar` text NOT NULL,
  `isi_singkat` text NOT NULL,
  `id_jenis` int NOT NULL,
  `file` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suratkeluar`
--

INSERT INTO `suratkeluar` (`id_suratkeluar`, `no_suratkeluar`, `tgl_suratkeluar`, `id_bagian`, `alamat_suratkeluar`, `isi_singkat`, `id_jenis`, `file`) VALUES
(3, 'cvb', '2021-04-07', 4, 'cbc', 'cvc', 6, 'adc00838937cc554e4e910aaec904bba.png'),
(4, 'asd', '2021-04-07', 7, 'ada', 'asdad', 4, '10bb5d87c4bedde36be5a108af7d7e3e.JPG'),
(5, 'sdf', '2021-04-07', 6, 'sdfsfs', 'sdf', 1, 'ef8d8bbb4567c731c7097baffdf9b26c.pdf'),
(6, 'dwerr/werwr/wrew', '2021-04-12', 6, 'Polres Dumai', 'adadadd', 1, '734721e6ba79e1ff7f1afa4e4a255e11.png');

-- --------------------------------------------------------

--
-- Table structure for table `suratmasuk`
--

CREATE TABLE `suratmasuk` (
  `id_suratmasuk` int NOT NULL,
  `tgl_suratmasuk` date DEFAULT NULL,
  `tgl_disuratmasuk` date NOT NULL,
  `no_suratmasuk` varchar(70) NOT NULL,
  `instansi_pengirim` varchar(70) NOT NULL,
  `isi_singkat` text NOT NULL,
  `id_jenis` int NOT NULL,
  `file_suratmasuk` varchar(70) NOT NULL,
  `status_disposisi` int NOT NULL DEFAULT '0' COMMENT '0=belum disposisi, 1=sudah disposisi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suratmasuk`
--

INSERT INTO `suratmasuk` (`id_suratmasuk`, `tgl_suratmasuk`, `tgl_disuratmasuk`, `no_suratmasuk`, `instansi_pengirim`, `isi_singkat`, `id_jenis`, `file_suratmasuk`, `status_disposisi`) VALUES
(1, '2021-04-09', '2021-04-09', '0909090090', 'sdfsf', 'sdfsf', 1, '816def4f1ca3e40e1faf72f07ca12ea5.png', 1),
(2, '2021-04-12', '2021-04-12', '1sadad', 'Telkomsel', 'asdada', 6, '4e9ae09459fa369c1361589779742ecc.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` mediumtext NOT NULL,
  `nama_user` varchar(70) NOT NULL,
  `level` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_bagian` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `level`, `id_bagian`) VALUES
(1, 'admin', 'ee1d68e0d193dbe56a41ecd831c325d6', 'Admin', 'admin', '2'),
(2, 'kapolsek', 'ee1d68e0d193dbe56a41ecd831c325d6', 'Kapolsek', 'kapolsek', '10'),
(3, 'binmas', 'ee1d68e0d193dbe56a41ecd831c325d6', 'Binmas', 'bagian', '7'),
(6, 'intelkam', 'ee1d68e0d193dbe56a41ecd831c325d6', 'Intelkam', 'bagian', '6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `suratkeluar`
--
ALTER TABLE `suratkeluar`
  ADD PRIMARY KEY (`id_suratkeluar`);

--
-- Indexes for table `suratmasuk`
--
ALTER TABLE `suratmasuk`
  ADD PRIMARY KEY (`id_suratmasuk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bagian`
--
ALTER TABLE `bagian`
  MODIFY `id_bagian` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id_disposisi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `suratkeluar`
--
ALTER TABLE `suratkeluar`
  MODIFY `id_suratkeluar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `suratmasuk`
--
ALTER TABLE `suratmasuk`
  MODIFY `id_suratmasuk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
