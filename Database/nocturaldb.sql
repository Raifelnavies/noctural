-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2024 at 12:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nocturaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `password`, `username`) VALUES
(1, 'admin', 'admin@noctural.com', 'admin', 'user_root');

-- --------------------------------------------------------

--
-- Table structure for table `tiket3daypass`
--

CREATE TABLE `tiket3daypass` (
  `id` int(11) NOT NULL,
  `ticketKategori` varchar(128) NOT NULL,
  `price` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tiket3daypass`
--

INSERT INTO `tiket3daypass` (`id`, `ticketKategori`, `price`, `stok`) VALUES
(1, 'GA-Early Entry', 700000, 50),
(2, 'General Admission', 1300000, 20),
(3, 'VIP', 1800000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tiketdailypass`
--

CREATE TABLE `tiketdailypass` (
  `id` int(11) NOT NULL,
  `ticketKategori` varchar(128) NOT NULL,
  `price` int(128) NOT NULL,
  `stok` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tiketdailypass`
--

INSERT INTO `tiketdailypass` (`id`, `ticketKategori`, `price`, `stok`) VALUES
(1, 'GA-Early Entry', 250000, 47),
(2, 'General Admission', 450000, 20),
(3, 'VIP', 750000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(12) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `NomerTelpon` varchar(12) NOT NULL,
  `NumberOfTicket` varchar(6) NOT NULL,
  `TanggalKonser` varchar(100) NOT NULL,
  `Payment` enum('Gopay','Bank','BTC') NOT NULL,
  `price` int(225) NOT NULL,
  `TicketCategory` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `NomerTelpon`, `NumberOfTicket`, `TanggalKonser`, `Payment`, `price`, `TicketCategory`) VALUES
(1, 'Raifelnavies Yuhabfi', 'admin@example.com', '085882835677', 'NF245', 'Day 1', 'Gopay', 250000, 'GA-Early Entry'),
(2, 'Raifelnavies Yuhabfi', 'admin@example.com', '085882835677', 'NF402', 'Day 1', 'Gopay', 250000, 'GA-Early Entry'),
(3, 'Raifelnavies Yuhabfi', 'admin@example.com', '085882835677', 'NF537', 'Full Days', 'Gopay', 700000, 'GA-Early Entry');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiket3daypass`
--
ALTER TABLE `tiket3daypass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiketdailypass`
--
ALTER TABLE `tiketdailypass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Number Of Ticket` (`NumberOfTicket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tiket3daypass`
--
ALTER TABLE `tiket3daypass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tiketdailypass`
--
ALTER TABLE `tiketdailypass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
