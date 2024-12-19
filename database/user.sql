-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2024 at 11:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projek_tekweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `no_telepon`, `email`, `password`, `first_name`, `last_name`, `role`) VALUES
(1, 'gab10', '081241205412', 'gabrielle.10@gmail.com', '$2y$10$.9ff6mqhZnG89FOd7y/QXeelisx6IGsNBslH2qNp9Q/sQGTGO7xpu', 'Gabrielle', 'Ambasalu', 'user'),
(3, 'sharon22', '081927876089', 'sharon.valerina@gmail.com', '$2y$10$Fji8eG/ieY56SYWxl5KBgOHIIKfNgeD4FubqlvdwnINQS49T3kOAS', 'Sharon', 'Tannus', 'user'),
(4, 'jenni25', '085243667854', 'jenni.aloy@gmail.com', '$2y$10$1dTr9HfQZRFvWdO3DjJreuS6NE7CN./AfIqmNUsioTUFzlOPDkqzi', 'Jennifer', 'Harijadi', 'user'),
(5, 'feli', '084539423402', 'felicia_audrey@gmail.com', '$2y$10$J8FGIT.22qxc//Bll1dk1.ItnfqTPxxVgiYbuNDEld31s9vAFC8XS', 'Felicia', 'Audrey', 'user'),
(6, 'jessica09', '085647283493', 'jessica09@gmail.com', '$2y$10$PlLcwBKc7.gudqXVizBYbOu5SHX1DljCXL.vBm2YbNw1AY7S2CJOi', 'Jessica', 'Chandra', 'user'),
(7, 'clar_est', '084537264811', 'clar.e@gmail.com', '$2y$10$hpaFsn2.NcerZ8zwCQA3l.m9z2qIfwZoEuD1BZDxgK8sG9PfjSwAu', 'Clarissa', 'Estelina', 'user'),
(8, 'gabrielle', '085284934111', 'gaby10@gmail.com', '$2y$10$536SxFoQQrJErY6XsuFM9uiHpY6k/R3HIloy3dPYwtos/tBsTdiEa', 'Gabrielle', 'Ambasalu', 'admin'),
(9, 'jovi09', '081567465777', 'jovijovi@gmail.com', '$2y$10$ET5fRe2lDnexDvP0He0al.hXRQDLZFd2OCSs/tEnyeOAp69tS4Wz2', 'Jovita', 'Alexandra', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
