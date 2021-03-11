-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2021 at 07:01 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_laptop`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif_saw`
--

CREATE TABLE `alternatif_saw` (
  `id_alternatif` int(11) NOT NULL,
  `nama_alternatif` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif_saw`
--

INSERT INTO `alternatif_saw` (`id_alternatif`, `nama_alternatif`) VALUES
(1, 'Lenovo'),
(2, 'ASUS'),
(3, 'Mac Pro'),
(4, 'Toshiba'),
(5, 'Acer');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_saw`
--

CREATE TABLE `kriteria_saw` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL,
  `jenis` enum('cost','benefit') NOT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria_saw`
--

INSERT INTO `kriteria_saw` (`id_kriteria`, `nama_kriteria`, `jenis`, `bobot`) VALUES
(1, 'Warna', 'benefit', 0.4),
(2, 'Operating System', 'benefit', 0.25),
(3, 'Merk', 'benefit', 0.2),
(4, 'RAM', 'benefit', 0.15);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_saw`
--

CREATE TABLE `nilai_saw` (
  `id_nilai` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_saw`
--

INSERT INTO `nilai_saw` (`id_nilai`, `id_kriteria`, `id_alternatif`, `nilai`) VALUES
(27, 1, 1, 38),
(28, 2, 1, 37),
(29, 3, 1, 38),
(30, 4, 1, 37),
(31, 1, 2, 37),
(32, 2, 2, 37.5),
(33, 3, 2, 36),
(34, 4, 2, 37),
(35, 1, 3, 36),
(36, 2, 3, 37.5),
(37, 3, 3, 36),
(38, 4, 3, 36),
(55, 1, 5, 37.5),
(56, 2, 5, 38),
(57, 3, 5, 36),
(58, 4, 5, 35),
(59, 1, 4, 39),
(60, 2, 4, 39),
(61, 3, 4, 39),
(62, 4, 4, 39);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif_saw`
--
ALTER TABLE `alternatif_saw`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `kriteria_saw`
--
ALTER TABLE `kriteria_saw`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `nilai_saw`
--
ALTER TABLE `nilai_saw`
  ADD PRIMARY KEY (`id_nilai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif_saw`
--
ALTER TABLE `alternatif_saw`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kriteria_saw`
--
ALTER TABLE `kriteria_saw`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nilai_saw`
--
ALTER TABLE `nilai_saw`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
