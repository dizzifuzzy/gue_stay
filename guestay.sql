-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2021 at 09:37 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guestay`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_rating`
--

CREATE TABLE `about_rating` (
  `id_ar` int(5) NOT NULL,
  `pilih_ar` int(5) NOT NULL,
  `id_rating` int(5) NOT NULL,
  `id_member` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_adm` int(5) NOT NULL,
  `nama_adm` varchar(50) NOT NULL,
  `email_adm` varchar(50) NOT NULL,
  `pswd_adm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_adm`, `nama_adm`, `email_adm`, `pswd_adm`) VALUES
(1, 'Jacktim', 'batim@gmail.com', 'batim');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(5) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `penerima_bank` varchar(50) NOT NULL,
  `no_rekening` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`, `penerima_bank`, `no_rekening`) VALUES
(1, 'BNI', 'Jack Rip', '01111');

-- --------------------------------------------------------

--
-- Table structure for table `bukti`
--

CREATE TABLE `bukti` (
  `id_bukti` int(5) NOT NULL,
  `id_transaksi` int(5) NOT NULL,
  `id_member` int(5) NOT NULL,
  `catatan` text NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(5) NOT NULL,
  `wifi` int(5) NOT NULL,
  `kamar_tidur` int(5) NOT NULL,
  `kamar_mandi` int(5) NOT NULL,
  `garasi` int(5) NOT NULL,
  `id_penginapan` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `wifi`, `kamar_tidur`, `kamar_mandi`, `garasi`, `id_penginapan`) VALUES
(2, 1, 1, 1, 1, 2),
(3, 1, 1, 1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(5) NOT NULL,
  `file_gambar` varchar(50) NOT NULL,
  `id_penginapan` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `file_gambar`, `id_penginapan`) VALUES
(2, 'hill_341357132_1000.jpg', 2),
(3, 'download20210702200810.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `kategori_penginapan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori_penginapan`) VALUES
(1, 'Homestay'),
(2, 'GuestHouse');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(5) NOT NULL,
  `id_member` int(5) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tanggal_komentar` date NOT NULL,
  `id_penginapan` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(5) NOT NULL,
  `email_member` varchar(50) NOT NULL,
  `pswd_member` varchar(50) NOT NULL,
  `nama_member` text NOT NULL,
  `alamat_member` varchar(50) NOT NULL,
  `nohp_member` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `email_member`, `pswd_member`, `nama_member`, `alamat_member`, `nohp_member`) VALUES
(1, 'nicolson@gmail.com', 'jacknicolson', 'jack', 'soreang', '050505');

-- --------------------------------------------------------

--
-- Table structure for table `penginapan`
--

CREATE TABLE `penginapan` (
  `id_penginapan` int(5) NOT NULL,
  `nama_penginapan` varchar(50) NOT NULL,
  `alamat_penginapan` varchar(50) NOT NULL,
  `kategori_penginapan` int(5) NOT NULL,
  `deskripsi_penginapan` text NOT NULL,
  `harga_penginapan` int(12) NOT NULL,
  `status_penginapan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penginapan`
--

INSERT INTO `penginapan` (`id_penginapan`, `nama_penginapan`, `alamat_penginapan`, `kategori_penginapan`, `deskripsi_penginapan`, `harga_penginapan`, `status_penginapan`) VALUES
(2, 'Homestaykuh', 'Jln. Dimana ajah', 1, 'test', 500000, 'Available'),
(3, 'Homestaykuhh', 'Jln. Dimana ajah', 1, 'test', 500000, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(5) NOT NULL,
  `satu` int(5) NOT NULL,
  `dua` int(5) NOT NULL,
  `tiga` int(5) NOT NULL,
  `empat` int(5) NOT NULL,
  `lima` int(5) NOT NULL,
  `id_penginapan` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id_rating`, `satu`, `dua`, `tiga`, `empat`, `lima`, `id_penginapan`) VALUES
(2, 0, 0, 0, 0, 0, 2),
(3, 0, 0, 0, 0, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(5) NOT NULL,
  `id_member` int(5) NOT NULL,
  `id_penginapan` int(5) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `total_harga` int(12) NOT NULL,
  `status_transaksi` varchar(30) NOT NULL,
  `catatan_transaksi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_rating`
--
ALTER TABLE `about_rating`
  ADD PRIMARY KEY (`id_ar`),
  ADD KEY `id_rating` (`id_rating`),
  ADD KEY `id_member` (`id_member`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_adm`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `bukti`
--
ALTER TABLE `bukti`
  ADD PRIMARY KEY (`id_bukti`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`),
  ADD KEY `id_penginapan` (`id_penginapan`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`),
  ADD KEY `gambar_ibfk_1` (`id_penginapan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_penginapan` (`id_penginapan`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `penginapan`
--
ALTER TABLE `penginapan`
  ADD PRIMARY KEY (`id_penginapan`),
  ADD KEY `penginapan_ibfk_1` (`kategori_penginapan`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `rating_ibfk_1` (`id_penginapan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_penginapan` (`id_penginapan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_rating`
--
ALTER TABLE `about_rating`
  MODIFY `id_ar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_adm` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bukti`
--
ALTER TABLE `bukti`
  MODIFY `id_bukti` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penginapan`
--
ALTER TABLE `penginapan`
  MODIFY `id_penginapan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69135;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `about_rating`
--
ALTER TABLE `about_rating`
  ADD CONSTRAINT `about_rating_ibfk_1` FOREIGN KEY (`id_rating`) REFERENCES `rating` (`id_rating`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `about_rating_ibfk_2` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bukti`
--
ALTER TABLE `bukti`
  ADD CONSTRAINT `bukti_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bukti_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD CONSTRAINT `fasilitas_ibfk_1` FOREIGN KEY (`id_penginapan`) REFERENCES `penginapan` (`id_penginapan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gambar`
--
ALTER TABLE `gambar`
  ADD CONSTRAINT `gambar_ibfk_1` FOREIGN KEY (`id_penginapan`) REFERENCES `penginapan` (`id_penginapan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`id_penginapan`) REFERENCES `penginapan` (`id_penginapan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penginapan`
--
ALTER TABLE `penginapan`
  ADD CONSTRAINT `penginapan_ibfk_1` FOREIGN KEY (`kategori_penginapan`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`id_penginapan`) REFERENCES `penginapan` (`id_penginapan`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_penginapan`) REFERENCES `penginapan` (`id_penginapan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
