-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2021 at 04:19 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_restserver`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `tahun` char(9) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `pengarang` varchar(250) DEFAULT NULL,
  `deskripsi` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `tahun`, `judul`, `pengarang`, `deskripsi`) VALUES
(1, '2000', '100 tahun Kesunyian', 'Yuval Noah Harari', 'Penerbit Erlangga'),
(2, '2017', 'Kelahiran Umat Manusia', 'erik@gmail.com', 'Gramedia Pustaka'),
(3, '2017', 'Bulan', 'Tere Liye', 'Gramedia Pustaka'),
(33, '1999', 'Sang Alkemis', 'Paulo Coelho', 'Freemasonry'),
(34, '2011', 'Bumi', 'Tere Liye', 'Gramedia Pustaka'),
(36, '1999', 'Sejarah Singkat Waktu', 'Hawkins', 'Penerbit Airlangga'),
(37, '2000', 'Dunia Shopie', 'Jostein Garden', 'Gramedia Pustaka'),
(38, '2019', 'Contoh', 'contoh', 'Agro Media');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `kode` char(9) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `telp` varchar(250) DEFAULT NULL,
  `bagian` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `kode`, `nama`, `telp`, `bagian`) VALUES
(1, 'A6456', 'Doddy Ferdiansyah Kurniawan', '082456334453', 'CEO'),
(4, '033040023', 'Fajar Darmawan ', '08578876654', 'Kasir'),
(5, '113040321', 'Ferry Mulyanto', '08324543443', 'Anggota'),
(33, 'A6765', 'fahriza kurniwan', '0856754567', 'Kasir'),
(34, 'AB876', 'Lemonaru', '081334567', 'Anggota'),
(35, 'B789', 'Fahriza', '09876834343', 'Anggota');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nrp` char(9) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `jurusan` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nrp`, `nama`, `email`, `jurusan`) VALUES
(1, '043040001', 'Doddy Ferdiansyah Kurniawan', 'doy@gmail.com', 'Teknik Mesin'),
(2, '023040123', 'Erik', 'erik@gmail.com', 'Teknik Industri'),
(3, '043040321', 'Rommy Fauzi', 'rommy@gmail.com', 'Teknik Planologi'),
(4, '033040023', 'Fajar Darmawan ', 'fajar@yahoo.com', 'Teknik Informatika'),
(36, '798745', 'fahriza kurniwan', 'emboh', 'teknik api'),
(38, '79800', 'Lemonaru KingKong', 'asd@sdf.a', 'Teknik Mesin'),
(39, '798745', 'fahriza kurniwan', 'emboh', 'teknik api');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
