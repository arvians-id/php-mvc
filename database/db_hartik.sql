-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2021 at 07:59 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hartik`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_perlombaan`
--

CREATE TABLE `jenis_perlombaan` (
  `id` int(11) NOT NULL,
  `perlombaan` varchar(56) NOT NULL,
  `tim` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_perlombaan`
--

INSERT INTO `jenis_perlombaan` (`id`, `perlombaan`, `tim`) VALUES
(1, 'Sepak Bola', 1),
(2, 'Basket', 1),
(3, 'Nyanyi', 0),
(4, 'Band', 1),
(5, 'Menggambar', 0),
(6, 'Puisi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar_perlombaan`
--

CREATE TABLE `pendaftar_perlombaan` (
  `id` int(11) NOT NULL,
  `nama_ketua` varchar(56) NOT NULL,
  `asal_sekolah` varchar(56) NOT NULL,
  `no_hp` varchar(56) NOT NULL,
  `lomba_diikuti` int(11) NOT NULL,
  `nama_tim` varchar(56) DEFAULT NULL,
  `jumlah_anggota` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftar_perlombaan`
--

INSERT INTO `pendaftar_perlombaan` (`id`, `nama_ketua`, `asal_sekolah`, `no_hp`, `lomba_diikuti`, `nama_tim`, `jumlah_anggota`) VALUES
(9, 'Widdy', 'UMMI', '082299921720', 4, '', ''),
(12, 'Agungs', 'UMMI', '082299921720', 1, 'Gatau', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_perlombaan`
--
ALTER TABLE `jenis_perlombaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftar_perlombaan`
--
ALTER TABLE `pendaftar_perlombaan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_perlombaan`
--
ALTER TABLE `jenis_perlombaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pendaftar_perlombaan`
--
ALTER TABLE `pendaftar_perlombaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
