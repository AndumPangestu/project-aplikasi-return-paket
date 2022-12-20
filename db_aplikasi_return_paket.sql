-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2022 at 07:02 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_aplikasi_return_paket`
--

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id` int(11) NOT NULL,
  `resi` varchar(150) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `nama_seller` varchar(200) NOT NULL,
  `image_paket` varchar(150) NOT NULL,
  `date_paket` date NOT NULL,
  `nama_user` varchar(200) NOT NULL,
  `dikirim` int(11) NOT NULL,
  `sendsms` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id`, `resi`, `telp`, `nama_seller`, `image_paket`, `date_paket`, `nama_user`, `dikirim`, `sendsms`) VALUES
(38, '1', '111', 'Asep', '638a15204096e.png', '2022-12-02', 'asep jhon', 1, 0),
(39, '2', '111', 'Asep', '638a15204096e.png', '2022-12-02', 'asep jhon', 1, 0),
(40, '3', '111', 'Asep', '638a15204096e.png', '2022-12-02', 'asep jhon', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `nama`, `telp`) VALUES
(14, 'Asep', '111');

-- --------------------------------------------------------

--
-- Table structure for table `ttd`
--

CREATE TABLE `ttd` (
  `id_ttd` int(11) NOT NULL,
  `image_ttd` varchar(150) NOT NULL,
  `nama_penerima` varchar(200) NOT NULL,
  `nama_user_input` varchar(100) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `date_ttd` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ttd`
--

INSERT INTO `ttd` (`id_ttd`, `image_ttd`, `nama_penerima`, `nama_user_input`, `id_paket`, `date_ttd`) VALUES
(33, '638a153526632.png', 'jhon', 'firman', 38, '2022-12-02'),
(34, '638a153526632.png', 'jhon', 'firman', 39, '2022-12-02'),
(35, '638a153526632.png', 'jhon', 'firman', 40, '2022-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(5, 'admin', '$2y$10$58yIYMV7EWEVUwgFek3uPewcFmanTTweUR0my4AfvxvRRysfWzgGe', 1),
(8, 'firmansyah', '$2y$10$oWWm9sA.rW8hKYQLOcDxr.fKvf5ZIljifSbsiNOf73KlARqln8lJC', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `resi` (`resi`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `telp` (`telp`);

--
-- Indexes for table `ttd`
--
ALTER TABLE `ttd`
  ADD PRIMARY KEY (`id_ttd`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ttd`
--
ALTER TABLE `ttd`
  MODIFY `id_ttd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
